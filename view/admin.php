<?php
include '../controllers/Protect.php';
include_once 'header-gestor.php';
include_once '../controllers/UserController.php';
include_once '../model/User.php';
include_once '../repositories/ComunaRepository.php';

$comuna = new ComunaRepository();
?>
<h7> Conta <?php  echo ' '. $_SESSION['perfil'] .' : '.$_SESSION['username'] ?></h7>



<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="../content/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title></title>
</head>
<body>

    <style>
        .container{
            width: 100%;
            margin-bottom: 20px;
        }
    </style>

    <div class="container>
         <br/>
         <br/>

         <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary" ></button>
    <table class="table" >
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Username</th>
                <th scope="col">Password</th>
                <th scope="col">Nome</th>
                <th scope="col">Morada</th>
                <th scope="col">Email</th>
                <th scope="col">Provincia</th>
                <th scope="col">Municipio</th>
                <th scope="col">Comuna</th>
                <th scope="col">telefone</th>
                <th scope="col">Conta</th>
                
                <th scope="col">Excluir</th>

            </tr>
        </thead>
        <tbody>

            <?php
            foreach ($gestController->getAllGestor() as $gest):
                echo "<tr>";
                echo "<td>" . $gest->getId() . "</td>";
                echo "<td>" . $gest->getUsername() . "</td>";
                echo "<td>" . $gest->getPassword() . "</td>";
                echo "<td>" . $gest->getNome() . "</td>";
                echo "<td>" . $gest->getMorada() . "</td>";
                echo "<td>" . $gest->getEmail() . "</td>";
                echo "<td>" . $gest->getProvincia() . "</td>";
                echo "<td>" . $gest->getMunicipio() . "</td>";
                echo "<td>" . $comuna->getNomeComuna($gest->getComuna()) . "</td>";
                echo "<td>" . $gest->getTelefone() . "</td>";
                echo "<td>" . $gest->getPerfil() . "</td>";
                
                echo"<form method='post'>";

                echo "<input type='text' hidden value=" . $gest->getId() . " name='valorId' class='form-control' id='valorId'>";
                echo '<td><input type="submit" data-bs-toggle="modal"  id="idGest" name="idGest" data-bs-target="#exampleModal1"  class="btn btn-danger" value="Excluir"></input>';

                echo'</form>';
                echo "</tr>";

            endforeach;
            ?>

        </tbody>
    </table>
        <?php
        echo '<td><a href="ChangeSenha.php?id=' . 2 . '" class=" btn-outline-primary">Editar Conta </a></td>';
        ?>
</div>


<?php
$btn = filter_input(INPUT_POST, 'idGest');
if (isset($btn)) {
    
        
    
        $gestController->deleteGestor($_POST['valorId']);
    
   
   
    echo "<meta http-equiv=\"refresh\" content=\"0;\">";
}
?>


<script src="../Content/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

