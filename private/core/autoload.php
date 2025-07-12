<?php
session_start();

require("config.php");
require("database.php");
require("dbconnect.php");
require("controller.php");
require("template.php");
require("model.php");
require("app.php");


Database::connect(DB_HOST, DB_NAME, DB_USER, DB_PASSWORD);

spl_autoload_register(function($className) {

  require "../private/models/". ucfirst($className) . ".php";

});