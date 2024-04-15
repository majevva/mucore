<?
$config = simplexml_load_file('engine/config_mods/clear_pk_status_settings.xml');
$active = trim($config->active);
if($active == '0'){
	echo msg('0',text_sorry_feature_disabled);
}else{
	$pk_zen = trim($config->zen);
	if(isset($_GET['cid'])){
		echo '<div style="margin-top: 10px;">';
		$id = safe_input($_GET['cid'],'');
		if(empty($id) || !is_numeric($id)){
			header('Location: '.$core_run_script.'');
			exit();
		}else{
			if(character_and_account($id,$user_auth_id) === false){
				header('Location: '.$core_run_script.'');
				exit();
			}else {
				if(account_online($user_auth_id) === true){
					echo msg('0',text_pk_t1);		
				}else{
					$select_req = $core_db->Execute("select money,pklevel from character where mu_id=? and accountid=?",array($id,safe_input($user_auth_id,'')));
					if($select_req->fields[1] <= 3){
						echo msg('0',text_pk_t2);
					}else{
						$required_pk_zen = $pk_zen*($select_req->fields[1] - 3);
						if($select_req->fields[0] < $required_pk_zen){
							echo msg('0',str_replace("{zen}",number_format($required_pk_zen - $select_req->fields[0]),text_pk_t3));
						}else{
							$new_zen = $select_req->fields[0] - $required_pk_zen;
							$update_pk_status = $core_db->Execute("Update character set [money]=?,[pklevel]=? where mu_id=?",array($new_zen,'3',$id));
							if($update_pk_status){
								echo msg('1',text_pk_t4);
							}else{
								echo msg('0',text_pk_t5);
							}
							
						}
					}
				}
			}
		}
	}
	echo '<div style="margin-top: 20px;">
<fieldset><legend>'.text_pk_t6.'</legend>
<table border="0" cellspacing="4" cellpadding="0" width="100%" style="padding-left: 10px;">
<tr>
<td align="left"><b>Zen:</b></td>
<td align="left" width="100%">'.str_replace("{zen}",number_format($pk_zen),str_replace("{total_zen}",number_format($pk_zen*2),text_pk_t7)).'</td>
</tr>
</table>
</fieldset>
</div>';
	
	$characters = $core_db->Execute("Select mu_id,name,class,money,pklevel,pkcount from character where accountid=? order by clevel desc ",array($user_auth_id));

	echo '<table border="0" cellspacing="4" cellpadding="0" width="100%" style="margin-top: 10px; margin-bottom: 10px;">';
	while (!$characters->EOF){
		if($characters->fields[4] > 3){
			$need_pk_zen = $pk_zen*($characters->fields[4] - 3);
			if($characters->fields[3] < $pk_zen){
				$lacking_error = '<span class="iR_func_status_lacking">'.str_replace("{zen}",number_format($need_pk_zen  - $characters->fields[3]),text_pk_t11).'</span>';
			}else{
				$lacking_error = '<input type="button" value="'.button_clear_pk.'" onclick="location.href=\''.$core_run_script.'&cid='.$characters->fields[0].'\'">';
			}
		}else{
			if($characters->fields[4] == '3'){
				$lacking_error = ''.text_pk_t8.'';
			}elseif ($characters->fields[4] == '2'){
				$lacking_error = ''.text_pk_t9.'';
			}elseif ($characters->fields[4] == '1'){
				$lacking_error = ''.text_pk_t10.'';
			}
		}
		echo '<tr>
    <td width="66" rowspan="2"><img src="template/'.$core['config']['template'].'/images/class/'.decode_class($characters->fields[2],'2').'" width="66" height="66" title="Class"></td>
    <td align="left" class="iR_name" width="100">'.htmlentities($characters->fields[1]).'</td>
    <td align="left" class="iR_stats">Zen: '.number_format($characters->fields[3]).'</td>
    <td align="left" class="iR_stats">Pk Status: '.decode_pk($characters->fields[4]).'</td>
    <td align="left" class="iR_stats">Pk Count: '.number_format($characters->fields[5]).'</td>
  </tr>
  <tr>
    <td algin="left" class="iR_class">'.decode_class($characters->fields[2]).'</td>
    <td colspan="3" class="iR_func_status" align="left">'.$lacking_error.'</td>
  </tr>
    <tr>
    <td colspan="5" class="iRg_line_top">&nbsp;</td>
  </tr>';
		$characters->MoveNext();
	}
	echo '</table>';
	
}
?>