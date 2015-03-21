<?php namespace App\Models\Product;


use App\Models\User;

interface IOwner {


    /**
     * Returns the owner of this Model
     *
     * @return User
     */
    public function owner();

    /**
     * Returns true if the current User owns this Model
     *
     * @return bool
     */
//    public function isOwner();
}