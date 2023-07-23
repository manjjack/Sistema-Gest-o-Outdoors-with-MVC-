
<?php

include_once '../controllers/ComunaController.php';

if (isset($_POST['provincia'])) {
    $campo_pai_id = $_POST['provincia'];
    $array = $comunaRepository->getNomeMunicipioByProvincia($campo_pai_id);
    
    $json =  json_encode($array);
    
    echo $json;
}