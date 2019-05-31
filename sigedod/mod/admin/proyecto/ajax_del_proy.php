<?php

include("../../login/check.php");
include("../../../inc/db/db.php");
/**
 * Realiza las transacciones a la base de datos por medio de funciones y procedimientos almacenados
 * obtiene los datos provenientes del values send de javascript
 * se envia un 0 como respuesta si la operación es exitosa
 */
$archivo = "../../../Archivos/";
$cod_sia = $_GET['cod_sia'];
$sql="SELECT nombre_archivo from sis_pdf_proy WHERE cod_sia='$cod_sia';";
$res1=seleccion($sql);
$sql1="SELECT count(*) from sis_pdf_proy where cod_sia='$cod_sia';";
$res2=seleccion($sql1);

for ($i = 0; $i < $res2[0]['count(*)']; $i++){
    unlink($archivo.$res1[$i]['nombre_archivo']);
}

$sq12="SELECT file from sis_pic_proy WHERE cod_sia='$cod_sia';";
$res3=seleccion($sq12);
$sql3="SELECT count(*) from sis_pic_proy where cod_sia='$cod_sia';";
$res4=seleccion($sql3);

for ($j = 0; $j < $res4[0]['count(*)']; $j++){
    unlink($archivo.$res3[$j]['file']);
}


$sql_a = "CALL delete_proy('$cod_sia',@res);";
$sql_b = "SELECT @res as res;";
//echo $sql_a.$sql_b;
$res = transaccion_verificada($sql_a, $sql_b);

echo $res[0]['res'];
?>