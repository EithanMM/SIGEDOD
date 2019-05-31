<?php
include("../../login/check.php");
include("../../../functions.php");
$vocab = $mySessionController->getVar("vocab");
$user_rol = $mySessionController->getVar("rol");
$ced = $_GET['ced_miem'];
$sql = "SELECT * FROM sis_proy_miem WHERE Ced ='$ced';";
$res = seleccion($sql);
?>

<div class="container">
    <div class="well well-sm"><h2>Editar Miembro según Proyecto</h2></div>

    <form method="post" action="">
        <div class="col-lg-5 col-md-5 col-sm-8 col-xs-12">
            <table>
                <tr>
                    <th colspan="1" style="width: 50%">
                        <div class="form-group">
                            <label for="ced_miem"><?= $vocab["ced"] ?></label>
                            <input id="ced_miem" name="ced_miem" class="form-control" readonly type="text" value="<?= $res[0]['Ced'] ?>"/>
                        </div>
                    </th>
                    <th colspan="1" style="width: 50%">
                        <div class="form-group">
                            <label> <?= $vocab["tip"] ?></label>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <select id="TMiembro" name="TMiembro" class="form-control">
                                        <?php
                                            if ($res[0]['T_miembro'] == "Responsable") {
                                            echo('<option value="Responsable" selected="selected">' . $res[0]['T_miembro'] . '</option>');
                                            echo('<option value="Participante">Participante</option');
                                        }if ($res[0]['T_miembro'] == "Participante") {
                                            echo('<option value="Participante" selected="selected">' . $res[0]['T_miembro'] . '</option>');
                                            echo('<option value="Responsable">Responsable</option>');
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </th>                    
                </tr>
                <tr>
                    <th colspan="1" style="width: 50%">
                        <div class="form-group">
                            <label> <?= $vocab["jor"] ?> </label>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <select id="Jornada" name="Jornada" class="form-control">
                                        <?php
                                        if($res[0]['Jornada'] == "10"){
                                            echo('<option selected="selected" value="10">10 Horas</option>');
                                            echo('<option value="20">20 Horas</option>');
                                            echo('<option value="30">30 Horas</option>');
                                            echo('<option value="40">40 Horas</option>');
                                            echo('<option value="Ad honorem">Ad honorem</option>');
                                        } else if ($res[0]['Jornada'] == "20"){
                                            echo('<option selected="selected" value="20">20 Horas</option>');
                                             echo('<option value="10">10 Horas</option>');
                                             echo('<option value="30">30 Horas</option>');
                                             echo('<option value="40">40 Horas</option>');
                                             echo('<option value="Ad honorem">Ad honorem</option>');
                                        }  else if ($res[0]['Jornada'] == "30") {
                                            echo('<option selected="selected" value="30">30 Horas</option>');
                                            echo('<option value="10">10 Horas</option>');
                                            echo('<option value="20">20 Horas</option>');
                                            echo('<option value="40">40 Horas</option>');
                                            echo('<option value="Ad honorem">Ad honorem</option>');
                                        }  else if ($res[0]['Jornada'] == "40") {
                                            echo('<option selected="selected" value="40">40 Horas</option>');
                                             echo('<option value="10">10 Horas</option>');
                                             echo('<option value="20">20 Horas</option>');
                                             echo('<option value="30">30 Horas</option>');
                                             echo('<option value="Ad honorem">Ad honorem</option>');
                                        } else if ($res[0]['Jornada'] == "Ad honorem"){
                                            echo('<option selected="selected" value="Ad honorem">Ad honorem</option>');
                                            echo('<option value="10">10 Horas</option>');
                                            echo('<option value="20">20 Horas</option>');
                                            echo('<option value="30">30 Horas</option>');
                                            echo('<option value="40">40 horas</option>');
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>                        
                    </th>
                    <th colspan="1" style="width: 50%">
                        <div class="form-group">
                            <label></label>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="text-center"><a class="btn btn-success" style="float: left;"  name="submit" onclick="javascript:update_member();"><i class="fa fa-save fa-inverse"></i> <?= "Actualizar" . " " . "Datos" ?></a></div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="text-center"><a class="btn btn-warning" style="float: left;" onclick="javascript:OpcionMenu('mod/admin/proyecto/listar_integrantes.php?', '');"><i></i> <?= "Regresar" ?></a></div>
                                </div>
                            </div> 
                        </div>   
                    </th>                  
                </tr>                
            </table>
        </div>
    </form>
</div>
