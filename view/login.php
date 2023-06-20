<?php
include_once 'header.php';
include_once '../controllers/AdminController.php';
?>
<header>
    <link rel="stylesheet" href="../content/css/form.css">
</header>
<!-- Pills navs -->
<br> <br>
<div class= "d-flex justify-content-center w-30">
<ul class="nav nav-pills nav-fill mb-3 " id="ex1" role="tablist">
  <li class="nav-item" role="presentation">
    <a
      class="nav-link active"
      id="tab-login"
      data-mdb-toggle="pill"
      href="#pills-login"
      role="tab"
      aria-controls="pills-login"
      aria-selected="true"
      style="background-color: black; color:white"
      >Login</a
    >
  </li>
  <li class="nav-item" role="presentation">
    <a
      class="nav-link"
      id="tab-register"
      data-mdb-toggle="pill"
      href="#pills-register"
      role="tab"
      aria-controls="pills-register"
      aria-selected="false"
      style="color:black"
      >Register</a
    >
  </li>
</ul>
</div>
<!-- Pills navs -->


<form class="form w-30 text-center" method="POST">
  <!-- Email input -->
  <div class="form-outline mb-4">
      <input type="text" id="form1Example1" class="form-control inputlogin" name="user" required />
    <label class="form-label" for="form1Example1">Username</label>
  </div>

  <!-- Password input -->
  <div class="form-outline mb-4">
    <input type="password" id="form1Example2" class="form-control inputlogin" name="pass" required/>
    <label class="form-label" for="form1Example2" >Password</label>
  </div>

  <!-- 2 column grid layout for inline styling -->
  <div class="row mb-4">
    <div class="col d-flex justify-content-center">
      <!-- Checkbox -->
      <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="form1Example3" checked />
        <label class="form-check-label" for="form1Example3"> Remember me </label>
      </div>
    </div>

  </div>

  <!-- Submit button -->
  <button type="submit" name="btn" class="btn btn-primary btn-block" style="background-color: black; color:white; border-color:black; width: 10%; margin-left: 45%">Sign in</button>
</form>

<?php

$user = filter_input(INPUT_POST, 'user');
$pass = filter_input(INPUT_POST, 'pass');
$bt = filter_input(INPUT_POST, 'btn');

$adm = $adminController->login($user, $pass);

if(isset($bt)){
    if($adm){
        
        header('Location: admin/admin.php');
        exit();
    }else{
        echo '<script> alert("Senha Invalida");</script>';
    }
}


include_once 'footer.php';
?>