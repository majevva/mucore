<?
if($_GET['act']=='borrar') {
	$listabase=$_GET['id'];
				$sql1 = $core_db->Execute("SELECT Count(No) FROM ZCR_AdmItems WHERE No='{$listabase}'"); 
				$Check2 = $sql1->fields[0];
				if($Check2 < 1) {
				echo notice_message_admin('La Base no existe','0','1','0');
				}else{
				$msquery=$core_db->Execute("DELETE FROM ZCR_AdmItems WHERE No='{$listabase}'");
				if($msquery){
					$CAUSA="Se ha Eliminado la Base";
					echo notice_message_admin($CAUSA,1,0,'index.php?get=aoh_duplicar_inventario');
				}else{
					echo notice_message_admin('Imposible Eliminar Base, system error.','0','1','0');
				}
				}
}

if(isset($_POST['add'])){
	        $namepjnew=$_POST['namepjnew'];
			$listabase=$_POST['listabase'];
			

			$sql1 = $core_db->Execute("SELECT Count(Name) FROM Character WHERE Name='{$namepjnew}'"); 
			$Check2 = $sql1->fields[0];

			if(empty($listabase) || empty($namepjnew)) {
			echo notice_message_admin('Algunos espacios fueron dejados en blanco','0','1','0');
			}elseif($Check2 < 1) {
				echo notice_message_admin('El personaje no Existe','0','1','0');
			}else{
				//$sqll= mssql_query("declare @items varbinary(1728); 
					//set @items = (SELECT Items FROM ZCR_AdmItems WHERE No ='{$listabase}');
					//print @items;");
					//$sqll=mssql_get_last_message();


					$i = 0;
        			while ($i < 108) {
            		$g_items = $core_db->Execute("select substring(Items," . ($i * 16 + 1) . ",16) from ZCR_AdmItems where No=?", array(
                	$listabase
            		));
            		$i++;
            		$i_info = $g_items->fetchrow();
            		$cadena_items .= $i_info[0];
            		}

            		$sqll='0x'.$cadena_items;

				$msquery=$core_db->Execute("UPDATE Character SET Inventory={$sqll} WHERE name='{$namepjnew}'");


				if($msquery){
					$CAUSA="Se ha beneficiado a: <b>{$namepjnew}";
					echo notice_message_admin($CAUSA,1,0,'index.php?get=aoh_duplicar_inventario');
				}else{
					echo notice_message_admin('Imposible Clonar Inventario, system error.','0','1','0');
				}

				}
				
}elseif(isset($_POST['create'])){
		$namepj=$_POST['namepj'];
		$namebase=$_POST['namebase'];

				$sql0 = $core_db->Execute("SELECT Count(Name) FROM ZCR_AdmItems WHERE Name='{$namebase}'"); 
				$Check = $sql0->fields[0];

				$sql1 = $core_db->Execute("SELECT Count(Name) FROM Character WHERE Name='{$namepj}'"); 
				$Check2 = $sql1->fields[0];

				if(empty($namepj) || empty($namebase))
					{
				echo notice_message_admin('Algunos espacios fueron dejados en blanco','0','1','0');
				} elseif($Check > 0) {
				echo notice_message_admin('La base ya existe, por favor, eliminela para volver a crearla','0','1','0');
				}elseif($Check2 < 1) {
				echo notice_message_admin('El personaje no Existe','0','1','0');
				}else {
					//$sqll= mssql_query("declare @items varbinary(1728); 
					//set @items = (SELECT Inventory FROM Character WHERE name ='{$namepj}');
					//print @items;");
					//$sqll=mssql_get_last_message();


					$i = 0;
        			while ($i < 108) {
            		$g_items = $core_db->Execute("select substring(Inventory," . ($i * 16 + 1) . ",16) from Character where Name=?", array(
                	$namepj
            		));
            		$i++;
            		$i_info = $g_items->fetchrow();
            		$cadena_items .= $i_info[0];
            		}

            		$sqll='0x'.$cadena_items;

					$msquery=$core_db->Execute("INSERT INTO ZCR_AdmItems (Name,Items,Pj) VALUES ('{$namebase}',{$sqll},'{$namepj}')");	

				if($msquery){
				$CAUSA="Se ha creado la base: {$namebase} con inventario de: {$namepj}";
					echo notice_message_admin($CAUSA,1,0,'index.php?get=aoh_duplicar_inventario');
				}else{
					echo notice_message_admin('Imposible Crear Base, system error.','0','1','0');
				}
					//$this->Query("UPDATE ".MuAcc_DB.".dbo.MEMB_INFO SET bloc_code=1 WHERE memb___id='{$Account}'");
				}

}elseif($_GET['act']==''){
	$select_characters = $core_db->Execute("SELECT Name,Items,Pj,No FROM ZCR_AdmItems");
	echo '
	<div align="right" style="width: 90%; margin-bottom: 2px;"><a href="index.php?get=aoh_duplicar_inventario&act=crear">[Ir a Crear Base]</a></div>
	<form action="" method="POST" name="forum">
	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_panel">
	<tr>
	 <td align="center" class="panel_title" colspan="2">Duplicar Inventario</td>
	</tr>
	
	<tr>
	<td align="left" class="panel_title_sub" colspan="2">PJ Beneficiado</td>
	</tr>
	<tr>
	<td align="left" class="panel_text_alt1" width="50%"> </td>
	<td align="left" class="panel_text_alt2" width="50%"><input type="text" class="form-control" name="namepjnew" ></td>
	</tr>

	<tr>
	<td align="left" class="panel_title_sub" colspan="2">Base</td>
	</tr>
	<tr>
	<td align="left" class="panel_text_alt1" width="50%"></td>
	<td align="left" class="panel_text_alt2" width="50%">
	<select class="form-control" name="listabase" id="listabase">';
		foreach ($select_characters as $nombre_char){
						echo '<option value="'.$nombre_char[3].'">'.$nombre_char[0].'</option>';
					
				}
		echo '</select>
	</td>
	</tr>

		<tr>
	<td align="center" class="panel_buttons" colspan="2">
	<input type="hidden" name="add">
	<input type="submit" class="btn btn-block btn-success btn-200" value="Clonar Inventario"></td>
	</tr>
	</table>
	</form>';

	echo '
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_panel" style="margin-top: 20px;">
<tr>
 <td align="center" class="panel_title" colspan="5">Lista de Bases</td>
</tr>
<tr>
<td align="left" class="panel_title_sub2">Nombre</td>
<td align="left" class="panel_title_sub2">PJ Usado</td>
<td align="left" class="panel_title_sub2" width="50">Controls</td>
</tr>';
				$user = $core_db->Execute("SELECT Name,Items,Pj,No FROM ZCR_AdmItems order by No desc");
				$count = 0;
				while (!$user->EOF){
					$count++;
					$tr_color = ($count % 2) ? '' : 'even'; 
					echo '<tr class="'.$tr_color.'">
			<td align="left" class="panel_text_alt_list"><strong>'.htmlspecialchars($user->fields[0]).'</strong></td>
			<td align="left" class="panel_text_alt_list" >'.$user->fields[2].'</td>
			<td align="left" class="panel_text_alt_list"><a href="index.php?get=aoh_duplicar_inventario&act=borrar&id='.$user->fields[3].'">[Borrar]</a></td>
			</tr>';
					$user->MoveNext();
				}
				if($count == '0'){
				echo '<tr><td align="center" class="panel_text_alt_list" colspan="5">No Accounts Found</td></tr>';
			}
				
				
				echo '</table>';
}elseif($_GET['act']=='crear') {
	echo '
	<div align="right" style="width: 90%; margin-bottom: 2px;"><a href="index.php?get=aoh_duplicar_inventario">[Ir a Duplicar Inventario]</a></div>
	<form action="" method="POST" name="forum">
	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_panel">
	<tr>
	 <td align="center" class="panel_title" colspan="2">Crear Base</td>
	</tr>
	
	<tr>
	<td align="left" class="panel_title_sub" colspan="2">PJ a Extraer</td>
	</tr>
	<tr>
	<td align="left" class="panel_text_alt1" width="50%"> </td>
	<td align="left" class="panel_text_alt2" width="50%"><input type="text" class="form-control" name="namepj" ></td>
	</tr>
	<tr>
	<td align="left" class="panel_title_sub" colspan="2">Nombre de la Base</td>
	</tr>
	<tr>
	<td align="left" class="panel_text_alt1" width="50%"></td>
	<td align="left" class="panel_text_alt2" width="50%"><input type="text" class="form-control" name="namebase"></td>
	</tr>
	<tr>
	<td align="left" class="panel_title_sub" colspan="2">Slot</td>
	</tr>

		<tr>
	<td align="center" class="panel_buttons" colspan="2">
	<input type="hidden" name="create">
	<input type="submit" class="btn btn-block btn-success btn-200" value="Crear Base"></td>
	</tr>
	</table>
	</form>';
}
?>