<?php

include_once '../services/ClienteServices.php';
include_once '../model/Cliente.php';
include_once '../repositories/ClienteRepository.php';

class ClienteController {

    private $clienteService = NULL;

    public function __construct() {
        $this->clienteService = new ClienteServices();
    }
    
    public function addCliente(Cliente $clinte) {
        $this->clienteService->registar($clinte);
    }

    public function updateCliente(Cliente $cliente) {
        $this->clienteService->update($cliente);
    }

    public function getAllClientes() {
        return $this->clienteService->getAll();
    }

    public function getClienteById($id) {
        return $this->clienteService->getById($id);
    }

    public function getClienteByName($nome) {
        return $this->clienteService->getByName($nome);
    }

    public function deleteCliente($id) {
        $this->clienteService->delete($id);
    }
}

$clienteRepository = new ClienteRepository();
$clienteServices = new ClienteServices();
$clienteController = new ClienteController();