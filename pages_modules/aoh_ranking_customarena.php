<!-- Ranking Custom Arena para IGK Files -->

<div class="tmp_page_content"><div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">RANKING CUSTOM ARENA EVENT</h3>
  </div>
<table class="table table-striped table-fix">
  <thead>
    <tr>
      <th>#</th>
      <th>Personaje</th>
      <th>Raza</th>
      <th>Victorias</th>
      <th>Matanzas</th>
    </tr>
  </thead>
  <tbody> 

  <?
$consulta=$core_db->Execute("SELECT TOP 100 Name,Class,RankAreCount,AccountID,RankArena From Character where RankArena>0 order by RankArena desc");
$rank=0;
while (!$consulta->EOF){
$rank++;
if($consulta->fields[1] == 0){ $consulta->fields[1] ='Dark Wizard';}
if($consulta->fields[1] == 1){ $consulta->fields[1] ='Soul Master';}
if($consulta->fields[1] == 2){ $consulta->fields[1] ='Grand Master';}
if($consulta->fields[1] == 16){ $consulta->fields[1] ='Dark Knight';}
if($consulta->fields[1] == 18){ $consulta->fields[1] ='Blade Knight';}
if($consulta->fields[1] == 19){ $consulta->fields[1] ='Blade Master';}
if($consulta->fields[1] == 32){ $consulta->fields[1] ='Fairy Elf';}
if($consulta->fields[1] == 33){ $consulta->fields[1] ='Muse Elf';}
if($consulta->fields[1] == 35){ $consulta->fields[1] ='High Elf';}
if($consulta->fields[1] == 48){ $consulta->fields[1] ='Magic Gladiator';}
if($consulta->fields[1] == 51){ $consulta->fields[1] ='Duel Master';}
if($consulta->fields[1] == 64){ $consulta->fields[1] ='Dark Lord';}
if($consulta->fields[1] == 66){ $consulta->fields[1] ='Lord Emperor';}
if($consulta->fields[1] == 80){ $consulta->fields[1] ='Summoner';}
if($consulta->fields[1] == 81){ $consulta->fields[1] ='Blooby Summoner';}
if($consulta->fields[1] == 82){ $consulta->fields[1] ='Dimension Master';}
if($consulta->fields[1] == 96){ $consulta->fields[1] ='Rage Fighter';}
if($consulta->fields[1] == 98){ $consulta->fields[1] ='First Master';}
echo"

        <tr>
    <td class='trhover2' align='center'><b>$rank</b></td>
          <td class='trhover1' align='center'><b>".$consulta->fields[0]."</b></td>
      <td class='trhover2' align='center'><b>".$consulta->fields[1]."</b></td>
      <td class='trhover1' align='center'><font color='red'><b>".$consulta->fields[2]."</b></font></td>
      <td class='trhover2' align='center'><b>".$consulta->fields[4]."</b></td>
        </tr>

      
      "; 
$consulta->MoveNext();
    }

?>
  
        </tbody>
  </table>
</div></div>