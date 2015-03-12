<?php
/**
 * Created by PhpStorm.
 * User: Mamareza
 * Date: 2015-03-05
 * Time: 11:18 PM
 */

namespace app\Models\Product;


use Illuminate\Database\Eloquent\Relations\HasOne;

interface IOptionValue {

    /**
     * Get Option Value
     *
     * @return String
     */
    public function getValue();

    /**
     * Set Option Value
     *
     * @param $value
     * @return String
     */
    public function setValue($value);

    /**
     * Returns the Option associated with this OptionValue
     *
     * @return HasOne | Option
     */
    public function option();

    /**
     * Returns the Option associated with this OptionValue
     *
     * @return HasOne | Variation
     */
    public function variation();

}