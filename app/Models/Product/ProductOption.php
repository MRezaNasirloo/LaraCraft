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
     * {@inheritdoc}
     */
    public function optionValues()
    {
        return $this->belongsToMany($this->namespaceProduct . '\OptionValue', 'product_option_value', 'product_option_id', 'value_id')->withTimestamps();
    }

    /**
     * {@inheritdoc}
     */
    public function addOptionValue(IOptionValue $value)
    {
        $this->optionValues()->save($value);
    }

    /**
     * {@inheritdoc}
     */
    public function addOptionValues($values)
    {
        $this->isArrayOfIClass($values, $this->namespaceProduct . '\IOptionValue');
        $this->optionValues()->saveMany($values);
    }

    /**
     * {@inheritdoc}
     */
    public function removeOptionValue(IOptionValue $value)
    {
        // TODO: Implement removeValue() method.
    }

    /**
     * {@inheritdoc}
     */
    public function removeAllOptionValues()
    {
        // TODO: Implement removeAllValues() method.
    }
}
