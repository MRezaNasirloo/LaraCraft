<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Psy\Test\CodeCleaner\AssignThisVariablePassTest;

class Shop extends BaseModel {

	protected $table = 'shops';

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

}
