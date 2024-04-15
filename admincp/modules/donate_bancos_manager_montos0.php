<?
$get_config00 = simplexml_load_file('../engine/config_mods/mu_coins_settings.xml');
if (isset($_GET['m'])) {
    if ($_GET['m'] == 'add') {
        if (isset($_POST['add'])) {
            if (empty($_POST['title']) || empty($_POST['vote_url']) || empty($_POST['credits'])) {
                echo notice_message_admin('Error some fields where left blank.', '0', '1', '0');
            } else {
                $title    = safe_input($_POST['title'], '\ ');
                $vote_url = $_POST['vote_url'];
                $credits  = $_POST['credits'];
                
                $db = fopen("../engine/variables_mods/vote_credits.tDB", "a+");
                fwrite($db, uniqid() . "¦" . $title . "¦" . $vote_url . "¦" . $credits . "¦\n");
                fclose($db);
                echo notice_message_admin('Vote Link successfully added', 1, 0, 'index.php?get=vote_credits_manager');
            }
            
        } else {
            echo '<form action="" method="POST" name="name">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_panel">
<tr>
 <td align="center" class="panel_title" colspan="2">Add Vote Link</td>
</tr>

<tr>
<td align="left" class="panel_title_sub" colspan="2">Title</td>
</tr>

<tr>
<td align="left" class="panel_text_alt1" width="50%">Vote title, letters, numbers and spaces only.</td>
<td align="left" class="panel_text_alt2" width="50%"><input type="text" class="form-control"  name="title"></td>
</tr>

<tr>
<td align="left" class="panel_title_sub" colspan="2">URL</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="50%">Enter the URL of vote.</td>
<td align="left" class="panel_text_alt2" width="50%"><input type="text" class="form-control" name="vote_url"></td>
</tr>

<tr>
<td align="left" class="panel_title_sub" colspan="2">Credits</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="50%">Enter the amount of credits that user will recive after vote.</td>
<td align="left" class="panel_text_alt2" width="50%"><input type="text" class="form-control" name="credits"></td>
</tr>



<tr>
<td align="center" class="panel_buttons" colspan="2">
<input type="hidden" name="add">
<input type="submit" class="btn btn-success btn-200" value="Add Vote Link"></td>
</tr>

</table>
</form>';
        }
        
    } elseif ($_GET['m'] == 'edit') {
        $p_id   = safe_input(xss_clean($_GET['id']), '_');
        $p_file = file('../engine/variables_mods/vote_credits.tDB');
        foreach ($p_file as $check_id) {
            $check_id = explode("¦", $check_id);
            if ($check_id[0] == $p_id) {
                $vote_id  = $check_id[0];
                $title    = $check_id[1];
                $vote_url = $check_id[2];
                $credits  = $check_id[3];
                
                break;
            }
        }
        if (isset($_POST['edit'])) {
            if (empty($_POST['title']) || empty($_POST['vote_url']) || empty($_POST['credits'])) {
                echo notice_message_admin('Error some fields where left blank.', '0', '1', '0');
            } else {
                $title    = safe_input($_POST['title'], '\ ');
                $vote_url = $_POST['vote_url'];
                $credits  = $_POST['credits'];
                
                
                $old_db = file("../engine/variables_mods/vote_credits.tDB");
                $new_db = fopen("../engine/variables_mods/vote_credits.tDB", "w");
                foreach ($old_db as $old_db_line) {
                    $old_db_arr = explode("¦", $old_db_line);
                    if ($p_id != $old_db_arr[0]) {
                        fwrite($new_db, "$old_db_line");
                    } else {
                        fwrite($new_db, $vote_id . "¦" . $title . "¦" . $vote_url . "¦" . $credits . "¦\n");
                    }
                }
                fclose($new_db);
                echo notice_message_admin('Vote Link successfully edited', 1, 0, 'index.php?get=vote_credits_manager');
            }
            
        } else {
            echo '<form action="" method="POST" name="name">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_panel">
<tr>
 <td align="center" class="panel_title" colspan="2">Edit Vote Link</td>
</tr>

<tr>
<td align="left" class="panel_title_sub" colspan="2">Title</td>
</tr>

<tr>
<td align="left" class="panel_text_alt1" width="50%">Vote title, letters, numbers and spaces only.</td>
<td align="left" class="panel_text_alt2" width="50%"><input type="text" class="form-control"  name="title" value="' . $title . '"></td>
</tr>

<tr>
<td align="left" class="panel_title_sub" colspan="2">URL</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="50%">Enter the URL of vote.</td>
<td align="left" class="panel_text_alt2" width="50%"><input type="text" class="form-control" name="vote_url" value="' . $vote_url . '"></td>
</tr>

<tr>
<td align="left" class="panel_title_sub" colspan="2">Credits</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="50%">Enter the amount of credits that user will recive after vote.</td>
<td align="left" class="panel_text_alt2" width="50%"><input type="text" class="form-control" name="credits" value="' . $credits . '"></td>
</tr>



<tr>
<td align="center" class="panel_buttons" colspan="2">
<input type="hidden" name="edit">
<input type="submit" class="btn btn-success btn-200" value="Edit Vote Link"></td>
</tr>

</table>
</form>';
        }
        
    }
    
} else {
    $get_config = simplexml_load_file('../engine/config_mods/vote_credits_settings.xml');
    if (isset($_POST['settings'])) {
        if (empty($_POST['delay_hours'])) {
            echo notice_message_admin('Error some fields where left blank.', '0', '1', '0');
        } else {
            $save_1 = new_config_xml('../engine/config_mods/vote_credits_settings', 'delay_hours', safe_input($_POST['delay_hours'], ''));
            $save_2 = new_config_xml('../engine/config_mods/vote_credits_settings','credits_type',safe_input($_POST['credits_type'],''));
            echo notice_message_admin('Settings successfully saved', 1, 0, 'index.php?get=vote_credits_manager');
        }
        
    } else {
        if (isset($_GET['delete'])) {
            if (empty($_GET['delete'])) {
                echo notice_message_admin('Unable to proceed your request.', '1', '1', 'index.php?get=vote_credits_manager');
            } else {
                $p_id = safe_input(xss_clean($_GET['delete']), '_');
                delete_variable('../engine/variables_mods/vote_credits.tDB', '0', $p_id, '¦');
                echo notice_message_admin('Vote Link successfully deleted', 1, 0, 'index.php?get=vote_credits_manager');
            }
        } else {
            if (isset($_POST['module_active'])) {
                $save_status = new_config_xml('../engine/config_mods/vote_credits_settings', 'active', safe_input($_POST['module_active'], ''));
            }
            $get_config = simplexml_load_file('../engine/config_mods/vote_credits_settings.xml');
            echo '<form action="" name="settings" method="POST">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_panel" style="margin-bottom: 20px;">
<tr>
 <td align="center" class="panel_title" colspan="2">Vote Credits Settings</td>
</tr>
<tr>';
            if ($get_config->active == '1') {
                echo '<td align="left" class="panel_buttons" style="background: #00a65a; color:#fff;"><b>Vote Credits is active.</b></td>
<td align="right" class="panel_buttons" style="background: #00a65a; color:#fff;">
<input type="hidden" name="edit_settings"><input type="submit" value="Turn Vote Credits Off" class="btn btn-block btn-danger btn-200"><input type="hidden" name="module_active" value="0">';
                
                
            } elseif ($get_config->active == '0') {
                echo '<td align="left" class="panel_buttons" style="background: #dd4b39; color:#fff;"><b>Vote Credits is inactive.</b></td>
<td align="right" class="panel_buttons" style="background: #dd4b39; color:#fff;">
<input type="hidden" name="edit_settings"><input type="submit" value="Turn Vote Credits On" class="btn btn-block btn-success btn-200"><input type="hidden" name="module_active" value="1">';
            }
            echo '</td>
</tr>
</table>
</form>';
            
            echo '<form action="" name="form_edit" method="POST">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_panel">
<tr>
 <td align="center" class="panel_title" colspan="2">Vote Credits Settings</td>
</tr>
<tr>
<td align="left" class="panel_title_sub" colspan="2">Delay Hours</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Enter in how many hours users can vote again after vote.</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top">
<input type="text" class="form-control" value="' . $get_config->delay_hours . '" name="delay_hours"><br>
</td>
</tr>

<tr>
<td align="left" class="panel_title_sub" colspan="2">Credits Bonus Type</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">Mu Coins Type</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top">
<select name="credits_type">
 ';

        if($get_config->credits_type == '1'){
            echo '<option value="1" selected="selected">'.$get_config00->money_name1.'</option><option value="2">'.$get_config00->money_name2.'</option>';
        }elseif($get_config->credits_type == '2'){
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
            
            
            
            echo '
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_panel" style="margin-top: 20px;">
<tr>
 <td align="center" class="panel_title" colspan="5">Vote Links</td>
</tr>
<tr>
<td align="left" class="panel_title_sub2">Title</td>
<td align="left" class="panel_title_sub2">Vote URl</td>
<td align="left" class="panel_title_sub2">Credits</td>
<td align="left" class="panel_title_sub2" width="80">Controls</td>
</tr>';
            
            
            $votef = file('../engine/variables_mods/vote_credits.tDB');
            $count = 0;
            foreach ($votef as $vote) {
                $vote_data = explode("¦", $vote);
                $count++;
                $tr_color = ($count % 2) ? '' : 'even';
                echo '
    <tr class="' . $tr_color . '">
    <td align="left" class="panel_text_alt_list"><strong>' . set_limit($vote_data[1], 30, '..') . '</strong></td>
    <td align="left" class="panel_text_alt_list">' . set_limit($vote_data[2], 30, '..') . '</td>
    <td align="left" class="panel_text_alt_list">' . number_format($vote_data[3]) . '</td>
    <td align="left" class="panel_text_alt_list"><a href="index.php?get=vote_credits_manager&m=edit&id=' . $vote_data[0] . '">[Edit]</a> / <a href="#" onclick="ask_url(\'Are you sure you want to delete this vote link?\',\'index.php?get=vote_credits_manager&delete=' . $vote_data[0] . '\')";>[Delete]</a></td>
    </tr>';
            }
            if ($count == '0') {
                echo '<tr>
    <td align="center" class="panel_text_alt_list" colspan="4"><em>No Vote Links Found</em></td>
    </tr>';
            }
            
            echo '<tr>
<td align="center" class="panel_buttons" colspan="4">
<input type="button" class="btn btn-success btn-200" value="Add Vote Link" onclick="location.href=\'index.php?get=vote_credits_manager&m=add\'"></td>
</tr>
</table>';
        }
    }
    
}

?> 