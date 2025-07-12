<?php

  class Controller {
    //!! foldername, classname, data
    public function view($folderPage, $viewPage, $data = array()){

      extract($data); //! Extract use so that you can now use the name of array per index, instead of $data to call the array.

      if (!isset($_SESSION['userId'])) { // Check if session user is set
        // If session is not set, redirect to the login page
        include("../private/views/login.view.php");
        exit(); // Always call exit after header redirection to stop further execution
      }

      $modulePage = TEMPLATE;

      if($viewPage == "login"){
        $modulePage = "login";
      }
      else if($viewPage == "adduser"){
        $modulePage = "adduser";
      }

      $template = new Template($modulePage);
      $layout = $template->getPageLayout();

      if(file_exists("../private/views/". $layout . ".view.php")){
        include("../private/views/". $layout . ".view.php");
      }
      else{
        include("../private/views/404.view.php");
      }
    }

    public function loadModel($model){

      if(file_exists("../private/models/". ucfirst($model) .".php")){
        require("../private/models/". ucfirst($model) .".php");
        return $model = new $model;
      }

      return false;
    }

    public function redirect($link){
      header("Location: ../" . trim($link, "/"));
      die;
    }
  
  }