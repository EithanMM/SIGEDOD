<?php
include("mod/login/check.php");
require 'functions.php';
include('includes.php');
$vocab = $mySessionController->getVar("vocab");
$user_rol = $mySessionController->getVar("rol");
 /*$sAjaxSource = $mySessionController->getVar('cds_domain') . $mySessionController->getVar('cds_locate') . 'mod/admin/users/ajax_list_user.php'; */
/*$sAjaxSource se va a utilizar cuando ya el ajax de listar proyectos este lista*/
?>

<div class="well well-sm"><h1>Lista de Proyectos</h1></div>
<!--Aqui va un script para cargar la informacion de los proyectos desde la BD-->






<div class="dataTables_wrapper form-inline dt-bootstrap">
    <table id="lista_proyectos" cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered dataTable" >
        <thead> <!--ENCABEZADO-->
            <tr>
                <th width="10%"><?= "Nombre Proyecto" ?></th>
                <th width="10%"><?= "Nombre Proyecto" ?></th>
                <th width="10%"><?= "Nombre Proyecto" ?></th>
            </tr>
        </thead>
    </table>
</div>



