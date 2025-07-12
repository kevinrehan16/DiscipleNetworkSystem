<?php 

  class DeaconList extends Controller{
    function index(){
      $this->view("members", "deaconslist");
    }

    function saveNewDeacon(){
      $deacon = $this->loadModel('deacon');
      $deaconID = $deacon->createrecordid('GCF-BOD', 'deacons', 'GCF-BOD', 'deaconID');
      $deaconAddInfo['deaconid'] = $deaconID;
      $deaconAddInfo['memberid'] = $_POST['memberid'];

      $addResult = $deacon->insert($deaconAddInfo);

      $deacon = $this->loadModel('member');
      $deaconEditInfo['id'] = $_POST['defaultid'];
      $deaconEditInfo['memberLevel'] = 'Level 2';
      $deaconEditInfo['memberLvlTitle'] = 'Deacon';

      $updateResult = $deacon->update($deaconEditInfo['defaultid'], $deaconEditInfo);

      // AUDIT TRAIL HERE
      $auditTrail = $this->loadModel('audittrail');
      $auditTrail->auditTrail("INSERT", "deacons", $_POST['memberid'], "", json_encode($deaconAddInfo));

    }
  }