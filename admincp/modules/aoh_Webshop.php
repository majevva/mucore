<?
if(isset($_POST['settings'])){
	if(empty($_POST['shop_perc'])){
		echo notice_message_admin('Error some fields where left blank.','0','1','0');
	}else{
		$save_1 = new_config_xml('../engine/config_mods/aoh_Webshop','sockets_parts',$_POST['sockets_parts']);
		$save_2 = new_config_xml('../engine/config_mods/aoh_Webshop','socket_type',safe_input($_POST['socket_type'],''));
		$save_3 = new_config_xml('../engine/config_mods/aoh_Webshop','eqe_sockets',$_POST['eqe_sockets']);
		$save_4 = new_config_xml('../engine/config_mods/aoh_Webshop','shop_disc',$_POST['shop_disc']);
		$save_5 = new_config_xml('../engine/config_mods/aoh_Webshop','shop_perc',safe_input($_POST['shop_perc'],''));
		echo notice_message_admin('Settings successfully saved',1,0,'index.php?get=aoh_Webshop');
	}
	
}else{
	if(isset($_POST['module_active'])){
			$save_status = new_config_xml('../engine/config_mods/aoh_Webshop','active',safe_input($_POST['module_active'],''));
		}
		$get_config = simplexml_load_file('../engine/config_mods/aoh_Webshop.xml');
		echo '<form action="" name="settings" method="POST">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_panel" style="margin-bottom: 20px;">
<tr>
 <td align="center" class="panel_title" colspan="2">Webshop Settings</td>
</tr>
<tr>';
		if($get_config->active == '1'){
			echo '<td align="left" class="panel_buttons" style="background: #00a65a; color:#fff;"><b>Webshop is active.</b></td>
<td align="right" class="panel_buttons" style="background: #00a65a; color:#fff;">
<input type="hidden" name="edit_settings"><input type="submit" value="Turn Webshop Off" class="btn btn-block btn-danger btn-200"><input type="hidden" name="module_active" value="0">';
		
			
		}elseif ($get_config->active == '0'){
			echo '<td align="left" class="panel_buttons" style="background: #dd4b39; color:#fff;"><b>Webshop is inactive.</b></td>
<td align="right" class="panel_buttons" style="background: #dd4b39; color:#fff;">
<input type="hidden" name="edit_settings"><input type="submit" value="Turn Webshop On" class="btn btn-block btn-success btn-200"><input type="hidden" name="module_active" value="1">';
		}
		echo '</td>
</tr>
</table>
</form>';
		
		
		echo '
<form action="" name="form_edit" method="POST">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_panel">
<tr>
 <td align="center" class="panel_title" colspan="2">Webshop Settings</td>
</tr>

<tr>
<td align="left" class="panel_title_sub" colspan="2">Sockets Parts</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Permitir sockets de sets en armas.</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top">
<select name="sockets_parts" class="form-control">
<option value="yes" '.(($get_config->sockets_parts=="yes") ? "selected" : "").'>yes</option>
<option value="no" '.(($get_config->sockets_parts=="no") ? "selected" : "").'>no</option>
</select<br>
</td>
</tr>


<tr>
<td align="left" class="panel_title_sub" colspan="2">Tipo de Socket</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">SCFMT = Titans Tech, Webzen = otras verciones</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top">
<select name="socket_type" class="form-control">
<option value="scfmt" '.(($get_config->socket_type=="scfmt") ? "selected" : "").'>scfmt</option>
<option value="webzen" '.(($get_config->socket_type=="webzen") ? "selected" : "").'>webzen</option>
</select<br>
</td>
</tr>

<tr>
<td align="left" class="panel_title_sub" colspan="2">Permitir Sockets Iguales</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Permitir sockets iguales.</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top">
<select name="eqe_sockets" class="form-control">
<option value="yes" '.(($get_config->eqe_sockets=="yes") ? "selected" : "").'>yes</option>
<option value="no" '.(($get_config->eqe_sockets=="no") ? "selected" : "").'>no</option>
</select<br>
</td>
</tr>


<tr>
<td align="left" class="panel_title_sub" colspan="2">Activar Descuento</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top"></td>
<td align="left" class="panel_text_alt2" width="45%" valign="top">
<select name="shop_disc" class="form-control">
<option value="on" '.(($get_config->shop_disc=="on") ? "selected" : "").'>Activado</option>
<option value="off" '.(($get_config->shop_disc=="off") ? "selected" : "").'>Desactivado</option>
</select<br>
</td>
</tr>

<tr>
<td align="left" class="panel_title_sub" colspan="2">Porcentaje de Descuento</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top"> Solo numeros, no incluir simbolo % ni comas, ni puntos.</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top">
<input type="text" class="form-control" value="'.$get_config->shop_perc.'" name="shop_perc"><br>
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