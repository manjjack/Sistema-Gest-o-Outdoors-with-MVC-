<?php
include '../controllers/Protect.php';
include_once 'header-gestor.php';
include_once '../controllers/ClienteController.php';
include_once '../controllers/AluguerController.php';
include_once '../model/Aluguer.php';
?>
<h7> Conta <?php echo ' ' . $_SESSION['perfil'] . ' : ' . $_SESSION['username'] ?></h7>
<h5 style="margin-top: 20px; margin-left: 20px"> Outdoors</h5>


<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" conte nt="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="../Content/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <title></title>
    </head>
    <body>

        <style>
            .container{
                width: 100%;
            }
        </style>

        <div class="container>
             <br/>
             <br/>

             <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary" ></button>
        <table class="table" >
            <thead>
                <tr>
                    <th scope="col">IdOutdoor</th>
                    <th scope="col">IdCliente</th>
                    <th scope="col">Preco</th>
                    <th scope="col">Data Inicio</th>
                    <th scope="col">Data Fim</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Excluir</th>

                </tr>
            </thead>
            <tbody>

                <?php
                $idC = $aluguerRepository->getIdByUser($_SESSION['username']);
                foreach ($aluguerRepository->getAllAluguerPorCliente($idC) as $outd):
                    echo "<tr>";
                    echo "<td>" . $outd->getIdOutdoor() . "</td>";
                    echo "<td>" . $outd->getIdCliente() . "</td>";
                    echo "<td>" . $outd->getIdCliente() . "</td>";
                    echo "<td>" . $outd->getDataInicio() . "</td>";
                    echo "<td>" . $outd->getDataFim() . "</td>";
                    echo "<td>" . $outd->getPrecoFinal() . "</td>";
                    // echo "<td><img width='30' height='20' src='../content/images/images/a" . $outd->getImagem() . "'></td>";

                    echo '<td><a href="edit-gestor.php?id=' . $outd->getIdOutdoor() . '" class=" btn-outline-secondary">Editar</a></td>';

                    echo"<form method='post'>";

                    echo "<input type='text' hidden value=" . $outd->getIdOutdoor() . " name='valorId' class='form-control' id='valorId'>";
                    echo '<td><input type="submit" data-bs-toggle="modal"  id="idGest" name="idGest" data-bs-target="#exampleModal1"  class="btn btn-danger" value="Excluir"></input>';

                    echo'</form>';
                    echo "</tr>";

                endforeach;
                ?>

            </tbody>
        </table>

    </div>


    <?php
    $btn = filter_input(INPUT_POST, 'idGest');
    if (isset($btn)) {
        $aluguerController->deleteAluguer($_POST['valorId']);
        echo "<meta http-equiv=\"refresh\" content=\"0;\">";
    }
    ?>


    <script src="../Content/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

