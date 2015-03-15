<?php namespace Tests;

use App\Models\Product\OptionValue;
use Laracasts\TestDummy\Factory;

class ProductOptionTest extends DBTestCase {

    /** @test */
    public function it_should_return_an_instance_of_product_option()
    {
        $productOption = Factory::create('ProductOption');

        $this->assertInstanceOf($this->namespaceProduct . '\IProductOption', $productOption);
    }

    /** @test */
    public function its_add_option_value_method_should_add_a_option_value()
    {
        $optionValue = Factory::create('OptionValue');
        $productOption = Factory::create('ProductOption');

        $productOption->addOptionValue($optionValue);

        $optionValue = $productOption->optionValues()->first();

        $this->assertInstanceOf($this->namespaceProduct . '\IOptionValue', $optionValue);

    }

    /** @test */
    public function its_add_option_values_method_should_add_option_values()
    {
        $optionValues = Factory::times(5)->create('OptionValue');
        $productOption = Factory::create('ProductOption');

        $optionValues = $this->collectionToArray($optionValues);

        $productOption->addOptionValues($optionValues);

        $optionValues = $productOption->optionValues()->get();

        $this->assertNotEmpty($optionValues);

        $optionValues = $this->collectionToArray($optionValues);

        $this->assertContainsOnlyInstancesOf($this->namespaceProduct . '\IOptionValue', $optionValues);

    }


}
