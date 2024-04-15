<?
$config = simplexml_load_file('engine/config_mods/clear_pk_status_settings.xml');
$active = trim($config->active);
if($active == '0'){
	echo msg('0','Sorry, this feature is temporarily unavailable at the moment.');
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
					echo msg('0','Account is connected on game, please logout.');		
				}else{
					$select_req = $core_db->Execute("select money,pklevel from character where mu_id=? and accountid=?",array($id,safe_input($user_auth_id,'')));
					if($select_req->fields[1] <= 3){
						echo msg('0','Unable to clear pk status, reason: you not have not killed anyone. go kill some more to use this function.');
					}else{
						$required_pk_zen = $pk_zen*($select_req->fields[1] - 3);
						if($select_req->fields[0] < $required_pk_zen){
							echo msg('0','Unable to clear pk status, reason: lacking '.number_format($required_pk_zen - $select_req->fields[0]).' zen.');
						}else{
							$new_zen = $select_req->fields[0] - $required_pk_zen;
							$update_pk_status = $core_db->Execute("Update character set [money]=?,[pklevel]=? where mu_id=?",array($new_zen,'3',$id));
							if($update_pk_status){
								echo msg('1','Character successfully cleared.');
							}else{
								echo msg('0','Unable to clear pk status, reason: system error, please contact administrator.');
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
    <h3 class="panel-title">Clear PK Status Requirements</h3>
  </div>
  <div class="panel-body panel-fix">
    '.number_format($pk_zen).' / status (e.g: if you are murder level 2, you will need to pay '.number_format($pk_zen*2).'
  </div>
</div>
';
	
	$characters = $core_db->Execute("Select mu_id,name,class,money,pklevel,pkcount from character where accountid=? order by clevel desc ",array($user_auth_id));

	
	while (!$characters->EOF){
		if($characters->fields[4] > 3){
			$need_pk_zen = $pk_zen*($characters->fields[4] - 3);
			if($characters->fields[3] < $pk_zen){
				$lacking_error = '<span class="label label-danger">lacking '.number_format($need_pk_zen  - $characters->fields[3]).' zen</span>';
			}else{
				$lacking_error = '<input type="button" class="btn btn-primary btn-sm" value="Clear PK Status" onclick="location.href=\''.$core_run_script.'&cid='.$characters->fields[0].'\'">';
			}
		}else{
			if($characters->fields[4] == '3'){
				$lacking_error = '<span class="label label-danger">You are a coward nab, why don\'t you try and kill someone.</span>';
			}elseif ($characters->fields[4] == '2'){
				$lacking_error = '<span class="label label-danger">Wtg! Kill some more murderers and increase your hero\'s level status.</span>';
			}elseif ($characters->fields[4] == '1'){
				$lacking_error = '<span class="label label-danger">Hurray! Eradicate those nab murderers! You are a real hero.</span>';
			}
		}
		echo '
	<div class="panel panel-default panel-body-cont">
  <div class="panel-body panel-fix">
	<table class="table table-fix">';
		echo '<tr>
    <td width="66" rowspan="2"><img src="template/'.$core['config']['template'].'/images/class/'.decode_class($characters->fields[2],'2').'" width="66" height="66" title="Class"></td>
    <td align="left" class="iR_name" width="100">'.htmlentities($characters->fields[1]).'</td>
    <td align="left"><b>Zen:</b> '.number_format($characters->fields[3]).'</td>
    <td align="left"><b>Pk Status:</b> '.decode_pk($characters->fields[4]).'</td>
    <td align="left"><b>Pk Count:</b> '.number_format($characters->fields[5]).'</td>
  </tr>
  <tr>
    <td algin="left">'.decode_class($characters->fields[2]).'</td>
    <td colspan="3">'.$lacking_error.'</td>
  </tr>
';
echo '</table>
	</div>
</div>';
		$characters->MoveNext();
	}
	
}
?>