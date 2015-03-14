<?php namespace App\Models\Product;


use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
     */
    public function setValue($value);

    /**
     * Returns the Option associated with this OptionValue
     *
     * @return BelongsTo
     */
    public function option();

    /**
     * Returns the Option associated with this OptionValue
     */
    public function ProductOption();

}