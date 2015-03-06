<?php namespace App\Models\Product;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends BaseModel implements ProductInterface {

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
        return $this->hasMany($this->namespaceProduct . '\Option');
    }

    /**
     * {@inheritdoc}
     */
    public function addOption(OptionInterface $option)
    {
        $this->options()->save($option);
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
        //return $this;
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
