<?php

require_once '../repositories/AluguerRepository.php';

class AluguerServices {

    private $aluguerServices = NULL;

    public function __construct() {
        $this->aluguerServices = new AluguerRepository();
    }

    public function registar(Aluguer $al) {
        try {
            
            $this->aluguerServices->registarAluguer($al);
        } catch (Exception $e) {
            echo "An error occurred while: " . $e->getMessage();
        }
    }

    public function getClienteID($id) {
        try {
            
            $this->aluguerServices->getAllAluguerPorCliente($id);
        } catch (Exception $e) {
            echo "An error occurred while: " . $e->getMessage();
        }
    }

    public function update(Aluguer $al) {
        try {
            $this->aluguerServices->updateAluguer($al);
        } catch (Exception $e) {
            echo "An error occurred while: " . $e->getMessage();
        }
    }

    public function getAll() {
        try {
            return $this->aluguerServices->getAllAluguer();
        } catch (Exception $e) {
            echo "An error occurred while: " . $e->getMessage();
        }
    }

    public function getById($id) {
        try {
            return $this->aluguerServices->getAluguerById($id);
        } catch (Exception $e) {
            echo "An error occurred while:  " . $e->getMessage();
        }
    }
    /*
    public function getByName($nome) {
        try {
            return $this->clienteRepository->getClienteByName($nome);
        } catch (Exception $e) {
            echo "An error occurred while:  " . $e->getMessage();
        }
    }*/

    public function delete($id) {
        try {
            $this->aluguerServices->deleteAluguer($id);
        } catch (Exception $e) {
            echo "An error occurred while: " . $e->getMessage();
        }
    }
}
