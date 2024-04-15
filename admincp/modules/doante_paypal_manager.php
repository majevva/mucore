<?
$get_config00 = simplexml_load_file('../engine/config_mods/mu_coins_settings.xml');
if(isset($_GET['mod'])){
	if($_GET['mod'] == 'new'){
		if(isset($_POST['new'])){
			if(empty($_POST['credits']) || empty($_POST['amount']) || $_POST['currency'] == 'x'){
				echo notice_message_admin('Error some fields where left blank.','0','1','0');
			}else{
				$credits = safe_input($_POST['credits'],'');
				$tipo = safe_input($_POST['tipocredito'],'');
				$order = safe_input($_POST['order'],'');
				$active = safe_input($_POST['active'],'');
				$amount = safe_input($_POST['amount'],'\.');
				$currency = safe_input($_POST['currency'],'');
				
				
				$db = fopen("../engine/variables_mods/paypal_donate.tDB", "a+");
				fwrite($db,$order.",".uniqid().",".$credits.",".$tipo.",".$active.",".$amount.",".$currency.",\n");
				fclose($db);
				
				echo notice_message_admin('Donate Package successfully added',1,0,'index.php?get=doante_paypal_manager');	
				
			}
			
		}else{
				echo '<form action="" method="POST" name="form">
	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_panel">
	<tr>
	 <td align="center" class="panel_title" colspan="2">Add Donate Package</td>
	</tr>
	
	<tr>
	<td align="left" class="panel_title_sub" colspan="2">Cantidad de Creditos</td>
	</tr>
	<tr>
	<td align="left" class="panel_text_alt1" width="50%">Ingrese la cantidad de creditos.</td>
	<td align="left" class="panel_text_alt2" width="50%"><input type="text" class="form-control"  name="credits" value="100"></td
	</tr>

	<tr>
	<td align="left" class="panel_title_sub" colspan="2">Tipo de Credito</td>
	</tr>
	<tr>
	<td align="left" class="panel_text_alt1" width="50%">Elija el tipo de credito</td>
	<td align="left" class="panel_text_alt2" width="50%">
	<select name="tipocredito">
	<option value="1" selected="selected">'.$get_config00->money_name1.'</option>
	<option value="2">'.$get_config00->money_name2.'</option>
	</select>
	</td
	</tr>

	<tr>
	<td align="left" class="panel_title_sub" colspan="2">Display Order</td>
	</tr>
	<tr>
	<td align="left" class="panel_text_alt1" width="50%">This controls the order that the donate package will be displayed in for the donate package list and in the Admin Control Panel.</td>
	<td align="left" class="panel_text_alt2" width="50%"><input type="text" class="form-control"  name="order" value="0"></td
	</tr>
	
	<tr>
	<td align="left" class="panel_title_sub" colspan="2">Active</td>
	</tr>
	<tr>
	<td align="left" class="panel_text_alt1" width="50%">When set \'No\' doante pacakge will not be visibile.</td>
	<td align="left" class="panel_text_alt2" width="50%">
	<label><input type="radio" class="minimal" name="active" checked="checked" value="1">Yes</label> 
	<label><input type="radio" class="minimal" name="active" value="0">No</label></td
	</tr>
	
	<tr>
	<td align="left" class="panel_title_sub" colspan="2">Precio y Moneda</td>
	</tr>
	<tr>
	<td align="left" class="panel_text_alt1" width="50%">Set the cost amount and currency for this donate package.</td>
	<td align="left" class="panel_text_alt2" width="50%">Amount <input type="text" class="form-control"  name="amount" size="4" value="5">&nbsp;Currency 
	<select name="currency">
	<option value="x">Select Currency</option>
	<optgroup label="----------------">
	<option value="USD" selected="selected">USD</option>
	<option value="EUR">EUR</option>
	</select>
	</td
	</tr>
	
	<tr>
	<td align="center" class="panel_buttons" colspan="2">
	<input type="hidden" name="new">
	<input type="submit" class="btn btn-block btn-success btn-200" value="Add Donate Package"></td>
	</tr>
	
	</table>
	</form>';
		}
	}elseif ($_GET['mod'] == 'edit'){
		$id = safe_input(xss_clean($_GET['id']),'');
		$get = file('../engine/variables_mods/paypal_donate.tDB');
		foreach ($get as $data){
			$data = explode(",",$data);
			if($data[1] == $id){
				
				$credits = $data[2];
				$tipo = $data[3];
				$order = $data[0];
				$active  = $data[4];
				$amount = $data[5];
				$currency = $data[6];

				break;
			}
			}
		if(isset($_POST['edit'])){
			if(empty($_POST['credits']) || empty($_POST['amount']) || $_POST['currency'] == 'x'){
				echo notice_message_admin('Error some fields where left blank.','0','1','0');
			}else{

				$credits = safe_input($_POST['credits'],'');
				$tipo = safe_input($_POST['tipocredito'],'');
				$order = safe_input($_POST['order'],'');
				$active = safe_input($_POST['active'],'');
				$amount = safe_input($_POST['amount'],'\.');
				$currency = safe_input($_POST['currency'],'');
				
			$old_db = file("../engine/variables_mods/paypal_donate.tDB");
			$new_db = fopen("../engine/variables_mods/paypal_donate.tDB", "w");
			foreach($old_db as $old_db_line){
				$old_db_arr = explode(",", $old_db_line);
				if($id != $old_db_arr[1]){
					fwrite($new_db,"$old_db_line");
				}else{
					fwrite($new_db,$order.",".$id.",".$credits.",".$tipo.",".$active.",".$amount.",".$currency.",\n");
				}
			}
			fclose($new_db);
			echo notice_message_admin('Donate Package successfully edited',1,0,'index.php?get=doante_paypal_manager');	
			}
							
			
		}else{
				echo '<form action="" method="POST" name="form">
	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_panel">
	<tr>
	 <td align="center" class="panel_title" colspan="2">Edit Donate Package</td>
	</tr>
	
	<tr>
	<td align="left" class="panel_title_sub" colspan="2">Cantidad de Creditos</td>
	</tr>
	<tr>
	<td align="left" class="panel_text_alt1" width="50%">Ingrese la cantidad de creditos.</td>
	<td align="left" class="panel_text_alt2" width="50%"><input type="text" class="form-control"  name="credits" value="'.$credits.'"></td
	</tr>

	<tr>
	<td align="left" class="panel_title_sub" colspan="2">Tipo de Credito</td>
	</tr>
	<tr>
	<td align="left" class="panel_text_alt1" width="50%">Elija el tipo de credito</td>
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
	</td
	</tr>

	<tr>
	<td align="left" class="panel_title_sub" colspan="2">Display Order</td>
	</tr>
	<tr>
	<td align="left" class="panel_text_alt1" width="50%">This controls the order that the donate package will be displayed in for the donate package list and in the Admin Control Panel.</td>
	<td align="left" class="panel_text_alt2" width="50%"><input type="text" class="form-control"  name="order" value="'.$order.'"></td
	</tr>
	
	<tr>
	<td align="left" class="panel_title_sub" colspan="2">Active</td>
	</tr>
	<tr>
	<td align="left" class="panel_text_alt1" width="50%">When set \'No\' doante pacakge will not be visibile.</td>
	<td align="left" class="panel_text_alt2" width="50%">';
			switch ($active){
					case '0': echo '<label><input type="radio" class="minimal" name="active" value="1">Yes</label> <label><input type="radio" class="minimal" name="active" checked="checked" value="0">No'; break;
					case '1': echo '<label><input type="radio" class="minimal" name="active" checked="checked" value="1">Yes</label> <label><input type="radio" class="minimal" name="active" value="0">No</label>'; break;
				}	
	
	echo '</td
	</tr>
	
	<tr>
	<td align="left" class="panel_title_sub" colspan="2">Cost Amount and Currency</td>
	</tr>
	<tr>
	<td align="left" class="panel_text_alt1" width="50%">Set the cost amount and currency for this donate package.</td>
	<td align="left" class="panel_text_alt2" width="50%">Amount <input type="text" class="form-control"  name="amount" value="'.$amount.'" size="4">&nbsp;Currency 
	<select name="currency">
	<option value="x">Select Currency</option>
	<optgroup label="----------------">';
	switch ($currency){
		case 'USD': echo '<option value="USD" selected="selected">USD</option><option value="EUR">EUR</option>'; break;
		case 'EUR': echo '<option value="USD">USD</option><option value="EUR"  selected="selected">EUR</option>'; break;
	}
	
	echo '
	
	
	</select>
	</td
	</tr>
	
	<tr>
	<td align="center" class="panel_buttons" colspan="2">
	<input type="hidden" name="edit">
	<input type="submit" class="btn btn-block btn-info btn-200" value="Edit Donate Package"></td>
	</tr>
	
	</table>
	</form>';
		}
		
	}
	
	
}else{
	if(isset($_POST['save_order'])){
		
	foreach ($_POST['display_order'] as $post_name => $post_order){
		
		$get_true_config = file('../engine/variables_mods/paypal_donate.tDB');
		foreach ($get_true_config as $old_config){
			$old_config = explode(",",$old_config);
			if($old_config[1] == $post_name){
				$title = $old_config[2];
				$active = $old_config[3];
				$amount = $old_config[4];
				$currency = $old_config[5];
				$credits = $old_config[6];
				break;
			}
		}
		$new_cfg = safe_input($post_order,'').",".$post_name.",".$title.",".$active.",".$amount.",".$currency.",".$credits.",\n";
	
		
		#echo $new_cfg.'<br>';
		
		$old_db = file("../engine/variables_mods/paypal_donate.tDB");
		$new_db = fopen("../engine/variables_mods/paypal_donate.tDB", "w");
		foreach($old_db as $old_db_line){
			$old_db_arr = explode(",", $old_db_line);
			if($post_name != $old_db_arr[1]){
                fwrite($new_db,"$old_db_line");
			}else{
                fwrite($new_db,$new_cfg);
			}
		}
		fclose($new_db);
		
    
	}
	echo notice_message_admin('Display Order successfully saved',1,0,'index.php?get=doante_paypal_manager');
	}elseif (isset($_GET['delete'])){
		if(empty($_GET['delete'])){
			echo notice_message_admin('Unable to proceed your request.','1','1','index.php?get=doante_paypal_manager');
		}else{
			$id = safe_input(xss_clean($_GET['delete']),'_');
			delete_variable('../engine/variables_mods/paypal_donate.tDB','1',$id,",");
		    echo notice_message_admin('Donate Package successfully deleted',1,0,'index.php?get=doante_paypal_manager');
		}
		
	}else{
		
		echo '
<form action="" method="POST" name="save_order">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_panel">
<tr>
 <td align="center" class="panel_title" colspan="7">PayPal Donate Packages</td>
</tr>
<tr>
<td align="left" class="panel_title_sub2" width="100">Display Order</td>
<td align="left" class="panel_title_sub2" width="80">Status</td>
<td align="left" class="panel_title_sub2" width="100">Precio</td>
<td align="left" class="panel_title_sub2" width="60">Currency</td>
<td align="left" class="panel_title_sub2" width="140">Credits (MU Coins)</td>
<td align="left" class="panel_title_sub2" width="80">Controls</td>
</tr>';
	
$donate_file = get_sort('../engine/variables_mods/paypal_donate.tDB',",");
$count=0;
foreach ($donate_file as $donate){
	$count++;
	$tr_color = ($count % 2) ? '' : 'even'; 
	switch ($donate[4]){
		case '0': $status = '<em>Inactive</em>'; break;
		case '1': $status = '<b>Active</b'; break;
	}
	switch ($donate[3]){
		case '1': $tipocredito = '<em>'.$get_config00->money_name1.'</em>'; break;
		case '2': $tipocredito = '<b>'.$get_config00->money_name2.'</b'; break;
	}
		echo '
		<tr class="'.$tr_color.'">
		<td align="left" class="panel_text_alt_list"><input type="text" class="form-control" name="display_order['.$donate[1].']" value="'.$donate[0].'" size="3"></td>
		<td align="left" class="panel_text_alt_list">'.$status.'</td>
		<td align="left" class="panel_text_alt_list">'.$donate[5].'</td>
		<td align="left" class="panel_text_alt_list">'.$donate[6].'</td>
		<td align="left" class="panel_text_alt_list">'.number_format($donate[2]).' de '.$tipocredito.'</td>
		<td align="left" class="panel_text_alt_list" width="80"><a href="index.php?get=doante_paypal_manager&mod=edit&id='.$donate[1].'">[Edit]</a> / <a href="#" onclick="ask_url(\'Are you sure you want to delete this donate package?\',\'index.php?get=doante_paypal_manager&delete='.$donate[1].'\')";>[Delete]</a></td>

		</tr>';
		
}
if($count == '0'){
	echo '<td align="center" class="panel_text_alt_list" colspan="7"><em>No donate packages</em></td>';
}
echo '<tr>
<td align="center" class="panel_buttons" colspan="7">

<input type="hidden" name="save_order">
<input type="submit" class="btn btn-primary btn-200" value="Save Display Order"> <input type="button" class="btn btn-success btn-200" value="Add New Donate Package" onclick="location.href=\'index.php?get=doante_paypal_manager&mod=new\'"></td>
</tr>
</table>
</form>';

	}
	
}

?>