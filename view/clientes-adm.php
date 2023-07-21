<?php
include_once '../controllers/Protect.php';
include_once 'header-gestor.php';
include_once '../controllers/ClienteController.php';
include_once '../model/Cliente.php';
include_once '../repositories/ClienteRepository.php';
?>

<h5 style="margin-top: 20px; margin-left: 20px"> Clientes</h5>


<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="../Content/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title></title>
</head>

<body>

  <style>
    .container {
      min-height: 100vh;
    }

    /* Adicione o seguinte CSS para ajustar a largura da tabela */
    table {
      width: 100%;
    }
  </style>

  <div class="container>
    <br/>
    <br/>
             
    <button type=" button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary"></button>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Username</th>
          <th scope="col">Nome</th>
          <th scope="col">Morada</th>
          <th scope="col">Email</th>
          <th scope="col">Provincia</th>
          <th scope="col">Municipio</th>
          <!--  <th scope="col">Comuna</th>-->
          <th scope="col">telefone</th>
          <th scope="col">Tipo C</th>
          <th scope="col">Atividade</th>
          <th scope="col">Nacionalidade</th>
          <th scope="col">Excluir</th>
          <?php if ($_SESSION['perfil'] == "Admin")
            echo ' <th scope="col">Act/Des</th> ';
         
          ?>

        </tr>
      </thead>
      <tbody>

        <?php

        
        foreach ($clienteController->getAllClientes() as $gest):
          echo "<tr>";
          echo "<td>" . $gest->getId() . "</td>";
          echo "<td>" . $gest->getUsername() . "</td>";

          echo "<td>" . $gest->getNome() . "</td>";
          echo "<td>" . $gest->getMorada() . "</td>";
          echo "<td>" . $gest->getEmail() . "</td>";
          echo "<td>" . $gest->getProvincia() . "</td>";
          echo "<td>" . $gest->getMunicipio() . "</td>";
          //  echo "<td>" . $gest->getComuna() . "</td>";
          echo "<td>" . $gest->getTelefone() . "</td>";
          echo "<td>" . $gest->getTipoCliente() . "</td>";
          echo "<td>" . $gest->getActividadeEmpresa() . "</td>";
          echo "<td>" . $gest->getNacionalidade() . "</td>";

          echo "<form method='post'>";


          echo "<input type='text' hidden value=" . $gest->getId() . " name='valorId' class='form-control' id='valorId'>";
          echo '<td><input type="submit" data-bs-toggle="modal"  id="idGest" name="idGest" data-bs-target="#exampleModal1"  class="btn btn-danger" value="Excluir"></input>';


          if ($gest->getStatus() == "desativado") {
            echo "<input type='text' hidden value=" . $gest->getId() . " name='valorStatus' class='form-control' id='valorStatus'>";
            echo '<td><input type="submit" data-bs-toggle="modal"  id="idC" name="idC" data-bs-target="#exampleModal1"  class="btn btn-secondary" value="Desati."></input>';
          } else {
            echo "<input type='text' hidden value=" . $gest->getId() . " name='valorStatus1' class='form-control' id='valorStatus'>";
            echo '<td><input type="submit" data-bs-toggle="modal"  id="idC1" name="idC1" data-bs-target="#exampleModal1"  class="btn btn-primary" value="Ativado"></input>';
          }

          echo '</form>';
          echo "</tr>";

        endforeach;
        ?>

      </tbody>
    </table>

  </div>


  <?php
  $btn = filter_input(INPUT_POST, 'idGest');
  if (isset($btn)) {
    $clienteController->deleteCliente($_POST['valorId']);
    echo "<meta http-equiv=\"refresh\" content=\"0;\">";
  }

  $btn1 = filter_input(INPUT_POST, 'idC');
  if (isset($btn1)) {

    $clienteRepository->ativarConta($_POST['valorStatus']);
    echo "<meta http-equiv=\"refresh\" content=\"0;http://localhost/Sistema-Outdoors/view/clientes-adm.php\">";

  }

  $btn2 = filter_input(INPUT_POST, 'idC1');
  if (isset($btn2)) {

    $clienteRepository->desativarConta($_POST['valorStatus1']);
    echo "<meta http-equiv=\"refresh\" content=\"0;http://localhost/Sistema-Outdoors/view/clientes-adm.php\">";

  }

  ?>


  <script src="../Content/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
</body>

</html>