<?

if(isset($_POST['settings'])){

			$save_1 = new_config_xml('../engine/config_mods/aoh_castle_siege','Dinero',''.$_POST['Dinero'].'');
	$save_2 = new_config_xml('../engine/config_mods/aoh_castle_siege','Maquina',''.$_POST['Maquina'].'');
	$save_3 = new_config_xml('../engine/config_mods/aoh_castle_siege','Tiendas',''.$_POST['Tiendas'].'');
	$save_4 = new_config_xml('../engine/config_mods/aoh_castle_siege','Impuesto',''.$_POST['Impuesto'].'');
	$save_5 = new_config_xml('../engine/config_mods/aoh_castle_siege','periodo_01_dia',''.$_POST['periodo_01_dia'].'');
	$save_5 = new_config_xml('../engine/config_mods/aoh_castle_siege','periodo_01_hora',''.$_POST['periodo_01_hora'].'');
	$save_5 = new_config_xml('../engine/config_mods/aoh_castle_siege','periodo_02_dia',''.$_POST['periodo_02_dia'].'');
	$save_5 = new_config_xml('../engine/config_mods/aoh_castle_siege','periodo_02_hora',''.$_POST['periodo_02_hora'].'');
	$save_5 = new_config_xml('../engine/config_mods/aoh_castle_siege','periodo_03_dia',''.$_POST['periodo_03_dia'].'');
	$save_5 = new_config_xml('../engine/config_mods/aoh_castle_siege','periodo_03_hora',''.$_POST['periodo_03_hora'].'');
	$save_5 = new_config_xml('../engine/config_mods/aoh_castle_siege','periodo_04_dia',''.$_POST['periodo_04_dia'].'');
	$save_5 = new_config_xml('../engine/config_mods/aoh_castle_siege','periodo_04_hora',''.$_POST['periodo_04_hora'].'');
	$save_5 = new_config_xml('../engine/config_mods/aoh_castle_siege','periodo_05_dia',''.$_POST['periodo_05_dia'].'');
	$save_5 = new_config_xml('../engine/config_mods/aoh_castle_siege','periodo_05_hora',''.$_POST['periodo_05_hora'].'');
	$save_5 = new_config_xml('../engine/config_mods/aoh_castle_siege','periodo_06_dia',''.$_POST['periodo_06_dia'].'');
	$save_5 = new_config_xml('../engine/config_mods/aoh_castle_siege','periodo_06_hora',''.$_POST['periodo_06_hora'].'');
	$save_5 = new_config_xml('../engine/config_mods/aoh_castle_siege','periodo_07_dia',''.$_POST['periodo_07_dia'].'');
	$save_5 = new_config_xml('../engine/config_mods/aoh_castle_siege','periodo_07_hora',''.$_POST['periodo_07_hora'].'');
	$save_5 = new_config_xml('../engine/config_mods/aoh_castle_siege','periodo_08_dia',''.$_POST['periodo_08_dia'].'');
	$save_5 = new_config_xml('../engine/config_mods/aoh_castle_siege','periodo_08_hora',''.$_POST['periodo_08_hora'].'');

	echo notice_message_admin('Settings successfully saved',1,0,'index.php?get=castle_manager');

	

	
	
}else{
	if(isset($_POST['module_active'])){
			$save_status = new_config_xml('../engine/config_mods/aoh_castle_siege','active',safe_input($_POST['module_active'],''));
		}
		$get_config = simplexml_load_file('../engine/config_mods/aoh_castle_siege.xml');
		echo '<form action="" name="settings" method="POST">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_panel" style="margin-bottom: 20px;">
<tr>
 <td align="center" class="panel_title" colspan="2">Castle Siege Settings</td>
</tr>
<tr>';
		if($get_config->active == '1'){
			echo '<td align="left" class="panel_buttons" style="background: #00a65a; color:#fff;"><b>Castle Siege are active.</b></td>
<td align="right" class="panel_buttons" style="background: #00a65a; color:#fff;">
<input type="hidden" name="edit_settings"><input type="submit" value="Turn Castle Siege Off" class="btn btn-block btn-danger btn-200"><input type="hidden" name="module_active" value="0">';
		
			
		}elseif ($get_config->active == '0'){
			echo '<td align="left" class="panel_buttons" style="background: #dd4b39; color:#fff;"><b>Castle Siege are inactive.</b></td>
<td align="right" class="panel_buttons" style="background: #dd4b39; color:#fff;">
<input type="hidden" name="edit_settings"><input type="submit" value="Turn Castle Siege On" class="btn btn-block btn-success btn-200"><input type="hidden" name="module_active" value="1">';
		}
		echo '</td>
</tr>
</table>
</form>';
		

	echo '
<form action="" name="form_edit" method="POST">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_panel">
<tr>
 <td align="center" class="panel_title" colspan="2">Castle Siege Settings</td>
</tr>



<tr>
<td align="left" class="panel_title_sub" colspan="2">Precios</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Dinero</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top"><input type="text" class="form-control" value="'.$get_config->Dinero.'" name="Dinero"></td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Impuesto Maquina Chaos</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top"><input type="text" class="form-control" value="'.$get_config->Maquina.'" name="Maquina"></td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Impuesto en las Tiendas</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top"><input type="text" class="form-control" value="'.$get_config->Tiendas.'" name="Tiendas"></td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Impuesto para ingresar a Land of Trial</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top"><input type="text" class="form-control" value="'.$get_config->Impuesto.'" name="Impuesto"></td>
</tr>

<tr>
<td align="left" class="panel_title_sub" colspan="2">Dias y Horas</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">DIA Registro de Clanes (Inicio).</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top"><input type="text" class="form-control" value="'.$get_config->periodo_01_dia.'" name="periodo_01_dia"></td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">HORA Registro de Clanes (Inicio).</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top"><input type="text" class="form-control" value="'.$get_config->periodo_01_hora.'" name="periodo_01_hora"></td>
</tr>
<tr style="background: #e9ebec;">
<td align="left" class="panel_text_alt1" width="45%" valign="top">DIA Registro de Clanes (Fin).</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top"><input type="text" class="form-control" value="'.$get_config->periodo_02_dia.'" name="periodo_02_dia"></td>
</tr>
<tr style="background: #e9ebec;">
<td align="left" class="panel_text_alt1" width="45%" valign="top">HORA Registro de Clanes (Fin).</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top"><input type="text" class="form-control" value="'.$get_config->periodo_02_hora.'" name="periodo_02_hora"></td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">DIA Registro de Sign Of Lords (Inicio).</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top"><input type="text" class="form-control" value="'.$get_config->periodo_03_dia.'" name="periodo_03_dia"></td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">HORA Registro de Sign Of Lords (Inicio).</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top"><input type="text" class="form-control" value="'.$get_config->periodo_03_hora.'" name="periodo_03_hora"></td>
</tr>
<tr style="background: #e9ebec;">
<td align="left" class="panel_text_alt1" width="45%" valign="top">DIA Registro de Sign Of Lords (Fin).</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top"><input type="text" class="form-control" value="'.$get_config->periodo_04_dia.'" name="periodo_04_dia"></td>
</tr>
<tr style="background: #e9ebec;">
<td align="left" class="panel_text_alt1" width="45%" valign="top">HORA Registro de Sign Of Lords (Fin).</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top"><input type="text" class="form-control" value="'.$get_config->periodo_04_hora.'" name="periodo_04_hora"></td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">DIA Notificacion de Clanes.</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top"><input type="text" class="form-control" value="'.$get_config->periodo_05_dia.'" name="periodo_05_dia"></td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">HORA Notificacion de Clanes.</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top"><input type="text" class="form-control" value="'.$get_config->periodo_05_hora.'" name="periodo_05_hora"></td>
</tr>
<tr style="background: #e9ebec;">
<td align="left" class="panel_text_alt1" width="45%" valign="top">DIA Preparacion de la Zona de Batalla.</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top"><input type="text" class="form-control" value="'.$get_config->periodo_06_dia.'" name="periodo_06_dia"></td>
</tr>
<tr style="background: #e9ebec;">
<td align="left" class="panel_text_alt1" width="45%" valign="top">HORA Preparacion de la Zona de Batalla.</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top"><input type="text" class="form-control" value="'.$get_config->periodo_06_hora.'" name="periodo_06_hora"></td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">DIA Inicio de la Batalla.</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top"><input type="text" class="form-control" value="'.$get_config->periodo_07_dia.'" name="periodo_07_dia"></td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">HORA Inicio de la Batalla.</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top"><input type="text" class="form-control" value="'.$get_config->periodo_07_hora.'" name="periodo_07_hora"></td>
</tr>
<tr style="background: #e9ebec;">
<td align="left" class="panel_text_alt1" width="45%" valign="top">DIA Fin de la Batalla.</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top"><input type="text" class="form-control" value="'.$get_config->periodo_08_dia.'" name="periodo_08_dia"></td>
</tr>
<tr style="background: #e9ebec;">
<td align="left" class="panel_text_alt1" width="45%" valign="top">HORA Fin de la Batalla.</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top"><input type="text" class="form-control" value="'.$get_config->periodo_08_hora.'" name="periodo_08_hora"></td>
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