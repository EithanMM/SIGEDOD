
<?php
include("../../login/check.php");
include("../../../functions.php");
$vocab = $mySessionController->getVar("vocab");
$user_rol = $mySessionController->getVar("rol");
$cod_sia = $_GET['cod_sia'];
$view_mode = $_GET['view_mode'];
$sql = "SELECT Cod_SIA,Nom_Proy,Cod_Ban,Ent_Ad,Num_Cue,Day(Fech_Ini),Month(Fech_Ini),year(Fech_Ini),Day(Fech_Fin),Month(Fech_Fin),year(Fech_Fin),Estado FROM sis_proy_inv  WHERE Cod_SIA='$cod_sia';";
$sql_tipo_fondo = "SELECT tipo FROM sis_tipo_fondo  WHERE Cod_SIA='$cod_sia';";
$res = seleccion($sql);
$res2 = seleccion($sql_tipo_fondo);
?>
<div class="container">
    <div class="well well-sm">
        <h2>
            <?php
            echo ($view_mode == 1) ? $vocab["symbol_edit"] : $vocab["symbol_view"];
            echo " " . "Proyecto";
            ?>
        </h2>
    </div>
    <form method="post" action="">
    <div class="col-lg-5 col-md-5 col-sm-8 col-xs-12">
        <table>
            <tr>
                <th colspan="1" style="width: 50%">
                    <div class="form-group">
                        <label for="cod_sia"><?= $vocab["cod_sia"] ?></label>
                        <input id="cod_sia" name="cod_sia" class="form-control" readonly type="text" value="<?= $res[0]['Cod_SIA'] ?>" <?= ($view_mode == 0) ?>/>   
                    </div>
                </th>
                 <th colspan="1" style="width: 50%">
                       <div class="form-group">
                            <label for="nom_proyecto"><?= $vocab["nombre_proyecto"]  ?></label>
                            <input id="nom_proyecto" name="nom_proyecto" class="form-control" type="text" value="<?= $res[0]['Nom_Proy'] ?>" /> 
                       </div>
                </th>
            </tr>
            <tr>
                <th colspan="1" style="width: 50%">
                   <div class="form-group">
                        <label for="cod_banner"><?= $vocab["cod_banner"] ?></label>
                        <input id="cod_banner" name="cod_banner" class="form-control" type="text" value="<?= $res[0]['Cod_Ban'] ?>" /> 
                   </div>
                </th>
                 <th colspan="1" style="width: 50%">
                    <div class="form-group">
                        <label><?= $vocab["ent_admin"] ?></label>
                        <input id="ent_admi" name="ent_admi" class="form-control" type="text" value="<?= $res[0]['Ent_Ad'] ?>" /> 
                    </div>
                </th>
            </tr>
            <tr>
                <th colspan="1" style="width: 50%">
                    <div class="form-group">
                        <label><?= $vocab["num_cuent"]  ?></label>
                        <input id="num_cuenta" name="num_cuenta" class="form-control" type="text" value="<?= $res[0]['Num_Cue'] ?>" /> 
                    </div>
                </th>
                 <th colspan="1" style="width: 50%">
                    <div class="form-group">
                        <label><?= $vocab["fondo"] ?></label>
                          <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <input  class="form-control" id="tip_fondo" style="width: 160px; text-align: center;" type="text" readonly value="<?= $res2[0]['tipo'] ?>" />
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="btn-group mr-2"><a class="btn btn-success" style="float: left;" data-toggle="modal" href="#modalEdit" data-target="#modalEdit"><i></i> <?= "Editar" . " " . "Fondo" ?></a></div>
                                </div>
                          </div>
                    </div>
                </th>
            </tr>
            <tr>
                <th colspan="1" style="width: 50%">
                     <label><?= $vocab["fech_inicio"] ?></label>
                        <div class="form-group form-inline">
                            <span><input id="fecha_1_2" name="fecha_1_2" class="form-control form-inline" size="2" maxlength="2" value="<?= $res[0]['Day(Fech_Ini)'] ?>" type="text" placeholder="DD"> /</span>
                            <span><input id="fecha_1_1" name="fecha_1_1" class="form-control" size="2" maxlength="2" value="<?= $res[0]['Month(Fech_Ini)'] ?>" type="text" placeholder="MM"> /</span>
                            <span><input id="fecha_1_3" name="fecha_1_3" class="form-control" size="4" maxlength="4" value="<?= $res[0]['year(Fech_Ini)'] ?>" type="text" placeholder="AAAA"></span>
                            <span id="calendar_1" style="font-size: 20px;" class="text-primary" ><i class="fa fa-calendar datepicker puntero" id="cal_img_1" title="Seleeccione una fecha"></i></span> 
                        </div>
                        <script type="text/javascript"><!--script miedo -->
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
                 <th colspan="1" style="width: 50%">
                     <label><?= $vocab["fech_final"] ?></label>
                        <div class="form-group form-inline">
                        <span><input id="fecha_2_2" name="fecha_2_2" class="form-control form-inline" size="2" maxlength="2" value="<?= $res[0]['Day(Fech_Fin)'] ?>" type="text" placeholder="DD"> /</span>
                        <span><input id="fecha_2_1" name="fecha_2_1" class="form-control" size="2" maxlength="2" value="<?= $res[0]['Month(Fech_Fin)'] ?>" type="text" placeholder="MM"> /</span>
                        <span><input id="fecha_2_3" name="fecha_2_3" class="form-control" size="4" maxlength="4" value="<?= $res[0]['year(Fech_Fin)'] ?>" type="text" placeholder="AAAA"></span>
                        <span id="calendar_2" style="font-size: 20px;" class="text-primary" ><i class="fa fa-calendar datepicker puntero" id="cal_img_2" title="Seleeccione una fecha"></i></span> 
                        </div>
                        <script type="text/javascript"><!--script miedo -->
                        Calendar.setup({
                        inputField: "fecha_2_3",
                        baseField: "fecha_2",
                        displayArea: "calendar_2",
                        button: "cal_img_2",
                        ifFormat: "%B %e, %Y",
                        onSelect: selectDate
                        });
                        </script>
                </th>
            </tr>
            <tr>
                <th colspan="1" style="width: 50%">
                   <div class="form-group">
                        <label><?= $vocab["estado"] ?></label>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <select id="Estados" name="Estados" class="form-control">
                                        <option value="Cerrado" selected="selected">Cerrado</option>
                                        <option value="Por Cerrar" selected="selected">Por Cerrar</option>
                                        <option value="Vigente" selected="selected">Vigente</option>
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
                                    <div class="btn-group mr-2"><a class="btn btn-success" align="center" data-toggle="modal" href="#modalPDF" onclick="javascript:trans_cod_sia();" data-target="#modalPDF" ><?= $vocab["PDF"]?></a></div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="text-center"><a class="btn btn-success" style="float: left;" onclick="javascript:ir_agregar_miembro();"><i></i> <?= "Agregar miembro" ?></a></div>
                                </div>
                            </div> 
                        </div> 
                </th>
            </tr>
            <tr>
                <th colspan="1" style="width: 50%">
                    <div class="form-group">
                        <label>Prórroga</label>
                        <div class="row" align="center">
                            <textarea id="prorroga" rows="2" cols="40"></textarea>
                        </div>
                    </div>
                </th>
                <th colspan="1" style="width: 50%">
                    <div class="form-group">
                        <label></label>
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="text-center"><a class="btn btn-success" style="float: left;"  name="submit" onclick="javascript:update_proy();"><i class="fa fa-save fa-inverse"></i> <?= $vocab["symbol_update"] . " " . "Datos" ?></a></div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="text-center"><a class="btn btn-warning" style="float: left;" onclick="javascript:OpcionMenu('mod/admin/proyecto/listar_proyecto.php?', '');"><i></i> <?= "Regresar" ?></a></div>
                            </div>
                        </div> 
                    </div>                     
                </th>
            </tr>
        </table> 
    </div>
</form>
    
    <!------------------------------MODAL-------------------------------------->
    <div class="modal fade" id="modalEdit" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <span class="close" data-dismiss="modal" onclick="javascript:limpiarModalFondo();">&times;</span>
                    <h4 class="modal-title" align="center">Editar Fondo</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group row" align="center">    
                        <label for="tipo_fondo">Tipo de Fondo</label>
                        <input type="text" style="width: 160px; text-align: center;" class="form-control" readonly value="<?= $res2[0]['tipo'] ?>" id="input_old_fondo"  name="input_edit_fondo"/>
                        <input type="text" style="width: 160px; text-align: center;" class="form-control"  value="" id="input_new_fondo"  name="input_new_fondo"/>
                    </div>
                    <div class="form-group row" align="center">
                        <a class="btn btn-success" onclick="javascript:update_fondo();"><?= "Editar" ?></a>
                        <a class="btn btn-danger" onclick="javascript:limpiarModalFondo();" data-dismiss="modal"  href="#modalFin" ><?= "Cancelar" ?></a>
                    </div>
                    <div class="form-group reow" align="center">
                        <label  id ="label-message"></label>
                    </div>  
                </div>
            </div>
        </div>
    </div>
<!----------------------------------------------------------------------------->
<!------------------------------MODAL------------------------------------------>
</div>
<div class="modal fade" id="modalPDF" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <span class="close" data-dismiss="modal" onclick="javascript:limpiarArchivoModal();">&times;</span>
                    <h4 class="modal-title" align="center">Subir archivo PDF</h4>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" target="basura" action="mod/admin/proyecto/ajax_subir_PDF.php">
                        <div class="form-group row" align="center">
                            <label> Nombre archivo </label>
                                <input type="hidden"id="input_cod_sia" name="input_cod_sia">
                                <input type="text" id="titulo" name="titulo" style="width: 350px;" class="form-control"  name="input_nombre_archivo">
                        </div>
                        <div class="row" align="center">
                            <label>Descripcion</label>
                                <input type="text" id="descripcion" name="descripcion" style="width: 350px;" class="form-control"  name="input_desc_archivo">
                        </div>
                        <div class="row" align="center">
                            <input  name="archivo" id="archivo" onchange="return filter_type(this);" type="file""/>
                            <div class="row" align="center">
                                <input type="submit" id="subir" value="subirPDF" name="subir" onclick="javascript:validatePDF();">
                            </div>
                        </div>
                    </form>
                </div>                     
                     <div class="row" align="center" >
                            <a class="btn btn-danger" onclick="javascript:limpiarArchivoModal();" data-dismiss="modal"  href="#modalFin" ><?= "Cancelar" ?></a>
                     </div>
                     <div class="form-group" align="center">
                            <label id="etiqueta"></label>
                     </div>
            </div>
        </div>
    </div>
<iframe id="basura" name="basura" style="display:none"> </iframe>
