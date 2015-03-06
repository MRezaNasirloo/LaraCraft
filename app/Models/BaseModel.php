<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BaseModel extends Model {

	use SoftDeletes;

    protected $namespaceModels = 'App\Models';
    protected $namespaceProduct = 'App\Models\Product';

}