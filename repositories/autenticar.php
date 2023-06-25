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

// Execute uma consulta para verificar se as credenciais estão corretas
$query = "SELECT perfil FROM user WHERE username = :username AND password = :password";
$stmt = $instance->prepare($query);
$stmt->bindValue(':username', $username);
$stmt->bindValue(':password', $password);
$stmt->execute();

// Verifique se a consulta retornou algum resultado
if ($stmt->rowCount() > 0) {
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $perfil = $row['perfil'];
    $nome = $row['nome'];
    // As credenciais são válidas, então inicie a sessão e redirecione o usuário
    session_start();
    
    $_SESSION['id'] = $id;
    $_SESSION['nome'] = $nome;
    $_SESSION['username'] = $username;
    $_SESSION['perfil'] = $perfil;
    
    switch ($perfil) {
        case 'Gestor':
            // Redirecionar para a página do Gestor
            header('Location: ../view/gestor.php');
            exit();
            break;
        case 'Cliente':
            // Redirecionar para a página do Cliente
            header('Location: ../view/cliente.php');
            exit();
            break;
        case 'Admin':
            // Redirecionar para a página do Administrador
            header('Location: ../view/admin.php');
            exit();
            break;
        default:
            // Redirecionar para uma página de erro ou tratamento adequada caso o perfil não seja reconhecido
            
            exit();
            break;
    }
} else {
   // As credenciais são inválidas, exiba uma mensagem de erro ou redirecione para uma página de erro
    
    header('Location: ../view/login.php');
    echo 'Falha no Login';
    exit();
}   
