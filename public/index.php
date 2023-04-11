<?php
session_start();
require("../private/initialize.php");
require("../private/shared/header.php");
require("../private/shared/nav_bar.php")
?>


<div id='book-grid'>
     <?php if($_SESSION['username']){
      $userID = $_SESSION['user_id'];
      $result = getAllBooks($conn, $userID);
          
      if (mysqli_num_rows($result) > 0) {

    
         while($row = mysqli_fetch_assoc($result)) {
            $image = $row['bookImage'];
            $title = ucfirst($row['title']);
            $description = ucfirst($row['description']);
           
            echo "<div class='home-book'>
                <img src='$image' class='card-img-top' alt='...'>
                <h5 class='card-title'>$title</h5>
                <p class='card-text'>$description</p>
                <a href='view_book.php?ISBN=$row[ISBN]'>View book</a>
               </div>";
            
         }
         } else {
            echo '
               <div class="alert alert-danger mt-3 container " role="alert">
               No books to show
                 <a href="add_book.php">add book</a>
               </div>
              ';
       
        }
           
         
        
       
           
       }else{
         
        redirect_to('login.php');

       }
      
      ?>

</div>


<script src="app.js"></script>