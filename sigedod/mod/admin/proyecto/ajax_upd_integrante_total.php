<?php
include("../../login/check.php");
include("../../../functions.php");
/**
 * Realiza las transacciones a la base de datos por medio de funciones y procedimientos almacenados
 * obtiene los datos provenientes del values send de javascript
 * se envia un 0 como respuesta si la operación es exitosa
 */

$ced_miem = $_GET['ced_miem'];
$nom_miem = $_GET['nom_miem'];
$tel_miem = $_GET['tel_miem'];
$tipo_tel = $_GET['tipo_tel'];
$email_miem = $_GET['email_miem'];
//$t_miem = $_GET['t_miem'];
//$miem_jornada = $_GET['miem_jornada'];
$sql_a = "CALL update_miem_tot('$ced_miem','$nom_miem','$tel_miem','$tipo_tel','$email_miem',@res);";
$sql_b = "SELECT @res as res;";
$res = transaccion_verificada($sql_a, $sql_b);

echo $res[0]['res'];
?>

