<?php

include_once '../dbconfig/Conexao.php';
include_once '../model/Comuna.php';

class ComunaRepository{
    
 public function getAllComuna() {
        
        $sql = 'SELECT * FROM comuna';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();

        $result = array();

        while ($resultado = $stmt->fetch(\PDO::FETCH_ASSOC)) {

            $objecto = new Comuna();
            $objecto->setId($resultado["idcomuna"]);
            $objecto->setComuna($resultado["comunas"]);    
            $objecto->setIdMuncipio($resultado["fkMunicipio"]);  
            $result[] = $objecto;
        }

        return $result;
    }
    
     public function getComunaById($id) {
        $sql = 'SELECT * FROM comuna where id = ?';

        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        $resultado = $stmt->fetch(\PDO::FETCH_ASSOC);

        $objecto = new Comuna();
        $objecto->setId($resultado["idcomuna"]);
        $objecto->setComuna($resultado["comunas"]);
        $objecto->setIdMuncipio($resultado["fkMunicipio"]);

        $result = $objecto;

        return $result;
    }
    
    public function getNomeMunicipio($id) {

        $sql = 'SELECT municipios FROM municipio WHERE municipio.idmunicipio = ?';

        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        $resultado = $stmt->fetch(\PDO::FETCH_ASSOC);

        $municipio = $resultado["municipios"];

        return $municipio;
    }
    
    public function getNomeProvinciaByComuna($id){
         $sql = 'SELECT p.provincias FROM provincia p 
         INNER JOIN municipio m ON m.fkProvincia = p.idprovincia WHERE m.idmunicipio = ?';

        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        $resultado = $stmt->fetch(\PDO::FETCH_ASSOC);

        $provincia = $resultado["provincias"];

        return $provincia;
    }

    public function getFk($id){
        $sql = 'SELECT fkMunicipio from comuna where idcomuna = ?';

        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        $resultado = $stmt->fetch(\PDO::FETCH_ASSOC);

        $municipio = $resultado["fkMunicipio"];

        return $municipio;
    }

    public function getNomeComuna($id) {

        $sql = 'SELECT comunas FROM comuna WHERE comuna.idcomuna = ?';

        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        $resultado = $stmt->fetch(\PDO::FETCH_ASSOC);

        $com = $resultado["comunas"];

        return $com;
    }
    
}


