<?php
/**
 * Created by PhpStorm.
 * User: Mamareza
 * Date: 2015-03-12
 * Time: 5:13 PM
 */

namespace App\Exceptions;

use Exception;
use Illuminate\Support\MessageBag;

class BaseException extends Exception
{

    protected $errors;

    public function __construct($message = null, $code = 0, Exception $previous = null, $errors = null)
    {
        $this->setErrors($errors);

        parent::__construct($message, $code, $previous);
    }

    protected function setErrors($errors)
    {
        if (is_string($errors)) {
            $errors = array(
                'error' => $errors,
            );
        }

        if (is_array($errors)) {
            $errors = new MessageBag($errors);
        }

        $this->errors = $errors;
    }

    public function getErrors()
    {
        return $this->errors;
    }
}