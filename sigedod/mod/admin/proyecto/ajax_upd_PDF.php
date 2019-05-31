<?php

include("../../login/check.php");
include("../../../functions.php");

/**
 * Realiza las transacciones a la base de datos por medio de funciones y procedimientos almacenados
 * obtiene los datos provenientes del values send de javascript
 * se envia un 0 como respuesta si la operación es exitosa
 */
$titulo = $_GET['titulo'];
$desc = $_GET['desc'];
$id = $_GET['id'];

$sql_a = "CALL update_pdf('$id','$titulo','$desc',@res);";
$sql_b = "SELECT @res as res;";
$res = transaccion_verificada($sql_a, $sql_b);
echo $res[0]['res'];
?>

