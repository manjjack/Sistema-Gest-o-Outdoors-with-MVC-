<?php
include_once '../repositories/UserRepository.php';
$idUser = $_GET['id'];
$use = new UserRepository();
$perfil = $use->getPerfilById($idUser);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Trocar Senha</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: white;
                color: black;
                text-align: center;
                margin: 0;
                padding: 0;
            }

            h1 {
                font-size: 24px;
            }

            form {
                margin-top: 20px;
            }

            input[type="text"] {
                padding: 10px;
                border: 2px solid black;
                border-radius: 5px;
                margin: 10px;
            }
            
             input[type="email"] {
                padding: 10px;
                border: 2px solid black;
                border-radius: 5px;
                margin: 10px;
            }


            input[type="submit"] {
                padding: 10px 20px;
                border: 2px solid black;
                border-radius: 5px;
                background-color: white;
                color: black;
                cursor: pointer;
            }

            input[type="submit"]:hover {
                background-color: black;
                color: white;
            }
        </style>
    </head>
    <body>
        <?php
        if ($perfil == "Gestor") {
            echo '<h1>Bem Vindo, Altere a Senha</h1>';
            } else {
            echo '<h1>Altere o E-mail</h1>';
        }
        ?>

        <form method="POST">
            <?php
            if ($perfil == "Gestor") {
                echo '<input type="text" placeholder="Digite aqui" id="senha" name="senha" required>';
            }else {
                echo '<input type="email" placeholder="Digite aqui" id="email" name="email" required>';
            }
            ?>

            <input type="submit" value="Enviar" id="enviar" name="enviar">


        </form>
    </body>
</html>

<?php
//include_once '../../controllers/UserController.php';

$senha = filter_input(INPUT_POST, 'senha');
$email = filter_input(INPUT_POST, 'email');
$sub = filter_input(INPUT_POST, 'enviar');

if (isset($sub)) {
    if ($perfil == "Gestor") {
        $use->updatePassword($idUser, $senha);
        header('Location: ../view/gestor.php');
        exit();
    } else {
        $use->updateUserEmailById($idUser, $email);
        header('Location: ../view/admin.php');
        exit();
    }
}
