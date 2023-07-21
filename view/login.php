<?php
include_once 'header.php';
include_once '../controllers/UserController.php';
include_once '../model/User.php';
?>

<!-- Pills navs -->
<br> <br>
<div class="d-flex justify-content-center w-30">
  <ul class="nav nav-pills nav-fill mb-3 " id="ex1" role="tablist">
    <li class="nav-item" role="presentation">
      <a class="nav-link active" id="tab-login" data-mdb-toggle="pill" href="#pills-login" role="tab"
        aria-controls="pills-login" aria-selected="true" style="background-color: black; color:white">Login</a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link" id="tab-register" data-mdb-toggle="pill" href="#pills-register" role="tab"
        aria-controls="pills-register" aria-selected="false" style="color:black">Register</a>
    </li>
  </ul>
</div>
<!-- Pills navs -->


<form class="form w-30 text-center" method="POST" action="../repositories/autenticar.php">
  <!-- Email input -->
  <div class="form-outline mb-4">
    <input type="text" id="form1Example1" class="form-control inputlogin" name="user" required
      style="width: 300px; height: 40px; margin-left:38%" />
    <label class="form-label" for="form1Example1">Username</label>
  </div>

  <!-- Password input -->
  <div class="form-outline mb-4">
    <input type="password" id="form1Example2" class="form-control inputlogin" name="pass" required
      style="width: 300px; height: 40px;margin-left:38%" />
    <label class="form-label" for="form1Example2">Password</label>
  </div>

  <!-- 2 column grid layout for inline styling -->
  <div class="row mb-4">
    <div class="col d-flex justify-content-center">
      <!-- Checkbox -->

    </div>

  </div>

  <!-- Submit button -->
  <button type="submit" name="btn" class="btn btn-primary "
    style="margin-right: 45%;background-color: black; color:white; border-color:black; width: 10%; margin-left: 45%">Login</button>
</form>