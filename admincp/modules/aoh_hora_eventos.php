<?
if (isset($_GET['m'])) {
    if ($_GET['m'] == 'add') {
        if (isset($_POST['add'])) {
            if (empty($_POST['gs_ip'])) {
                echo notice_message_admin('Error some fields where left blank.', '0', '1', '0');
            } else {
                $gs_ip    = $_POST['gs_ip'];
                $gs_port = $_POST['gs_port'];
                $gs_name  = $_POST['gs_name'];
                
                $db = fopen("../engine/variables_mods/HoraEventos.tDB", "a+");
                fwrite($db, uniqid() . "|" . $gs_ip . "|" . $gs_port . "|" . $gs_name . "|\n");
                fclose($db);
                echo notice_message_admin('GameServer successfully added', 1, 0, 'index.php?get=aoh_hora_eventos');
            }
            
        } else {
            echo '<form action="" method="POST" name="name">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_panel">
<tr>
 <td align="center" class="panel_title" colspan="2">Add Evento</td>
</tr>

<tr>
<td align="left" class="panel_title_sub" colspan="2">Nombre</td>
</tr>

<tr>
<td align="left" class="panel_text_alt1" width="50%">Nombre del Evento</td>
<td align="left" class="panel_text_alt2" width="50%"><input type="text" class="form-control"  name="gs_ip"></td>
</tr>

<tr>
<td align="left" class="panel_title_sub" colspan="2">Tipo</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="50%">Tipo de Evento</td>
<td align="left" class="panel_text_alt2" width="50%">
<select class="form-control" name="gs_port">
<option value="0">Normal</option>
<option value="1">Custom</option>
</select>
</td>
</tr>

<tr>
<td align="left" class="panel_title_sub" colspan="2">Horarios</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="50%">Horarios del Evento, usar \'\' y , ejmpl: \'04:00\', \'05:00\'</td>
<td align="left" class="panel_text_alt2" width="50%"><input type="text" class="form-control" name="gs_name" value="\'04:00\', \'05:00\'"></td>
</tr>



<tr>
<td align="center" class="panel_buttons" colspan="2">
<input type="hidden" name="add">
<input type="submit" class="btn btn-success btn-200" value="Add Evento"></td>
</tr>

</table>
</form>';
        }
        
    } elseif ($_GET['m'] == 'edit') {
        $p_id   = safe_input(xss_clean($_GET['id']), '_');
        $p_file = file('../engine/variables_mods/HoraEventos.tDB');
        foreach ($p_file as $check_id) {
            $check_id = explode("|", $check_id);
            if ($check_id[0] == $p_id) {
                $vote_id  = $check_id[0];
                $gs_ip    = $check_id[1];
                $gs_port = $check_id[2];
                $gs_name  = $check_id[3];
                
                break;
            }
        }
        if (isset($_POST['edit'])) {
            if (empty($_POST['gs_ip'])) {
                echo notice_message_admin('Error some fields where left blank.', '0', '1', '0');
            } else {
                $gs_ip    = $_POST['gs_ip'];
                $gs_port = $_POST['gs_port'];
                $gs_name  = $_POST['gs_name'];
                
                
                $old_db = file("../engine/variables_mods/HoraEventos.tDB");
                $new_db = fopen("../engine/variables_mods/HoraEventos.tDB", "w");
                foreach ($old_db as $old_db_line) {
                    $old_db_arr = explode("|", $old_db_line);
                    if ($p_id != $old_db_arr[0]) {
                        fwrite($new_db, "$old_db_line");
                    } else {
                        fwrite($new_db, $vote_id . "|" . $gs_ip . "|" . $gs_port . "|" . $gs_name . "|\n");
                    }
                }
                fclose($new_db);
                echo notice_message_admin('Evento successfully edited', 1, 0, 'index.php?get=aoh_hora_eventos');
            }
            
        } else {
            echo '<form action="" method="POST" name="name">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_panel">
<tr>
 <td align="center" class="panel_title" colspan="2">Editar Evento</td>
</tr>

<tr>
<td align="left" class="panel_title_sub" colspan="2">Nombre</td>
</tr>

<tr>
<td align="left" class="panel_text_alt1" width="50%">Nombre de Evento.</td>
<td align="left" class="panel_text_alt2" width="50%"><input type="text" class="form-control"  name="gs_ip" value="' . $gs_ip . '"></td>
</tr>

<tr>
<td align="left" class="panel_title_sub" colspan="2">Tipo</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="50%">Tipo de Evento.</td>
<td align="left" class="panel_text_alt2" width="50%">
<select class="form-control" name="gs_port">
<option value="0" ' . (($gs_port==0) ? 'selected' : '') .'>Normal</option>
<option value="1" ' . (($gs_port==1) ? 'selected' : '') .'>Custom</option>
</select>
</td>
</tr>

<tr>
<td align="left" class="panel_title_sub" colspan="2">Horarios</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="50%">Horarios del Evento, usar \'\' y , ejmpl: \'04:00\', \'05:00\'</td>
<td align="left" class="panel_text_alt2" width="50%"><input type="text" class="form-control" name="gs_name" value="' . $gs_name . '"></td>
</tr>



<tr>
<td align="center" class="panel_buttons" colspan="2">
<input type="hidden" name="edit">
<input type="submit" class="btn btn-success btn-200" value="Edit Evento"></td>
</tr>

</table>
</form>';
        }
        
    }
    
} else {

        if (isset($_GET['delete'])) {
            if (empty($_GET['delete'])) {
                echo notice_message_admin('Unable to proceed your request.', '1', '1', 'index.php?get=aoh_hora_eventos');
            } else {
                $p_id = safe_input(xss_clean($_GET['delete']), '_');
                delete_variable('../engine/variables_mods/HoraEventos.tDB', '0', $p_id, '|');
                echo notice_message_admin('GameServer successfully deleted', 1, 0, 'index.php?get=aoh_hora_eventos');
            }
        } else {
            
            
            
            echo '
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_panel" style="margin-top: 20px;">
<tr>
 <td align="center" class="panel_title" colspan="5">Eventos List</td>
</tr>
<tr>
<td align="left" class="panel_title_sub2">Nombre</td>
<td align="left" class="panel_title_sub2">Tipo</td>
<td align="left" class="panel_title_sub2">Horarios</td>
<td align="left" class="panel_title_sub2" width="80">Controls</td>
</tr>';
            
            
            $votef = file('../engine/variables_mods/HoraEventos.tDB');
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
    <td align="left" class="panel_text_alt_list"><a href="index.php?get=aoh_hora_eventos&m=edit&id=' . $vote_data[0] . '">[Edit]</a> / <a href="#" onclick="ask_url(\'Are you sure you want to delete this GameServer?\',\'index.php?get=aoh_hora_eventos&delete=' . $vote_data[0] . '\')";>[Delete]</a></td>
    </tr>';
            }
            if ($count == '0') {
                echo '<tr>
    <td align="center" class="panel_text_alt_list" colspan="5"><em>No Eventos List Found</em></td>
    </tr>';
            }
            
            echo '<tr>
<td align="center" class="panel_buttons" colspan="5">
<input type="button" class="btn btn-success btn-200" value="Add Evento" onclick="location.href=\'index.php?get=aoh_hora_eventos&m=add\'"></td>
</tr>
</table>';
        }
    
    
}

?> 