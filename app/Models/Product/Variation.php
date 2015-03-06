<?php namespace App\Models\Product;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Variation extends BaseModel implements VariationInterface {

	//

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

    /**
     * Return the OptionValues associated with this Variation
     *
     * @return HasMany
     */
    public function optionValues()
    {
        return $this->hasMany($this->namespaceroduct . '\OptionValue');
    }

    /**
     * Adds a Value associated with this Variation and Option
     *
     * @param OptionValueInterface $optionValue
     */
    public function addOptionValue(OptionValueInterface $optionValue)
    {
        $this->optionValues()->save($optionValue);
        return $this;
    }

    /**
     * Adds an Option associated with this Variation
     *
     * @param OptionValueInterface $optionValue
     */
    public function addOption(OptionInterface $option, $value)
    {
       // $this->optionValues()->option()->save($option);
        $this->options()->attach($option, ['value'  =>  $value]);
    }

    /**
     * Return the Options associated with this Variation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function options()
    {
        return $this->belongsToMany($this->namespaceProduct . '\Option','option_value')->withPivot('value')->withTimestamps();
    }
}
