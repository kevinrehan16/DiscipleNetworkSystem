<?php

  class AuditTrailList extends Controller {
    
    // function index(){
    //   // $this->view("hierarchy", "hierarchy");
    // }

    function getAuditTrail(){
      $audittraillist = $this->loadModel("audittrail");
      $conditions = [];
      $params = [];

      if (isset($_POST['memberIdLogs']) && !empty($_POST['memberIdLogs'])) {
          $conditions[] = "record_id = :memberid";
          $params[':memberid'] = $_POST['memberIdLogs'];
      }

      if (isset($_POST['auditInformation']) && !empty($_POST['auditInformation'])) {
          $conditions[] = "action_type LIKE :search";
          $params[':search'] = "%" . $_POST['auditInformation'] . "%";
      }

      $conditionString = !empty($conditions) ? " WHERE " . implode(" AND ", $conditions) : "";

      $dataResult = $audittraillist->mainQuery($conditionString, $params);
      echo json_encode($dataResult);
    }

  }