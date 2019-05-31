<?php

//include("../login/check.php");
include("../../../inc/db/db.php");
/**
 * Este archivo sirve para subir y verificar que el archivo se enviara de forma
 * correcta en el servidor.
 * Por medio de javascript se fuerza a que el submit realice el POST esto sube
 * el archivo que se encuentra en el formulario.
 * 
 * Posteriormente por medio de AJAX se hace una llamada GET recursiva
 * que pregunta cada 1500 milisegundos si el archivo ya esta almacenado en la 
 * carpeta correspondiente.
 */
$dir_name = "../../../tmp/";
if ($_POST) {
    $nom_file1 = $_POST['txt_pic1'];
//    $nom_file2 = $_POST['txt_pic2'];
//    $nom_file3 = $_POST['txt_pic3'];
//    $nom_file4 = $_POST['txt_pic4'];
//    $nom_file5 = $_POST['txt_pic5'];
//    $_FILES[$_POST['txt_pic1']]['name'] = $nom_file1;
//    $_FILES[$_POST['txt_pic2']]['name'] = $nom_file2;
//    $_FILES[$_POST['txt_pic3']]['name'] = $nom_file3;
//    $_FILES[$_POST['txt_pic4']]['name'] = $nom_file4;
//    $_FILES[$_POST['txt_pic5']]['name'] = $nom_file5;
    if (move_uploaded_file($_FILES ['txt_pic1']['tmp_name'], $dir_name . $nom_file1)) {
        echo 1; //El archivo se subio con exito
    } else {
        echo 2; //Error subiendo el archivo
    }
//    if (move_uploaded_file($_FILES ['txt_pic2']['tmp_name'], $dir_name . $nom_file2)) {
//        echo 1; //El archivo se subio con exito
//    } else {
//        echo 2; //Error subiendo el archivo
//    }
//    if (move_uploaded_file($_FILES ['txt_pic3']['tmp_name'], $dir_name . $nom_file3)) {
//        echo 1; //El archivo se subio con exito
//    } else {
//        echo 2; //Error subiendo el archivo
//    }
//    if (move_uploaded_file($_FILES ['txt_pic4']['tmp_name'], $dir_name . $nom_file4)) {
//        echo 1; //El archivo se subio con exito
//    } else {
//        echo 2; //Error subiendo el archivo
//    }
//    if (move_uploaded_file($_FILES ['txt_pic5']['tmp_name'], $dir_name . $nom_file5)) {
//        echo 1; //El archivo se subio con exito
//    } else {
//        echo 2; //Error subiendo el archivo
//    }
} else if ($_GET) {
    $archvo_cargado = $dir_name . $_GET['txt_pic1'];
    if (file_exists($archvo_cargado)) {
        echo 3; //El archivo ya esta en el directorio
    } else {
        echo 4; //El archivo aun esta subiendose
    }
//     $archvo_cargado = $dir_name . $_GET['txt_pic2'];
//    if (file_exists($archvo_cargado)) {
//        echo 3; //El archivo ya esta en el directorio
//    } else {
//        echo 4; //El archivo aun esta subiendose
//    }
//     $archvo_cargado = $dir_name . $_GET['txt_pic3'];
//    if (file_exists($archvo_cargado)) {
//        echo 3; //El archivo ya esta en el directorio
//    } else {
//        echo 4; //El archivo aun esta subiendose
//    }
//     $archvo_cargado = $dir_name . $_GET['txt_pic4'];
//    if (file_exists($archvo_cargado)) {
//        echo 3; //El archivo ya esta en el directorio
//    } else {
//        echo 4; //El archivo aun esta subiendose
//    }
//     $archvo_cargado = $dir_name . $_GET['txt_pic5'];
//    if (file_exists($archvo_cargado)) {
//        echo 3; //El archivo ya esta en el directorio
//    } else {
//        echo 4; //El archivo aun esta subiendose
//    }
}
?>