<?php

  //? Home Class Controller

  class Students extends Controller {
    
    function index($id = ''){
      //! THIS IS HOW TO CHECK HOW MANY INSTANCE YOU MAKE IT SHOULD BE ONE EVEN IF YOU CALL THE getInstance METHOD MULTIPLE TIMES
      $dbh = Database::getInstance();
      $dbc = $dbh->getConnection();

      $sqlPage = "SELECT * FROM members";
      $stmt = $dbc->prepare($sqlPage);
      $stmt->execute();
      $pageData = $stmt->fetch();


      $this->view("students", ["rows"=>$pageData]);
    }

  }