<?php

include_once '../services/ComunaServices.php';
include_once '../model/Comuna.php';
include_once '../repositories/ComunaRepository.php';

class ComunaController{
    
    private $comunaService = null;
    
    public function __construct() {
        $this->comunaService = new ComunaServices();
    }
    
    public function getAllComunas(){
        return $this->comunaService->getAll();
    }
    
    public function getNomeMunicipo($id){
        return $this->comunaService->getNomeMunicipio($id);
    }
    
    public function getProvinciaByMunicipio($id) {
        return $this->comunaService->getNomeProvinciaByComuna($id);
    }
    
    public function getComunaById($id) {
        return $this->comunaService->getById($id);
    }
    
}

$comunaController = new ComunaController();
$comunaService = new ComunaServices();
$comunaRepository = new ComunaRepository();

