<?php
use App\Models\User;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
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
     * @Given I already have opened a shop with name :name
     */
    public function iAlreadyHaveOpenedAShopWithName($name)
    {
        $user = User::latest()->first();
        $shop = new \App\Models\Shop([
            'name'  =>  $name,
            'description'   =>  $this->faker->sentence(),
            'slug'  =>  str_slug($name)//   produces => johns-shop
        ]);
        $user->shop()->save($shop);
    }
}
