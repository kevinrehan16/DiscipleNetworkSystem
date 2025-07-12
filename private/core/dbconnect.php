<?php

  class Dbconnect {

  protected $dbh;
  protected $dbc;

  function query($query, $params = [], $data_type = "object") {
      $stmt = $this->dbc->prepare($query);
      if ($stmt) {
          // Bind parameters
          foreach ($params as $key => $value) {
              $stmt->bindValue($key, $value, PDO::PARAM_STR);
          }

          // Execute the statement
          $check = $stmt->execute();
          if ($check) {
              // Fetch data
              if ($data_type == "object") {
                  $data = $stmt->fetchAll(PDO::FETCH_OBJ);
              } else {
                  $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
              }

              // Return data if available
              if (is_array($data) && count($data) > 0) {
                  return $data;
              }
          }
      }

      return false;
  }
}
