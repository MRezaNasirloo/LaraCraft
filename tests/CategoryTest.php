<?php namespace Tests;


use App\Models\Category;
use Laracasts\TestDummy\Factory;

class CategoryTest extends DBTestCase {

    /** @test */
    public function it_should_have_type_category()
    {
        $root = Category::create(['name' => 'Root Category']);
        $this->assertInstanceOf($this->namespaceModels . '\Category', $root);
    }

    /** @test */
    public function it_should_relate_to_some_products()
    {
        $root = Category::create(['name' => 'Root Category']);
        $product = Factory::create('Product');

        $root->products()->save($product);

        $this->assertEquals($root->id, $product->category_id);
    }
}
