<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */


include_once '../../services/GestorServices.php';
include_once '../../model/Gestor.php';
include_once '../../repositories/GestorRepository.php';

class GestorController {

    private $gestorService = NULL;

    public function __construct() {
        $this->gestorService = new GestorServices();
    }
    
    public function addGestor(Gestor $gest) {
        $this->gestorService->registar($gest);
    }

    public function updateGestor(Gestor $gest) {
        $this->gestorService->update($gest);
    }

    public function getAllGestor() {
        return $this->gestorService->getAll();
    }

    public function getGestorById($id) {
        return $this->gestorService->getById($id);
    }

    public function getGestorByName($nome) {
        return $this->gestorService->getByName($nome);
    }

    public function deleteGestor($id) {
        $this->gestorService->delete($id);
    }
}

$gestRepository = new GestorRepository();
$gestServices = new GestorServices();
$gestController = new GestorController();
