<?php


interface ICliente {
    
    public function registarCliente(Cliente $cliente);
    public function updateCliente(Cliente $cliente);
    public function getAllCliente();
    public function getClienteById($id);
    public function getClienteByName($name);
    public function deleteCliente($id);
}
/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

