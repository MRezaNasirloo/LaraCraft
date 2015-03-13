<?php namespace App\Models\Product;


use Illuminate\Support\Collection;

class VariationGenerator extends BaseGenerator implements IGenerator {


    /**
     * Generate all possible variation from Product using its Options and OptionValues.
     *
     * @param IProduct $product
     * @return Collection of Variation
     */
    public static function generate(IProduct $product)
    {
        $options = $product->options()->get();
        $optionValues = [];
        foreach ($options as $option) {
            $optionValues[] = $option->values()->get()->all();
        }

        $optionValuesCartesian = self::cartesianProduct($optionValues);

        foreach($optionValuesCartesian as $optionValues){
            $variation = new Variation(['price' =>  0, 'stock'  =>  1]);
            $product->addVariation($variation);
            if(!empty($optionValues))
                $variation->addOptionValues($optionValues);
        }
    }

    /**
     *
     * @param array $set
     * @return array
     */
    protected static function cartesianProduct($set){

        if(empty($set))
            return [[]];
        $subset = array_shift($set);
        $cartesianSubsets = static::cartesianProduct($set);
        $result = [];
        foreach($subset as $value){
            foreach($cartesianSubsets as $cartesianSubset){
                array_unshift($cartesianSubset , $value);
                $result [] = $cartesianSubset;
            }
        }
        return $result;
    }
}












