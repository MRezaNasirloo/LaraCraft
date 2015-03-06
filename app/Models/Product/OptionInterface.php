<?php
/**
 * Created by PhpStorm.
 * User: Mamareza
 * Date: 2015-03-05
 * Time: 11:17 PM
 */

namespace app\Models\Product;


use Illuminate\Database\Eloquent\Relations\HasMany;

interface OptionInterface {

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
    public function values();

    /**
     * Adds an OptionValue for an Option
     *
     * @param OptionValueInterface $value
     */
    public function addValue(OptionValueInterface $value);

    /**
     * Adds many OptionValue for an Option
     *
     * @param OptionValueInterface $value
     */
    public function addValues(OptionValueInterface $value);

    /**
     * Removes option value.
     *
     * @param OptionValueInterface $optionValue
     */
    public function removeValue(OptionValueInterface $value);

    /**
     * Removes all option values.
     *
     */
    public function removeAllValues();

    /**
     * Checks whether option has given value.
     *
     * @param OptionValueInterface $optionValue
     *
     * @return Boolean
     */
    //public function hasValue(OptionValueInterface $value);

    /**
     * @return mixed
     */
    //public function variations();

}