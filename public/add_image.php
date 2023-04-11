<?php

require("../private/initialize.php");
require("../private/shared/header.php");
require("../private/shared/nav_bar.php")
?>
<div class="container w-80" style="margin-top: 6rem;">
<form method="post" enctype="multipart/form-data">
   <div class="mb-2">
    <input class="form-control" type="file" name="image">
  </div>
  <div class="mb-2">
    <input class="form-control" type="submit" name="update" value="Update">
    </div>
    <div class="mb-2">
    <input class="form-control" type="submit" name="keep" value="keep default image">
    </div>
</form>
</div>
<?php  
$ISBN = $_GET['ISBN'];
$title = $_GET['title'];

echo $ISBN."<br>";
echo $title."<br>";



// Check if the form was submitted
if(isset($_POST['update'])) {
    // Get the image file data
    $image = $_FILES['image'];

    // Define the upload directory
    $uploadDir = "images/";

    // Generate a unique filename for the uploaded file
    $fileName =  $image['name'].$title;

   

    if($image['type'] == "image/png" || $image['type'] == "image/jpeg"){
        
        if($image['size'] < 5242880){
            if(move_uploaded_file($image['tmp_name'], $uploadDir . $fileName)){
            $filePath = $uploadDir . $fileName;
            $query = "INSERT INTO `books`(`bookImage`) VALUES ('$filePath')";
            if (mysqli_query($conn, $sql)) {
                redirect_to("view_book.php?ISBN=$book[ISBN],?title=$book[title]");
            } else {
              echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
            }else{
                "There was an error";
            }
        }else{
            echo "File is too large";
        }
        

    }else{
        echo "Not supported";
    }

    // // Move the uploaded file to the server
    

    // // Prepare the query to insert the file path into the database
    // $filePath = $uploadDir . $fileName;
    // $query = "INSERT INTO images (file_path) VALUES ('$filePath')";

    // // Execute the query
    // mysqli_query($conn, $query);
}


 
?> 