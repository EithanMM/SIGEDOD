<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include("../../../functions.php");
        $id = $_GET['id'];
        $sql = "SELECT *from sis_pdf_proy where id_documento= $id"; 
        $res=seleccion($sql);
            {
            if($res[0]['nombre_archivo']==""){?>
        <p>NO tiene archivos</p>
                <?php }else{ ?>
        <iframe  name="frame" width="1300" height="1300" src="../../../Archivos/<?php echo $res[0]['nombre_archivo']; ?>"></iframe>
                
                <?php } } ?>
    </body>
</html>
