
<?php
include("../../login/check.php");
include("../../../functions.php");
$vocab = $mySessionController->getVar("vocab");
$user_rol = $mySessionController->getVar("rol");
$sAjaxSource = $mySessionController->getVar('cds_domain') . $mySessionController->getVar('cds_locate') . 'mod/admin/proyecto/ajax_listarReportePproy.php';

?>

<div class="well well-sm"><h1>Lista de proyectos para generar reportes</h1></div>
<?php if($user_rol == 4){ ?>

<script type="text/javascript" charset="utf-8">
    var asInitVals = new Array();   //Se utiliza para almacenar la llave del filtro para cada columna.
    jQuery(document).ready(function () {
        var oTable = jQuery('#lista_proyectos').dataTable({
        //"sPaginationType": "full_numbers",
         "bProcessing": true,
         "bServerSide": true,
         "aoColumns": [
            null,
            null
        <?php if (check_permiso($mod4, $act6, $user_rol)) { ?> //mod4 accion generarReporte
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

                    <?php if (check_permiso($mod4, $act6, $user_rol)) { ?>
                        <th><div class="text-center"><i class="fa fa-print fa-2x text-success puntero" title="<?= $vocab["symbol_save"] ?>"></i></div></th>
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
    <?php if($user_rol != 3){ ?>
         <div class="row" align="center">
            <a class="btn btn-warning" name="submit" onclick="javascript:OpcionMenu('mod/admin/proyecto/listar_proyecto.php?', '');"><i class="fa fa-rotate-left"></i><?= $vocab["symbol_return"] ?></a>
        </div>
     <?php } ?> 
    </div>

<?php } else { ?>

<script type="text/javascript" charset="utf-8">
    var asInitVals = new Array();   //Se utiliza para almacenar la llave del filtro para cada columna.
    jQuery(document).ready(function () {
        var oTable = jQuery('#lista_proyectos').dataTable({
        //"sPaginationType": "full_numbers",
         "bProcessing": true,
         "bServerSide": true,
         "aoColumns": [
            null,
            null
        <?php if (check_permiso($mod2, $act6, $user_rol)) { ?> //mod4 accion generarReporte
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

                    <?php if (check_permiso($mod2, $act6, $user_rol)) { ?>
                        <th><div class="text-center"><i class="fa fa-print fa-2x text-success puntero" title="<?= $vocab["symbol_save"] ?>"></i></div></th>
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
    <?php if($user_rol != 3){ ?>
         <div class="row" align="center">
            <a class="btn btn-warning" name="submit" onclick="javascript:OpcionMenu('mod/admin/proyecto/listar_proyecto.php?', '');"><i class="fa fa-rotate-left"></i><?= $vocab["symbol_return"] ?></a>
        </div>
     <?php } ?> 
    </div>

<?php  }?>
