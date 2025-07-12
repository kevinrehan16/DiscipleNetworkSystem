<?php

//! THIS IS A SINGLETON USE FINAL TO PREVENT ANYONE EXTENDING THE CLASS TO MAKE NEW INSTANCE OF IT.
final class Database {
  
  private static $instance = null;
  private  static $connection;

  public static function getInstance(){

    if(is_null(self::$instance)){
      // var_dump("We are creating an instance once only."); //! THIS IS HOW TO CHECK HOW MANY INSTANCE YOU MAKE IT SHOULD BE ONE
      self::$instance = new Database();
    }

    // var_dump("We are returning the instance."); //! THIS IS HOW TO CHECK HOW MANY INSTANCE YOU MAKE THIS IS MULTIPLE IF YOU CALL THE METHOD MULTIPLE TIMES
    return self::$instance;
  }

  private function __construct(){
    //!! IN SINGLETON YOU NEED TO ADD THIS METHOD AND MAKE IT PRIVATE SO THAT NO ONE CAN CONTRUCT IN THIS CLASS.
  }

  private function __clone(){
    //!! IN SINGLETON YOU NEED TO ADD THIS METHOD AND MAKE IT PRIVATE SO THAT NO ONE CAN CLONE IN THIS CLASS.
  }
  
  // Prevent the instance from being serialized
  public function __sleep() {
    //!! IN SINGLETON YOU NEED TO ADD THIS METHOD SO THAT NO ONE CAN SERIALIZE IN THIS CLASS.
    //! Return an empty array to prevent serialization of the object
    return array();
  }
  
  public function __wakeup(){
    throw new \Exception("Cannot unserialize a singleton.");
    //!! IN SINGLETON YOU NEED TO ADD THIS METHOD SO THAT NO ONE CAN UNSERIALIZE IN THIS CLASS.
    //!! THIS METHOD IS USE IN UNSERIALIZING OUR OBJECT TO STORE MAYBE SESSION OR WHATEVER.
  }

  public static function connect($host, $dbname, $user, $password){
    // var_dump("We are connecting to the database once only."); //! THIS IS HOW TO CHECK HOW MANY INSTANCE YOU MAKE IT SHOULD BE ONE
    self::$connection = new PDO("mysql:dbname=$dbname;host=$host", $user, $password);
  }

  public static function getConnection(){
    return self::$connection;
  }
}