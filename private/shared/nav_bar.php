<!-- bootstrap navbar top -->
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <a class="navbar-brand" href="#"><img src="images/open-book.png" width="100" height="100"></a>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          
        </li>
        <li class="nav-item">
         
        </li>
        <li class="nav-item">
        </li>
      </ul>
      <div>
        <?php if($_SESSION['username']){
            echo ' <form method="post" action="">
            <button class="btn btn-primary" type="submit" name="logout">Logout</button>
            </form>';
          
          }else{
            echo '<a href="login.php">Login  </a>&nbsp;';
            echo '<a href="register.php"> register</a>';
          }
          
          ?>
      </div>
</nav>
<!-- bootstrap navbar top  end-->
<!-- Header start -->
<header>

    <h1>Welcome  <?php if($_SESSION['username']){echo ucwords($_SESSION['name']); }else{
       echo "<br> Please login or signup to continue";
    } ?></h1>
    <?php 
    // display different menu items base on user login satus
    if($_SESSION['username']){
        echo '<a href="index.php">  Home </a>&nbsp;';
      
      echo '<a href="add_book.php ">add book </a>&nbsp;';
      
    }
    
    ?>
</header>
<!-- Header end -->

<?php 
//Logout users and unset session variables

if(isset($_POST['logout'])){

  unset($_SESSION['user_id']);
  unset($_SESSION['username']);
  unset($_SESSION['last_login']);

  redirect_to('login.php');


}

?>