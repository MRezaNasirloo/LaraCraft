<?php
/**
 * Created by PhpStorm.
 * User: Mamareza
 * Date: 2015-03-07
 * Time: 7:57 PM
 */

namespace tests;


use App\Models\Product\Option;
use App\Models\Product\OptionValue;
use Laracasts\TestDummy\Factory;

class OptionTest extends DBTestCase {


    /** @test */
    public function its_name_attribute_is_mutable()
    {
        $option = Factory::create('Option');
        $option->setName('Attribute');
        $option->save();
        $option = Option::find(1);
        $this->assertEquals('Attribute', $option->getName());
    }

    /** @test */
    public function its_product_method_should_return_a_product()
    {
        $option = Factory::create('Option');
        $product= $option->product()->first();
        $this->assertInstanceOf($this->namespaceProduct . '\ProductInterface', $product);
        $this->assertEquals($option->product_id, $product->id);
    }

    /** @test */
    public function its_values_method_should_return_option_value()
    {
        $option = Factory::create('Option');
        $optionValue = new OptionValue(['option_id' => $option->id, 'value' => 'Yellow']);
        $optionValue->save();

        $opVal= $option->values()->first();

        $this->assertInstanceOf($this->namespaceProduct . '\OptionValueInterface', $opVal);
        $this->assertEquals($option->id, $opVal->option_id);
    }

    /** @test */
    public function its_add_value_method_should_add_an_option_value()
    {
        $option = Factory::create('Option');
        $optionValue = new OptionValue(['value' => 'Yellow']);
        $option->addValue($optionValue);

        $opVal= $option->values()->first();

        $this->assertInstanceOf($this->namespaceProduct . '\OptionValueInterface', $opVal);
        $this->assertEquals($option->id, $opVal->option_id);
    }

    /** @test */
    public function its_add_values_method_should_add_option_values()
    {
        $option = Factory::create('Option');
        $optionValue = [
            new OptionValue(['value' => 'Yellow']),
            new OptionValue(['value' => 'Red']),
            new OptionValue(['value' => 'Blue']),
            new OptionValue(['value' => 'Orange']),
            new OptionValue(['value' => 'Black']),
            new OptionValue(['value' => 'White']),
            new OptionValue(['value' => 'Pink'])
        ];
        $option->addValues($optionValue);

        $optionValues = $option->values()->get();
        $values = [];
        foreach($optionValues as $optionValue ){
            $values[] = $optionValue;
        }
//        var_dump($values);
        $this->assertContainsOnlyInstancesOf($this->namespaceProduct . '\OptionValueInterface', $values);

        $optionValue = $option->values()->first();
        $this->assertInstanceOf($this->namespaceProduct . '\OptionValueInterface', $optionValue);
        $this->assertEquals($option->id, $optionValue->option_id);
    }

    /** @test */
    public function its_remove_value_method_should_remove_an_option_value()
    {
        $option = Factory::create('Option');
        $optionValue = new OptionValue(['value' => 'Yellow']);
        $option->addValue($optionValue);

        $opVal= $option->values()->first();

        $this->assertInstanceOf($this->namespaceProduct . '\OptionValueInterface', $opVal);
        $this->assertEquals($option->id, $opVal->option_id);

        $option->removeValue($optionValue);
        $this->assertNull($option->values()->first());
    }

    /** @test */
    public function its_remove_all_values_method_should_removes_all_option_values()
    {
        $option = Factory::create('Option');
        $optionValue = [
            new OptionValue(['value' => 'Yellow']),
            new OptionValue(['value' => 'Red']),
            new OptionValue(['value' => 'Blue']),
            new OptionValue(['value' => 'Orange']),
            new OptionValue(['value' => 'Black']),
            new OptionValue(['value' => 'White']),
            new OptionValue(['value' => 'Pink'])
        ];
        $option->addValues($optionValue);

        $optionValues = $option->values()->get();
        $values = [];
        foreach($optionValues as $optionValue ){
            $values[] = $optionValue;
        }
//        var_dump($values);
        $this->assertContainsOnlyInstancesOf($this->namespaceProduct . '\OptionValueInterface', $values);

        $optionValue = $option->values()->first();
        $this->assertInstanceOf($this->namespaceProduct . '\OptionValueInterface', $optionValue);
        $this->assertEquals($option->id, $optionValue->option_id);

        $option->removeAllValues($optionValue);
        $this->assertNull($option->values()->first());


    }

}
