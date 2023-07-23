<?php

include_once '../dbconfig/Conexao.php';
include_once '../model/Outdoor.php';

class OutdoorRepository {

    public function registarOutdoor(Outdoor $outdoor) {
        $sql = 'INSERT INTO outdoors (tipoOutdoor, preco, comuna, estado, imagem) VALUES (?,?,?,?,?)';

        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $outdoor->getTipoOutdoor());
        $stmt->bindValue(2, $outdoor->getPreco());
        $stmt->bindValue(3, $outdoor->getComuna());
        $stmt->bindValue(4, $outdoor->getEstado());
        $stmt->bindValue(5, $outdoor->getImagem());

        $stmt->execute();
    }

public function updateOutdoorById($id, Outdoor $outdoor) {
    $sql = 'UPDATE outdoors SET tipoOutdoor = ?, preco = ?, comuna = ?, estado = ?, imagem = ? WHERE id = ?';
    
    $stmt = Conexao::getConn()->prepare($sql);
    $stmt->bindValue(1, $outdoor->getTipoOutdoor());
    $stmt->bindValue(2, $outdoor->getPreco());
    $stmt->bindValue(3, $outdoor->getComuna());
    $stmt->bindValue(4, $outdoor->getEstado());
    $stmt->bindValue(5, $outdoor->getImagem());
    $stmt->bindValue(6, $id); // Usamos o $id fornecido para fazer a atualização pelo ID
    
    // Executa a consulta
    if ($stmt->execute()) {
        // Atualização bem-sucedida
        return true;
    } else {
        // Falha na atualização
        return false;
    }
}


    public function deleteOutdoor($id) {
        $sql = 'DELETE FROM outdoors WHERE id = ?';

        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }

    public function getAllOutdoor() {

        $sql = 'SELECT * FROM outdoors';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();

        $result = array();

        while ($resultado = $stmt->fetch(\PDO::FETCH_ASSOC)) {

            $objecto = new Outdoor();
            $objecto->setId($resultado["id"]);
            $objecto->setTipoOutdoor($resultado["tipoOutdoor"]);
            $objecto->setPreco($resultado["preco"]);
            $objecto->setComuna($resultado["comuna"]);
            $objecto->setEstado($resultado["estado"]);
            $objecto->setImagem($resultado["imagem"]);

            $result[] = $objecto;
        }

        return $result;
    }
    
    public function alterarEstadoOutdoor($idOutdoor) {
    $sql = 'UPDATE outdoors SET estado = 1 WHERE id = ?';
    $stmt = Conexao::getConn()->prepare($sql);
    $stmt->bindValue(1, $idOutdoor);
    
    if ($stmt->execute()) {
        // Atualização bem-sucedida
        return true;
    } else {
        // Falha na atualização
        return false;
    }
}

    public function alterarEstadoOutdoorF($idOutdoor) {
    $sql = 'UPDATE outdoors SET estado = 0 WHERE id = ?';
    $stmt = Conexao::getConn()->prepare($sql);
    $stmt->bindValue(1, $idOutdoor);
    
    if ($stmt->execute()) {
        // Atualização bem-sucedida
        return true;
    } else {
        // Falha na atualização
        return false;
    }
}


    public function getPrecoById($id) {
        $sql = 'SELECT preco FROM outdoors WHERE id = ?';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        // Verifica se encontrou o registro com o ID especificado
        if ($resultado = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            return $resultado["preco"];
        }

        // Caso não encontre o ID, retorne um valor padrão ou uma mensagem de erro
        return null;
    }

    public function getEstadoById($id) {
        $sql = 'SELECT estado FROM outdoors WHERE id = ?';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        // Verifica se encontrou o registro com o ID especificado
        if ($resultado = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            return $resultado["estado"];
        }

        // Caso não encontre o ID, retorne um valor padrão ou uma mensagem de erro
        return null;
    }

    public function getOutdoorById($id) {
        $sql = 'SELECT * FROM outdoors where id = ?';

        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        $resultado = $stmt->fetch(\PDO::FETCH_ASSOC);

        $objecto = new Outdoor();
        $objecto->setId($resultado["id"]);
        $objecto->setTipoOutdoor($resultado["tipoOutdoor"]);
        $objecto->setPreco($resultado["preco"]);
        $objecto->setComuna($resultado["comuna"]);
        $objecto->setEstado($resultado["estado"]);
        $objecto->setImagem($resultado["imagem"]);
        $result = $objecto;

        return $result;
    }
    
        public function getComunaByOutdoorId($idOutdoor) {
        $sql = 'SELECT comuna FROM outdoors WHERE id = ?';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $idOutdoor);
        $stmt->execute();

        $resultado = $stmt->fetch(\PDO::FETCH_ASSOC);

        if ($resultado) {
            return $resultado["comuna"];
        } else {
            return null;
        }
    }

}
