<?php namespace App\Models;


use Baum\Node;

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
     * @var string
     */
    protected $orderColumn = null;

    public function products()
    {
        return $this->hasMany('App\Models\Product\Product');
    }

}
