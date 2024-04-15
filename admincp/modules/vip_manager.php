<?
include ('../engine/custom_variables.php');
if(isset($_GET['vip'])){
	if($_GET['vip'] == '0'){
		if(isset($_GET['quitarvip'])){
			$vipID = safe_input($_GET['quitarvip'],'');
			$check_vip = $core_db2->Execute("Select ".AOH_VIP_user.",".AOH_VIP_column." from ".AOH_VIP_Table." where ".AOH_VIP_column." > 0 and ".AOH_VIP_user."=?",array($vipID));
			if($check_vip->EOF){
				echo notice_message_admin('Esta Cuenta No Esta En La Lista De Usuarios VIP.','0','1','0');
			}else{
				$quitarvip= $core_db2->Execute("Update ".AOH_VIP_Table." SET ".AOH_VIP_inicio." = '-2',".AOH_VIP_fin." = '-2',".AOH_VIP_column." = '0',".AOH_VIP_Date." ='0',".AOH_VIP_Infinito." ='0' WHERE ".AOH_VIP_user." ='$vipID'");
							if($quitarvip){
								echo notice_message_admin('Vip RemoVido Exitosamente De La Cuenta <strong>'.$vipID.'</strong>',1,0,'index.php?get=vip_manager');	
							}
					}
			}else{
		  if(isset($_POST['actualiza'])){
			if(empty($_POST['login']) || $_POST['tiempo'] == 'x'){
				echo notice_message_admin('ERROR! As Dejado Espacios En Blanco, Corrijelo!!.','0','1','0');
			}else{
				$login = addslashes($_POST['login']);
				$viptime = addslashes($_POST['tiempo']);
				$viptipo = addslashes($_POST['tipo']);
				$username_check = $core_db2->Execute("SELECT memb___id FROM MEMB_INFO WHERE memb___id=?",array($login));
				if ($username_check->EOF){ 
					echo notice_message_admin('La Cuenta '.$login.' No existe en nuestra Base, porfavor Verifica Bien los Datos de Usuario','0','1','0');
				}else{
					$ver_si_es_vip = $core_db2->Execute("SELECT ".AOH_VIP_column." FROM ".AOH_VIP_Table." WHERE ".AOH_VIP_user."=? and ".AOH_VIP_column." > 0",array($login));
					if(!$ver_si_es_vip->EOF){
						echo notice_message_admin('Esta Cuenta Ya es VIP, Si Deseas Actualiza Su Informacion VIP.','0','1','0');
					}else{
					if($viptime == 'INF'){
					$fechafin = '1';
					$viptime = '2000000000';
					$vipinf = '1';
					}
					else 
					{
					$fechafin = time()+(86400*$viptime);
					$vipinf = '0';
					}
						$ConvertirVIP = $core_db2->Execute("Update ".AOH_VIP_Table." SET ".AOH_VIP_inicio." =?,".AOH_VIP_fin." =?,".AOH_VIP_column." =?,".AOH_VIP_Date." =?,".AOH_VIP_Infinito." =? WHERE ".AOH_VIP_user." =?",array(time(),$fechafin,$viptipo,$viptime,$vipinf,$login));
					// COMPROBANDO MIERDAS =)
					if($viptipo == 0){ $viptipo = 'Ninguno' ;}
					elseif($viptipo == 1){ $viptipo = 'Vip Level 1' ;}
					elseif($viptipo == 2){ $viptipo = 'Vip Level 2' ;}
					elseif($viptipo == 3){ $viptipo = 'Vip Level 3' ;}
					// SEGUIMOS COMPROBANDO
					if($viptime >= 365000 ){  $viptime = 'Vip Ilimitado' ;}
					elseif($viptime >= 0 ){ $viptime = ''.$viptime.' Dias' ;}
						if($ConvertirVIP){
								echo notice_message_admin('La Cuenta '.$login.' Fue Echa VIP Tipo '.$viptipo.' Por '.$viptime.' !!',1,0,'index.php?get=vip_manager');
							}else{
								echo notice_message_admin('No Se Pudo Convertir En Vip Esta Cuenta, ERROR DE SISTEMA!.','0','1','0');
							}
					}
				}
			}
		}else{
				echo '<form action="" method="POST" name="actuaform">
	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_panel">
	<tr>
	 <td align="center" class="panel_title" colspan="2">Hacer VIP Esta Cuenta</td>
	</tr>
	
	<tr>
	<td align="left" class="panel_title_sub" colspan="2">ID De Usuario</td>
	</tr>
	<tr>
	<td align="left" class="panel_text_alt1" width="50%">Ingresa El ID Del Que Convertiras en VIP.</td>
	<td align="left" class="panel_text_alt2" width="50%"><input type="text" class="form-control" name="login" id="login" maxlength="10" ></td>
	</tr>
	<tr>
	<td align="left" class="panel_title_sub" colspan="2">Tiempo En Dias</td>
	</tr>
	<tr>
	<td align="left" class="panel_text_alt1" width="50%">Selecciona Periodo VIP.</td>
	<td align="left" class="panel_text_alt2" width="50%"><select name="tiempo" id="tiempo">
	<option value="x" selected="selected">Selecciona Los Dias</option>
	<optgroup label="---------------------------">
	<option value="INF">Vip Infinito</option>
	<optgroup label="---------------------------">
	<option value="7">1 Semana</option>
	<option value="15">Medio Mes</option>
	<option value="30">1 Mes</option>
	<option value="90">3 Meses</option>
	<option value="180">6 Meses</option>
	<option value="270">9 Meses</option>
	<optgroup label="---------------------------">
	<option value="1">1 Dia</option>
		';
			$i=1;
			while ($i <= 364){
				$i++;
				echo '<option value="'.$i.'">'.$i.' Dias</option>';
			}
			echo '
	</select></td>
	</tr>
	<tr>
	<td align="left" class="panel_title_sub" colspan="2">Tipo De Membresia VIP</td>
	</tr>
	<tr>
	<td align="left" class="panel_text_alt1" width="50%">Seleciona El Tipo De VIP</td>
	<td align="left" class="panel_text_alt2" width="50%"><select name="tipo" id="tipo">
	  <option value="x" selected="selected">Seleciona El Tipo VIP</option>
	  <optgroup label="---------------------------">
	  <option value="1">Vip Level 1</option>
	  <option value="2">Vip Level 2</option>
	  <option value="3">Vip Level 3</option>
	  </select></td>
	</tr>
		<tr>
	<td align="center" class="panel_buttons" colspan="2">
	<input type="hidden" name="actualiza">
	<input type="submit" class="btn btn-block btn-success btn-200" value="Convertir VIP" onclick="return ask_url(\'Estas Convirtiendo En VIP A Este Usuario. Estas Seguro ???\')"></td>
	</tr>
	</table>
	</form>';
		}	
		}
	}elseif ($_GET['vip'] == '1'){
		if(isset($_GET['quitarvip'])){
			$vipID = safe_input($_GET['quitarvip'],'');
			$check_vip = $core_db2->Execute("Select ".AOH_VIP_user.",".AOH_VIP_column." from ".AOH_VIP_Table." where ".AOH_VIP_column." > 0 and ".AOH_VIP_user."=?",array($vipID));
			if($check_vip->EOF){
				echo notice_message_admin('Esta Cuenta No Esta En La Lista De Usuarios VIP.','0','1','0');
			}else{
				$quitarvip= $core_db2->Execute("Update ".AOH_VIP_Table." SET ".AOH_VIP_inicio." = '-2',".AOH_VIP_fin." = '-2',".AOH_VIP_column." = '0',".AOH_VIP_Date." ='0',".AOH_VIP_Infinito." ='0' WHERE ".AOH_VIP_user." ='$vipID'");
							if($quitarvip){
								echo notice_message_admin('Vip RemoVido Exitosamente De La Cuenta <strong>'.$vipID.'</strong>',1,0,'index.php?get=vip_manager');	
							}
					}
			}else{
			if(isset($_POST['actualiza'])){
			if(empty($_POST['login']) || $_POST['tiempo'] == 'x'){
				echo notice_message_admin('ERROR! As Dejado Espacios En Blanco, Corrijelo!!.','0','1','0');
			}else{
				$login = addslashes($_POST['login']);
				$viptime = addslashes($_POST['tiempo']);
				$viptipo = addslashes($_POST['tipo']);
				$check_inf = $core_db2->Execute("SELECT ".AOH_VIP_Infinito." FROM ".AOH_VIP_Table." WHERE ".AOH_VIP_user."=?",array($login));
				if ($check_inf->fields[0] == 1){
					echo notice_message_admin('La Cuenta '.$login.' Figura Como VIP INF, No Es Posible Editarlo, Quitale El VIP y Vuelve a Asignarle Tiempo','0','1','0');
					}else{
				$username_check = $core_db2->Execute("SELECT memb___id FROM MEMB_INFO WHERE memb___id=?",array($login));
				if ($username_check->EOF){
					echo notice_message_admin('La Cuenta '.$login.' No existe en nuestra Base, porfavor Verifica Bien los Datos de Usuario','0','1','0');
				}else{
					$ver_si_es_vip = $core_db2->Execute("SELECT ".AOH_VIP_column." FROM ".AOH_VIP_Table." WHERE ".AOH_VIP_user."=? and ".AOH_VIP_column." > 0",array($login));
						if($ver_si_es_vip->EOF){
						echo notice_message_admin('Esta Cuenta NO es VIP, Aqui Solo Se Aumenta Tiempo VIP!!!!!.','0','1','0');
					}else{
					$concha_culo = $core_db2->Execute("SELECT ".AOH_VIP_fin.",".AOH_VIP_Date." FROM ".AOH_VIP_Table." WHERE ".AOH_VIP_user."=?",array($login));
					$primero = $concha_culo->fields[0];
					$segundo = $concha_culo->fields[1];
					if($viptime == 'INF'){
					$fechafin = '1';
					$viptime2 = '2000000000';
					$vipinf = '1';
					}
					else 
					{
					$fechafin = ($primero+(86400*$viptime));
					$viptime2 = ($segundo+$viptime);
					$vipinf = '0';
					}
						$ConvertirVIP = $core_db2->Execute("Update ".AOH_VIP_Table." SET ".AOH_VIP_fin." =?,".AOH_VIP_column." =?,".AOH_VIP_Date." =?,".AOH_VIP_Infinito." =? WHERE ".AOH_VIP_user." =?",array($fechafin,$viptipo,$viptime2,$vipinf,$login));
					// COMPROBANDO MIERDAS =)
					if($viptipo == 0){ $viptipo = 'Ninguno' ;}
					elseif($viptipo == 1){ $viptipo = 'Gold' ;}
					elseif($viptipo == 2){ $viptipo = 'Premium' ;}
					elseif($viptipo == 3){ $viptipo = 'Administrador' ;}
					// SEGUIMOS COMPROBANDO
					if($viptime >= 365000 ){  $viptime = 'Vip Ilimitado' ;}
					elseif($viptime >= 0 ){ $viptime = ''.$viptime.' Dias' ;}
						if($ConvertirVIP){
								echo notice_message_admin('La Cuenta '.$login.' Fue Echa VIP Tipo '.$viptipo.' Por '.$viptime.' !!',1,0,'index.php?get=vip_manager');
							}else{
								echo notice_message_admin('No Se Pudo Convertir En Vip Esta Cuenta, ERROR DE SISTEMA!.','0','1','0');
							}
					}
				}
				}
			}
		}else{
				echo '<form action="" method="POST" name="actuaform">
	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_panel">
	<tr>
	 <td align="center" class="panel_title" colspan="2">Actualizar Info VIP En Esta Cuenta</td>
	</tr>
	
	<tr>
	<td align="left" class="panel_title_sub" colspan="2">ID De Usuario</td>
	</tr>
	<tr>
	<td align="left" class="panel_text_alt1" width="50%">Selecciona Aqui La Cuenta VIP a Editar !!.</td>
	<td align="left" class="panel_text_alt2" width="50%"><select name="login" id="login">
	<option value="y" selected="selected">Selecciona 1 Miembro VIP</option>
	<optgroup label="-----------------------------">';
		$personajes = $core_db->Execute("select ".AOH_VIP_user." from ".AOH_VIP_Table." where ".AOH_VIP_column." > 0");

		while (!$personajes->EOF){
			echo '<option value='.$personajes->fields[0].'>'.$personajes->fields[0].'</option>';
			$personajes->MoveNext();
		}


	echo '<optgroup label="-----------------------------">
	</select></td>
	</tr>
	<tr>
	<td align="left" class="panel_title_sub" colspan="2">Tiempo En Dias</td>
	</tr>
	<tr>
	<td align="left" class="panel_text_alt1" width="50%">Selecciona Periodo VIP.</td>
	<td align="left" class="panel_text_alt2" width="50%"><select name="tiempo" id="tiempo">
	<option value="x" selected="selected">Selecciona Los Dias</option>
	<optgroup label="---------------------------">
	<option value="INF">Vip Infinito</option>
	<optgroup label="---------------------------">
	<option value="7">1 Semana</option>
	<option value="15">Medio Mes</option>
	<option value="30">1 Mes</option>
	<option value="90">3 Meses</option>
	<option value="180">6 Meses</option>
	<option value="270">9 Meses</option>
	<optgroup label="---------------------------">
	<option value="1">1 Dia</option>
		';
			$i=1;
			while ($i <= 364){
				$i++;
				echo '<option value="'.$i.'">'.$i.' Dias</option>';
			}
			echo '
	</select></td>
	</tr>
	<tr>
	<td align="left" class="panel_title_sub" colspan="2">Tipo De Membresia VIP</td>
	</tr>
	<tr>
	<td align="left" class="panel_text_alt1" width="50%">Seleciona El Tipo De VIP</td>
	<td align="left" class="panel_text_alt2" width="50%"><select name="tipo" id="tipo">
	  <option value="x" selected="selected">Seleciona El Tipo VIP</option>
	  <optgroup label="---------------------------">
	  <option value="1">Vip Level 1</option>
	  <option value="2">Vip Level 2</option>
	  <option value="3">Vip Level 3</option>
	  </select></td>
	</tr>
		<tr>
	<td align="center" class="panel_buttons" colspan="2">
	<input type="hidden" name="actualiza">
	<input type="submit" class="btn btn-block btn-success btn-200" value="Actualizar VIP" onclick="return ask_url(\'Estas Convirtiendo En VIP A Este Usuario. Estas Seguro ???\')"></td>
	</tr>
	</table>
	</form>';
		}
		}
		}
}else{
		if(isset($_GET['quitarvip'])){
			$vipID = safe_input($_GET['quitarvip'],'');
			$check_vip = $core_db2->Execute("Select ".AOH_VIP_user.",".AOH_VIP_column." from ".AOH_VIP_Table." where ".AOH_VIP_column." > 0 and ".AOH_VIP_user."=?",array($vipID));
			if($check_vip->EOF){
				echo notice_message_admin('Esta Cuenta No Esta En La Lista De Usuarios VIP.','0','1','0');
			}else{
				$quitarvip= $core_db2->Execute("Update ".AOH_VIP_Table." SET ".AOH_VIP_inicio." = '-2',".AOH_VIP_fin." = '-2',".AOH_VIP_column." = '0',".AOH_VIP_Date." ='0',".AOH_VIP_Infinito." ='0' WHERE ".AOH_VIP_user." ='$vipID'");
							if($quitarvip){
								echo notice_message_admin('Vip RemoVido Exitosamente De La Cuenta <strong>'.$vipID.'</strong>',1,0,'index.php?get=vip_manager');	
							}
					}
			}else{
// AQUI INICIA EL CUADRO INICIAL - AQUI SE ESCOGE QUE ACCION TOMAR!!
		echo '
	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_panel">
<tr>
 <td align="center" class="panel_title" colspan="2">Centro De Control De Usuario VIP</td>
</tr>
<tr>
<td align="left" class="panel_title_sub" colspan="2">Porfavor Selecciona Una Opcion.</td>
</tr>
<tr>
<td align="left" class="panel_text_alt1" width="30%" valign="top"><a href="index.php?get=vip_manager&vip=0">[Activar VIP]</a></td>
<td align="left" class="panel_text_alt1" width="70%" valign="top">Convertir Cuenta En VIP. (Usuarios Normales a VIP)</td>
</tr>
<tr class="even">
<td align="left" class="panel_text_alt1" width="30%" valign="top"><a href="index.php?get=vip_manager&vip=1">[Actualizar VIP]</a></td>
<td align="left" class="panel_text_alt1" width="70%" valign="top">Actualizar Cuenta VIP. (Agregar Tiempo VIP)</td>
</tr>
		<tr>
	<td align="center" class="panel_text_alt1" colspan="2">&nbsp;</td>
	</tr>
</table>';
$cantidadvip = $core_db2->Execute("select count(".AOH_VIP_user.") from ".AOH_VIP_Table." where ".AOH_VIP_column." > 0");
echo '<table width="50" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
	<table width="60%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_panel">
	<tr>
	 <td align="center" class="panel_title" colspan="2">Estadisticas De Usuarios VIP</td>
	</tr>
	
	<tr>
	<td align="left" class="panel_title_sub" colspan="2">Usuarios VIP</td>
	</tr>
	<tr>
	<td align="left" class="panel_text_alt1" width="50%">Cantidad De Usuarios VIP En Su Servidor</td>
	<td width="50%" align="center" valign="middle" class="panel_text_alt2"><strong>'.$cantidadvip->fields[0].'</strong> Usuarios VIP!!</td>
	</tr>
		<tr>
	<td align="center" class="panel_buttons" colspan="2">&nbsp;</td>
	</tr>
	</table>
<table width="50" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_panel" >
<tr>
 <td align="center" class="panel_title" colspan="7">Cuentas VIP</td>
</tr>
<tr>
<td align="left" class="panel_title_sub2" width="20">#</td>
<td align="left" class="panel_title_sub2" width="100">ID De Usuario</td>
<td align="left" class="panel_title_sub2" width="170">Inicio VIP</td>
<td align="left" class="panel_title_sub2" width="170">Fin VIP</td>
<td align="left" class="panel_title_sub2" width="140">Tiempo Adquirido</td>
<td align="left" class="panel_title_sub2" width="130">Tipo VIP</td>
<td align="left" class="panel_title_sub2" width="70">Control</td>
</tr>';
$user = $core_db2->Execute("Select ".AOH_VIP_user." , ".AOH_VIP_inicio." , ".AOH_VIP_fin." , ".AOH_VIP_column." , ".AOH_VIP_Date." , ".AOH_VIP_Infinito." from ".AOH_VIP_Table." Where ".AOH_VIP_column." > 0 order by ".AOH_VIP_fin." asc ,".AOH_VIP_column." asc");
				$count = 0;
				while (!$user->EOF){
						if($user->fields[5] == 0){
						$restart = $user->fields[2]-time();
						if($restart <= 0){
							// AHORA NOS VAMOS CON MARCELO
								$marcelo = $core_db2->Execute("Update ".AOH_VIP_Table." SET ".AOH_VIP_inicio." = '-2',".AOH_VIP_fin." = '-2',".AOH_VIP_column." = '0',".AOH_VIP_Date." ='0',".AOH_VIP_Infinito." ='0' WHERE ".AOH_VIP_user." =?",array($user->fields[0]));
								// HAGACHATE Y CONOCELO!!! XD!!!!!!!!!!!
						}
					}
					$count++;
					$tr_color = ($count % 2) ? '' : 'even';
					//Grados VIP
if($user->fields[3] == 0){ $user->fields[3] = '<em>Ninguno</em>' ;}
elseif($user->fields[3] == 1){ $user->fields[3] = '<em>Vip level 1</em>' ;}
elseif($user->fields[3] == 2){ $user->fields[3] = '<em>Vip level 2</em>' ;}
elseif($user->fields[3] == 3){ $user->fields[3] = '<em>Vip level 3</em>' ;}
					//VIP INF  - Interpretacion
if($user->fields[4] >= 365000 ){ $user->fields[4] = '<em>Vip Ilimitado</em>' ;}
elseif($user->fields[4] == 0 ){ $user->fields[4] = '<em>'.$user->fields[4].' Dias VIP</em>' ;}
elseif($user->fields[4] == 1 ){ $user->fields[4] = '<em>'.$user->fields[4].' Dia VIP</em>' ;}
elseif($user->fields[4] >= 2 ){ $user->fields[4] = '<em>'.$user->fields[4].' Dias VIP</em>' ;}
					// New Check Time Expired
if($user->fields[2] == 1){ $user->fields[2] = '<em>Vip Eterno</em>'; }
elseif($user->fields[2] == '-1'){ $user->fields[2] = '<em>Nunca Fue VIP</em>';}
elseif($user->fields[2] == '-2'){ $user->fields[2] = '<em>Vip Finalizado</em>';}
else{ $user->fields[2] = (date('d-m-Y',$user->fields[2]));}
                    // ME VOY A LA MIERDA!!!!!!!!!!!!!
					echo '<tr class="'.$tr_color.'">
			<td align="left" class="panel_text_alt_list" >'.$count.'</td>
			<td align="left" class="panel_text_alt_list"><strong>'.htmlspecialchars(stripslashes($user->fields[0])).'</strong></td>
			<td align="left" class="panel_text_alt_list" >'.date('d-m-Y',$user->fields[1]).'</td>
			<td align="left" class="panel_text_alt_list" ><strong>'.$user->fields[2].'</strong></td>
			<td align="left" class="panel_text_alt_list" >'.$user->fields[4].'</td>
			<td align="left" class="panel_text_alt_list" >'.$user->fields[3].'</td>
			<td align="left" class="panel_text_alt_list"><a href="#" onclick="ask_url(\'Seguro Que Desea Remover El Vip De Esta Cuenta ?? '.htmlspecialchars(stripslashes($user->fields[0])).'?\',\'index.php?get=vip_manager&quitarvip='.$user->fields[0].'\');">[Quitar VIP]</a></td>
			</tr>';
					$user->MoveNext();
				}
				if($count == '0'){
				echo '<tr><td align="center" class="panel_text_alt_list" colspan="6">No Hay Cuentas VIP - Preocupate y MUCHO!!!!!</td></tr>';
			}
				echo '</table>';
}
}
?>