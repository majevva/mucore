<?
$get_config00 = simplexml_load_file('../engine/config_mods/mu_coins_settings.xml');
if (isset($_GET['m'])) {
    if ($_GET['m'] == 'add') {
        if (isset($_POST['add'])) {
            if (empty($_POST['gs_ip']) || empty($_POST['gs_port']) || empty($_POST['gs_name']) || empty($_POST['gs_users'])) {
                echo notice_message_admin('Error some fields where left blank.', '0', '1', '0');
            } else {
                $gs_ip    = $_POST['gs_ip'];
                $gs_port = $_POST['gs_port'];
                $gs_name  = $_POST['gs_name'];
                $gs_users  = $_POST['gs_users'];
                
                $db = fopen("../engine/variables_mods/GameServers.tDB", "a+");
                fwrite($db, uniqid() . "|" . $gs_ip . "|" . $gs_port . "|" . $gs_name . "|" . $gs_users . "|\n");
                fclose($db);
                echo notice_message_admin('GameServer successfully added', 1, 0, 'index.php?get=gameservers_manager');
            }
            
        } else {
            echo '<form action="" method="POST" name="name">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_panel">
<tr>
 <td align="center" class="panel_title" colspan="2">Add GameServer</td>
</tr>

<tr>
<td align="left" class="panel_title_sub" colspan="2">IP</td>
</tr>

<tr>
<td align="left" class="panel_text_alt1" width="50%">Ingrese la ip del servidor.</td>
<td align="left" class="panel_text_alt2" width="50%"><input type="text" class="form-control"  name="gs_ip"></td>
</tr>

<tr>
<td align="left" class="panel_title_sub" colspan="2">Puerto</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="50%">Ingrese el puerto del servidor.</td>
<td align="left" class="panel_text_alt2" width="50%"><input type="text" class="form-control" name="gs_port"></td>
</tr>

<tr>
<td align="left" class="panel_title_sub" colspan="2">Nombre/ID del GameServer</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="50%">Ingrese el Nombre o ID del GameServer.</td>
<td align="left" class="panel_text_alt2" width="50%"><input type="text" class="form-control" name="gs_name"></td>
</tr>

<tr>
<td align="left" class="panel_title_sub" colspan="2">Usuarios Maximos</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="50%">Ingrese la cantidad maxima de usuarios en numeros, ejemplo: 100.</td>
<td align="left" class="panel_text_alt2" width="50%"><input type="text" class="form-control" name="gs_users"></td>
</tr>



<tr>
<td align="center" class="panel_buttons" colspan="2">
<input type="hidden" name="add">
<input type="submit" class="btn btn-success btn-200" value="Add GameServer"></td>
</tr>

</table>
</form>';
        }
        
    } elseif ($_GET['m'] == 'edit') {
        $p_id   = safe_input(xss_clean($_GET['id']), '_');
        $p_file = file('../engine/variables_mods/GameServers.tDB');
        foreach ($p_file as $check_id) {
            $check_id = explode("|", $check_id);
            if ($check_id[0] == $p_id) {
                $vote_id  = $check_id[0];
                $gs_ip    = $check_id[1];
                $gs_port = $check_id[2];
                $gs_name  = $check_id[3];
                $gs_users  = $check_id[4];
                
                break;
            }
        }
        if (isset($_POST['edit'])) {
            if (empty($_POST['gs_ip']) || empty($_POST['gs_port']) || empty($_POST['gs_name']) || empty($_POST['gs_users'])) {
                echo notice_message_admin('Error some fields where left blank.', '0', '1', '0');
            } else {
                $gs_ip    = $_POST['gs_ip'];
                $gs_port = $_POST['gs_port'];
                $gs_name  = $_POST['gs_name'];
                $gs_users  = $_POST['gs_users'];
                
                
                $old_db = file("../engine/variables_mods/GameServers.tDB");
                $new_db = fopen("../engine/variables_mods/GameServers.tDB", "w");
                foreach ($old_db as $old_db_line) {
                    $old_db_arr = explode("|", $old_db_line);
                    if ($p_id != $old_db_arr[0]) {
                        fwrite($new_db, "$old_db_line");
                    } else {
                        fwrite($new_db, $vote_id . "|" . $gs_ip . "|" . $gs_port . "|" . $gs_name . "|" . $gs_users . "|\n");
                    }
                }
                fclose($new_db);
                echo notice_message_admin('GameServer successfully edited', 1, 0, 'index.php?get=gameservers_manager');
            }
            
        } else {
            echo '<form action="" method="POST" name="name">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_panel">
<tr>
 <td align="center" class="panel_title" colspan="2">Edit GameServer</td>
</tr>

<tr>
<td align="left" class="panel_title_sub" colspan="2">Ip</td>
</tr>

<tr>
<td align="left" class="panel_text_alt1" width="50%">ip del servidor.</td>
<td align="left" class="panel_text_alt2" width="50%"><input type="text" class="form-control"  name="gs_ip" value="' . $gs_ip . '"></td>
</tr>

<tr>
<td align="left" class="panel_title_sub" colspan="2">Puerto</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="50%">Puerto del servidor.</td>
<td align="left" class="panel_text_alt2" width="50%"><input type="text" class="form-control" name="gs_port" value="' . $gs_port . '"></td>
</tr>

<tr>
<td align="left" class="panel_title_sub" colspan="2">Nombre/ID</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="50%">Nombre o ID del Servidor.</td>
<td align="left" class="panel_text_alt2" width="50%"><input type="text" class="form-control" name="gs_name" value="' . $gs_name . '"></td>
</tr>

<tr>
<td align="left" class="panel_title_sub" colspan="2">Max. Usuarios.</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="50%">Numero Maximo de usuarios por GameServer.</td>
<td align="left" class="panel_text_alt2" width="50%"><input type="text" class="form-control" name="gs_users" value="' . $gs_users . '"></td>
</tr>



<tr>
<td align="center" class="panel_buttons" colspan="2">
<input type="hidden" name="edit">
<input type="submit" class="btn btn-success btn-200" value="Edit GameServer"></td>
</tr>

</table>
</form>';
        }
        
    }
    
} else {

        if (isset($_GET['delete'])) {
            if (empty($_GET['delete'])) {
                echo notice_message_admin('Unable to proceed your request.', '1', '1', 'index.php?get=gameservers_manager');
            } else {
                $p_id = safe_input(xss_clean($_GET['delete']), '_');
                delete_variable('../engine/variables_mods/GameServers.tDB', '0', $p_id, '|');
                echo notice_message_admin('GameServer successfully deleted', 1, 0, 'index.php?get=gameservers_manager');
            }
        } else {
            
            
            
            echo '
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_panel" style="margin-top: 20px;">
<tr>
 <td align="center" class="panel_title" colspan="5">Gamse Servers List</td>
</tr>
<tr>
<td align="left" class="panel_title_sub2">Ip</td>
<td align="left" class="panel_title_sub2">Puerto</td>
<td align="left" class="panel_title_sub2">Nombre/ID</td>
<td align="left" class="panel_title_sub2">Max. Users</td>
<td align="left" class="panel_title_sub2" width="80">Controls</td>
</tr>';
            
            
            $votef = file('../engine/variables_mods/GameServers.tDB');
            $count = 0;
            foreach ($votef as $vote) {
                $vote_data = explode("|", $vote);
                $count++;
                $tr_color = ($count % 2) ? '' : 'even';
                echo '
    <tr class="' . $tr_color . '">
    <td align="left" class="panel_text_alt_list"><strong>' . set_limit($vote_data[1], 30, '..') . '</strong></td>
    <td align="left" class="panel_text_alt_list">' . set_limit($vote_data[2], 30, '..') . '</td>
    <td align="left" class="panel_text_alt_list">' . set_limit($vote_data[3], 30, '..') . '</td>
    <td align="left" class="panel_text_alt_list">' . number_format($vote_data[4]) . '</td>
    <td align="left" class="panel_text_alt_list"><a href="index.php?get=gameservers_manager&m=edit&id=' . $vote_data[0] . '">[Edit]</a> / <a href="#" onclick="ask_url(\'Are you sure you want to delete this GameServer?\',\'index.php?get=gameservers_manager&delete=' . $vote_data[0] . '\')";>[Delete]</a></td>
    </tr>';
            }
            if ($count == '0') {
                echo '<tr>
    <td align="center" class="panel_text_alt_list" colspan="5"><em>No GameServers List Found</em></td>
    </tr>';
            }
            
            echo '<tr>
<td align="center" class="panel_buttons" colspan="5">
<input type="button" class="btn btn-success btn-200" value="Add GameServer" onclick="location.href=\'index.php?get=gameservers_manager&m=add\'"></td>
</tr>
</table>';
        }
    
    
}

?> 