<?
if(isset($_POST['settings'])){
		require('../engine/announcement_config.php');
		$new_db = fopen("../engine/announcement_config.php", "w");
		$data = "<?\r\n";
		$data .="\$core['ANNOUNCEMENT']['ACTIVE'] = \"".$core['ANNOUNCEMENT']['ACTIVE']."\";\r\n"; 
		$data .="\$core['ANNOUNCEMENT']['EXIST'] = \"".$core['ANNOUNCEMENT']['EXIST']."\";\r\n"; 
		$data .="\$core['ANNOUNCEMENT']['AUTHOR'] = \"".safe_input($_POST['author'],'')."\";\r\n"; 
		$data .="?>";
		fwrite($new_db,$data);
		fclose($new_db);
		echo notice_message_admin('Settings successfully saved',1,0,'index.php?get=announcements_settings');
		
	
}else{
	if(isset($_POST['module_active'])){
		require('../engine/announcement_config.php');
		$new_db = fopen("../engine/announcement_config.php", "w");
		$data = "<?\r\n";
		$data .="\$core['ANNOUNCEMENT']['ACTIVE'] = \"".safe_input($_POST['module_active'],'')."\";\r\n"; 
		$data .="\$core['ANNOUNCEMENT']['EXIST'] = \"".$core['ANNOUNCEMENT']['EXIST']."\";\r\n"; 
		$data .="\$core['ANNOUNCEMENT']['AUTHOR'] = \"".$core['ANNOUNCEMENT']['AUTHOR']."\";\r\n"; 
		$data .="?>";
		fwrite($new_db,$data);
		fclose($new_db);

	}

		
		require('../engine/announcement_config.php');
		
		echo '<form action="" name="settings" method="POST">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_panel" style="margin-bottom: 20px;">
<tr>
 <td align="center" class="panel_title" colspan="2">Turn Announcements On and Off</td>
</tr>
<tr>';
		if($core['ANNOUNCEMENT']['ACTIVE'] == '1'){
			echo '<td align="left" class="panel_buttons" style="background: #00a65a; color:#fff;"><b>Announcements are active.</b></td>
<td align="right" class="panel_buttons" style="background: #00a65a; color:#fff;">
<input type="hidden" name="edit_settings"><input type="submit" value="Turn Announcements Off" class="btn btn-block btn-danger btn-200"><input type="hidden" name="module_active" value="0">';
		
			
		}elseif ($core['ANNOUNCEMENT']['ACTIVE'] == '0'){
			echo '<td align="left" class="panel_buttons" style="background: #dd4b39; color:#fff;"><b>Announcements are inactive.</b></td>
<td align="right" class="panel_buttons" style="background: #dd4b39; color:#fff;">
<input type="hidden" name="edit_settings"><input type="submit" value="Turn Announcements On" class="btn btn-block btn-success btn-200"><input type="hidden" name="module_active" value="1">';
		}
		echo '</td>
</tr>




</table>
</form>';
		
		
		echo '
<form action="" name="form_edit" method="POST">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_panel">
<tr>
 <td align="center" class="panel_title" colspan="2">Announcements Settings</td>
</tr>


<tr>
<td align="left" class="panel_title_sub" colspan="2">Show Administrator Nickname</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">When \'Yes\' Administrator Nickname will appear on announcement.
</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top">';
		switch ($core['ANNOUNCEMENT']['AUTHOR']){
		case '0': echo '<label><input type="radio" class="minimal" name="author" value="1">Yes</label> <label><input type="radio" class="minimal" name="author" checked="checked" value="0">No</label>'; break;
		case '1': echo '<label><input type="radio" class="minimal" name="author" value="1" checked="checked">Yes</label> <label><input type="radio" class="minimal" name="author" value="0">No</label>'; break;
	}
	
	
	echo '</td>
</tr>



<tr>
<td align="right" class="box-footer" colspan="2">
<input type="hidden" name="settings">
<input type="submit" class="btn bg-olive margin" value="Save"></td>
</tr>
</table>
</form>
';
	
	
}
?>