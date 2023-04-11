<?php
session_start();
require("../private/initialize.php");
require("../private/shared/header.php");
require("../private/shared/nav_bar.php")
?>
<?php  
if($_SESSION['username']){
  $ISBN =$_GET["ISBN"];
  $book = getBookByISBN($conn, $ISBN);
}
 // check if user is login
if(!$_SESSION['username']){
  
  redirect_to('login.php');

}
?>

     

<div class="container w-80">
<a href="view_book.php?ISBN=<?php echo $ISBN ?>">&laquo;Back to View book</a>
<form action="confrim_edit.php" method="post" id="book-form">
<div class="row mb-3">
  <div class="col">
   <label for="exampleFormControlTextarea1" class="form-label">Title:</label>
    <input type="text" class="form-control" name="title" value="<?php echo $book['title'] ?>">
  </div>
  <div class="col">
    <label for="exampleFormControlTextarea1" class="form-label">ISBN:</label>
    <input type="number" class="form-control"  name="ISBN" value="<?php echo $ISBN ?>">
  </div>
</div>
<div class="row mb-3">
  <div class="col">
  <label for="exampleFormControlTextarea1" class="form-label">Release date:</label>
    <input type="date" class="form-control" name="release_date" value="<?php echo $book['release_date'] ?>">
  </div>
  <div class="col">
    <label for="exampleFormControlTextarea1" class="form-label">Author:</label>
    <input type="text" class="form-control" name="author_name" value="<?php echo $book['author_name'] ?>">
  </div>
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Description</label>
  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="description" name="description"><?php echo $book['description'] ?></textarea>
</div>
<div class="row mb-3">
  <div class="col">
     <label for="exampleFormControlTextarea1" class="form-label">Publisher:</label>
    <input type="text" class="form-control" name="publisher_name" value="<?php echo $book['publisher'] ?>">
  </div>
  <div class="col">
     <label for="exampleFormControlTextarea1" class="form-label">Editor:</label>
    <input type="text" class="form-control" name="editor_name" value="<?php echo $book['editor'] ?>">
  </div>
</div>
  <div class="col">
    <input type="hidden" class="form-control" name="ISBN" value="<?php echo $ISBN ?>">
  </div>
</div>
<div class="col-12 text-center">
    <button class="btn btn-primary my-2" type="submit" name="update">update</button>
  </div>
</form>
</div>

