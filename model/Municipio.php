<?php


class Municipio{
    
    private $id;
    private $municipio;
    private $idProvincia;
    
    public function getId(){
        return $this->id;
    }
    
    public function setId($id) {
        $this->id = $id;
    }

    public function getMunicipio() {
        return $this->municipio;
    }

    public function setMunicipio($municipio) {
        $this->municipio = $municipio;
    }
    
    public function getIdProvincia() {
        return $this->idProvincia;
    }
    
    public function setIdProvincica($idProvincia) {
        $this->idProvincia = $idProvincia;
    }
}
