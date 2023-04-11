<?php
session_start();
require("../private/initialize.php");
require("../private/shared/header.php");
require("../private/shared/nav_bar.php")
?>

<div class="container w-50">
<form action="authenticate.php" method="post" id="book-form">
<div class="mb-1">
  <label class="form-label">username</label>
  <input type="text" class="form-control" placeholder="username" name="username" required>
</div>
<div class="mb-1">
  <label class="form-label">password</label>
  <input type="password" class="form-control"  placeholder="password" name="password" required>
</div>
<div class="text-center">
    <button class="btn btn-primary" type="submit" name="login">login</button>
  </div>
</form>
</div>