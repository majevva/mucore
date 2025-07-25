<?
$config = simplexml_load_file('engine/config_mods/clear_inventory_settings.xml');
$active = trim($config->active);
if($active == '0'){
	echo msg('0',text_sorry_feature_disabled);
}else{

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
					echo msg('0',text_clearinventory_t1);		
				}else{
					$clear = $core_db->Execute("Update character set [inventory]=CONVERT(varbinary(1080), null) where mu_id=?",array($id));
					if($clear){
						echo msg('1',text_clearinventory_t2);
					}else{
						echo msg('0',text_clearinventory_t3);
					}
				}
			}
		}
		echo '</div>';
	}

	echo '
<div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">'.text_clearinventory_t4.'</h3>
  </div>
  <div class="panel-body panel-fix">
    '.text_clearinventory_t5.'
  </div>
</div>
';

	$characters = $core_db->Execute("Select mu_id,name,class from character where accountid=? order by clevel desc ",array($user_auth_id));

	
	while (!$characters->EOF){
	echo '
	<div class="panel panel-default panel-body-cont">
  <div class="panel-body panel-fix">
	<table class="table-fix">';
		echo '
<tr>
    <td width="66" rowspan="2"><img src="template/'.$core['config']['template'].'/images/class/'.decode_class($characters->fields[2],'2').'" width="66" height="66" title="Class"></td>
     <td align="left" class="iR_name" width="100">'.htmlentities($characters->fields[1]).'</td>
    <td rowspan="2">
    <input type="button"  class="btn btn-primary btn-sm" value="Vaciar Inventario" onclick="ask_url(\''.text_clearinventory_t6.'\',\''.$core_run_script.'&cid='.$characters->fields[0].'\');">
    </td>
</tr>
  <tr>
    <td algin="left">'.decode_class($characters->fields[2]).'</td>
  </tr>';
		
	echo '</table>
	</div>
</div>';
		$characters->MoveNext();
	}

	
	
}
?>