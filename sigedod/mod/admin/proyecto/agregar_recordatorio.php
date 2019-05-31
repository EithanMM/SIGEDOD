<?php
include("../../../functions.php");
include("../../login/check.php");


$vocab = $mySessionController->getVar("vocab");
$user_rol = $mySessionController->getVar("rol");
$id_cod_sia = (isset($_GET['cod_sia'])) ? $_GET['cod_sia'] : "";

?>



<div class="well"><h2>Nuevo Recordatorio</h2></div>

<form>
    <div class="col-lg-5 col-md-5 col-sm-8 col-xs-12">
        <table>
           
            <tr>
                <th colspan="1" style="width:50%">
                    <div class="form-group">
                        <label for="m_cod_sia">Proyecto de Investigacion</label>
                       
                    </div>
                </th>
                
                <th colspan="1" style="width:50%">
                    <div class="form-group">
                         <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                         <select name="tipo_tel" id="tipo_tel" class="form-control" onchange="setTextField(this)" onclick="setTextField(this)" onload="setTextField(this)">
                                    <?php
                                    $sql2 = "SELECT DISTINCT Nom_Proy FROM sis_proy_inv";
                                    $res2 = seleccion($sql2);
                                    $counter = 0;
                                    foreach ($res2 as $row) {
                                        echo("<option value='" . $counter++ . "'>" . $row["Nom_Proy"] . "</option>");
                                    }
                                    ?>
                                </select>
                                    </div>
                          </div>
                        
                    </div>
                </th>
            </tr>
            <tr>
                <th colspan="1" style="width:50%">
                    <div class="from-group">
                        <label for="m_ced">Asunto</label>
                        <input id="miem_ced" class="form-control" type="text"/>
                        <h6>Escriba el asunto del mensaje </h6>
                    </div>
                </th>
                <th colspan="1" style="width:50%">
                    <div class="from-group">
                        <label for="m_ced">CC</label>
                        <input id="miem_nombre" class="form-control" type="text"/>
                          <h6>Si necesita enviar recordatorio a una persona ajena al proyecto escriba su email</h6>
                    </div>
                </th>
            </tr>
            <tr>
                <th colspan="1" style="width:50%">
                     <label>Fecha del Recordatorio</label>
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
                    <div class="form-group">
                        <label for="m_email">Mensaje</label>
                        <textarea id="desc_roll" name="desc_roll" class="form-control" rows="2"></textarea> 
                    </div>
                </th>
            </tr>
            <?php ?>
            
              
            <tr>
                
                <th colspan="1" style="width:50%">
                    <div class="form-group">
                        <div class="row" style="margin: 3px;">
                            <div class="btn-group mr-2"><a class="btn btn-success" style="float: left;"  name="submit" onclick="javascript:agrecordatorio();"><i class="fa fa-save fa-inverse"></i> Guardar Recordatorio</a></div>
                             
                        </div> 
                    </div>
                </th>
                <th>
                    <div class="form-group">
                        <div class="row" style="margin: 3px;">
                    <div class="btn-group mr-2" class="text-center"><a class="btn btn-danger" style="float: left;" onclick="javascript:OpcionMenu('mod/admin/proyecto/Recordatorios.php?', '');"><i></i> <?= "Cancelar" ?></a></div>  </th>
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

