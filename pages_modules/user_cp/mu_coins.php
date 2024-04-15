<?

$config2 = simplexml_load_file('engine/config_mods/mu_coins_settings.xml');
$lista_log = file('engine/variables_mods/paypal_donate_logs.tDB');
$active = trim($config->active);
if ($active == '0') {
    echo msg('0', text_sorry_feature_disabled);
} else {
  //Verificamos si existe el usuario en la tabla de creditos
  //Creditos 1
  if ($config2->credits_database==1){
    $check_TableCoins = $core_db->Execute("Select ".$config2->credits_column." from ".$config2->credits_table." where ".$config2->user_column."=?",array($user_auth_id));
  }elseif ($config2->credits_database==2){
    $check_TableCoins = $core_db2->Execute("Select ".$config2->credits_column." from ".$config2->credits_table." where ".$config2->user_column."=?",array($user_auth_id));
  }
  
  if($check_TableCoins->EOF){
    if ($config2->credits_database==1){
      $insert_mu_coins_id = $core_db->Execute("INSERT INTO ".$config2->credits_table." (".$config2->user_column.",".$config2->credits_column.")VALUES(?,?)",array($user_auth_id,'0'));
    }elseif ($config2->credits_database==2){
      $insert_mu_coins_id = $core_db2->Execute("INSERT INTO ".$config2->credits_table." (".$config2->user_column.",".$config2->credits_column.")VALUES(?,?)",array($user_auth_id,'0'));
    }
    if($insert_mu_coins_id){
      echo msg('1',text_mucoins_t1);
    }else{
      echo msg('0',text_mucoins_t2);
    }
  }
  //Creditos 2
  if ($config2->credits2_database==1) {
    $check_TableCoins2 = $core_db->Execute("Select ".$config2->credits2_column." from ".$config2->credits2_table." where ".$config2->user2_column."=?",array($user_auth_id));
  }elseif ($config2->credits2_database==2){
    $check_TableCoins2 = $core_db2->Execute("Select ".$config2->credits2_column." from ".$config2->credits2_table." where ".$config2->user2_column."=?",array($user_auth_id));
  }
  if($check_TableCoins2->EOF){
    if ($config2->credits2_database==1){
      $insert_mu_coins_id2 = $core_db->Execute("INSERT INTO ".$config2->credits2_table." (".$config2->user2_column.",".$config2->credits2_column.")VALUES(?,?)",array($user_auth_id,'0'));
    }elseif ($config2->credits2_database==2){
      $insert_mu_coins_id2 = $core_db2->Execute("INSERT INTO ".$config2->credits2_table." (".$config2->user2_column.",".$config2->credits2_column.")VALUES(?,?)",array($user_auth_id,'0'));
    }
    if($insert_mu_coins_id2){
      echo msg('1',text_mucoins_t1);
    }else{
      echo msg('0',text_mucoins_t2);
    }
  }
  // Fin de verificacion de usuario en tabla de creditos

	$check_user = $core_db2->Execute("Select memb___id,mail_addr,country from MEMB_INFO where memb___id=?", array(
        $user_auth_id
    ));

    $check_cashshop = $core_db->Execute("Select ".AOH_CashShop_WCoinC_column.",".AOH_CashShop_WCoinP_column.",".AOH_CashShop_GoblinPoint_column." from ".AOH_CashShop_Table." where ".AOH_CashShop_Account_column."=?", array(
        $user_auth_id
    ));

    //Verificando Database a utilizar
    //Creditos 1
    if ($config2->credits_database==1){
      $check_mu_coins = $core_db->Execute("Select ".$config2->credits_column." from ".$config2->credits_table." where ".$config2->user_column."=?", array(
        $user_auth_id
    ));
    }elseif ($config2->credits_database==2){
      $check_mu_coins = $core_db2->Execute("Select ".$config2->credits_column." from ".$config2->credits_table." where ".$config2->user_column."=?", array(
        $user_auth_id
    ));
    }
    // Creditos 2
    if ($config2->credits2_database==1){
      $check_mu_coins2 = $core_db->Execute("Select ".$config2->credits2_column." from ".$config2->credits2_table." where ".$config2->user2_column."=?", array(
        $user_auth_id
    ));
    }elseif ($config2->credits2_database==2){
      $check_mu_coins2 = $core_db2->Execute("Select ".$config2->credits2_column." from ".$config2->credits2_table." where ".$config2->user2_column."=?", array(
        $user_auth_id
    ));
    }
}
?> 


<br>

<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Informacion de: <?=$user_auth_id;?></h3>
  </div>
<table class="table table-aoh">
  <tbody>
    <tr>
      <td class="tbtl">Usuario:</td>
      <td><?=$check_user->fields[0];?></td>
      <td class="tbtl">Email:</td>
      <td><?=$check_user->fields[1];?></td>
    </tr>
    <tr>
      <td class="tbtl">Pais:</td>
      <td><?=getcountry($check_user->fields[2]);?></td>
      <td class="tbtl">Password: </td>
      <td> ****** <a class="btn btn-primary btn-xs" href="index.php?page_id=user_cp&panel=account_settingsphp" role="button">Cambiar</a></td>
    </tr>
  </tbody>
  </table>
</div>

<!--Dinero-->
<div class="panel panel-warning">
  <div class="panel-heading">
    <h3 class="panel-title">Monedas</h3>
  </div>
<table class="table table-aoh">
  <tbody>
    <tr>
      <td class="tbtl"><? echo $config2->money_name1; ?></td>
      <td><? echo' '. number_format($check_mu_coins->fields[0]) .' ' ;?></td>
      <td class="tbtl"><? echo $config2->money_name2; ?></td>
      <td><? echo' '. number_format($check_mu_coins2->fields[0]) .' ' ;?></td>
    </tr>
    <tr>
      <td colspan="4"><a class="btn btn-warning btn-xs" href="index.php?page_id=donar" role="button">Recargar Creditos</a></td>
    </tr>
    <tr>
      <td class="tbtl">WCoin</td>
      <td><?=$check_cashshop->fields[0];?></td>
      <td class="tbtl">WCoinP</td>
      <td><?=$check_cashshop->fields[1];?></td>
    </tr>
    <tr>
      <td class="tbtl">GoblinPoints</td>
      <td><?=$check_cashshop->fields[2];?></td>
      <td colspan="2"></td>
    </tr>
  </tbody>
  </table>
</div>

<!--Historial Recargas-->
<div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">Historial de Recargas</h3>
  </div>
<table class="table table-fix">
	<thead>
        <tr>
          <th>Factura</th>
          <th>Cantidad</th>
          <th>Precio</th>
          <th>Metodo</th>
          <th>Fecha</th>
        </tr>
    </thead>
  <tbody>
  <?
foreach ($lista_log as $iD_data0){
  $iD_data0 = explode(",",$iD_data0);
  if($iD_data0[1] == $user_auth_id) {

    switch ($iD_data0[3]) {
       case 1:
         $nombre_c = $config2->money_name1;
         break;
       
       case 2:
         $nombre_c = $config2->money_name2;
         break;
     } 
?>
    <tr>
      <td><?=$iD_data0[0]?></td>
      <td><?=$iD_data0[2]?> de <?=$nombre_c;?></td>
      <td><?=$iD_data0[5]?> <?=$iD_data0[6]?></td>
      <td><?=$iD_data0[4]?></td>
      <td><?=$iD_data0[7]?></td>
    </tr>
    <?    
  }
}
?>
  </tbody>
  </table>
</div>
		  

