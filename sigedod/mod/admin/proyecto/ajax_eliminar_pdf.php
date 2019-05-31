<?php
include("../../login/check.php");
include("../../../functions.php");

/**
 * Realiza las transacciones a la base de datos por medio de funciones y procedimientos almacenados
 * obtiene los datos provenientes del values send de javascript
 * se envia un 0 como respuesta si la operación es exitosa
 */
$id = $_GET['id'];
$cod = $_GET['cod'];
$nom = $_GET['nom'];
$archivo = "../../../Archivos/";
unlink($archivo.$nom);
$sql_a = "CALL delete_pdf('$id',@res);";
$sql_b = "SELECT @res as res;";
$res = transaccion_verificada($sql_a, $sql_b);
echo $res[0]['res'];
?>