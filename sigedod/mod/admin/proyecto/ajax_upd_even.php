<?php

include("../../login/check.php");
include("../../../inc/db/db.php");

/**
 * Realiza las transacciones a la base de datos por medio de funciones y procedimientos almacenados
 * obtiene los datos provenientes del values send de javascript
 * se envia un 0 como respuesta si la operación es exitosa
 */

$id_even = $_GET['id'];
$title = $_GET['title'];
$desc = $_GET['desc'];
$fech = $_GET['start'];
$fech2 = $_GET['end'];
$color= $_GET['color'];
$sql_a = "CALL update_even('$id_even','$title','$desc','$fech','$fech2','$color',@res);";
$sql_b = "SELECT @res as res;";
//echo $sql_a.$sql_b;
$res = transaccion_verificada($sql_a, $sql_b);


echo $res[0]['res'];
?>