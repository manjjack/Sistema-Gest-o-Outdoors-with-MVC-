<?php
include_once '../controllers/UserController.php';
include_once '../model/User.php';
include_once '../repositories/UserRepository.php';
include_once '../controllers/Protect.php';
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="../content/images/logo/outdoors.png" type="image/x-icon">
        <link rel="stylesheet" href="../content/css/header.css">
        <link rel="stylesheet" href="../content/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="../content/css/tables.css">
        <title>Outdoors</title>
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand mt-2 mt-lg-0" href="index.php">
                <img src="../content/images/logo/outdoors.png" height="25" loading="lazy" id="logo"
                     style="margin-left: 10px;" />
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#textoNavbar"
                    aria-controls="textoNavbar" aria-expanded="false" aria-label="Alterna navegação">
                <span class="navbar-toggler-icon"></span>
            </button>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home <span class="sr-only"></span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="outdoors.php">Preços</a>
                </li>
                <?php
                if ($_SESSION['perfil'] == "Admin") {
                    echo ' <li class="nav-item">
                        <a class="nav-link" href="clientes-adm.php">Cliente</a>
                    </li>';
                    echo ' <li class="nav-item">
                        <a class="nav-link" href="admin.php">Adm/Gestor</a>
                    </li>';
                }
                ?>
            </ul>

            <div class="collapse navbar-collapse" id="textoNavbar">
                <?php
                //session_start();


                if ($_SESSION['perfil'] == "Admin") {
                    echo '
            <div class="dropdown " id="login" style="margin-left: 70%">
                <div class="d-flex align-items-right text-right">
                    <button type="button" class="btn btn-link px-3 me-2" style="color:black; background-color:white;">

                        <a href="../controllers/Logout.php" style="color:black; "> Log Out </a>
                    </button>
                    <button type="button" class="btn btn-primary me-3" id="btn-login">

                        <a href="form-gestor.php" style="color:white"> Criar Conta </a>
                    </button>

                    <button  type="button" class="btn btn-primary me-2" id="btn-login">

                        <a href="admin.php" style="color:white">' . $_SESSION['username'] . ' </a>
                    </button>
                </div> 
                </div>';
                } else if ($_SESSION['perfil'] == "Gestor") {
                    echo ' <div class="dropdown " id="login" style="margin-left: 70%">
                 <div class="d-flex align-items-right text-right">
                     <button type="button" class="btn btn-link px-3 me-2" style="color:black; background-color:white;">
 
                         <a href="../controllers/Logout.php" style="color:black; "> Log Out </a>
                     </button>
                     <button type="button" class="btn btn-primary me-3" id="btn-login">
 
                         <a href="form-outdoor.php" style="color:white"> Criar Outdoor </a>
                     </button>
                     <button type="button" class="btn btn-primary me-2" id="btn-login" style="background-color:white; border:none;">
 
                         <a href="gestor.php" style="color:black; ">' . $_SESSION['username'] . ' </a>
                     </button>
                 </div>
             </div>';
                } else if ($_SESSION['perfil'] == "Cliente") {
                    echo ' <div class="dropdown " id="login" style="margin-left: 70%">
                <div class="d-flex align-items-right text-right">
                    <button type="button" class="btn btn-link px-3 me-2" style="color:black; background-color:white;">

                        <a href="../controllers/Logout.php" style="color:black;"> Log Out </a>
                    </button>
                    <button type="button" class="btn btn-primary me-3" id="btn-login">

                        <a href="aluguer.php" style="color:white"> Alugar Outdoor </a>
                    </button>
                    <button type="button" class="btn btn-primary me-2" id="btn-login" style="background-color:white; border:none;">

                        <a href="cliente.php" style="color:black; ">' . $_SESSION['username'] . ' </a>
                    </button>
                </div>
            </div>';
                }
                ?>

            </div>

        </nav>

        <style>
            button {
                margin-left: 10px;
            }
        </style>