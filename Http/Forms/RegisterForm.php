<?php

namespace Http\Forms;

use Core\Validator;

class RegisterForm
{
    protected $errors=[];
    public function validate($email,$password){
        if (!Validator::email($email)) {
            $this->errors['email'] = "Please Input the valid email";
        }
        if (!Validator::string($password, 7, 50)) {
            $this->errors['password'] ="Password length must be between 8 to 50";
        }
        return empty($this->errors);
    }
    public function errors(){
        return $this->errors;
    }
}