<?
if(isset($_POST['add'])){
	        $Character = $_POST["name"];
			$cuenta = $_POST["cuenta"];
			$GAMEID = $_POST["GAMEID"];
			
			$sql_name_check = $core_db->Execute("SELECT Count(Name) FROM Character WHERE Name='{$Character}'"); 
			$name_check = $sql_name_check->fields[0]; 

			$sql_name_check2 = $core_db->Execute("SELECT Count(Id) FROM AccountCharacter WHERE Id='{$cuenta}' and (GameID1='{$Character}' or GameID2='{$Character}' or GameID3='{$Character}' or GameID4='{$Character}' or GameID5='{$Character}')"); 
			$name_check2 = $sql_name_check2->fields[0];

			$sql_name_check3 = $core_db->Execute("SELECT Count(memb___id) FROM MEMB_INFO WHERE memb___id='{$cuenta}'"); 
			$name_check3 = $sql_name_check3->fields[0];

			$sql_name_check4 = $core_db->Execute("SELECT Count(Id) FROM AccountCharacter WHERE Id='{$cuenta}' and $GAMEID <> Null"); 
			$name_check4 = $sql_name_check4->fields[0];

			if(empty($Character) || empty($cuenta)) {
			echo notice_message_admin('Algunos espacios fueron dejados en blanco','0','1','0');
			}elseif ($name_check <= 0){
			echo notice_message_admin('El personaje no existe','0','1','0');
			}
			elseif ($name_check2 > 0){
			$CAUSA=''.$Character.' ya pertenece a '.$cuenta.'';
			echo notice_message_admin($CAUSA,'0','1','0');
			}
			elseif ($name_check3 <= 0){
			$CAUSA='No existe la cuenta';
			echo notice_message_admin($CAUSA,'0','1','0');
			}
			elseif ($name_check4 > 0){
			$CAUSA='El slot '.$GAMEID.' elegido esta siendo usado, por favor use otro slot';
			echo notice_message_admin($CAUSA,'0','1','0');
			}else{

				$msquery0 = $core_db->Execute("UPDATE Character SET AccountID = '{$cuenta}' Where Name = '{$Character}'");
				$msquery = $core_db->Execute("UPDATE AccountCharacter SET GameID1 = NULL Where GameID1 = '{$Character}'");
				$msquery = $core_db->Execute("UPDATE AccountCharacter SET GameID2 = NULL Where GameID2 = '{$Character}'");
				$msquery = $core_db->Execute("UPDATE AccountCharacter SET GameID3 = NULL Where GameID3 = '{$Character}'");
				$msquery = $core_db->Execute("UPDATE AccountCharacter SET GameID4 = NULL Where GameID4 = '{$Character}'");
				$msquery = $core_db->Execute("UPDATE AccountCharacter SET GameID5 = NULL Where GameID5 = '{$Character}'");
				$msquery = $core_db->Execute("UPDATE AccountCharacter SET $GAMEID = '{$Character}' Where Id = '{$cuenta}'");
				if($msquery0 and $msquery){
					$CAUSA=''.$cuenta.' ahora es titular de: '.$Character.'';
					echo notice_message_admin($CAUSA,1,0,'index.php?get=aoh_mover_pj');
				}else{
					echo notice_message_admin('Imposible Mover PJ, system error.','0','1','0');
				}

				}
				
}else{
	echo '<form action="" method="POST" name="forum">
	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_panel">
	<tr>
	 <td align="center" class="panel_title" colspan="2">Mover PJ a otra cuenta</td>
	</tr>
	
	<tr>
	<td align="left" class="panel_title_sub" colspan="2">PJ a Mover</td>
	</tr>
	<tr>
	<td align="left" class="panel_text_alt1" width="50%"> </td>
	<td align="left" class="panel_text_alt2" width="50%"><input type="text" class="form-control" name="name" ></td>
	</tr>
	<tr>
	<td align="left" class="panel_title_sub" colspan="2">Nueva Cuenta</td>
	</tr>
	<tr>
	<td align="left" class="panel_text_alt1" width="50%"></td>
	<td align="left" class="panel_text_alt2" width="50%"><input type="text" class="form-control" name="cuenta"></td>
	</tr>
	<tr>
	<td align="left" class="panel_title_sub" colspan="2">Slot</td>
	</tr>
	<tr>
	<td align="left" class="panel_text_alt1" width="50%"></td>
	<td align="left" class="panel_text_alt2" width="50%">
  <input type="radio" value="GameID1" checked name="GAMEID">SLOT 1 <br>
  <input type="radio" value="GameID2" name="GAMEID">SLOT 2 <br>
  <input type="radio" value="GameID3" name="GAMEID">SLOT 3 <br>
  <input type="radio" value="GameID4" name="GAMEID">SLOT 4 <br>
  <input type="radio" value="GameID5" name="GAMEID">SLOT 5 
	</td>
	</tr>

		<tr>
	<td align="center" class="panel_buttons" colspan="2">
	<input type="hidden" name="add">
	<input type="submit" class="btn btn-block btn-success btn-200" value="Mover PJ"></td>
	</tr>
	</table>
	</form>';
}
?>