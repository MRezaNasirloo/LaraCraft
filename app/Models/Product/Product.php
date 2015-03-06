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
        return $this->belongsToMany($this->namespaceProduct . '\Option', 'product_option');
    }

    /**
     * {@inheritdoc}
     */
    public function addOption(OptionInterface $option)
    {
        $this->options()->attach($option);
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

}
