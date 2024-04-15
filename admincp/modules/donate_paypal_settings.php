<?
if(isset($_POST['settings'])){
	$save_1 = new_config_xml('../engine/config_mods/donate_paypal_settings','pp_email',safe_input($_POST['pp_email'],'\#\.\_\@\-'));
	$save_2 = new_config_xml('../engine/config_mods/donate_paypal_settings','testing',safe_input($_POST['testing'],'\#\.\_\@\-'));
	$save_3 = new_config_xml('../engine/config_mods/donate_paypal_settings','punish',safe_input($_POST['punish'],'\#\.\_\@\-'));
	echo notice_message_admin('Settings successfully saved',1,0,'index.php?get=donate_paypal_settings');
	
}else {
		if(isset($_POST['module_active'])){
			$save_status = new_config_xml('../engine/config_mods/donate_paypal_settings','active',safe_input($_POST['module_active'],''));
		}
		$get_config = simplexml_load_file('../engine/config_mods/donate_paypal_settings.xml');
		echo '<form action="" name="settings" method="POST">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_panel" style="margin-bottom: 20px;">
<tr>
 <td align="center" class="panel_title" colspan="2">PayPal Settings</td>
</tr>
<tr>';
		if($get_config->active == '1'){
			echo '<td align="left" class="panel_buttons" style="background: #00a65a; color:#fff;"><b>Donate with PayPal is active.</b></td>
<td align="right" class="panel_buttons" style="background: #00a65a; color:#fff;">
<input type="hidden" name="edit_settings"><input type="submit" value="Turn Donate with PayPal Off" class="btn btn-block btn-danger btn-200"><input type="hidden" name="module_active" value="0">';
		
			
		}elseif ($get_config->active == '0'){
			echo '<td align="left" class="panel_buttons" style="background: #dd4b39; color:#fff;"><b>Donate with PayPal is inactive.</b></td>
<td align="right" class="panel_buttons" style="background: #dd4b39; color:#fff;">
<input type="hidden" name="edit_settings"><input type="submit" value="Turn Donate with PayPal On" class="btn btn-block btn-success btn-200"><input type="hidden" name="module_active" value="1">';
		}
		echo '</td>
</tr>
</table>
</form>';
		
		
		
		echo '
<form action="" name="form_edit" method="POST">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_panel">
<tr>
 <td align="center" class="panel_title" colspan="2">PaPal Settings</td>
</tr>
<tr>
<td align="left" class="panel_title_sub" colspan="2">PayPal Email Address</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Enter paypal email address.</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top">
<input type="text" class="form-control" value="'.$get_config->pp_email.'" name="pp_email"><br>
</td>
</tr>

<tr>
<td align="left" class="panel_title_sub" colspan="2">Activar Tesing</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Seleccione Yes solo si va a probar la funcionalidad, para funcion correcta elija NO</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top">';
				switch ($get_config->testing){
		case '0': echo '<label><input type="radio" class="minimal" name="testing" value="1">Yes</label> <label><input type="radio" class="minimal" name="testing" checked="checked" value="0">No</label>'; break;
		case '1': echo '<label><input type="radio" class="minimal" name="testing" value="1" checked="checked">Yes</label> <label><input type="radio" class="minimal" name="testing" value="0">No</label>'; break;
	}
	
		echo '
</td>
</tr>

<tr>
<td align="left" class="panel_title_sub" colspan="2">Chargeback Punish</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">If set to \'Yes\' user\'s account will be blocked if him make an paypal chargeback or payment is refunded.</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top">';
				switch ($get_config->punish){
		case '0': echo '<label><input type="radio" class="minimal" name="punish" value="1">Yes</label> <label><input type="radio" class="minimal" name="punish" checked="checked" value="0">No</label>'; break;
		case '1': echo '<label><input type="radio" class="minimal" name="punish" value="1" checked="checked">Yes</label> <label><input type="radio" class="minimal" name="punish" value="0">No</label>'; break;
	}
	
		echo '
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