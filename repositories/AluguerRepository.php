<?php
include_once '../dbconfig/Conexao.php';
include_once '../model/Aluguer.php';

class AluguerRepository 
{

    public function registarAluguer(Aluguer $al)
    {
        $sql = 'INSERT INTO aluguer (idOutdoor, idCliente, dataInicio, dataFim,precoFinal) VALUES (?,?,?,?,?)';

        $stmt = Conexao::getConn()->prepare($sql);
        // $stmt = $conn->prepare($sql);
        $stmt->bindValue(1, $al->getIdOutdoor());
        $stmt->bindValue(2, $al->getIdCliente());
        $stmt->bindValue(3, $al->getDataInicio());
        $stmt->bindValue(4, $al->getDataFim());
        $stmt->bindValue(5, $al->getPrecoFinal());
        $conn = Conexao::getConn();

        $stmt->execute();

    }


    public function updateAluguer(Aluguer $al)
    {

        $sql = 'UPDATE aluguer SET idOutdoor = ?,idCliente=?, dataInico = ?,
        dataFim = ?, precoFial = ?, where idOutdoor = ?';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $al->getIdOutdoor());
        $stmt->bindValue(2, $al->getIdCliente());
        $stmt->bindValue(3, $al->getDataInicio());
        $stmt->bindValue(4, $al->getDataFim());
        $stmt->bindValue(5, $al->getPrecoFinal());
        $stmt->execute();


        
    }

    public function deleteAluguer($id)
    {
        $sql1 = 'DELETE FROM aluguer WHERE idOutdoor = ?';
        $stmt1 = Conexao::getConn()->prepare($sql1);
        $stmt1->bindValue(1, $id);
        $stmt1->execute();

        $sql = 'DELETE FROM user WHERE id = ?';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

    }

    public function getAllAluguer()
    {

        
        $sql = 'SELECT * FROM aluguer';
        $stmt = Conexao::getConn()->prepare($sql);
        // $stmt1 = Conexao::getConn()->prepare($sql1);
        $stmt->execute();
        //$stmt1->execute();

        $result = array();
        $al = new AluguerRepository();

        while ($resultado = $stmt->fetch(\PDO::FETCH_ASSOC)) {

            $objecto = new Aluguer();

            $objecto->setIdOutdoor($resultado["idOutdoor"]);
            $objecto->setIdCliente($resultado["idCliente"]);
           // $objecto->setDataInicio($resultado[]);
            $objecto->setDataFim($resultado["dataFim"]);
            $objecto->setDataFim($resultado["precoFinal"]);
            $result[] = $objecto;
        }

        return $result;
    }

    public function getAluguerById($id)
    {
        $sql = 'SELECT * FROM aluguer where idOutdoor = ?';

        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        $resultado = $stmt->fetch(\PDO::FETCH_ASSOC);

        $objecto = new Aluguer();

        $objecto->setIdOutdoor($resultado["idOutdoor"]);
        $objecto->setIdCliente($resultado["idCliente"]);
       // $objecto->setDataInicio($resultado["dataInicio"]);
        $objecto->setDataFim($resultado["dataFim"]);
        $objecto->setDataFim($resultado["precoFinal"]);
        $result = $objecto;

        return $result;
    }
    /*
    public function getOutdoorByName($nome)
    {
        $sql = 'SELECT * FROM aluguer where name LIKE :nome';

        $stmt = Conexao::getConn()->prepare($sql);

        $search = '%' . $nome . '%';
        $stmt->bindParam(':name', $search);

        $stmt->execute();

        $result = array();

        while ($resultado = $stmt->fetch(\PDO::FETCH_ASSOC)) {

            $objecto = new Cliente();

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
            $objecto->setTipoCliente($resultado["tipoCliente"]);
            $objecto->setActividadeEmpresa($resultado["actividade"]);
            $objecto->setNacionalidade($resultado["nacionalidade"]);
            $objecto->setStatus($resultado["status"]);
            $result[] = $objecto;
        }

        return $result;
    } */
    
    public function getImgById($id){

        $sql = 'SELECT imagem FROM outdoors WHERE outdoors.id = ?';

        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        $resultado = $stmt->fetch(\PDO::FETCH_ASSOC);

        $m = $resultado["imagem"];

        return $m;
    }

    public function getComunaById($id){

        $sql = 'SELECT comuna FROM outdoors WHERE outdoors.id = ?';

        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        $resultado = $stmt->fetch(\PDO::FETCH_ASSOC);

        $m = $resultado["comuna"];

        return $m;
    }

    public function getTipoOutdoorById($id){

        $sql = 'SELECT tipoOutdoor FROM outdoors WHERE outdoors.id = ?';

        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        $resultado = $stmt->fetch(\PDO::FETCH_ASSOC);

        $m = $resultado["tipoOutdoor"];

        return $m;
    }

    public function getNomeTipoOutdoor($id){
        
        $sql = 'SELECT tipo FROM tipooutdoor WHERE tipooutdoor.idTipo = ?';

        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        $resultado = $stmt->fetch(\PDO::FETCH_ASSOC);

        $m = $resultado["tipo"];

        return $m;
    }

    public function getPrecoById($id) {
        $sql = 'SELECT preco FROM outdoors WHERE outdoors.id = ?';
    
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    
        $resultado = $stmt->fetch(\PDO::FETCH_ASSOC);
    
        if ($resultado !== false && isset($resultado["preco"])) {
            return $resultado["preco"];
        }
    
        return null;
    }

    public function getIdByUser($username) {
        $sql = 'SELECT id FROM user WHERE user.username = ?';
    
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $username);
        $stmt->execute();
    
        $resultado = $stmt->fetch(\PDO::FETCH_ASSOC);
    
        if ($resultado !== false && isset($resultado["id"])) {
            return $resultado["id"];
        }
    
        return null;
    }
    
    public function getClienteById($id) {
        $sql = 'SELECT idCliente FROM aluguer WHERE aluguer.idOutdoor = ?';
    
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    
        $resultado = $stmt->fetch(\PDO::FETCH_ASSOC);
    
        if ($resultado !== false && isset($resultado["idCliente"])) {
            return $resultado["idCliente"];
        }
    
        return null;
    }

    public function getAllAluguerPorCliente($idCliente)
{
    $sql = 'SELECT * FROM aluguer WHERE idCliente = ?';
    $stmt = Conexao::getConn()->prepare($sql);
    $stmt->bindValue(1, $idCliente);
    $stmt->execute();

    $result = array();

    while ($resultado = $stmt->fetch(\PDO::FETCH_ASSOC)) {
        $objecto = new Aluguer();

        $objecto->setIdOutdoor($resultado["idOutdoor"]);
        $objecto->setIdCliente($resultado["idCliente"]);
        // $objecto->setDataInicio($resultado[]);
        $objecto->setDataFim($resultado["dataFim"]);
        $objecto->setPrecoFinal($resultado["precoFinal"]);

        $result[] = $objecto;
    }

    return $result;
}


}