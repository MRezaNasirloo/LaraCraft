<?php namespace App\Models;

use App\Models\Product\IOwner;
use App\Models\Product\IProduct;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\Model;
use Psy\Test\CodeCleaner\AssignThisVariablePassTest;

class Shop extends BaseModel implements IShop, IOwner, SluggableInterface{

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
	protected $table = 'shops';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'user_id',
        'slug',
        'image_banner',
        'description'
    ];

    /**
     * Returns the User who has owned this Shop
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo($this->namespaceModels . '\User');
    }

    /**
     * Return the products which associated to this Shop
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany($this->namespaceProduct . '\Product');
    }

    /**
     * @inheritdoc
     */
    public function addProduct(IProduct $product)
    {
        $this->products()->save($product);
    }

    /**
     * Returns the owner of this Model
     *
     * @return User
     */
    public function owner()
    {
        return $this->user()->first();
    }
}
