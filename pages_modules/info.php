<?php

$characters = $core_db->Execute("SELECT count(Name) FROM Character");
$totalchars = $characters->fields[0];

$accounts = $core_db2->Execute("SELECT count(memb___id) FROM MEMB_INFO");
$totalacc = $accounts->fields[0];

$guild00 = $core_db->Execute("SELECT count(G_Name) FROM Guild");
$totalguilds00 = $guild00->fields[0];


$bannedchar = $core_db->Execute("SELECT count(Name) FROM Character WHERE CtlCode='1'");
$bannchar = $bannedchar->fields[0];

$gm = $core_db->Execute("SELECT count(Name) FROM Character WHERE CtlCode = 32");
$gms = $gm->fields[0];

?>

<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Informacion del Servidor</h3>
  </div>
<table class="table table-aoh">
  <tbody>
    <tr>
      <td class="tbtl">Version:</td>
      <td><?=$config_template->Version;?></td>
      <td class="tbtl">Experiencia:</td>
      <td><?=$config_template->Exp;?></td>
    </tr>
	<tr>
      <td class="tbtl">Drop:</td>
      <td><?=$config_template->Drop;?></i></td>
      <td class="tbtl">Cuentas registradas:</td>
      <td><?=$totalacc;?></td>
	</tr>
	<tr>
      <td class="tbtl">Personajes creados:</td>
      <td><?=$totalchars;?></td>
      <td class="tbtl">Clanes activos:</td>
      <td><?=$totalguilds00;?></td>
	</tr>
	<tr>
      <td class="tbtl">Personajes baneados:</td>
      <td><?=$bannchar;?></td>
      <td class="tbtl">GMs:</td>
      <td><?=$gms;?></td>
	</tr>
  </tbody>
  </table>
</div>

<div>
<a href="index.php?page_id=aoh_hora_eventos" class="btn btn-success btn-lg active" role="button">Revisa nuestros Eventos Activos</a>
</div>
<br>

<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Especificaciones del Hardware</h3>
  </div>
<div class="row show-grid">
    <div class="col-xs-6 col-md-4"><img src="AOH_Addons/images/otros/cpuhost.png" class="img-responsive" /></div>
    <div class="col-xs-12 col-md-8">
  <table class="table table-bordered table-aoh">
  <tbody>
    <tr>
<td class="tbtl">Procesador:</td>
<td>Intel Xeon E5 (4 x 3.7 GHz)</td>
</tr>
<tr>
<td class="tbtl">Memoria RAM:</td>
<td>8GB (DDR3 1333 MHz)</td>
</tr>
<tr>
<td class="tbtl">Disco Duro:</td>
<td>1x500 GB 7200 RPM SATA HD<br />1x1000 GB 7200 RPM SATA HD</td>
</tr>
<tr>
<td class="tbtl">Conexión:</td>
<td>500Mbps <i>(simétricos)</i></td>
</tr>
  </tbody>
  </table>
    </div>
  </div>
</div>