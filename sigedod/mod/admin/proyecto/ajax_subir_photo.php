<?php
/**
 * Realiza las transacciones a la base de datos por medio de funciones y procedimientos almacenados
 * obtiene los datos por medio de POST
 * se sube el archivo al servidor y se guarda su información a la base de datos
 */

include("../../../functions.php");
include("../../login/check.php");
$nombre1 = $_FILES['txt_arch_dir1']['name'];
if($nombre1 != ""){
$vm = $_POST['vm'];
$cod = $_POST['cod'];
$pos = $_POST['pos'];
$tipo = $_FILES['txt_arch_dir1']['type'];
$tamanio = $_FILES['txt_arch_dir1']['size'];
$ruta = $_FILES['txt_arch_dir1']['tmp_name'];
$destino = "../../../Archivos/" . $nombre1;
$sql2 = "select * from sis_pic_proy  where cod_sia = '$cod' and pos = '$pos'";
$conn = mysqli_connect("localhost", "root", "root", "base");
$result = mysqli_query($conn, $sql2); // Obtenemos data del sis_tipo_fondo
$row_cnt = $result->num_rows;
if($row_cnt == 0){
    if ($nombre1 != "") {
        if (copy($ruta, $destino)) {
            $sql ="CALL insert_sis_proy_pic('$pos','$nombre1','$cod',@res);";
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
else{
     if ($nombre1 != "") {
        if (copy($ruta, $destino)) {
            $sql ="CALL update_pics('$pos','$nombre1','$cod',@res);";
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
}
//*********************************************************************************************
$nombre2 = $_FILES['txt_arch_dir2']['name'];
if($nombre2 != ""){

$pos2 = $_POST['pos2'];
$cod = $_POST['cod'];
$tipo = $_FILES['txt_arch_dir2']['type'];
$tamanio = $_FILES['txt_arch_dir2']['size'];
$ruta = $_FILES['txt_arch_dir2']['tmp_name'];
$destino = "../../../Archivos/" . $nombre2;
$sql2 = "select * from sis_pic_proy  where cod_sia = '$cod' and pos = '$pos2'";
$conn = mysqli_connect("localhost", "root", "root", "base");
$result = mysqli_query($conn, $sql2); // Obtenemos data del sis_tipo_fondo
$row_cnt = $result->num_rows;
if($row_cnt == 0){
    if ($nombre2 != "") {
        if (copy($ruta, $destino)) {
            $sql ="CALL insert_sis_proy_pic('$pos2','$nombre2','$cod',@res);";
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
else{
     if ($nombre2 != "") {
        if (copy($ruta, $destino)) {
            $sql ="CALL update_pics('$pos2','$nombre2','$cod',@res);";
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
}
//*********************************************************************************************
$nombre3 = $_FILES['txt_arch_dir3']['name'];
if($nombre3 != ""){

$pos3 = $_POST['pos3'];
$cod = $_POST['cod'];
$tipo = $_FILES['txt_arch_dir3']['type'];
$tamanio = $_FILES['txt_arch_dir3']['size'];
$ruta = $_FILES['txt_arch_dir3']['tmp_name'];
$destino = "../../../Archivos/" . $nombre3;
$sql2 = "select * from sis_pic_proy  where cod_sia = '$cod' and pos = '$pos3'";
$conn = mysqli_connect("localhost", "root", "root", "base");
$result = mysqli_query($conn, $sql2); // Obtenemos data del sis_tipo_fondo
$row_cnt = $result->num_rows;
if($row_cnt == 0){
    if ($nombre3 != "") {
        if (copy($ruta, $destino)) {
            $sql ="CALL insert_sis_proy_pic('$pos3','$nombre3','$cod',@res);";
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
else{
     if ($nombre3 != "") {
        if (copy($ruta, $destino)) {
            $sql ="CALL update_pics('$pos3','$nombre3','$cod',@res);";
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
}
//*********************************************************************************************
$nombre4 = $_FILES['txt_arch_dir4']['name'];
if($nombre4 != ""){

$pos4 = $_POST['pos4'];
$cod = $_POST['cod'];
$tipo = $_FILES['txt_arch_dir4']['type'];
$tamanio = $_FILES['txt_arch_dir4']['size'];
$ruta = $_FILES['txt_arch_dir4']['tmp_name'];
$destino = "../../../Archivos/" . $nombre4;
$sql2 = "select * from sis_pic_proy  where cod_sia = '$cod' and pos = '$pos4'";
$conn = mysqli_connect("localhost", "root", "root", "base");
$result = mysqli_query($conn, $sql2); // Obtenemos data del sis_tipo_fondo
$row_cnt = $result->num_rows;
if($row_cnt == 0){
    if ($nombre4 != "") {
        if (copy($ruta, $destino)) {
            $sql ="CALL insert_sis_proy_pic('$pos4','$nombre4','$cod',@res);";
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
else{
     if ($nombre4 != "") {
        if (copy($ruta, $destino)) {
            $sql ="CALL update_pics('$pos4','$nombre4','$cod',@res);";
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
}
?>