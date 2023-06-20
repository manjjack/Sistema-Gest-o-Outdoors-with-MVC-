<?php

require_once '../../repositories/GestorRepository.php';

class GestorServices {

    private $gestorRepository = NULL;

    public function __construct() {
        $this->gestorRepository = new GestorRepository();
    }

    public function registar(Gestor $gest) {
        try {
            $this->gestorRepository->registarGestor($gest);
        } catch (Exception $e) {
            echo "An error occurred while: " . $e->getMessage();
        }
    }

    public function update(Gestor $gest) {
        try {
            $this->gestorRepository->updateGestor($gest);
        } catch (Exception $e) {
            echo "An error occurred while: " . $e->getMessage();
        }
    }

    public function getAll() {
        try {
            return $this->gestorRepository->getAllGestor();
        } catch (Exception $e) {
            echo "An error occurred while: " . $e->getMessage();
        }
    }

    public function getById($id) {
        try {
            return $this->gestorRepository->getGestorById($id);
        } catch (Exception $e) {
            echo "An error occurred while:  " . $e->getMessage();
        }
    }

    public function getByName($nome) {
        try {
            return $this->gestorRepository->getGestorByName($nome);
        } catch (Exception $e) {
            echo "An error occurred while:  " . $e->getMessage();
        }
    }

    public function delete($id) {
        try {
            $this->gestorRepository->deleteGestor($id);
        } catch (Exception $e) {
            echo "An error occurred while: " . $e->getMessage();
        }
    }
}
