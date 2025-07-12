<?php

  class ElderList extends Controller {
    
    function index(){
      $this->view("members", "elderslist");
    }

    function saveNewElder(){
      $elder = $this->loadModel('elder');
      $elderID = $elder->createrecordid('GCF-BOE', 'elders', 'GCF-BOE', 'elderID');
      $elderAddInfo['elderid'] = $elderID;
      $elderAddInfo['memberid'] = $_POST['memberid'];

      $addResult = $elder->insert($elderAddInfo);

      $elder = $this->loadModel('member');
      $elderEditInfo['id'] = $_POST['defaultid'];
      $elderEditInfo['memberLevel'] = 'Level 2';
      $elderEditInfo['memberLvlTitle'] = 'Elder';

      $updateResult = $elder->update($elderEditInfo['defaultid'], $elderEditInfo);

    }

  }