<?
//$config = simplexml_load_file('../engine/config_mods/mu_coins_settings.xml');
$config2 = simplexml_load_file('../engine/config_mods/mu_coins_settings.xml');
if(isset($_POST['add'])){
	            $mucoins = safe_input($_POST['mucoins'],'');
	            $mucoins2 = safe_input($_POST['mucoins2'],'');
				$id = safe_input($_POST['userid'],'');
				if($config2->credits_database==1){
					$update = $core_db->Execute("Update ".$config2->credits_table." set ".$config2->credits_column."=".$config2->credits_column."+?  where ".$config2->user_column."=?",array($mucoins,$id));
				}else{
					$update = $core_db2->Execute("Update ".$config2->credits_table." set ".$config2->credits_column."=".$config2->credits_column."+?  where ".$config2->user_column."=?",array($mucoins,$id));
				}
				
				if($config2->credits2_database==1){
					$update2 = $core_db->Execute("Update ".$config2->credits2_table." set ".$config2->credits2_column."=".$config2->credits2_column."+?  where ".$config2->user2_column."=?",array($mucoins2,$id));
				}else{
					$update2 = $core_db2->Execute("Update ".$config2->credits2_table." set ".$config2->credits2_column."=".$config2->credits2_column."+?  where ".$config2->user2_column."=?",array($mucoins2,$id));
				}
				
				if($update){
					echo notice_message_admin('MU Coins successfully added',1,0,'index.php?get=mucoins_add');
				}else{
					echo notice_message_admin('Unable to add MU Coins, system error.','0','1','0');
				}
				
}elseif(isset($_POST['edit'])){
		if(empty($_POST['userid'])){
			echo notice_message_admin('Some fields where left blank.','0','1','0');
		}else{
		$id = safe_input($_POST['userid'],'');
		if($config2->credits_database==1){
			$info = $core_db->Execute("Select ".$config2->user_column.",".$config2->credits_column." from ".$config2->credits_table." where ".$config2->user_column."=?",array($id));
		}else{
			$info = $core_db2->Execute("Select ".$config2->user_column.",".$config2->credits_column." from ".$config2->credits_table." where ".$config2->user_column."=?",array($id));
		}

		if($config2->credits2_database==1){
			$info2 = $core_db->Execute("Select ".$config2->user2_column.",".$config2->credits2_column." from ".$config2->credits2_table." where ".$config2->user2_column."=?",array($id));
		}else{
			$info2 = $core_db2->Execute("Select ".$config2->user2_column.",".$config2->credits2_column." from ".$config2->credits2_table." where ".$config2->user2_column."=?",array($id));	
		}
		
		
		if($info->EOF){
			echo notice_message_admin('No account found.','0','1','0');
		}else{
			if(empty($_POST['mucoins'])){
				$mucoins = '0';
			}else{
				$mucoins = safe_input($_POST['mucoins'],'');
			}
			if(empty($_POST['mucoins2'])){
				$mucoins2 = '0';
			}else{
				$mucoins2 = safe_input($_POST['mucoins2'],'');
			}
			
			
				echo '

	<div align="right" style="width: 90%; margin-bottom: 2px;"><a href="index.php?get=mucoins_add">[Return Add MU Coins]</a></div>
	<form action="" method="POST" name="forum">
	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_panel">
	<tr>
	 <td align="center" class="panel_title" colspan="2">Add MU Coins (User ID: '.htmlspecialchars($info->fields[0]).')</td>
	</tr>
	
	<tr>
	<td align="left" class="panel_title_sub" colspan="2">'.$config2->money_name1.'</td>
	</tr>
	<tr>
	<td align="left" class="panel_text_alt1" width="50%">The amount between account\'s '.$config2->money_name1.' and amount you set.</td>
	<td align="left" class="panel_text_alt2" width="50%">'.number_format($info->fields[1]).' + <b>'.number_format($mucoins).'</b> = <b>'.number_format($info->fields[1]+$mucoins).'</b></td>
	</tr>

	<tr>
	<td align="left" class="panel_title_sub" colspan="2">'.$config2->money_name2.'</td>
	</tr>
	<tr>
	<td align="left" class="panel_text_alt1" width="50%">The amount between account\'s '.$config2->money_name2.' and amount you set.</td>
	<td align="left" class="panel_text_alt2" width="50%">'.number_format($info2->fields[1]).' + <b>'.number_format($mucoins2).'</b> = <b>'.number_format($info2->fields[1]+$mucoins2).'</b></td>
	</tr>

		<tr>
	<td align="center" class="panel_buttons" colspan="2">
	<input type="hidden" name="add"><input type="hidden" name="userid" value="'.$info->fields[0].'">
	<input type="hidden" name="mucoins" value="'.$mucoins.'">
	<input type="hidden" name="mucoins2" value="'.$mucoins2.'">
	<input type="submit" class="btn btn-block btn-success btn-200" value="Add MU Coins" onclick="return ask_form(\'Are you sure?\')"></td>	</tr>
	</table>
	</form>';
			}
			
		}
			
		
		
	
	
}else{
	echo '<form action="" method="POST" name="forum">
	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_panel">
	<tr>
	 <td align="center" class="panel_title" colspan="2">Add MU Coins</td>
	</tr>
	
	<tr>
	<td align="left" class="panel_title_sub" colspan="2">User ID</td>
	</tr>
	<tr>
	<td align="left" class="panel_text_alt1" width="50%">Enter account\'s User ID </td>
	<td align="left" class="panel_text_alt2" width="50%"><input type="text" class="form-control" name="userid" ></td>
	</tr>
	<tr>
	<td align="left" class="panel_title_sub" colspan="2">'.$config2->money_name1.'</td>
	</tr>
	<tr>
	<td align="left" class="panel_text_alt1" width="50%">Enter amount you want to add.</td>
	<td align="left" class="panel_text_alt2" width="50%"><input type="text" class="form-control" name="mucoins"></td>
	</tr>
	<tr>
	<td align="left" class="panel_title_sub" colspan="2">'.$config2->money_name2.'</td>
	</tr>
	<tr>
	<td align="left" class="panel_text_alt1" width="50%">Enter amount you want to add.</td>
	<td align="left" class="panel_text_alt2" width="50%"><input type="text" class="form-control" name="mucoins2"></td>
	</tr>

		<tr>
	<td align="center" class="panel_buttons" colspan="2">
	<input type="hidden" name="edit">
	<input type="submit" class="btn btn-block btn-success btn-200" value="Add MU Coins"></td>
	</tr>
	</table>
	</form>';
}
?>