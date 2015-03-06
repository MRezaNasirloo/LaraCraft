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
     * Returns associated OptionValue to this Option
     *
     * @return HasMany
     */
    public function values()
    {
        return $this->hasMany($this->namespaceProduct . '\OptionValue');
    }

    /**
     * Adds an OptionValue for an Option
     *
     * @param OptionValueInterface $value
     */
    public function addValue(OptionValueInterface $value)
    {
        $this->values()->save($value);
        //return $this;
    }

    /**
     * Adds many OptionValue for an Option
     *
     * @param OptionValueInterface $value
     */
    public function addValues(OptionValueInterface $value)//TODO: how exactly?
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
