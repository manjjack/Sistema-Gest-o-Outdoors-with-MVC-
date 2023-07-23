<?php

include_once '../dbconfig/Conexao.php';
include_once '../model/Comuna.php';
include_once '../model/Provincia.php';
include_once '../model/Municipio.php';
include_once '../model/Outdoor.php';

class ComunaRepository {

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

    public function getAllProvincia() {

        $sql = 'SELECT * FROM provincia';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();

        $result = array();

        while ($resultado = $stmt->fetch(\PDO::FETCH_ASSOC)) {

            $objecto = new Provincia();
            $objecto->setId($resultado["idProvincia"]);
            $objecto->setProvincia($resultado["provincias"]);

            $result[] = $objecto;
        }

        return $result;
    }
    
    public function getTipoOutdoorById($idTipoOutdoor) {
        $sql = 'SELECT tipo FROM tipoOutdoor WHERE idTipo = ?';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $idTipoOutdoor);
        $stmt->execute();

        $resultado = $stmt->fetch(\PDO::FETCH_ASSOC);

        if ($resultado) {
            return $resultado['tipo'];
        } else {
            return null;
        }
    }

    public function getMunicipioByProvincia($id) {

        $sql = 'SELECT * FROM municipio where fkProvincia= ?';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        $resultados = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        $municipios = array();

        foreach ($resultados as $resultado) {
            $objecto = new Municipio();
            $objecto->setId($resultado["idmunicipio"]);
            $objecto->setMunicipio($resultado["municipios"]);
            $objecto->setIdProvincica($resultado["fkProvincia"]);

            $municipios[] = $objecto;
        }

        return $municipios;
    }

    public function getNomeMunicipioByProvincia($id) {
        $sql = 'SELECT municipios FROM municipio WHERE fkProvincia = ?';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        $resultados = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        $municipios = array();

        foreach ($resultados as $resultado) {
            $municipios[] = $resultado["municipios"];
        }

        return $municipios;
    }

    public function getNomesComunasByMunicipioId($idMunicipio) {
        $sql = 'SELECT comunas FROM comuna WHERE fkMunicipio = ?';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $idMunicipio);
        $stmt->execute();

        $resultados = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        $nomesComunas = array();

        foreach ($resultados as $resultado) {
            $nomesComunas[] = $resultado["comunas"];
        }

        return $nomesComunas;
    }

   public function getOutdoorInfoByMunicipioId($idMunicipio) {
    $sql = 'SELECT id, tipoOutdoor , estado, imagem, preco FROM outdoors WHERE comuna = ?';
    $stmt = Conexao::getConn()->prepare($sql);
    $stmt->bindValue(1, $idMunicipio);
    $stmt->execute();

    $resultados = $stmt->fetchAll(\PDO::FETCH_ASSOC);
    $outdoorsInfo = array();

    foreach ($resultados as $resultado) {
        $objecto = new Outdoor();
        $objecto->setId($resultado["id"]);
        $objecto->setTipoOutdoor($resultado["tipoOutdoor"]);
        $objecto->setEstado($resultado["estado"]);
        $objecto->setImagem($resultado["imagem"]);
        $objecto->setPreco($resultado["preco"]);

        $outdoorsInfo[] = $objecto;
    }

    return $outdoorsInfo;
}


    public function getMunicipioIdByNome($nomeMunicipio) {
        $sql = 'SELECT idmunicipio FROM municipio WHERE municipios = ?';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $nomeMunicipio);
        $stmt->execute();

        $resultado = $stmt->fetch(\PDO::FETCH_ASSOC);

        if ($resultado) {
            return $resultado["idmunicipio"];
        }

        return null; // Retorna null se o município não for encontrado
    }

    public function getComunaIdByNome($nomeComuna) {
        $sql = 'SELECT idcomuna FROM comuna WHERE comunas = ?';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $nomeComuna);
        $stmt->execute();

        $resultado = $stmt->fetch(\PDO::FETCH_ASSOC);

        if ($resultado) {
            return $resultado["idcomuna"];
        }

        return null; // Retorna null se o município não for encontrado
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

    public function getNomeProvinciaByComuna($id) {
        $sql = 'SELECT p.provincias FROM provincia p 
         INNER JOIN municipio m ON m.fkProvincia = p.idprovincia WHERE m.idmunicipio = ?';

        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        $resultado = $stmt->fetch(\PDO::FETCH_ASSOC);

        $provincia = $resultado["provincias"];

        return $provincia;
    }

    public function getFk($id) {
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
