<?php

  //? Login Class Controller

  class AddUser extends Controller {
    
    function index(){

      $user = $this->loadModel("user");
      $dataResult = $user->findAll();

      $this->view("", "adduser", ['rows'=>$dataResult]);
    }

  }