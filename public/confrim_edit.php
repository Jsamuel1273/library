<?php
session_start();
require("../private/initialize.php");
require("../private/shared/header.php");
require("../private/shared/nav_bar.php")
?>

<?php 
// check if user is login
if(!$_SESSION['username']){
  
  redirect_to('login.php');

}

//insert user
  if(isset($_POST['update']))
  $ISBN =$_POST["ISBN"];
  $title = sanitize($conn, $_POST['title']);
  $date = sanitize($conn, $_POST['release_date']);
  $author = sanitize($conn, $_POST['author_name']);
  $description = sanitize($conn, $_POST['description']);
  $publisher = sanitize($conn, $_POST['publisher_name']);
  $editor = sanitize($conn, $_POST['editor_name']);
   
   

  $sql = "UPDATE `books` SET `ISBN`= '$ISBN', `title`= '$title',`release_date`= '$date',`author_name`= '$author',`description`= '$description',`publisher`= '$publisher',`editor`='$editor' WHERE ISBN = $ISBN";
     if (mysqli_query($conn, $sql)) {
        echo " <div class='alert alert-success mt-3 container' role='alert'>
          Updated successfully
          <a href='view_book.php?ISBN=$ISBN'>&laquo;Back to View book</a>
        </div>
         ";
      } else {
        " <div class='alert alert-success mt-3 container' role='alert'>
             Erro updating record 
          <a href='edit_book.php?ISBN=$ISBN'>&la laquo;Back to Edit book</a>
        </div>
         ";
        echo mysqli_error($conn);
      }



?>