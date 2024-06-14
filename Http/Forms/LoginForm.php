<?php

namespace Http\Forms;
use Core\Validator;
use Core\ValidationException;

class LoginForm
{

    protected $errors = [];

    public function __construct(public array $attributes)
    {
        if(!Validator::email($attributes['email'])) {
            $this->errors['email'] = 'Please provide a valid email address.';
        }

        if(!Validator::string($attributes['password'], 7, 255)) {
            $this->errors['password'] = 'Please provide a valid password.';
        }
        
    }
    
    public static function validate($attributes)
    {
        // Validate form inputs
        $instance = new static($attributes);

        return $instance->failed() ? $instance->throw() : $instance;
    }

    public function throw()
    {
        ValidationException::throw($this->errors(), $this->attributes);
    }

    public function failed()
    {
        return count($this->errors());
    }

    public function errors()
    {
        return $this->errors;
    }

    public function error($field, $message)
    {
        $this->errors[$field] = $message;

        return $this;
    }
}