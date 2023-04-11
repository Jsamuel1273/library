<?php 
//start session and use the required files
require("../private/shared/header.php");
require("../private/shared/nav_bar.php")
?>
<?php 
require("../private/initialize.php");
//redirect user if it is not a post request
if(is_post_request()){

//check if passwords match or not
  if($_POST['password'] !== $_POST['confirm_password']){
     //passwords do not match alert
     die(" <div class='alert alert-danger mt-3 container' role='alert'>
     Passwords do not match
     <a href='register.php'>&laquo;Back to register</a>
   </div>");
  }
    
    $userNames = getUserName($conn);
    //check if the username already exists or not
    if(in_array($_POST['username'], $userNames)){
      //usrname exists alert
      die(" <div class='alert alert-danger mt-3 container' role='alert'>
         username already exists
      <a href='register.php'>&laquo;Back to register</a>
    </div>");
     

    }
    //checking password strenght
    if(strlen($_POST['password']) < 8 || !preg_match('/[A-Z]/', $_POST['password']) || !preg_match('/[a-z]/', $_POST['password']) || !preg_match('/[0-9]/', $_POST['password']) || !preg_match('/[^A-Za-z0-9]/', $_POST['password'])){
      die(" <div class='alert alert-danger mt-3 container' role='alert'>
      Password is weak.<br>
   <a href='register.php'>&laquo;Back to register</a>
    </div>");
       
    }


    $firstName = sanitize($conn, $_POST['first_name']);
    $lastName = sanitize($conn, $_POST['last_name']);
    $email = sanitize($conn, $_POST['email']);
    $userName = sanitize($conn, $_POST['username']);
    $password = sanitize($conn, $_POST['password']);
    $confirmPassword = sanitize($conn, $_POST['confirm_password']);
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
   // insert user
    $query = "INSERT INTO `user`(`firstName`, `lastName`, `email`, `userName`, `password`) 
    VALUES ('$firstName','$lastName','$email','$userName','$hashed_password')";
     
     if(!mysqli_query($conn, $query)){
      die(" <div class='alert alert-danger mt-3 container' role='alert'>
        registraion unsuccessfull
   <a href='register.php'>&laquo;Back to register</a>
    </div>");
     }
      
     echo '
     <div class="alert alert-success mt-3 container" role="alert">
       registraion successfull
       <a href="login.php">Login here</a>
     </div>
    ';
     

}else{

    redirect_to('register.php');

}













?>