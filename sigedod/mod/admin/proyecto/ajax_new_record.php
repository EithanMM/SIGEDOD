<?php

include("../../login/check.php");
include("../../../inc/db/db.php");

/**
 * Realiza las transacciones a la base de datos por medio de funciones y procedimientos almacenados
 * obtiene los datos provenientes del values send de javascript
 * se envia un 0 como respuesta si la operación es exitosa
 */

$nom_proyecto = $_GET['nombre'];
$subject = $_GET['subject'];
$email = $_GET['email'];
$fech = $_GET['fech'];
$body = $_GET['body'];
$sql_a = "CALL insert_reco('$nom_proyecto','$subject','$email','$body','$fech',@res);";
$sql_b = "SELECT @res as res;";
//echo $sql_a.$sql_b;
$res = transaccion_verificada($sql_a, $sql_b);


echo $res[0]['res'];
?>