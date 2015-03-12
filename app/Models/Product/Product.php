<?php namespace App\Models\Product;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends BaseModel implements IProduct {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'products';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'photo_product',
        'description'
    ];

    /**
     * {@inheritdoc}
     */
    public function shop()
    {
        return $this->belongsTo($this->namespaceModels . '\Shop');
    }

    /**
     * {@inheritdoc}
     */
    public function options()
    {
        return $this->belongsToMany($this->namespaceProduct . '\Option');
    }

    /**
     * {@inheritdoc}
     */
    public function addOption(IOption $option)
    {
        $this->options()->save($option);//TODO: Attach associate or save?
    }


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
     * Returns the Variations associated to this {@link App\Models\Product\Product}
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function variations()
    {
        return $this->hasMany($this->namespaceProduct . '\Variation');
    }
}
