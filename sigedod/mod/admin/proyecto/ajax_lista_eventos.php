<?php

//include("../../login/check.php");
include("../../../inc/db/bdcommon.inc");

    $aColumns= array('pos','title','descripcion','start','end','color'); //Columnas de la base de datos
    $conn = mysqli_connect($db_host, $usuario, $clave, $db);
    mysqli_set_charset($conn, "utf8");
    $sTable = "SELECT DISTINCT id_even, title,descripcion,start,end,color FROM sis_proy_even"; //Escriba el nombre de la tabla a consultar
    $result = mysqli_query($conn, $sTable); // Obtenemos data del sis_tipo_fondo
    $data = array(); //preparamos un array para meter los datos
    /*METODO*/
    while($row = mysqli_fetch_assoc($result)){
        $data[] = $row;
    }
    
    /*RETORNANDO LA RESPUESTA A JSON*/
    echo json_encode($data); //hacemos JSON el array
    
?>
