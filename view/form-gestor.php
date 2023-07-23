<?php
include_once '../controllers/Protect.php';
include_once 'header-gestor.php';
include_once '../repositories/ComunaRepository.php';
include_once '../controllers/UserController.php';
include_once '../services/EmailService.php';
include_once '../model/User.php';

$comunaRepository = new ComunaRepository();
$gestController = new UserRepository();
$sent = new EmailService();
?>

<header>
    <link rel="stylesheet" href="../content/css/form.css">

</header>


<div class="container-fluid px-1 py-5 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center" style="margin-bottom: -20px;">
            <div class="card">
                <h5 class="text-center mb-4">Outdoors</h5>
                <form method="POST" class="form-card" id="formulario">
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Nome
                                Completo<span class="text-danger"> *</span></label> <input type="text" id="nome"
                                name="nome" placeholder="" onblur="validate(1)" required> </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label
                                class="form-control-label px-3">E-Mail<span class="text-danger"> *</span></label> <input
                                type="email" id="email" name="email" placeholder="" onblur="validate(5)" required>
                        </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label
                                class="form-control-label px-3">Comuna<span class="text-danger"> *</span></label>
                            <select name="comunas" id="comunas" onchange="buscarDados(retornarValor())"
                                onchange="retornarValor()">
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
                        <div class="form-group col-sm-6 flex-column d-flex"> <label
                                class="form-control-label px-3">Telemovel<span class="text-danger"> *</span></label>
                            <input type="tel" id="tel" name="tel" placeholder="" onblur="validate(5)" required>
                        </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label
                                class="form-control-label px-3">Provincia<span class="text-danger"> *</span></label>
                            <input type="text" id="provincia" name="provincia" placeholder="" onblur="validate(5)"
                                disabled style="background-color: gainsboro">
                        </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label
                                class="form-control-label px-3">Municipio<span class="text-danger"> *</span></label>
                            <input type="text" id="municipio" name="municipio" placeholder="" onblur="validate(5)"
                                disabled style="background-color: gainsboro">
                        </div>
                    </div>
                    <div class="row justify-content-between text-left">

                        <div class="form-group col-sm-6 flex-column d-flex"> <label
                                class="form-control-label px-3">Morada<span class="text-danger"> *</span></label> <input
                                type="text" id="morada" name="morada" placeholder="" onblur="validate(5)" required>
                        </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label
                                class="form-control-label px-3">Username<span class="text-danger"> *</span></label>
                            <input type="text" id="user" name="user" placeholder="" onblur="validate(1)" required>
                        </div>
                    </div>
                    <div class="row justify-content-between text-left">

                    </div>
                    <div class="row justify-content-between text-left">

                        <div class="form-group col-sm-6 flex-column d-flex"> <label
                                class="form-control-label px-3">Password<span class="text-danger"> *</span></label>
                            <input type="password" id="senha1" name="senha1" placeholder="" onblur="" required>
                        </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label
                                class="form-control-label px-3">Confirmar password<span class="text-danger">
                                    *</span></label> <input type="password" id="senha2" name="senha2" placeholder=""
                                onblur="validate(6)" required> </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label
                                class="form-control-label px-3">Perfil<span class="text-danger"> *</span></label>

                            <select name="perfil">
                             <!--   <option value="Admin">Admin </option> -->
                                <option value="Gestor">Gestor</option>
                            </select>

                        </div>
                        <span id="mensagemSenha" style="font-size: 12px; color: gray;"></span>
                    </div>


                    <div class="row justify-content-center">
                        <div class="form-group col-sm-6"> <button type="submit" class="btn-secondary"
                                name="btn">Submit</button> </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="../../scripts/custom/form.js"></script>
<script src="../../scripts/custom/verificaSenha.js"></script>
<script src="../scripts/custom/gerarCampos.js"></script>
<?php
$nome = filter_input(INPUT_POST, 'nome');
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
$perfil = filter_input(INPUT_POST, 'perfil');
$btn = filter_input(INPUT_POST, 'btn');

if (isset($btn)) {
    $gestor = new User();
    $gestor->setUsername($user);
    $gestor->setPassword($senha);
    $gestor->setNome($nome);
    $gestor->setEmail($email);
    $gestor->setMorada($morada);
    $gestor->setProvincia($provincia);
    $gestor->setMunicipio($municipio);
    $gestor->setComuna($comuna);
    $gestor->setTelefone($tel);
    $gestor->setPerfil($perfil);
    $gestor->setSenhaAlterada(0);
    $gestController->registarUser($gestor);
    $msg = 'username: ' . $user . ' Nome: ' . $nome . ' Email: ' . $email . ' Morada: ' . $morada;

    $sent->mandarEmail($email, $msg, 'Nova Conta Gestor');
    echo "<meta http-equiv=\"refresh\" content=\"0;URL=http://localhost/Sistema-Outdoors/view/admin.php\">";
    // echo "<meta http-equiv=\"refresh\" content=\"0;\">";
}
?>