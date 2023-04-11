<?php 
// check if it is a post request
function is_post_request(){
  if($_SERVER['REQUEST_METHOD']=='POST'){

   return True;

  }
   

}

// redirect users function
function redirect_to($location){
    header("Location: ". $location);
}

// set session variables when user login
function logedin_user($user){
     
    session_start();
    $_SESSION['user_id'] = $user['userID'];
    $_SESSION['username'] = $user['userName'];
    $_SESSION['name'] = $user['firstName']. " ". $user['lastName'];
    $_SESSION['last_login'] = time();
}

// creating a book associate array
function book(){
   global $conn;
  if(isset($_POST['add'])){

    $title = sanitize($conn, $_POST['title']);
    $ISBN = $_POST['ISBN'];
    $date =  $_POST['release_date'];
    $author = sanitize($conn, $_POST['author_name']);
    $description = sanitize($conn, $_POST['description']);
    $publisher = sanitize($conn, $_POST['publisher_name']);
    $editor = sanitize($conn, $_POST['editor_name']);
    $image = "images/book.png";
    
    
    $book = array("title"=>$title, "ISBN"=>$ISBN, "date"=>$date, "author"=>$author, "description"=>$description, "publisher"=>$publisher, "editor"=>$editor, "image"=>$image);
    return $book;
    
    
    
    }
    


}


?>