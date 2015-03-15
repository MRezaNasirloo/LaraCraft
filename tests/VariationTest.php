<?php namespace Tests;


use Laracasts\TestDummy\Factory;

class VariationTest extends DBTestCase {

    /** @test */
    public function it_belongs_to_a_product()
    {
        $variation = Factory::create('Variation');
        $product = $variation->product()->first();

        $this->assertInstanceOf($this->namespaceProduct . '\Product', $product);
    }

    /** @test */
    public function its_add_option_value_method_adds_an_option_value()
    {
        $variation = Factory::create('Variation');
        $optionValue = Factory::create('OptionValue');

        $variation->addOptionValue($optionValue);

        $optionValue = $variation->optionValues()->first();

        $this->assertInstanceOf($this->namespaceProduct . '\OptionValue', $optionValue);

    }

    /** @test */
    public function its_add_option_values_method_adds_option_values()
    {
        $variation = Factory::create('Variation');
        $optionValues = Factory::times(3)->create('OptionValue');

        $optionValues = $this->collectionToArray($optionValues);

        $variation->addOptionValues($optionValues);

        $optionValues = $variation->optionValues()->get();

        $this->assertEquals(3, $optionValues->count());

        $optionValues = $this->collectionToArray($optionValues);

        $this->assertContainsOnlyInstancesOf($this->namespaceProduct . '\IOptionValue', $optionValues);

    }

}















