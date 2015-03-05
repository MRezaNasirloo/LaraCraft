<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model {

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
        return $this->belongsTo('App\Models\User');
    }

}
