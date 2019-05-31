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
    $nom_file = $_POST['txt_arch_nom'];
    $_FILES[$_POST['txt_arch_dir']]['name'] = $nom_file;
    if (move_uploaded_file($_FILES ['txt_arch_dir']['tmp_name'], $dir_name . $nom_file)) {
        echo 1; //El archivo se subio con exito
    } else {
        echo 2; //Error subiendo el archivo
    }
} else if ($_GET) {
    $archvo_cargado = $dir_name . $_GET['txt_arch_nom'];
    if (file_exists($archvo_cargado)) {
        echo 3; //El archivo ya esta en el directorio
    } else {
        echo 4; //El archivo aun esta subiendose
    }
}
?>