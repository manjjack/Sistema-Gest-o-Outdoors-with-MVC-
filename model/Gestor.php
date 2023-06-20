<?php

include_once 'User.php';

    Class Gestor extends User{
      public function __construct( $username = null, $password = null, $nome= null , $morada=null, $email=null, $provincia=null, $municipio=null, $comuna=null, $telefone=null) {
        parent::__construct( $username, $password, $nome , $morada, $email, $provincia, $municipio, $comuna, $telefone);

    }
    
    
 }