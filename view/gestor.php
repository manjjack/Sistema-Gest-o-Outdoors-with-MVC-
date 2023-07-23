<?php
include '../controllers/Protect.php';
include_once 'header-gestor.php';
include_once '../controllers/OutdoorController.php';
include_once '../model/Outdoor.php';
include_once '../controllers/AluguerController.php';
include_once '../controllers/ComunaController.php';
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
            .container {
                width: 100%;
            }

            /* Estilo para a tabela */
            table {
                width: 100%;
                border-collapse: collapse;
                margin-bottom: 20px;
            }

            th, td {
                padding: 10px;
                text-align: center;
                border: 1px solid #ccc;
            }

            th {
                background-color: #f2f2f2;
                font-weight: bold;
            }

            /* Estilo para o botão de Excluir */
            .btn-excluir {
                background-color: #dc3545;
                color: white;
                border: none;
                padding: 8px 12px;
                border-radius: 4px;
                cursor: pointer;
            }

            .btn-excluir:hover {
                background-color: #c82333;
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
                    <th scope="col">tipoOutdoor</th>
                    <th scope="col">Preco</th>
                    <th scope="col">Comuna</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Imagem</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Excluir</th>

                </tr>
            </thead>
            <tbody>

<?php
foreach ($outdoorController->getAllOutdoor() as $outd):
    echo "<tr>";
    echo "<td>" . $outd->getId() . "</td>";
    echo "<td>" . $aluguerRepository->getNomeTipoOutdoor($outd->getTipoOutdoor()) . "</td>";
    echo "<td>" . $outd->getPreco() . "</td>";
    echo "<td>" . $comunaRepository->getNomeComuna($outd->getComuna()) . "</td>";
    echo "<td>" . $outd->getEstado() . "</td>";
    echo "<td><img width='30' height='20' src='../content/images/images/a" . $outd->getImagem() . "'></td>";

    echo '<td><a href="edit-outdoor.php?id=' . $outd->getId() . '" class=" btn-outline-secondary">Editar</a></td>';

    echo"<form method='post'>";

    echo "<input type='text' hidden value=" . $outd->getId() . " name='valorId' class='form-control' id='valorId'>";
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
    $outdoorController->deleteOutdoor($_POST['valorId']);
    echo "<meta http-equiv=\"refresh\" content=\"0;\">";
}
?>


    <script src="../Content/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

