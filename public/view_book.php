<?php
session_start();
require("../private/initialize.php");
require("../private/shared/header.php");
require("../private/shared/nav_bar.php");

?>


<?php 


$ISBN = $_GET['ISBN'];
$book = getBookByISBN($conn, $ISBN);


if ($book) {
  $ISBN = $_GET['ISBN'];
  $title = ucfirst($book['title']);
  $auhor = ucwords($book['author_name']);
  $description = ucfirst($book['description']);
  $publisher = ucwords($book['publisher']);
  $editor = ucwords($book['editor']);
      // output data of each row  
        echo "<div class='container'>
         <div id='view-book'>
         <img src='https://media.istockphoto.com/id/1458805217/photo/a-book-left-open-in-the-classroom.jpg?b=1&s=170667a&w=0&k=20&c=375NGicJCqph4f9nCYQFDTbmdpJzK01b_XxHcoqgS-g=' class='img-thumbnail rounded' alt='...'>
             <h2>Title: $title</h2>
             <h2>ISBN: $ISBN</h2>
             <p>Descrition: $description</p>
             <h3>Written by: $auhor</h3>
             <h4>Published by: $publisher</h4>
             <h5>Edited by: $editor</h5>
             <h2>Released on: $book[release_date]</h2>
             <a href='edit_book.php?ISBN=$ISBN'>Edit</a>
             

             <!-- Button trigger modal -->
<button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#exampleModal'>
 Delete
</button>

<!-- Modal -->
<div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
  <div class='modal-dialog'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h1 class='modal-title fs-5' id='exampleModalLabel'>Confirm delete</h1>
        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
      </div>
      <div class='modal-body'>
        Procced to delete?
      </div>
      <div class='modal-footer'>
      <form method='post' action='confirm-delete.php'>
        <input type='hidden' name='ISBN' value='$ISBN'>
        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>No</button>
        <button type='submit' class='btn btn-primary' name='delete'>Yes</button>
      </form>
      </div>
    </div>
  </div>
</div>      
</div>
</div>";
    
      } else {
      echo "0 results";
     }

    
?>



