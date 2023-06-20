<?php

include_once '../../controllers/GestorController.php';
include_once '../../model/Gestor.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

     <link href="../../content/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <link href="../../content/bootstrap/bootstrap.min.css" rel="stylesheet" >
     <link href="../../content/css/form.css" rel="stylesheet" >
    <title></title>
  </head>
  <body>
      <style>
          .container{
              width: 70%;
          }
      </style>
 <div class="container">
    <br>
    <br>
    

    <?php
    //$id = $_GET['id'];
    $cod = filter_input(INPUT_GET, 'id');
    if(isset($cod))
    {
      $gest = $gestController->getGestorById($cod);
      echo'
      <div class="container">
      <form method="POST" >
   
                    <div class="row justify-content-between text-left">
                        
                         <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Nome Completo<span class="text-danger"> *</span></label> <input type="text" id="nome" name="nome" placeholder="" onblur="validate(1)" value="'.$gest->getNome().'"> </div>
                         <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">E-Mail<span class="text-danger"> *</span></label> <input type="email" id="email" name="email" placeholder="" value="'.$gest->getEmail().'" > </div>
                    </div>
                   
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Provincia<span class="text-danger"> *</span></label> 
                        <select id="provincia" name="provincia">
                         <option value="Luanda">Luanda</option>
                        <option value="Huambo">Huambo</option>
                        <option value="Cabinda">Cabinda</option>
                        <option value="Bengo">Bengo</option>
                        <option value="Kwanza-Norte">Kwanza-Norte</option>
                        <option value="Kwanza-Sul">Kwanza-Sul</option>
                        <option value="Benguela">Benguela</option>
                        </select>
                        </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Telemovel<span class="text-danger"> *</span></label> <input type="tel" id="tel" name="tel" placeholder="" onblur="validate(5)" required value="'.$gest->getTelefone().'"> </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Municipio<span class="text-danger"> *</span></label> <input type="text" id="municipio" name="municipio" placeholder="" onblur="validate(5)" required value="'.$gest->getMunicipio().'"> </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Comuna<span class="text-danger"> *</span></label> <input type="text" id="comuna" name="comuna" placeholder="" onblur="validate(5)" required value="'.$gest->getComuna().'"> </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Morada<span class="text-danger"> *</span></label> <input type="text" id="morada" name="morada" placeholder="" onblur="validate(5)" required value="'.$gest->getMorada().'"> </div>
                         <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Username<span class="text-danger"> *</span></label> <input type="text" id="user" name="user" placeholder="" onblur="validate(1)" required value="'.$gest->getUsername().'"> </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        
                    </div>
                    <div class="row justify-content-between text-left">
                       
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Password<span class="text-danger"> *</span></label> <input type="password" id="senha1" name="senha1" placeholder="" onblur="" required value="'.$gest->getPassword().'"> </div>
                                       
                    </div>
              <br>
              <button type="submit" name="editar" class="btn-primary">Editar</button>
              <a href="admin.php" class="btn btn-outline-secondary">Voltar</a>
        </form> 
        </div>';
      
    }
    
$nome = filter_input(INPUT_POST, 'nome');
$user = filter_input(INPUT_POST, 'user');
$email = filter_input(INPUT_POST, 'email');
$provincia = filter_input(INPUT_POST, 'provincia', FILTER_SANITIZE_STRING);
$municipio = filter_input(INPUT_POST, 'municipio');
$comuna = filter_input(INPUT_POST, 'comuna');
$tel = filter_input(INPUT_POST, 'tel');
$morada = filter_input(INPUT_POST, 'morada');
$senha = filter_input(INPUT_POST, 'senha1');
$btn = filter_input(INPUT_POST, 'editar');

if (isset($btn)) {

    $gesto = new Gestor();
    $gesto->setUsername($user);
    $gesto->setNome($nome);
    $gesto->setPassword($senha);
    $gesto->setMorada($morada);
    $gesto->setProvincia($provincia);
    $gesto->setMunicipio($municipio);
    $gesto->setComuna($comuna);
    $gesto->setTelefone($tel);
    $gesto->setEmail($email);

    $gestController->updateGestor($gesto);
    echo "<meta http-equiv=\"refresh\" content=\"0;URL=http://localhost/Sistema-Outdoors/view/admin/admin.php\">";
}
?>
    </div>
   
  </body>
</html>
