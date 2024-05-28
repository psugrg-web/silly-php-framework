<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;

class LoginForm
{
    protected $errors = [];

    public function __construct(public array $attributes)
    {
        if (!Validator::email($attributes['email'])) {
            $this->errors['email'] = "Please provide a valid email address.";
        }

        if (!Validator::string($attributes['password'])) {
            $this->errors['password'] = "Please provide a valid password";
        }
    }

    /**
     * Validates the email and password strings 
     * 
     * @param array $attributes containing 'email' and 'password'
     * @return object the instance of the LoginForm
     * @throws ValidationException in case the validation fails
     */
    public static function validate($attributes)
    {
        $instance = new static($attributes);
        return $instance->failed() ? $instance->throw() : $instance;
    }

    public function throw()
    {
        ValidationException::throw($this->errors(), $this->attributes);
    }

    public function failed()
    {
        return count($this->errors);
    }

    /**
     * @return array list of errors reported by the validation process
     */
    public function errors()
    {
        return $this->errors;
    }

    /**
     * Adds an error from external source to the list of errors
     * 
     * @param string $field name of the error
     * @param string $message description of the error
     */
    public function error($field, $message)
    {
        $this->errors[$field] = $message;
        return $this;
    }
}
