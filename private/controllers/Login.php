<?php
  //? Login Class Controller

  class Login extends Controller {
    
    function index(){
      if (!isset($_SESSION['userId'])) { // Check if session user is set
        $this->view("", "login");
      }
      else{
        $this->redirect("public/home");
      }
    }

    function loginAccount(){
      $useraccount = $this->loadModel('usersaccount');

      $condition = " WHERE username = :username ";
      $params = [':username' => $_POST['useremail']];

      $dataResult = $useraccount->mainQuery($condition, $params);
      
      // echo $dataResult[0]->password;
      if ($dataResult[0]->password != "") {
          // User exists, fetch the hashed password
          $hashedPassword = $dataResult[0]->password;
      
          // Step 2: Verify the password
          if (password_verify(trim($_POST['userpassword']), $hashedPassword)) {
              // Password is correct, log the user in
              echo "success";
              $_SESSION['id'] = $dataResult[0]->id;
              $_SESSION['userId'] = $dataResult[0]->userid;
              $_SESSION['username'] = $dataResult[0]->username;

              $memberinfo = $this->loadModel('member');
              $memberResult = $memberinfo->where("memberid", $dataResult[0]->memberid, "=");

              $_SESSION['userFullname'] = $memberResult[0]->firstname . " " .$memberResult[0]->lastname;
              $_SESSION['userMemberID'] = $memberResult[0]->memberid;
              $_SESSION['userPicture'] = $memberResult[0]->picture;
              $_SESSION['memberDefaultId'] = $memberResult[0]->id;

              if (empty($_SESSION['my_csrf_token'])) {
                if (function_exists('random_bytes')) {
                    $_SESSION['my_csrf_token'] = bin2hex(random_bytes(32));
                } else {
                    $_SESSION['my_csrf_token'] = bin2hex(openssl_random_pseudo_bytes(32));
                }
              }
              // Set session variables or any other login logic here
          } else {
              // Invalid password
              echo "invalid";
          }
      } else {
          // User not found
          echo "notfound.";
      }
    }

    function changepassword(){
      $useraccount = $this->loadModel('usersaccount');

      $condition = " WHERE username = '".$_POST['txtemailacc']."' ";
      $dataResult = $useraccount->mainQuery($condition);
      
      // echo $dataResult[0]->password;
      if ($dataResult[0]->password != "") {
          // User exists, fetch the hashed password
          $hashedPassword = $dataResult[0]->password;
      
          // Step 2: Verify the password
          if (password_verify(trim($_POST['txtcurrpass']), $hashedPassword)) {
            
            echo "success";
            $userEditInfo['id'] = $_POST['defaultID'];
            $userEditInfo['password'] = password_hash($_POST['txtnewpass'], PASSWORD_DEFAULT);

            $updateResult = $useraccount->update($_POST['defaultID'], $userEditInfo);

          } else {
              // Invalid password
              echo "invalid";
          }
      } else {
          // User not found
          echo "notfound.";
      }
    }
  }