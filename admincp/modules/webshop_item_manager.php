<?php
require('../engine/webshop.php');
require('../engine/webshop_custom_variables.php');
if($_GET['m'] == 'new'){
	$insert_item = $core_db->Execute("INSERT INTO wshopp (name,cat,id,x,y,level,luck,skill,ad,anc,sk,refin,exc,cost,ptt,class1,class2,class3,class4,class5,class6,class7,dur,lvlreq,dmgdef,onsell,cost_zen,pay_type_gc,pay_type_c,pay_type_zen,harmony,bought_times,item_exc_type) VALUES ('New Item','8','17','1','2','13','0','0','0','0','0','0','0','999999','2','1','1','1','1','1','1','1','12','0','1','1','1','1','1','0','0','0','0')");
	if($insert_item){
		$take_last_item = $core_db->Execute("Select top 1 code from wshopp order by code desc");
		
		
		echo notice_message_admin('Item successfully created, you wil be redirected to edit panel.',1,0,'index.php?get=webshop_item_manager&m=edit&id='.$take_last_item->fields[0].'');
		
	}
	
}elseif ($_GET['m'] == 'edit'){
	$id = safe_input($_GET['id'],'');
	if(isset($_POST['edit'])){
		if(empty($_POST['name'])){
			echo notice_message_admin('Error some fields where left blank.','0','1','0');
		}else{
			
			$i_serial = '1';
		
	    if(@$_POST['onsell'] == ''){
			$_POST['onsell'] = '0';
		}
		if(@$_POST['pay_type_gc'] == ''){
			@$_POST['pay_type_gc'] = '0';
		}
		if(@$_POST['pay_type_c'] == ''){
			$_POST['pay_type_gc'] = '0';
		}
		if(@$_POST['pay_type_zen'] == ''){
			$_POST['pay_type_zen'] = '0';
		}
		if(@$_POST['harmony'] == ''){
			$_POST['harmony'] = '0';
		}
		if(@$_POST['refin'] == ''){
			$_POST['refin'] = '0';
		}
		if(@$_POST['luck'] == ''){
			$_POST['luck'] = '0';
		}
		if(@$_POST['skill'] == ''){
			$_POST['skill'] = '0';
		}
		if(@$_POST['class1'] == ''){
			$_POST['class1'] = '0';
		}
		if(@$_POST['class2'] == ''){
			$_POST['class2'] = '0';
		}
		if(@$_POST['class3'] == ''){
			$_POST['class3'] = '0';
		}
		if(@$_POST['class4'] == ''){
			$_POST['class4'] = '0';
		}
		if(@$_POST['class5'] == ''){
			$_POST['class5'] = '0';
		}
		if(@$_POST['class6'] == ''){
			$_POST['class6'] = '0';
		}
		if(@$_POST['class7'] == ''){
			$_POST['class7'] = '0';
		}
		
	
		
		$update_item = $core_db->Execute("Update wshopp set 
		onsell=?,
		pay_type_gc=?,
		pay_type_c=?,
		pay_type_zen=?,
		name=?,
		x=?,
		y=?,
		cat=?,
		id=?,
		level=?,
		sk=?,
		item_exc_type=?,
		harmony=?,
		refin=?,
		luck=?,
		skill=?,
		class1=?,
		class2=?,
		class3=?,
		class4=?,
		class5=?,
		class6=?,
		class7=? where code=?",
		array(
		$_POST['onsell'],
		$_POST['pay_type_gc'],
		$_POST['pay_type_c'],
		$_POST['pay_type_zen'],
		$_POST['name'],
		$_POST['x'],
		$_POST['y'],
		$_POST['cat'],
		$_POST['id'],
		$_POST['level'],
		$_POST['sk'],
		$_POST['item_exc_type'],
		$_POST['harmony'],
		$_POST['refin'],
		$_POST['luck'],
		$_POST['skill'],
		$_POST['class1'],
		$_POST['class2'],
		$_POST['class3'],
		$_POST['class4'],
		$_POST['class5'],
		$_POST['class6'],
		$_POST['class7'],$id));
		if($update_item){
			echo notice_message_admin('Item successfully edited',1,0,'index.php?get=webshop_item_manager&m=edit&id='.$id.'');
		}
			
		}
	}else{
		$item = $core_db->Execute("Select 
		code,
		onsell,
		pay_type_gc,
		pay_type_c,
		pay_type_zen,
		name,
		x,
		y,
		cat,
		id,
		level,
		sk,
		item_exc_type,
		harmony,
		refin,
		luck,
		skill,
		class1,
		class2,
		class3,
		class4,
		class5,
		class6,
		class7 from wshopp where code=?",array($id));
		if($item->fields[10] == '0') {$selected_item_level_0='selected';} 
elseif($item->fields[10] == '1') {$selected_item_level_1='selected';}
elseif($item->fields[10] == '2') {$selected_item_level_2='selected';}
elseif($item->fields[10] == '3') {$selected_item_level_3='selected';}
elseif($item->fields[10] == '4') {$selected_item_level_4='selected';}
elseif($item->fields[10] == '5') {$selected_item_level_5='selected';}
elseif($item->fields[10] == '6') {$selected_item_level_6='selected';}
elseif($item->fields[10] == '7') {$selected_item_level_7='selected';}
elseif($item->fields[10] == '8') {$selected_item_level_8='selected';}
elseif($item->fields[10] == '9') {$selected_item_level_9='selected';}
elseif($item->fields[10] == '10') {$selected_item_level_10='selected';}
elseif($item->fields[10] == '11') {$selected_item_level_11='selected';}
elseif($item->fields[10] == '12') {$selected_item_level_12='selected';}
elseif($item->fields[10] == '13') {$selected_item_level_13='selected';}
elseif($item->fields[10] == '14') {$selected_item_level_14='selected';}
elseif($item->fields[10] == '15') {$selected_item_level_15='selected';};

if($item->fields[11] == '0') {$selected_item_sk_1='selected';} 
elseif($item->fields[11] == '1') {$selected_item_sk_2='selected';}
elseif($item->fields[11] == '2') {$selected_item_sk_3='selected';}
elseif($item->fields[11] == '3') {$selected_item_sk_4='selected';}
elseif($item->fields[11] == '4') {$selected_item_sk_5='selected';}
elseif($item->fields[11] == '5') {$selected_item_sk_6='selected';};
		echo '<div align="right" style="width: 90%; margin-bottom: 2px;"><a href="index.php?get=webshop_item_manager">[Return Search Item]</a></div>
	<form action="" method="POST" name="forum">
	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_panel">
	<tr>
	 <td align="center" class="panel_title" colspan="2">Edit Item ('.htmlspecialchars($item->fields[5]).') </td>
	</tr>

		<tr>
	<td align="left" class="panel_title_sub" colspan="2">Activar Venta</td>
	</tr>
	<tr>
	<td align="left" class="panel_text_alt1" width="50%">If checked item will be available for sell on webshop.</td>
	<td align="left" class="panel_text_alt2" width="50%"><input type="checkbox" name="onsell" value="1"'; if($item->fields[1] == '1'){echo 'checked="checked"';} echo'> Yes</td>
	</tr>
	
	<tr>
	<td align="left" class="panel_title_sub" colspan="2">Se vende por Creditos</td>
	</tr>
	<tr>
	<td align="left" class="panel_text_alt1" width="50%">If checked item will be available for sell on webshop.</td>
	<td align="left" class="panel_text_alt2" width="50%"><input type="checkbox" name="pay_type_gc" value="1"'; if($item->fields[2] == '1'){echo 'checked="checked"';} echo'> Yes</td>
	</tr>

	<tr>
	<td align="left" class="panel_title_sub" colspan="2">Se vende por Creditos 2</td>
	</tr>
	<tr>
	<td align="left" class="panel_text_alt1" width="50%">If checked item will be available for sell on webshop.</td>
	<td align="left" class="panel_text_alt2" width="50%"><input type="checkbox" name="pay_type_c" value="1"'; if($item->fields[3] == '1'){echo 'checked="checked"';} echo'> Yes</td>
	</tr>

	<tr>
	<td align="left" class="panel_title_sub" colspan="2">Se vende por zen</td>
	</tr>
	<tr>
	<td align="left" class="panel_text_alt1" width="50%">If checked item will be available for sell on webshop.</td>
	<td align="left" class="panel_text_alt2" width="50%"><input type="checkbox" name="pay_type_zen" value="1"'; if($item->fields[4] == '1'){echo 'checked="checked"';} echo'> Yes</td>
	</tr>
	
	
		<tr>
	<td align="right" class="box-footer" colspan="2">
	<input type="submit" class="btn btn-block btn-success btn-200" value="Edit Item" onclick="return ask_form(\'Are you sure?\')"></td>
	</tr>	
	<tr>
	<td align="left" class="panel_title_sub" colspan="2">Name</td>
	</tr>
	<tr>
	<td align="left" class="panel_text_alt1" width="50%">Item\'s name.</td>
	<td align="left" class="panel_text_alt2" width="50%"><input type="text" class="form-control" name="name" value="'.htmlspecialchars($item->fields[5]).'"></td>
	</tr>

	
	<tr>
	<td align="left" class="panel_title_sub" colspan="2">Size</td>
	</tr>
	<tr>
	<td align="left" class="panel_text_alt1" width="50%">Item\'s X and Y size.</td>
	<td align="left" class="panel_text_alt2" width="50%">X: <input type="text" class="form-control" name="x" value="'.$item->fields[6].'" size="3"> Y: <input type="text" class="form-control" name="y" value="'.$item->fields[7].'" size="3"></td>
	</tr>
	
	<tr>
	<td align="left" class="panel_title_sub" colspan="2">Type / Index</td>
	</tr>
	<tr>
	<td align="left" class="panel_text_alt1" width="50%">Item\'s type and index.</td>
	<td align="left" class="panel_text_alt2" width="50%">Type: 
	<select name="cat" class="form-control">
	<option>Choose Cateogry</option>
	<optgroup label="---------------">
	';
		foreach ($items_categories as $category_id => $category_value){
			if($category_id == $item->fields[8]){
				echo '<option value="'.$category_id.'" selected>'.$category_value.'</option>';
				
			}else{
				echo '<option value="'.$category_id.'">'.$category_value.'</option>';
			}
		}

		echo '
	</select> <br>
	Index: <input type="text" class="form-control" name="id" value="'.$item->fields[9].'" size="3"></td>
	</tr>
	


	
	<tr>
	<td align="left" class="panel_title_sub" colspan="2">Opciones</td>
	</tr>
	<tr>
	<td align="left" class="panel_text_alt1" width="50%" valign="top">Item\'s option and excelent option types.</td>
	<td align="left" class="panel_text_alt2" width="50%"> 
	Max Level: <select class="form-control" name="level" style="width:412px;">
			<option value="0" '.$selected_item_level_0.'>Level + 0</option>
			<option value="1" '.$selected_item_level_1.'>Level + 1</option>
			<option value="2" '.$selected_item_level_2.'>Level + 2</option>
			<option value="3" '.$selected_item_level_3.'>Level + 3</option>
			<option value="4" '.$selected_item_level_4.'>Level + 4</option>
			<option value="5" '.$selected_item_level_5.'>Level + 5</option>
			<option value="6" '.$selected_item_level_6.'>Level + 6</option>
			<option value="7" '.$selected_item_level_7.'>Level + 7</option>
			<option value="8" '.$selected_item_level_8.'>Level + 8</option>
			<option value="9" '.$selected_item_level_9.'>Level + 9</option>
			<option value="10" '.$selected_item_level_10.'>Level + 10</option>
			<option value="11" '.$selected_item_level_11.'>Level + 11</option>
			<option value="12" '.$selected_item_level_12.'>Level + 12</option>
			<option value="13" '.$selected_item_level_13.'>Level + 13</option>
			<option value="14" '.$selected_item_level_14.'>Level + 14</option>
			<option value="15" '.$selected_item_level_15.'>Level + 15</option>
		</select><br>
	
	Max Socket Type:
	<select class="form-control" name="sk" style="width:412px;">
			<option value="0" '.$selected_item_sk_1.'>None</option>
			<option value="1" '.$selected_item_sk_2.'>Has 1 socket</option>
			<option value="2" '.$selected_item_sk_3.'>Has 2 sockets</option>
			<option value="3" '.$selected_item_sk_4.'>Has 3 sockets</option>
			<option value="4" '.$selected_item_sk_5.'>Has 4 sockets</option>
			<option value="5" '.$selected_item_sk_6.'>Has 5 sockets</option>
		</select><br>
	
	Excelent Option Type:
	<select name="item_exc_type" class="form-control" style="width:412px;">
	<option>Choose Option</option>
	<optgroup label="---------------">
	';
		foreach ($items_excelent_options_type as $i_exc_opt_id => $i_exc_opt_var){
			if($i_exc_opt_id == $item->fields[12]){
				echo '<option value="'.$i_exc_opt_id.'" selected>'.$i_exc_opt_var.'</option>';
				
			}else{
				echo '<option value="'.$i_exc_opt_id.'">'.$i_exc_opt_var.'</option>';
			}
		}

		echo '
	</select>
	
	</td>
	</tr>	

	
	
	<tr>
	<td align="left" class="panel_title_sub" colspan="2">Game Options</td>
	</tr>
	<tr>
	<td align="left" class="panel_text_alt1" width="50%" valign="top">Item\'s in game options.</td>
	<td align="left" class="panel_text_alt2" width="50%">
	Add Harmony: <input type="checkbox" name="harmony" value="1"'; if($item->fields[13] == '1'){echo 'checked="checked"';} echo'> <br>
	Add Refined: <input type="checkbox" name="refin" value="1"'; if($item->fields[14] == '1'){echo 'checked="checked"';} echo'> <br>
	Luck: <input type="checkbox" name="luck" value="1"'; if($item->fields[15] == '1'){echo 'checked="checked"';} echo'> <br>
	Skill: <input type="checkbox" name="skill" value="1"'; if($item->fields[16] == '1'){echo 'checked="checked"';} echo'> <br>
	</td>
	</tr>
	
	

	
	<tr>
	<td align="left" class="panel_title_sub" colspan="2">Infos</td>
	</tr>
	<tr>
	<td align="left" class="panel_text_alt1" width="50%" valign="top">Item\'s infos.</td>
	<td align="left" class="panel_text_alt2" width="50%">
	<b>Can be equiped by:</b><br>
	<input type="checkbox" name="class1" value="1" '.(($item->fields[17] >= '1' or $item->fields[17] == '-1') ? 'checked="checked"' : "").'> Dark Wizard<br>
	<input type="checkbox" name="class2" value="1" '.(($item->fields[18] >= '1' or $item->fields[18] == '-1') ? 'checked="checked"' : "").'> Dark Knight<br>
	<input type="checkbox" name="class3" value="1" '.(($item->fields[19] >= '1' or $item->fields[19] == '-1') ? 'checked="checked"' : "").'> Elf<br>
	<input type="checkbox" name="class4" value="1" '.(($item->fields[20] >= '1' or $item->fields[20] == '-1') ? 'checked="checked"' : "").'> Magic Gladiator<br>
	<input type="checkbox" name="class5" value="1" '.(($item->fields[21] >= '1' or $item->fields[21] == '-1') ? 'checked="checked"' : "").'> Dark Lord<br>
	<input type="checkbox" name="class6" value="1" '.(($item->fields[22] >= '1' or $item->fields[22] == '-1') ? 'checked="checked"' : "").'> Summoner<br>
	<input type="checkbox" name="class7" value="1" '.(($item->fields[23] >= '1' or $item->fields[23] == '-1') ? 'checked="checked"' : "").'> Rage Figther<br>
	</td>
	</tr>
	
	</tr>
	<tr>
	<td align="center" class="panel_buttons" colspan="2">
	<input type="hidden" name="edit">
	<input type="hidden" name="i_serial" value="1">
	<input type="submit" class="btn btn-block btn-success btn-200" value="Edit Item" onclick="return ask_form(\'Are you sure?\')">&nbsp;<input type="reset" value="Reset"></td>
	</tr>
	
	</table>
	</form>
	
	';
		
		
	}
	
}elseif ($_GET['m'] == 'delete'){
	$id = safe_input($_GET['id'],'');
	$delete = $core_db->Execute("Delete from wshopp where code=?",array($id));
	if($delete){
		echo notice_message_admin('Item successfully deleted',1,0,'index.php?get=webshop_item_manager');
	}
	
}else{
echo '
<form action="index.php?get=webshop_item_manager" name="form_edit" method="POST">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_panel">
<tr>
 <td align="center" class="panel_title" colspan="2">Search Item</td>
</tr>
<tr>
<td align="left" class="panel_title_sub" colspan="2">Item Name</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="45%" valign="top">
Enter the name of item which you want to find.</td>
<td align="left" class="panel_text_alt2" width="45%" valign="top">
<input type="text" class="form-control" name="item_name"><br>
</td>
</tr>






<tr>
<td align="left" class="panel_buttons"><input type="hidden" name="search"><a href="index.php?get=webshop_item_manager&m=new">[Create New Item]</a></td>
<td align="right" class="panel_buttons"><input type="hidden" name="search"><input type="submit" class="btn btn-block btn-success btn-200" value="Search"></td>
</tr>
</table>
</form>
';

if(isset($_GET['item_cat'])){
	$item_category_gid = safe_input($_GET['item_cat'],'');
	$category_pressent = 1;
}
echo '<div style="margin-top: 20px;">';
			foreach ($items_categories as $item_category_id => $item_category_var){
				if($category_pressent == '1'){
					if($item_category_id == $item_category_gid){
						echo '['.$item_category_var.']&nbsp;&nbsp;';
					}else{
						echo '<a href="index.php?get=webshop_item_manager&item_cat='.$item_category_id.'">'.$item_category_var.'</a>&nbsp;&nbsp;';
					}
				}else{
					echo '<a href="index.php?get=webshop_item_manager&item_cat='.$item_category_id.'">'.$item_category_var.'</a>&nbsp;&nbsp;';
				}
			}
			echo '</div>';
			

if(isset($_POST['search']) && !empty($_POST['item_name'])){
	$item_name = str_replace("'","",$_POST['item_name']);
	$search_item = 1;
}
if($category_pressent == 1 || $search_item == 1){
	if($search_item == 1){
		$select_items = $core_db->Execute("Select name,bought_times,code from wshopp where name like ?",array('%'.$item_name.'%'));
	}elseif($category_pressent == 1){
		$select_items = $core_db->Execute("Select name,bought_times,code from wshopp where cat=? order by bought_times asc",array($item_category_gid));
	}
	echo '
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_panel" style="margin-top: 20px;">
<tr>
 <td align="center" class="panel_title" colspan="5">Search Results</td>
</tr>
<tr>
<td align="left" class="panel_title_sub2">Nombre</td>
<td align="left" class="panel_title_sub2">Veces Compradas</td>
<td align="left" class="panel_title_sub2" width="80">Controles</td>
</tr>';
	
	$count=0;
	while (!$select_items->EOF){
		$count++;
		$tr_color = ($count % 2) ? '' : 'even'; 
		echo '
		<tr class="'.$tr_color.'">
		<td align="left" class="panel_text_alt_list"><strong>'.htmlspecialchars($select_items->fields[0]).'</strong></td>
		<td align="left" class="panel_text_alt_list">'.number_format($select_items->fields[1]).'</td>
		<td align="left" class="panel_text_alt_list"><a href="index.php?get=webshop_item_manager&m=edit&id='.$select_items->fields[2].'">[Edit]</a> / <a href="#" onclick="ask_url(\'Are you sure you want to delete this Item?\',\'index.php?get=webshop_item_manager&m=delete&id='.$select_items->fields[2].'\')";>[Delete]</a></td>
		
		</tr>';
		
		
		$select_items->MoveNext();
	}
	echo '</table>';
}

	
}

?>