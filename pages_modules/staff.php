<?
$file_Rangos = file('engine/variables_mods/ADM_Rangos.tDB');
$file_Lista = file('engine/variables_mods/ADM_Lista.tDB');




function stf_chkon($user){
  global $core_db;
$sqluser = $core_db->Execute("select AccountID from character where Name=?",array($user));
$sqlstatus = $core_db->Execute("SELECT CONNECTSTAT FROM MEMB_STAT WHERE MEMB___ID=?",array($sqluser->fields[0]));

if($sqlstatus->fields[0] == 0){ $sqlstatus->fields[0] ='<Font Color="#DF0101">OFF</Font>';
}
if($sqlstatus->fields[0] == 1){ $sqlstatus->fields[0] ='<Font Color="#04B404">ON</Font>';
}
return $sqlstatus->fields[0];
}

$Admin="SELECT TOP 15 Name,AccountID FROM CHARACTER WHERE CTLCODE='24' OR CTLCODE='8' OR CTLCODE='32' OR CTLCODE='10'";
?>

<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Lista de Staff</h3>
  </div>
<table class="table table-striped table-fix">
  <thead>
        <tr>
          <th>Nombre</th>
          <th>Rango</th>
          <th>Estado</th>
        </tr>
  </thead>
  <tbody>
<?

$consulta = $core_db->Execute("SELECT TOP 15 Name FROM CHARACTER WHERE CTLCODE='24' OR CTLCODE='8' OR CTLCODE='32' OR CTLCODE='10'");
  while (!$consulta->EOF){
    $adm_check = $consulta->fields[0];

foreach ($file_Lista as $iD_data0){
  $iD_data0 = explode(",",$iD_data0);
  if($iD_data0[0] == $adm_check) {

foreach ($file_Rangos as $pag_data){
          $pag_data = explode(",",$pag_data);
          if($pag_data[0] == $iD_data0[1]){
            $clave = $pag_data[1];
          }
        }

      echo "<tr>
          <td>".$iD_data0[0]."</td>
          <td><B>".$clave."</td>
          <td>".stf_chkon($iD_data0[0])."</td>
        </tr>";

  }
   }
   $consulta->MoveNext();
 }
?>        
  </tbody>
  </table>
</div>


<div class="alert alert-warning">Si ves a un jugador haciendose pasar por Administrador o GameMaster y no figura en esta lista denuncialo inmediatamente en el foro.</div>


