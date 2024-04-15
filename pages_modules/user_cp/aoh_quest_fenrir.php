<?
$config00 = simplexml_load_file('engine/config_mods/mu_coins_settings.xml');
$config = simplexml_load_file('engine/config_mods/aoh_event_sign.xml');

if($CoD3e4rN0lCl_xF2S3A52CvZ !='x"CwFhks26N|*zgf93NS'){
	echo msg('0','Necesitas MuCore Premium para utilizar este Modulo');
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
						//$EH_dur=substr($Pedido,4,2);

						//Hex del Inventario
						$EH2_id=substr($Inv,0,2);
						$EH2_tipe=substr($Inv,18,2);
						$EH2_level=substr($Inv,2,2);
						//$EH2_dur=substr($Inv,4,2);

						if (($EH_id==$EH2_id) and ($EH_tipe==$EH2_tipe) and ($EH_level==$EH2_level)){
							$return=1;
						}else{
							$return=0;
						}
						return $return;
  					}

  					function CheckItem2($Pedido, $Inv){
  						$return = 0;
  						//Hex del pedido
  						$EH_id=substr($Pedido,0,2);
						$EH_tipe=substr($Pedido,18,2);
						$EH_opt=substr($Pedido,14,2);

						//Hex del Inventario
						$EH2_id=substr($Inv,0,2);
						$EH2_tipe=substr($Inv,18,2);
						$EH2_opt=substr($Inv,14,2);

						if (($EH_id==$EH2_id) and ($EH_tipe==$EH2_tipe) and ($EH_opt==$EH2_opt) ){
							$return=1;
						}else{
							$return=0;
						}
						return $return;
  					}


					$Evento_Hex1 = "8D0814000000470000C000FFFFFFFFFF";
					$Evento_Hex2 = "8A08FF000007C80000C000FFFFFFFFFF";
					$Evento_Hex3 = "250014000000280000D000FFFFFFFFFF";
							
					
					//Reconstruir Inventario
					$total_paginas=count($array_inventory);
					//Quest 1
					if ($_GET['quest']==1){
						for ($i=0;$i<=$total_paginas;$i++) {
						
						if ($i < 64){
							$itemNew .= $array_inventory[$i];
						}elseif ($i == 64){
            				$itemNew .= "FFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFF";
            			}elseif ($i == 65){
            				$itemNew .= "FFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFF";
            			}elseif ($i == 66){
            				$itemNew .= "2500FF000000360400D000FFFFFFFFFF";
            			}elseif ($i > 66){
            				$itemNew .= $array_inventory[$i];
            			}
                	
        				}
        				$nuevo_inventario="0x".$itemNew;
					}
					

					// Lista de Cuadros
					//$array_inventory[12]	--- Primer Cuadro del inv
					//$array_inventory[75]	--- Cuadro 64 del inv

					if ($_GET['quest']==1){
						if ((CheckItem($Evento_Hex1,$array_inventory[64])==1) and (CheckItem($Evento_Hex2,$array_inventory[65])==1) and (CheckItem2($Evento_Hex3,$array_inventory[66])==1)){
							$clear = $core_db->Execute("Update character set [inventory]=$nuevo_inventario where mu_id=?",array($id));

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
    <h3 class="panel-title">Quest Fenrir</h3>
  </div>
  <div class="panel-body panel-fix">
    <table class="table">
      <thead>
        <tr>
          <th>Requerimientos</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><img src="https://image.prntscr.com/image/l0Dbdw9zRTub6I4CrG83tw.png" class="img-thumbnail"></td>
        </tr>

        <tr>
          <td>Items:<br>
          - Bundled Jewel of Chaos x 20<br>
          - Bundled Jewel of Guardian x 20<br>
          - Horn of Fenrir
          </td>
        </tr>

        <tr>
        <td>Recompensa:<br>
        - Gold Fenrir
        </td>
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
    <input type="button"  class="btn btn-primary btn-sm" value="Hacer Quest" onclick="ask_url(\'Seguro que desea Continuar con la Quest?\',\''.$core_run_script.'&cid='.$characters->fields[0].'&quest=1\');">
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