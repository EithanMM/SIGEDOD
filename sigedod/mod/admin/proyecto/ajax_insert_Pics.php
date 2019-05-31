<?php

include("../../login/check.php");
include("../../../inc/db/db.php");

$temp_path = "../../../tmp/";
$dir_name = "../../../files/";

$cod_sia= $_GET['cod_sia'];
$archivo1 = $_GET['arch_nom1'];
$archivo2 = $_GET['arch_nom2'];
$archivo3 = $_GET['arch_nom3'];
$archivo4 = $_GET['arch_nom4'];
$archivo5 = $_GET['arch_nom5'];

$correctos = 0;
$error = 0;
$warnning = 0;



$files = "OK";
    // Guarda el Archivo
    if (copy($temp_path . $archivo, $dir_name . $archivo)) { //Mover archivo
        $sql_a = "CALL update_pics($cod_sia,'$archivo1','$archivo2','$archivo3','$archivo4','$archivo5',@res);";
        $sql_b = "SELECT @res as res";
        //echo $sql_a.$sql_b;//DEBUG
        $res = transaccion_verificada($sql_a, $sql_b); //Insersion base de datos
        unlink($temp_path . $archivo1); //Elimina el arhivo de la carpeta temporal
        unlink($temp_path . $archivo2); //Elimina el arhivo de la carpeta temporal
        unlink($temp_path . $archivo3); //Elimina el arhivo de la carpeta temporal
        unlink($temp_path . $archivo4); //Elimina el arhivo de la carpeta temporal
        unlink($temp_path . $archivo5); //Elimina el arhivo de la carpeta temporal
        if ($res[0]['res'] == 0) {
            
        } else if ($res[0]['res'] == 1) {
            $error = 1;
        } else if ($res[0]['res'] == 2) {
            $warnning = 2;
        }
    }else{
        $files = "KO";
    }


if ($files == "OK") {
    echo 0;
} else if ($error == 1) {
    echo 1;
} else if ($warnning == 2) {
    echo 2;
} else {
    echo 3;
}