<?php namespace Tests;

/**
 * Created by PhpStorm.
 * User: Mamareza
 * Date: 2015-03-07
 * Time: 1:02 PM
 */

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Laracasts\TestDummy\Factory;

class ShopTest extends DBTestCase {

    /** @test */
    public function it_should_be_a_shop_instance()
    {
        $shop = Factory::create('Shop');
        //var_dump($product->toArray());
        $this->assertEquals($this->namespaceModels . '\Shop', get_class($shop));

    }

    /** @test */
    public function it_should_relate_to_an_instance_of_a_user()
    {
        $shop = Factory::create('Shop');
        $user = $shop->user()->first();
        $this->assertEquals($this->namespaceModels . '\User', get_class($user));
    }

    /** @test */
    public function it_should_relate_to_an_instance_of_a_product()
    {
        $product = Factory::create('Product');
        $shop = $product->shop()->first();
        $products = $shop->products()->first();
        $this->assertEquals($this->namespaceProduct . '\Product', get_class($products));
        $this->assertEquals($this->namespaceModels . '\Shop', get_class($shop));

    }

    /** @test */
    public function it_should_be_an_instance_of_a_shop()
    {
        $product = Factory::create('Product');
        $shop = $product->shop()->first();
        $this->assertEquals($this->namespaceModels . '\Shop', get_class($shop));
        $this->assertInstanceOf($this->namespaceModels . '\Shop', $shop);

    }

    /** @test */
    public function its_addProduct_method_adds_a_product_to_it()
    {
        $shop = Factory::create('Shop');
        $product = Factory::create('Product');

        $shop->addProduct($product);

        $pro = $shop->products()->get()->first();

        $this->assertEquals($product->name, $pro->name);

    }

    /** @test */
    public function its_products_method_gets_all_of_its_products()
    {
        $shop = Factory::create('Shop');
        $products = Factory::times(2)->create('Product', ['shop_id' => $shop->id]);

        $products = $shop->products()->get()->all();

        $this->assertContainsOnlyInstancesOf($this->namespaceProduct . '\IProduct', $products);

    }

    /** @test */
    public function it_returns_its_owner()
    {
        $user = Factory::create('User');
        $user = User::find($user->id);
        $shop = Factory::create('Shop', ['user_id' => $user->id]);

        $owner = $shop->owner();

        $this->assertEquals($user, $owner);
    }

}