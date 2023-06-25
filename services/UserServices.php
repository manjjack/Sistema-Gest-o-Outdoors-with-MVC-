<?php

require_once '../repositories/UserRepository.php';

class UserServices {

    private $userRepository = NULL;

    public function __construct() {
        $this->userRepository = new UserRepository();
    }
    
        public function login($username, $password) {
        try {
            $this->userRepository->login($username, $password);
        } catch (Exception $e) {
            echo "An error occurred while: " . $e->getMessage();
        }
    }

    public function registar(User $gest) {
        try {
            $this->userRepository->registarUser($gest);
        } catch (Exception $e) {
            echo "An error occurred while: " . $e->getMessage();
        }
    }

    public function update(User $gest) {
        try {
            $this->userRepository->updateUser($gest);
        } catch (Exception $e) {
            echo "An error occurred while: " . $e->getMessage();
        }
    }

    public function getAll() {
        try {
            return $this->userRepository->getAllUser();
        } catch (Exception $e) {
            echo "An error occurred while: " . $e->getMessage();
        }
    }

    public function getById($id) {
        try {
            return $this->userRepository->getUserById($id);
        } catch (Exception $e) {
            echo "An error occurred while:  " . $e->getMessage();
        }
    }

    public function getByName($nome) {
        try {
            return $this->userRepository->getUserByName($nome);
        } catch (Exception $e) {
            echo "An error occurred while:  " . $e->getMessage();
        }
    }

    public function delete($id) {
        try {
            $this->userRepository->deleteUser($id);
        } catch (Exception $e) {
            echo "An error occurred while: " . $e->getMessage();
        }
    }
}
