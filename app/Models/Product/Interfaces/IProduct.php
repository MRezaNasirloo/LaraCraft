<?php namespace App\Models\Product;


use Illuminate\Database\Eloquent\Relations\BelongsTo;

interface IProduct {

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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function options();

    /**
     * Returns the ProductOptions associated to this {@link App\Models\Product\Product}
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productOptions();

    /**
     * Returns the Variations associated to this {@link App\Models\Product\Product}
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function variations();

    /**
     * Adds a Variation for to this {@link App\Models\Product\Product}
     * @param IVariation $variation
     * @return
     */
    public function addVariation(IVariation $variation);

    /**
     * Associate an Option to this {@link App\Models\Product\Product}
     *
     * @param IOption $option
     */
    public function addOption(IOption $option);

    /**
     * Associate Options to this {@link App\Models\Product\Product}
     *
     * @param $options
     * @return
     * @internal param IOption $array $option
     */
    public function addOptions($options);

}