<?php
/**
 * Created by PhpStorm.
 * User: Mamareza
 * Date: 2015-03-05
 * Time: 11:18 PM
 */

namespace App\Models\Product;


use Illuminate\Database\Eloquent\Relations\HasMany;

interface IVariation {

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
    public function optionValues();

    /**
     * Adds a IOptionValue associated with this Variation
     *
     * @param IOptionValue $optionValue
     */
    public function addOptionValue(IOptionValue $optionValue);

    /**
     * Adds IOptionValues associated with this Variation
     *
     * @param array IOptionValue $optionValue
     */
    public function addOptionValues($optionValues);

    /**
     * Return the OptionValues associated with this Variation
     *
     * @return
     */
    //public function options();


    /*
    addOption{
        $this->optionValues()->option()->save($option);
        $this->options()->attach($option, ['value'  =>  $value]);
    }*/



}