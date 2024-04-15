<?
if(isset($_POST['settings'])){
	if(empty($_POST['precio'])){
		echo notice_message_admin('Error some fields where left blank.','0','1','0');
	}else{
		$save_2 = new_config_xml('../engine/config_mods/aoh_quest_manager','precio',$_POST['precio']);
		$save_2 = new_config_xml('../engine/config_mods/aoh_quest_manager','resets',$_POST['resets']);
		echo notice_message_admin('Settings successfully saved',1,0,'index.php?get=aoh_quest_manager');
	}
	
}else{
	if(isset($_POST['module_active'])){
			$save_status = new_config_xml('../engine/config_mods/aoh_quest_manager','active',safe_input($_POST['module_active'],''));
		}
		$get_config = simplexml_load_file('../engine/config_mods/aoh_quest_manager.xml');
		echo '<form action="" name="settings" method="POST">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_panel" style="margin-bottom: 20px;">
<tr>
 <td align="center" class="panel_title" colspan="2">QUEST Manager Settings</td>
</tr>
<tr>';
		if($get_config->active == '1'){
			echo '<td align="left" class="panel_buttons" style="background: #00a65a; color:#fff;"><b>QUEST Manager is active.</b></td>
<td align="right" class="panel_buttons" style="background: #00a65a; color:#fff;">
<input type="hidden" name="edit_settings"><input type="submit" value="Turn QUEST Manager Off" class="btn btn-block btn-danger btn-200"><input type="hidden" name="module_active" value="0">';
		
			
		}elseif ($get_config->active == '0'){
			echo '<td align="left" class="panel_buttons" style="background: #dd4b39; color:#fff;"><b>QUEST Manager is inactive.</b></td>
<td align="right" class="panel_buttons" style="background: #dd4b39; color:#fff;">
<input type="hidden" name="edit_settings"><input type="submit" value="Turn QUEST Manager On" class="btn btn-block btn-success btn-200"><input type="hidden" name="module_active" value="1">';
		}
		echo '</td>
</tr>
</table>
</form>';
		
		
		echo '
<form action="" name="form_edit" method="POST">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_panel">
<tr>
 <td align="center" class="panel_title" colspan="2">QUEST Manager Settings</td>
</tr>

<tr>
<td align="left" class="panel_title_sub" colspan="2">Precio en Zen</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">.</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top">
<input type="text" class="form-control" value="'.$get_config->precio.'" name="precio"><br>
</td>
</tr>

<tr>
<td align="left" class="panel_title_sub" colspan="2">Resets Minimos requeridos</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">.</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top">
<input type="text" class="form-control" value="'.$get_config->resets.'" name="resets"><br>
</td>
</tr>

<tr>
<td align="right" class="box-footer" colspan="2">
<input type="hidden" name="settings">
<input type="submit" class="btn bg-olive margin" value="Save"></td>
</tr>
</table>
</form>';
}
?>