<?php

  class Hierarchy extends Controller {
    
    function index(){
      $this->view("hierarchy", "hierarchy");
    }

    function getPrimaryLevels(){
      $primaryLevel = $this->loadModel("member");

      $condition = " WHERE memberLevel IN (:level1, :level2)";
      $params = [
          ':level1' => 'Level 1',
          ':level2' => 'Level 2'
      ];

      // Execute the query with conditions and parameters
      $getPrimaryLevel = $primaryLevel->mainQuery($condition, $params);
      
      echo json_encode($getPrimaryLevel);
    }

    function getGroupList(){
      $groupList = $this->loadModel("GrowthGroupGG");

      $mainQuery = "SELECT growthgroupid, growthgroupname, growthgroupshortname, growthgroupleaderid FROM growthgroups";
      $subQuery = "SELECT gg.ggMid, gg.ggmemberid, CONCAT(mn.firstname, ' ', mn.lastname) as fullname FROM ggmembers as gg LEFT JOIN members as mn ON gg.ggmemberid = mn.memberid WHERE gg.growthgroupid = :growthgroupid";

      $dataResult = $groupList->anyQuery($mainQuery, $subQuery, 'groupid', 'growthgroupid');

      echo json_encode($dataResult);
    }

  }