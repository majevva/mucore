<?
include ('../AOH_Addons/config_reset_custom.php');
if (isset($_GET['m'])) {
    if ($_GET['m'] == 'add') {
        if (isset($_POST['add'])) {
            if (empty($_POST['var_1']) || empty($_POST['var_2']) || empty($_POST['var_3']) || empty($_POST['var_4']) || empty($_POST['var_5'])) {
                echo notice_message_admin('Error some fields where left blank.', '0', '1', '0');
            } else {
        // VARIABLES DEVUELTAS DEL SUBMIT
        $var_1=$_POST['var_1'];
        $var_2=$_POST['var_2'];
        $var_3=$_POST['var_3'];
        $var_4=$_POST['var_4'];
        $var_5=$_POST['var_5'];
        //GUARDANDO LAS VARIABLES + EDITADA
        $new_db = fopen("../AOH_Addons/config_reset_custom.php", "w");

        $data = "<?\r\n";
        $data .= "\$_ResetsCustom = array(\r\n";

        $count=-1;
        for($Menu = 0; $Menu < count($_ResetsCustom); $Menu++)
        {
        $count++;

        $data .="".$count." => array('".$count."', '".$_ResetsCustom[$Menu][1]."', '".$_ResetsCustom[$Menu][2]."', '".$_ResetsCustom[$Menu][3]."', '".$_ResetsCustom[$Menu][4]."', '".$_ResetsCustom[$Menu][5]."'),\r\n";
        
        }
        $countfix=$count+1;
        $data .="".$countfix." => array('".$countfix."', '".$var_1."', '".$var_2."', '".$var_3."', '".$var_4."', '".$var_5."'),\r\n";
        $data .=");\r\n"; 
        $data .="?>";
        fwrite($new_db,$data);
        fclose($new_db);        
                
                echo notice_message_admin('Reset Cat. successfully added', 1, 0, 'index.php?get=aoh_reset_custom');
            }
            
        } else {
            echo '<form action="" method="POST" name="name">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_panel">
<tr>
 <td align="center" class="panel_title" colspan="2">Agregar Categoria Reset (Max 9)</td>
</tr>

<tr>
<td align="left" class="panel_title_sub" colspan="2">Nivel</td>
</tr>

<tr>
<td align="left" class="panel_text_alt1" width="50%">Nivel Requerido</td>
<td align="left" class="panel_text_alt2" width="50%"><input type="text" class="form-control"  name="var_1" value=""></td>
</tr>

<tr>
<td align="left" class="panel_title_sub" colspan="2">Reset Minimo</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="50%">Reset minimo Requerido.</td>
<td align="left" class="panel_text_alt2" width="50%"><input type="text" class="form-control" name="var_2" value=""></td>
</tr>

<tr>
<td align="left" class="panel_title_sub" colspan="2">Reset Maximo</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="50%">Reset Maximo Requerido.</td>
<td align="left" class="panel_text_alt2" width="50%"><input type="text" class="form-control" name="var_3" value=""></td>
</tr>

<tr>
<td align="left" class="panel_title_sub" colspan="2">Precio</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="50%">Precio en ZEN, no usar (,) ni (.)</td>
<td align="left" class="panel_text_alt2" width="50%"><input type="text" class="form-control" name="var_4" value=""></td>
</tr>

<tr>
<td align="left" class="panel_title_sub" colspan="2">Puntos</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="50%">Puntos por Reset a entregar.</td>
<td align="left" class="panel_text_alt2" width="50%"><input type="text" class="form-control" name="var_5" value=""></td>
</tr>



<tr>
<td align="center" class="panel_buttons" colspan="2">
<input type="hidden" name="add">
<input type="submit" class="btn btn-success btn-200" value="Agregar Categoria"></td>
</tr>

</table>
</form>';
        }
        
    } elseif ($_GET['m'] == 'edit') {
        $p_id   = safe_input(xss_clean($_GET['id']), '_');
        
        $var_0=$_ResetsCustom[$p_id][0];
        $var_1=$_ResetsCustom[$p_id][1];
        $var_2=$_ResetsCustom[$p_id][2];
        $var_3=$_ResetsCustom[$p_id][3];
        $var_4=$_ResetsCustom[$p_id][4];
        $var_5=$_ResetsCustom[$p_id][5];

        if (isset($_POST['edit'])) {
            if (empty($_POST['var_1']) || empty($_POST['var_2']) || empty($_POST['var_3']) || empty($_POST['var_4']) || empty($_POST['var_5'])) {
                echo notice_message_admin('Error some fields where left blank.', '0', '1', '0');
            } else {

    // VARIABLES DEVUELTAS DEL SUBMIT
        $var_0=$p_id;
        $var_1=$_POST['var_1'];
        $var_2=$_POST['var_2'];
        $var_3=$_POST['var_3'];
        $var_4=$_POST['var_4'];
        $var_5=$_POST['var_5'];
    //GUARDANDO LAS VARIABLES + EDITADA
        $new_db = fopen("../AOH_Addons/config_reset_custom.php", "w");

        $data = "<?\r\n";
        $data .= "\$_ResetsCustom = array(\r\n";

        $count=-1;
        for($Menu = 0; $Menu < count($_ResetsCustom); $Menu++)
        {
            if ($_ResetsCustom[$Menu][0] < $p_id) {
            $count++;
                $data .="".$count." => array('".$count."', '".$_ResetsCustom[$Menu][1]."', '".$_ResetsCustom[$Menu][2]."', '".$_ResetsCustom[$Menu][3]."', '".$_ResetsCustom[$Menu][4]."', '".$_ResetsCustom[$Menu][5]."'),\r\n";
            }
            if ($_ResetsCustom[$Menu][0] == $p_id) {
            $count++;
                $data .="".$var_0." => array('".$var_0."', '".$var_1."', '".$var_2."', '".$var_3."', '".$var_4."', '".$var_5."'),\r\n";
            }

            if ($_ResetsCustom[$Menu][0] > $p_id) {
            $count++;
                $data .="".$count." => array('".$count."', '".$_ResetsCustom[$Menu][1]."', '".$_ResetsCustom[$Menu][2]."', '".$_ResetsCustom[$Menu][3]."', '".$_ResetsCustom[$Menu][4]."', '".$_ResetsCustom[$Menu][5]."'),\r\n";
            }
        }

        $data .=");\r\n"; 
        $data .="?>";
        fwrite($new_db,$data);
        fclose($new_db);
                
                
                echo notice_message_admin('Reset Cat successfully edited', 1, 0, 'index.php?get=aoh_reset_custom');
            }
            
        } else {
            echo '<form action="" method="POST" name="name">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_panel">
<tr>
 <td align="center" class="panel_title" colspan="2">Edit Reset Cat: '.$var_0.'</td>
</tr>

<tr>
<td align="left" class="panel_title_sub" colspan="2">Nivel</td>
</tr>

<tr>
<td align="left" class="panel_text_alt1" width="50%">Nivel Requerido</td>
<td align="left" class="panel_text_alt2" width="50%"><input type="text" class="form-control"  name="var_1" value="' . $var_1 . '"></td>
</tr>

<tr>
<td align="left" class="panel_title_sub" colspan="2">Reset Minimo</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="50%">Reset minimo Requerido.</td>
<td align="left" class="panel_text_alt2" width="50%"><input type="text" class="form-control" name="var_2" value="' . $var_2 . '"></td>
</tr>

<tr>
<td align="left" class="panel_title_sub" colspan="2">Reset Maximo</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="50%">Reset Maximo Requerido.</td>
<td align="left" class="panel_text_alt2" width="50%"><input type="text" class="form-control" name="var_3" value="' . $var_3 . '"></td>
</tr>

<tr>
<td align="left" class="panel_title_sub" colspan="2">Precio</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="50%">Precio en ZEN, no usar (,) ni (.)</td>
<td align="left" class="panel_text_alt2" width="50%"><input type="text" class="form-control" name="var_4" value="' . $var_4 . '"></td>
</tr>

<tr>
<td align="left" class="panel_title_sub" colspan="2">Puntos</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="50%">Puntos por Reset a entregar.</td>
<td align="left" class="panel_text_alt2" width="50%"><input type="text" class="form-control" name="var_5" value="' . $var_5 . '"></td>
</tr>



<tr>
<td align="center" class="panel_buttons" colspan="2">
<input type="hidden" name="edit">
<input type="submit" class="btn btn-success btn-200" value="Guardar Datos"></td>
</tr>

</table>
</form>';
        }
        
    }
    
} else {

        if (isset($_GET['delete'])) {
            if (empty($_GET['delete'])) {
                echo notice_message_admin('Unable to proceed your request.', '1', '1', 'index.php?get=aoh_reset_custom');
            } else {
       
       $p_id = safe_input(xss_clean($_GET['delete']), '_');
                
        $new_db = fopen("../AOH_Addons/config_reset_custom.php", "w");
        $data = "<?\r\n";
        $data .= "\$_ResetsCustom = array(\r\n";

        $count=-1;
        for($Menu = 0; $Menu < count($_ResetsCustom); $Menu++)
        {
            if ($_ResetsCustom[$Menu][0] != $p_id) {
            $count++;
                $data .="".$count." => array('".$count."', '".$_ResetsCustom[$Menu][1]."', '".$_ResetsCustom[$Menu][2]."', '".$_ResetsCustom[$Menu][3]."', '".$_ResetsCustom[$Menu][4]."', '".$_ResetsCustom[$Menu][5]."'),\r\n";
            }
        }
        $data .=");\r\n"; 
        $data .="?>";
        fwrite($new_db,$data);
        fclose($new_db);

        echo notice_message_admin('Categoria Reset deleted', 1, 0, 'index.php?get=aoh_reset_custom');
            }
        } else {
            
            
            
            echo '
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_panel" style="margin-top: 20px;">
<tr>
 <td align="center" class="panel_title" colspan="7">Resets List</td>
</tr>
<tr>
<td align="left" class="panel_title_sub2">Nro.</td>
<td align="left" class="panel_title_sub2">Nivel Req.</td>
<td align="left" class="panel_title_sub2">Reset Minimo</td>
<td align="left" class="panel_title_sub2">Reset Maximo</td>
<td align="left" class="panel_title_sub2">Precio (ZEN)</td>
<td align="left" class="panel_title_sub2">Puntos por Reset</td>
<td align="left" class="panel_title_sub2" width="80">Controls</td>
</tr>';
            

        $count = 0;
        for($Menu = 0; $Menu < count($_ResetsCustom); $Menu++)
        {
        $count++;
        $tr_color = ($count % 2) ? '' : 'even';
            echo '
        <tr class="' . $tr_color . '">
        <td align="left" class="panel_text_alt_list"><strong>'.$_ResetsCustom[$Menu][0].'</strong></td>
        <td align="left" class="panel_text_alt_list"><strong>'.$_ResetsCustom[$Menu][1].'</strong></td>
        <td align="left" class="panel_text_alt_list"><strong>'.$_ResetsCustom[$Menu][2].'</strong></td>
        <td align="left" class="panel_text_alt_list"><strong>'.$_ResetsCustom[$Menu][3].'</strong></td>
        <td align="left" class="panel_text_alt_list"><strong>'.$_ResetsCustom[$Menu][4].'</strong></td>
        <td align="left" class="panel_text_alt_list"><strong>'.$_ResetsCustom[$Menu][5].'</strong></td>
        <td align="left" class="panel_text_alt_list"><a href="index.php?get=aoh_reset_custom&m=edit&id=' . $_ResetsCustom[$Menu][0] . '">[Edit]</a> / <a href="#" onclick="ask_url(\'Are you sure you want to delete this Reset Cat.?\',\'index.php?get=aoh_reset_custom&delete=' . $_ResetsCustom[$Menu][0] . '\')";>[Delete]</a></td>
        </tr>';
        }


            if ($count == '0') {
                echo '<tr>
    <td align="center" class="panel_text_alt_list" colspan="7"><em>No Resets Config Found</em></td>
    </tr>';
            }
            
            echo '<tr>
<td align="center" class="panel_buttons" colspan="7">
<input type="button" class="btn btn-success btn-200" value="Add Reset Cat." onclick="location.href=\'index.php?get=aoh_reset_custom&m=add\'"></td>
</tr>
</table>';
        }
    
    
}

?> 