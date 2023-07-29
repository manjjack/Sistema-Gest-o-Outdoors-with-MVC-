<?php

include_once '../dbconfig/Conexao.php';

include_once '../model/User.php';

class UserRepository {

    public function login($username, $password) {
        $sql = "SELECT * FROM user WHERE username = ? AND password = ?";

        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $username);
        $stmt->bindValue(2, $password);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            // Usuário autenticado com sucesso

            $resultado = $stmt->fetch(\PDO::FETCH_ASSOC);
            $objecto = new User();
            $objecto->setId($resultado["id"]);
            $objecto->setUsername($resultado["username"]);
            $objecto->setPassword($resultado["password"]);
            $objecto->setNome($resultado["nome"]);
            $objecto->setPerfil($resultado["perfil"]);
            $result[] = $objecto;

            return $result;
        } else {
            return null;
        }
    }

    public function deleteUser($id) {
        $sql = 'DELETE FROM user WHERE id = ?';

        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }

    public function getAllUser() {
        $sql = 'SELECT * FROM user WHERE perfil = "Gestor" OR perfil = "Admin" ORDER BY nome';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();

        $result = array();

        while ($resultado = $stmt->fetch(\PDO::FETCH_ASSOC)) {

            $objecto = new User();
            $objecto->setId($resultado["id"]);
            $objecto->setUsername($resultado["username"]);
            $objecto->setPassword($resultado["password"]);
            $objecto->setNome($resultado["nome"]);
            $objecto->setMorada($resultado["morada"]);
            $objecto->setEmail($resultado["email"]);
            $objecto->setProvincia($resultado["provincia"]);
            $objecto->setMunicipio($resultado["municipio"]);
            $objecto->setComuna($resultado["comuna"]);
            $objecto->setTelefone($resultado["telefone"]);
            $objecto->setPerfil($resultado["perfil"]);

            $result[] = $objecto;
        }

        return $result;
    }

    public function getUserById($id) {
        $sql = 'SELECT * FROM user where id = ?';

        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        $resultado = $stmt->fetch(\PDO::FETCH_ASSOC);

        $objecto = new User();
        $objecto->setId($resultado["id"]);
        $objecto->setUsername($resultado["username"]);
        $objecto->setPassword($resultado["password"]);
        $objecto->setNome($resultado["nome"]);
        $objecto->setMorada($resultado["morada"]);
        $objecto->setEmail($resultado["email"]);
        $objecto->setProvincia($resultado["provincia"]);
        $objecto->setMunicipio($resultado["municipio"]);
        $objecto->setComuna($resultado["comuna"]);
        $objecto->setTelefone($resultado["telefone"]);
        $objecto->setPerfil($resultado["perfil"]);
        $result = $objecto;

        return $result;
    }

    public function getUserByName($nome) {
        $sql = 'SELECT * FROM user where name LIKE :nome';

        $stmt = Conexao::getConn()->prepare($sql);

        $search = '%' . $nome . '%';
        $stmt->bindParam(':name', $search);

        $stmt->execute();

        $result = array();

        while ($resultado = $stmt->fetch(\PDO::FETCH_ASSOC)) {

            $objecto = new User();

            $objecto->setId($resultado["id"]);
            $objecto->setUsername($resultado["username"]);
            $objecto->setPassword($resultado["password"]);
            $objecto->setNome($resultado["nome"]);
            $objecto->setMorada($resultado["morada"]);
            $objecto->setEmail($resultado["email"]);
            $objecto->setProvincia($resultado["provincia"]);
            $objecto->setMunicipio($resultado["municipio"]);
            $objecto->setComuna($resultado["comuna"]);
            $objecto->setTelefone($resultado["telefone"]);
            $objecto->setPerfil($resultado["perfil"]);

            $result[] = $objecto;
        }

        return $result;
    }

    public function registarUser(User $gest) {
        $sql = 'INSERT INTO user (username, password, nome, morada, email, provincia, municipio, comuna, telefone,perfil) VALUES (?,?,?,?,?,?,?,?,?,?)';

        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $gest->getUsername());
        $stmt->bindValue(2, $gest->getPassword());
        $stmt->bindValue(3, $gest->getNome());
        $stmt->bindValue(4, $gest->getMorada());
        $stmt->bindValue(5, $gest->getEmail());
        $stmt->bindValue(6, $gest->getProvincia());
        $stmt->bindValue(7, $gest->getMunicipio());
        $stmt->bindValue(8, $gest->getComuna());
        $stmt->bindValue(9, $gest->getTelefone());
        $stmt->bindValue(10, $gest->getPerfil());
        $stmt->execute();
    }

    public function updateUser(User $gest) {
        $sql = 'UPDATE user SET username = ?, password = ?, nome = ?, morada = ?, email = ? provincia = ?, 
        municipio = ?, comuna = ?, telefone = ?, perfil = ? WHERE id = ?';

        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $gest->getUsername());
        $stmt->bindValue(2, $gest->getPassword());
        $stmt->bindValue(3, $gest->getNome());
        $stmt->bindValue(4, $gest->getMorada());
        $stmt->bindValue(5, $gest->getEmail());
        $stmt->bindValue(6, $gest->getProvincia());
        $stmt->bindValue(7, $gest->getMunicipio());
        $stmt->bindValue(8, $gest->getComuna());
        $stmt->bindValue(9, $gest->getTelefone());
        $stmt->bindValue(10, $gest->getPerfil());
        $stmt->bindValue(11, $gest->getId());

        $stmt->execute();
    }

    public function updatePassword($id, $newPassword) {
        $sql = 'UPDATE user SET password = ?, senha_alterada = 1 WHERE id = ?';

        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $newPassword);
        $stmt->bindValue(2, $id);
        $stmt->execute();
    }

    public function updateUserEmailById($id, $newEmail) {
        $sql = 'UPDATE user SET email = ? WHERE id = ?';

        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $newEmail);
        $stmt->bindValue(2, $id);

        return $stmt->execute();
    }

    public function getPerfilById($id) {
        $sql = 'SELECT perfil FROM user WHERE id = ?';

        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        $perfil = $stmt->fetchColumn();

        return $perfil;
    }
/*
    public function getIdsGestores() {
        $sql = 'SELECT id FROM user WHERE perfil = ?';

        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, 'Gestor');
        $stmt->execute();

        $idsGestores = array();

        while ($id = $stmt->fetchColumn()) {
            $idsGestores[] = $id;
        }

        return $idsGestores;
    }
    */
    public function getIdsGestores() {
    $sql = 'SELECT id FROM user WHERE perfil = ?';
    $stmt = Conexao::getConn()->prepare($sql);
    $stmt->bindValue(1, 'Gestor');
    $stmt->execute();

    $idsGestores = array();

    while ($id = $stmt->fetchColumn()) {
        $idsGestores[] = $id;
    }

    // Verifica se há IDs de gestores encontrados
    if (count($idsGestores) > 0) {
        // Seleciona aleatoriamente um ID dos gestores encontrados
        $idAleatorio = $idsGestores[array_rand($idsGestores)];
        return $idAleatorio;
    }

    // Caso não haja IDs de gestores encontrados, retorna null ou algum valor padrão
    return null;
}

    public function getAllGestores() {
    $sql = 'SELECT id FROM user WHERE perfil = ?';
    $stmt = Conexao::getConn()->prepare($sql);
    $stmt->bindValue(1, 'Gestor');
    $stmt->execute();

    $idsGestores = array();

    while ($id = $stmt->fetchColumn()) {
        $idsGestores[] = $id;
    }

    // Caso não haja IDs de gestores encontrados, retorna null ou algum valor padrão
    return $idsGestores;
}

public function getNomeGestorById($idGestor) {
    $sql = 'SELECT nome FROM user WHERE id = ?';
    $stmt = Conexao::getConn()->prepare($sql);
    $stmt->bindValue(1, $idGestor);
    $stmt->execute();

    $nomeGestor = $stmt->fetchColumn();

    return $nomeGestor;
    }

    public function getEmailAdm() {
        $sql = 'SELECT email FROM user WHERE username = ?';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, 'demo');
        $stmt->execute();

        $email = $stmt->fetchColumn();

        return $email;
    }

}
