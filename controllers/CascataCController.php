
<?php

include_once '../controllers/ComunaController.php';

if (isset($_POST['municipio'])) {
    $campo_pai_id = $_POST['municipio'];
    $id = $comunaRepository->getMunicipioIdByNome($campo_pai_id);
    $array = $comunaRepository->getNomesComunasByMunicipioId($id);
    
    $json =  json_encode($array);
    
    echo $json;
}
