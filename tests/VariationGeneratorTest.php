<?php namespace Tests;

use App\Models\Product\Option;
use App\Models\Product\OptionValue;
use App\Models\Product\VariationGenerator;
use Laracasts\TestDummy\Factory;

class VariationGeneratorTest extends DBTestCase {

    /** @test */
    public function it_generate_variation_from_a_products_options_and_values()
    {
        $option        = Factory::create('Option', [
            'name'      =>  'Color',
            'by_admin'  =>  true,
        ]);

        $optionValues = [
            new OptionValue(['value' => 'Yellow',   'by_admin'  => true]),
            new OptionValue(['value' => 'Red',      'by_admin'  => true]),
            new OptionValue(['value' => 'Blue',     'by_admin'  => true]),
            new OptionValue(['value' => 'Orange',   'by_admin'  => true]),
            new OptionValue(['value' => 'Black',    'by_admin'  => true]),
            new OptionValue(['value' => 'White',    'by_admin'  => true]),
            new OptionValue(['value' => 'Pink',     'by_admin'  => true])
        ];

        $option->addValues($optionValues);
        //This is what we have in our database
        $option = 'Color';
        $optionValues = ['Black', 'Darker'];

        $option = Option::firstOrCreate(['name' => $option]);
        $optionValuesObj = [];
        foreach($optionValues as $optionValue){
            if (OptionValue::where('value', $optionValue)->where('option_id', $option->id)) {
                $optionValuesObj [] = new OptionValue(['value' => $optionValue]);
            }
        }

        $option->addValues($optionValuesObj);
        $product = Factory::create('Product');
        $product->addOption($option);
        $productOption = $product->productOptions()->first();
        $productOption->addOptionValues($optionValuesObj);

        VariationGenerator::generate($product);

        $variations = $product->variations()->get();

        $optionValues = $variations->first()->optionValues();

        $this->assertEquals(1, $optionValues->count());
        $this->assertNotTrue($variations->isEmpty());
        $this->assertEquals(2, $variations->count());

    }

    /** @test */
    public function it_generate_variation_from_a_products_options_and_values_many_version()
    {
        $option        = Factory::create('Option', [
            'name'      =>  'Color',
            'by_admin'  =>  true,
        ]);

        $optionValues = [
            new \App\Models\Product\OptionValue(['value' => 'Yellow',   'by_admin'  => true]),
            new \App\Models\Product\OptionValue(['value' => 'Red',      'by_admin'  => true]),
            new \App\Models\Product\OptionValue(['value' => 'Blue',     'by_admin'  => true]),
            new \App\Models\Product\OptionValue(['value' => 'Orange',   'by_admin'  => true]),
            new \App\Models\Product\OptionValue(['value' => 'Black',    'by_admin'  => true]),
            new \App\Models\Product\OptionValue(['value' => 'White',    'by_admin'  => true]),
            new \App\Models\Product\OptionValue(['value' => 'Pink',     'by_admin'  => true])
        ];

        $option->addValues($optionValues);
        //This is what we have in our database
        $options_optionValues = [
            'Color' => ['Black', 'Light Blue'],
            'Size'  => ['L','XL' ,'XXL']

        ];
        $product = Factory::create('Product');


        foreach($options_optionValues as $key => $options){
            $optionValueTemp = [];
            $optionTemp = \App\Models\Product\Option::firstOrCreate(['name' => $key]);
            foreach($options as $optionValue){
                $optionValueTemp[] = \App\Models\Product\OptionValue::firstOrCreate([
                    'value' => $optionValue,
                    'option_id' => $optionTemp->id
                ]);
                //$optionTemp->addValues($optionValueTemp);
            }

            $product->addOption($optionTemp);
            $productOption = $product->productOptions()->where('option_id', $optionTemp->id)->first();
            $productOption->addOptionValues($optionValueTemp);
        }

        \App\Models\Product\VariationGenerator::generate($product);

        $variations = $product->variations()->get();

        $optionValues = $variations->first()->optionValues();

        $this->assertEquals(2, $optionValues->count());
        $this->assertNotTrue($variations->isEmpty());
        $this->assertEquals(6, $variations->count());

    }

    /** @test */
    public function it_generate_variation_from_a_products_options_and_values_single()
    {
        $product        = Factory::create('Product');
        $option         = Factory::create('Option');
        $optionValue    = Factory::create('OptionValue');

        $option->addValue($optionValue);
        $product->addOption($option);

        $productOption = $product->productOptions()->where('option_id', $option->id)->first();
        $productOption->addOptionValue($optionValue);

        VariationGenerator::generate($product);

        $variations = $product->variations()->get();

        $optionValues = $variations->first()->optionValues();

        $this->assertEquals(1, $optionValues->count());
        $this->assertNotTrue($variations->isEmpty());
        $this->assertEquals(1, $variations->count());

    }

    /** @test */
    public function it_generate_variation_from_a_product_without_any_option()
    {
        $product = Factory::create('Product');

        VariationGenerator::generate($product);

        $variations = $product->variations()->get();

        $optionValues = $variations->first()->optionValues();

        $this->assertEquals(0, $optionValues->count());
        $this->assertNotTrue($variations->isEmpty());
        $this->assertEquals(1, $variations->count());

    }

    /** @test */
    public function it_generate_variation_from_a_product_without_any_optionValues()
    {
        $product = Factory::create('Product');
        $option = Factory::create('Option');

        $product->addOption($option);


        VariationGenerator::generate($product);

        $variations = $product->variations()->get();

        $optionValues = $variations->first()->optionValues();

        $this->assertEquals(0, $optionValues->count());
        $this->assertNotTrue($variations->isEmpty());
        $this->assertEquals(1, $variations->count());

    }



}
