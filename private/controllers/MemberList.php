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
      if (!isset($_POST['my_csrf_token']) || $_POST['my_csrf_token'] !== $_SESSION['my_csrf_token']) {
        http_response_code(403);
        $arrayMsg = [
          "alertMsg" => "Invalid CSRF token.",
          "statusMsg" => "Error"
        ];
        echo json_encode($arrayMsg);
        exit;
      }

      if (
        (empty($_POST['forBaptism']) || $_POST['forBaptism'] === 'No') &&
        (empty($_POST['forMembership']) || $_POST['forMembership'] === 'No')
      ) {

        $arrayMsg = [
          "alertMsg" => "At least one recommendation (For Baptism or For Membership) must be selected.",
          "statusMsg" => "Error"
        ];
        echo json_encode($arrayMsg);
        exit;
      }

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

        $forBaptism = isset($_POST['forBaptism']) ? $_POST['forBaptism'] : 'No';
        $forMembership = isset($_POST['forMembership']) ? $_POST['forMembership'] : 'No';

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
        $info['recForBaptism'] = $forBaptism;
        $info['recForMembership'] = $forMembership;
        $info['comment'] = $_POST['txtconductedcomment'];
        $addResult = $addmember->insert($info);

        //!! This code will make the $_POST['children'] a perfect array. So that you can count it correctly.
        $cntChildren = json_decode($_POST['children'], true);
        
        $addmemberchild = $this->loadModel('memberchildren');
        $children = [];

        foreach ($cntChildren as $key => $child) {
          $childID = $addmember->createrecordid('GCF-MC', 'memberchildren', 'GCF-MC', 'childID');
          // Access each child's name and age
          $cInfo['childID'] = $childID;
          $cInfo['memberid'] = $memID;
          $cInfo['childname'] = $child['name'];
          $cInfo['childage'] = $child['age'];
          
          $addmemberchild->insert($cInfo);
          $children[] = $cInfo;
        }
        $info['children'] = $children;

        // $this->redirect("memberlist");
        $arrayMsg = [
          "alertMsg" => "New member ".$info['lastname']." ".$info['firstname']." has been added successfully.",
          "statusMsg" => "Success"
        ];

        $auditTrail = $this->loadModel('audittrail');
        $auditTrail->auditTrail("INSERT", "members", $memID, "", json_encode($info));
      }
      else{
        $arrayMsg = [
          "alertMsg" => $addmember->errors,
          "statusMsg" => "Failed"
        ];
      }
      
      echo json_encode($arrayMsg);
      exit;
    }

    public function updatemember() {
      if (!isset($_POST['my_csrf_token']) || $_POST['my_csrf_token'] !== $_SESSION['my_csrf_token']) {
          http_response_code(403);
          $arrayMsg = [
            "alertMsg" => "Invalid CSRF token.",
            "statusMsg" => "Error"
          ];
          echo json_encode($arrayMsg);
          exit;
      }

      if (
        (empty($_POST['forBaptism']) || $_POST['forBaptism'] === 'No') &&
        (empty($_POST['forMembership']) || $_POST['forMembership'] === 'No')
      ) {

        $arrayMsg = [
          "alertMsg" => "At least one recommendation (For Baptism or For Membership) must be selected.",
          "statusMsg" => "Error"
        ];
        echo json_encode($arrayMsg);
        exit;
      }

      $forBaptism = isset($_POST['forBaptism']) ? $_POST['forBaptism'] : 'No';
      $forMembership = isset($_POST['forMembership']) ? $_POST['forMembership'] : 'No';

      $updateMember = $this->loadModel('member');
      if ($updateMember->validate($_POST)) {
        $oldDataResult = $updateMember->where('id', $_POST['member_id']);
        if (empty($oldDataResult)) {
            throw new Exception("No existing member found for ID: " . $_POST['member_id']);
        }
        $oldData = json_decode(json_encode($oldDataResult[0]), true); // Convert object to array
        
        $updateInfo['id'] = $_POST['member_id'];
        $updateInfo['lastname'] = ucwords($_POST['lastname']);
        $updateInfo['firstname'] = ucwords($_POST['firstname']);
        $updateInfo['middlename'] = ucwords($_POST['middlename']);
        $updateInfo['nickname'] = ucwords($_POST['nickname']);
        $updateInfo['gender'] = $_POST['gender'];
        $updateInfo['emailaddress'] = $_POST['emailaddress'];
        $updateInfo['birthday'] = $_POST['birthday'];
        $updateInfo['age'] = $_POST['age'];
        $updateInfo['lifestage'] = $_POST['lifestage'];
        $updateInfo['facebookname'] = $_POST['txtfacebook'];
        $updateInfo['spousename'] = $_POST['txtspousename'];
        $updateInfo['fathername'] = $_POST['txtfathername'];
        $updateInfo['mothername'] = $_POST['txtmother'];
        $updateInfo['receivedJesus'] = $_POST['txtwhenreceive'];
        $updateInfo['baptizedImmersion'] = $_POST['baptized'];
        $updateInfo['baptizeddate'] = $_POST['txtwhenbaptized'];
        $updateInfo['spiritualgift'] = $_POST['txtspiritualgifts'];
        $updateInfo['mobilenumber'] = $_POST['mobilenumber'];
        $updateInfo['contactdetails'] = 'C-0000002';
        $updateInfo['homeaddress'] = $_POST['homeaddress'];
        $updateInfo['country'] = $_POST['country'];
        $updateInfo['region'] = $_POST['region'];
        $updateInfo['city'] = $_POST['city'];
        $updateInfo['barangay'] = $_POST['barangay'];
        $updateInfo['occupation'] = $_POST['occupation'];
        $updateInfo['industry'] = $_POST['industry'];
        $updateInfo['collegeschool'] = $_POST['collegeschool'];
        $updateInfo['collegedegree'] = $_POST['txtdegree'];
        $updateInfo['highschool'] = $_POST['txthighschool'];
        $updateInfo['purposereg'] = $_POST['comment'];
        // $updateInfo['picture'] = $finalImageName;
        $updateInfo['prevchurch'] = $_POST['prevchurch'];
        $updateInfo['churchaffiliation'] = $_POST['txtaffiliation'];
        $updateInfo['memberstatus'] = $_POST['memberstatus'];
        $updateInfo['interviewby'] = $_POST['txtconductedby'];
        $updateInfo['membershipdate'] = $_POST['txtconducteddate'];
        $updateInfo['recForBaptism'] = $forBaptism;
        $updateInfo['recForMembership'] = $forMembership;
        $updateInfo['comment'] = $_POST['txtconductedcomment'];

        $updateResult = $updateMember->update($_POST['member_id'], $updateInfo);

        $changedOld = [];
        $changedNew = [];

        foreach ($updateInfo as $key => $newValue) {
            $oldValue = isset($oldData[$key]) ? $oldData[$key] : null;

            if (trim((string)$oldValue) !== trim((string)$newValue)) {
                $changedOld[$key] = $oldValue;
                $changedNew[$key] = $newValue;
            }
        }

        if (!empty($changedNew)) {
            $auditTrail = $this->loadModel('audittrail');
            $auditTrail->auditTrail(
                "UPDATE",
                "members",
                $oldData['memberid'],
                json_encode($changedOld),
                json_encode($changedNew)
            );
        }


        $arrayMsg = [
          "alertMsg" => "Member updated successfully.",
          "statusMsg" => "Success"
        ];
        
      } else {
        $arrayMsg = [
          "alertMsg" => "Validation failed.",
          "statusMsg" => "Error"
        ];
      }

      echo json_encode($arrayMsg);
      exit;
    }

    function updateMemberStatus(){
      $updateStatus = $this->loadModel('member');
      $updateInfoStatus['id'] = $_POST['defaultID'];
      $updateInfoStatus['memberstatus'] = $_POST['memstatus'];

      $addResult = $updateStatus->update($_POST['defaultID'], $updateInfoStatus);
    }

  }