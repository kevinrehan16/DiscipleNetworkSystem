<?php

  //? Home Class Controller

  class Home extends Controller {
    
    function index(){
      $this->view("", "home");
    }

  }