<?php
include_once 'header-gestor.php';
include_once '../controllers/Protect.php';
include_once '../controllers/AluguerController.php';
include_once '../controllers/ComunaController.php';
include_once '../controllers/OutdoorController.php';
include_once '../model/Aluguer.php';
?>

<head>
    <link rel="stylesheet" href="../content/css/form.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../scripts/custom/cascata.js"></script>
    <script src="../scripts/custom/cascata2.js"></script>
    <script src="../scripts/custom/CascataO.js"></script>
</head>

<div class="container-fluid px-1 py-5 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center" style="margin-bottom: -20px;">
            <div class="card">
                <h5 class="text-center mb-4">Aluguer</h5>
                <form method="POST" class="form-card" id="formulario" enctype="multipart/form-data">>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex">
                            <label class="form-control-label px-3">Província <span class="text-danger">*</span></label>
                            <select name="provincia" id="provincia" style="margin-left:18px; margin-bottom:10px; margin-top:10px">
                                <?php
                                echo '<option > ----Selecione----  </option>';
                                foreach ($comunaRepository->getAllProvincia() as $com) {
                                    echo '<option value="' . $com->getId() . '"> ' . $com->getProvincia() . '</option>';
                                }
                                ?>
                            </select>

                            <label class="form-control-label px-3">Município <span class="text-danger">*</span></label>
                            <select name="municipio" id="municipio" style="margin-left:18px; margin-bottom:10px; margin-top:10px">

                            </select>

                            <label class="form-control-label px-3">Comuna <span class="text-danger">*</span></label>
                            <select name="comuna" id="comuna" style="margin-left:18px; margin-bottom:10px; margin-top:10px">
                                <script>

                                    $(document).ready(function () {
                                        // Adiciona um evento de escuta para capturar a mudança no valor do select
                                        $("#comuna").change(function () {
                                            // Obtém o valor selecionado no select
                                            var valorJS = $(this).val();
                                            console.log('Valor selecionado no select: ' + valorJS);

                                            // Faz a requisição AJAX para enviar o valor para o PHP
                                            $.ajax({
                                                type: "POST",
                                                url: window.location.href, // Usa a URL atual da página
                                                data: {valorJS: valorJS}, // Passando o valorJS para o PHP usando POST
                                                dataType: "json",
                                                success: function (response) {
                                                    console.log("Resposta do PHP: " + response);
                                                    // Você pode fazer qualquer outra ação com a resposta do PHP aqui
                                                },
                                                error: function (xhr, status, error) {
                                                    console.log("Erro na requisição AJAX: " + xhr.responseText);
                                                }
                                            });
                                        });
                                    });

                                </script>
                                <?php
                               
                                ?>

                            </select>
                        </div>

                        <div class="form-group col-sm-6 flex-column d-flex">
                            <label class="form-control-label px-3">Outdoor a Alugar <span class="text-danger">*</span></label>
                            <select name="tipo" id="tipo" style="margin-left:18px; margin-bottom:10px; margin-top:10px">
                                <option>--Selecione--</option>
                            </select>

                            <label class="form-control-label px-3">Data de Início<span class="text-danger">*</span></label>
                            <input type="date" id="data_inicio" name="data_inicio" required style="width:310px; margin-left:20px;">

                            <label class="form-control-label px-3">Data de Fim<span class="text-danger">*</span></label>
                            <input type="date" id="data_fim" name="data_fim" required style="width:310px; margin-left:20px;">
                        </div>
                    </div>

                   
                   <label
                                class="form-control-label px-3">Imagem<span class="text-danger"> *</span></label> <input
                                type="file" id="user" name="img" placeholder=""> 

                    
                    <div class="row justify-content-center" style="margin-top: 40px;">
                        <div class="form-group col-sm-2">
                            <button type="submit" class="btn-secondary" name="btn">Submit</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<?php

function calcularDiferencaDatas($dataInicio, $dataFim) {
    
    $inicio = new DateTime($dataInicio);
    $fim = new DateTime($dataFim);

    $diferenca = $inicio->diff($fim);

    $diferencaDias = $diferenca->days;

    return $diferencaDias;
}
$tipo = filter_input(INPUT_POST, 'tipo');
$comuna = filter_input(INPUT_POST, 'comuna');
$data_inicio = filter_input(INPUT_POST, 'data_inicio');
$data_fim = filter_input(INPUT_POST, 'data_fim');


$dias = calcularDiferencaDatas($data_inicio, $data_fim);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificar se um arquivo foi enviado
    if (isset($_FILES['img']) && $_FILES['img']['error'] === UPLOAD_ERR_OK) {
        $caminhoTemporario = $_FILES['img']['tmp_name']; // Obter o caminho temporário do arquivo
        $nomeArquivo = $_FILES['img']['name']; // Obter o nome do arquivo original
        // Diretório de destino para salvar as imagens
        $diretorioDestino = 'C:\xampp\htdocs\Sistema-Outdoors\content\images\images\a';

        // Mover o arquivo para o diretório de destino
        $caminhoImagem = $diretorioDestino . $nomeArquivo;
        if (move_uploaded_file($caminhoTemporario, $caminhoImagem)) {
            //  echo $caminhoImagem;
        } else {
            // echo 'Erro ao enviar a imagem.';
        }
    }
}

if (isset($_POST['valorJS'])) {
    $valorJS = $_POST['valorJS'];

    $response = array('valorRecebido' => $valorJS);
    echo json_encode($response);
}

$precoOutdoor = $outdoorRepository->getPrecoById($tipo);
$estado = $outdoorRepository->getEstadoById($tipo);        
if (isset($_POST['btn'])) {
   
    $outdoor = new Aluguer();
    $outdoor->setIdOutdoor($tipo);
    $outdoor->setIdCliente($_SESSION['id']);
    $outdoor->setPrecoFinal($dias*$precoOutdoor);
    $outdoor->setComuna($outdoorRepository->getComunaByOutdoorId($tipo));
    $outdoor->setDataInicio($data_inicio);
    $outdoor->setDataFim($data_fim);
    $outdoor->setEstado("Aguardando Pagamento");
    $outdoor->setImagem($nomeArquivo);
 
    if($estado == 0){
        $aluguerRepository->registarAluguer($outdoor);
        $outdoorRepository->alterarEstadoOutdoor($tipo);
        echo "<meta http-equiv=\"refresh\" content=\"0;URL=http://localhost/Sistema-Outdoors/view/cliente.php\">";
    //echo "<meta http-equiv=\"refresh\" content=\"0;\">";
    }else{
        echo '<script>alert("Ja Alugado");</script>';
    }   
    

    
    
}
?>


