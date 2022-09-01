<?php

class Uservalidator{

    private $data;   //holds the post data 
    private $errors = [];  //error array we send back 
    private static $fields =['name','email','phone'];  //fields are the things we want to check

    public function __construct($post_data){   //$post_data can be any variable
        $this->data  = $post_data;   
    }

    public function validateForm(){  //to validate the form
       foreach(self::$fields as $field){
         if(!array_key_exists($field, $this->data)){
              trigger_error("$field is not present in data" );
              return;
         }
       }

       $this->validateName(); //it performs this action if the data exist
       $this->validateEmail();
       $this->validatePhone();
       return $this->errors;
    }

    private function validateName(){ //validate the user name field

        $val = trim($this->data['name']);

        if(empty($val)){  //checks if username is empty
            $this->addError('name','name cannot be empty');
            }
         // else{
        //     if(!preg_match('/^[a-zA-Z]{6,50}$/', $val));
        //         $this->addError('name', 'name must be 6-50 chars');
        // }
        
    }

     private function validateEmail(){  //validate the email

        $val = trim($this->data['email']);

        if(empty($val)){
            $this->addError('email','email cannot be empty');
        } else{
            if(!filter_var($val,FILTER_VALIDATE_EMAIL)){
                $this->addError('email', 'email must be a valid email');
        }
        
    }
     
     }


    private function validatePhone(){
        $val = trim($this->data['phone']);

        if(empty($val)){
            $this->addError('phone','phone cannot be empty');
        } 
    }
     private function addError($key, $val){   //addError helps to display the errors in the private $error[] array if the fields are in correct
        $this->errors[$key] = $val;
     }

}


?>



