<?php namespace App\Models\Product;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Option extends BaseModel implements IOption {

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
    }

    /**
     * Returns associated Product to this Option
     *
     * @return HasMany
     */
    public function product()
    {
        return $this->belongsToMany($this->namespaceProduct . '\Product');
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
     * {@inheritdoc}
     */
    public function addValue(IOptionValue $value)
    {
        $this->values()->save($value);
    }

    /**
     * {@inheritdoc}
     */
    public function addValues($values)//TODO: how exactly?
    {
        $this->values()->saveMany($values);
    }

    /**
     * {@inheritdoc}
     */
    public function removeValue(IOptionValue $value)
    {
        $value->delete();
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
    }

    /**
     * {@inheritdoc}
     */
    /*public function hasValue(IOptionValue $value)
    {
        return $this->values->contains($value);
    }*/
}
