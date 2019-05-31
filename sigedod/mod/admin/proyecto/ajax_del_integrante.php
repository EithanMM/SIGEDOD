<?php
include("../../login/check.php");
include("../../../inc/db/db.php");

/**
 * Realiza las transacciones a la base de datos por medio de funciones y procedimientos almacenados
 * obtiene los datos provenientes del values send de javascript
 * se envia un 0 como respuesta si la operación es exitosa
 */

$ced_id = $_GET['ced_id'];
$cod_sia = $_GET['cod_sia'];
$sql_a = "CALL delete_miem('$ced_id','$cod_sia',@res);";
$sql_b = "SELECT @res as res;";
$res = transaccion_verificada($sql_a, $sql_b);
echo $res[0]['res'];
?>

