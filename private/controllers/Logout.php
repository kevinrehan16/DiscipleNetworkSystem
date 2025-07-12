<?php 
  class Logout extends Controller {

    function index(){
      session_destroy();
      die();
    }

  }

?>