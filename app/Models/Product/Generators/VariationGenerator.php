<?php namespace App\Models\Product;


class VariationGenerator extends BaseGenerator implements IGenerator {


    /**
     * @inheritdoc
     */
    public static function generate(IProduct $product)
    {
        $options = $product->productOptions()->get();
        $optionValues = [];
        foreach ($options as $option) {
            $optionValues[] = $option->optionValues()->get()->all();
        }
        $optionValues = array_filter($optionValues);
        $optionValuesCartesian = self::cartesianProduct($optionValues);

        foreach($optionValuesCartesian as $optionValues){
            $variation = new Variation(['price' =>  0, 'stock'  =>  1]);
            $product->addVariation($variation);
            if(!empty($optionValues))
                $variation->addOptionValues($optionValues);
        }
        return $product->variations()->get();
    }

    /**
     * Returns the cartesian product of the given array.
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












