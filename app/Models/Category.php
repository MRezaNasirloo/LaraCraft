<?php namespace App\Models;


use Baum\Node;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Node {

    /**
     * Table name
     *
     * @var String
     */
    protected $table = 'categories';

    /**
     * Column to perform the default sorting
     *
     * @var String
     */
    protected $orderColumn = null;

    /**
     * Returns the associated Products to this Category
     *
     * @return HasMany
     */
    public function products()
    {
        return $this->hasMany('App\Models\Product\Product');
    }

}
