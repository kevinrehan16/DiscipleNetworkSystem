<?php

  class NewMembersList extends Controller {
    
    function index(){

      $newmembers = $this->loadModel('member');
      $condition = " WHERE DATE_FORMAT(membershipdate, '%Y-%m-%d') >= DATE_SUB(CURDATE(), INTERVAL 2 YEAR)";

      $dataResult = $newmembers->mainQuery($condition);
      
      $this->view("members", "newmemberslist", ["newmembers"=>$dataResult]);
    }


  }