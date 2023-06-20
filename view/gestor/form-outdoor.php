<?php
include_once 'header-gestor.php';

include_once '../../controllers/OutdoorController.php';
include_once '../../model/Outdoor.php';
?>

<header>
<link rel="stylesheet" href="../../content/css/form.css">

</header>

      
<div class="container-fluid px-1 py-5 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center" style="margin-bottom: -20px;">
            <div class="card" >
                <h5 class="text-center mb-4">Outdoors</h5>
                <form method="POST" class="form-card" id= "formulario" enctype="multipart/form-data">
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Tipo Outdoor<span class="text-danger"> *</span></label> <input type="text" id="nome" name="tipo" placeholder="" onblur="validate(1)" required> </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Preco<span class="text-danger"> *</span></label> <input type="number" id="email" name="preco" placeholder="" onblur="validate(5)" required> </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Provincia<span class="text-danger"> *</span></label> 
                            <select id="provincia" name="provincia">
                         <option value="Luanda">Luanda</option>
                        <option value="Huambo">Huambo</option>
                        <option value="Cabinda">Cabinda</option>
                        <option value="Bengo">Bengo</option>
                        <option value="Kwanza-Norte">Kwanza-Norte</option>
                        <option value="Kwanza-Sul">Kwanza-Sul</option>
                        <option value="Benguela">Benguela</option>
                        </select>
                        </div>
                    <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Comuna<span class="text-danger"> *</span></label> <input type="text" id="comuna" name="comuna" placeholder="" onblur="validate(5)" required> </div>    
                    </div>
                    <div class="row justify-content-between text-left">
                        
                        
                    </div>
                    <div class="row justify-content-between text-left">
                        
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Estado<span class="text-danger"> *</span></label> <input type="text" id="morada" name="estado" placeholder="" required> </div>
                         <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Imagem<span class="text-danger"> *</span></label> <input type="file" id="user" name="img" placeholder="" > </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        
                    </div>
                     
                    <div class="row justify-content-center">
                        <div class="form-group col-sm-6"> <button type="submit" class="btn-secondary" name="btn">Submit</button> </div>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php

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


$tipoOutdoor = filter_input(INPUT_POST, 'tipo');
$preco = filter_input(INPUT_POST, 'preco');
//$imagem = $_FILES['img']['tmp_name'];
//$imagem = filter_input(INPUT_POST, 'img');
$comuna = filter_input(INPUT_POST, 'comuna');
$estado = filter_input(INPUT_POST, 'estado');
$btn = filter_input(INPUT_POST, 'btn');

if (isset($btn)) {

    $outdoor = new Outdoor();
    $outdoor->setTipoOutdoor($tipoOutdoor);
    $outdoor->setPreco($preco);
    $outdoor->setComuna($comuna);
    $outdoor->setEstado($estado);
    $outdoor->setImagem($nomeArquivo);

    $outdoorController->addOutdoor($outdoor);
    echo "<meta http-equiv=\"refresh\" content=\"0;URL=http://localhost/Sistema-Outdoors/view/gestor/gestor.php\">";
    //echo "<meta http-equiv=\"refresh\" content=\"0;\">";
}
?>
