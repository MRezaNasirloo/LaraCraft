<?php namespace App\Models;

use App\Laracraft\SlugRoutes\SluggableInterface;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model implements SluggableInterface{

	protected $table = 'shops';

    protected $fillable = [
        'name',
        'user_id',
        'slug',
        'image_banner',
        'description'
    ];


    public function user()
    {
        $this->belongsTo('App\Models\User');
    }


    /**
     * Returns the name of the database column, which should be used to search
     * for a record. The column should be URL friendly and unique to avoid collisions.
     *
     * @return string
     */
    public function getSlugIdentifier()
    {
        return 'slug';
    }
}
