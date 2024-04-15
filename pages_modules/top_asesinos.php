<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Top Asesinos</h3>
  </div>
<table class="table table-striped table-fix">
  <thead>
    <tr>
      <th>#</th>
      <th>Personaje</th>
      <th>Raza</th>
      <th>Asesinatos</th>
      <th>Ubicacion</th>
    </tr>
  </thead>
  <tbody>
  <?
$consulta = $core_db->Execute("select TOP 50 Name,Class,MapNumber,AccountID,PKcount From Character where pkcount>0 order by pkcount desc");
$rank=0;
while (!$consulta->EOF){
$rank++;
echo"
        <tr>
      <td>$rank</td>
      <td>".$consulta->fields[0]."</td>
      <td>".$characters_class[$consulta->fields[1]][0]."</td>
      <td><font color='red'><b>".$consulta->fields[4]."</b></font></td>
      <td>".$maps_codes[$consulta->fields[2]]."</td>
    </tr>      
		  "; 
      $consulta->MoveNext();
    }

?>
  </tbody>
  </table>
</div>