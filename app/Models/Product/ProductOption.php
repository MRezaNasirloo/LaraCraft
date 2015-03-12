<?php namespace App\App\Models\Product;

use App\Models\BaseModel;
use app\Models\Product\IProductOption;

class ProductOption extends BaseModel implements IProductOption {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'product_option';


}
