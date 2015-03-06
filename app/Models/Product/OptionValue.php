<?php namespace App\Models\Product;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\HasOne;

class OptionValue extends BaseModel implements OptionValueInterface{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'option_value';

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
     * Returns the Option associated with this OptionValue
     *
     * @return HasOne | Option
     */
    public function option()
    {
        return $this->belongsTo($this->namespaceProduct . '\Option');
    }

    /**
     * Returns the Option associated with this OptionValue
     *
     * @return HasOne | Option
     */
    public function variation()
    {
        return $this->belongsTo($this->namespaceProduct . '\Variation');
    }
}
