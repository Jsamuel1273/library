<?php
require("../private/initialize.php");
require("../private/shared/header.php");
require("../private/shared/nav_bar.php")
?>

<div class="container w-50">
 <form action="confirm-registration.php" method="post" id="book-form">
  <div class="mb-1">
  <label class="form-label">First name</label>
  <input type="text" class="form-control" placeholder="first name" name="first_name" required>
</div>
<div class="mb-1">
  <label class="form-label">Last name</label>
  <input type="text" class="form-control" placeholder="last name" name="last_name" required>
</div>
<div class="mb-1">
  <label class="form-label">Email</label>
  <input type="email" class="form-control" placeholder="email" name="email" required>
</div>
<div class="mb-1">
  <label class="form-label">username</label>
  <input type="text" class="form-control" placeholder="username" name="username" required>
</div>
<div class="mb-1">
  <label class="form-label">password</label>
  <input type="password" class="form-control"  placeholder="password" name="password" required>
</div>
<div class="mb-1">
  <label class="form-label">confirm password</label>
  <input type="password" class="form-control" placeholder="confirm password" name="confirm_password" required>
</div>

<div class="col-12">
  <div class="form-check">
      <input class="form-check-input" type="checkbox" value=""  name="terms" required>
      <label class="form-check-label mb-2" for="invalidCheck">
        Agree to terms and conditions
      </label>
  <div class="text-center">
    <button class="btn btn-primary" type="submit" name="register">register</button>
  </div>
  </form>
</div>


