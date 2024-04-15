<script type="text/javascript" src="script/yahoo-dom-event.js"></script>

	<script type="text/javascript">
	function fetch_object(A){
	if(document.getElementById){
		return document.getElementById(A)
	}else{
		if(document.all){
			return document.all[A]}else{
				if(document.layers){
					return document.layers[A]
				}else{
					return null
				}
			}
	}
}
	</script>
<script type="text/javascript" src="script/animation-min.js"></script>
<script type="text/javascript" src="script/dragdrop-min.js"></script>
<script type="text/javascript" src="script/core_cms_admin_dd.js"></script>

<style type="text/css">
<!--
ul.draglist { 
	position: relative;
	border: 1px dashed gray;
	list-style: none;
	margin: 0;
	padding: 13px 5px 13px 5px;
	
}

ul.draglist li {
	margin: 2px;
	cursor: move;
	width: 97%;
}

ul.draglist_inact { 
	position: relative;
	border: 1px dashed gray;
	list-style: none;
	margin: 0;
	padding: 13px 5px 13px 5px;
}

ul.draglist_inact li {
	margin: 2px;
	cursor: move;
	width: 97%;
}

li.dlistitem {
	text-align: left;
	margin: 0;
	padding: 3px;
	border: 1px outset #7EA6B2;
}
-->
</style>	

<?
$get_config00 = simplexml_load_file('../engine/config_mods/mu_coins_settings.xml');
	if(isset($_GET['edit_page'])){
		if($_GET['m'] == '0'){
			
		
		if(isset($_POST['edit_page'])){
	    	if($_POST['p_order'] == '0'){
				$order = 'not_blank';
			}else{
				$order = $_POST['p_order'];
			}
			
			if(empty($_POST['p_dias']) || empty($_POST['p_precio'])){
				echo notice_message_admin('Error some fields where left blank.','0','1','0');
			}else{
	

		$old_db = file("../engine/variables_mods/Paquetes_Vip.tDB");
		$new_db = fopen("../engine/variables_mods/Paquetes_Vip.tDB", "w");
		foreach($old_db as $old_db_line){
			$old_db_arr = explode(",", $old_db_line);
			if(safe_input(xss_clean($_GET['edit_page']),'') != $old_db_arr[0]){
                fwrite($new_db,"$old_db_line");
			}else{
                fwrite($new_db,$_GET['edit_page'].",".$_POST['p_dias'].",".$_POST['p_precio'].",".$_POST['tipocredito'].",".$_POST['tipovip'].",\n");
			}
		}
		fclose($new_db);
		echo notice_message_admin('Page successfully saved',1,0,'index.php?get=aoh_buy_vip#'.safe_input(xss_clean($_GET['edit_page']),'').'');
					

			}
		}else{
			$page_id = safe_input(xss_clean($_GET['edit_page']),'');
			$get_true_config = file('../engine/variables_mods/Paquetes_Vip.tDB');
			foreach ($get_true_config as $old_config){
				$old_config = explode(",",$old_config);
				if($old_config[0] == $page_id){
					
					$dias= $old_config[1];
					$precio = $old_config[2];
					$tipo = $old_config[3];
					$tipovip = $old_config[4];
					break;
				}
			}

		

echo '<form action="" method="POST" name="save_page" onsubmit="return YAHOO.DDApp.showOrder()">
<input type="hidden" id="columns" name="vba_mod_cols" value="1,2,3" />
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_panel">
<tr>
 <td align="center" class="panel_title" colspan="2">Editar Precio: '.$nombre.'</td>
</tr>


<tr>
<td align="left" class="panel_text_alt1" width="50%">Dias de VIP</td>
<td align="left" class="panel_text_alt2" width="50%"><input type="text" class="form-control" value="'.$dias.'" name="p_dias"></td>
</tr>

<tr> 
<td align="left" class="panel_text_alt1" width="50%">Precio del VIP</td>
<td align="left" class="panel_text_alt2" width="50%"><input type="text" class="form-control" value="'.$precio.'" name="p_precio"></td>
</tr>

<tr> 
<td align="left" class="panel_text_alt1" width="50%">Tipo de Precio</td>
<td align="left" class="panel_text_alt2" width="50%">
<select name="tipocredito">
 ';
        if($tipo == '1'){
            echo '<option value="1" selected="selected">'.$get_config00->money_name1.'</option><option value="2">'.$get_config00->money_name2.'</option>';
        }elseif($tipo == '2'){
            echo '<option value="1">'.$get_config00->money_name1.'</option><option value="2" selected="selected">'.$get_config00->money_name2.'</option>';
            
        }
        echo '
</select>
</td>
</tr>

<tr> 
<td align="left" class="panel_text_alt1" width="50%">Tipo de VIP</td>
<td align="left" class="panel_text_alt2" width="50%">
<select name="tipovip">
 ';
        if($tipovip == '1'){
            echo '<option value="1" selected="selected">Vip Level: 1</option><option value="2">Vip Level: 2</option><option value="3">Vip Level: 3</option>';
        }elseif($tipovip == '2'){
            echo '<option value="1">Vip Level: 1</option><option value="2" selected="selected">Vip Level: 2</option><option value="3">Vip Level: 3</option>';  
        }elseif($tipovip == '3'){
            echo '<option value="1">Vip Level: 1</option><option value="2">Vip Level: 2</option><option value="3" selected="selected">Vip Level: 3</option>';
            
        }
        echo '
</select>
</td>
</tr>

</table>

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_panel" style="margin-top: 20px;">
<tr>
<td align="center" class="panel_buttons" colspan="2">
<input type="hidden" name="edit_page">
<input type="submit" class="btn bg-olive margin" value="Save"></td>
</tr>
</table>
</form>
';
		}
		
		}elseif ($_GET['m'] == '1'){
		if(isset($_POST['add_page'])){
			
			
			if(empty($_POST['p_dias']) || empty($_POST['p_precio'])){
				echo notice_message_admin('Error some fields where left blank.','0','1','0');
			}else{
				$p_id = uniqid();
				$new_cfg = $p_id.",".$_POST['p_dias'].",".$_POST['p_precio'].",".$_POST['tipocredito'].",".$_POST['tipovip'].",\r\n";
				$open_f = fopen('../engine/variables_mods/Paquetes_Vip.tDB','a');
				$write_f = fwrite($open_f,$new_cfg);
				$close_f = fclose($open_f);
				echo notice_message_admin('Additional Bank successfully added',1,0,'index.php?get=aoh_buy_vip');
			}
			
		}else{
			echo '<form action="" method="POST" name="save_page">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_panel">
<tr>
 <td align="center" class="panel_title" colspan="2">Agregar Precio</td>
</tr>

<tr>
<td align="left" class="panel_text_alt1" width="50%">Dias VIP</td>
<td align="left" class="panel_text_alt2" width="50%"><input type="text" class="form-control"  name="p_dias" value="3"></td>
</tr>

<tr>
<td align="left" class="panel_text_alt1" width="50%">Precio</td>
<td align="left" class="panel_text_alt2" width="50%"><input type="text" class="form-control" name="p_precio" value="10"></td>
</tr>

<tr>
<td align="left" class="panel_text_alt1" width="50%">Tipo de Precio</td>
<td align="left" class="panel_text_alt2" width="50%">
<select name="tipocredito">
	<option value="1" selected="selected">'.$get_config00->money_name1.'</option>
	<option value="2">'.$get_config00->money_name2.'</option>
	</select>
</td>
</tr>

<tr>
<td align="left" class="panel_text_alt1" width="50%">Tipo de Vip</td>
<td align="left" class="panel_text_alt2" width="50%">
<select name="tipovip" id="tipovip">
	  <option value="1" selected="selected">Vip Level 1</option>
	  <option value="2">Vip Level 2</option>
	  <option value="3">Vip Level 3</option>
	  </select>
</td>
</tr>

<tr>
<td align="center" class="panel_buttons" colspan="2">
<input type="hidden" name="p_type" value="1">
<input type="hidden" name="add_page">
<input type="submit" class="btn btn-success btn-200" value="Add Precio"></td>
</tr>

</table>
</form>';
		}
		
	}
		
	}else{
		if(isset($_GET['delete_page'])){
			if(empty($_GET['delete_page'])){
				echo notice_message_admin('Unable to proceed your request.','1','1','index.php?get=edit_pages');
				
			}else{
				$p_id = $_GET['delete_page'];
				$p_file = file('../engine/variables_mods/Paquetes_Vip.tDB');
					foreach ($p_file as $check_id){
						$check_id = explode(",",$check_id);
						if($check_id[0] == $p_id){
							$p_id_found = '1';
							break;
						}
					}
					if($p_id_found != '1'){
						echo notice_message_admin('Page with ID: <b>'.$p_id.'</b> does not exist.','0','1','0');
					}else{
						
						$new_db = fopen("../engine/variables_mods/Paquetes_Vip.tDB", "w");
						foreach($p_file as $new_db_line){
							$db_line = explode(",", $new_db_line);
							if($db_line[0] != $p_id ){
								fwrite($new_db, $new_db_line);
								#echo $new_db_line;
							}
						}
						fclose($new_db);
						echo notice_message_admin('Page successfully deleted',1,0,'index.php?get=aoh_buy_vip');
					}
				
			}
			
		}else{
echo '
<form action="" method="POST" name="save_order">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_panel">
<tr>
 <td align="center" class="panel_title" colspan="9">Lista de Precios</td>
</tr>
<tr>
<td align="left" class="panel_title_sub2">Dias</td>
<td align="left" class="panel_title_sub2">Precio</td>
<td align="left" class="panel_title_sub2">Tipo</td>
<td align="left" class="panel_title_sub2">Controls</td>
</tr>';
$get_pages = get_sort('../engine/variables_mods/Paquetes_Vip.tDB',",");
$count=0;
foreach ($get_pages as $page){
	explode(",",$page);
	$count++;
  	$tr_color = ($count % 2) ? '' : 'even'; 
  	switch ($page[3]){
		case '1': $tipocredito = '<em>'.$get_config00->money_name1.'</em>'; break;
		case '2': $tipocredito = '<b>'.$get_config00->money_name2.'</b'; break;
	}
	echo '
	<tr class="'.$tr_color.'">
	<td align="left" class="panel_text_alt_list"><strong>'.$page[1].' Dias</strong></td>
	<td align="left" class="panel_text_alt_list">'.$page[2].' de '.$tipocredito.'</td>
	<td align="left" class="panel_text_alt_list">Vip Level: '.$page[4].'</td>
	';
	
	$link_edit = 'index.php?get=aoh_buy_vip&m=0&edit_page='.$page[0].'';
	echo '<td align="left" class="panel_text_alt_list" ><a href="'.$link_edit.'">[Edit]</a> / <a href="javascript:void(0);" onclick="ask_url(\'Delete '.$p_type.': '.$page[0].'?\',\'index.php?get=aoh_buy_vip&delete_page='.$page[0].'\')";>[Delete]</a></td>
	</tr>';
}

echo'
<tr>
<td align="center" class="panel_buttons" colspan="9">
<input type="button" class="btn btn-success btn-200" value="Agregar Precio" onclick="location.href=\'index.php?get=aoh_buy_vip&m=1&edit_page=\'"></td>
</tr>
</table>
</form>
';
		}
	}
?>