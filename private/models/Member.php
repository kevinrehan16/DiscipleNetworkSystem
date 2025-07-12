<?php

  class Member extends Model {

    protected $tableName = "members";

    public function validate($DATA){

      $this->errors = array();

      //!! (^) means from START
      //!! ($) means to END
      //!! (a-zA-Z) means from small letter a-z and big letter A-Z only
      //!! (+) means 1 or more charater is present. 
      // if(!preg_match('/^[a-zA-Z]+$/', $DATA['firstname'])){
      //   $this->errors['firstname'] = "Only letters are allowed.";
      // }

      // //** Checking of password
      // if($DATA['password'] != $DATA['password2']){
      //   $this->errors['password'] = "Password did not match in your confirmation password.";
      // }

      // List only the fields you want to require
      $required = [
          'lastname',
          'firstname',
          'gender',
          'emailaddress',
          'birthday',
          'lifestage',
          'baptized',
          // add more required fields as needed
      ];

      foreach($required as $field){
        if(empty($DATA[$field])){
            $this->errors[$field] = ucfirst($field) . " is required.<br>";
        }

        if (
          (empty($DATA['forBaptism']) || $DATA['forBaptism'] === 'No') &&
          (empty($DATA['forMembership']) || $DATA['forMembership'] === 'No')
        ) {
          $this->errors['recommendation'] = "At least one recommendation (For Baptism or For Membership) must be selected.<br>";
        }
  
        // Example: additional validation
        if (!empty($DATA['emailaddress']) && !filter_var($DATA['emailaddress'], FILTER_VALIDATE_EMAIL)) {
            $this->errors['emailaddress'] = "Invalid email format.<br>";
        }
      }


      if(count($this->errors) == 0){
        return true;
      }

      return false;
    }
    
  }