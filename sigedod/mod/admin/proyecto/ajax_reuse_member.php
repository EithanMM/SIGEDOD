<?php

include("../../login/check.php");
include("../../../functions.php");


$miem_cod_sia = $_GET['miem_cod_sia'];
$miem_ced = $_GET['miem_ced'];
$t_miem = $_GET['t_miem'];
$miem_jornada = $_GET['miem_jornada'];

$sql_a = "CALL reuse_user('$miem_ced','$miem_cod_sia','$t_miem','$miem_jornada',@res);";
$sql_b = "SELECT @res as res;";
$res = transaccion_verificada($sql_a, $sql_b);
echo $res[0]['res'];
?>

