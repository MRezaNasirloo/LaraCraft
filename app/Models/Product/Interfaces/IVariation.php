<?php namespace App\Models\Product;


use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
     * Returns the associated Product to this Variation
     *
     * @return BelongsTO
     */
    public function product();

    /**
     * Return the OptionValues associated with this Variation
     *
     * @return BelongsToMany
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
     * Return the Options associated with this Variation
     *
     * @return
     */
    //public function options();




}