<?php namespace App\Models;

use App\Exceptions\InvalidArgumentException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BaseModel extends Model {

	use SoftDeletes;

    protected $namespaceModels = 'App\Models';
    protected $namespaceProduct = 'App\Models\Product';

    /**
     * Checks if the given argument is an array and contains only the given class name or interface.
     *
     * @param $IClasses
     * @param $className | interface name
     * @throws InvalidArgumentException
     */
    protected function isArrayOfIClass($IClasses, $className)
    {
        if (!is_array($IClasses)|| empty($IClasses))
            throw new InvalidArgumentException('The Argument must be an Array.');
        foreach ($IClasses as $IClass) {
            if (!($IClass instanceof $className)) {
                throw new InvalidArgumentException("This method only can accept an array of classes
                which have implemented the {$className} Interface");
            }
        }
    }
}
