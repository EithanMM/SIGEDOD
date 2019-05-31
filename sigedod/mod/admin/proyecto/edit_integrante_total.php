<?php
include("../../login/check.php");
include("../../../functions.php");
$vocab = $mySessionController->getVar("vocab");
$user_rol = $mySessionController->getVar("rol");

$ced_miem = $_GET['ced_miem'];
$view_mode = $_GET['view_mode'];
$sql = "SELECT Ced,Nom_Miem,telefono,id_tipo_tel,email FROM sis_miem_proy_inv  WHERE Ced='$ced_miem';";
$res = seleccion($sql);
?>
<!--/*ESTE FORMULARIO ES PARA MODIFICAR LA INFORMACION BASICA DE LOS INTEGRANTES: NOMBRE, TELEFONO, EMAIL, ETC*/-->
<div class="container">
    <div class="well well-sm">
        <h2>
            <?php
            echo ($view_mode == 1) ? $vocab["symbol_edit"] : $vocab["symbol_view"];
            echo " " . "Miembro";
            ?>
        </h2>
        <form method="post" action="">
            <div class="col-lg-5 col-md-5 col-sm-8 col-xs-12">
                <table>
                    <tr>
                        <th colspan="1" style="width: 50%">
                            <div class="form-group">
                                <label for="ced_miem"><?= $vocab["ced"]  ?></label>
                                <input id="ced_miem" name="ced_miem" class="form-control" readonly type="text" value="<?= $res[0]['Ced'] ?>" <?= ($view_mode == 0) ?>/>
                            </div>
                        </th>
                        <th colspan="1" style="width: 50%">
                            <div class="form-group">
                                <label for="nom_miem"><?= $vocab["nom_miem"]  ?></label>
                                <input id="nom_miem" name="nom_miem"  class="form-control" type="text" value="<?= $res[0]['Nom_Miem'] ?>" />
                            </div>
                        </th>
                    </tr>
                    <tr>
                        <th colspan="1" style="width: 50%">
                            <div class="form-group">
                                <label for="tel_miem"><?= $vocab["num_tel"] ?></label>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <input id="tel_miem" name="tel_miem"  class="form-control" type="text" value="<?= $res[0]['telefono'] ?>" />
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <select name="tipo_tel" id="tipo_tel" class="form-control" >
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
                                <label for="email_miem"><?= $vocab["email"]  ?></label>
                                <input id="email_miem" name="email_miem"  class="form-control" type="text" value="<?= $res[0]['email'] ?>" />
                            </div>
                        </th>
                    </tr>
                    <tr>
                        <th colspan="1" style="width: 50%">
                            <div class="form-group">
                                <label></label>
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <div class="text-center"><a class="btn btn-success" style="float: left;"  name="submit" onclick="javascript:update_absolute_member();"><i class="fa fa-save fa-inverse"></i> <?= "Actualizar" . " " . "Datos" ?></a></div>
                                    </div>
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
</div>
