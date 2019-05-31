<?php
include("../../../functions.php");
include("../../login/check.php");


$vocab = $mySessionController->getVar("vocab");
$user_rol = $mySessionController->getVar("rol");
$id_cod_sia = (isset($_GET['cod_sia'])) ? $_GET['cod_sia'] : "";

?>



<div class="well"><h2>Agregar miembros</h2></div>

<form>
    <div class="col-lg-5 col-md-5 col-sm-8 col-xs-12">
        <table>
            <tr>
                <th colspan="1" style="width: 50%">
                        <div class="row">
                            <div class="radio radio_efect">
                            <label>¿Ha agregado a este miembro anteriormente?: </label>
                                <label class="radio-inline">
                                
                                    <input id="inlineCheckbox1" name="inlineCheckbox" type="radio" value="1"> <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>Si
                                </label>
                                <label class="radio-inline">
                                    <input id="inlineCheckbox2" name="inlineCheckbox" type="radio" value="2"> <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>No
                                </label>
                                <script type="text/javascript">
                                    document.getElementById('inlineCheckbox2').checked = true;
                                </script>
                            </div>
                        </div>
                </th>
                <th>
                    <div class="row" align="center">
                         <p class="help-block">  Nota: Si su respuesta es "sí",</p>
                         <p class="help-block">solo se deberá rellenar el espacio de cédula,tipo y jornada</p>
                    </div>
                </th>
            </tr>
            <tr>
                <th colspan="1" style="width:50%">
                    <div class="form-group">
                        <label for="m_cod_sia"><?= $vocab["cod_sia"]?></label>
                            <input id="miem_cod_sia" style="width:70%;"  class="form-control" type="text" readonly/>
                            <script type="text/javascript">
                            var valor = "<?php echo $id_cod_sia; ?>";
                            document.getElementById('miem_cod_sia').value = valor;
                            </script>
                    </div>
                </th>
                
                <th colspan="1" style="width:50%">
                    <div class="form-group">
                        <label> <?= $vocab["tip_ced"]?></label>
                         <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <select id="TCedula" name="TCedula" class="form-control" style="width:150%;">
                                            <option value="Extranjero" selected="selected">Extranjero</option>
                                            <option value="Nacional" selected="selected">Nacional</option>
                                        </select>
                                    </div>
                          </div>
                    </div>
                </th>
            </tr>
            <tr>
                <th colspan="1" style="width:50%">
                    <div class="from-group">
                        <label for="m_ced"><?= $vocab["ced"]?></label>
                        <input id="miem_ced" class="form-control" type="text"/>
                    </div>
                </th>
                <th colspan="1" style="width:50%">
                    <div class="from-group">
                        <label for="m_ced"><?= $vocab["nom_miem"]?> </label>
                        <input id="miem_nombre" class="form-control" type="text"/>
                    </div>
                </th>
            </tr>
            <tr>
                <th colspan="1" style="width:50%">
                    <div class="form-group">
                        <label for="m_telefono"><?= $vocab["num_tel"] ?></label>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <input id="miem_telefono" type="text" class="form-control" onkeypress="return onlyNumbers(event, 0)"/>  
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <select name="tipo_tel" id="tipo_tel" class="form-control" >
                                    <option value="0" value="" selected="selected">[<?= $vocab["symbol_select"] ?>]</option>
                                    <?php
                                    $sql1 = "SELECT id_tipo_tel, desc_tipo_tel FROM sis_tipo_tel ORDER BY desc_tipo_tel";
                                    $res1 = seleccion($sql1);
                                    foreach ($res1 as $row) {
                                        echo("<option value='" . $row["id_tipo_tel"] . "'>" . $row["desc_tipo_tel"] . "</option>");
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>  
                </th>
                <th colspan="1" style="width:50%">
                    <div class="form-group">
                        <label for="m_email"><?= $vocab["email"]?></label>
                        <input id="miem_email" type="text" class="form-control"/>
                    </div>
                </th>
            </tr>
            <?php ?>
            <tr>
                <th colspan="1" style="width:50%">
                    <div class="form-group">
                        <label> <?= $vocab["tip"]?> &nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;</label><label> <?= $vocab["jor"]?> </label>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <select id="TMiembro" name="TMiembro" class="form-control">
                                        <option value="Participante" selected="selected">Participante</option>
                                        <option value="Responsable" selected="selected">Responsable</option>
                                    </select>
                                </div>
                                 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                     <select id="Jornada" name="Jornada" class="form-control">
                                        <option value="10" selected="selected">10 horas</option>
                                        <option value="20" selected="selected">20 horas</option>
                                        <option value="30" selected="selected">30 horas</option>
                                        <option value="40" selected="selected">40 horas</option>
                                        <option value="Ad honorem" selected="selected">Ad honorem</option>
                                    </select>
                                </div>
                            </div>
                    </div>
                </th>
                <th colspan="1" style="width:50%">
                    <div class="form-group">
                         <label> Subir archivo </label>
                         <div class="row">
                             <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                 <div class="btn-group mr-2"><a class="btn btn-success" align="center" data-toggle="modal" href="#modalPDF" onclick="javascript:trans_cod_sia();" data-target="#modalPDF" ><?= $vocab["PDF"]?></a></div>
                             </div>
                         </div>   
                    </div>
                </th>
            </tr>
            <tr>
                <th colspan="1" style="width:50%">
                    <div class="form-group">
                        <div class="radio radio_efect">
                            <label><input id="radio-miembros" name="radio-miembros"  class="" type="radio" title="propiedad title"/> <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>No agregar más integrantes</label> 
                        </div>
                    </div>
                </th>
                <th colspan="1" style="width:50%">
                    <div class="form-group">
                        <div class="row" style="margin: 3px;">
                            <div class="btn-group mr-2"><a class="btn btn-success" style="float: left;"  name="submit" onclick="javascript:funciones2();"><i class="fa fa-save fa-inverse"></i> <?= $vocab["symbol_save"] . " " . "Integrantes" ?></a></div>
                            <div class="btn-group mr-2" class="text-center"><a class="btn btn-danger" style="float: left;" onclick="javascript:OpcionMenu('mod/admin/proyecto/listar_proyecto.php?', '');"><i></i> <?= "Cancelar" ?></a></div>   
                        </div> 
                    </div>
                </th>
            </tr>
        </table>
    </div>
</form>
<!------------------------------MODAL-------------------------------------->
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
                            <label>Descripción</label>
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

