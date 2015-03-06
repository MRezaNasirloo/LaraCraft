<?php
/**
 * Created by PhpStorm.
 * User: Mamareza
 * Date: 2015-03-05
 * Time: 11:17 PM
 */

namespace app\Models\Product;


use Illuminate\Database\Eloquent\Relations\BelongsTo;

interface ProductInterface {

    /**
     * Get Product name
     *
     * @return String
     */
    public function getName();

    /**
     * Set Product name
     *
     * @param $name
     * @return String
     */
    public function setName($name);

    /**
     * Returns the {@link App\Models\Shop} associated to user
     *
     * @return BelongsTo
     */
    public function shop();

    /**
     * Returns the Options associated to this {@link App\Models\Product\Product}
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function options();

    /**
     * Returns the Variations associated to this {@link App\Models\Product\Product}
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function variations();

    /**
     * Associate an Option to this {@link App\Models\Product\Product}
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function addOption(OptionInterface $option);

}