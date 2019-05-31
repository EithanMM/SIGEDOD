<?php
include("../../login/check.php");
include("../../../functions.php");
$vocab = $mySessionController->getVar("vocab");
$user_rol = $mySessionController->getVar("rol");
$cod_sia = $_GET['cod_sia'];
$view_mode = $_GET['view_mode'];
$sql = "SELECT py.Cod_SIA,py.Prorroga,py.Nom_Proy,py.Cod_Ban,py.Ent_Ad,"
        . "py.Num_Cue,Day(py.Fech_Ini),Month(py.Fech_Ini),"
        . "year(py.Fech_Ini),Day(py.Fech_Fin),Month(py.Fech_Fin),"
        . "year(py.Fech_Fin),py.Estado,"
        . " tf.tipo FROM sis_proy_inv py inner join sis_tipo_fondo tf on tf.cod_sia = py.Cod_SIA WHERE py.Cod_SIA='$cod_sia';";
$res = seleccion($sql);
$sqlphoto1 = "SELECT file as file1 FROM `sis_pic_proy` WHERE cod_sia='$cod_sia' and pos = 1";
$photo1 = seleccion($sqlphoto1);
$photo1var;
if($photo1 == null){ 
    $photo1var = "";}
    else{
        $photo1var = $photo1[0]['file1'];}
$sqlphoto2 = "SELECT file as file2 FROM `sis_pic_proy` WHERE cod_sia='$cod_sia' and pos = 2";
$photo2 = seleccion($sqlphoto2);
$photo2var;
if($photo2 == null){ 
    $photo2var = "";}
    else{
        $photo2var = $photo2[0]['file2'];}
$sqlphoto3 = "SELECT file as file3 FROM `sis_pic_proy` WHERE cod_sia='$cod_sia' and pos = 3";
$photo3 = seleccion($sqlphoto3);
$photo3var;
if($photo3 == null){ 
    $photo3var = "";}
    else{
        $photo3var = $photo3[0]['file3'];}
$sqlphoto4 = "SELECT file as file4 FROM `sis_pic_proy` WHERE cod_sia='$cod_sia' and pos = 4";
$photo4 = seleccion($sqlphoto4);
$photo4var;
if($photo4 == null){ 
    $photo4var = "";}
    else{
        $photo4var = $photo4[0]['file4'];}
$sAjaxSource = $mySessionController->getVar('cds_domain') . $mySessionController->getVar('cds_locate') . 'mod/admin/proyecto/ajax_listar_integrantes_1.php';

$sAjaxSource2 = $mySessionController->getVar('cds_domain') . $mySessionController->getVar('cds_locate') . 'mod/admin/proyecto/ajax_listar_PDF.php';

$_SESSION['varname'] = $cod_sia;
?>
<!-- 
//*****************************************************************************//
NOTA ACLARATORIA: EL TRABAJO DE IMAGENES REALIZADO EN ESTA SECCION
FUE MERAMENTE PROGRAMADO Y DISEÑADO POR ALEJANDRO CALDERON, POR ENDE
ALEJANDRO GAMBOA Y EITHAN MENDEZ, NO SON RESPONSABLES DE LOS BUGS
QUE SE ENCUENTREN EN ESTA SECCION RESPECTO A LAS IMAGENES QUE DEBA CONTENER
CADA PROYECTO.
//*****************************************************************************//
-->
<script src="../../../inc/js/proyecto.js" type="text/javascript"></script>
<div class="container">
    <div class="well well-sm">
        <h2>
            Vista de Proyecto
        </h2>
        <p>Repositorio de información e imágenes del proyecto</p>
    </div>
    <div class="col-lg-5 col-md-5 col-sm-8 col-xs-12">

            <table>
                <tr>
                    <th colspan="2" style="width:50%">
                        <div class="form-group">
                            <label for="id_user"><?= $vocab["proyect_id"] ?> </label>
                            <input id="cod_sia" name="cod_sia" readonly class="form-control" type="text" value="<?= $res[0]['Cod_SIA'] ?>" <?= ($ldap_status == 1 || $view_mode == 0) ? "readonly" : "" ?>/>  

                        </div>
                    </th>
                    <th colspan="2" style="width:50%">
                        <div class="form-group">
                            <label for="nom_proyecto"><?= $vocab["symbol_name"] ?></label>
                            <input id="nom_proyecto" readonly name="nom_proyecto" class="form-control" type="text" value="<?= $res[0]['Nom_Proy'] ?>" /> 
                            <p class="help-block"><small>
                                    <!--                   <?= $vocab['proyect_n_desc'] ?>-->
                                </small></p>
                        </div>
                    </th>

                </tr>

                <tr>
                    <th colspan="2">
                        <div class="form-group">
                            <label for="cod_banner">Codigo Banner</label>
                            <input id="cod_banner" readonly name="cod_banner" class="form-control" type="text" value="<?= $res[0]['Cod_Ban'] ?>" /> 
                            <p class="help-block"><small>
                                    <!--                   <?= $vocab["proyect_cban_desc"] ?>-->
                                </small></p>
                        </div>
                    </th>
                    <th colspan="2">
                        <div class="form-group">
                            <label>Entidad Administradora</label>
                            <input id="ent_admi" readonly name="ent_admi" class="form-control" type="text" value="<?= $res[0]['Ent_Ad'] ?>" /> 
                            <p class="help-block"><small>
                                    <!--                     <?= $vocab["proyect_entAdmin_desc"] ?>-->
                                </small></p>
                        </div>
                    </th>
                </tr>
                <tr>
                    <th colspan="2">
                        <div class="form-group">
                            <label>Número de Cuenta</label>
                            <input id="num_cuenta" readonly name="num_cuenta" class="form-control" type="text" value="<?= $res[0]['Num_Cue'] ?>" /> 
                            <p class="help-block"><small>
                                    <!--                   <?= $vocab["proyect_numCuen_desc"] ?>-->
                                </small></p>
                        </div> 
                    </th>
                    <th colspan="2">
                        <div class="form-group">
                            <label>Tipo de Fondos</label>
                            <input id="selectBox" readonly name="selectBox" class="form-control" type="text" value="<?= $res[0]['tipo'] ?>" /> 
                            <p class="help-block"><small>
                                    <!--                   <?= $vocab["proyect_numCuen_desc"] ?>-->
                                </small></p>
                        </div> 
                    </th>

                </tr>
                <tr>
                    <th colspan="2">
                        <label> Fecha de ingreso de proyecto</label>
                        <div class="form-group form-inline">
                            <!--DIA-->   <span><input id="fecha_1_2" readonly name="fecha_1_2" class="form-control form-inline" size="2" maxlength="2" value="<?= $res[0]['Day(py.Fech_Ini)'] ?>" type="text" placeholder="DD"> /</span>
                            <!--MES-->   <span><input id="fecha_1_1" readonly name="fecha_1_1" class="form-control" size="2" maxlength="2" value="<?= $res[0]['Month(py.Fech_Ini)'] ?>" type="text" placeholder="MM"> /</span>
                            <!--ANNO-->  <span><input id="fecha_1_3" readonly name="fecha_1_3" class="form-control" size="4" maxlength="4" value="<?= $res[0]['year(py.Fech_Ini)'] ?>" type="text" placeholder="AAAA"></span>

                        </div>
                    </th>
                    <th colspan="2">
                        <label> Fecha de finalización de proyecto</label>
                        <div class="form-group form-inline">
                            <!--DIA-->   <span><input id="fecha_2_2" readonly name="fecha_2_2" class="form-control form-inline" size="2" maxlength="2" value="<?= $res[0]['Day(py.Fech_Fin)'] ?>" type="text" placeholder="DD"> /</span>
                            <!--MES-->   <span><input id="fecha_2_1" readonly name="fecha_2_1" class="form-control" size="2" maxlength="2" value="<?= $res[0]['Month(py.Fech_Fin)'] ?>" type="text" placeholder="MM"> /</span>
                            <!--ANNO-->  <span><input id="fecha_2_3" readonly name="fecha_2_3" class="form-control" size="4" maxlength="4" value="<?= $res[0]['year(py.Fech_Fin)'] ?>" type="text" placeholder="AAAA"></span>
                            <!--ICONO-->
                        </div>
                    </th>
                </tr>
                <tr>
                    <th colspan="2">
                        <div class="form-group">
                            <label>Estado</label>
                            <input <?= ($res[0]['Estado'] == 'Vigente') ? "font color= 'green'" : ""; ?> id="Estado" readonly name="Estado" class="form-control" type="text" value="<?= $res[0]['Estado'] ?>" /> 
                            <p class="help-block"><small>
                                </small></p>
                        </div> 
                    </th>
                    <th colspan="2">
                        <div class="form-group">
                            <label>Prórroga</label>
                            <textarea rows="2" cols="40" readonly>
                            <?php print $res[0]['Prorroga']; ?>
                            </textarea>
                        </div>
                    </th>
                </tr>
            </table>      

    </div>
</div>

<div class="well well-sm"><h1>Archivos PDF</h1></div>
<?php if($user_rol == 4){ ?>
<!-- Cuando el modulo es de proyecto 4.-->
<script type="text/javascript" charset="utf-8">
    var asInitVals = new Array();   //Se utiliza para almacenar la llave del filtro para cada columna.
    jQuery(document).ready(function () {
        var oTable = jQuery('#lista_pdf').dataTable({
        //"sPaginationType": "full_numbers",
         "bProcessing": true,
         "bServerSide": true,
         "aoColumns": [
            {"bVisible": false},
            null,
            null,
            {"bVisible": false},
            {"bVisible": false},
            null,
            {"bVisible": false}
        <?php if (check_permiso($mod4, $act1, $user_rol)) { ?> //mod4 accion ver 'aoColumns es //info de columnas'
            , {"bSortable": false}
        <?php } ?>
        <?php if (check_permiso($mod4, $act4, $user_rol)) { ?> //mod4 accion editar
            , {"bSortable": false}
        <?php } ?>            
        <?php if (check_permiso($mod4, $act5, $user_rol)) { ?> //mod4 accion eliminar
            , {"bSortable": false}
        <?php } ?>
                ],
         "sAjaxSource": "<?php echo $sAjaxSource2; ?>"
    });
    jQuery("tfoot input").keyup(function () {
        /* Filter on the column (the index) of this element */
        oTable.fnFilter(this.value, jQuery("tfoot input").index(this) + 1);
    });
    jQuery("tfoot input").each(function (i) {
        asInitVals[i] = this.value;
    });

    jQuery("tfoot input").focus(function () {
        if (this.className == "search_init")
        {
            this.className = "";
            this.value = "";
        }
    });
    jQuery("tfoot input").blur(function (i) {
        if (this.value == "")
        {
            this.className = "search_init";
            this.value = asInitVals[jQuery("tfoot input").index(this)];
        }
    });
    });
</script>

<div class="dataTables_wrapper form-inline dt-bootstrap">
    <table id="lista_pdf" cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered dataTable" >
        <thead>
            <tr>
                <th>id documento</th>
                <th>titulo</th>
                <th>descripción</th>
                <th>tamanio</th>
                <th>tipo</th>
                <th>Nombre archivo</th>
                <th>Código Sia</th>
                
                 <?php if (check_permiso($mod4, $act1, $user_rol)) { ?>
                        <th><div class="text-center"><i class="fa fa-eye fa-2x text-primary puntero" title="<?= $vocab["symbol_view"] ?>"></i></div></th>
                 <?php } ?>
                 <?php if (check_permiso($mod4, $act4, $user_rol)) { ?>
                        <th><div class="text-center"><i class="fa fa-pencil fa-2x text-success puntero" title="<?= $vocab["symbol_edit"] ?>"></i></div></th>
                 <?php } ?>
                 <?php if (check_permiso($mod4, $act5, $user_rol)) { ?>
                        <th><div class="text-center"><i class="fa fa-close fa-2x text-danger puntero" title="<?= $vocab["symbol_delete"] ?>"></i></div></th>
                <?php }
                ?>
            </tr>
        </thead>
        <tbody>
            <tr>
                 <td colspan="11" class="dataTables_empty"><?= $vocab["symbol_loading"] ?></td>
            </tr>
        </tbody>
    </table>
</div>

<?php  } else { ?>
<!-- Cuando no es.-->
<script type="text/javascript" charset="utf-8">
    var asInitVals = new Array();   //Se utiliza para almacenar la llave del filtro para cada columna.
    jQuery(document).ready(function () {
        var oTable = jQuery('#lista_pdf').dataTable({
        //"sPaginationType": "full_numbers",
         "bProcessing": true,
         "bServerSide": true,
         "aoColumns": [
            {"bVisible": false},
            null,
            null,
            {"bVisible": false},
            {"bVisible": false},
            null,
            {"bVisible": false}
        <?php if (check_permiso($mod3, $act1, $user_rol)) { ?> //mod4 accion ver 'aoColumns es //info de columnas'
            , {"bSortable": false}
        <?php } ?>
        <?php if (check_permiso($mod3, $act4, $user_rol)) { ?> //mod4 accion editar
            , {"bSortable": false}
        <?php } ?>            
        <?php if (check_permiso($mod3, $act5, $user_rol)) { ?> //mod4 accion eliminar
            , {"bSortable": false}
        <?php } ?>
                ],
         "sAjaxSource": "<?php echo $sAjaxSource2; ?>"
    });
    jQuery("tfoot input").keyup(function () {
        /* Filter on the column (the index) of this element */
        oTable.fnFilter(this.value, jQuery("tfoot input").index(this) + 1);
    });
    jQuery("tfoot input").each(function (i) {
        asInitVals[i] = this.value;
    });

    jQuery("tfoot input").focus(function () {
        if (this.className == "search_init")
        {
            this.className = "";
            this.value = "";
        }
    });
    jQuery("tfoot input").blur(function (i) {
        if (this.value == "")
        {
            this.className = "search_init";
            this.value = asInitVals[jQuery("tfoot input").index(this)];
        }
    });
    });
</script>

<div class="dataTables_wrapper form-inline dt-bootstrap">
    <table id="lista_pdf" cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered dataTable" >
        <thead>
            <tr>
                <th>id documento</th>
                <th>titulo</th>
                <th>descripción</th>
                <th>tamanio</th>
                <th>tipo</th>
                <th>Nombre archivo</th>
                <th>Código Sia</th>
                
                 <?php if (check_permiso($mod3, $act1, $user_rol)) { ?>
                        <th><div class="text-center"><i class="fa fa-eye fa-2x text-primary puntero" title="<?= $vocab["symbol_view"] ?>"></i></div></th>
                 <?php } ?>
                 <?php if (check_permiso($mod3, $act4, $user_rol)) { ?>
                        <th><div class="text-center"><i class="fa fa-pencil fa-2x text-success puntero" title="<?= $vocab["symbol_edit"] ?>"></i></div></th>
                 <?php } ?>
                 <?php if (check_permiso($mod3, $act5, $user_rol)) { ?>
                        <th><div class="text-center"><i class="fa fa-close fa-2x text-danger puntero" title="<?= $vocab["symbol_delete"] ?>"></i></div></th>
                <?php }
                ?>
            </tr>
        </thead>
        <tbody>
            <tr>
                 <td colspan="11" class="dataTables_empty"><?= $vocab["symbol_loading"] ?></td>
            </tr>
        </tbody>
    </table>
</div>
<?php } ?>

<div class="well well-sm"><h1>Lista de Miembros</h1></div>

<script type="text/javascript" charset="utf-8">
    var asInitVals = new Array();   //Se utiliza para almacenar la llave del filtro para cada columna.
    jQuery(document).ready(function () {
        var oTable = jQuery('#lista_miembros').dataTable({
            //"sPaginationType": "full_numbers",
            "bProcessing": true,
            "bServerSide": true,
            "aoColumns": [
                {"bVisible": false},
                null,
                null,
                null,
                {"bVisible": false},
                null,
                null,
                null
            ],
            "sAjaxSource": "<?php echo $sAjaxSource; ?>"
        });
        jQuery("tfoot input").keyup(function () {
            /* Filter on the column (the index) of this element */
            oTable.fnFilter(this.value, jQuery("tfoot input").index(this) + 1);
        });
        jQuery("tfoot input").each(function (i) {
            asInitVals[i] = this.value;
        });

        jQuery("tfoot input").focus(function () {
            if (this.className == "search_init")
            {
                this.className = "";
                this.value = "";
            }
        });
        jQuery("tfoot input").blur(function (i) {
            if (this.value == "")
            {
                this.className = "search_init";
                this.value = asInitVals[jQuery("tfoot input").index(this)];
            }
        });
    });
</script>

<div class="dataTables_wrapper form-inline dt-bootstrap">
    <table id="lista_miembros" cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered dataTable" >  
        <thead>
            <tr>
                <th>Código SIA</th>
                <th>Proyecto</th>
                <th>Cédula</th>
                <th>Nombre Miembro</th>
                <th>Teléfono</th>
                <th>Correo</th>
                <th>Tipo</th>
                <th>Jornada</th>


            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="7" class="dataTables_empty"><?= $vocab["symbol_loading"] ?></td>
            </tr>
        </tbody>     
    </table>
     <div class="well well-sm">
        <h2>
            Galería 
        </h2>
        <p>Imágenes del resumen proyecto</p>
    </div>
    <div class="form-group">
                         <label> Subir Fotos</label>
                         <div class="row">
                             <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                 <div class="btn-group mr-2"><a class="btn btn-success" align="center" data-toggle="modal" href="#modalFotos" data-target="#modalFotos" >Subir Fotos</a></div>
                                 <div class="btn-group mr-2"><a class="btn btn-warning" align="center" name="submit" onclick="javascript:OpcionMenu('mod/admin/proyecto/listar_proyecto.php?', '');"><i class="fa fa-rotate-left"></i><?= $vocab["symbol_return"] ?></a></div>
                             </div>
                             <div class="row" align="left">

                             </div>
                         </div>   
                    </div>
     
</div>
	<ul class="galeria">
		<li><a href="#img1"><img src="Archivos/<?= $photo1var ?>" alt=""/></a></li>
		<li><a href="#img2"><img src="Archivos/<?= $photo2var ?>" alt=""/></a></li>
		<li><a href="#img3"><img src="Archivos/<?= $photo3var ?>" alt=""/></a></li>
		<li><a href="#img4"><img src="Archivos/<?= $photo4var ?>" alt=""/></a></li>
	</ul>

	<div class="modal" id="img1">
		<h3>Foto 1</h3>
		<div class="imagen">
			<a href="#img4">&#60;</a>
			<a href="#img2"><img src="Archivos/<?= $photo2var ?>" alt=""/></a>
			<a href="#img2">></a>
		</div>
		<a class="cerrar" href="">X</a>
	</div>
	
	<div class="modal" id="img2">
		<h3>Foto 2</h3>
		<div class="imagen">
			<a href="#img1">&#60;</a>
			<a href="#img3"><img src="Archivos/<?= $photo3var ?>" alt=""/></a>
			<a href="#img3">></a>
		</div>
		<a class="cerrar" href="">X</a>
	</div>
	
	<div class="modal" id="img3">
		<h3>Foto 3</h3>
		<div class="imagen">
			<a href="#img2">&#60;</a>
			<a href="#img4"><img src="Archivos/<?= $photo4var ?>" alt=""/></a>
			<a href="#img4">></a>
		</div>
		<a class="cerrar" href="">X</a>
	</div>
	
	<div class="modal" id="img4">
		<h3>Foto 4</h3>
		<div class="imagen">
			<a href="#img3">&#60;</a>
			<a href="#img1"><img src="Archivos/<?= $photo1var ?>" alt=""/></a>
			<a href="#img1">></a>
		</div>
		<a class="cerrar" href="">X</a>
	</div>

<!------------------------------MODAL-------------------------------------->
<div class="modal fade" id="modalPDF" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <span class="close" data-dismiss="modal" onclick="javascript:limpiarModalFondo();" >&times;</span>
                <h4 class="modal-title" align="center">Modificar PDF</h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group row" align="center">
                        <label>Nombre</label>
                        <input type="hidden" id="input_sia"/>
                        <input type="text" style="width: 350px;" class="form-control" id="input_titulo" name="input_tip_fondo"/>
                    </div>
                    <div class="form-group row" align="center">
                        <label for="cedula">Descripcion</label>
                        <input type="hidden" id="input_id"/>
                        <input type="text" style="width: 350px;" class="form-control" id="input_desc" name="input_tip_fondo"/>
                    </div>
                </form>
                    <div class="row" align="center">
                        <a class="btn btn-success" data-dismiss="modal"git onclick="javascript:modPDF();" ><?= "Modificar" ?></a>
                        <a class="btn btn-danger" data-dismiss="modal"  href="#modalFin" ><?= "Cancelar" ?></a>
                    </div>
            </div>
        </div>
    </div>
</div>

<!--------------------MODAL HECHO POR ALEJANDRO CALDERON------------------------------- -->
<div class="modal fade" id="modalFotos" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <span class="close" data-dismiss="modal">&times;</span>
                    <h4 class="modal-title" align="center">Subir Fotografías asociadas al proyecto</h4>
            </div>
            <div class="modal-body">
<div class="col-lg-5 col-md-5 col-sm-8 col-xs-12">
         <form method="POST" enctype="multipart/form-data" target="basura"  action="mod/admin/proyecto/ajax_subir_photo.php?" >
         <table>
                 <tr>
                     <th colspan="1" style="width:50%">
                         <div id="file_block" class="form-group">
                             <label for="type-file">Primer Foto</label><br>
                             <input id ="vm" type = "hidden" name="vm" value = "<?php echo $view_mode; ?>">
                             <input id ="cod" type = "hidden" name="cod" value = "<?php echo $cod_sia; ?>">
                             <input id="pos" type = "hidden" name="pos" value = "1">
                             <input id="txt_arch_dir1" name="txt_arch_dir1" class="form-control filestyle" type="file" title="Seleccionar Archivo" />
                             <script type="text/javascript">
                                 jQuery(document).ready(function () {
                                     jQuery(":file").filestyle();
                                 });
                             </script>
                             <p class="help-block"></p>
                         </div>
                         <br>
                     </th>
                     <th colspan="1" style="width:50%">
                         <div id="file_block" class="form-group">
                             <label for="type-file">Segunda Foto</label><br>
                             <input id ="cod" type = "hidden" name="cod" value = "<?php echo $cod_sia; ?>">
                             <input id="pos2" type = "hidden" name="pos2" value = "2">
                             <input id="txt_arch_dir2" name="txt_arch_dir2" class="form-control filestyle" type="file" title="Seleccionar Archivo" />
                             <script type="text/javascript">
                                 jQuery(document).ready(function () {
                                     jQuery(":file").filestyle();
                                 });
                             </script>
                             <p class="help-block"></p>
                         </div>
                         <br>

                     </th>
                 </tr>
                 <tr>
                     <th colspan="1" style="width:50%">
                         <div id="file_block" class="form-group">
                             <label for="type-file">Tercer Foto</label><br>
                             <input id ="cod" type = "hidden" name="cod" value = "<?php echo $cod_sia; ?>">
                             <input id="pos3" type = "hidden" name="pos3" value = "3">
                             <input id="txt_arch_dir3" name="txt_arch_dir3" class="form-control filestyle" type="file" title="Seleccionar Archivo" />
                             <script type="text/javascript">
                                 jQuery(document).ready(function () {
                                     jQuery(":file").filestyle();
                                 });
                             </script>
                             <p class="help-block"></p>
                         </div>
                         <br>
                     </th>
                     <th colspan="1" style="width:50%">
                         <div id="file_block" class="form-group">
                             <label for="type-file">Cuarta Foto</label><br>
                             <input id ="cod" type = "hidden" name="cod" value = "<?php echo $cod_sia; ?>">
                             <input id="pos4" type = "hidden" name="pos4" value = "4">
                             <input id="txt_arch_dir4" name="txt_arch_dir4" class="form-control filestyle" type="file" title="Seleccionar Archivo" />
                             <script type="text/javascript">
                                 jQuery(document).ready(function () {
                                     jQuery(":file").filestyle();
                                 });
                             </script>
                             <p class="help-block"></p>
                         </div>
                         <br>
                         
                     </th>
                 </tr>
                 <tr>
                     <th colspan="2" style="width:50%">
                         <div class="row" align="center">
                            <input type = "submit" class="form-control filestyle" name = "Submit" value = "Subir fotos" onclick="myFunction()">
                            <script>
                                function myFunction() {
                                jAlert("Recargue la página para mostrar cambios en las imagenes", "");
                                }
                            </script>
                         </div>
                     </th>
                 </tr>
             </table>
         </form>
     </div>
                </div>                     
                     <div class="row" align="center" >
                     </div>
                     <div class="form-group" align="center">
                            <label id="etiqueta"></label>
                     </div>
            </div>
        </div>
    </div>
<!--------------------------------------------------------------------------------------->
<iframe id="basura" name="basura" style="display:none"> </iframe>
