<?php

abstract class User{
    
    private $id;
    private $username;
    private $password;
    private $nome;
    private $morada;
    private $email;
    private $provincia;
    private $municipio;    
    private $comuna;
    private $telefone;
    
    
    public function __construct($username, $password, $nome , $morada, $email, $provincia, $municipio, $comuna, $telefone) {
        
        $this->username = $username;
        $this->password = $password;
        $this->nome = $nome;
        $this->morada = $morada;
        $this->email = $email;
        $this->provincia = $provincia;
        $this->municipio = $municipio;
        $this->comuna = $comuna;
        $this->telefone = $telefone;
    }
    public function getId(){
        return $this->id;
    }
    
    public function setId($id) {
        $this->id = $id;
    }
            
    public function getUsername(){
        return $this->username;
    }
    
    public function setUsername($username) {
        $this->username = $username;
    }
    
    public function getPassword(){
        return $this->password;
    }
    
    public function setPassword($pass){
        $this->password = $pass;
    }
    
    public function getNome(){
        return $this->nome;
    }
    
    public function setNome($nome) {
        $this->nome = $nome;
    }
    
    public function getEmail(){
        return $this->email;
    }
    
    public function setEmail($email) {
        $this->email = $email;
    }
            
    public function getProvincia(){
        return $this->provincia;
    }
    
    public function setProvincia($prov) {
        $this->provincia = $prov;
    }
    
    public function getMunicipio(){
        return $this->municipio;
    }
    
    public function setMunicipio($muni) {
        $this->municipio = $muni;
    }
    
    public function getComuna(){
        return $this->comuna;
    }
    
    public function setComuna($com) {
        $this->comuna = $com;
    }
            
    public function getMorada(){
        return $this->morada;
    }
    
    public function setMorada($mor){
        $this->morada = $mor;
    }
    
    public function getTelefone(){
        return $this->telefone;
    }
    
    public function setTelefone($tel) {
        $this->telefone = $tel;
    }
    

}


