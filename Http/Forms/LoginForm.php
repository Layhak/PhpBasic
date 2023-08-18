<?php

namespace Http\Forms;

use Core\Validator;

class LoginForm
{
    protected $errors=[];
    public function validate($email,$password){
        if (!Validator::email($email)) {
            $this->errors['email'] = "Please provide the valid email";
        }
        if (!Validator::string($password, 7, 50)) {
            $this->errors['password'] = "Please provide a valid password";
        }
        return empty($this->errors);
    }
    public function errors(){
        return $this->errors;
    }
}