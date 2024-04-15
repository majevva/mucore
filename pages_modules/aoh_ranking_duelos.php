<?
$get_config = simplexml_load_file('engine/config_mods/aoh_ranking_duelos.xml');
if ($get_config->active == '0') {
    echo msg('0', 'Sorry, this feature is temporarily unavailable at the moment.');
} else {

$duelo01=$get_config->numero_top;
$duelo02=AOH_Duelo_Table;
$duelo03=AOH_Duelo_Name_Column;
$duelo04=AOH_Duelo_Win_Column;
$duelo05=AOH_Duelo_Lose_Column;
?>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Top Duelos</h3>
  </div>
<table class="table table-striped table-fix">
  <thead>
    <tr>
      <th>#</th>
      <th>Nombre</th>
      <th>Raza</th>
      <th>Ganadas</th>
      <th>Perdidas</th>
      <th>% Exito</th>
    </tr>
  </thead>
  <tbody>
<?
$consulta = $core_db->Execute("Select ToP $duelo01 d.$duelo03,d.$duelo04,d.$duelo05,c.Name,c.Class from $duelo02 d, Character c  where d.$duelo03 COLLATE Latin1_General_CS_AS=c.Name COLLATE Latin1_General_CS_AS order by d.$duelo04 desc");
$rank=0;
while (!$consulta->EOF){
$rank++;
echo "
    <tr>
    <td>$rank</td>
    <td>".$consulta->fields[0]."</td>
    <td>".$characters_class[$consulta->fields[4]][0]."</td>
    <td>".$consulta->fields[1]."</td>
    <td>".$consulta->fields[2]."</td>
    <td>".number_format(($consulta->fields[1]*100)/($consulta->fields[1]+$consulta->fields[2]),2,'.','')." %</td>
    </tr>
";
$consulta->MoveNext();
}

?>
  </tbody>
  </table>
</div>
<? } ?>