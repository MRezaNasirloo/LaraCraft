<?php
/**
 * Created by PhpStorm.
 * User: Mamareza
 * Date: 2015-03-08
 * Time: 1:25 AM
 */

namespace Tests;


use App\Models\Product\OptionValue;
use Laracasts\TestDummy\Factory;

class OptionValueTest extends DBTestCase {

    /** @test */
    public function its_value_attribute_is_mutable()
    {
        $optionValue = Factory::create('OptionValue');
        $optionValue->setValue('value');
        $optionValue->save();
        $optionValue = OptionValue::find(1);
        $this->assertEquals('value', $optionValue->getValue());
    }

    /** @test */
    public function its_option_method_should_return_an_option_instance()
    {
        $option = Factory::create('Option');
        $optionValue = new OptionValue(['option_id' => $option->id, 'value' => 'Yellow']);
        $optionValue->save();
        $optionValue = OptionValue::find(1);

        $option = $optionValue->option()->first();

        $this->assertInstanceOf($this->namespaceProduct . '\OptionInterface', $option);
        $this->assertEquals($option->id, $optionValue->option_id);
    }

    /** @test */
    public function its_variation_method_should_return_a_variation_instance()
    {
        $optionValue = Factory::create('OptionValue');
        $variation = Factory::create('Variation');

        $optionValue->variation()->attach($variation);

        $optionValue = OptionValue::find(1);

        $variation = $optionValue->variation()->first();

        $this->assertInstanceOf($this->namespaceProduct . '\VariationInterface', $variation);
    }

}
