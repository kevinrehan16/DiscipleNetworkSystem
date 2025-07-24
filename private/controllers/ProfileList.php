<?php

  class ProfileList extends Controller {

    function index(){
      $this->view("profiles", "profilelist");
    }

    function getInformation(){
      $member = $this->loadModel('member');
      $dataMember = $member->where('id', $_POST['defaultId'], '=');

      $children = $this->loadModel('memberchildren');
      $datachildren = $children->where('memberid', $dataMember[0]->memberid, '=');

      $dataMember[0]->children = $datachildren;

      echo json_encode($dataMember);
    }
  }