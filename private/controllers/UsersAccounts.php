<?php

  class usersaccounts extends Controller {
    
    function index(){
      $this->view("groups", "usersaccounts");
    }
    
    function saveuseraccount(){
      $user = $this->loadModel('usersaccount');
      $userID = $user->createrecordid('GCF-U', 'usersaccounts', 'GCF-U', 'userid');
      $userAddInfo['userid'] = $userID;
      $userAddInfo['memberid'] = $_POST['txtuseraccountid'];
      $userAddInfo['username'] = $_POST['txtuseremail'];
      $userAddInfo['password'] = password_hash($_POST['txtuseracctemppass'], PASSWORD_DEFAULT);

      $addResult = $user->insert($userAddInfo);
    }
  }