<?php
/**
 * Created by PhpStorm.
 * User: Mamareza
 * Date: 2015-03-05
 * Time: 11:18 PM
 */

namespace app\Models\Product;


use Illuminate\Database\Eloquent\Relations\HasMany;

interface VariationInterface {

    /**
     * Gets the price of this Variation
     *
     * @return Integer
     */
    public function getPrice();

    /**
     * Sets the price of this Variation
     *
     * @param Integer $price
     */
    public function setPrice($price);

    /**
     * Gets the stock count of this Variation
     *
     * @return Integer
     */
    public function getStock();

    /**
     * Sets the stock count of this Variation
     *
     * @param Integer $count
     */
    public function setStock($count);

    /**
     * Return the OptionValues associated with this Variation
     *
     * @return HasMany
     */
    public function values();

    /**
     * Return the OptionValues associated with this Variation
     *
     * @return
     */
    //public function options();

    /**
     * Adds a Value associated with this Variation and Option
     *
     * @param OptionValueInterface $optionValue
     */
    public function addOptionValue(OptionValueInterface $optionValue);

    /**
     * Adds an Option associated with this Variation
     *
     * @param OptionInterface $option
     * @param String $value
     * @internal param OptionValueInterface $optionValue
     */
    //public function addOption(OptionInterface $option, $value);

}