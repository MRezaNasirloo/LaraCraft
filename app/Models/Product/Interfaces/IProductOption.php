<?php
/**
 * Created by PhpStorm.
 * User: Mamareza
 * Date: 2015-03-12
 * Time: 2:27 PM
 */

namespace app\Models\Product;


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
    public function values();

    /**
     * Adds an OptionValue for an Option
     *
     * @param IOptionValue $value
     */
    public function addValue(IOptionValue $value);

    /**
     * Adds many OptionValue for an Option
     *
     * @param IOptionValue $value
     */
    public function addValues($value);

    /**
     * Removes option value.
     *
     * @param IOptionValue $optionValue
     */
    public function removeValue(IOptionValue $value);

    /**
     * Removes all option values.
     *
     */
    public function removeAllValues();

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