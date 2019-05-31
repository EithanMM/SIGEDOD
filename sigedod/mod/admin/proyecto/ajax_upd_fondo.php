<?php
 include("../../login/check.php");
include("../../../inc/db/db.php");

/**
 * Realiza las transacciones a la base de datos por medio de funciones y procedimientos almacenados
 * obtiene los datos provenientes del values send de javascript
 * se envia un 0 como respuesta si la operación es exitosa
 */
 
 $old_fondo = $_GET['new_fondo'];
 $new_fondo = $_GET['old_fondo'];
 $cod_sia = $_GET['cod_sia'];
 
 $sql_a = "CALL update_fondo('$old_fondo','$new_fondo','$cod_sia',@res);";
 $sql_b = "SELECT @res as res;";
 $res = transaccion_verificada($sql_a, $sql_b);
 echo $res[0]['res'];
?>

