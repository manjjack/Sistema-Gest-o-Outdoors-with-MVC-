<?php
include_once '../controllers/ComunaController.php';
if (isset($_POST['valorJS'])) {
    $valorPHP = $_POST['valorJS'];
    $idComuna = $comunaRepository->getComunaIdByNome($valorPHP);

    // Retorna a resposta como um JSON contendo as opções do select #tipo
    $response = array();

    if ($idComuna !== null) {
        foreach ($comunaRepository->getOutdoorInfoByMunicipioId($idComuna) as $com) {
            $option = array(
                'id' => $com->getId(),
                'tipo' => $comunaRepository->getTipoOutdoorById($com->getTipoOutdoor())
            );
            $response[] = $option;
        }
    } else {
        // Caso a comuna não seja encontrada, adicionamos uma opção de selecione novamente
        $option = array(
            'id' => '',
            'tipo' => '----Selecione----'
        );
        $response[] = $option;
    }

    // Transforma o array de resposta em JSON e retorna para o JavaScript
    echo json_encode($response);
    exit();
}
?>