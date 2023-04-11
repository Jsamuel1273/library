<?php
//require the database credentials from credentials php
    require_once("db_credentials.php");

    //connection to db function
    function db_connect(){
        
        $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
        if($connection){
            return $connection;
        }
       
    }

  // disconnection function
    function db_disconnect($conn){

        if(isset($conn)){
            mysqli_close($conn);
        }

    }
  //sanitize user input
   function sanitize($conn, $string){

    $escapeString = mysqli_real_escape_string($conn, $string);
    $trimed = trim($escapeString);
    $toLowerCase = strtolower($trimed);
    return $toLowerCase;
    
   }

    



?>