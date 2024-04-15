<?
$config = simplexml_load_file('engine/config_mods/clear_skills_settings.xml');
$active = trim($config->active);
if($active == '0'){
	echo msg('0',text_sorry_feature_disabled);
}else{
	if(isset($_GET['sid'])){
		echo '<div style="margin-top: 10px;">';
		$id = safe_input($_GET['sid'],'');
		$tipo_reset=safe_input($_GET['tipe'],'');
		if(empty($id) || !is_numeric($id)){
			header('Location: '.$core_run_script.'');
			exit();
		}else{
			if(character_and_account($id,$user_auth_id) === false){
				header('Location: '.$core_run_script.'');
				exit();
			}else {
				if(account_online($user_auth_id) === true){
					echo msg('0',text_clearskills_t1);		
				}else{
					//$clear = $core_db->Execute("Update Character set [SCFMasterLevel]='1',[MagicList]=CONVERT(varbinary(180), null) where mu_id=?",array($id));
					$chek_pj = $core_db->Execute("SELECT Name From Character Where mu_id='".$id."'");

					if($tipo_reset=='0'){
						$clear = $core_db->Execute("Update Character set [MagicList]=CONVERT(varbinary(180), null) where mu_id=?",array($id));
					}elseif($tipo_reset=='1'){
						$clear = $core_db->Execute("Update Character set [MagicList]=CONVERT(varbinary(180), null) where mu_id=?",array($id));

						$borrar_skills0= "UPDATE ".AOH_Master_Table." SET ".AOH_Master_Skill_Column." = CONVERT(varbinary(180), null), ".AOH_Master_Level_Column." = '1', ".AOH_Master_Points_Column." = '0' WHERE ".AOH_Master_Name_Column."='".$chek_pj->fields[0]."'";
						$exc_reset_formula0=$core_db->Execute($borrar_skills0); 
					}

					if($clear){
						echo msg('1',text_clearskills_t2);
					}else{
						echo msg('0',text_clearskills_t3);
					}
				}
			}
		}
echo '</div>';
	}


echo '
<div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">'.text_clearskills_t4.'</h3>
  </div>
  <div class="panel-body panel-fix">
    '.text_clearskills_t5.'
  </div>
</div>
';
	$characters = $core_db->Execute("Select mu_id,Name,Class from Character where AccountID=? order by cLevel desc ",array($user_auth_id));


	while (!$characters->EOF){
	echo '
	<div class="panel panel-default panel-body-cont">
  <div class="panel-body panel-fix">
	<table class="table-fix">';

		echo '<tr>
	<td><img src="template/'.$core['config']['template'].'/images/class/'.decode_class($characters->fields[2],'2').'" width="66" height="66" title="Class"></td>
	<td>
		<table>
			<tr>
				<td class="iR_name">'.htmlentities($characters->fields[1]).'</td>
			</tr>
			<tr>
    			<td>'.decode_class($characters->fields[2]).'</td>
			</tr>
		</table>
	</td>

	<td>
		<table>
			<tr>
    			<td><input type="button" class="btn btn-primary btn-sm" value="Reset Skill" onclick="ask_url(\'Esta seguro de borrar Skill?\',\''.$core_run_script.'&sid='.$characters->fields[0].'&tipe=0\');">
    				<input type="button" class="btn btn-success btn-sm" value="Reset Master Skill" onclick="ask_url(\'Esta seguro de borrar Master Skill?\',\''.$core_run_script.'&sid='.$characters->fields[0].'&tipe=1\');"></td>
			</tr>
		</table>
	</td

  </tr>

  ';
		echo '</table>
	</div>
</div>';
		$characters->MoveNext();
	}
	
	
}
?>