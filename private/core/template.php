<?php

  //? Template Class Controller

  class Template extends Controller {

    private $pagelayout;
    
    function __construct($layout){
      $this->pagelayout = $layout;
    }

    function getPageLayout(){
      return $this->pagelayout;
    }
      

  }