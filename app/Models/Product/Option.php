<?php namespace App\Models\Product;

use App\Models\BaseModel;

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
        'name',
        'by_admin'
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
     * {@inheritdoc}
     */
    /*public function setByAdminAttribute($value)
    {
        $this->attributes['by_admin'] = $value ? : false;
    }*/

    /**
     * {@inheritdoc}
     */
    public function product()
    {
        return $this->belongsToMany($this->namespaceProduct . '\Product', 'product_option')->withTimestamps();
    }

    /**
     * {@inheritdoc}
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
    public function addValues($values)
    {
        $this->isArrayOfIClass($values, $this->namespaceProduct . '\IOptionValue');
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
