<?php

class Aluguer{
        
        private $idOutdoor;
        private $idCliente;
        private $dataInicio;
        private $dataFim;
        private $precoFinal;
        public function __construct($idOutdoor = null, $idCliente = null, $dataFim = null, $precoFinal = null) {
        
        $this->idOutdoor = $idOutdoor;
        $this->idCliente= $idCliente;
        $this->dataFim = $dataFim;
        $this->dataInicio = date("d/m/Y");
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
      public function setDataInicio() {

        $this->dataInicio = date("d/m/Y");
      }
    
      // Getter para $dataFim
      public function getDataFim() {
        return $this->dataFim;
      }
    
      // Setter para $dataFim
      public function setDataFim($mes) {
        $dataAtual = new DateTime(); // Obtém a data atual
        $dataFim = clone $dataAtual;
        $dataFim->modify('+' . intval($mes) . ' months'); // Certifica-se de que $mes seja um valor inteiro
        $this->dataFim = $dataFim->format('d-m-Y'); // Define a propriedade dataFim como uma string formatada
    }
    
    
}