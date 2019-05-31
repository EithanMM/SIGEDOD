<?php
include("../../login/check.php");
include("../../../functions.php");

$ced_miem = $_GET['ced_miem'];
$t_miem = $_GET['t_miem'];
$miem_jornada = $_GET['miem_jornada'];
$sql_a = "CALL update_miem('$ced_miem','$t_miem','$miem_jornada',@res);";
$sql_b = "SELECT @res as res;";
$res = transaccion_verificada($sql_a, $sql_b);

echo $res[0]['res'];
?>


