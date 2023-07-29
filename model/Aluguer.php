<?php

class Aluguer{
        
        private $idOutdoor;
        private $idCliente;
        private $dataInicio;
        private $dataFim;
        private $precoFinal;
        private $imagem;
        private $estado;
        private $comuna;
        private $pdf;
        private $idGestor;

        public function __construct($idOutdoor = null, $idCliente = null,$dataInicio=null, $dataFim = null, $precoFinal = null, $comuna = null, $estado =null,$imagem = null, $pdf = null, $idGestor = null) {
        
        $this->idOutdoor = $idOutdoor;
        $this->idCliente= $idCliente;
        $this->dataFim = $dataFim;
        $this->comuna = $comuna;
        $this->dataInicio = $dataInicio;
        $this->imagem = $imagem;
        $this->estado = $estado;
        $this->pdf = $pdf;
        $this->idGestor = $idGestor;
    }
       

    // Método "set" para definir o valor do $pdf
    public function setPdf($pdf) {
        $this->pdf = $pdf;
    }

    // Método "get" para obter o valor do $pdf
    public function getPdf() {
        return $this->pdf;
    }
    public function getPrecoFinal() {
      return $this->precoFinal;
    }
  
    public function setPrecoFinal($valor) {
      $this->precoFinal = $valor;
    }
    public function getIdOutdoor() {
        return $this->idOutdoor;
      }
    
      // Setter para $idOutdoor
      public function setIdOutdoor($idOutdoor) {
        $this->idOutdoor = $idOutdoor;
      }
    
      // Getter para $idCliente
      public function getIdCliente() {
        return $this->idCliente;
      }
    
      // Setter para $idCliente
      public function setIdCliente($idCliente) {
        $this->idCliente = $idCliente;
      }
    
      // Getter para $dataInicio
      public function getDataInicio() {
        return $this->dataInicio;
      }
    
      // Setter para $dataInicio
    public function setDataInicio($dataInicio) {

        $this->dataInicio = $dataInicio;
    }

    public function getImagem() {
        return $this->imagem;
    }

    public function setImagem($imagem) {
        $this->imagem = $imagem;
    }

    // Getter para $dataFim
    public function getDataFim() {
        return $this->dataFim;
    }
    
    public function setDataFim($dt) {
        $this->dataFim = $dt;
    }

    public function getEstado() {
        return $this->estado;
    }

    // Setter para a propriedade $estado
    public function setComuna($novoEstado) {
        $this->comuna = $novoEstado;
    }

      public function getComuna() {
        return $this->comuna;
    }

    public function setEstado($novoEstado) {
        $this->estado = $novoEstado;
    }
    
        public function getIdGestor() {
        return $this->idGestor;
    }

    // Setter para $idGestor
    public function setIdGestor($idGestor) {
        $this->idGestor = $idGestor;
    }

}