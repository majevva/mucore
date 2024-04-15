<?
$config00 = simplexml_load_file('engine/config_mods/mu_coins_settings.xml');
$config2 = simplexml_load_file('engine/config_mods/aoh_canje_horas.xml');

$active = trim($config2->active);
if($CoD3e4rN0lCl_xF2S3A52CvZ !='x"CwFhks26N|*zgf93NS'){
	echo msg('0','Necesitas MuCore Premium para utilizar este Modulo');
}elseif($active == '0'){
	echo msg('0',text_sorry_feature_disabled);
}else{

	if(isset($_GET['quest'])){
		echo '<div style="margin-top: 10px;">';

		if(empty($_GET['quest'])){
			header('Location: '.$core_run_script.'');
			exit();
		}else{



				if(account_online($user_auth_id) === true){
					echo msg('0',text_clearinventory_t1);		
				}else{

					$CheckUSer_Data = $core_db->Execute("Select OnlineHours From MEMB_STAT WHERE memb___id = ?", array($user_auth_id));
					$CheckUSer_Data2 = $core_db->Execute("Select AOH_Horas_Canje From MEMB_INFO WHERE memb___id = ?", array($user_auth_id));

            		$DiferenciaHoras = $CheckUSer_Data->fields[0] - $CheckUSer_Data2->fields[0];

            		if($DiferenciaHoras < 1) {
            			echo msg('0','No tienes suficientes Horas Online para participar');
            		}else{

					
					//Quest 1
					if ($_GET['quest']==1){
						$PuntosNuevos = $DiferenciaHoras * $config2->credits_mount1;
						$querymod1 = $core_db->Execute("UPDATE MEMB_INFO SET AOH_Horas_Canje = AOH_Horas_Canje + ? WHERE memb___id = ?", array($DiferenciaHoras, $user_auth_id));
						$querymod2 = $core_db->Execute("UPDATE ".$config00->credits_table." SET ".$config00->credits_column." = ".$config00->credits_column." + ? WHERE ".$config00->user_column." = ?", array($PuntosNuevos, $user_auth_id));

						echo msg('1','Felicidades has Ganado '.$PuntosNuevos.' de '.$config00->money_name1.'');
					}
					

        			//Quest 2
        			if ($_GET['quest']==2){
        				$PuntosNuevos = $DiferenciaHoras * $config2->credits_mount2;
						$querymod1 = $core_db->Execute("UPDATE MEMB_INFO SET AOH_Horas_Canje = AOH_Horas_Canje + ? WHERE memb___id = ?", array($DiferenciaHoras, $user_auth_id));
						$querymod2 = $core_db->Execute("UPDATE ".$config00->credits2_table." SET ".$config00->credits2_column." = ".$config00->credits2_column." + ? WHERE ".$config00->user2_column." = ?", array($PuntosNuevos, $user_auth_id));

						echo msg('1','Felicidades has Ganado '.$PuntosNuevos.' de '.$config00->money_name2.'');
					}



					}


					}
					
				}
			
		echo '</div>';
	}

	echo '
<div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">Especificaciones</h3>
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
          <td></td>
          <td></td>
        </tr>

        <tr>
          <td>Premio: '.$config2->credits_mount1.' de <b>'.$config00->money_name1.'</b> por Hora Online</td>
          <td>Premio: '.$config2->credits_mount2.' de <b>'.$config00->money_name2.'</b> por Hora Online</td>
        </tr>
        
      </tbody>
    </table>
  </div>
</div>
';
?>
<?
//Creando las columnas si no existen
			$chekHorasCanje = $core_db->Execute("Select top 1 AOH_Horas_Canje from MEMB_INFO");


			if (!$chekHorasCanje) {
    		// Si no encontramos la columna, la agregamos
    		$core_db->Execute("alter table MEMB_INFO add AOH_Horas_Canje int not null default 0");
    		echo msg('1','Columna Creada Correctamente');
			}
?>

	<div class="panel panel-default panel-body-cont">
  <div class="panel-body panel-fix">
	<table class="table-fix">
	<?
	$queryHorasUser = $core_db->Execute("Select OnlineHours From MEMB_STAT WHERE memb___id = ?", array($user_auth_id));
	$queryHorasUser2 = $core_db->Execute("Select AOH_Horas_Canje From MEMB_INFO WHERE memb___id = ?", array($user_auth_id));
	$HorasSinCanje = $queryHorasUser->fields[0]-$queryHorasUser2->fields[0];
	if ($HorasSinCanje<0){
		$HorasSinCanje=0;
	}
	?>
	<tr>
		<td></td>
		<td></td>
		<td>
			Total de Horas Online: <?=$queryHorasUser->fields[0];?><br>
			Horas sin Canjear: <?=$HorasSinCanje;?><br>
		</td>
	</tr>
<tr>
    <td width="66" rowspan="2"></td>
     <td align="left" class="iR_name" width="100"></td>
    <td rowspan="2">
    <input type="button"  class="btn btn-primary btn-sm" value="Hacer Quest 1" onclick="ask_url('Seguro que desea Continuar con la Quest 1?','<?=$core_run_script;?>&quest=1');">
    <input type="button"  class="btn btn-warning btn-sm" value="Hacer Quest 2" onclick="ask_url('Seguro que desea Continuar con la Quest 2?','<?=$core_run_script;?>&quest=2');">
    </td>
</tr>
  <tr>
    <td algin="left"></td>
  </tr>
  </table>
	</div>
</div>


<?
}
?>