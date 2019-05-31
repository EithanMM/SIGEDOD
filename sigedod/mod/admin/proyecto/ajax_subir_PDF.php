<?php
/**
 * Realiza las transacciones a la base de datos por medio de funciones y procedimientos almacenados
 * obtiene los datos por medio de POST
 * se sube el archivo al servidor y se guarda su información a la base de datos
 */

include("../../../functions.php");
include("../../login/check.php");
if (isset($_POST['subir'])) {
    $nombre = $_FILES['archivo']['name'];
    $tipo = $_FILES['archivo']['type'];
    $tamanio = $_FILES['archivo']['size'];
    $ruta = $_FILES['archivo']['tmp_name'];
    $destino = "../../../Archivos/" . $nombre;
     if ($nombre != "") {
        if (copy($ruta, $destino)) {
            $titulo= $_POST['titulo'];
            $descri= $_POST['descripcion'];
            $id_cod_sia1 = $_POST['input_cod_sia'];
            $sql ="CALL insert_pdf('$titulo','$descri','$tamanio','$tipo','$nombre','$id_cod_sia1',@res);";
            $sql_b = "SELECT @res as res;";
            $res = transaccion_verificada($sql, $sql_b);
            if($res[0]['res']==0){
                echo "Se guardo correctamente";
            }
        } else {
            echo  "Error";
        }
    }
}
?>