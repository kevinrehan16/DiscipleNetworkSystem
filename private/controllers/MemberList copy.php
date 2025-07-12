<?php

  class MemberList extends Controller {
    
    function index(){

      // $members = $this->loadModel('member');
      // $dataResult = $members->findAll();

      $this->view("members", "memberlist");
    }

    function getMembers() {
      $members = $this->loadModel('member');
      $conditions = [];
      $params = [];
  
      // Gender condition
      if (isset($_POST['sltGender']) && !empty($_POST['sltGender'])) {
          $conditions[] = "gender = :gender";
          $params[':gender'] = $_POST['sltGender'];
      }
  
      // Life stage condition
      if (isset($_POST['sltLifeStage']) && !empty($_POST['sltLifeStage'])) {
          $conditions[] = "lifestage = :lifestage";
          $params[':lifestage'] = $_POST['sltLifeStage'];
      }
  
      // Recommendation condition
      if (isset($_POST['recommendationfor']) && !empty($_POST['recommendationfor'])) {
          $conditions[] = "recFor" . $_POST['recommendationfor'] . " = 'Yes'";
      }
  
      // Date added condition
      if (isset($_POST['srchdateaddeddatefrom']) && !empty($_POST['srchdateaddeddatefrom']) && isset($_POST['srchdateaddeddateto']) && !empty($_POST['srchdateaddeddateto'])) {
          $conditions[] = "dateadded BETWEEN :dateFrom AND :dateTo";
          $params[':dateFrom'] = date('Y-m-d', strtotime($_POST['srchdateaddeddatefrom']));
          $params[':dateTo'] = date('Y-m-d', strtotime($_POST['srchdateaddeddateto']));
      }
  
      // Membership date condition
      if (isset($_POST['srchMembershipdatefrom']) && !empty($_POST['srchMembershipdatefrom']) && isset($_POST['srchMembershipdateto']) && !empty($_POST['srchMembershipdateto'])) {
          $conditions[] = "membershipdate BETWEEN :membershipFrom AND :membershipTo";
          $params[':membershipFrom'] = date('Y-m-d', strtotime($_POST['srchMembershipdatefrom']));
          $params[':membershipTo'] = date('Y-m-d', strtotime($_POST['srchMembershipdateto']));
      }

      // Add condition for memberLvlTitle = 'Elders'
      if (isset($_POST['memberLvlTitle']) && !empty($_POST['memberLvlTitle'])) {
        $conditions[] = "memberLvlTitle = :memberLvlTitle";
        $params[':memberLvlTitle'] = $_POST['memberLvlTitle']; // You can change this based on your logic
      }
  
      // Other conditions
      // Similar to the above, add conditions for baptizedImmersion, memberStatus, birthday, etc.
  
      // General search condition
      $searchTerm = isset($_POST['txtSearchInformation']) ? $_POST['txtSearchInformation'] : '';
      $conditions[] = "(firstname LIKE :search OR lastname LIKE :search OR CONCAT(firstname, ' ', lastname) LIKE :search OR CONCAT(lastname, ' ', firstname) LIKE :search OR memberid LIKE :search OR nickname LIKE :search OR emailaddress LIKE :search)";
      $params[':search'] = "%" . $searchTerm . "%";
  
      // Combine conditions
      $conditionString = implode(' AND ', $conditions);
      $conditionString = !empty($conditionString) ? " WHERE " . $conditionString : '';
  
      $dataResult = $members->mainQuery($conditionString, $params);
      echo json_encode($dataResult);
    }

    function savenewmember(){
      $arrayMsg = [];
      $addmember = $this->loadModel('member');
      
      if($addmember->validate($_POST)){
        $memID = $addmember->createrecordid('GCF-M', 'members', 'GCF-M', 'memberid');

        $imgname = $_FILES['fileInput']['name'];
        $imgtype = $_FILES["fileInput"]["type"];
        $imgsize = $_FILES["fileInput"]["size"];

        if (!file_exists("../private/views/memberimage/".$memID)) {
          mkdir("../private/views/memberimage/".$memID, 0777, true);
        }

        $arr = explode(".", $imgname);
        $ext = end($arr);
        $finalImageName = "";
        
        if($ext != ""){
          $finalImageName = $memID . "." . $ext;
          move_uploaded_file($_FILES["fileInput"]["tmp_name"], "../private/views/memberimage/".$memID."/". $finalImageName);
        }

        $info['memberid'] = $memID;
        $info['lastname'] = ucwords($_POST['lastname']);
        $info['firstname'] = ucwords($_POST['firstname']);
        $info['middlename'] = ucwords($_POST['middlename']);
        $info['nickname'] = ucwords($_POST['nickname']);
        $info['gender'] = $_POST['gender'];
        $info['emailaddress'] = $_POST['emailaddress'];
        $info['birthday'] = $_POST['birthday'];
        $info['age'] = $_POST['age'];
        $info['lifestage'] = $_POST['lifestage'];
        $info['facebookname'] = $_POST['txtfacebook'];
        $info['spousename'] = $_POST['txtspousename'];
        $info['fathername'] = $_POST['txtfathername'];
        $info['mothername'] = $_POST['txtmother'];
        $info['receivedJesus'] = $_POST['txtwhenreceive'];
        $info['baptizedImmersion'] = $_POST['baptized'];
        $info['baptizeddate'] = $_POST['txtwhenbaptized'];
        $info['spiritualgift'] = $_POST['txtspiritualgifts'];
        $info['mobilenumber'] = $_POST['mobilenumber'];
        $info['contactdetails'] = 'C-0000002';
        $info['homeaddress'] = $_POST['homeaddress'];
        $info['country'] = $_POST['country'];
        $info['region'] = $_POST['region'];
        $info['city'] = $_POST['city'];
        $info['barangay'] = $_POST['barangay'];
        $info['occupation'] = $_POST['occupation'];
        $info['industry'] = $_POST['industry'];
        $info['collegeschool'] = $_POST['collegeschool'];
        $info['collegedegree'] = $_POST['txtdegree'];
        $info['highschool'] = $_POST['txthighschool'];
        $info['purposereg'] = $_POST['comment'];
        $info['picture'] = $finalImageName;
        $info['prevchurch'] = $_POST['prevchurch'];
        $info['churchaffiliation'] = $_POST['txtaffiliation'];
        $info['memberstatus'] = $_POST['memberstatus'];
        $info['interviewby'] = $_POST['txtconductedby'];
        $info['membershipdate'] = $_POST['txtconducteddate'];
        $info['recForBaptism'] = $_POST['forBaptism'];
        $info['recForMembership'] = $_POST['forMembership'];
        $info['comment'] = $_POST['txtconductedcomment'];
        $addResult = $addmember->insert($info);

        //!! This code will make the $_POST['children'] a perfect array. So that you can count it correctly.
        $cntChildren = json_decode($_POST['children'], true);
        
        $addmemberchild = $this->loadModel('memberchildren');
        foreach ($cntChildren as $key => $child) {
          $childID = $addmember->createrecordid('GCF-MC', 'memberchildren', 'GCF-MC', 'childID');
          // Access each child's name and age
          $cInfo['childID'] = $childID;
          $cInfo['memberid'] = $memID;
          $cInfo['childname'] = $child['name'];
          $cInfo['childage'] = $child['age'];
          
          $addmemberchild->insert($cInfo);
        }

        // $this->redirect("memberlist");
        $arrayMsg = [
          "alertMsg" => "New member ".$info['lastname']." ".$info['firstname']." has been added successfully.",
          "statusMsg" => "Success"
        ];

      }
      else{
        $arrayMsg = [
          "alertMsg" => $addmember->errors,
          "statusMsg" => "Failed"
        ];

      }
      
      echo json_encode($arrayMsg);
    
    }

    function updatemember(){
      $updatemember = $this->loadModel('member');
      $updateInfo['id'] = $_POST['defaultID'];
      $updateInfo['memberstatus'] = $_POST['memstatus'];

      $addResult = $updatemember->update($_POST['defaultID'], $updateInfo);
    }

  }