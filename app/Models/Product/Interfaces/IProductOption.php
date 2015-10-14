<?php namespace App\Models\Product;



use Illuminate\Database\Eloquent\Relations\BelongsToMany;

interface IProductOption {


    /**
     * Returns associated OptionValue to this Option
     *
     * @return BelongsToMany
     */
    public function optionValues();

    /**
     * Adds an IOptionValue for an ProductOption
     *
     * @param IOptionValue $value
     */
    public function addOptionValue(IOptionValue $value);

    /**
     * Adds many OptionValues for an ProductOption
     *
     * @param $values
     * @return
     * @internal param IOptionValue $array $value
     */
    public function addOptionValues($values);

    /**
     * Removes an IOptionValue.
     *
     * @param IOptionValue $value
     * @return
     * @internal param IOptionValue $optionValue
     */
    public function removeOptionValue(IOptionValue $value);

    /**
     * Removes all IOptionValue.
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