<?php
include("../../login/check.php");
include("../../../inc/db/db.php");

/**
 * Realiza las transacciones a la base de datos por medio de funciones y procedimientos almacenados
 * obtiene los datos provenientes del values send de javascript
 * se envia un 0 como respuesta si la operación es exitosa
 */

$miem_cod_sia = $_GET['miem_cod_sia'];
$miem_ced = $_GET['miem_ced'];
$miem_nombre = $_GET['miem_nombre'];
$miem_telefono = $_GET['miem_telefono'];
$tipo_tel = $_GET['tipo_tel'];
$miem_email = $_GET['miem_email'];
$t_miem = $_GET['t_miem'];
$miem_jornada = $_GET['miem_jornada'];
$sql_a = "CALL insert_miem('$miem_ced','$miem_nombre','$miem_telefono','$tipo_tel','$miem_email','$miem_cod_sia','$t_miem','$miem_jornada',@res);";
$sql_b = "SELECT @res as res;";
$res = transaccion_verificada($sql_a, $sql_b);

echo $res[0]['res'];
?>

