<?php
	echo '
		
<form action="" name="form_c" method="POST">
		<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_panel" style="margin-bottom: 20px;">
<tr>
 <td align="center" class="panel_title" colspan="2">Export Items</td>
</tr>
<tr>
<td align="left" class="panel_title_sub" colspan="2">Export Items as SQL query file</td>
</tr>

<tr>
<td align="left" class="panel_buttons">All your webshop items will be exported into an text file.</td>
<td align="right" class="panel_buttons">
<input type="hidden" name="export_items">
<input type="submit" class="btn btn-block btn-success btn-200" value="Export Items"></td>
</tr>


</table>
</form>';

	if(isset($_POST['export_items'])){
		$ex = $core_db->Execute("Select name,cat,id,x,y,level,luck,skill,ad,anc,sk,refin,exc,cost,ptt,class1,class2,class3,class4,class5,class6,class7,dur,lvlreq,dmgdef,onsell,cost_zen,pay_type_gc,pay_type_c,pay_type_zen,harmony,bought_times,item_exc_type from wshopp");
		while(!$ex->EOF){
			$ex_data .= "INSERT INTO wshopp(name,cat,id,x,y,level,luck,skill,ad,anc,sk,refin,exc,cost,ptt,class1,class2,class3,class4,class5,class6,class7,dur,lvlreq,dmgdef,onsell,cost_zen,pay_type_gc,pay_type_c,pay_type_zen,harmony,bought_times,item_exc_type)VALUES('".str_replace("'","",$ex->fields[0])."','".$ex->fields[1]."','".$ex->fields[2]."','".$ex->fields[3]."','".$ex->fields[4]."','".$ex->fields[5]."','".$ex->fields[6]."','".$ex->fields[7]."','".$ex->fields[8]."','".$ex->fields[9]."','".$ex->fields[10]."','".$ex->fields[11]."','".$ex->fields[12]."','".$ex->fields[13]."','".$ex->fields[14]."','".$ex->fields[15]."','".$ex->fields[16]."','".$ex->fields[17]."','".$ex->fields[18]."','".$ex->fields[19]."','".$ex->fields[20]."','".$ex->fields[21]."','".$ex->fields[22]."','".$ex->fields[23]."','".$ex->fields[24]."','".$ex->fields[25]."','".$ex->fields[26]."','".$ex->fields[27]."','".$ex->fields[28]."','".$ex->fields[29]."','".$ex->fields[30]."','".$ex->fields[31]."','".$ex->fields[32]."')\r\n";
			
			$ex->MoveNext();
		}

		ob_end_clean();
		header("Content-type: txt/plain");
		header("Content-Disposition:attachment;filename=MUCore_Shop_Items.sql");
		echo $ex_data;
		break;
		
		
		
	}
?>