<?php
include("../../login/check.php");
include("../../../functions.php");
$vocab = $mySessionController->getVar("vocab");
$user_rol = $mySessionController->getVar("rol");

$ced = $_GET['ced_miem'];
$sql = "SELECT * FROM sis_miem_proy_inv WHERE Ced ='$ced';";
$res = seleccion($sql);
?>

<div class="container">
    <div class="well well-sm">
        <h2>Ver Miembro</h2>
    </div>
    <form method="post" action="">
        <div class="col-lg-5 col-md-5 col-sm-8 col-xs-12">
            <table>
                <tr>
                    <th colspan="1" style="width: 50%">
                        <div class="form-group">
                            <label for="nom_miem"><?= $vocab["nom_miem"] ?></label>
                            <input id="nom_miem" name="nom_miem" readonly class="form-control" type="text" value="<?= $res[0]['Nom_Miem'] ?>"/>
                        </div> 
                    </th>
                    <th colspan="1" style="width: 50%">
                        <div class="form-group">
                            <label for="ced_miem"><?= $vocab["ced"] ?></label>
                            <input id="eed_miem" name="ced_miem" readonly class="form-control" type="text" value="<?= $res[0]['Ced'] ?>"/>
                        </div>
                    </th>
                </tr>
                <tr>
                    <th colspan="1" style="width: 50%">
                        <div class="form-group">
                            <label for="tel_miem"><?= $vocab["num_tel"] ?></label>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <input id="tel_miem" name="tel_miem" readonly class="form-control" type="text" value="<?= $res[0]['telefono'] ?>"/>  
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <select disabled name="tipo_tel" id="tipo_tel" class="form-control" >
                                        <option value="0" value="" selected="selected">[<?= $vocab["symbol_select"] ?>]</option>
                                        <?php
                                        $sql1 = "SELECT id_tipo_tel, desc_tipo_tel FROM sis_tipo_tel ORDER BY desc_tipo_tel";
                                        echo $sqlb;
                                        $res1 = seleccion($sql1);
                                        foreach ($res1 as $row) {
                                            $selected = ($res[0]['id_tipo_tel'] == $row["id_tipo_tel"]) ? "selected='selected'" : " ";
                                            echo("<option " . $selected . " value='" . $row["id_tipo_tel"] . "'>" . $row["desc_tipo_tel"] . "</option>");
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>   
                    </th>
                    <th colspan="1" style="width: 50%">
                        <div class="form-group">
                            <label for="email_miem"><?= $vocab["email"] ?></label>
                            <input id="email_miem" name="email_miem" readonly class="form-control" type="text" value="<?= $res[0]['email'] ?>"/>
                        </div>
                    </th>
                </tr>
                <tr>
                    <th colspan="1" style="width: 50%">
                        <div class="form-group">
                            <label style="visibility: hidden;">hola</label>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="text-center"><a class="btn btn-warning" style="float: left;" onclick="javascript:OpcionMenu('mod/admin/proyecto/listar_integrantes_totales.php?', '');"><i></i> <?= "Regresar" ?></a></div>
                                </div>
                            </div>
                        </div>     
                    </th>
                </tr>                
            </table>
        </div>      
    </form>
</div>
