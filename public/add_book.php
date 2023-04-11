<?php
//start session and use the required files
session_start();
require("../private/initialize.php");
require("../private/shared/header.php");
require("../private/shared/nav_bar.php")
?>

<?php
// redirecting users if they are not login
 if(!$_SESSION['username']){
  
  redirect_to('login.php');

}
?>
<!-- Bootstrap form -->
<div class="container w-80">
<a href="index.php">&laquo;Back to Home</a>
<form action="" method="post" id="book-form">
<div class="row mb-3">
  <div class="col">
    <input type="text" class="form-control" placeholder="Book title" name="title">
  </div>
  <div class="col">
    <input type="number" class="form-control" placeholder="Book ISBN" name="ISBN">
  </div>
</div>
<div class="row mb-3">
  <div class="col">
    <input type="date" class="form-control" placeholder="Release date" name="release_date">
  </div>
  <div class="col">
    <input type="text" class="form-control" placeholder="Author name" name="author_name">
  </div>
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Description" name="description"></textarea>
</div>
<div class="row mb-3">
  <div class="col">
    <input type="text" class="form-control" placeholder="Publisher name" name="publisher_name">
  </div>
  <div class="col">
    <input type="text" class="form-control" placeholder="Editor name" name="editor_name">
  </div>
</div>
<div class="text-center">
    <button class="btn btn-primary" type="submit" name="add">Add</button>
  </div>
</div>
</form>
<?php 

// calling the book funtion and gettinf an associate array
$book = book();

//user id
$userID = $_SESSION['user_id'];

//calling the cretae book function and passing the associate array of book
createBook($conn, $book, $userID);


?>