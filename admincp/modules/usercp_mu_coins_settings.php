<?
if(isset($_POST['settings'])){
	$save_3 = new_config_xml('../engine/config_mods/mu_coins_settings','buy_url',$_POST['buy_url']);
	echo notice_message_admin('Settings successfully saved',1,0,'index.php?get=usercp_mu_coins_settings');
}else{
	if(isset($_POST['module_active'])){
			$save_status = new_config_xml('../engine/config_mods/mu_coins_settings','active',safe_input($_POST['module_active'],''));
		}
		$get_config = simplexml_load_file('../engine/config_mods/mu_coins_settings.xml');
		echo '<form action="" name="settings" method="POST">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_panel" style="margin-bottom: 20px;">
<tr>
 <td align="center" class="panel_title" colspan="2">Mu Coins Settings</td>
</tr>
<tr>';
		if($get_config->active == '1'){
			echo '<td align="left" class="panel_buttons" style="background: #00a65a; color:#fff;"><b>Clear MU Coins is active.</b></td>
<td align="right" class="panel_buttons" style="background: #00a65a; color:#fff;">
<input type="hidden" name="edit_settings"><input type="submit" value="Turn MU Coins Off" class="btn btn-block btn-danger btn-200"><input type="hidden" name="module_active" value="0">';
		
			
		}elseif ($get_config->active == '0'){
			echo '<td align="left" class="panel_buttons" style="background: #dd4b39; color:#fff;"><b>Clear MU Coins is inactive.</b></td>
<td align="right" class="panel_buttons" style="background: #dd4b39; color:#fff;">
<input type="hidden" name="edit_settings"><input type="submit" value="Turn MU Coins On" class="btn btn-block btn-success btn-200"><input type="hidden" name="module_active" value="1">';
		}
		echo '</td>
</tr>
</table>
</form>';
		
		
				echo '
<form action="" name="form_edit" method="POST">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_panel">
<tr>
 <td align="center" class="panel_title" colspan="2">MU Coins Settings</td>
</tr>

<tr>
<td align="left" class="panel_title_sub" colspan="2">Buy URL</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Set the Buy MU Coins url. <br><br>Note: Must begin with <b>http://</b></td>
<td align="left" class="panel_text_alt2" width="45%" valign="top">
<input type="text" class="form-control" value="'.$get_config->buy_url.'" name="buy_url"><br>
</td>
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