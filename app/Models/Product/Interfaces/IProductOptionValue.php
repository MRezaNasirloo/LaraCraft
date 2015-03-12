<?php
/**
 * Created by PhpStorm.
 * User: Mamareza
 * Date: 2015-03-12
 * Time: 2:41 PM
 */

namespace app\Models\Product;


use Illuminate\Database\Eloquent\Relations\BelongsTo;

Interface IProductOptionValue {

    /**
     * Get Option name
     *
     * @return String
     */
    public function getName();

    /**
     * Set Option name
     *
     * @param $name
     * @return String
     */
    public function setName($name);

    /**
     * Returns the OptionValue of this ProductOptionValue
     *
     * @return BelongsTO
     */
    public function value();

    /**
     * Returns the Option of this ProductOptionValue
     *
     * @return morphTo
     */
    public function Option();

}