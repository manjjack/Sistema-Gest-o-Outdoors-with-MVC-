<?php

include_once '../repositories/ComunaRepository.php';

class ComunaServices{
    
    private $comunaRepository = null;
    
    public function __construct() {
        $this->comunaRepository = new ComunaRepository();
    }
    
    public function getAll() {
        try {
            $this->comunaRepository->getAllComuna();
        } catch (Exception $e) {
            echo "An error occurred while: " . $e->getMessage();
        }
    }
    
    public function getById($id) {
        try{
            $this->comunaRepository->getComunaById($id);
        } catch (Exception $e) {
           echo "An error occurred while: " . $e->getMessage();
        }
    }
    
       public function getNomeMunicipio($id) {
        try{
            $this->comunaRepository->getNomeMunicipio($id);
        } catch (Exception $e) {
           echo "An error occurred while: " . $e->getMessage();
        }
    }
    
       public function getNomeProvinciaByComuna($id) {
        try {
            $this->comunaRepository->getNomeProvinciaByComuna($id);
        } catch (Exception $e) {
            echo "An error occurred while: " . $e->getMessage();
        }
    }
}
