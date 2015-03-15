<?php namespace Tests;

/**
 * Created by PhpStorm.
 * User: Mamareza
 * Date: 2015-03-07
 * Time: 7:57 PM
 */

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
        $product = Factory::create('Product');
        $product->addOption($option);
        $product= $option->product()->first();
        $this->assertInstanceOf($this->namespaceProduct . '\IProduct', $product);
    }

    /** @test */
    public function its_values_method_should_return_option_value()
    {
        $option = Factory::create('Option');
        $optionValue = new OptionValue(['option_id' => $option->id, 'value' => 'Yellow', 'by_admin' => false]);

        $optionValue->save();

        $opVal= $option->values()->first();

        $this->assertInstanceOf($this->namespaceProduct . '\IOptionValue', $opVal);
        $this->assertEquals($option->id, $opVal->option_id);
    }

    /** @test */
    public function its_add_value_method_should_add_an_option_value()
    {
        $option = Factory::create('Option');
        $optionValue = new OptionValue(['value' => 'Yellow', 'by_admin' => false]);
        $option->addValue($optionValue);

        $opVal= $option->values()->first();

        $this->assertInstanceOf($this->namespaceProduct . '\IOptionValue', $opVal);
        $this->assertEquals($option->id, $opVal->option_id);
    }

    /** @test */
    public function its_add_values_method_should_add_option_values()
    {
        $option = Factory::create('Option');
        $optionValue = [
            new OptionValue(['value' => 'Yellow',   'by_admin'  => false]),
            new OptionValue(['value' => 'Red',      'by_admin'  => true]),
            new OptionValue(['value' => 'Blue',     'by_admin'  => false]),
            new OptionValue(['value' => 'Orange',   'by_admin'  => false]),
            new OptionValue(['value' => 'Black',    'by_admin'  => true]),
            new OptionValue(['value' => 'White',    'by_admin'  => true]),
            new OptionValue(['value' => 'Pink',     'by_admin'  => false])
        ];
        $option->addValues($optionValue);

        $optionValues = $option->values()->get();
        $values = $this->collectionToArray($optionValues);

        $this->assertNotEmpty($values);
        $this->assertContainsOnlyInstancesOf($this->namespaceProduct . '\IOptionValue', $values);

        $optionValue = $option->values()->first();
        $this->assertNotEmpty($optionValue);
        $this->assertInstanceOf($this->namespaceProduct . '\IOptionValue', $optionValue);
        $this->assertEquals($option->id, $optionValue->option_id);
    }

    /** @test */
    public function its_remove_value_method_should_remove_an_option_value()
    {
        $option = Factory::create('Option');
        $optionValue = new OptionValue(['value' => 'Yellow', 'by_admin' => false]);
        $option->addValue($optionValue);

        $opVal= $option->values()->first();

        $this->assertInstanceOf($this->namespaceProduct . '\IOptionValue', $opVal);
        $this->assertEquals($option->id, $opVal->option_id);

        $option->removeValue($optionValue);
        $this->assertNull($option->values()->first());
    }

    /** @test */
    public function its_remove_all_values_method_should_removes_all_option_values()
    {
        $option = Factory::create('Option');
        $optionValue = [
            new OptionValue(['value' => 'Yellow',   'by_admin'  => false]),
            new OptionValue(['value' => 'Red',      'by_admin'  => true]),
            new OptionValue(['value' => 'Blue',     'by_admin'  => false]),
            new OptionValue(['value' => 'Orange',   'by_admin'  => false]),
            new OptionValue(['value' => 'Black',    'by_admin'  => true]),
            new OptionValue(['value' => 'White',    'by_admin'  => true]),
            new OptionValue(['value' => 'Pink',     'by_admin'  => false])
        ];
        $option->addValues($optionValue);

        $optionValues = $option->values()->get();

        $values = $this->collectionToArray($optionValues);
        $this->assertNotEmpty($values);
        $this->assertContainsOnlyInstancesOf($this->namespaceProduct . '\IOptionValue', $values);

        $optionValue = $option->values()->first();
        $this->assertNotEmpty($optionValue);
        $this->assertInstanceOf($this->namespaceProduct . '\IOptionValue', $optionValue);
        $this->assertEquals($option->id, $optionValue->option_id);

        $option->removeAllValues($optionValue);
        $this->assertNull($option->values()->first());


    }

    /** @test */
    public function its_by_admin_value_defaults_to_false()
    {
        Option::create(['name' => 'Color']);
        $option = Option::where('name' , 'Color')->first();
        $this->assertEquals(0, $option->by_admin);
    }

}
