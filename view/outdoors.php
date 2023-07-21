<?php
include_once '../model/Outdoor.php';
include_once '../controllers/OutdoorController.php';
include_once '../repositories/ComunaRepository.php';
include_once '../controllers/ComunaController.php';
include_once '../controllers/AluguerController.php';

session_start();
if (!isset($_SESSION['username'])) {
    include_once 'header.php';
} else {
    include_once 'header-gestor.php';
}
?>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .product-table {
            margin: 20px 0;
        }

        .product-table img {
            max-width: 100px;
            height: auto;
        }

        .container {
            width: 90%;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
        }

        .container {
            width: 90%;
            margin: 20px auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        /* Estilo para a tabela */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            background-color: #fff;
            border: 1px solid #e0e0e0;
        }

        th, td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #e0e0e0;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        /* Estilo para a imagem */
        .imagem {
            max-width: 100px;
            max-height: 100px;
            border-radius: 8px;
            object-fit: cover;
        }

        /* Estilo para os botões */
        .btn {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
            text-decoration: none;
            display: inline-block;
            margin: 4px;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        /* Estilo para o botão "Editar" */
        .btn-editar {
            background-color: #ffc107;
            color: black;
        }

        /* Estilo para o botão "Excluir" */
        .btn-excluir {
            background-color: #dc3545;
        }

        /* Estilo para o link dos botões */
        .link-editar {
            text-decoration: none;
        }

    </style>
</head>

<body>
    <div class="container">
        <h1>Outdoors</h1>
        <table class="table product-table">
            <thead>
                <tr>
                    <th>Imagem</th>
                    <th>Tipo</th>
                    <th>Preço</th>
                    <th>Comuna</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($outdoorController->getAllOutdoor() as $outd):
                    echo "<tr>";
                    echo "<td><img width='80' height='30' src='../content/images/images/a" . $outd->getImagem() . "'></td>";
                    echo "<td>" . $aluguerRepository->getNomeTipoOutdoor($outd->getTipoOutdoor())  . "</td>";
                    echo "<td>" . $outd->getPreco() . "</td>";
                    echo "<td>" . $comunaRepository->getNomeComuna($outd->getComuna()) . "</td>";
                    // echo "<td>" .$outd->getEstado()."</td>";
                

                endforeach;
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>