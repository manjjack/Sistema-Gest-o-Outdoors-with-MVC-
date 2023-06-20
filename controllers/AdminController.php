<?php

include_once '../model/Admin.php';
include_once '../repositories/AdminRepository.php';
include_once '../controllers/AdminController.php';
include_once '../services/AdminServices.php';

class AdminController{
    
    private $adminService = null;
    
    public function __construct() {
        $this->adminService = new AdminServices();
    }
    
    public function login($username, $password) {
        $this->adminService->login($username, $password);
    }
}

$adminController = new AdminController();
$adminRepository = new AdminRepository();
$adminServices = new AdminServices();
