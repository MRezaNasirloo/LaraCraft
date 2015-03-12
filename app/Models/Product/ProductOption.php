<?php namespace App\Models\Product;

use App\Models\BaseModel;

class ProductOption extends BaseModel implements IProductOption {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'product_option';


    /**
     * Get Option name
     *
     * @return String
     */
    public function getName()
    {
        // TODO: Implement getName() method.
    }

    /**
     * Set Option name
     *
     * @param $name
     * @return String
     */
    public function setName($name)
    {
        // TODO: Implement setName() method.
    }

    /**
     * Returns associated OptionValue to this Option
     *
     * @return HasMany
     */
    public function product()
    {
        // TODO: Implement product() method.
    }

    /**
     * Returns associated OptionValue to this ProductOption
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function optionValues()
    {
        //return $this->hasMany($this->namespaceProduct . '\ProductOptionValue', 'product_option_value');
        return $this->belongsToMany($this->namespaceProduct . '\OptionValue', 'product_option_value', 'product_option_id', 'value_id')->withTimestamps();
    }

    /**
     * Adds an OptionValue for an Option
     *
     * @param IOptionValue $value
     */
    public function addOptionValue(IOptionValue $value)
    {
        $this->optionValues()->save($value);
    }

    /**
     * Adds many OptionValue for an Option
     *
     * @param IOptionValue $value
     */
    public function addOptionValues($values)
    {
        $this->isArrayOfIClass($values, $this->namespaceProduct . '\IOptionValue');
        $this->optionValues()->saveMany($values);
    }

    /**
     * Removes option value.
     *
     * @param IOptionValue $optionValue
     */
    public function removeOptionValue(IOptionValue $value)
    {
        // TODO: Implement removeValue() method.
    }

    /**
     * Removes all option values.
     *
     */
    public function removeAllOptionValues()
    {
        // TODO: Implement removeAllValues() method.
    }
}
