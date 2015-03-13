<?php namespace App\Models\Product;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Variation extends BaseModel implements IVariation {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'variations';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'price',
        'stock'
    ];

    /**
     * Gets the price of this Variation
     *
     * @return Integer
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Sets the price of this Variation
     *
     * @param Integer $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * Gets the stock count of this Variation
     *
     * @return Integer
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * Sets the stock count of this Variation
     *
     * @param Integer $count
     */
    public function setStock($count)
    {
        $this->stock = $count;
    }

    public function product()
    {
        return $this->belongsTo($this->namespaceProduct . '\Product');
    }

    /**
     * Return the OptionValues associated with this Variation
     *
     * @return BelongsToMany
     */
    public function optionValues()
    {
        return $this->belongsToMany($this->namespaceProduct . '\OptionValue', 'variation_option_value', 'variation_id', 'value_id')->withTimestamps();
    }

    /**
     * Adds a Value associated with this Variation and Option
     *
     * @param IOptionValue $optionValue
     */
    public function addOptionValue(IOptionValue $optionValue)
    {
        $this->optionValues()->save($optionValue);
    }

    /**
     * Adds IOptionValues associated with this Variation
     *
     * @param array IOptionValue $optionValue
     */
    public function addOptionValues($optionValues)
    {
        $this->isArrayOfIClass($optionValues, $this->namespaceProduct . '\IOptionValue');

        $this->optionValues()->saveMany($optionValues);
    }
}
