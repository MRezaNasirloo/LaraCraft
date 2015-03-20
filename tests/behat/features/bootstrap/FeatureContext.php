<?php
use App\Models\Product\Product;
use App\Models\Shop;
use Behat\Behat\Definition\Call\Then;
use Behat\Behat\Definition\Call\When;
use Behat\Behat\Tester\Exception\PendingException;
use App\Models\User;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\TableNode;
use Behat\MinkExtension\Context\MinkContext;
use Faker\Factory;
use Faker\Generator;
use Illuminate\Support\Facades\Hash;
use Laracasts\Behat\Context\DatabaseTransactions;
use PHPUnit_Framework_Assert as PHPUnit;
/**
 * Defines application features from the specific context.
 */
class FeatureContext extends MinkContext implements Context, SnippetAcceptingContext
{

    use DatabaseTransactions;

    /**
     * @var Generator
     */
    private $faker;

    /**
     * Constructor for this Context
     *
     */
    function __construct()
    {
        $this->faker = Factory::create();
    }

    /**
     * @Then I should be able to do something with Laravel
     */
    public function iShouldBeAbleToDoSomethingWithLaravel()
    {
        $environmentFileName = app()->environmentFile();
        $environmentName = env('APP_ENV');
        PHPUnit::assertEquals('.env.behat', $environmentFileName);
        PHPUnit::assertEquals('acceptance', $environmentName);
    }

    /**
     * @Then /^I should not see any errors$/
     */
    public function iShouldNotSeeAnyErrors()
    {
        $message = "";
        if ($errors = Session::get('errors')) {
            foreach($errors->all() as $error){
                $message .= "\n $error";
            }
        }
        PHPUnit::assertFalse(Session::has('errors'), $message);
    }

    /**
     * Create and persist a user in database
     *
     * @Given I already have an account :email with :password
     *
     * @param $email String
     * @param $password String
     */
    public function iAlreadyHaveAnAccountWith($email, $password)
    {
        $name = substr($email , 0,strpos($email,'@'));
        User::create([
            "name"      =>  $name,
            "email"     =>  $email,
            "password"  =>  Hash::make($password)
        ]);
    }

    /**
     * Login a user
     *
     * @Given I already have logged in :email with :password
     *
     * @param $email String
     * @param $password String
     */
    public function iAlreadyHaveLoggedInWith($email, $password)
    {
        PHPUnit::assertTrue(Auth::attempt([
            "email"     =>  $email,
            "password"  =>  $password
        ]), "There isn't any user with these credentials in database");
    }

    /**
     * Open a shop for the latest registered User
     *
     * @Given I already have opened a shop with name :name
     */
    public function iAlreadyHaveOpenedAShopWithName($name)
    {
        $user = User::latest('id')->first();
        $shop = new Shop([
            'name'  =>  $name,
            'description'   =>  $this->faker->sentence(),
            'slug'  =>  str_slug($name)//   produces => johns-shop from John's Shop
        ]);
        $user->shop()->save($shop);
    }

    /**
     * @Given I am a shop owner with :email with :password and Shop name :name and logged in
     */
    public function iAmAShopOwnerWithWithAndShopNameAndLoggedIn($email, $password, $name)
    {
        $this->iAlreadyHaveAnAccountWith($email, $password);
        $this->iAlreadyHaveOpenedAShopWithName($name);
        $this->iAlreadyHaveLoggedInWith($email, $password);
    }

    /**
     * @Given I am a shop owner with :email with :password and Shop name :name
     */
    public function iAmAShopOwnerWithWithAndShopName($email, $password, $name)
    {
        $this->iAlreadyHaveAnAccountWith($email, $password);
        $this->iAlreadyHaveOpenedAShopWithName($name);
    }


    /**
     * @Given I list an item with :name and :description with my account :email
     */
    public function iListAnItemWithAndWithMyAccount($name, $description, $email)
    {
        $shop = User::whereEmail($email)->first()->shop()->first();
        PHPUnit::assertNotNull($shop, "You have not opened a shop yet.");
        $slug = str_slug($name, '-');
        $product = new Product(['name' => $name, 'description' => $description, 'slug' => $slug]);
        $shop->addProduct($product);
        PHPUnit::assertEquals($shop->products()->first()->name, $name);


    }
}
