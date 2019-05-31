<?php
include("../../login/check.php");
include("../../../inc/db/db.php");

/**
 * Realiza las transacciones a la base de datos por medio de funciones y procedimientos almacenados
 * obtiene los datos provenientes del values send de javascript
 * se envia un 0 como respuesta si la operación es exitosa
 */

$tipo_fondo = $_GET['input_tip_fondo'];
$cod_SIA = $_GET['cod_sia'];

$sql_a = "CALL insert_fondo('$tipo_fondo','$cod_SIA',@res);";
$sql_b = "SELECT @res as res;";
$res = transaccion_verificada($sql_a, $sql_b);

echo $res[0]['res'];
?>