<?
if(isset($_POST['active'])){
	if(empty($_POST['activate_code_delete'])){
			echo notice_message_admin('No User IDs selected.',0,1,0);
		}else{
			$count = 0;
			foreach ($_POST['activate_code_delete'] as $post_name => $post_code){
				$activate_user = $core_db2->Execute("Update memb_info set bloc_code='0',confirmed='1' where memb_guid=?",array($post_code));
				if($activate_user){
					$count++;
				}
			}
			echo notice_message_admin('<b>'.$count.'</b> users ids successfully activated.',1,0,'index.php?get=users_activate');
		}
		
	
}elseif (isset($_GET['activate'])){
	if(empty($_GET['activate'])){
		echo notice_message_admin('Unable to proceed your request.','1','1','index.php?get=users_activate');
	}else{
		$id = safe_input($_GET['activate'],'');
		$activate_user = $core_db2->Execute("Update memb_info set bloc_code='0',confirmed='1' where memb_guid=?",array($id));
		if($activate_user){
			echo notice_message_admin('Uers successfully activated.',1,0,'index.php?get=users_activate');
		}else{
			echo notice_message_admin('Unable to proceed your request.','1','1','index.php?get=users_activate');
		}
	}
	
}elseif (isset($_GET['delete'])){
	if(empty($_GET['delete'])){
		echo notice_message_admin('Unable to proceed your request.','1','1','index.php?get=users_activate');
	}else{
		$id = safe_input($_GET['delete'],'');
		$delete_user = $core_db2->Execute("Delete from memb_info where memb_guid=?",array($id));
		if($delete_user){
			echo notice_message_admin('Uers successfully deleted.',1,0,'index.php?get=users_activate');
		}else{
			echo notice_message_admin('Unable to proceed your request.','1','1','index.php?get=users_activate');
		}
	}
}else{
	
	echo '<form action="" method="POST" name="delete_archive" onclick="cCheck(document.delete_archive,\'activate_code_delete[]\',\'archive_selected\',\'Activate Selected\');"><input type="hidden" name="masive_delete">
	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_panel" style="margin-top: 20px">
<tr>
 <td align="center" class="panel_title" colspan="5">Users Awaiting Activation</td>
</tr>
<tr>
<td align="left" class="panel_title_sub2">User ID</td>
<td align="left" class="panel_title_sub2">Email Address</td>
<td align="left" class="panel_title_sub2">Controls</td>
</tr>
	
	';
	
	
	
	$take_accounts = $core_db2->Execute("Select memb_guid,memb___id,mail_addr from memb_info where confirmed='0'");
	$count=0;
	while (!$take_accounts->EOF){
		$count++;
		$tr_color = ($count % 2) ? '' : 'even'; 
		echo '<tr class="'.$tr_color.'">
			<td align="left" class="panel_text_alt_list"><strong>'.$take_accounts->fields[1].'</strong></td>
			<td align="left" class="panel_text_alt_list">'.$take_accounts->fields[2].'</td>
			<td align="left" class="panel_text_alt_list" width="120"><a href="#" onclick="ask_url(\'Are you sure you want activate User ID : '.$take_accounts->fields[1].'?\',\'index.php?get=users_activate&activate='.$take_accounts->fields[0].'\')";>[Activate]</a> / <a href="#" onclick="ask_url(\'Are you sure you want delete User ID : '.$take_accounts->fields[1].'?\',\'index.php?get=users_activate&delete='.$take_accounts->fields[0].'\')";>[Delete]</a>&nbsp;<input name="activate_code_delete[]" type="checkbox"  value="'.$take_accounts->fields[0].'"></td></tr>
			';
		$take_accounts->MoveNext();
	}
	if($count == '0'){
		echo '<tr>
		<td align="center" colspan="3" class="panel_text_alt_list"><em>No users</em></td>
		</tr>';
	}
	echo '<tr>
<td align="center" class="panel_buttons" colspan="3">
<div id=""><div align="right">
<input type="hidden" name="active"><a href="javascript:void(0)" onclick="CheckAll(document.delete_archive,\'activate_code_delete[]\'); ">[Check All]</a> <a href="javascript:void(0)" onclick="UnCheckAll(document.delete_archive,\'activate_code_delete[]\'); ">[Uncheck All]</a><br><br>
<input type="submit" class="btn btn-block btn-success btn-200" name="archive_selected" id="archive_selected" value="Activate Selected (0)" onclick="return ask_form(\'Are you sure you want to activate selected User IDs?\')"> </div>


</tr>
</table></form>';
}
?>