<?
if(isset($_POST['settings'])){
	if(empty($_POST['master_level']) || empty($_POST['master_points']) || empty($_POST['master_table']) || empty($_POST['master_colum_Level']) || empty($_POST['master_colum_Points'])){
		echo notice_message_admin('Error some fields where left blank.','0','1','0');
	}else{
		$save_1 = new_config_xml('../engine/config_mods/aoh_master_reset','master_level',safe_input($_POST['master_level'],''));
		$save_2 = new_config_xml('../engine/config_mods/aoh_master_reset','master_points',safe_input($_POST['master_points'],''));
		$save_3 = new_config_xml('../engine/config_mods/aoh_master_reset','master_clear_skills',safe_input($_POST['master_clear_skills'],''));
		$save_4 = new_config_xml('../engine/config_mods/aoh_master_reset','master_table',safe_input($_POST['master_table'],''));
		$save_5 = new_config_xml('../engine/config_mods/aoh_master_reset','master_colum_Level',safe_input($_POST['master_colum_Level'],''));
		$save_6 = new_config_xml('../engine/config_mods/aoh_master_reset','master_colum_Points',safe_input($_POST['master_colum_Points'],''));
		$save_7 = new_config_xml('../engine/config_mods/aoh_master_reset','master_colum_Skills',safe_input($_POST['master_colum_Skills'],''));
		echo notice_message_admin('Settings successfully saved',1,0,'index.php?get=aoh_master_reset');
	}
	
}else{
	if(isset($_POST['module_active'])){
			$save_status = new_config_xml('../engine/config_mods/aoh_master_reset','active',safe_input($_POST['module_active'],''));
		}
		$get_config = simplexml_load_file('../engine/config_mods/aoh_master_reset.xml');
		echo '<form action="" name="settings" method="POST">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_panel" style="margin-bottom: 20px;">
<tr>
 <td align="center" class="panel_title" colspan="2">Master Reset Settings</td>
</tr>
<tr>';
		if($get_config->active == '1'){
			echo '<td align="left" class="panel_buttons" style="background: #00a65a; color:#fff;"><b>Master Reset Points is active.</b></td>
<td align="right" class="panel_buttons" style="background: #00a65a; color:#fff;">
<input type="hidden" name="edit_settings"><input type="submit" value="Turn Master Reset Off" class="btn btn-block btn-danger btn-200"><input type="hidden" name="module_active" value="0">';
		
			
		}elseif ($get_config->active == '0'){
			echo '<td align="left" class="panel_buttons" style="background: #dd4b39; color:#fff;"><b>Master Reset is inactive.</b></td>
<td align="right" class="panel_buttons" style="background: #dd4b39; color:#fff;">
<input type="hidden" name="edit_settings"><input type="submit" value="Turn Master Reset On" class="btn btn-block btn-success btn-200"><input type="hidden" name="module_active" value="1">';
		}
		echo '</td>
</tr>
</table>
</form>';
		
		
		echo '
<form action="" name="form_edit" method="POST">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_panel">
<tr>
 <td align="center" class="panel_title" colspan="2">Master Reset Settings</td>
</tr>

<tr>
<td align="left" class="panel_title_sub" colspan="2">Master Level</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Master Level requerido para usar el sistema.</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top">
<input type="text" class="form-control" value="'.$get_config->master_level.'" name="master_level"><br>
</td>
</tr>


<tr>
<td align="left" class="panel_title_sub" colspan="2">Master Points por Reset</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Master Points que se entregara al hacer Master Reset.</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top">
<input type="text" class="form-control" value="'.$get_config->master_points.'" name="master_points"><br>
</td>
</tr>

<tr>
<td align="left" class="panel_title_sub" colspan="2">Borrar Master Skill</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Borrar Master Skill, 0=NO, 1=SI.</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top">
<input type="text" class="form-control" value="'.$get_config->master_clear_skills.'" name="master_clear_skills"><br>
</td>
</tr>

<tr>
<td align="left" class="panel_title_sub" colspan="2">Nombre Tabla</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Nombre de la tabla, ejemplo: Character.</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top">
<input type="text" class="form-control" value="'.$get_config->master_table.'" name="master_table"><br>
</td>
</tr>




<tr>
<td align="left" class="panel_title_sub" colspan="2">Columna Master Level</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top"> </td>
<td align="left" class="panel_text_alt2" width="45%" valign="top">
<input type="text" class="form-control" value="'.$get_config->master_colum_Level.'" name="master_colum_Level"><br>
</td>
</tr>

<tr>
<td align="left" class="panel_title_sub" colspan="2">Columna Master Points</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top"> </td>
<td align="left" class="panel_text_alt2" width="45%" valign="top">
<input type="text" class="form-control" value="'.$get_config->master_colum_Points.'" name="master_colum_Points"><br>
</td>
</tr>

<tr>
<td align="left" class="panel_title_sub" colspan="2">Columna Master Skill</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top"> </td>
<td align="left" class="panel_text_alt2" width="45%" valign="top">
<input type="text" class="form-control" value="'.$get_config->master_colum_Skills.'" name="master_colum_Skills"><br>
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