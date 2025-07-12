<?php

  class AuditTrailList extends Controller {
    
    // function index(){
    //   // $this->view("hierarchy", "hierarchy");
    // }

    function getAuditTrail(){
      $audittraillist = $this->loadModel("audittrail");
      $conditions = [];
      $params = [];
  
      // General search condition for fullname
      if (isset($_POST['auditInformation']) && !empty($_POST['auditInformation'])) {
          // Use LIKE for search term with a wildcard
          $conditions[] = "record_id LIKE :search";
          $params[':search'] = "%" . $_POST['auditInformation'] . "%";
      }
  
      // Combine conditions into the WHERE clause
      $conditionString = !empty($conditions) ? " WHERE " . implode(' AND ', $conditions) : '';
      $dataResult = $audittraillist->mainQuery($conditionString, $params);

      echo json_encode($dataResult);
    }

  }