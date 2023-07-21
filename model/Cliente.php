<?php
include_once 'user.php';

class Cliente extends User{
        
        private $id;
        private $tipoCliente;
        private $actividadeEmpresa;
        private $nacionalidade;
        private $status;
        
        
        public function __construct($username = null, $password = null, $nome=null , $morada=null, $email=null, $provincia=null, $municipio=null, $comuna=null, $telefone=null, $tipoCliente = null, $actividadeEmpresa = null, $nacionalidade = null, $status = null, $senha_alterada = null) {
        parent::__construct( $username, $password, $nome , $morada, $email, $provincia, $municipio, $comuna, $telefone, $senha_alterada);
       
        $this->tipoCliente = $tipoCliente;
        $this->actividadeEmpresa = $actividadeEmpresa;
        $this->nacionalidade = $nacionalidade;
        $this->status = $status;
    }
    
 

    public function getId(){
        return $this->id;
    }
    
    public function setId($id) {
        $this->id = $id;
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

    public function getStatus(){
        return $this->status;
    }

    public function setStatus($status){
        $this->status = $status;
    }


}


?>