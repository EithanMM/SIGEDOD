<?php
include("../../login/check.php");
include("../../../inc/db/db.php");

$cod_sia = $_SESSION['varname'];
$sTable = "vis_miem";
$aColumns = array('Cod_SIA','Proyecto','Cedula','Nombre Miembro','Telefono','Correo','Tipo','Jornada');
$sIndexColumn = "Cedula";
/*---------------------------------------------------------*/

$aActions = array(
    "sView" => 'verMiembro',
    "sEdit" => 'editarMiembro',
    "sPrin" => '',
    "sDele" => 'eliminarMiembro',
    "sAdd" => '');

$sLimit = "";
if (isset($_GET['iDisplayStart']) && $_GET['iDisplayLength'] != '-1') {
    $sLimit = "LIMIT " . intval($_GET['iDisplayStart']) . ", " .
            intval($_GET['iDisplayLength']);
}

/*
 * Ordering
 */
$sOrder = "";
if (isset($_GET['iSortCol_0'])) {
    $sOrder = "ORDER BY  ";
    for ($i = 0; $i < intval($_GET['iSortingCols']); $i++) {
        if ($_GET['bSortable_' . intval($_GET['iSortCol_' . $i])] == "true") {
            $sOrder .= "`" . $aColumns[intval($_GET['iSortCol_' . $i])] . "` " .
                    ($_GET['sSortDir_' . $i] === 'asc' ? 'asc' : 'desc') . ", ";
        }
    }

    $sOrder = substr_replace($sOrder, "", -2);
    if ($sOrder == "ORDER BY") {
        $sOrder = "";
    }
}

/*
 * Filtering
 * NOTE this does not match the built-in DataTables filtering which does it
 * word by word on any field. It's possible to do here, but concerned about efficiency
 * on very large tables, and MySQL's regex functionality is very limited
 */
$sWhere = "Cod_SIA = '$cod_sia'";
if (isset($_GET['sSearch']) && $_GET['sSearch'] != "") {
    $sWhere .= " AND ";
    for ($i = 0; $i < count($aColumns); $i++) {
        $sWhere .= "`" . $aColumns[$i] . "` LIKE '%" . mysqli_real_escape_string($id_con, $_GET['sSearch']) . "%' OR ";
    }
    $sWhere = substr_replace($sWhere, "", -3);
}

/* Individual column filtering */
for ($i = 0; $i < count($aColumns); $i++) {
    if (isset($_GET['bSearchable_' . $i]) && $_GET['bSearchable_' . $i] == "true" && $_GET['sSearch_' . $i] != '') {
        if ($sWhere == "") {
            $sWhere = " where ";
        } else {
            $sWhere .= " AND ";
        }
        $sWhere .= "`" . $aColumns[$i] . "` LIKE '%" . mysqli_real_escape_string($id_con, $_GET['sSearch_' . $i]) . "%' ";
    }
}

/*
 * SQL queries
 * Get data to display
 */

$sQuery = "SELECT SQL_CALC_FOUND_ROWS `" . str_replace(" , ", " ", implode("`, `", $aColumns)) . "` FROM   $sTable WHERE $sWhere $sOrder $sLimit ;";
//echo $sQuery;
$sql = "SELECT COUNT(`" . $sIndexColumn . "`) FROM   $sTable WHERE $sWhere;";
$rResultFilterTotal = seleccion($sql);
$iFilteredTotal = $rResultFilterTotal[0][0];


$sql = "SELECT COUNT(`" . $sIndexColumn . "`) FROM   $sTable WHERE $sWhere;";
$rResultTotal = seleccion($sql);
$iTotal = $rResultTotal[0][0];

$output = array(
    "sEcho" => intval($_GET['sEcho']),
    "iTotalRecords" => $iTotal,
    "iTotalDisplayRecords" => $iFilteredTotal,
    "aaData" => array()
);
$output['aaData'] = seleccion_tabla_t($sQuery, $sIndexColumn, $aColumns, $aActions);

echo json_encode($output);
mysqli_close($id_con);
?>

