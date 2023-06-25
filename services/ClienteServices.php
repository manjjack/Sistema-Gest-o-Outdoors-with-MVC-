<?php

require_once '../repositories/ClienteRepository.php';

class ClienteServices {

    private $clienteRepository = NULL;

    public function __construct() {
        $this->clienteRepository = new ClienteRepository();
    }

    public function registar(Cliente $cliente) {
        try {
            
            $this->clienteRepository->registarCliente($cliente);
        } catch (Exception $e) {
            echo "An error occurred while: " . $e->getMessage();
        }
    }

    public function update(Cliente $cliente) {
        try {
            $this->clienteRepository->updateCliente($cliente);
        } catch (Exception $e) {
            echo "An error occurred while: " . $e->getMessage();
        }
    }

    public function getAll() {
        try {
            return $this->clienteRepository->getAllCliente();
        } catch (Exception $e) {
            echo "An error occurred while: " . $e->getMessage();
        }
    }

    public function getById($id) {
        try {
            return $this->clienteRepository->getClienteById($id);
        } catch (Exception $e) {
            echo "An error occurred while:  " . $e->getMessage();
        }
    }

    public function getByName($nome) {
        try {
            return $this->clienteRepository->getClienteByName($nome);
        } catch (Exception $e) {
            echo "An error occurred while:  " . $e->getMessage();
        }
    }

    public function delete($id) {
        try {
            $this->clienteRepository->deleteCliente($id);
        } catch (Exception $e) {
            echo "An error occurred while: " . $e->getMessage();
        }
    }
}
