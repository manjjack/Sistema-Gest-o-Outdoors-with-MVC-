
<?php

Class Admin{
    private $id;
    private $nome;
    private $username;
    private $password;

    public function __construct($id, $nome, $username, $password){
       
        $this->id = $id;
        $this->nome = $nome;
        $this->username = $username;
        $this->password = $password;
    }
    public function getId(){
        return $this->id;
    }
    
    public function setId($id) {
        $this->id = $id;
    }
    
    public function getUserName(){
        return $this->username;
    }
    
    public function setUsername($user) {
        $this->username = $user;
    }
    
    
    function getPassword(){
        return $this->password;
    }
    
    function getNome(){
        return $this->nome;
    }
    
    
}