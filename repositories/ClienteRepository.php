<?php
include_once '../dbconfig/Conexao.php';
include_once '../model/Cliente.php';

require_once 'ICliente.php';

class ClienteRepository implements ICliente
{

    public function registarCliente(Cliente $cliente)
    {
        $sql = 'INSERT INTO user (username, password, nome, morada, email, provincia, municipio, comuna, telefone, perfil) VALUES (?,?,?,?,?,?,?,?,?,?)';

        $stmt = Conexao::getConn()->prepare($sql);
        // $stmt = $conn->prepare($sql);
        $stmt->bindValue(1, $cliente->getUsername());
        $stmt->bindValue(2, $cliente->getPassword());
        $stmt->bindValue(3, $cliente->getNome());

        $stmt->bindValue(4, $cliente->getMorada());
        $stmt->bindValue(5, $cliente->getEmail());
        $stmt->bindValue(6, $cliente->getProvincia());
        $stmt->bindValue(7, $cliente->getMunicipio());
        $stmt->bindValue(8, $cliente->getComuna());
        $stmt->bindValue(9, $cliente->getTelefone());
        $stmt->bindValue(10, $cliente->getPerfil());
        $conn = Conexao::getConn();

        $stmt->execute();

        $chave = $conn->lastInsertId();

        $sql1 = "INSERT INTO cliente (id, tipoCliente, actividade, nacionalidade,status) VALUES ($chave,?,?,?,'desativado')";
        $stmt1 = Conexao::getConn()->prepare($sql1);

        $stmt1->bindValue(1, $cliente->getTipoCliente());
        $stmt1->bindValue(2, $cliente->getActividadeEmpresa());
        $stmt1->bindValue(3, $cliente->getNacionalidade());
        
        $stmt1->execute();
    }


    public function updateCliente(Cliente $cliente)
    {

        $sql = 'UPDATE user SET username = ?, password = ?, nome = ?, morada = ?, email = ? provincia = ?, municipio = ?,
         comuna = ?, telefone = ?, perfil = ? where id = ?';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $cliente->getUsername());
        $stmt->bindValue(2, $cliente->getPassword());
        $stmt->bindValue(3, $cliente->getNome());
        $stmt->bindValue(4, $cliente->getMorada());
        $stmt->bindValue(5, $cliente->getEmail());
        $stmt->bindValue(6, $cliente->getProvincia());
        $stmt->bindValue(7, $cliente->getMunicipio());
        $stmt->bindValue(8, $cliente->getComuna());
        $stmt->bindValue(9, $cliente->getTelefone());
        $stmt->bindValue(10, $cliente->getPerfil());

        $stmt->execute();


        $sql1 = 'UPDATE cliente SET tipoCliente = ?, actividade = ?, nacionalidade = ?, status=?
                 where id = ?';
        $stmt1 = Conexao::getConn()->prepare($sql1);

        $stmt1->bindValue(1, $cliente->getTipoCliente());
        $stmt1->bindValue(2, $cliente->getActividadeEmpresa());
        $stmt1->bindValue(3, $cliente->getNacionalidade());
        $stmt1->bindValue(4, $cliente->getStatus());


        $stmt1->execute();
    }

    public function deleteCliente($id)
    {
        $sql1 = 'DELETE FROM cliente WHERE id = ?';
        $stmt1 = Conexao::getConn()->prepare($sql1);
        $stmt1->bindValue(1, $id);
        $stmt1->execute();

        $sql = 'DELETE FROM user WHERE id = ?';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

    }

    public function getAllCliente()
    {

        //$sql = 'SELECT * FROM user';
        $sql = 'SELECT * FROM cliente';
        $stmt = Conexao::getConn()->prepare($sql);
        // $stmt1 = Conexao::getConn()->prepare($sql1);
        $stmt->execute();
        //$stmt1->execute();

        $result = array();
        $user = new ClienteRepository();

        while ($resultado = $stmt->fetch(\PDO::FETCH_ASSOC)) {

            $objecto = new Cliente();

            $objecto->setId($resultado["id"]);
            $objecto = $user->getClienteById($objecto->getId());
            /*      $objecto->setUsername($resultado["username"]);
                  $objecto->setPassword($resultado["password"]);
                  $objecto->setNome($resultado["nome"]);
                  $objecto->setMorada($resultado["morada"]);
                  $objecto->setEmail($resultado["email"]);
                  $objecto->setProvincia($resultado["provincia"]);
                  $objecto->setMunicipio($resultado["municipio"]);
                  $objecto->setComuna($resultado["comuna"]);
                  $objecto->setTelefone($resultado["telefone"]);
                  $objecto->setPerfil($resultado["perfil"]); */
            $objecto->setTipoCliente($resultado["tipoCliente"]);
            $objecto->setActividadeEmpresa($resultado["actividade"]);
            $objecto->setNacionalidade($resultado["nacionalidade"]);
            $objecto->setStatus($resultado["status"]);
            $result[] = $objecto;
        }

        return $result;
    }

    public function getClienteById($id)
    {
        $sql = 'SELECT * FROM user where id = ?';

        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        $resultado = $stmt->fetch(\PDO::FETCH_ASSOC);

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
        $result = $objecto;

        return $result;
    }

    public function getClienteByName($nome)
    {
        $sql = 'SELECT * FROM user where name LIKE :nome';

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
    }

    public function ativarConta($id)
    {
        $sql = 'UPDATE cliente SET status = "ativo" where id = ?';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $id);


        $stmt->execute();
    }

    public function desativarConta($id)
    {
        $sql = 'UPDATE cliente SET status = "desativado" where id = ?';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $id);


        $stmt->execute();
    }

}