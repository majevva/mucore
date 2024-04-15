<?
//$config = simplexml_load_file('../engine/config_mods/mu_coins_settings.xml');
$config2 = simplexml_load_file('../engine/config_mods/mu_coins_settings.xml');
if(isset($_GET['mod'])){
	if(empty($_GET['id'])){
		echo notice_message_admin('Unable to proceed your request.','0','1','0');
	}else{
		$id = safe_input($_GET['id'],'');
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
			echo notice_message_admin('Unable to find account.','0','1','0');
		}else{
			if(isset($_POST['edit'])){
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
				if($config2->credits_database==1){
					$update = $core_db->Execute("Update ".$config2->credits_table." set ".$config2->credits_column."=? where ".$config2->user_column."=?",array($mucoins,$id));
				}else{
					$update = $core_db2->Execute("Update ".$config2->credits_table." set ".$config2->credits_column."=? where ".$config2->user_column."=?",array($mucoins,$id));
				}

				if($config2->credits2_database==1){
					$update2 = $core_db->Execute("Update ".$config2->credits2_table." set ".$config2->credits2_column."=? where ".$config2->user2_column."=?",array($mucoins2,$id));
				}else{
					$update2 = $core_db2->Execute("Update ".$config2->credits2_table." set ".$config2->credits2_column."=? where ".$config2->user2_column."=?",array($mucoins2,$id));
				}
				
				
				if($update){
					echo notice_message_admin('Account\'s MU Coins successfully edited',1,0,'index.php?get=mucoins_manager&mod=edit&id='.$id.'');
				}else{
					echo notice_message_admin('Unable to edit account\'s MU Coins, system error.','0','1','0');
				}
				
			}else{
				echo '

	<div align="right" style="width: 90%; margin-bottom: 2px;"><a href="index.php?get=mucoins_manager">[Return MU Coins Manager]</a></div>
	<form action="" method="POST" name="forum">
	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_panel">
	<tr>
	 <td align="center" class="panel_title" colspan="2">Edit MU Coins (User ID: '.htmlspecialchars($info->fields[0]).')</td>
	</tr>
	
	<tr>
	<td align="left" class="panel_title_sub" colspan="2">'.$config2->money_name1.'</td>
	</tr>
	<tr>
	<td align="left" class="panel_text_alt1" width="50%">Account\'s '.$config2->money_name1.'</td>
	<td align="left" class="panel_text_alt2" width="50%"><input type="text" class="form-control" name="mucoins" value="'.$info->fields[1].'"></td>
	</tr>

	<tr>
	<td align="left" class="panel_title_sub" colspan="2">'.$config2->money_name2.'</td>
	</tr>
	<tr>
	<td align="left" class="panel_text_alt1" width="50%">Account\'s '.$config2->money_name2.'</td>
	<td align="left" class="panel_text_alt2" width="50%"><input type="text" class="form-control" name="mucoins2" value="'.$info2->fields[1].'"></td>
	</tr>

		<tr>
	<td align="center" class="panel_buttons" colspan="2">
	<input type="hidden" name="edit">
	<input type="submit" class="btn btn-block btn-success btn-200" value="Edit MU Coins" onclick="return ask_form(\'Are you sure?\')">&nbsp;<input class="btn btn-block btn-danger btn-200" type="reset" value="Reset"></td>
	</tr>
	</table>
	</form>';
			}
		}
	}
	
}else{
	echo '
<form action="" name="form_edit" method="POST">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_panel">
<tr>
 <td align="center" class="panel_title" colspan="2">Search Account\'s MU Coins</td>
</tr>
<tr>
<td align="left" class="panel_title_sub" colspan="2">User ID</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">
Enter User ID of account which you want to find.</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top">
';
		if(isset($_SESSION['search_user'])){
			if(isset($_POST['user'])){
				echo '<input type="text" class="form-control" value="'.$_POST['user'].'" name="user">';
			}else{
				echo '<input type="text" class="form-control" value="'.$_SESSION['search_user'].'" name="user">';
			}
			
		}else{
			echo '<input type="text" class="form-control" name="user">';
		}
		echo '
<br>
</td>
</tr>

<tr>
<td align="left" class="panel_title_sub" colspan="2">Search Criteria</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">
Select search type.<br<br><b>Exact Match</b> - Will search for exact match of use id you enter.
<br><b>Partial Match</b> - Will search for a partial match of user id you enter.<br><br>Note: If you choose \'Partial Match\' only first 100 matches will be displayed.</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top">';
		if(isset($_SESSION['search_t'])){
			if(isset($_POST['search_t'])){
				switch ($_POST['search_t']){
					case '0': echo '<label><input type="radio" class="minimal" name="search_t" value="1">Exact Match</label> <label><input type="radio" class="minimal" name="search_t" value="0"  checked="checked">Partial Match</label>'; break;
					case '1': echo '<label><input type="radio" class="minimal" name="search_t" value="1" checked="checked">Exact Match</label> <label><input type="radio" class="minimal" name="search_t" value="0"  >Partial Match</label>'; break;
				}
			}else{
				switch ($_SESSION['search_t']){
					case '0': echo '<label><input type="radio" class="minimal" name="search_t" value="1">Exact Match</label> <label><input type="radio" class="minimal" name="search_t" value="0"  checked="checked">Partial Match</label>'; break;
					case '1': echo '<label><input type="radio" class="minimal" name="search_t" value="1" checked="checked">Exact Match</label> <label><input type="radio" class="minimal" name="search_t" value="0"  >Partial Match</label>'; break;
				}
			}
			
		}else{
			echo '<label><input type="radio" class="minimal" name="search_t" value="1" checked="checked">Exact Match</label> <label><input type="radio" class="minimal" name="search_t" value="0"  >Partial Match</label>';
		}
		
		echo '

</td>
</tr>




<tr>
<td align="right" class="box-footer" colspan="2">
<input type="hidden" name="search">
<input type="submit" class="btn btn-block btn-success btn-200" value="Search"></td>
</tr>
</table>
</form>
';
		

		
		if(isset($_POST['search'])){
			if(!empty($_POST['user'])){
				$_SESSION['search_user'] = $_POST['user'];
				$_SESSION['search_t'] = $_POST['search_t'];
				$userid = safe_input($_POST['user'],'');
			
			echo '
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_panel" style="margin-top: 20px;">
<tr>
 <td align="center" class="panel_title" colspan="5">Search Results</td>
</tr>
<tr>
<td align="left" class="panel_title_sub2">User ID</td>
<td align="left" class="panel_title_sub2">'.$config2->money_name1.'</td>
<td align="left" class="panel_title_sub2">'.$config2->money_name2.'</td>
<td align="left" class="panel_title_sub2" width="50">Controls</td>
</tr>';

			if($_POST['search_t'] == '1'){
				if($config2->credits_database==1){
					$user = $core_db->Execute("Select ".$config2->user_column." from ".$config2->credits_table." where ".$config2->user_column."=?",array($userid));
				}else{
					$user = $core_db2->Execute("Select ".$config2->user_column." from ".$config2->credits_table." where ".$config2->user_column."=?",array($userid));
				}
				
				
				if(!$user->EOF){
					header('Location: index.php?get=mucoins_manager&mod=edit&id='.$user->fields[0].'');
				}else{
					$not_found = '1';
				}
				
			}elseif ($_POST['search_t'] == '0'){
				if($config2->credits_database==1){
					$user = $core_db->Execute("Select top 100 ".$config2->user_column.",".$config2->credits_column.",".$config2->credits2_column." from ".$config2->credits_table." where ".$config2->user_column." like ? order by ".$config2->credits_column." desc",array('%'.$userid.'%'));
				}else{
					$user = $core_db2->Execute("Select top 100 ".$config2->user_column.",".$config2->credits_column.",".$config2->credits2_column." from ".$config2->credits_table." where ".$config2->user_column." like ? order by ".$config2->credits_column." desc",array('%'.$userid.'%'));
				}
				
				$count = 0;
				while (!$user->EOF){
					$count++;
					$tr_color = ($count % 2) ? '' : 'even'; 
					echo '<tr class="'.$tr_color.'">
			<td align="left" class="panel_text_alt_list"><strong>'.htmlspecialchars($user->fields[0]).'</strong></td>
			<td align="left" class="panel_text_alt_list" >'.number_format($user->fields[1]).'</td>
			<td align="left" class="panel_text_alt_list" >'.number_format($user->fields[2]).'</td>
			<td align="left" class="panel_text_alt_list"><a href="index.php?get=mucoins_manager&mod=edit&id='.$user->fields[0].'">[Edit]</a></td>
			</tr>';
					$user->MoveNext();
				}
				if($count == '0'){
				echo '<tr><td align="center" class="panel_text_alt_list" colspan="5">No Accounts Found</td></tr>';
			}
				
				
			}
			
			if($not_found == '1'){
				echo '<tr><td align="center" class="panel_text_alt_list" colspan="5">No Accounts Found</td></tr>';
			}
			echo '</table>';
				
			}
		}else{
						echo '
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_panel" style="margin-top: 20px;">
<tr>
 <td align="center" class="panel_title" colspan="5">Top 50 MU Coins</td>
</tr>
<tr>
<td align="left" class="panel_title_sub2">User ID</td>
<td align="left" class="panel_title_sub2">'.$config2->money_name1.'</td>
<td align="left" class="panel_title_sub2">'.$config2->money_name2.'</td>
<td align="left" class="panel_title_sub2" width="50">Controls</td>
</tr>';
				if($config2->credits_database==1){
					$user = $core_db->Execute("Select top 50 ".$config2->user_column.",".$config2->credits_column.",".$config2->credits2_column." from ".$config2->credits_table." where ".$config2->credits_column." > 0 or ".$config2->credits2_column." > 0 order by ".$config2->credits_column." desc");
				}else{
					$user = $core_db2->Execute("Select top 50 ".$config2->user_column.",".$config2->credits_column.",".$config2->credits2_column." from ".$config2->credits_table." where ".$config2->credits_column." > 0 or ".$config2->credits2_column." > 0 order by ".$config2->credits_column." desc");
				}
				
				$count = 0;
				while (!$user->EOF){
					$count++;
					$tr_color = ($count % 2) ? '' : 'even'; 
					echo '<tr class="'.$tr_color.'">
			<td align="left" class="panel_text_alt_list"><strong>'.htmlspecialchars($user->fields[0]).'</strong></td>
			<td align="left" class="panel_text_alt_list" >'.number_format($user->fields[1]).'</td>
			<td align="left" class="panel_text_alt_list" >'.number_format($user->fields[2]).'</td>
			<td align="left" class="panel_text_alt_list"><a href="index.php?get=mucoins_manager&mod=edit&id='.$user->fields[0].'">[Edit]</a></td>
			</tr>';
					$user->MoveNext();
				}
				if($count == '0'){
				echo '<tr><td align="center" class="panel_text_alt_list" colspan="5">No Accounts Found</td></tr>';
			}
				
				
				echo '</table>';
				
				
						
						
			
		}
}
?>