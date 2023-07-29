<?php
include_once '../repositories/AluguerRepository.php';
$al = new AluguerRepository();
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
      

      <form  method="post" enctype="multipart/form-data">
    <label for="pdf">Escolha um arquivo PDF:</label>
    <input type="file" name="pdf" id="pdf">
    <input type="submit" name="enviar" id="enviar" value="Enviar PDF">
</form>
    </body>
</html>

<?php
$id = $_GET['id'];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificar se um arquivo foi enviado
    if (isset($_FILES['pdf']) && $_FILES['pdf']['error'] === UPLOAD_ERR_OK) {
        $caminhoTemporario = $_FILES['pdf']['tmp_name']; // Obter o caminho temporário do arquivo
        $nomeArquivo = $_FILES['pdf']['name']; // Obter o nome do arquivo original
        // Diretório de destino para salvar os PDFs
        $diretorioDestino = 'C:\xampp\htdocs\Sistema-Outdoors\content\pdf\a';

        // Mover o arquivo para o diretório de destino
        $caminhoPDF = $diretorioDestino . $nomeArquivo;
        if (move_uploaded_file($caminhoTemporario, $caminhoPDF)) {
            // Upload do PDF foi bem-sucedido
        } else {
            // Erro ao enviar o PDF
        }
    }
}


$sub = filter_input(INPUT_POST, 'enviar');

if (isset($sub)) {
    $al->updateAluguerPdf($id, $nomeArquivo);
    $al->changeEstado($id, 'Pagamento por Validar');
    header('Location: ../view/cliente.php');
    exit();
}
