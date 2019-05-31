<?php
include("../../login/check.php");
include("../../../functions.php");
$vocab = $mySessionController->getVar("vocab");
$user_rol = $mySessionController->getVar("rol");

$ced = $_GET['ced_miem'];
$view_mode = $_GET['view_mode'];
$sql = "SELECT p.Cod_SIA, m.Nom_Miem, m.Ced, m.telefono, m.email, p.T_miembro, p.Jornada
        FROM sis_proy_miem p inner join sis_miem_proy_inv m on p.Ced=m.Ced 
        WHERE p.Ced = '$ced';";
$res = seleccion($sql);
?>

<div class="container">
    <div class="well well-sm">
        <h2>
             <?php
            echo ($view_mode == 1) ? "Ver miembro" : $vocab["symbol_view"];
       
            ?>
        </h2>
    </div>
    <form method="post" action="">
        <div class="col-lg-5 col-md-5 col-sm-8 col-xs-12">
            <table>
                <tr>
                    <th colspan="1" style="width: 50%">
                       <div class="form-group">
                        <label for="cod_sia_miem"><?= $vocab["cod_sia"]  ?></label>
                        <input id="cod_sia" name="cod_sia" readonly class="form-control" type="text" value="<?= $res[0]['Cod_SIA'] ?>" <?= ($ldap_status == 1 || $view_mode == 0) ? "readonly" : "" ?>/>
                       </div>
                    </th>
                    <th colspan="1" style="width: 50%">
                       <div class="form-group">
                        <label for="nom_miem"><?= $vocab["nom_miem"]?></label>
                        <input id="nom_miem" name="nom_sia" readonly class="form-control" type="text" value="<?= $res[0]['Nom_Miem'] ?>"/>
                       </div>
                    </th>
                </tr>
                <tr>
                    <th colspan="1" style="width: 50%">
                      <div class="form-group">
                        <label for="ced_miem"><?= $vocab["ced"]?></label>
                        <input id="eed_miem" name="ced_miem" readonly class="form-control" type="text" value="<?= $res[0]['Ced'] ?>"/>
                      </div>
                    </th>
                    <th colspan="1" style="width: 50%">
                      <div class="form-group">
                        <label for="tel_miem"><?= $vocab["num_tel"]?></label>
                        <input id="tel_miem" name="tel_miem" readonly class="form-control" type="text" value="<?= $res[0]['telefono'] ?>"/>
                      </div>
                    </th>
                </tr>
                <tr>
                    <th colspan="1" style="width: 50%">
                      <div class="form-group">
                        <label for="email_miem"><?= $vocab["email"]  ?></label>
                        <input id="email_miem" name="email_miem" readonly class="form-control" type="text" value="<?= $res[0]['email'] ?>"/>
                      </div>
                    </th>
                    <th colspan="1" style="width: 50%">
                      <div class="form-group">
                        <label for="TMiembro"><?= $vocab["tip"] ?></label>
                        <input id="TMiembro" name="tmiembro" readonly class="form-control" type="text" value="<?= $res[0]['T_miembro'] ?>"/>
                      </div>
                    </th>
                </tr>
                <tr>
                    <th colspan="1" style="width: 50%">
                      <div class="form-group">
                        <label for="Jornada"><?= $vocab["jor"]  ?></label>
                        <input id="Jornada" name="jornada" readonly class="form-control" type="text" value="<?= $res[0]['Jornada'] ?>"/>
                      </div>
                    </th>
                    <th colspan="1" style="width: 50%">
                      <div class="form-group">
                          <label style="visibility: hidden;">hola</label>
                          <div class="row">
                              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="text-center"><a class="btn btn-warning" style="float: left;" onclick="javascript:OpcionMenu('mod/admin/proyecto/listar_integrantes.php?', '');"><i></i> <?= "Regresar" ?></a></div>
                             </div>
                          </div>
                      </div>
                    </th>
                </tr>
            </table>
        </div>
   </form>
</div>
            

