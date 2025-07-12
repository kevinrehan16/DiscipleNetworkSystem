<?php

  class Model extends Dbconnect {
    
    public $errors = array();

    public function __construct(){
      //!! FIRST OPTION
      //!! The $tableName is undefined because read in the models > the instantiate model in controller.php
      //!! uncomment this to check the table that instantiate
      // var_dump(property_exists($this, 'tableName'));


      //!! SECOND OPTION
      //!! uncomment this and remove the protected tableName above of each model in the models folder
      // echo Model::class;
      // if(!property_exists($this, 'tableName')){
      //   $this->tableName = strtolower($this::class);
      // }


      $this->dbh = Database::getInstance();
      $this->dbc = $this->dbh->getConnection();
    }

    public function mainQuery($condition, $params) {
      $query = "SELECT * FROM " . $this->tableName . $condition . " ORDER BY id DESC"; // safely prepared
      return $this->query($query, $params); // pass parameters for binding
    }
  
    
    public function findAll(){

      $query = "SELECT * FROM ". $this->tableName; //!! The $tableName is undefined because read in the models > the instantiate model in controller.php
      return $this->query($query);
    }

    public function where($column, $value, $operator = '='){
      //!! addslashes use to prevent SQL Injection or syntax error but use it only in the values not in the columns.
      // $value = addslashes($value);
      $query = "SELECT * FROM ". $this->tableName . " WHERE ".$column." ".$operator." :value"; //!! The $tableName is undefined because read in the models > the instantiate model in controller.php
      // echo $query;
      return $this->query($query, [
        'value'=>$value
      ]);
    }

    public function leftJoin($joinTable = null, $joinCondition = null, $column = '', $value = '') {
      // Sanitize the column name
      $column = addslashes($column);
  
      // Base query
      $query = "SELECT * FROM " . strtolower($this->tableName);
  
      // Add LEFT JOIN if a join table and condition are provided
      if ($joinTable && $joinCondition) {
          $joinTable = addslashes($joinTable);
          $query .= " LEFT JOIN " . $joinTable . " ON " . strtolower($this->tableName) . "." . $joinCondition;
      }
  
      // Add WHERE clause
      if($column != ""){
        $query .= " WHERE " . $column . " = :value";
      }
  
      // Prepare and execute the query
      return $this->query($query, [
          'value' => $value
      ]);
    }

    public function rightJoin($joinTable = null, $joinCondition = null, $column = '', $value = '') {
      // Sanitize the column name
      $column = addslashes($column);
  
      // Base query
      $query = "SELECT * FROM " . strtolower($this->tableName);
  
      // Add RIGHT JOIN if a join table and condition are provided
      if ($joinTable && $joinCondition) {
          $joinTable = addslashes($joinTable);
          $query .= " RIGHT JOIN " . $joinTable . " ON " . strtolower($this->tableName) . "." . $joinCondition;
      }
  
      // Add WHERE clause
      if($column != ""){
        $query .= " WHERE " . $column . " = :value";
      }
  
      // Prepare and execute the query
      return $this->query($query, [
          'value' => $value
      ]);
    }

    public function anyQuery($mainQuery, $subQuery, $fieldName, $linkType){
      $mainArr = array();
      $query = $mainQuery;
      $stmt = $this->dbc->prepare($query);
      $stmt->execute();

      // Fetch all results as an associative array
      $mainArr = $stmt->fetchAll(PDO::FETCH_ASSOC);

      // Check if any results were returned
      if ($mainArr) {
          foreach ($mainArr as $key => $value) {
            $sQuery = $subQuery;
            $stmtsQuery = $this->dbc->prepare($sQuery);
            $stmtsQuery->execute([
              $linkType => $value[$linkType]
            ]);
            $subArr = $stmtsQuery->fetchAll(PDO::FETCH_ASSOC);

            $mainArr[$key] = array_merge($mainArr[$key], [$fieldName=>$subArr]);
          }
      } else {
          echo "No records found.";
      }

      return $mainArr;
    }
    
    public function subQuery(){

      $mainArr = array();
      $query = "SELECT * FROM ".$this->tableName." GROUP BY churchid";
      $stmt = $this->dbc->prepare($query);
      $stmt->execute();

      // Fetch all results as an associative array
      $mainArr = $stmt->fetchAll(PDO::FETCH_ASSOC);

      // Check if any results were returned
      if ($mainArr) {
          foreach ($mainArr as $key => $value) {
            $subQuery = "SELECT * FROM satellites WHERE churchid = :churchid ";
            $stmtsubQuery = $this->dbc->prepare($subQuery);
            $stmtsubQuery->execute([
              "churchid" => $value['churchid']
            ]);
            $subArr = $stmtsubQuery->fetchAll(PDO::FETCH_ASSOC);

            $mainArr[$key] = array_merge($mainArr[$key], ["satellites"=>$subArr]);
          }
      } else {
          echo "No records found.";
      }

      return $mainArr;
      
    }

    public function insert($data){

      $keys = array_keys($data);
      $columns = implode(",", $keys);
      $values = implode(",:", $keys);

      $query = "INSERT INTO ". $this->tableName . " ($columns) VALUES (:$values)";
      // echo $query;
      return $this->query($query, $data);
    }

    public function update($id, $data){

      $str = "";
      foreach($data as $key => $value){
        $str .= $key . "=:" . $key . ",";
      }

      $str = trim($str, ",");

      $query = "UPDATE ". $this->tableName . " SET ". $str ." WHERE id = :id";
      // echo $query;
      return $this->query($query, $data);
    }

    private function addleadingzero($num){
      $maxid = "";
      $str = strlen($num);
      if($str == 1)
      { $maxid = "000000" . $num; }
      elseif($str == 2)
      { $maxid = "00000" . $num; }
      elseif($str == 3)
      { $maxid = "0000" . $num; }
      elseif($str == 4)
      { $maxid = "000" . $num; }
      elseif($str == 5)
      { $maxid = "00" . $num; }
      elseif($str == 6)
      { $maxid = "0" . $num; }
      else
      { $maxid = $num; }
  
      return $maxid;
    }

    public function createrecordid($tagname, $tablename, $tableprefix, $tablefield){
      $myid = "";

      //!! 1st Query
      $query = "SELECT tableid FROM idrecords WHERE tablename = :tablename AND tableid LIKE :tableprefix";
      $stmt = $this->dbc->prepare($query);
      $stmt->execute([
          'tablename' => $tablename,
          'tableprefix' => "%$tableprefix%"
      ]);
      $lastid = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch as associative array

      //!! 2nd Query
      $gettblid = "SELECT ".$tablefield." FROM ".$tablename." WHERE ".$tablefield." LIKE :tableprefix ORDER BY ID DESC LIMIT 0, 1";
      $stmtgettblid = $this->dbc->prepare($gettblid);
      $stmtgettblid->execute([
        'tableprefix'=>"%$tableprefix%",
      ]);
      $tblid = $stmtgettblid->fetch(PDO::FETCH_ASSOC); // Fetch as associative array

      // echo $tblid[$tablefield] . " - " . $tablefield . "<br>";
        
      if($lastid['tableid'] == ""){
        if($tblid[$tablefield] == ""){
          $myid = $tagname . "-" . $this->addleadingzero("1");
        }else{
          $myarr = explode("-", $tblid[$tablefield]);
				  $myid = $tagname . "-" . $this->addleadingzero($myarr[2]);
        }
        $query = "INSERT INTO idrecords (tablename, tablefield, tableid) VALUES (:tablename, :tablefield, :myid)";
        $stmt = $this->dbc->prepare($query);
        $stmt->execute([
            'tablename' => $tablename,
            'tablefield' => $tablefield,
            'myid' => $myid
        ]);
        
      }else{
        $arr = explode("-", $tblid[$tablefield]);
        $myid = $tagname . "-" . $this->addleadingzero($arr[2] + 1);

        $query = "UPDATE idrecords SET tableid = :myid WHERE tablename = :tablename AND tableid LIKE :tableprefix AND tablefield = :tablefield ";
        $stmt = $this->dbc->prepare($query);
        $stmt->execute([
          'myid' => $myid,
          'tablename' => $tablename,
          'tableprefix' => "%$tableprefix%",
          'tablefield' => $tablefield
        ]);
      }

      return $myid;
    }

    public function auditTrail($actionType, $tableName, $recordId, $oldData = '', $newData){

      $changed_byID = $_SESSION['userId'];
      $changed_byName = $_SESSION['userFullname'];
      $auditID = $this->createrecordid('GCF-AUDIT', 'audittrails', 'GCF-AUDIT', 'auditID');

      $query = "INSERT INTO audittrails (auditID, action_type, table_name, record_id, old_data, new_data, changed_byID, changed_byName) VALUES (:auditID, :actionType, :tableName, :recordId, :oldData, :newData, :changed_byID, :changed_byName)";
      $stmt = $this->dbc->prepare($query);
      $stmt->execute([
          'auditID' => $auditID,
          'actionType' => $actionType,
          'tableName' => $tableName,
          'recordId' => $recordId,
          'oldData' => $oldData,
          'newData' => $newData,
          'changed_byID' => $changed_byID,
          'changed_byName' => $changed_byName
      ]);
    }

  }