<?php

$username = filter_input(INPUT_POST, 'user');
$password = filter_input(INPUT_POST, 'pass');

// Conexão com o banco de dados usando PDO
$instance = NULL;
if (!isset($instance)) {
    try {
        $instance = new PDO("mysql:host=localhost;dbname=outdoor", 'root', '');
        $instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo $e->getMessage();
        echo 'Erro: Conexão falhou';
    }
}

// Consulta para verificar se as credenciais estão corretas
$query = "SELECT perfil,nome,id,senha_alterada FROM user WHERE username = :username AND password = :password";
$stmt = $instance->prepare($query);
$stmt->bindValue(':username', $username);
$stmt->bindValue(':password', $password);
$stmt->execute();

// Verifique se a consulta retornou algum resultado
if ($stmt->rowCount() > 0) {
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $perfil = $row['perfil'];
    $nome = $row['nome'];
    $id = $row['id'];
    $senha = $row['senha_alterada'];

    // Consulta para verificar o status do cliente associado ao usuário autenticado
    $queryCliente = "SELECT status FROM cliente WHERE id = :id";
    $stmtCliente = $instance->prepare($queryCliente);
    $stmtCliente->bindValue(':id', $id);
    $stmtCliente->execute();

    // Verifique se a consulta retornou algum resultado
    if ($stmtCliente->rowCount() > 0 || $stmtCliente->rowCount() <= 0 ) {
        $rowCliente = $stmtCliente->fetch(PDO::FETCH_ASSOC);
        $statusCliente = $rowCliente['status'];
       
        session_start();
        $_SESSION['id'] = $id;
        $_SESSION['nome'] = $nome;
        $_SESSION['username'] = $username;
        $_SESSION['perfil'] = $perfil;

        // Redirecionar o usuário para a página correspondente ao perfil
        switch ($perfil) {
            case 'Gestor':
                if ($senha == 0) {

                    header("Location: ../view/ChangeSenha.php?id=" . $id);
                    exit();
                } else {
                    header('Location: ../view/gestor.php');
                    exit();
                }
                break;
            case 'Cliente':
                if ($statusCliente === "ativo") {
                    header('Location: ../view/cliente.php');
                } else if ($statusCliente === "desativado") {
                    session_destroy();
                    header('Location: ../view/Fails/ClienteFail.php');
                }
                exit();
                break;
            case 'Admin':
                // Redirecionar para a página do Administrador
                header('Location: ../view/admin.php');
                exit();
                break;
            default:
                // Redirecionar para uma página de erro ou tratamento adequada caso o perfil não seja reconhecido
                header('Location: ../view/erro.php');
                exit();
                break;
        }
    }
} else {
    // As credenciais são inválidas, exiba uma mensagem de erro ou redirecione para uma página de erro
    header('Location: ../view/login.php');
    echo 'Falha no Login';
    exit();
}
?>
