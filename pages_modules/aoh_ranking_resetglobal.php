<?
$get_config = simplexml_load_file('engine/config_mods/aoh_ranking_resetglobal.xml');
if ($get_config->active == '0') {
    echo msg('0', 'Sorry, this feature is temporarily unavailable at the moment.');
} else {

$duelo01=$get_config->numero_top;
?>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Top Asesinos</h3>
  </div>
<table class="table table-striped table-fix">
  <thead>
    <tr>
      <th>#</th>
      <th>Cuenta</th>
      <th>Suma de Resets</th>
    </tr>
  </thead>
  <tbody>
<?
$consulta = $core_db->Execute("Select distinct ToP $duelo01 AccountID , sum(Resets)  from Character group by AccountID order by sum(Resets) desc");
$rank=0;
while (!$consulta->EOF){
$rank++;
    echo "
	<tr>
	<td>$rank</td>
	<td>".$consulta->fields[0]."</td>
	<td>".$consulta->fields[1]."</td>
	</tr>
";
$consulta->MoveNext();
}

?>
  </tbody>
  </table>
</div>
<? } ?>