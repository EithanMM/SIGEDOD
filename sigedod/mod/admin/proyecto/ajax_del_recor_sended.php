<?php

include("../../login/check.php");
include("../../../inc/db/db.php");
include 'ScheduleEmails.php';
/**
 * Realiza las transacciones a la base de datos por medio de funciones y procedimientos almacenados
 * obtiene los datos provenientes del values send de javascript
 * se envia un 0 como respuesta si la operación es exitosa
 */
function delReco($nmb) {

$sql_a = "CALL delete_recor('$nmb',@res);";
$sql_b = "SELECT @res as res;";
//echo $sql_a.$sql_b;
$res = transaccion_verificada($sql_a, $sql_b);


echo $res[0]['res'];
}
?>