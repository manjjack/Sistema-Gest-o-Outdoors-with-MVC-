<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */


include_once '../services/OutdoorServices.php';

include_once '../model/Outdoor.php';
include_once '../repositories/OutdoorRepository.php';

class OutdoorController {

    private $outdoorService = NULL;

    public function __construct() {
        $this->outdoorService = new OutdoorServices();
    }
    
    public function addOutdoor(Outdoor $outdoor) {
        $this->outdoorService->registar($outdoor);
    }

    public function updateOutdoor(Outdoor $outdoor) {
        $this->outdoorService->update($outdoor);
    }

    public function getAllOutdoor() {
        return $this->outdoorService->getAll();
    }

    public function getOutdoorById($id) {
        return $this->outdoorService->getById($id);
    }

    public function deleteOutdoor($id) {
        $this->outdoorService->delete($id);
    }
}

$outdoorRepository = new OutdoorRepository();
$outdoorServices = new OutdoorServices();
$outdoorController = new OutdoorController();

