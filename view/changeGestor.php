<?php
include_once '../repositories/UserRepository.php';
include_once '../repositories/AluguerRepository.php';
$idI = $_GET['id'];
$use = new UserRepository();
$gest = new AluguerRepository();
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
            
             input[type="number"] {
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
       
            echo '<h1>Bem Vindo, Altere o Gestor</h1>';
          
        ?>

        <form method="POST">
            <?php
            echo '<input type="number" placeholder="Digite o numero do Gest" id="senha" name="senha" required>';
            ?>

            <input type="submit" value="Enviar" id="enviar" name="enviar">


        </form>
        <h1>Lista de gestores</h1>
        <?php
// Supondo que você tenha uma instância do objeto AluguerController chamada $aluguerController
        $idsGestores = $use->getAllGestores();

        foreach ($idsGestores as $idGestor) {
            echo "ID Gestor: " . $idGestor . " Nome: ". $use->getNomeGestorById($idGestor) . "<br>";
        }
        ?>
    </body>
</html>

<?php
//include_once '../../controllers/UserController.php';

$senha = filter_input(INPUT_POST, 'senha');

$sub = filter_input(INPUT_POST, 'enviar');

if (isset($sub)) {
    
        $gest->alterarIdGestorPorIdOutdoor($idI, $senha);
        header('Location: ../view/gestor.php');
        exit();
  
}
