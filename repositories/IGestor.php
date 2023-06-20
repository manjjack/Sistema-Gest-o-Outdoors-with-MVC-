<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

include_once '../../model/Gestor.php';

interface IGestor {
    
    public function registarGestor(Gestor $gest);
    public function updateGestor(Gestor $gest);
    public function getAllGestor();
    public function getGestorById($id);
    public function getGestorByName($name);
    public function deleteGestor($id);
}