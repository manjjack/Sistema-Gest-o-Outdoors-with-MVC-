<?php
include_once '../model/Admin.php';

interface IAdmin {
    
    public function login($username, $password);
    
}