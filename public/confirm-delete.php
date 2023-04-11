<?php
//start session and use the required files
session_start();
require("../private/initialize.php");
require("../private/shared/header.php");
require("../private/shared/nav_bar.php")
?>

<?php 
//redirect users if it is not a post request
if(is_post_request()){
    

// delete book from database by ISBN 
if(isset($_POST["delete"])){
 $ISBN = $_POST['ISBN'];
 deleteBookByISBN($conn, $ISBN);

}
}else{
    redirect_to('login.php');
}


?>