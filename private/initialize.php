<?php 
// start buffer
ob_start();

// calling connection function
require_once("db_connection.php");
$conn = db_connect();

//bring db funtions 
require_once("db_functions.php");

//bring funtions
require_once("functions.php");











?>