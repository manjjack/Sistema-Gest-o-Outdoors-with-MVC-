<?php

include_once '../services/UserServices.php';
include_once '../model/User.php';
include_once '../repositories/UserRepository.php';

class UserController {

    private $gestorService = NULL;

    public function __construct() {
        $this->gestorService = new UserServices();
    }
    
    public function login($username, $password) {
        $this->gestorService->login($username, $password);
    }
    
    public function addGestor(User $gest) {
        $this->gestorService->registar($gest);
    }

    public function updateGestor(User $gest) {
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

$gestRepository = new UserRepository();
$gestServices = new UserServices();
$gestController = new UserController();
