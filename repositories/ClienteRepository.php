<?php 
include_once '../dbconfig/dbconfig.php';

require_once 'ICliente.php';

class ClienteRepository implements ICliente{

    public function registarCliente(Cliente $cliente)
    {
        $sql = 'INSERT INTO cliente (username, password, nome, morada, email, provincia, municipio, comuna, telefone '
                . 'tipoCliente, actividade,nacionalidade ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)';

		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1, $cliente->getUsername());
                $stmt->bindValue(2, $cliente->getPassword());
                $stmt->bindValue(3, $cliente->getNome());
                $stmt->bindValue(4, $cliente->getMorada());
                $stmt->bindValue(5, $cliente->getEmail());
                $stmt->bindValue(6, $cliente->getProvicia());
                $stmt->bindValue(7, $cliente->getMunicipio());
                $stmt->bindValue(8, $cliente->getComuna());
                $stmt->bindValue(9, $cliente->getTelefone());
                $stmt->bindValue(10, $cliente->getTipoCliente());
                $stmt->bindValue(11, $cliente->getActividadeEmpresa());
                $stmt->bindValue(12, $cliente->getNacionalidade());
                
		$stmt->execute();

    }
    
    public function updateCliente(Cliente $cliente) {
        
        $sql = 'UPDATE aluno SET username = ?, password = ?, nome = ?, morada = ?, email = ? provincia = ?,'
                . 'municipio = ?, comuna = ?, telefone = ?, tipoCliente = ?, actividade = ?, nacionalidade = ?'
                . ' WHERE id = ?';

		$stmt = Conexao::getConn()->prepare($sql);
		$stmt->bindValue(1, $cliente->getUsername());
                $stmt->bindValue(2, $cliente->getPassword());
                $stmt->bindValue(3, $cliente->getNome());
                $stmt->bindValue(4, $cliente->getMorada());
                $stmt->bindValue(5, $cliente->getEmail());
                $stmt->bindValue(6, $cliente->getProvicia());
                $stmt->bindValue(7, $cliente->getMunicipio());
                $stmt->bindValue(8, $cliente->getComuna());
                $stmt->bindValue(9, $cliente->getTelefone());
                $stmt->bindValue(10, $cliente->getTipoCliente());
                $stmt->bindValue(11, $cliente->getActividadeEmpresa());
                $stmt->bindValue(12, $cliente->getNacionalidade());
                $stmt->bindValue(13, $cliente->getId());
		$stmt->execute();
    }

    public function deleteCliente($id) {
        $sql = 'DELETE FROM cliente WHERE id = ?';

        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }

    public function getAllCliente() {
        
        $sql = 'SELECT * FROM cliente order by nome';
        $stmt = Conexao::getConn()->prepare($sql);
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
            $objecto->setTipoCliente($resultado["tipoCliente"]);
            $objecto->setActividadeEmpresa($resultado["actividade"]);
            $objecto->setNacionalidade($resultado["nacionalidade"]);
            
            $result[] = $objecto;
        }

        return $result;
    }

    public function getClienteById($id) {
        $sql = 'SELECT * FROM cliente where id = ?';

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
        $objecto->setTipoCliente($resultado["tipoCliente"]);
        $objecto->setActividadeEmpresa($resultado["actividade"]);
        $objecto->setNacionalidade($resultado["nacionalidade"]);
        $result = $objecto;

        return $result;
    }

    public function getClienteByName($nome) {
        $sql = 'SELECT * FROM cliente where name LIKE :nome';

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
            $objecto->setTipoCliente($resultado["tipoCliente"]);
            $objecto->setActividadeEmpresa($resultado["actividade"]);
            $objecto->setNacionalidade($resultado["nacionalidade"]);

            $result[] = $objecto;
        }

        return $result;
    }
}


