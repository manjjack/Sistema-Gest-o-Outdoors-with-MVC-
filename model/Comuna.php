<?php

class Comuna{
    
    private $id;
    private $comuna;
    private $idmunicipio;
    
    public function __construct($comuna = null, $idmunicipio = null) {
        $this->comuna = $comuna;
        $this->idmunicipio = $idmunicipio;
    }
    
    public function getId(){
        return $this->id;
    }
    
    public function setId($id) {
        $this->id = $id;
    }

    public function getComuna() {
        return $this->comuna;
    }

    public function setComuna($comuna) {
        $this->comuna = $comuna;
    }
    
    public function getIdMuncipio() {
        return $this->idmunicipio;
    }
    
    public function setIdMuncipio($idMunicpio) {
        $this->idmunicipio = $idMunicpio;
    }
}
