<?php
include("../../login/check.php");
include("../../../functions.php");
$vocab = $mySessionController->getVar("vocab");
$user_rol = $mySessionController->getVar("rol");
$cod_sia = $_GET['cod_sia'];
$view_mode = $_GET['view_mode'];
$sql = "SELECT Nom_Proy,Subject,email,Body,Day(Fech_record),Month(Fech_record),year(Fech_record)FROM sis_proy_recorda WHERE Nom_proy='$cod_sia';";
$res = seleccion($sql);
$sAjaxSource = $mySessionController->getVar('cds_domain') . $mySessionController->getVar('cds_locate') . 'mod/admin/proyecto/ajax_listar_integrantes_1.php';

$sAjaxSource2 = $mySessionController->getVar('cds_domain') . $mySessionController->getVar('cds_locate') . 'mod/admin/proyecto/ajax_listar_PDF.php';

$_SESSION['varname'] = $cod_sia;
?>
<div class="container">
    <div class="well well-sm">
        <h2>
            Recordatorio
        </h2>
        <p>El recordatorio se enviara automaticamente al correo electronico de los miembros del proyecto y el suministrado en este espacio</p>
    </div>
    <div class="col-lg-5 col-md-5 col-sm-8 col-xs-12">
        <form method="post" action="">

            <table>
                <tr>
                    <th colspan="2" style="width:50%">
                        <div class="form-group">
                            <label for="id_user">Nombre del proyecto </label>
                            <input id="cod_sia" name="cod_sia" readonly class="form-control" type="text" value="<?= $res[0]['Nom_Proy'] ?>" <?= ($ldap_status == 1 || $view_mode == 0) ? "readonly" : "" ?>/>  

                        </div>
                    </th>
                    <th colspan="2" style="width:50%">
                        <div class="form-group">
                            <label for="nom_proyecto">Asunto</label>
                            <input id="nom_proyecto" readonly name="nom_proyecto" class="form-control" type="text" value="<?= $res[0]['Subject'] ?>" /> 
                            <p class="help-block"><small>
                                    <!--                   <?= $vocab['proyect_n_desc'] ?>-->
                                </small></p>
                        </div>
                    </th>

                </tr>

                <tr>
                    <th colspan="2">
                        <div class="form-group">
                            <label for="cod_banner">Mensaje</label>
                            <input id="cod_banner" readonly name="cod_banner" class="form-control" type="text" value="<?= $res[0]['Body'] ?>" /> 
                            <p class="help-block"><small>
                                    <!--                   <?= $vocab["proyect_cban_desc"] ?>-->
                                </small></p>
                        </div>
                    </th>
                    <th colspan="2">
                        <div class="form-group">
                            <label>Correo Electronico</label>
                            <input id="ent_admi" readonly name="ent_admi" class="form-control" type="text" value="<?= $res[0]['email'] ?>" /> 
                            <p class="help-block"><small>
                                    <!--                     <?= $vocab["proyect_entAdmin_desc"] ?>-->
                                </small></p>
                        </div>
                    </th>
                <tr>
                    <th colspan="2">
                        <label> Fecha de ingreso de proyecto</label>
                        <div class="form-group form-inline">
                            <!--DIA-->   <span><input id="fecha_1_2" readonly name="fecha_1_2" class="form-control form-inline" size="2" maxlength="2" value="<?= $res[0]['Day(Fech_record)'] ?>" type="text" placeholder="DD"> /</span>
                            <!--MES-->   <span><input id="fecha_1_1" readonly name="fecha_1_1" class="form-control" size="2" maxlength="2" value="<?= $res[0]['Month(Fech_record)'] ?>" type="text" placeholder="MM"> /</span>
                            <!--ANNO-->  <span><input id="fecha_1_3" readonly name="fecha_1_3" class="form-control" size="4" maxlength="4" value="<?= $res[0]['year(Fech_record)'] ?>" type="text" placeholder="AAAA"></span>

                        </div>
                    </th>
                    <th>
                        <div class="row" align="center" >
                           <div class="btn-group mr-2" class="text-center"><a class="btn btn-danger" style="float: left;" onclick="javascript:OpcionMenu('mod/admin/proyecto/Recordatorios.php?', '');"><i></i> <?= "Cancelar" ?></a></div>  </th>
          
                    </th>
                </tr>
                
            </table>      

    </div>
</div>