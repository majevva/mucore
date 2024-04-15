<?
$config00 = simplexml_load_file('engine/config_mods/mu_coins_settings.xml');
$config = simplexml_load_file('engine/config_mods/aoh_event_sign.xml');

$active = trim($config->active);
if($CoD3e4rN0lCl_xF2S3A52CvZ !='x"CwFhks26N|*zgf93NS'){
	echo msg('0','Necesitas MuCore Premium para utilizar este Modulo');
}elseif($active == '0'){
	echo msg('0',text_sorry_feature_disabled);
}else{

	if(isset($_GET['cid'])){
		echo '<div style="margin-top: 10px;">';
		$id = safe_input($_GET['cid'],'');
		if(empty($id) || !is_numeric($id)){
			header('Location: '.$core_run_script.'');
			exit();
		}else{
			if(character_and_account($id,$user_auth_id) === false){
				header('Location: '.$core_run_script.'');
				exit();
			}else {
				if(account_online($user_auth_id) === true){
					echo msg('0',text_clearinventory_t1);		
				}else{


					//Seleccionamos Inventario
					//Fix MSSQL
					 //$link=mssql_connect($core['db_host'],$core['db_user'],$core['db_password']);
					 //mssql_select_db($core['db_name'],$link);

  					//$var1 = mssql_query("declare @inv varbinary(3840); set @inv=(select [Inventory] from [Character] where [mu_id]='$id'); print @inv"); 
  					//$sel_inv = mssql_get_last_message();

  					$i = 0;
        			while ($i < 120) {
            		$g_items = $core_db->Execute("select substring(Inventory," . ($i * 16 + 1) . ",16) from Character where mu_id=?", array(
                	$id
            		));
            		$i++;
            		$i_info = $g_items->fetchrow();
            		//$cadena_items .= $i_info[0];

            		if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') { 
						$cadena_items .= $i_info[0];   //PARA PHP 5.6 EN ADELANTE
					} else { 
						$cadena_items .= strtoupper(bin2hex($i_info[0])); //SOLO FUNCIONA EN PHP 5.4 O MENOS
					}

            		}

            		$sel_inv=$cadena_items;

  					$clear_querry1 = str_replace("0x", "", $sel_inv);
					$array_inventory = str_split($clear_querry1, 32);

  					function CheckItem($Pedido, $Inv){
  						$return = 0;
  						//Hex del pedido
  						$EH_id=substr($Pedido,0,2);
						$EH_tipe=substr($Pedido,18,2);
						$EH_level=substr($Pedido,2,2);
						$EH_dur=substr($Pedido,4,2);
						//Hex del Inventario
						$EH2_id=substr($Inv,0,2);
						$EH2_tipe=substr($Inv,18,2);
						$EH2_level=substr($Inv,2,2);
						$EH2_dur=substr($Inv,4,2);

						if (($EH_id==$EH2_id) and ($EH_tipe==$EH2_tipe) and ($EH_level==$EH2_level) and ($EH_dur==$EH2_dur)){
							$return=1;
						}else{
							$return=0;
						}
						return $return;
  					}


					$Evento_Hex = "1518FF000004BB0000E000FFFFFFFFFF";
							
					
					//Reconstruir Inventario
					$total_paginas=count($array_inventory);
					//Quest 1
					if ($_GET['quest']==1){
						for ($i=0;$i<=$total_paginas;$i++) {
						
						if ($i < 75){
							$itemNew .= $array_inventory[$i];
						}elseif ($i == 75){
            				$itemNew .= "FFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFF";
            			}elseif ($i > 75){
            				$itemNew .= $array_inventory[$i];
            			}
                	
        				}
        				$nuevo_inventario="0x".$itemNew;
					}
					

        			//Quest 2
        			if ($_GET['quest']==2){
						for ($i=0;$i<=$total_paginas;$i++) {
						
						if ($i < 66){
							$itemNew .= $array_inventory[$i];
						}elseif (($i >= 66) and ($i <= 75)){
            				$itemNew .= "FFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFF";
            			}elseif ($i > 75){
            				$itemNew .= $array_inventory[$i];
            			}
                	
        				}
        				$nuevo_inventario="0x".$itemNew;
					}

					// Lista de Cuadros
					//$array_inventory[12]	--- Primer Cuadro del inv
					//$array_inventory[75]	--- Cuadro 64 del inv

					if ($_GET['quest']==1){

						if (CheckItem($Evento_Hex,$array_inventory[75])==1){
							$clear = $core_db->Execute("Update character set [inventory]=$nuevo_inventario where mu_id=?",array($id));

							if($config->credits_type1==1){
								$DarPremio = $core_db->Execute("Update ".$config00->credits_table." SET ".$config00->credits_column."=".$config00->credits_column." + ".$config->credits_mount1." where ".$config00->user_column."=?",array($user_auth_id));
							}elseif($config->credits_type1==2){
								$DarPremio = $core_db->Execute("Update ".$config00->credits2_table." SET ".$config00->credits2_column."=".$config00->credits2_column." + ".$config->credits_mount1." where ".$config00->user2_column."=?",array($user_auth_id));
							}

							if($clear){
								echo msg('1','Premio Canjeado correctamente');
							}else{
								echo msg('0','error de sistema');
							}
						}else{
							echo msg('0','Tu inventario no Cuadra');
						}

					}elseif ($_GET['quest']==2) {
						if ((CheckItem($Evento_Hex,$array_inventory[66])==1) and (CheckItem($Evento_Hex,$array_inventory[67])==1) and 
							(CheckItem($Evento_Hex,$array_inventory[68])==1) and (CheckItem($Evento_Hex,$array_inventory[69])==1) and 
							(CheckItem($Evento_Hex,$array_inventory[70])==1) and (CheckItem($Evento_Hex,$array_inventory[71])==1) and 
							(CheckItem($Evento_Hex,$array_inventory[72])==1) and (CheckItem($Evento_Hex,$array_inventory[73])==1) and 
							(CheckItem($Evento_Hex,$array_inventory[74])==1) and (CheckItem($Evento_Hex,$array_inventory[75])==1)){
							$clear = $core_db->Execute("Update character set [inventory]=$nuevo_inventario where mu_id=?",array($id));


							if($config->credits_type2==1){
								$DarPremio = $core_db->Execute("Update ".$config00->credits_table." SET ".$config00->credits_column."=".$config00->credits_column." + ".$config->credits_mount2." where ".$config00->user_column."=?",array($user_auth_id));
							}elseif($config->credits_type1==2){
								$DarPremio = $core_db->Execute("Update ".$config00->credits2_table." SET ".$config00->credits2_column."=".$config00->credits2_column." + ".$config->credits_mount2." where ".$config00->user2_column."=?",array($user_auth_id));
							}

							if($clear){
								echo msg('1','Premio Canjeado correctamente');
							}else{
								echo msg('0','error de sistema');
							}
						}else{
							echo msg('0','Tu inventario no Cuadra');
						}
					}else{
						echo msg('0','No elegiste la Quest Correcta');
					}
					
					



					
				}
			}
		}
		echo '</div>';
	}

	echo '
<div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">Canje de Sign Of Lord</h3>
  </div>
  <div class="panel-body panel-fix">
    <table class="table">
      <thead>
        <tr>
          <th>Quest 1</th>
          <th>Quest 2</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><img src="https://i.imgur.com/8iPUhic.jpg" class="img-thumbnail"></td>
          <td><img src="https://i.imgur.com/okIELFw.jpg" class="img-thumbnail"></td>
        </tr>

        <tr>
          <td>Premio: '.$config->credits_mount1.' de '.(($config->credits_type1 == 1) ? $config00->money_name1 : $config00->money_name2 ).'</td>
          <td>Premio: '.$config->credits_mount2.' de '.(($config->credits_type2 == 1) ? $config00->money_name1 : $config00->money_name2 ).'</td>
        </tr>
        
      </tbody>
    </table>
  </div>
</div>
';

	$characters = $core_db->Execute("Select mu_id,name,class from character where accountid=? order by clevel desc ",array($user_auth_id));

	
	while (!$characters->EOF){
	echo '
	<div class="panel panel-default panel-body-cont">
  <div class="panel-body panel-fix">
	<table class="table-fix">';
		echo '
<tr>
    <td width="66" rowspan="2"><img src="template/'.$core['config']['template'].'/images/class/'.decode_class($characters->fields[2],'2').'" width="66" height="66" title="Class"></td>
     <td align="left" class="iR_name" width="100">'.htmlentities($characters->fields[1]).'</td>
    <td rowspan="2">
    <input type="button"  class="btn btn-primary btn-sm" value="Hacer Quest 1" onclick="ask_url(\'Seguro que desea Continuar con la Quest 1?\',\''.$core_run_script.'&cid='.$characters->fields[0].'&quest=1\');">
    <input type="button"  class="btn btn-warning btn-sm" value="Hacer Quest 2" onclick="ask_url(\'Seguro que desea Continuar con la Quest 2?\',\''.$core_run_script.'&cid='.$characters->fields[0].'&quest=2\');">
    </td>
</tr>
  <tr>
    <td algin="left">'.decode_class($characters->fields[2]).'</td>
  </tr>';
		
	echo '</table>
	</div>
</div>';
		$characters->MoveNext();
	}

	
	
}
?>