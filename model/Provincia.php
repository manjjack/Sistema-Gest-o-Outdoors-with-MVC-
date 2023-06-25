<?php

class Provincia{
    
    private $id;
    private $provincia;
    
    
    public function getId(){
        return $this->id;
    }
    
    public function setId($id) {
        $this->id = $id;
    }

    public function getProvincia() {
        return $this->provincia;
    }

    public function setProvincia($provincia) {
        $this->provincia = $provincia;
    }
    

}
