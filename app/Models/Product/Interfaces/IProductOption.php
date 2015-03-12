<?php
/**
 * Created by PhpStorm.
 * User: Mamareza
 * Date: 2015-03-12
 * Time: 2:27 PM
 */

namespace App\Models\Product;


interface IProductOption {

    /**
     * Get Option name
     *
     * @return String
     */
    public function getName();

    /**
     * Set Option name
     *
     * @param $name
     * @return String
     */
    public function setName($name);

    /**
     * Returns associated OptionValue to this Option
     *
     * @return HasMany
     */
    public function product();

    /**
     * Returns associated OptionValue to this Option
     *
     * @return HasMany
     */
    public function optionValues();

    /**
     * Adds an OptionValue for an Option
     *
     * @param IOptionValue $value
     */
    public function addOptionValue(IOptionValue $value);

    /**
     * Adds many OptionValues for an ProductOption
     *
     * @param IOptionValue $value
     */
    public function addOptionValues($values);

    /**
     * Removes option value.
     *
     * @param IOptionValue $optionValue
     */
    public function removeOptionValue(IOptionValue $value);

    /**
     * Removes all option values.
     *
     */
    public function removeAllOptionValues();

    /**
     * Checks whether option has given value.
     *
     * @param IOptionValue $optionValue
     *
     * @return Boolean
     */
    //public function hasValue(OptionValueInterface $value);

    /**
     * @return mixed
     */
    //public function variations();

}