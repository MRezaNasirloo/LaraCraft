<?php namespace App\Models\Product;

use App\Models\BaseModel;
use App\Models\User;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use DB;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends BaseModel implements IProduct, IOwner, SluggableInterface {

    use SluggableTrait;


    /**
     * Config for slug
     *
     * @var array
     */
    protected $sluggable = [
        'build_from' => 'name',
        'save_to'    => 'slug',
    ];

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
        'description',
        'shop_id'
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
        return $this->belongsToMany($this->namespaceProduct . '\Option', 'product_option')->withTimestamps();
    }

    /**
     * {@inheritdoc}
     */
    public function productOptions()
    {
        return $this->hasMany($this->namespaceProduct . '\ProductOption');
    }

    /**
     * {@inheritdoc}
     */
    public function addOption(IOption $option)
    {
        $this->options()->save($option);
    }

    /**
     * {@inheritdoc}
     */
    public function addOptions($options)
    {
        /*$ids = [];//Attach associate or save? The answer is attach use the ids to relate map the rows together, However save() and saveMany use the actual object.
        foreach($options as $option) {
            $ids[] = $option->id;
        }*/
        $this->isArrayOfIClass($options, $this->namespaceProduct . '\IOption');
        $this->options()->saveMany($options);
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
     * {@inheritdoc}
     */
    public function variations()
    {
        return $this->hasMany($this->namespaceProduct . '\Variation');
    }

    /**
     * {@inheritdoc}
     */
    public function addVariation(IVariation $variation)
    {
        $this->variations()->save($variation);
    }

    /**
     * Returns the owner of this Model
     *
     * @return User
     */
    public function owner()
    {
       return $this->shop()->first()->user()->first();
    }

    public function photos()
    {
        return $this->morphMany($this->namespaceModels . '\Photo', 'imageable');
    }

    /**
     * Returns the associated Category to this Product.
     *
     * @return BelongsTo
     */
    public function category()
    {
        return $this->belongsTo($this->namespaceModels . '\Category');
    }

    /**
     * Returns true if the current User owns this Model
     *
     * @return bool
     */
    /*public function isOwner()
    {
        if(\Auth::user() == $this->owner())
            return true;
        return false;
    }*/


}


