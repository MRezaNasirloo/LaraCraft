<?php namespace App\Models;


interface IFile {


    /**
     * Put the file into the Storage
     *
     * @return mixed
     */
    public function put();

    /**
     * Get the file from the Storage
     *
     * @return mixed
     */
    public function get();

    /**
     * Move the file into Storage
     *
     * @return mixed
     */
    public function move();

    /**
     * Copy the file into Storage
     *
     * @return mixed
     */
    public function copy();

}