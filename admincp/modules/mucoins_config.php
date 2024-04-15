<?
if(isset($_POST['settings'])){
	if(empty($_POST['credits_table']) || empty($_POST['credits_column']) || empty($_POST['credits2_column']) || empty($_POST['user_column']) || empty($_POST['money_name1'])){
		echo notice_message_admin('Error some fields where left blank.','0','1','0');
	}else{
		$save_1 = new_config_xml('../engine/config_mods/mu_coins_settings','credits_database',$_POST['credits_database']);
		$save_2 = new_config_xml('../engine/config_mods/mu_coins_settings','credits2_database',$_POST['credits_database']);
		$save_3 = new_config_xml('../engine/config_mods/mu_coins_settings','credits_table',$_POST['credits_table']);
		$save_4 = new_config_xml('../engine/config_mods/mu_coins_settings','credits2_table',$_POST['credits2_table']);
		$save_5 = new_config_xml('../engine/config_mods/mu_coins_settings','credits_column',$_POST['credits_column']);
		$save_6 = new_config_xml('../engine/config_mods/mu_coins_settings','credits2_column',$_POST['credits2_column']);
		$save_7 = new_config_xml('../engine/config_mods/mu_coins_settings','user_column',$_POST['user_column']);
		$save_8 = new_config_xml('../engine/config_mods/mu_coins_settings','user2_column',$_POST['user2_column']);
		$save_9 = new_config_xml('../engine/config_mods/mu_coins_settings','money_name1',safe_input($_POST['money_name1'],''));
		$save_10 = new_config_xml('../engine/config_mods/mu_coins_settings','money_name2',safe_input($_POST['money_name2'],''));
		echo notice_message_admin('Settings successfully saved',1,0,'index.php?get=mucoins_config');
	}
	
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
			echo '<td align="left" class="panel_buttons" style="background: #00a65a; color:#fff;"><b>Mu Coins is active.</b></td>
<td align="right" class="panel_buttons" style="background: #00a65a; color:#fff;">
<input type="hidden" name="edit_settings"><input type="submit" value="Turn Mu Coins Off" class="btn btn-block btn-danger btn-200"><input type="hidden" name="module_active" value="0">';
		
			
		}elseif ($get_config->active == '0'){
			echo '<td align="left" class="panel_buttons" style="background: #dd4b39; color:#fff;"><b>Mu Coins is inactive.</b></td>
<td align="right" class="panel_buttons" style="background: #dd4b39; color:#fff;">
<input type="hidden" name="edit_settings"><input type="submit" value="Turn Mu Coins On" class="btn btn-block btn-success btn-200"><input type="hidden" name="module_active" value="1">';
		}
		echo '</td>
</tr>
</table>
</form>';
		
		
		echo '
<form action="" name="form_edit" method="POST">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_panel">
<tr>
 <td align="center" class="panel_title" colspan="2">Mu Coins Settings</td>
</tr>

<tr>
<td align="left" class="panel_title_sub" colspan="2">Creditos Base de Datos</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Elige la Base de datos de los creditos</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top">
<select class="form-control" name="credits_database">
 ';

        if($get_config->credits_database == '1'){
            echo '<option value="1" selected="selected">'.$core['db_name'].'</option><option value="2">'.$core['db_name2'].'</option>';
        }elseif($get_config->credits_database == '2'){
            echo '<option value="1">'.$core['db_name'].'</option><option value="2" selected="selected">'.$core['db_name2'].'</option>';
            
        }
        echo '
</select>
</td>
</tr>

<tr>
<td align="left" class="panel_title_sub" colspan="2">Credito 1 Table</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Nombre de tabla de creditos.</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top">
<input type="text" class="form-control" value="'.$get_config->credits_table.'" name="credits_table"><br>
</td>
</tr>

<tr>
<td align="left" class="panel_title_sub" colspan="2">Credito 2 Table</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Nombre de tabla de creditos 2.</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top">
<input type="text" class="form-control" value="'.$get_config->credits2_table.'" name="credits2_table"><br>
</td>
</tr>

<tr>
<td align="left" class="panel_title_sub" colspan="2">Credito 1 Columna</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Nombre de la columna de Credito 1.</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top">
<input type="text" class="form-control" value="'.$get_config->credits_column.'" name="credits_column"><br>
</td>
</tr>




<tr>
<td align="left" class="panel_title_sub" colspan="2">Credito 2 Columna</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Nombre de la columna de Credito 2.</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top">
<input type="text" class="form-control" value="'.$get_config->credits2_column.'" name="credits2_column"><br>
</td>
</tr>

<tr>
<td align="left" class="panel_title_sub" colspan="2">User Columna Credito 1</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Nombre de la columna de Users para Credito 1</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top">
<input type="text" class="form-control" value="'.$get_config->user_column.'" name="user_column"><br>
</td>
</tr>

<tr>
<td align="left" class="panel_title_sub" colspan="2">User Columna Credito 2</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Nombre de la columna de Users para Credito 2</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top">
<input type="text" class="form-control" value="'.$get_config->user2_column.'" name="user2_column"><br>
</td>
</tr>

<tr>
<td align="left" class="panel_title_sub" colspan="2">Nombre del Credito 1</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top"> </td>
<td align="left" class="panel_text_alt2" width="45%" valign="top">
<input type="text" class="form-control" value="'.$get_config->money_name1.'" name="money_name1"><br>
</td>
</tr>

<tr>
<td align="left" class="panel_title_sub" colspan="2">Nombre del Credito 2</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top"> </td>
<td align="left" class="panel_text_alt2" width="45%" valign="top">
<input type="text" class="form-control" value="'.$get_config->money_name2.'" name="money_name2"><br>
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