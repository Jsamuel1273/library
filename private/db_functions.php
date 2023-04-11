<?php
// finding a user by their username function
function find_user_by_username($conn, $username){
    

    $sql = "SELECT * FROM user WHERE username='".  $username ."';";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);
    mysqli_free_result($result);

    return $user;
  }

  // creating a book function by using the book details returned from book function
  function createBook($conn, $book, $userID){
    $sql = "INSERT INTO `books`(`ISBN`, `title`, `release_date`, `author_name`, `description`, `publisher`, `editor`,`bookImage`, `userID`) 
        VALUES ('$book[ISBN]','$book[title]','$book[date]','$book[author]','$book[description]','$book[publisher]','$book[editor]', '$book[image]', '$userID')";
         if (mysqli_query($conn, $sql)) {
            redirect_to("view_book.php?ISBN=$book[ISBN]");
        } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
  

}

// get all books from database
function getAllBooks($conn, $userID){

  $sql = "SELECT `ISBN`, `title`, `release_date`, `author_name`, `description`, `publisher`, `editor`, `bookImage` FROM `books` WHERE userID = $userID ";
  $result = mysqli_query($conn, $sql);
  return $result;
  
  
}

//get a book using ISBN number
function getBookByISBN($conn, $ISBN){
    $sql = "SELECT  `title`, `release_date`, `author_name`, `description`, `publisher`, `editor` FROM `books` WHERE ISBN = $ISBN";
    $result = mysqli_query($conn, $sql);
    $book = mysqli_fetch_assoc($result);
    return $book;

}

//delete a book from the db 
function deleteBookByISBN($conn, $ISBN){
    
    $sql = "DELETE FROM `books` WHERE  ISBN = $ISBN";
    if (mysqli_query($conn, $sql)) {
      echo '
      <div class="alert alert-success mt-3 container" role="alert">
         Book deleted
        <a href="index.php">&laquo; Back to Home</a>
      </div>
     ';
      } else {
        echo '
        <div class="alert alert-success mt-3 container" role="alert">
           Book not deleted
          <a href="index.php">&laquo; Back to Home</a>
        </div>
       ';
      }

}

// update a book using ISBN
function updateBookByISBN($conn, $ISBN){

     $sql = "UPDATE `books` SET `ISBN`='[value-1]',`title`='[value-2]',`release_date`='[value-3]',`author_name`='[value-4]',`description`='[value-5]',`publisher`='[value-6]',`editor`='[value-7]' WHERE ISBN = $ISBN";
     if (mysqli_query($conn, $sql)) {
        echo "Record updated successfully";
      } else {
        echo "Error updating record: " . mysqli_error($conn);
      }

}

//getting all username from db for verification during login
function getUserName($conn){
  $query = "SELECT userName FROM `user`";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) > 0){
   while($row = mysqli_fetch_assoc($result)){
     
    $usernames = array($row["userName"]);
    return $usernames;
     
   }
      
  }else{
    echo "no user found";
  }
}


?>