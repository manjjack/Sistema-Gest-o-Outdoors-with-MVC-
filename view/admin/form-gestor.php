<?php
include_once 'header-adm.php';
include_once '../../controllers/GestorController.php';
include_once '../../model/Gestor.php';
?>

<header>
<link rel="stylesheet" href="../../content/css/form.css">

</header>

      
<div class="container-fluid px-1 py-5 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center" style="margin-bottom: -20px;">
            <div class="card" >
                <h5 class="text-center mb-4">Outdoors</h5>
                <form method="POST" class="form-card" id= "formulario" >
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Nome Completo<span class="text-danger"> *</span></label> <input type="text" id="nome" name="nome" placeholder="" onblur="validate(1)" required> </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">E-Mail<span class="text-danger"> *</span></label> <input type="email" id="email" name="email" placeholder="" onblur="validate(5)" required> </div>
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
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Telemovel<span class="text-danger"> *</span></label> <input type="tel" id="tel" name="tel" placeholder="" onblur="validate(5)" required> </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Municipio<span class="text-danger"> *</span></label> <input type="text" id="municipio" name="municipio" placeholder="" onblur="validate(5)" required> </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Comuna<span class="text-danger"> *</span></label> <input type="text" id="comuna" name="comuna" placeholder="" onblur="validate(5)" required> </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Morada<span class="text-danger"> *</span></label> <input type="text" id="morada" name="morada" placeholder="" onblur="validate(5)" required> </div>
                         <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Username<span class="text-danger"> *</span></label> <input type="text" id="user" name="user" placeholder="" onblur="validate(1)" required> </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        
                    </div>
                    <div class="row justify-content-between text-left">
                       
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Password<span class="text-danger"> *</span></label> <input type="password" id="senha1" name="senha1" placeholder="" onblur="" required> </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Confirmar password<span class="text-danger"> *</span></label> <input type="password" id="senha2" name="senha2" placeholder="" onblur="validate(6)" required> </div>                  
                    </div>
                    <div class="row justify-content-between text-left">
                        
                        <span id="mensagemSenha" style="font-size: 12px; color: gray;"></span>
                    </div>

                  
                    <div class="row justify-content-center">
                        <div class="form-group col-sm-6"> <button type="submit" class="btn-secondary" name="btn">Submit</button> </div>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="../../scripts/custom/form.js"></script>
<script src="../../scripts/custom/verificaSenha.js"></script>
<?php


                    $nome = filter_input(INPUT_POST, 'nome');
                    $user = filter_input(INPUT_POST, 'user');
                    $email = filter_input(INPUT_POST, 'email');
                    $provincia = filter_input(INPUT_POST, 'provincia', FILTER_SANITIZE_STRING);
                    $municipio = filter_input(INPUT_POST, 'municipio');
                    $comuna = filter_input(INPUT_POST, 'comuna');
                    $tel = filter_input(INPUT_POST, 'tel');
                    $morada = filter_input(INPUT_POST, 'morada');
                    $senha = filter_input(INPUT_POST, 'senha1');
                    $btn = filter_input(INPUT_POST, 'btn');

                    if ( isset($btn)) {
                        $gestor = new Gestor();
                        $gestor->setUsername($user);
                        $gestor->setPassword($senha);
                        $gestor->setNome($nome);
                        $gestor->setEmail($email);
                        $gestor->setMorada($morada);
                        $gestor->setProvincia($provincia);
                        $gestor->setMunicipio($municipio);
                        $gestor->setComuna($comuna);
                        $gestor->setTelefone($tel);
                        $gestController->addGestor($gestor);
                         echo "<meta http-equiv=\"refresh\" content=\"0;URL=http://localhost/Sistema-Outdoors/view/admin/admin.php\">";
                        // echo "<meta http-equiv=\"refresh\" content=\"0;\">";
                    }
                    
?>
