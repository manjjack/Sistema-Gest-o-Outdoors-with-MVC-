<?php 
include_once '../dbconfig/Conexao.php';

require_once 'IAdmin.php';

class AdminRepository implements IAdmin{
    
    
    public function login($username, $password) {
        $sql = 'SELECT id, username, password FROM adm WHERE username = ?';

        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $username);
        $stmt->execute();

        $resultado = $stmt->fetch(\PDO::FETCH_ASSOC);

        if ($resultado) {
            $hashedPassword = $resultado['password'];

            // Verificar a senha fornecida com a senha armazenada
            if (password_verify($password, $hashedPassword)) {
                $adm = new Admin();
                $adm->setId($resultado['id']);
                $adm->setUsername($resultado['username']);

                return $adm;
            }
        }

        return null; // Autenticação falhou
    }
}
