<?
$config = simplexml_load_file('engine/config_mods/unstuck_character_settings.xml');
$active = trim($config->active);
if($active == '0'){
	echo msg('0','Sorry, this feature is temporarily unavailable at the moment.');
}else{
	$mapnumber = trim($config->map_number);
	$map_pos_y = trim($config->map_pos_y);
	$map_pos_x = trim($config->map_pos_x);
	if(isset($_GET['uid'])){
		echo '<div style="margin-top: 10px;">';
		$id = safe_input($_GET['uid'],'');
		if(empty($id) || !is_numeric($id)){
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
					$unstuck = $core_db->Execute("Update character set [mapnumber]=?,[mapposx]=?,[mapposy]=? where mu_id=?",array($mapnumber,$map_pos_x,$map_pos_y,$id));
					if($unstuck){
						echo msg('1','Character successfully unstucked.');
					}else{
						echo msg('0','Unable to unstuck, reason: system error, please contact administrator.');
					}
				}
			}
		}
		echo '</div>';
	}
	echo '
<div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">Unstuck Character Info</h3>
  </div>
  <div class="panel-body panel-fix">
    After using unstuck character function, character will be teleported on <b>'.decode_map($mapnumber).'</b>, coords: <b>'.$map_pos_x.'</b> with <b>'.$map_pos_y.'</b>
  </div>
</div>
';
	
	$characters = $core_db->Execute("Select mu_id,name,class,mapnumber,mapposx,mapposy from character where accountid=? order by clevel desc ",array($user_auth_id));

	while (!$characters->EOF){
		echo '
<div class="panel panel-default">
  <div class="panel-body panel-fix panel-body-cont">
<div class="row show-grid">';
echo '<div class="col-md-4">';
echo '<table>
	<tbody>';
echo '<tr>
     <td rowspan="2"><img src="template/'.$core['config']['template'].'/images/class/'.decode_class($characters->fields[2],'2').'" width="66" height="66" title="Class"></td>
     <td align="left" class="iR_name" width="100">'.htmlentities($characters->fields[1]).'</td>
  </tr>
  <tr>
  	<td algin="left" class="iR_class">'.decode_class($characters->fields[2]).'</td>
  </tr>
  </tbody>
  </table>';
echo '</div>';

echo '<div class="col-md-8">';
echo '<table class="table">
	<tbody>
  <tr>
  <td>Location: '.decode_map($characters->fields[3]).' on '.$characters->fields[4].' with '.$characters->fields[5].'</td>
  </tr>
  <tr>
    <td><input type="button"  class="btn btn-primary btn-sm" value="Unstuck Character" onclick="location.href=\''.$core_run_script.'&uid='.$characters->fields[0].'\'"></td>
  </tr>
    </tbody>
    </table>
  ';
echo '
</div>
</div>
</div>
</div>
';
		$characters->MoveNext();
	}
	echo '</table>';

}
?>