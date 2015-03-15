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
     * {@inheritdoc}
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * {@inheritdoc}
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * {@inheritdoc}
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * {@inheritdoc}
     */
    public function setStock($count)
    {
        $this->stock = $count;
    }

    /**
     * {@inheritdoc}
     */
    public function product()
    {
        return $this->belongsTo($this->namespaceProduct . '\Product');
    }

    /**
     * {@inheritdoc}
     */
    public function optionValues()
    {
        return $this->belongsToMany($this->namespaceProduct . '\OptionValue', 'variation_option_value', 'variation_id', 'value_id')->withTimestamps();
    }

    /**
     * {@inheritdoc}
     */
    public function addOptionValue(IOptionValue $optionValue)
    {
        $this->optionValues()->save($optionValue);
    }

    /**
     * {@inheritdoc}
     */
    public function addOptionValues($optionValues)
    {
        $this->isArrayOfIClass($optionValues, $this->namespaceProduct . '\IOptionValue');

        $this->optionValues()->saveMany($optionValues);
    }
}
