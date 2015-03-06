<?php namespace App\Models\Product;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Option extends BaseModel implements OptionInterface{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'options';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * {@inheritdoc}
     */
    public function setName($name)
    {
        $this->name = $name;
        //return $this;
    }

    /**
     * Returns associated Product to this Option
     *
     * @return HasMany
     */
    public function product()
    {
        return $this->belongsTo($this->namespaceProduct . '\Product');
    }

    /**
     * Returns associated OptionValue to this Option
     *
     * @return HasMany
     */
    public function values()
    {
        return $this->hasMany($this->namespaceProduct . '\Value');
    }

    /**
     * {@inheritdoc}
     */
    public function addValue(OptionValueInterface $value)
    {
        $this->values()->save($value);
        //return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function addValues($value)//TODO: how exactly?
    {
        $this->values()->saveMany($value);
        //return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function removeValue(OptionValueInterface $value)
    {
        $value->delete();
        //return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function removeAllValues()
    {
        foreach($this->values as $value)
        {
            $value->delete();
        }

        //return $this;
    }

    /**
     * {@inheritdoc}
     */
    /*public function hasValue(OptionValueInterface $value)
    {
        return $this->values->contains($value);
    }*/
}
