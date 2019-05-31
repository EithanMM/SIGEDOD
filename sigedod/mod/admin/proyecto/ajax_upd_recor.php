<?php

include("../../login/check.php");
include("../../../inc/db/db.php");

/**
 * Realiza las transacciones a la base de datos por medio de funciones y procedimientos almacenados
 * obtiene los datos provenientes del values send de javascript
 * se envia un 0 como respuesta si la operación es exitosa
 */

$nom_proyecto = $_GET['nom_proyecto'];
$subject = $_GET['subject'];
$email= $_GET['email'];
$body = $_GET['body'];
$fech_ini = $_GET['fech_ini'];
$sql_a = "CALL 	update_recor('$nom_proyecto','$subject','$email','$body','$fech_ini',@res);";
$sql_b = "SELECT @res as res;";
//echo $sql_a.$sql_b;
$res = transaccion_verificada($sql_a, $sql_b);

echo $res[0]['res'];
?>