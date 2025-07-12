<?php

  class ProfileList extends Controller {

    function index(){
      $this->view("profiles", "profilelist");
    }

    function getInformation(){
      $members = $this->loadModel('member');
      $dataResult = $members->where('id', $_POST['defaultId'], '=');

      echo json_encode($dataResult);
    }
  }