<?php

  class GrowthGroup extends Controller {

    function index(){
      $this->view("groups", "growthgrouplist");
      // $gg = $this->loadModel('growthgroupgg');
      // $dataResult = $gg->findAll();
      
      // $this->view("groups", "growthgrouplist", ['growthgroups'=>$dataResult]);
    }

    function getGrowthGroup(){
      $satellite = $this->loadModel("ggmembers");
      $dataResult = $satellite->findAll();;

      echo json_encode($dataResult);
    }

    function savenewgrowthgroup(){
      $growthgroups = $this->loadModel('GrowthGroupGG');
      $growthgroupid = $growthgroups->createrecordid('GCF-GG', 'growthgroups', 'GCF-GG', 'growthgroupid');

      $ggAddinfo['growthgroupid'] = $growthgroupid;
      $ggAddinfo['growthgroupname'] = $_POST['txtgrowthgroupname'];
      $ggAddinfo['growthgroupshortname'] = $_POST['txtggabbreviation'];
      $ggAddinfo['growthgroupleaderid'] = $_POST['txtggleaderid'];
      $ggAddinfo['dayschedule'] = $_POST['txtggday'];
      $ggAddinfo['timeschedule'] = $_POST['txtggtime'];
      $growthgroups->insert($ggAddinfo);

      $gg = $this->loadModel('member');
      $ggEditInfo['id'] = $_POST['defaultID'];
      $ggEditInfo['memberLevel'] = 'Level 3';
      $ggEditInfo['memberLvlTitle'] = 'GG Leader';

      $updateResult = $gg->update($_POST['defaultID'], $ggEditInfo);
    }
  }