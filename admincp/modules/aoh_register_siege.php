<?
if(isset($_POST['add'])){
	            $name = $_POST['guildname'];
				$signs = $_POST['signs'];

		$sql_name_check = $core_db->Execute("SELECT Count(REG_SIEGE_GUILD) FROM MuCastle_REG_SIEGE WHERE REG_SIEGE_GUILD='$name'"); 
		$name_check = $sql_name_check->fields[0];

		$sql_name_check2 = $core_db->Execute("SELECT Count(G_Name) FROM Guild WHERE G_Name='$name'"); 
		$name_check2 = $sql_name_check2->fields[0];

		if(empty($name) || empty($signs))
					{
						echo notice_message_admin('Algunos espacios fueron dejados en blanco','0','1','0');
					}
					elseif ($name_check > 0){
					$CAUSA='El Guild '.$name.' ya esta inscrito';
					echo notice_message_admin($CAUSA,'0','1','0');
					}
					elseif ($name_check2 <= 0){
					$CAUSA='El Guild '.$name.', NO Existe.';
					echo notice_message_admin($CAUSA,'0','1','0');
					}else{

				$msquery = $core_db->Execute("INSERT INTO MuCastle_REG_SIEGE (MAP_SVR_GROUP, REG_SIEGE_GUILD, REG_MARKS, IS_GIVEUP, SEQ_NUM) values ('0', '$name', '$signs', '0', '1')");
				if($msquery){
					echo notice_message_admin('Clan agregado correctamente',1,0,'index.php?get=aoh_register_siege');
				}else{
					echo notice_message_admin('Imposible agregar clan, system error.','0','1','0');
				}

				}
				
}else{
	echo '<form action="" method="POST" name="forum">
	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_panel">
	<tr>
	 <td align="center" class="panel_title" colspan="2">Registrar Clan al CS</td>
	</tr>
	
	<tr>
	<td align="left" class="panel_title_sub" colspan="2">Guild Name</td>
	</tr>
	<tr>
	<td align="left" class="panel_text_alt1" width="50%"> </td>
	<td align="left" class="panel_text_alt2" width="50%"><input type="text" class="form-control" name="guildname" ></td>
	</tr>
	<tr>
	<td align="left" class="panel_title_sub" colspan="2">Sign Of Lords</td>
	</tr>
	<tr>
	<td align="left" class="panel_text_alt1" width="50%"></td>
	<td align="left" class="panel_text_alt2" width="50%"><input type="text" class="form-control" name="signs"></td>
	</tr>

		<tr>
	<td align="center" class="panel_buttons" colspan="2">
	<input type="hidden" name="add">
	<input type="submit" class="btn btn-block btn-success btn-200" value="Agregar Clan"></td>
	</tr>
	</table>
	</form>';
}
?>