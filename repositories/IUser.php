<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */



interface IUser {
    
    public function registarUser(User $gest);
    public function updateUser(User $gest);
    public function getAllUser();
    public function getUserById($id);
    public function getUserByName($name);
    public function deleteUser($id);
}