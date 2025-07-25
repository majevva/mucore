<?
$config = simplexml_load_file('engine/config_mods/clear_skills_settings.xml');
$active = trim($config->active);
if($active == '0'){
	echo msg('0',text_sorry_feature_disabled);
}else{
	if(isset($_GET['sid'])){
		echo '<div style="margin-top: 10px;">';
		$id = safe_input($_GET['sid'],'');
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
					$clear = $core_db->Execute("Update character set [magiclist]=CONVERT(varbinary(180), null) where mu_id=?",array($id));
					if($clear){
						echo msg('1',text_clearskills_t2);
					}else{
						echo msg('0',text_clearskills_t3);
					}
				}
			}
		}
	}
	echo '<div style="margin-top: 20px;">
<fieldset><legend>'.text_clearskills_t4.'</legend>
<table border="0" cellspacing="4" cellpadding="0" width="100%" style="padding-left: 10px;">
<tr>
<td align="left">'.text_clearskills_t5.'
</td>
</tr>
</table>
</fieldset>
</div>';
	$characters = $core_db->Execute("Select mu_id,name,class from character where accountid=? order by clevel desc ",array($user_auth_id));

	echo '<table border="0" cellspacing="4" cellpadding="0" width="100%" style="margin-top: 10px; margin-bottom: 10px;">';
	while (!$characters->EOF){
		echo '  <tr>
    <td width="66" rowspan="2"><img src="template/'.$core['config']['template'].'/images/class/'.decode_class($characters->fields[2],'2').'" width="66" height="66" title="Class"></td>
     <td align="left" class="iR_name" width="100">'.htmlentities($characters->fields[1]).'</td>
    <td rowspan="2" class="iR_func_status" align="left"><input type="button" value="'.button_clear_skills.'" onclick="ask_url(\''.text_clearskills_t6.'\',\''.$core_run_script.'&sid='.$characters->fields[0].'\');"></td>
  </tr>
  <tr>
    <td algin="left" class="iR_class">'.decode_class($characters->fields[2]).'</td>
  </tr>
      <tr>
    <td colspan="3" class="iRg_line_top">&nbsp;</td>
  </tr>
  ';
		
		$characters->MoveNext();
	}
	echo '</table>';
	
	
}
?>