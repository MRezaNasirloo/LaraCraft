<?php namespace Tests;

use App\Models\Product\VariationGenerator;
use Laracasts\TestDummy\Factory;

class VariationGeneratorTest extends DBTestCase {

    /** @test */
    public function it_generate_variation_from_a_products_options_and_values()
    {
        $product = Factory::create('Product');
        $options = Factory::times(2)->create('Option');

        foreach ($options as $option) {
            $option->addValues(Factory::times(3)->create('OptionValue')->all());
        }

        $options = $options->all();
        $product->addOptions($options);

        VariationGenerator::generate($product);

        $variations = $product->variations()->get();

        $optionValues = $variations->first()->optionValues();

        $this->assertEquals(2, $optionValues->count());
        $this->assertNotTrue($variations->isEmpty());
        $this->assertEquals(9, $variations->count());

    }

    /** @test */
    public function it_generate_variation_from_a_products_options_and_values_single()
    {
        $product = Factory::create('Product');
        $option  = Factory::create('Option');

        $option->addValue(Factory::create('OptionValue'));

        $product->addOption($option);

        VariationGenerator::generate($product);

        $variations = $product->variations()->get();

        $optionValues = $variations->first()->optionValues();

        $this->assertEquals(1, $optionValues->count());
        $this->assertNotTrue($variations->isEmpty());
        $this->assertEquals(1, $variations->count());

    }



}
