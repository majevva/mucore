<?
$load_levelup_settings = simplexml_load_file('engine/config_mods/add_points_settings.xml');
$active = trim($load_levelup_settings->active);
if($active == '0'){
	echo msg('0','Sorry, this feature is temporarily unavailable at the moment.');
}else{
$str_limit = trim($load_levelup_settings->str_limit);
$agi_limit = trim($load_levelup_settings->agi_limit);
$vit_limit = trim($load_levelup_settings->vit_limit);
$eng_limit = trim($load_levelup_settings->eng_limit);
$cmd_limit = trim($load_levelup_settings->cmd_limit);

if(isset($_POST['levelup_add'])){
	echo '<div style="margin-top: 10px;">';
	$id = safe_input($_POST['levelup_id'],'');
	$str = safe_input($_POST['str'],'');
	$agi = safe_input($_POST['agi'],'');
	$vit = safe_input($_POST['vit'],'');
	$eng = safe_input($_POST['eng'],'');
	$cmd = safe_input($_POST['cmd'],'');
	if(empty($str)){
		$str = '0';
	}
	if(empty($agi)){
		$agi = '0';
	}
	if(empty($vit)){
		$vit = '0';
	}
	if(empty($eng)){
		$eng = '0';
	}
	if(empty($cmd)){
		$cmd = '0';
	}
	if(empty($id) || !is_numeric($id) || !is_numeric($str) || !is_numeric($agi) || !is_numeric($vit) || !is_numeric($eng) || !is_numeric($cmd)){
		header('Location: '.$core_run_script.'');
		exit();
	}else{
		if(character_and_account($id,$user_auth_id) === false){
			header('Location: '.$core_run_script.'');
			exit();
		}else {
			if(account_online($user_auth_id) === true){
				echo msg('0','Account is connected on game, please logout.');		
			}else{
				$select_points = $core_db->Execute("Select leveluppoint,strength,dexterity,vitality,energy,leadership from character where mu_id=? and accountid=?",array($id,$user_auth_id));
				$total_amount_points = $str+$agi+$vit+$eng+$cmd;
				$new_levelup_points = $select_points->fields[0]-$total_amount_points;
				if($select_points->fields[0] < $total_amount_points){
					echo msg('0','Unable to add levelup points, reason: you don\'t have enough levelup points.');
				}else{
					if(isset($_POST['str'])){
						if(($select_points->fields[1]+$str) >= $str_limit){
							echo msg('0','Unable to add levelup points, reason: strength limit reached (strength limit: '.number_format($str_limit).').');
							$no_points = 1;
						}						
					}
					if(isset($_POST['agi'])){
						if(($select_points->fields[2]+$agi) >= $agi_limit){
							echo msg('0','Unable to add levelup points, reason: agility limit reached (agility limit: '.number_format($agi_limit).').');
							$no_points = 1;
						}	
					}
					if(isset($_POST['vit'])){
						if(($select_points->fields[3]+$vit) >= $vit_limit){
							echo msg('0','Unable to add levelup points, reason: vitality limit reached (vitality limit: '.number_format($vit_limit).').');
							$no_points = 1;
						}
					}
					if(isset($_POST['eng'])){
						if(($select_points->fields[4]+$eng) >= $eng_limit){
							echo msg('0','Unable to add levelup points, reason: energy limit reached (energy limit: '.number_format($eng_limit).').');
							$no_points = 1;
						}
					}
					if(isset($_POST['eng'])){
						if(($select_points->fields[5]+$cmd) >= $cmd_limit){
							echo msg('0','Unable to add levelup points, reason: command limit reached (command limit: '.number_format($cmd_limit).').');
						$no_points = 1;
						}					
					}
					if($no_points != '1'){
					
						$update_points = $core_db->Execute("Update character set [leveluppoint]=?,[strength]=strength+?,[dexterity]=dexterity+?,[vitality]=vitality+?,[energy]=energy+?,[leadership]=leadership+? where mu_id=?",array($new_levelup_points,$str,$agi,$vit,$eng,$cmd,$id));
						if($update_points){
							echo msg('1','Subiste los puntos con exito.');
						}else{
							echo msg('0','Unable to add levelup points, reason: system error, please contact administrator.');
						}
						
					}
				}				
			}
		}
	}
	echo '</div>';
}

echo '
<div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">Limite de Stats</h3>
  </div>
<table class="table table-fix">
<tr>
<td align="left" width="70"><b>Fuerza:</b></td>
<td align="left">'.number_format($str_limit).'</td>
</tr>
<tr>
<td align="left"><b>Agilidad:</b></td>
<td align="left">'.number_format($agi_limit).'</td>
</tr>
<tr>
<td align="left"><b>Vitalidad:</b></td>
<td align="left">'.number_format($vit_limit).'</td>
</tr>
<tr>
<td align="left"><b>Energia:</b></td>
<td align="left">'.number_format($eng_limit).'</td>
</tr>
<tr>
<td align="left"><b>Comando:</b></td>
<td align="left">'.number_format($cmd_limit).'</td>
</tr>
</table>
</div>
';


$select_characters = $core_db->Execute("Select mu_id,name,class,leveluppoint,strength,dexterity,vitality,energy,leadership from character where accountid=? order by leveluppoint desc ",array($user_auth_id));


$count_points=0;
while (!$select_characters->EOF){
	$count_points++;
	if($select_characters->fields[3] <= '0'){
		$lacking_error = '<span class="label label-danger lbl-fix">No tienes puntos actualmente.</span>';
	}else {
		$lacking_error = '<input type="submit" value="Agregar Puntos" class="btn btn-primary btn-sm">';
	}
	echo '
<div class="panel panel-default panel-body-cont">
  <div class="panel-body panel-fix">
<div class="row show-grid">';
	echo '
	<form action="" method="POST" name="levelup_points_'.$count_points.'">';
	echo '<div class="col-md-4">';
	echo '<table>
	<tbody>
  <tr>
    <td rowspan="2"><img src="template/'.$core['config']['template'].'/images/class/'.decode_class($select_characters->fields[2],'2').'" width="66" height="66" title="Class"></td>
	<td align="left" class="iR_name" width="100">'.htmlentities($select_characters->fields[1]).'<input type="hidden" name="levelup_id" value="'.$select_characters->fields[0].'"><input type="hidden" name="levelup_add"></td>   
  </tr>
  <tr>
  	<td>'.decode_class($select_characters->fields[2]).'</td>
  </tr>
  </tbody>
  </table>';
	echo '</div>';
	echo '<div class="col-md-8">';
	echo '<table class="table">
	<tbody>
  <tr>
  	<td colspan="2"><b>Disponibles: '.number_format($select_characters->fields[3]).'</b></td>
  </tr>
  <tr>
    <td>Strength: '.number_format($select_characters->fields[4]).'</td>
    <td>';
	if($select_characters->fields[4] >= $str_limit){
		echo 'Limit reached.';
	}else{
		echo '<input type="text" maxlength="5" class="iRg_input" name="str">';
	}
	echo '</td>
  </tr>
  <tr>
    <td>Agility: '.number_format($select_characters->fields[5]).'</td>
    <td>';
		if($select_characters->fields[5] >= $str_limit){
		echo 'Limit reached.';
	}else{
		echo '<input type="text" maxlength="5" class="iRg_input" name="agi">';
	}
	echo '</td>
  </tr>
  <tr>
    <td>Vitality: '.number_format($select_characters->fields[6]).'</td>
    <td>';
		if($select_characters->fields[6] >= $str_limit){
		echo 'Limit reached.';
	}else{
		echo '<input type="text" maxlength="5" class="iRg_input" name="vit">';
	}
	echo '</td>
  </tr>
  <tr>
    <td>Energy: '.number_format($select_characters->fields[7]).'</td>
    <td>';
		if($select_characters->fields[7] >= $str_limit){
		echo 'Limit reached.';
	}else{
		echo '<input type="text" maxlength="5" class="iRg_input" name="eng">';
	}
	echo '</td>
  </tr>
  <tr>
    <td>Command: '.number_format($select_characters->fields[8]).'</td>
    <td>';
		if($select_characters->fields[8] >= $str_limit){
		echo 'Limit reached.';
	}else{
		echo '<input type="text" maxlength="5" class="iRg_input" name="cmd">  <span class="label label-success lbl-fix">Solo para DL</span>';
	}
	echo '</td>
  </tr>

  <tr>
    <td colspan="2">'.$lacking_error.'</td>
  </tr>
	</tbody>
</table>
</div>
  </form> 
	';
echo '
</div>
</div>
</div>
';
	
	$select_characters->MoveNext();
}

}


?>