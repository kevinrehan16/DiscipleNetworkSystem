<?php

 class SatelliteList extends Controller {

  function index(){
    $satellite = $this->loadModel("satellite");
    $dataResult = $satellite->leftJoin($_POST['joinTable'], 'churchid = '.$_POST['joinTable'].'.churchid');

    foreach($dataResult as $satellite){
      echo "<tr>
        <td>".$satellite->satellitesname."</td>
        <td>".$satellite->areapastor."</td>
        <td>".$satellite->worshipday." ".$satellite->worshiptime."</td>
        <td>".$satellite->satellitelocation."</td>
        <td>
          <button class='btn btn-sm btn-flat btn-info' onclick='selectSatellite(\"".$satellite->satellitesid."\");'><i class='bx bx-check'></i></button>
        </td>
      </tr>";
    }
    // echo json_encode($dataResult);
  }

  function getsatelliteslist(){
    $satellite = $this->loadModel("satellite");
    $dataResult = $satellite->leftJoin($_POST['joinTable'], 'churchid = '.$_POST['joinTable'].'.churchid');

    echo json_encode($dataResult);
  }

  function selectsatellite(){
    $satellite = $this->loadModel("satellite");
    $dataResult = $satellite->rightJoin($_POST['joinTable'], 'churchid = '.$_POST['joinTable'].'.churchid', $_POST['column'], $_POST['value']);

    echo json_encode($dataResult);
  }

  function add(){
    // $addchurch = $this->loadModel('church'); //!! It calls the instantiation of model
      
    // $info['churchid'] = $addchurch->createrecordid('CCF-CHURCH', 'churches', 'CCF-CHURCH', 'churchid');
    // $info['churchname'] = $_POST['churchname'];
    // $info['shortname'] = $_POST['shortname'];
    // $addResult = $addchurch->insert($info);
    
    // foreach($_POST['satellites'] as $key => $value){
    //   $satellite['satellitesname'] = $_POST['satellites'][$key]['satellitename'];
    //   $satellite['worshipday'] = $_POST['satellites'][$key]['worshipday'];
    //   $satellite['worshiptime'] = $_POST['satellites'][$key]['worshiptime'];
    //   $satellite['areapastorid'] = '';
    //   $satellite['areapastor'] = $_POST['satellites'][$key]['areapastor'];
    //   $satellite['satellitelocation'] = $_POST['satellites'][$key]['satellitelocation'];

    //   $addSatellite = $addchurch->insert($satellite);
    // }

    // // $this->redirect("churchlist");

  }

 }