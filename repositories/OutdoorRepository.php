<?php
include_once '../../dbconfig/Conexao.php';
include_once '../../model/Outdoor.php';

class OutdoorRepository{
    
    public function registarOutdoor(Outdoor $outdoor)
    {
        $sql = 'INSERT INTO outdoors (tipoOutdoor, preco, comuna, estado, imagem) VALUES (?,?,?,?,?)';

		$stmt = Conexao::getConn()->prepare($sql);
                $stmt->bindValue(1, $outdoor->getTipoOutdoor());
                $stmt->bindValue(2, $outdoor->getPreco());
                $stmt->bindValue(3, $outdoor->getComuna());
                $stmt->bindValue(4, $outdoor->getEstado());
                $stmt->bindValue(5, $outdoor->getImagem());
                
                
		$stmt->execute();

    }
    
    public function updateOutdoor(Outdoor $outdoor) {

        $sql = 'UPDATE outdoors SET tipoOutdoor = ?, preco = ?, comuna = ?, estado = ?, imagem = ? '
                . ' WHERE id = ?';

        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $outdoor->getOutdoor());
        $stmt->bindValue(2, $outdoor->getPreco());
        $stmt->bindValue(3, $outdoor->getComuna());
        $stmt->bindValue(4, $outdoor->getEstado());
        $stmt->bindValue(5, $outdoor->getImagem());
        $tmt->bindValue(6, $outdoor->getId());
        $stmt->execute();
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

    
}