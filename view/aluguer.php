
<?php
include_once 'header-gestor.php';
include_once '../controllers/Protect.php';
include_once '../controllers/AluguerController.php';
include_once '../controllers/ComunaController.php';
include_once '../controllers/OutdoorController.php';
include_once '../model/Aluguer.php';

?>

<header>
    <link rel="stylesheet" href="../content/css/form.css">

</header>


<div class="container-fluid px-1 py-5 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center" style="margin-bottom: -20px;">
            <div class="card">
                <h5 class="text-center mb-4">Aluguer</h5>
                <form method="POST">
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label
                                class="form-control-label px-3">Outdoor a Alugar <span class="text-danger">
                                    *</span></label>
                            <select name="tipo" id="tipo" 
                                style="margin-left:18px; margin-bottom:10px; margin-top:10px">
                                <?php

                                echo '<option > ----Selecione----  </option>';

                                foreach ($outdoorController->getAllOutdoor() as $com) {
                                   echo '<option value ="'.$com->getId().'"> '.$com->getId().','.'</option>'; 
                                  //  echo '<option value="' . $com->getIdOutdoor() . '">' . $com->getIdOutdoor() . ' , ' . $comunaRepository->getNomeComuna($aluguerRepository->getComunaById($com->getIdOutdoor())) . ' , ' . $aluguerRepository->getNomeTipoOutdoor($aluguerRepository->getTipoOutdoorById(($com->getIdOutdoor()))) . '</option>';
                                }


                                ?>
                            </select>
                            <div class="row justify-content-between text-left">


                                <div class="form-group col-sm-6 flex-column d-flex"> <label
                                        class="form-control-label px-3">Mes<span class="text-danger"> *</span></label>
                                    <input type="number" id="mes" name="mes" placeholder="Numero meses a alugar"
                                        onblur="" required style="width:310px; margin-left:20px;">
                                </div>
                            </div>

                        </div>
                    

                        <div class="row justify-content" style="margin-top: 40px; margin-right: 160px;">
                            <div class="form-group col-sm-2"> <button type="submit" class="btn-secondary"
                                    name="btn">Submit</button> </div>

                        </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php

$tipo = filter_input(INPUT_POST, 'tipo');
echo $tipo;
//$cliente = filter_input(INPUT_POST, 'preco');
$mes = filter_input(INPUT_POST, 'mes');
echo $mes;
$id = $aluguerRepository->getClienteById($tipo);
echo $id;
$prec = $aluguerRepository->getPrecoById($tipo);


if (isset($btn)) {
    $outdoor = new Aluguer();
    $outdoor->setIdOutdoor($tipo);
    $outdoor->setIdCliente($id);
    $outdoor->setDataInicio();
    $outdoor->setDataFim($mes);
    $outdoor->setPrecoFinal($mes * $prec);

    $aluguerRepository->registarAluguer($outdoor);
    echo "<meta http-equiv=\"refresh\" content=\"0;URL=http://localhost/Sistema-Outdoors/view/cliente.php\">";

}
?>