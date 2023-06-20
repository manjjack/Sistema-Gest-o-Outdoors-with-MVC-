<?php
include_once '../header.php';
include_once '../../model/Outdoor.php';
include_once '../../controllers/OutdoorController.php';
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
      

        foreach($outdoorController->getAllOutdoor() as $outd):
            echo "<tr>";
            echo "<td><img width='80' height='30' src='../../content/images/images/a" . $outd->getImagem() . "'></td>";
            echo "<td>" .$outd->getTipoOutdoor()."</td>";
            echo "<td>" .$outd->getPreco()."</td>";
            echo "<td>" .$outd->getComuna()."</td>";
           // echo "<td>" .$outd->getEstado()."</td>";
            

        endforeach;
    ?>
      </tbody>
    </table>
  </div>
</body>
</html>
