<?php
//start session and use the required files
session_start();
require("../private/initialize.php");
require("../private/shared/header.php");
require("../private/shared/nav_bar.php")
?>

<?php 

//checking if it is not a post request then redirect user to login page
if(is_post_request()){

 $username = sanitize($conn, $_POST['username']);
 $password = sanitize($conn, $_POST['password']);

   if(!find_user_by_username($conn, $username)){
  
      die("
      <div class='alert alert-warning mt-3 container' role='alert'>
         Incorrect username
        <a href='login.php'>&laquo;Back to login</a>
      </div>
     ");
   }
    $user = find_user_by_username($conn, $username);
   if(password_verify($password, $user['password'])){
      logedin_user($user);
    redirect_to('index.php');
      
   }
   echo "<div class='alert alert-warning mt-3 container' role='alert'>
         Incorrect password
      <a href='login.php'>&laquo;Back to login</a>
    </div>";
   
}else{

  redirect_to('login.php');


}















?>