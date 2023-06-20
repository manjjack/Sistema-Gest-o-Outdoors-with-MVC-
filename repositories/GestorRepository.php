<?php 
include_once '../../dbconfig/Conexao.php';

require_once 'IGestor.php';

class GestorRepository implements IGestor{
    
    public function deleteGestor($id) {
        $sql = 'DELETE FROM gestor WHERE id = ?';

        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }

    public function getAllGestor() {
        $sql = 'SELECT * FROM gestor order by nome';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();

        $result = array();

        while ($resultado = $stmt->fetch(\PDO::FETCH_ASSOC)) {

            $objecto = new Gestor();
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
            
            

            $result[] = $objecto;
        }

        return $result;
    }

    public function getGestorById($id) {
           $sql = 'SELECT * FROM gestor where id = ?';

        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        $resultado = $stmt->fetch(\PDO::FETCH_ASSOC);

        $objecto = new Gestor();
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
        
        $result = $objecto;

        return $result;
    }

    public function getGestorByName($nome) {
        $sql = 'SELECT * FROM gestor where name LIKE :nome';

        $stmt = Conexao::getConn()->prepare($sql);

        $search = '%' . $nome . '%';
        $stmt->bindParam(':name', $search);

        $stmt->execute();

        $result = array();

        while ($resultado = $stmt->fetch(\PDO::FETCH_ASSOC)) {

            $objecto = new Gestor();
            
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
            

            $result[] = $objecto;
        }

        return $result;
    }

    public function registarGestor(\Gestor $gest) {
        $sql = 'INSERT INTO gestor (username, password, nome, morada, email, provincia, municipio, comuna, telefone) VALUES (?,?,?,?,?,?,?,?,?)';

		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1, $gest->getUsername());
                $stmt->bindValue(2,$gest->getPassword());
                $stmt->bindValue(3, $gest->getNome());
                $stmt->bindValue(4, $gest->getMorada());
                $stmt->bindValue(5, $gest->getEmail());
                $stmt->bindValue(6, $gest->getProvincia());
                $stmt->bindValue(7, $gest->getMunicipio());
                $stmt->bindValue(8, $gest->getComuna());
                $stmt->bindValue(9, $gest->getTelefone());
                
		$stmt->execute();

    }

    public function updateGestor(Gestor $gest) {
        $sql = 'UPDATE gestor SET username = ?, password = ?, nome = ?, morada = ?, email = ? provincia = ?,'
                . 'municipio = ?, comuna = ?, telefone = ?'
                . ' WHERE id = ?';
        
        $stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1, $gest->getUsername());
                $stmt->bindValue(2,$gest->getPassword());
                $stmt->bindValue(3, $gest->getNome());
                $stmt->bindValue(4, $gest->getMorada());
                $stmt->bindValue(5, $gest->getEmail());
                $stmt->bindValue(6, $gest->getProvincia());
                $stmt->bindValue(7, $gest->getMunicipio());
                $stmt->bindValue(8, $gest->getComuna());
                $stmt->bindValue(9, $gest->getTelefone());
                $stmt->bindValue(10, $gest->getId());
                
		$stmt->execute();
    }
}