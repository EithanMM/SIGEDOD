<?php
require_once("../../../lib/dompdf/autoload.inc.php");
include("../../../functions.php");

$sql1 = "SELECT DISTINCT Cod_SIA from vis_repor_proy_por_cerr;";
$sql2 = "SELECT COUNT(DISTINCT (cod_SIA)) from vis_repor_proy_por_cerr;";




$res = seleccion($sql1);
$res2 = seleccion($sql2);
$html = "";
$html .= '<!DOCTYPE html>';
$html .= '<link href="../../../lib/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="../../../inc/css/estilo.css" rel="stylesheet" type="text/css"/>';
$html .= '<html>';
$html.='<h2 style="text-align:center;padding-bottom:0px; padding-top:0px;border-top:0px;border-bottom:0px;margin-top:0px;margin-bottom:0px;">Universidad Nacional</h2>'; 
$html.='<h2 style="text-align:center;padding-bottom:0px; padding-top:0px;border-top:0px;border-bottom:0px;margin-top:0px;margin-bottom:0px;">Facultad de Ciencias Exactas y Naturales </h2>';
$html.='<h2 style="text-align:center;padding-bottom:0px; padding-top:0px;border-top:0px;border-bottom:0px;margin-top:0px;margin-bottom:0px;">Escuela de Informática </h2>';
$html.='<h2 style="text-align:center;padding-bottom:0px; padding-top:0px;border-top:0px;border-bottom:0px;margin-top:0px;margin-bottom:0px;">';
$html.='<style>';
$html.='table {border-collapse: collapse; margin: 10px; border: 3px solid black;}';
$html.='table, th, td { border: 2px solid black; border-collapse: collapse;}';
$html.='</style>';

$html.='<h2>Proyectos por Cerrar</h2>';

for ($i = 0; $i < $res2[0]['COUNT(DISTINCT (cod_SIA))']; $i++) {
 //selecciona cada codigo SIA, obtenido desde la vista
    $html.='<table style="width:95%" align="left">';


    $sql3 = 'SELECT * FROM vis_repor_proy_por_cerr WHERE Cod_SIA ="'.$res[$i]['Cod_SIA'].'";';
    $res3 = seleccion($sql3);
    $sql4 = 'SELECT COUNT(DISTINCT (Cod_SIA)) FROM vis_repor_proy_por_cerr WHERE Cod_SIA ="'.$res[$i]['Cod_SIA'].'";';
    $res4 = seleccion($sql4);
    
    
    $html.='<tr>';
    $html.='<th width="11%"><font size="2">Código SIA</font></th>';
    $html.='<th width="11%"><font size="2">Nombre Proyecto</font></th>';
    $html.='<th width="3%"><font size="2">Fecha Inicio</font></th>';
    $html.='<th width="3%"><font size="2">Fecha Final</font></th>';
    $html.='</tr>';
    
    
    
    for($j = 0; $j < $res4[0]['COUNT(DISTINCT (Cod_SIA))']; $j++) {
        
    $html.="<tr>";
    $html.='<td><font size="2">'.$res3[$j]['Cod_SIA'].'</font></td>';
    $html.='<td><font size="2">'.$res3[$j]['Nom_Proy'].'</font></td>';
    $html.='<th><font size="2">'.$res3[$j]['Fech_Ini'].'</font></th>';
    $html.='<th><font size="2">'.$res3[$j]['Fech_Fin'].'</font></th>';
    $html.="</tr>";
    }
    
    $sql6 = 'SELECT Ced, Nom_Miem, T_miembro, Jornada FROM vis_repor_proy_por_cerr WHERE Cod_SIA ="'.$res[$i]['Cod_SIA'].'";';
    $res5 = seleccion($sql6);
    $sql7 = 'SELECT COUNT(*) FROM vis_repor_proy_por_cerr WHERE Cod_SIA ="'.$res[$i]['Cod_SIA'].'";';
    $res6 = seleccion($sql7);
    
    $html.='<tr>';
    $html.='<th width="11%"><font size="2">Cédula</font></th>';
    $html.='<th width="11%"><font size="2">Nombre</font></th>';
    $html.='<th width="11%"><font size="2">Jornada</font></th>';
    $html.='<th width="11%"><font size="2">Tipo</font></th>';
    $html.='</tr>';
    
    for($k = 0; $k < $res6[0]['COUNT(*)']; $k++) {
        
        $html.='<tr>';
        $html.='<th><font size="2">'.$res5[$k]['Ced'].'</font></th>';
        $html.= '<th><font size="2">'.$res5[$k]['Nom_Miem'].'</font></th>';
        $html.= '<th><font size="2">'.$res5[$k]['Jornada'].'</font></th>';
        $html.= '<th><font size="2">'.$res5[$k]['T_miembro'].'</font></th>';
        $html.='</tr>';
    }
    $html.="</table>";
    
}
$html .= '</html>';

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$dompdf->load_html($html);
$dompdf->render();
$filename = "ReportesPorCerrar.pdf";
$dompdf->stream($filename, array("Attachment" => false));
?>