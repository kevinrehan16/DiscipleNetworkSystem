<?php

  class ClustersGroup extends Controller {

    function index(){
      $this->view("groups", "clusterslist");
    }

    function getgroupcluster(){
      // $clusters = $this->loadModel('cluster');
      // $dataResult = $clusters->findAll();

      $satellite = $this->loadModel("cluster");
      $dataResult = $satellite->leftJoin($_POST['joinTable'], 'clusterleaderid = '.$_POST['joinTable'].'.memberid');

      echo json_encode($dataResult);
      
    }

    function savegroupcluster(){
      $clusters = $this->loadModel('cluster');
      $clusterid = $clusters->createrecordid('GCF-CLUSTER', 'clusters', 'GCF-CLUSTER', 'clusterid');

      $clusterAddinfo['clusterid'] = $clusterid;
      $clusterAddinfo['clustername'] = $_POST['txtclustername'];
      $clusterAddinfo['clusterleaderid'] = $_POST['txtleaderid'];
      $clusters->insert($clusterAddinfo);

      $member = $this->loadModel('member');
      $condition = " WHERE memberid = '".$_POST['txtleaderid']."' AND REPLACE(memberLevel, 'Level ', '') >= 3 ";
      $memberStatus = $member->mainQuery($condition);

      if(!empty($memberStatus)){
        $memberEditInfo['id'] = $_POST['defaultID'];
        $memberEditInfo['memberLevel'] = 'Level 3';
        $memberEditInfo['memberLvlTitle'] = 'Cluster Leader';

        $editResult = $member->update($_POST['defaultID'], $memberEditInfo);
      }
    }

  }