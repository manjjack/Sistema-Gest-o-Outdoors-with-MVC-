<?php

class Outdoor{
    
    private $id;
    private $tipoOutdoor;
    private $preco;
    private $comuna;
    private $estado;
    private $imagem;
    
    public function __construct($tipoOutdoor=null, $preco=null, $comuna=null, $estado=null, $imagem=null) {
        
        $this->tipoOutdoor = $tipoOutdoor;
        $this->preco = $preco;
        $this->comuna = $comuna;
        $this->estado = $estado;
        $this->imagem = $imagem;
    }
    
    
    public function getId() {
        return $this->id;
    }
    
    public function setId($id) {
        $this->id = $id;
    }
    
    public function getTipoOutdoor(){
        return $this->tipoOutdoor;
    }
    
    public function setTipoOutdoor($tipoOutdoor) {
        $this->tipoOutdoor = $tipoOutdoor;
    }
    
    public function getPreco() {
        return $this->preco;
    }
    
    public function setPreco($preco) {
        $this->preco = $preco;
    }
    
    public function getComuna() {
        return $this->comuna;
    }

     public function setComuna($comuna) {
        $this->comuna = $comuna;
    }

    public function getEstado() {
        return $this->comuna;
    }

     public function setEstado($estado) {
        $this->estado = $estado;
    }

     public function getImagem() {
        return $this->imagem;
    }

     public function setImagem($imagem) {
        $this->imagem = $imagem;
    }
}
