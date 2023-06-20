<?php
include_once 'header.php';
?>

<header>
<link rel="stylesheet" href="../content/css/form.css">

</header>

      
<div class="container-fluid px-1 py-5 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center" style="margin-bottom: -20px;">
            <div class="card" >
                <h5 class="text-center mb-4">Outdoors</h5>
                <form method="post" class="form-card" id= "formulario" onsubmit="event.preventDefault()" onsubmit="return validarFormulario()" onsubmit="return enviarFormulario()">
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Nome Empresa<span class="text-danger"> *</span></label> <input type="text" id="nomeEmpresa" name="nomeEmpresa" placeholder="" onblur="validate(1)" required> </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Tipo Cliente<span class="text-danger"> *</span></label> 
                        <select id="tipoCliente">
                         <option value="opcao1">Particular</option>
                        <option value="opcao2">Empresa</option>
                        </select>
                        </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Actividade Empresa<span class="text-danger"> *</span></label> <input type="text" id="atividade" name="atividade" placeholder="" onblur="validate(3)" required> </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Provincia<span class="text-danger"> *</span></label> 
                        <select id="provincias">
                         <option value="opcao1">Luanda</option>
                        <option value="opcao2">Huambo</option>
                        <option value="opcao3">Cabinda</option>
                        <option value="opcao4">Bengo</option>
                        <option value="opcao4">Kwanza-Norte</option>
                        <option value="opcao4">Kwanza-Sul</option>
                        <option value="opcao4">Benguela</option>
                        </select>
                        </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Municipio<span class="text-danger"> *</span></label> <input type="text" id="municipio" name="municipio" placeholder="" onblur="validate(5)" required> </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Comuna<span class="text-danger"> *</span></label> <input type="text" id="comuna" name="comuna" placeholder="" onblur="validate(5)" required> </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Nacionalidade<span class="text-danger"> *</span></label> <input type="text" id="nacionalidade" name="nacionalidade" placeholder="" onblur="validate(6)" required> </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Morada<span class="text-danger"> *</span></label> <input type="text" id="morada" name="morada" placeholder="" onblur="validate(5)" required> </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">E-Mail<span class="text-danger"> *</span></label> <input type="email" id="email" name="email" placeholder="" onblur="validate(5)" required> </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Telemovel<span class="text-danger"> *</span></label> <input type="tel" id="tel" name="tel" placeholder="" onblur="validate(5)" required> </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Username<span class="text-danger"> *</span></label> <input type="text" id="user" name="user" placeholder="" onblur="validate(1)" required> </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Password<span class="text-danger"> *</span></label> <input type="password" id="senha1" name="senha1" placeholder="" onblur="" required> </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Confirmar password<span class="text-danger"> *</span></label> <input type="password" id="senha2" name="senha2" placeholder="" onblur="validate(6)" required> </div>
                        <span id="mensagemSenha" style="font-size: 12px; color: gray;"></span>
                    </div>
                    <div class="row justify-content-center">
                        <div class="form-group col-sm-6"> <button type="submit" class="btn-block btn-secondary">Submit</button> </div>
                        <input type="hidden" name="form" value="1" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="../scripts/custom/form.js"></script>
<script src="../scripts/custom/verificaSenha.js"></script>
<?php
include_once 'footer.php';
?>