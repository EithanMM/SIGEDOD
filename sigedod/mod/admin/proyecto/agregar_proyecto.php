
<?php
include("../../login/check.php");
include("../../../functions.php");
$vocab = $mySessionController->getVar("vocab");
$user_rol = $mySessionController->getVar("rol");

?>

    <div class="well"> <h2>Agregar Proyecto</h2></div>
    
    <script type="text/javascript">
        function paintTipoFondo() {
            get_fondos();
        }
        window.onload = paintTipoFondo();    
    </script>
<form id="frm_archivo" class="appnitro"  enctype="multipart/form-data"  target="basura">
    <div class="col-lg-5 col-md-5 col-sm-8 col-xs-12">
        <table>
            <tr>
                <th colspan="1" style="width:50%">
                    <div class="form-group">
                        <label><?= $vocab["nombre_proyecto"] ?></label>
                        <input id="nom_proyecto" name="nom_proyecto" class="form-control" type="text" placeholder="Nombre de Proyecto"/>
                    </div>
                </th>
                <th colspan="1" style="width:50%">
                    <div class="form-group">
                        <label><?= $vocab["cod_sia"] ?></label>
                        <input id="cod_sia" name="cod_sia" class="form-control" placeholder="Código SIA" type="text" />
                    </div>
                </th>
            </tr>
            
            <tr>
               <th colspan="1" style="width:50%">
                    <div class="form-group">
                        <label><?= $vocab["cod_banner"] ?></label>
                        <input id="cod_banner" name="cod_banner" class="form-control" placeholder="Código Banner" type="text"/>
                    </div>
                </th>
                <th colspan="1" style="width:50%">
                     <div class="form-group">
                        <label><?= $vocab["ent_admin"]  ?></label>
                        <input id="ent_admi" name="ent_admi" class="form-control" placeholder="Entidad Administradora" type="text"/>
                    </div>
                </th>
            </tr>
            
            <tr>
                <th colspan="1" style="width:50%">
                    <div class="form-group">
                        <label><?= $vocab["num_cuent"] ?></label>
                        <input id="num_cuenta" name="num_cuenta" class="form-control" placeholder="Número de Cuenta" type="text"/>
                    </div> 
                </th>
                <th colspan="1" style="width:50%">
                    <div class="form-group"> 
                        <label><?= $vocab["estado"]  ?></label>
                                <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <select id="Estados" name="Estados" class="form-control" style="width: 220%">
                                                <option value="Vigente" selected="selected">Vigente</option>
                                                </select>
                                        </div>
                                </div>
                    </div>
                </th>
            </tr>
            <tr>
                <th colspan="1" style="width:50%">
                     <label><?= $vocab["fech_inicio"] ?></label>
                    <div class="form-group form-inline">
                        <span><input id="fecha_1_2" name="fecha_1_2" class="form-control form-inline" size="2" maxlength="2" value="" type="text" placeholder="DD"> /</span>
                        <span><input id="fecha_1_1" name="fecha_1_1" class="form-control" size="2" maxlength="2" value="" type="text" placeholder="MM"> /</span>
                        <span><input id="fecha_1_3" name="fecha_1_3" class="form-control" size="4" maxlength="4" value="" type="text" placeholder="AAAA"></span>
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
                <th colspan="1" style="width:50%">
                    <label><?= $vocab["fech_final"] ?></label>
                        <div class="form-group form-inline">
                             <span><input id="fecha_2_2" name="fecha_2_2" class="form-control form-inline" size="2" maxlength="2" value="" type="text" placeholder="DD"> /</span>
                             <span><input id="fecha_2_1" name="fecha_2_1" class="form-control" size="2" maxlength="2" value="" type="text" placeholder="MM"> /</span>
                             <span><input id="fecha_2_3" name="fecha_2_3" class="form-control" size="4" maxlength="4" value="" type="text" placeholder="AAAA"></span>
                             <span id="calendar_2" style="font-size: 20px;" class="text-primary" ><i class="fa fa-calendar datepicker puntero" id="cal_img_2" title="Seleeccione una fecha"></i></span> 
                        </div>
                <script type="text/javascript"> //script miedo 
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
                <th colspan="1" style="width:50%">
                    <div class="form-group">
                    <label><?= $vocab["fondo"]  ?></label>
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                            <select id="selectBox" name="selectBox" class="form-control">
                                <option value="0" selected="selected">[seleccione una opción]</option>
                            </select>
                    </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="btn-group mr-2"><a class="btn btn-success" style="float: left;" data-toggle="modal" href="#modalFin" data-target="#modalFin" onclick="ocultarModFondo();" ><i></i> <?="Agregar"." "."Fondo"?></a></div>
                        </div>
                    </div>
                </div>
                </th>
                <th colspan="1" style="width:50%">
                    <div class="form-group">
                    <label style="visibility:hidden"></label>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="text-center"><a class="btn btn-success" style="float: center;" onclick="javascript:funciones();"><i class="fa fa-save fa-inverse"></i> <?= $vocab["symbol_save"] . " " . "Proyecto" ?></a></div>
                    </div> <!-- funciones();-->
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="text-center"><a class="btn btn-danger" style="float: center;" onclick="javascript:OpcionMenu('mod/admin/proyecto/listar_proyecto.php?', '');"><i></i> <?= "Cancelar" ?></a></div>
                        </div>
                    </div>
                </div>
                </th>
            </tr>         
        </table>
    </div>
 </form>
    <!------------------------------MODAL-------------------------------------->
    <div class="modal fade" id="modalFin" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <span class="close" data-dismiss="modal" onclick="javascript:limpiarModalFondo();" >&times;</span>
                    <h4 class="modal-title" align="center">Agregar Fondo</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group row" align="center">    
                        <label for="cedula">Tipo de Fondo</label>
                        <input type="text" style="width: 160px; text-align: center;" class="form-control" id="input_tip_fondo"  name="input_tip_fondo"/>
                    </div>
                    <div class="form-group row" align="center">
                        <a class="btn btn-success" onclick="javascript:agregarFondo();"><?= "Agregar" ?></a>
                        <a class="btn btn-danger" onclick="javascript:limpiarModalFondo();" data-dismiss="modal"  href="#modalFin" ><?= "Cancelar" ?></a>
                    </div>
                    <div class="form-group reow" align="center">
                        <label  id ="label-message"></label>
                    </div>  
                </div>
            </div>
        </div>
    </div>
    <iframe id="basura" name="basura" style="display:none"> </iframe>
    <!----------------------------------------------------------------------------->
