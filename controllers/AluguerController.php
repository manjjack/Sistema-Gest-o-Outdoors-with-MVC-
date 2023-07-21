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
}

$aluguerRepository = new AluguerRepository();
$aluguerServices = new AluguerServices();
$aluguerController = new AluguerController();