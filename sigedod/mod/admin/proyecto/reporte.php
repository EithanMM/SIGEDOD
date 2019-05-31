<?php
require_once("../../../lib/dompdf/autoload.inc.php");
include("../../../functions.php");
$sql="SELECT * from sis_proy_inv ORDER BY Cod_SIA DESC";
$res=seleccion($sql);
$sql2="SELECT COUNT(*) from sis_proy_inv";
$res2=seleccion($sql2);
$html= "";
$html.='<!DOCTYPE html>';
$html.='<link href="../../../lib/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="../../../inc/css/estilo.css" rel="stylesheet" type="text/css"/>';

$html.='<html>';
$html.='<h2 style="text-align:center;padding-bottom:0px; padding-top:0px;border-top:0px;border-bottom:0px;margin-top:0px;margin-bottom:0px;">Universidad Nacional</h2>'; 
$html.='<h2 style="text-align:center;padding-bottom:0px; padding-top:0px;border-top:0px;border-bottom:0px;margin-top:0px;margin-bottom:0px;">Facultad de Ciencias Exactas y Naturales </h2>';
$html.='<h2 style="text-align:center;padding-bottom:0px; padding-top:0px;border-top:0px;border-bottom:0px;margin-top:0px;margin-bottom:0px;">Escuela de Informática </h2>';
$html.='<h2 style="text-align:center;padding-bottom:0px; padding-top:0px;border-top:0px;border-bottom:0px;margin-top:0px;margin-bottom:0px;"></h2>';
$html.='<style>';
$html.='table, th, td { border: 1px solid black; border-collapse: collapse; width:105%; }';
$html.='</style>';
$html.='<div class="well"> <h3>Lista de Proyectos </h3></div>';
$html.='<table style="width:95%" align="left">';
$html.='<tr>';
$html.='<th width="11%"><font size="2">Nombre Proyecto</font></th>';
$html.='<th width="11%"><font size="2">Código SIA</font></th>';
$html.='<th width="11%"><font size="2">Código Banner</font></th>';
$html.='<th width="11%"><font size="2">Entidad Administradora</font></th>';
$html.='<th width="11%"><font size="2">Número Cuenta</font></th>';
$html.='<th width="3%"><font size="2">Fecha Inicio</font></th>';
$html.='<th width="3%"><font size="2">Fecha Final</font></th>';
$html.='<th width="5%"><font size="2">Estado</font></th>';
$html.='<th width="8%"><font size="2">Prórroga</font></th>';
$html.='</tr>';
for ($i = 0; $i < $res2[0]['COUNT(*)']; $i++) {
    $html.="<tr>";
    $html.='<th><font size="2">'.$res[$i]['Nom_Proy'].'</font></th>';
    $html.='<th><font size="2">'.$res[$i]['Cod_SIA'].'</font></th>';
    $html.='<th><font size="2">'.$res[$i]['Cod_Ban'].'</font></th>';
    $html.='<th><font size="2">'.$res[$i]['Ent_Ad'].'</font></th>';
    $html.='<th><font size="2">'.$res[$i]['Num_Cue'].'</font></th>';
    $html.='<th><font size="2">'.$res[$i]['Fech_Ini'].'</font></th>';
    $html.='<th><font size="2">'.$res[$i]['Fech_Fin'].'</font></th>';
    $html.='<th><font size="2">'.$res[$i]['Estado'].'</font></th>';
    $html.='<th><font size="2">'.$res[$i]['Prorroga'].'</font></th>';
    $html.="</tr>";
}
$html.='</table>';
$html.='</html>';
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$dompdf->load_html($html);
$dompdf->render();
$filename= "Reporte_lista_proyectos.pdf";
$dompdf->stream($filename, array("Attachment" => false));
?>