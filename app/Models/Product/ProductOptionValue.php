<?php namespace App\App\Models\Product;

use App\Models\BaseModel;
use app\Models\Product\IProductOptionValue;

class ProductOptionValue extends BaseModel implements IProductOptionValue {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'product_option_value';

}
