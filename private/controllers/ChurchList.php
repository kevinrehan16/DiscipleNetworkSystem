<?php

 class ChurchList extends Controller {

  function index(){
    $church = $this->loadModel("church");
    $dataResult = $church->subQuery();

    $this->view("churches", "churchlist", ["churches"=>$dataResult]);
  }

  function add(){
    $addchurch = $this->loadModel('church'); //!! It calls the instantiation of model
    
    $churchid = $addchurch->createrecordid('CCF-CHURCH', 'churches', 'CCF-CHURCH', 'churchid');
    
    $info['churchid'] = $churchid;
    $info['churchname'] = $_POST['churchname'];
    $info['shortname'] = $_POST['shortname'];
    $addResult = $addchurch->insert($info);
    
    $addsatellite = $this->loadModel('satellite');
    foreach($_POST['satellites'] as $key => $value){

      $satellite['churchid'] = $churchid;
      $satellite['satellitesid'] = $addsatellite->createrecordid('CCF-SATELLITE', 'satellites', 'CCF-SATELLITE', 'satellitesid');
      $satellite['satellitesname'] = $_POST['satellites'][$key]['satellitename'];
      $satellite['worshipday'] = $_POST['satellites'][$key]['worshipday'];
      $satellite['worshiptime'] = $_POST['satellites'][$key]['worshiptime'];
      $satellite['areapastorid'] = '';
      $satellite['areapastor'] = $_POST['satellites'][$key]['areapastor'];
      $satellite['satellitelocation'] = $_POST['satellites'][$key]['satellitelocation'];

      $addSatellite = $addsatellite->insert($satellite);
    }

    // $this->redirect("churchlist");

  }

 }