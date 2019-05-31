<?php header('Content-Type:application/json');
$conexion= new CONEXION("mysql:dbname=base;host:127.0.0.1","root","");

//seleccionar eventos del calendario

$sentenciaSQL= $conexion->prepare("SELECT * FROM sis_proy_even");
$sentenciaSQL->execute();

$resultado=$sentenciaSQL->fetchAll(CONEXION::FETCH_ASSOC);
echo json_encode($resultado);
?>

