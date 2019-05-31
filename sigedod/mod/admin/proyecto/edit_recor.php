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
                            <label for="id_user">Nombre del Proyecto </label>
                            <input id="cod_sia" readonly="" name="cod_sia"  class="form-control" type="text" value="<?= $res[0]['Nom_Proy'] ?>" <?= ($ldap_status == 1 || $view_mode == 0) ? "readonly" : "" ?>/>  

                        </div>
                    </th>
                    <th colspan="2" style="width:50%">
                        <div class="form-group">
                            <label for="nom_proyecto">Asunto</label>
                            <input id="nom_proyecto"  name="nom_proyecto" class="form-control" type="text" value="<?= $res[0]['Subject'] ?>" /> 
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
                            <input id="cod_banner"  name="cod_banner" class="form-control" type="text" value="<?= $res[0]['Body'] ?>" /> 
                            <p class="help-block"><small>
                                    <!--                   <?= $vocab["proyect_cban_desc"] ?>-->
                                </small></p>
                        </div>
                    </th>
                    <th colspan="2">
                        <div class="form-group">
                            <label>Correo Electronico</label>
                            <input id="ent_admi"  name="ent_admi" class="form-control" type="text" value="<?= $res[0]['email'] ?>" /> 
                            <p class="help-block"><small>
                                    <!--                     <?= $vocab["proyect_entAdmin_desc"] ?>-->
                                </small></p>
                        </div>
                    </th>
                <tr>
                     <th colspan="1" style="width:50%">
                     <label>Fecha del Recordatorio</label>
                    <div class="form-group form-inline">
                        <span><input id="fecha_1_2" name="fecha_1_2" class="form-control form-inline" size="2" maxlength="2" value="<?= $res[0]['Day(Fech_record)'] ?>" type="text" placeholder="DD"> /</span>
                        <span><input id="fecha_1_1" name="fecha_1_1" class="form-control" size="2" maxlength="2" value="<?= $res[0]['Month(Fech_record)'] ?>" type="text" placeholder="MM"> /</span>
                        <span><input id="fecha_1_3" name="fecha_1_3" class="form-control" size="4" maxlength="4" value="<?= $res[0]['year(Fech_record)'] ?>" type="text" placeholder="AAAA"></span>
                        <span id="calendar_1" style="font-size: 20px;" class="text-primary" ><i class="fa fa-calendar datepicker puntero" id="cal_img_1" title="Seleeccione una fecha"></i></span> 
                    </div>
                <script type="text/javascript"> //script miedo 
                        Calendar.setup({
                            inputField: "fecha_1_3",
                            baseField: "fecha_1",
                            displayArea: "calendar_1",
                            button: "cal_img_1",
                            ifFormat: "%B %e, %Y",
                            onSelect: selectDate
                        });
                </script>  
                </th>
                </tr>
                <tr>
                    <th>
                          <div class="form-group">
                            <div class="btn-group mr-2"><a class="btn btn-success" style="float: left;"  name="submit" onclick="javascript:uprecordatorio();"><i class="fa fa-save fa-inverse"></i> Actualizar Recordatorio</a></div>
                             
                        </div> 
                    </th>
                    <th>
                    </div>
                           <div class="btn-group mr-2" class="text-center"><a class="btn btn-danger" style="float: left;" onclick="javascript:OpcionMenu('mod/admin/proyecto/Recordatorios.php?', '');"><i></i> <?= "Cancelar" ?></a></div>  
          
                    </th>
                </tr>
                
            </table>      

    </div>
</div>