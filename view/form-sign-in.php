<?php
include_once 'header.php';
include_once '../controllers/ComunaController.php';
include_once '../repositories/ComunaRepository.php';
include_once '../model/Comuna.php';
include_once '../repositories/ClienteRepository.php';

$clienteRepository = new ClienteRepository();
?>

<header>
    <link rel="stylesheet" href="../content/css/form.css">

</header>


<div class="container-fluid px-1 py-5 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center" style="margin-bottom: -20px;">
            <div class="card">
                <h5 class="text-center mb-4">Outdoors</h5>
                <form method="post" class="form-card" id="formulario" 
                     >
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Nome
                                Empresa<span class="text-danger"> *</span></label> <input type="text" id="nomeEmpresa"
                                name="nomeEmpresa" placeholder=""  required> </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Tipo
                                Cliente<span class="text-danger"> *</span></label>
                            <select name="tipoCliente" id="tipoCliente">
                                <option value="">---Seleccione----</option>
                                <option value="particular">Particular</option>
                                <option value="empresa">Empresa</option>
                            </select>
                        </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label
                                class="form-control-label px-3">Actividade Empresa<span class="text-danger">
                                    *</span></label> <input type="text" id="atividade" name="atividade" placeholder=""
                                  > </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label
                                class="form-control-label px-3">Comuna(Mun/Prov)<span class="text-danger">
                                    *</span></label>
                            <select name="comunas" id="comunas" onchange="buscarDados(retornarValor())" onchange="retornarValor()">
                                <?php

                                echo '<option > ----Selecione----  </option>';
                                foreach ($comunaRepository->getAllComuna() as $com) {
                                    echo '<option value = "' . $com->getId() . '">' . $com->getComuna() . ' , ' . $comunaRepository->getNomeMunicipio($comunaRepository->getFk($com->getId())) . ' , ' . $comunaRepository->getNomeProvinciaByComuna($comunaRepository->getFk($com->getId())) . '</option>';
                                }


                                ?>
                            </select>
                            <script>
                                function retornarValor() {
                                    var selectElement = document.getElementById('comunas');
                                    var valorSelecionado = selectElement.value;
                                    //console.log('Valor selecionado: ' + valorSelecionado);
                                    return valorSelecionado;
                                }
                            </script>
                        </div>
                    </div>
                    <div class="row justify-content-between text-left">

                        <div class="form-group col-sm-6 flex-column d-flex"> <label
                                class="form-control-label px-3">Provincia<span class="text-danger"> *</span></label>
                            <input type="text" id="provincia" name="provincia"
                                disabled style="background-color: gainsboro">
                        </div>


                        <div class="form-group col-sm-6 flex-column d-flex"> <label
                                class="form-control-label px-3">Municipio<span class="text-danger"> *</span></label>
                            <input type="text" id="municipio"  name="municipio"
                                placeholder=""  disabled style="background-color: gainsboro">
                        </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label
                                class="form-control-label px-3">Nacionalidade<span class="text-danger"> *</span></label>
                            <input type="text" id="nacionalidade" name="nacionalidade" placeholder=""
                                required>
                        </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label
                                class="form-control-label px-3">Morada<span class="text-danger"> *</span></label> <input
                                type="text" id="morada" name="morada" placeholder="" required>
                        </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label
                                class="form-control-label px-3">E-Mail<span class="text-danger"> *</span></label> <input
                                type="email" id="email" name="email" placeholder=""  required>
                        </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label
                                class="form-control-label px-3">Telemovel<span class="text-danger"> *</span></label>
                            <input type="tel" id="tel" name="tel" placeholder=""  required>
                        </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label
                                class="form-control-label px-3">Username<span class="text-danger"> *</span></label>
                            <input type="text" id="user" name="user" placeholder=""  required>
                        </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label
                                class="form-control-label px-3">Password<span class="text-danger"> *</span></label>
                            <input type="password" id="senha1" name="senha1" placeholder="" onblur="" required>
                        </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label
                                class="form-control-label px-3">Confirmar password<span class="text-danger">
                                    *</span></label> <input type="password" id="senha2" name="senha2" placeholder=""
                                 required> </div>
                        <span id="mensagemSenha" style="font-size: 16px; color: Red; margin-right:19%;"></span>

                    </div>
                    <div class="row justify-content-center">
                        <div class="form-group col-sm-6"> <button type="submit"
                                name="btn" class=" btn-secondary">Submit</button> </div>
                        <input type="hidden" name="form" value="1" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="../scripts/custom/verificaSenha.js"></script>
<script src="../scripts/custom/gerarCampos.js "> </script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="../scripts/custom/atividade.js"></script>

<?php
$nome = filter_input(INPUT_POST, 'nomeEmpresa');
$user = filter_input(INPUT_POST, 'user');
$email = filter_input(INPUT_POST, 'email');
//$provincia = filter_input(INPUT_POST, 'provincia');
$provincia = $comunaRepository->getNomeProvinciaByComuna($comunaRepository->getFk($com->getId()));
//$municipio = filter_input(INPUT_POST, 'municipio');
$municipio = $comunaRepository->getNomeMunicipio($comunaRepository->getFk($com->getId()));
$comuna = filter_input(INPUT_POST, 'comunas');
$tel = filter_input(INPUT_POST, 'tel');
$morada = filter_input(INPUT_POST, 'morada');
$senha = filter_input(INPUT_POST, 'senha1');
//$perfil = filter_input(INPUT_POST, 'perfil');
$tipoCliente = filter_input(INPUT_POST, 'tipoCliente');
$atividade= filter_input(INPUT_POST, 'atividade');
$nac = filter_input(INPUT_POST, 'nacionalidade');
$btn = filter_input(INPUT_POST, 'btn');
echo $municipio;
if (isset($btn)) {
    
    $gestor = new Cliente();
    $gestor->setUsername($user);
    $gestor->setPassword($senha);
    $gestor->setNome($nome);
    $gestor->setEmail($email);
    $gestor->setMorada($morada);
    $gestor->setProvincia($provincia);
    $gestor->setMunicipio($municipio);
    $gestor->setComuna($comuna);
    $gestor->setTelefone($tel);
    $gestor->setPerfil('Cliente');
    $gestor->setActividadeEmpresa($atividade);
    $gestor->setNacionalidade($nac);
    $gestor->setTipoCliente($tipoCliente);
    $clienteRepository->registarCliente($gestor);
    echo "<meta http-equiv=\"refresh\" content=\"0;URL=http://localhost/Sistema-Outdoors/view/index.php\">";
    // echo "<meta http-equiv=\"refresh\" content=\"0;\">";
    
}
?>