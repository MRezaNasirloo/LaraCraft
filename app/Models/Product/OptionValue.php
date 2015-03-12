<?php namespace App\Models\Product;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\HasOne;

class OptionValue extends BaseModel implements IOptionValue{

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
        'value',
        'option_id',
        'by_admin'
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
    public function productOption()
    {
        return $this->belongsToMany($this->namespaceProduct . '\ProductOption', 'product_option_value', 'value_id','product_option_id' );
    }
}
