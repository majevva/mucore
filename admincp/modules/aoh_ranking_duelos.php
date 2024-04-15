<?
if(isset($_POST['settings'])){
	if(empty($_POST['numero_top']) || empty($_POST['tabla']) || empty($_POST['columna_pj']) || empty($_POST['columna_win']) || empty($_POST['columna_Lose'])){
		echo notice_message_admin('Error some fields where left blank.','0','1','0');
	}else{
		$save_1 = new_config_xml('../engine/config_mods/aoh_ranking_duelos','numero_top',safe_input($_POST['numero_top'],''));
		$save_2 = new_config_xml('../engine/config_mods/aoh_ranking_duelos','tabla',$_POST['tabla']);
		$save_3 = new_config_xml('../engine/config_mods/aoh_ranking_duelos','columna_pj',$_POST['columna_pj']);
		$save_4 = new_config_xml('../engine/config_mods/aoh_ranking_duelos','columna_win',$_POST['columna_win']);
		$save_5 = new_config_xml('../engine/config_mods/aoh_ranking_duelos','columna_Lose',$_POST['columna_Lose']);
		echo notice_message_admin('Settings successfully saved',1,0,'index.php?get=aoh_ranking_duelos');
	}
	
}else{
	if(isset($_POST['module_active'])){
			$save_status = new_config_xml('../engine/config_mods/aoh_ranking_duelos','active',safe_input($_POST['module_active'],''));
		}
		$get_config = simplexml_load_file('../engine/config_mods/aoh_ranking_duelos.xml');
		echo '<form action="" name="settings" method="POST">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_panel" style="margin-bottom: 20px;">
<tr>
 <td align="center" class="panel_title" colspan="2">Ranking Duelos Settings</td>
</tr>
<tr>';
		if($get_config->active == '1'){
			echo '<td align="left" class="panel_buttons" style="background: #00a65a; color:#fff;"><b>Ranking Duelos is active.</b></td>
<td align="right" class="panel_buttons" style="background: #00a65a; color:#fff;">
<input type="hidden" name="edit_settings"><input type="submit" value="Turn Ranking Duelos Off" class="btn btn-block btn-danger btn-200"><input type="hidden" name="module_active" value="0">';
		
			
		}elseif ($get_config->active == '0'){
			echo '<td align="left" class="panel_buttons" style="background: #dd4b39; color:#fff;"><b>Ranking Duelos is inactive.</b></td>
<td align="right" class="panel_buttons" style="background: #dd4b39; color:#fff;">
<input type="hidden" name="edit_settings"><input type="submit" value="Turn Ranking Duelos On" class="btn btn-block btn-success btn-200"><input type="hidden" name="module_active" value="1">';
		}
		echo '</td>
</tr>
</table>
</form>';
		
		
		echo '
<form action="" name="form_edit" method="POST">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_panel">
<tr>
 <td align="center" class="panel_title" colspan="2">Ranking Duelos Settings</td>
</tr>

<tr>
<td align="left" class="panel_title_sub" colspan="2">Numero Top</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Maximo de Personajes a mostrar.</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top">
<input type="text" class="form-control" value="'.$get_config->numero_top.'" name="numero_top"><br>
</td>
</tr>


<tr>
<td align="left" class="panel_title_sub" colspan="2">Nombre de Tabla</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Nombre de la tabla de duelos.</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top">
<input type="text" class="form-control" value="'.$get_config->tabla.'" name="tabla"><br>
</td>
</tr>

<tr>
<td align="left" class="panel_title_sub" colspan="2">Columna Personajes</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Columna de pj en la tabla de duelo</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top">
<input type="text" class="form-control" value="'.$get_config->columna_pj.'" name="columna_pj"><br>
</td>
</tr>

<tr>
<td align="left" class="panel_title_sub" colspan="2">Columna Ganadas</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Columna de ganadas en la tabla de duelo.</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top">
<input type="text" class="form-control" value="'.$get_config->columna_win.'" name="columna_win"><br>
</td>
</tr>




<tr>
<td align="left" class="panel_title_sub" colspan="2">Columna Perdidas</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Columna de perdidas en la tabla de duelo</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top">
<input type="text" class="form-control" value="'.$get_config->columna_Lose.'" name="columna_Lose"><br>
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