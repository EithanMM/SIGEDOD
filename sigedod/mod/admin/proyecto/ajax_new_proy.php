<?php

include("../../login/check.php");
include("../../../inc/db/db.php");

/**
 * Realiza las transacciones a la base de datos por medio de funciones y procedimientos almacenados
 * obtiene los datos provenientes del values send de javascript
 * se envia un 0 como respuesta si la operación es exitosa
 */

$nom_proyecto = $_GET['nom_proyecto'];
$cod_banner = $_GET['cod_banner'];
$cod_sia= $_GET['cod_sia'];
$fondo = $_GET['input_tip_fondo'];
$ent_admi = $_GET['ent_admi'];
$num_cuenta = $_GET['num_cuenta'];
$fech_ini = $_GET['fech_ini'];
$fech_fin = $_GET['fech_fin'];
$Estados= $_GET['Estados'];
$sql_a = "CALL insert_proy('$cod_sia','$nom_proyecto','$cod_banner','$ent_admi','$num_cuenta','$fech_ini','$fech_fin','$Estados',@res);";
$sql_b = "SELECT @res as res;";
//echo $sql_a.$sql_b;
$res = transaccion_verificada($sql_a, $sql_b);
if($res[0]['res']==0){
    $sql_a1 = "CALL insert_fondo('$fondo','$cod_sia',@res);";
    $sql_b1 = "SELECT @res as res;";
    $res1 = transaccion_verificada($sql_a1, $sql_b1);
}

// ************** Registro en bitacora  ************** //

// ************** Resgistro en bitacora ************** //

echo $res[0]['res'];
?>