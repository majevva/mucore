<?
$load_reset_settings = simplexml_load_file('engine/config_mods/aoh_master_reset.xml');
$active = trim($load_reset_settings->active);
if($active == '0'){
	echo msg('0',text_sorry_feature_disabled);
}else{
$reset_level = trim($load_reset_settings->master_level);
$reset_points  = trim($load_reset_settings->master_points);
$reset_clear_skills = trim($load_reset_settings->master_clear_skills);
$reset_table  = trim($load_reset_settings->master_table);
$reset_colum_Level = trim($load_reset_settings->master_colum_Level);
$reset_colum_Points = trim($load_reset_settings->master_colum_Points);
$reset_colum_Skills = trim($load_reset_settings->master_colum_Skills);

if(isset($_GET['rid'])){
	echo '<div style="margin-top: 10px;">';
	$id = safe_input($_GET['rid'],'');
	if(empty($id) || !is_numeric($id)){
		header('Location: '.$core_run_script.'');
		exit();
	}else{
		if(character_and_account($id,$user_auth_id) === false){
			header('Location: '.$core_run_script.'');
			exit();
		}else {
			if(account_online($user_auth_id) === true){
				echo msg('0',text_resetcharacter_t1);		
			}else{
				$select_req = $core_db->Execute("select m.".AOH_Master_Level_Column.",m.".AOH_Master_Points_Column.",m.".AOH_Master_Skill_Column." from ".AOH_Master_Table." m, Character c where c.Name=m.".AOH_Master_Name_Column." and c.mu_id=? and c.accountid=?",array($id,$user_auth_id));
				if($select_req->fields[0] < $reset_level){
					echo msg('0',str_replace("{levels}",($reset_level - $select_req->fields[0]),"faltan {levels} MasterLevel"));
					$no_reset = 1;
				}
				$chek_pj = $core_db->Execute("SELECT Name From Character Where mu_id='".$id."'");
				if($no_reset != '1'){
					$new_money = $select_req->fields[1] - $reset_zen;
					switch ($reset_clear_skills){
						case '0': 

						break;

						case '1': 
						
						$clear = $core_db->Execute("Update Character set [MagicList]=CONVERT(varbinary(180), null) where mu_id=?",array($id));

						$borrar_skills= "UPDATE ".AOH_Master_Table." SET ".AOH_Master_Skill_Column." = CONVERT(varbinary(180), null) WHERE ".AOH_Master_Name_Column."='".$chek_pj->fields[0]."'";
						$exc_reset_formula=$core_db->Execute($borrar_skills); 
						break;
					}

					$Hace_el_reset= "UPDATE ".AOH_Master_Table." SET ".AOH_Master_Level_Column." = '1', ".AOH_Master_Points_Column." = $reset_points WHERE ".AOH_Master_Name_Column."='".$chek_pj->fields[0]."'";
					$exc_reset_formula=$core_db->Execute($Hace_el_reset); 
					if($exc_reset_formula){
						echo msg('1','Ha reseteado MasterLevel con exito');
					}else{
						echo msg('0',text_resetcharacter_t6);
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
    <h3 class="panel-title">Requerimientos y Formula</h3>
  </div>
  <table class="table table-fix">
<tr>
<td align="left"><b>Master Level:</b></td>
<td align="left" width="70%">'.$reset_level.'</td>
</tr>
<tr>
<td align="left" width="30%" valign="top"><b>'.text_resetcharacter_t9.':</b></td>
<td align="left">'.$reset_points.'</td>
</tr>
<tr>
<td align="left"><b>Borra MasterSkill:</b></td>
<td align="left">';
switch ($reset_clear_skills){
	case '0': echo 'No'; break;
	case '1': echo 'Yes'; break;
}
echo '</td>
</tr>
  </table>
</div>
';

$select_characters = $core_db->Execute("Select c.mu_id,c.name,c.clevel,c.class,m.".AOH_Master_Level_Column.",m.".AOH_Master_Points_Column.",m.".AOH_Master_Skill_Column." from Character c, ".AOH_Master_Table." m  where c.Name = m.".AOH_Master_Name_Column." and c.accountid=? order by c.clevel desc ",array($user_auth_id));


while (!$select_characters->EOF){
	if ($select_characters->fields[4] < $reset_level){
		$lacking_error = '<span class="label label-danger">'.str_replace("{levels}",($reset_level - $select_characters->fields[4]),"falta {levels} Masterlevel").'</span>';
	}else{
		
		$lacking_error = '<input type="button" class="btn btn-primary btn-sm" value="Resetear Master" onclick="location.href=\''.$core_run_script.'&rid='.$select_characters->fields[0].'\'">';
	}
		echo '
	<div class="panel panel-default panel-body-cont">
  <div class="panel-body panel-fix">
	<table class="table table-fix">';
	echo '
  <tr>
    <td width="66" rowspan="2"><img src="template/'.$core['config']['template'].'/images/class/'.decode_class($select_characters->fields[3],'2').'" width="66" height="66" title="Class"></td>
    <td align="left" class="iR_name" width="100">'.htmlentities($select_characters->fields[1]).'</td>
    <td align="left"><b>MasterLevel:</b> '.$select_characters->fields[4].'</td>
    <td align="left"><b>MasterPoints:</b> '.number_format($select_characters->fields[5]).'</td>
  </tr>
  <tr>
    <td algin="left">'.decode_class($select_characters->fields[3]).'</td>
    <td colspan="2" align="left">'.$lacking_error.'</td>
  </tr>
  ';
echo '</table>
	</div>
</div>';	
	$select_characters->MoveNext();
}


}

?>