<?php

include("../../login/check.php");
include("../../../inc/db/db.php");

/**
 * Realiza las transacciones a la base de datos por medio de funciones y procedimientos almacenados
 * obtiene los datos provenientes del values send de javascript
 * se envia un 0 como respuesta si la operación es exitosa
 */

$nom_proyecto = $_GET['nom_proyecto'];
$cod_banner = $_GET['cod_banner'];
$cod_sia= $_GET['cod_sia'];
$ent_admi = $_GET['ent_admi'];
$num_cuenta = $_GET['num_cuenta'];
$fech_ini = $_GET['fech_ini'];
$fech_fin = $_GET['fech_fin'];
$tipo = $_GET['tipo'];
$estado=$_GET['Estado'];
$prorroga = $_GET['prorroga'];
$sql_a = "CALL update_proy('$cod_sia','$nom_proyecto','$cod_banner','$ent_admi','$num_cuenta',str_to_date('$fech_ini', '%Y-%m-%d'),str_to_date('$fech_fin', '%Y-%m-%d'),'$tipo','$prorroga','$estado',@res);";
$sql_b = "SELECT @res as res;";
//echo $sql_a.$sql_b;
$res = transaccion_verificada($sql_a, $sql_b);

// ************** Registro en bitacora  ************** //
if ($res[0]['res'] == 0) {
    $user = $mySessionController->getVar("usuario");
    $sql_log = "CALL insert_log('$user','$sql_a',@res);";
    $res_log = transaccion($sql_log);
}
// ************** Resgistro en bitacora ************** //

echo $res[0]['res'];
?>