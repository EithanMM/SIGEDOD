<?php
require_once("../../../lib/dompdf/autoload.inc.php");
include("../../../functions.php");
$cod_sia = $_GET['cod_sia'];
$nom_proy =$_GET['nom'];

$sql=sprintf('SELECT *from vis_repor_proy
WHERE Cod_SIA = "%s"', $cod_sia);

$count =sprintf('SELECT COUNT(*) FROM sis_proy_miem WHERE Cod_SIA = "%s"', $cod_sia);
$res2 = seleccion($count); 

$res=seleccion($sql);
$html= "";
$html.='<!DOCTYPE html>';
$html.='<link href="../../../lib/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="../../../inc/css/estilo.css" rel="stylesheet" type="text/css"/>';

$html.='<html>';
$html.='<h2 style="text-align:center;padding-bottom:0px; padding-top:0px;border-top:0px;border-bottom:0px;margin-top:0px;margin-bottom:0px;">Universidad Nacional</h2>'; 
$html.='<h2 style="text-align:center;padding-bottom:0px; padding-top:0px;border-top:0px;border-bottom:0px;margin-top:0px;margin-bottom:0px;">Facultad de Ciencias Exactas y Naturales </h2>';
$html.='<h2 style="text-align:center;padding-bottom:0px; padding-top:0px;border-top:0px;border-bottom:0px;margin-top:0px;margin-bottom:0px;">Escuela de Informática </h2>';
$html.='<h2 style="text-align:center;padding-bottom:0px; padding-top:0px;border-top:0px;border-bottom:0px;margin-top:0px;margin-bottom:0px;"></h2>';
$html.='<br>';
$html.='<style>';
$html.='table, th, td { border: 1px solid black; border-collapse: collapse; width:95%; }';
$html.='</style>';
$html.='<h2>Proyecto:'.' '.'"'. $res[0]['Nom_Proy'].'"'.'</h2>';
$html.='<table style= align="left">';
$html.='<tr>';
$html.='<th width="11%"><font size="2">Nombre Proyecto</font></th>';
$html.='<th width="3%"><font size="2">Código SIA</font></th>';
$html.='<th width="3%"><font size="2">Código Banner</font></th>';
$html.='<th width="3%"><font size="2">Entidad Administradora</font></th>';
$html.='<th width="3%"><font size="2">Número Cuenta</font></th>';
$html.='<th width="3%"><font size="2">Fecha Inicio</font></th>';
$html.='<th width="3%"><font size="2">Fecha Final</font></th>';
$html.='<th width="3%"><font size="2">Estado</font></th>';
$html.='</tr>';
$html.='<tr>';
$html.= '<th><font size="2">'.$res[0]['Nom_Proy'].'</font></th>';
$html.= '<th><font size="2">'.$cod_sia.'</font></th>';
$html.= '<th><font size="2">'.$res[0]['Cod_Ban'].'</font></th>';
$html.= '<th><font size="2">'.$res[0]['Ent_Ad'].'</font></th>';
$html.= '<th><font size="2">'.$res[0]['Num_Cue'].'</font></th>';
$html.= '<th><font size="2">'.$res[0]['Fech_Ini'].'</font></th>';
$html.= '<th><font size="2">'.$res[0]['Fech_Fin'].'</font></th>';
$html.= '<th><font size="2">'.$res[0]['Estado'].'</font></th>';
$html.='</tr>';
$html.='</table>';

$html.='<h3>Integrantes</h3>';
$html.='<table style= align="left">';
$html.='<tr>';
$html.='<th width="11%"><font size="2">Cédula</font></th>';
$html.='<th width="11%"><font size="2">Nombre</font></th>';
$html.='<th width="11%"><font size="2">Jornada</font></th>';
$html.='<th width="11%"><font size="2">Tipo</font></th>';
$html.='</tr>';
for ($i = 0; $i < $res2[0]['COUNT(*)']; $i++) {
$html.='<tr>';
    $html.= '<th><font size="2">'.$res[$i]['Ced'].'</font></th>';
    $html.= '<th><font size="2">'.$res[$i]['Nom_Miem'].'</font></th>';
    $html.= '<th><font size="2">'.$res[$i]['Jornada'].'</font></th>';
    $html.= '<th><font size="2">'.$res[$i]['T_miembro'].'</font></th>';
$html.='</tr>';
}
$html.='</table>';
$html.='</html>';


use Dompdf\Dompdf;
$dompdf = new Dompdf();
$dompdf->load_html($html);
$dompdf->render();
$filename= "Reporte '$nom_proy'.pdf";
$dompdf->stream($filename, array("Attachment" => false));
?>