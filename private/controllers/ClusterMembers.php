<?php

  class ClusterMembers extends Controller {

    function index(){
      $this->view("groupmembers", "clustermembers");
    }


    function getClusterMembers(){
      $clusters = $this->loadModel('cluster');
      // $dataResult = $clusters->findAll();
      $mainQuery = "SELECT * FROM clusters as c LEFT JOIN members as m ON c.clusterleaderid = m.memberid";
      $subQuery = "SELECT * FROM clustermembers as cm LEFT JOIN members as mn ON cm.memberid = mn.memberid WHERE clusterID = :clusterid";

      $dataResult = $clusters->anyQuery($mainQuery, $subQuery, 'memberid', 'clusterid');
      
      echo json_encode($dataResult);
    }

    function saveClusterMember(){
      $clusterMember = $this->loadModel('ClusterGroupMembers');
      $clusterMID = $clusterMember->createrecordid('GCF-CM', 'clustermembers', 'GCF-CM', 'clusterMID');
      $clusterMemberInfo['clusterMID'] = $clusterMID;
      $clusterMemberInfo['clusterID'] = $_POST['clusterid'];
      $clusterMemberInfo['memberID'] = $_POST['memberid'];

      $addResult = $clusterMember->insert($clusterMemberInfo);

    }

  }