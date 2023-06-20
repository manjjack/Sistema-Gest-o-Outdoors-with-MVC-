<?php
include_once 'user.php';

class Cliente extends User{
        
        private $tipoCliente;
        private $actividadeEmpresa;
        private $nacionalidade;
        public function __construct($username = null, $password = null, $nome=null , $morada=null, $email=null, $provincia=null, $municipio=null, $comuna=null, $telefone=null, $tipoCliente = null, $actividadeEmpresa = null, $nacionalidade = null) {
        parent::__construct( $username, $password, $nome , $morada, $email, $provincia, $municipio, $comuna, $telefone);
       
        $this->tipoCliente = $tipoCliente;
        $this->actividadeEmpresa = $actividadeEmpresa;
        $this->nacionalidade = $nacionalidade;
    }
    public function getTipoCliente(){
        return $this->tipoCliente;
    }
    
    public function getActividadeEmpresa(){
        return $this->actividadeEmpresa;
    }
    
    public function getNacionalidade() {
        return $this->nacionalidade;
    }

    public function setNacionalidade($nacionalidade): void {
        $this->nacionalidade = $nacionalidade;
    }
    
       public function setTipoCliente($tipoCliente): void {
        $this->tipoCliente = $tipoCliente;
    }
    
    public function setActividadeEmpresa($actividadeEmpresa): void {
        $this->actividadeEmpresa = $actividadeEmpresa;
    }

}


?>