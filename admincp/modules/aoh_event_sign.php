<?
$get_config00 = simplexml_load_file('../engine/config_mods/mu_coins_settings.xml');
$get_config = simplexml_load_file('../engine/config_mods/aoh_event_sign.xml');

    if (isset($_POST['settings'])) {
        if (empty($_POST['credits_mount1'])) {
            echo notice_message_admin('Error some fields where left blank.', '0', '1', '0');
        } else {
            $save_1 = new_config_xml('../engine/config_mods/aoh_event_sign', 'credits_type1', safe_input($_POST['credits_type1'], ''));
            $save_2 = new_config_xml('../engine/config_mods/aoh_event_sign','credits_mount1',safe_input($_POST['credits_mount1'],''));
            $save_3 = new_config_xml('../engine/config_mods/aoh_event_sign', 'credits_type2', safe_input($_POST['credits_type2'], ''));
            $save_4 = new_config_xml('../engine/config_mods/aoh_event_sign','credits_mount2',safe_input($_POST['credits_mount2'],''));
            echo notice_message_admin('Settings successfully saved', 1, 0, 'index.php?get=aoh_event_sign');
        }
        
    } else {

            if (isset($_POST['module_active'])) {
                $save_status = new_config_xml('../engine/config_mods/aoh_event_sign', 'active', safe_input($_POST['module_active'], ''));
            }
            $get_config = simplexml_load_file('../engine/config_mods/aoh_event_sign.xml');
            echo '<form action="" name="settings" method="POST">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_panel" style="margin-bottom: 20px;">
<tr>
 <td align="center" class="panel_title" colspan="2">Event Sign Settings</td>
</tr>
<tr>';
            if ($get_config->active == '1') {
                echo '<td align="left" class="panel_buttons" style="background: #00a65a; color:#fff;"><b>Event Sign is active.</b></td>
<td align="right" class="panel_buttons" style="background: #00a65a; color:#fff;">
<input type="hidden" name="edit_settings"><input type="submit" value="Turn Event Sign Off" class="btn btn-block btn-danger btn-200"><input type="hidden" name="module_active" value="0">';
                
                
            } elseif ($get_config->active == '0') {
                echo '<td align="left" class="panel_buttons" style="background: #dd4b39; color:#fff;"><b>Event Sign is inactive.</b></td>
<td align="right" class="panel_buttons" style="background: #dd4b39; color:#fff;">
<input type="hidden" name="edit_settings"><input type="submit" value="Turn Event Sign On" class="btn btn-block btn-success btn-200"><input type="hidden" name="module_active" value="1">';
            }
            echo '</td>
</tr>
</table>
</form>';
            
            echo '<form action="" name="form_edit" method="POST">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_panel">
<tr>
 <td align="center" class="panel_title" colspan="2">Event Sign Settings</td>
</tr>
<tr>
<td align="left" class="panel_title_sub" colspan="2">Quest 1 - Cantidad Credito</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Ingrese la cantidad de creditos a dar</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top">
<input type="text" class="form-control" value="' . $get_config->credits_mount1 . '" name="credits_mount1"><br>
</td>
</tr>

<tr>
<td align="left" class="panel_title_sub" colspan="2">Quest 1 - Tipo Credito</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Mu Coins Type</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top">
<select name="credits_type1">
 ';

        if($get_config->credits_type1 == '1'){
            echo '<option value="1" selected="selected">'.$get_config00->money_name1.'</option><option value="2">'.$get_config00->money_name2.'</option>';
        }elseif($get_config->credits_type1 == '2'){
            echo '<option value="1">'.$get_config00->money_name1.'</option><option value="2" selected="selected">'.$get_config00->money_name2.'</option>';
            
        }
        echo '
</select>
</td>
</tr>

<tr>
<td align="left" class="panel_title_sub" colspan="2">Quest 2 - Cantidad Credito</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Ingrese la cantidad de creditos a dar</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top">
<input type="text" class="form-control" value="' . $get_config->credits_mount2 . '" name="credits_mount2"><br>
</td>
</tr>

<tr>
<td align="left" class="panel_title_sub" colspan="2">Quest 2 - Tipo Credito</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Mu Coins Type</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top">
<select name="credits_type2">
 ';

        if($get_config->credits_type2 == '1'){
            echo '<option value="1" selected="selected">'.$get_config00->money_name1.'</option><option value="2">'.$get_config00->money_name2.'</option>';
        }elseif($get_config->credits_type2 == '2'){
            echo '<option value="1">'.$get_config00->money_name1.'</option><option value="2" selected="selected">'.$get_config00->money_name2.'</option>';
            
        }
        echo '
</select>
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