<?php namespace App\Models\Product;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\HasOne;

class OptionValue extends BaseModel implements OptionValueInterface{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'values';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'value'
    ];

    /**
     * {@inheritdoc}
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * {@inheritdoc}
     */
    public function setValue($value)
    {
        $this->value = $value;
    }


    /**
     * {@inheritdoc}
     */
    public function option()
    {
        return $this->belongsTo($this->namespaceProduct . '\Option');
    }

    /**
     * {@inheritdoc}
     */
    public function variation()
    {
        return $this->belongsToMany($this->namespaceProduct . '\Variation', 'variation_option_value', 'value_id', 'variation_id')->withTimestamps();
    }
}
