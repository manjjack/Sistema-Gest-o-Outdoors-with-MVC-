<?php

require_once '../repositories/AdminRepository.php';

class AdminServices {

    private $adminRepositories = NULL;
    
    public function __construct() {
        $this->adminRepositories =  new AdminRepository();
    }
    
       public function login($username, $password) {
        try {
            return $this->adminRepositories->login($username, $password);
        } catch (Exception $e) {
            echo "An error occurred while:  " . $e->getMessage();
        }
    }
}
