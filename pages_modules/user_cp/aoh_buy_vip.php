<?
$config_coins = simplexml_load_file('engine/config_mods/mu_coins_settings.xml');
$lista_paquetes = file('engine/variables_mods/Paquetes_Vip.tDB');

	if(isset($_GET['cid'])){
		echo '<div style="margin-top: 10px;">';
		$id = safe_input($_GET['cid'],'');

		if(empty($id)){
			header('Location: '.$core_run_script.'');
			exit();
		}else{
			if(account_online($user_auth_id) === true){
					echo msg('0','Necesita desconectarse del juego para continuar');		
				}else{

foreach ($lista_paquetes as $iD_data1){
  $iD_data1 = explode(",",$iD_data1);
  	if($iD_data1[0]==$_GET['pq']){
  		$login = $user_auth_id;
		$viptime = $iD_data1[1];
		$viptipo = $iD_data1[4];
		$fechafin = time()+(86400*$viptime);
		$vipinf = '0';
	$ver_si_es_vip = $core_db2->Execute("SELECT ".AOH_VIP_column." FROM ".AOH_VIP_Table." WHERE ".AOH_VIP_user."=? and ".AOH_VIP_column." > 0",array($login));
		if(!$ver_si_es_vip->EOF){
		echo msg('0','Ya eres vip, no puedes volver a comprar hasta que termine tu periodo.');
	}else{

	if ($iD_data1[3]==1) {
			if($config_coins->credits_database==1) {
				$ver_creditos = $core_db->Execute("Select ".$config_coins->credits_column." from ".$config_coins->credits_table." where ".$config_coins->user_column."=?",array($login));     	
			}else{
				$ver_creditos = $core_db2->Execute("Select ".$config_coins->credits_column." from ".$config_coins->credits_table." where ".$config_coins->user_column."=?",array($login));       	
			}
       	if($ver_creditos->fields[0] < $iD_data1[2]) {
       		echo msg('0', 'No tiene suficiente '.$config_coins->money_name1.'');
       	}else{
       		if($config_coins->credits_database==1) {
       			$clear = $core_db->Execute("Update ".$config_coins->credits_table." set ".$config_coins->credits_column."=".$config_coins->credits_column." - ".$iD_data1[2]." where ".$config_coins->user_column."=?",array($login));
       		}else{
       			$clear = $core_db2->Execute("Update ".$config_coins->credits_table." set ".$config_coins->credits_column."=".$config_coins->credits_column." - ".$iD_data1[2]." where ".$config_coins->user_column."=?",array($login));
       		}
       		
       	}
       
       }elseif ($iD_data1[3]==2) {
       		if($config_coins->credits2_database==1) {
       			$ver_creditos = $core_db->Execute("Select ".$config_coins->credits2_column." from ".$config_coins->credits2_table." where ".$config_coins->user2_column."=?",array($login));
       		}else{
       			$ver_creditos = $core_db2->Execute("Select ".$config_coins->credits2_column." from ".$config_coins->credits2_table." where ".$config_coins->user2_column."=?",array($login));
       		}
       	if($ver_creditos->fields[0] < $iD_data1[2]) {
       		echo msg('0', 'No tiene suficiente '.$config_coins->money_name2.'');
       	}else{
       		if($config_coins->credits2_database==1) {
       			$clear = $core_db->Execute("Update ".$config_coins->credits2_table." set ".$config_coins->credits2_column."=".$config_coins->credits2_column." - ".$iD_data1[2]." where ".$config_coins->user2_column."=?",array($login));
       		}else{
       			$clear = $core_db2->Execute("Update ".$config_coins->credits2_table." set ".$config_coins->credits2_column."=".$config_coins->credits2_column." - ".$iD_data1[2]." where ".$config_coins->user2_column."=?",array($login));
       		}
         
         }

       }

        if($clear){
		$ConvertirVIP = $core_db2->Execute("Update ".AOH_VIP_Table." SET ".AOH_VIP_inicio." =?,".AOH_VIP_fin." =?,".AOH_VIP_column." =?,".AOH_VIP_Date." =?,".AOH_VIP_Infinito." =? WHERE ".AOH_VIP_user." =?",array(time(),$fechafin,$viptipo,$viptime,$vipinf,$login));
		echo msg('1','Vip Comprado correctamente');
		}else{
		echo msg('0','No se Pudo comprar VIP');
		}

	}
  	}
 }


				}
			}

		echo '</div>';
	}




foreach ($lista_paquetes as $iD_data0){
  $iD_data0 = explode(",",$iD_data0);
    switch ($iD_data0[3]) {
       case 1:
         $nombre_c = $config_coins->money_name1;
         break;
       
       case 2:
         $nombre_c = $config_coins->money_name2;
         break;
     } 

		echo '
<div class="box-cartel" style="width:25%;padding:6px;display: inline-block;">
<div style="background: #000; border: solid 2px red; border-radius: 2px; min-height: 80px;">
<table width="100%">
<tr>
	<td align="center" style="font-size: 14px;color: #f3bb00;font-weight: 600;">
	'.$iD_data0[1].' Dias <br> Vip Level: '.$iD_data0[4].'
	</td>
</tr>
<tr>
	<td align="center">
	<img src="AOH_Addons/images/vip/money.png" width="120" height="120">
	</td>
</tr>
<tr>
	<td align="center" style="font-size: 14px;color: #f3bb00;font-weight: 600;">
	'.$iD_data0[2].' de '.$nombre_c.'
	</td>
</tr>
<tr>
	<td align="center">
	<input type="button" class="btn btn-primary btn-sm" value="Comprar" onclick="ask_url(\'Esta seguro que desea comprar el vip?\',\''.$core_run_script.'&cid='.$user_auth_id.'&pq='.$iD_data0[0].'\');">
	</td>
</tr>
</table>
</div>
</div>

  ';

}

	
	

?>