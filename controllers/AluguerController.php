<?php

include_once '../services/AluguerServices.php';
include_once '../model/Aluguer.php';
include_once '../repositories/AluguerRepository.php';

class AluguerController {

    private $aluguerService = NULL;

    public function __construct() {
        $this->aluguerService = new AluguerServices();
    }
    
    public function addAluguer(Aluguer $al) {
        $this->aluguerService->registar($al);
    }

    public function updateAluguer(Aluguer $al) {
        $this->aluguerService->update($al);
    }

    public function getAllAluguer() {
        return $this->aluguerService->getAll();
    }

    public function getAluguerById($id) {
        return $this->aluguerService->getById($id);
    }

    public function getAluguerByName($nome) {
        
    }

    public function deleteAluguer($id) {
        $this->aluguerService->delete($id);
    }

    public function getAllAluguerCliente($id) {
        $this->aluguerService->getClienteID($id);
    }
    

private function contarOcorrencias($vetor) {
    $ocorrencias = array();
    foreach ($vetor as $valor) {
        // Verifica se o valor é do tipo string ou integer antes de contá-lo
        if (is_string($valor) || is_integer($valor)) {
            $valorString = strval($valor); // Converte o valor para string
            if (isset($ocorrencias[$valorString])) {
                $ocorrencias[$valorString]++;
            } else {
                $ocorrencias[$valorString] = 1;
            }
        }
    }
    return $ocorrencias;
}

public function menorOcorrencia($vetor) {
    // Verifica se o vetor é nulo ou vazio
    if ($vetor === null || empty($vetor)) {
        // Retorna um valor padrão ou null quando não há ocorrências
        return null;
    }

    // Conta as ocorrências do vetor fornecido
    $ocorrencias = $this->contarOcorrencias($vetor);

    // Encontra o número com a menor ocorrência
    $minOcorrencia = min($ocorrencias);

    // Converte o resultado final em inteiro
    $minOcorrenciaInt = intval($minOcorrencia);

    return $minOcorrenciaInt;
}




}

$aluguerRepository = new AluguerRepository();
$aluguerServices = new AluguerServices();
$aluguerController = new AluguerController();