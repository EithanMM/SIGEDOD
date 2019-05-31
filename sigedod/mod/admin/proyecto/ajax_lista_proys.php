
<?php

include("../../login/check.php");
include("../../../inc/db/bdcommon.inc");
$cod_sia = $_GET['Nom_Proy'];

    $aColumns= array('pos','tipo'); //Columnas de la base de datos
    $conn = mysqli_connect($db_host, $usuario, $clave, $db);
    $sTable = "SELECT DISTINCT Cod_SIA FROM sis_proy_inv where Nom_Proy = $cod_sia"; //Escriba el nombre de la tabla a consultar
    $result = mysqli_query($conn, $sTable); // Obtenemos data del sis_tipo_fondo
    $data = array(); //preparamos un array para meter los datos
    
    /*METODO*/
    while($row = mysqli_fetch_assoc($result)){
        $data[] = $row;
    }
    
    /*RETORNANDO LA RESPUESTA A JSON*/
    echo json_encode($data); //hacemos JSON el array
    
?>

