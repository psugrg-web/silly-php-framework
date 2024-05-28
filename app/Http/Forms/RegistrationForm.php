<?php

namespace Http\Forms;

use Core\Validator;

class RegistrationForm extends LoginForm
{
    public function __construct(public array $attributes)
    {
        if (!Validator::email($attributes['email'])) {
            $this->errors['email'] = "Please provide a valid email address.";
        }

        if (!Validator::string($attributes['password'], 7, 255)) {
            $this->errors['password'] = "Please provide a valid password";
        }
    }
}
