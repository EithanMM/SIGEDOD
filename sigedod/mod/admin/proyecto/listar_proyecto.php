
<?php
include("../../login/check.php");
include("../../../functions.php");
$vocab = $mySessionController->getVar("vocab");
$user_rol = $mySessionController->getVar("rol");
$sAjaxSource = $mySessionController->getVar('cds_domain') . $mySessionController->getVar('cds_locate') . 'mod/admin/proyecto/ajax_listar_proyecto.php';

?>

<div class="well well-sm"><h1>Lista de proyectos</h1></div>

<?php if($user_rol == 4 ){ ?>
<!-- si esta en rol de proyectos, y es una secretaria -->

<script type="text/javascript" charset="utf-8">
    var asInitVals = new Array();   //Se utiliza para almacenar la llave del filtro para cada columna.
    jQuery(document).ready(function () {
        var oTable = jQuery('#lista_proyectos').dataTable({
        //"sPaginationType": "full_numbers",
         "bProcessing": true,
         "bServerSide": true,
         "aoColumns": [
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            null
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
        <table id="lista_proyectos" cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered dataTable" >
            <thead>
                <tr>
                    
                    <th >Código SIA</th>
                    <th >Nombre Proyecto</th>
                    <th >Código Banner</th>
                    <th >Entidad Administradora</th>
                    <th >Número Cuenta</th>
                    <th >Fecha Inicio</th>
                    <th >Fecha Final</th>
                    <th >Estado</th>

                    <?php if (check_permiso($mod4, $act1, $user_rol)) { ?>
                        <th><div class="text-center"><i class="fa fa-eye fa-2x text-primary puntero" title="<?= $vocab["symbol_view"] ?>"></i></div></th>
                    <?php } ?>
                    <?php if (check_permiso($mod4, $act4, $user_rol)) { ?>
                        <th><div class="text-center"><i class="fa fa-pencil fa-2x text-success puntero" title="<?= $vocab["symbol_edit"] ?>"></i></div></th>
                    <?php } ?>
                    <?php if (check_permiso($mod4, $act5, $user_rol)) { ?>
                        <th><div class="text-center"><i class="fa fa-close fa-2x text-danger puntero" title="<?= $vocab["symbol_delete"] ?>"></i></div></th>
                    <?php } ?>                       
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="11" class="dataTables_empty"><?= $vocab["symbol_loading"] ?></td>
                </tr>
            </tbody>
        </table>
    <?php if($user_rol != 3){ ?>
         <div class="row" align="center">
         <a class="btn btn-success" name="submit" onclick="javascript:OpcionMenu('mod/admin/proyecto/agregar_proyecto.php?', '');"><i class="fa fa-save fa-inverse"></i> <?= "Agregar". " " . "Proyecto" ?></a>
        </div>
     <?php } ?> 
    </div>

<?php } else { ?>
<!--Si es cualqueir otra cosa -->
<script type="text/javascript" charset="utf-8">
    var asInitVals = new Array();   //Se utiliza para almacenar la llave del filtro para cada columna.
    jQuery(document).ready(function () {
        var oTable = jQuery('#lista_proyectos').dataTable({
        //"sPaginationType": "full_numbers",
         "bProcessing": true,
         "bServerSide": true,
         "aoColumns": [
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            null
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
        <table id="lista_proyectos" cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered dataTable" >
            <thead>
                <tr>
                    
                    <th >Código SIA</th>
                    <th >Nombre Proyecto</th>
                    <th >Código Banner</th>
                    <th >Entidad Administradora</th>
                    <th >Número Cuenta</th>
                    <th >Fecha Inicio</th>
                    <th >Fecha Final</th>
                    <th >Estado</th>

                    <?php if (check_permiso($mod3, $act1, $user_rol)) { ?>
                        <th><div class="text-center"><i class="fa fa-eye fa-2x text-primary puntero" title="<?= $vocab["symbol_view"] ?>"></i></div></th>
                    <?php } ?>
                    <?php if (check_permiso($mod3, $act4, $user_rol)) { ?>
                        <th><div class="text-center"><i class="fa fa-pencil fa-2x text-success puntero" title="<?= $vocab["symbol_edit"] ?>"></i></div></th>
                    <?php } ?>
                    <?php if (check_permiso($mod3, $act5, $user_rol)) { ?>
                        <th><div class="text-center"><i class="fa fa-close fa-2x text-danger puntero" title="<?= $vocab["symbol_delete"] ?>"></i></div></th>
                    <?php } ?>                       
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="11" class="dataTables_empty"><?= $vocab["symbol_loading"] ?></td>
                </tr>
            </tbody>
        </table>
    <?php if($user_rol != 3){ ?>
         <div class="row" align="center">
         <a class="btn btn-success" name="submit" onclick="javascript:OpcionMenu('mod/admin/proyecto/agregar_proyecto.php?', '');"><i class="fa fa-save fa-inverse"></i> <?= "Agregar". " " . "Proyecto" ?></a>
        </div>
     <?php } ?> 
    </div>
<?php } ?> 