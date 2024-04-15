<?php
$lista_bancos = file('engine/variables_mods/Donate_system.tDB');
$lista_precio = file('engine/variables_mods/Donate_system_montos.tDB');
$lista_paypal = file('engine/variables_mods/paypal_donate.tDB');
$get_config = simplexml_load_file('engine/config_mods/donate_paypal_settings.xml');
$get_config00 = simplexml_load_file('engine/config_mods/mu_coins_settings.xml');
$config_coins = simplexml_load_file('engine/config_mods/mu_coins_settings.xml');


if ($_GET['act']=='pb'){

//Paypal
define("LOG_FILE_PayPal", "engine/logs/paypal/logpp.txt"); // Log Save

$req = 'cmd=_notify-validate'; // Initialize the $req variable and add CMD key value pair
// Read the post from PayPal
foreach ($_POST as $key => $value) {
    $value = urlencode(stripslashes($value));
    $req .= "&$key=$value";
}

  $fp = fopen(LOG_FILE_PayPal, "a+");
  $texto = date('[Y-m-d H:i e] '). "Data Sent Back: ".$req."";
  fputs($fp, $texto .chr(10));

// Now Post all of that back to PayPal's server using curl, and validate everything with PayPal
if ($get_config->testing == 1){
  $url_get_paypal='https://www.sandbox.paypal.com/cgi-bin/webscr';
}elseif ($get_config->testing == 0){
  $url_get_paypal='https://www.paypal.com/cgi-bin/webscr';
}
$url = $url_get_paypal;
$curl_result = $curl_err = '';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close', 'User-Agent: company-name'));
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_VERBOSE, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_TIMEOUT, 30);
$curl_result = @curl_exec($ch);
$curl_err = curl_error($ch);
curl_close($ch);

//$req = str_replace("&", "\n", $req);  // Make it a nice list in case we want to email it to ourselves for reporting

  $fp = fopen(LOG_FILE_PayPal, "a+");
  $texto = date('[Y-m-d H:i e] '). "Valid? ".$curl_result."";
  fputs($fp, $texto .chr(10));


//Separando variables custom
  $custom  = $_POST['custom'];
  $custom_val = explode("-", $custom);
  $vals_user = $custom_val[0];
  $vals_credits = $custom_val[1];
  $vals_credits_tipo = $custom_val[2];
  $vals_codigo = $custom_val[3];

// Check that the result verifies
if (strpos($curl_result, "VERIFIED") !== false) {
    //$req .= "Paypal Verified OK";
  //Do Credits Reward Process
  
  $get_business = $_POST['business'];
  $get_invoice = $_POST['invoice'];
  $payment_amount = $_POST['mc_gross'];


 //ENVIO EXITOSO
        
foreach ($lista_paypal as $pag_dataP){
          $pag_dataP = explode(",",$pag_dataP);
      if($pag_dataP[1] == $vals_codigo){
        if($pag_dataP[3]==1){
          if($config_coins->credits_database==1){
            $core_db->Execute("UPDATE ".$config_coins->credits_table." SET ".$config_coins->credits_column."=".$config_coins->credits_column." + ".$pag_dataP[2]." WHERE ".$config_coins->user_column."='".$vals_user."'");
          }else{
            $core_db2->Execute("UPDATE ".$config_coins->credits_table." SET ".$config_coins->credits_column."=".$config_coins->credits_column." + ".$pag_dataP[2]." WHERE ".$config_coins->user_column."='".$vals_user."'");
          }
         
        }elseif($pag_dataP[3]==2){
          if($config_coins->credits2_database==1){
            $core_db->Execute("UPDATE ".$config_coins->credits2_table." SET ".$config_coins->credits2_column."=".$config_coins->credits2_column." + ".$pag_dataP[2]." WHERE ".$config_coins->user2_column."='".$vals_user."'");
          }else{
            $core_db2->Execute("UPDATE ".$config_coins->credits2_table." SET ".$config_coins->credits2_column."=".$config_coins->credits2_column." + ".$pag_dataP[2]." WHERE ".$config_coins->user2_column."='".$vals_user."'");
          } 
        }
        $Fecha_OP = date("Y-m-d H:i:s");
        $new_cfg = $get_invoice.",".$vals_user.",".$pag_dataP[2].",".$pag_dataP[3].",PAYPAL,".$payment_amount.",".$pag_dataP[6].",".$Fecha_OP.",\r\n";
        $open_f = fopen('engine/variables_mods/paypal_donate_logs.tDB','a');
        $write_f = fwrite($open_f,$new_cfg);
        $close_f = fclose($open_f);

}
}


  $fp = fopen(LOG_FILE_PayPal, "a+");
  $texto = date('[Y-m-d H:i e] '). "Username: ".$vals_user." - Creditos: ".$vals_credits." Tipo: ".$vals_credits_tipo."   - Credits added...";
  fputs($fp, $texto .chr(10));  
      
    
    
} else {
    //$req .= "Data NOT verified from Paypal!";

  $fp = fopen(LOG_FILE_PayPal, "a+");
  $texto = date('[Y-m-d H:i e] '). "Username: ".$get_usershop." - Request was not from/for paypal ( ".$_SERVER['REMOTE_ADDR']." )";
  fputs($fp, $texto .chr(10));  


}



}else{
?>


<div class="alert alert-info">
  La demora de entrega de tus Creditos oscila entre las 24 y 72hs (h&aacute;biles), dependiendo siempre del medio de pago que utilices. Los S&aacute;bados y Domingos no cuentan como d&iacute;as h&aacute;biles. &Eacute;sto quiere decir que si (a modo de ejemplo) realiz&aacute;s el pago un Viernes, probablemente recibas tus Creditos reci&eacute;n el Lunes o Martes.
</div>

<!-- Paypal-->
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Recargas via Paypal (recarga instantanea)</h3>
  </div>
<table class="table table-bordered table-aoh">
  <tbody>
<?
//Random digits
function genRanDig($length = 7) {
    $characters = '0123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}


foreach ($lista_paypal as $iD_data001){
  $iD_data001 = explode(",",$iD_data001);

if ($iD_data001[3]==1){
  $nombre_credito0=$get_config00->money_name1;
}elseif($iD_data001[3]==2){
  $nombre_credito0=$get_config00->money_name2;
}
$rand_here = genRanDig(); //Random Invoice

if ($get_config->testing == 1){
  $url_get_paypal='https://www.sandbox.paypal.com/cgi-bin/webscr';
}elseif ($get_config->testing == 0){
  $url_get_paypal='https://www.paypal.com/cgi-bin/webscr';
}
?>


<?
echo'
<script>
$(document).ready(function(){
  $("#div-pw").hide();
  $("#div-sr").hide();
  $("#div-pp").show();
  $("#div-pg").hide();
  $("#div-fort").hide();
  $("#div-pags").hide();
  $("#div-inter").hide();
});
$( "#buttonClickeds" ).on("click", function() {
      var GetVald = "'.$iD_data001[5].'";
      $("input[name=amount]").val(GetVald);
      $("#cbyids").val(GetVald);
      
      var customs = "'.$user_auth_id.'-'.$iD_data001[2].'-'.$iD_data001[3].'-'.$iD_data001[1].'";
      $("input[name=custom]").val(customs);
      $("#sdcbyids").val(customs);
});
</script>
<form action="'.$url_get_paypal.'" method="post">
<input name="cmd" value="_xclick" type="hidden">
<input name="business" value="'.$get_config->pp_email.'" type="hidden">
<input name="cbt" value="Volver a '.$core['config']['websitetitle'].'" type="hidden">
<input name="currency_code" value="'.$iD_data001[6].'" type="hidden">
<input name="quantity" value="1" type="hidden">
<input name="usershop" value="'.$user_auth_id.'" type="hidden">
<input name="item_name" value="'.$iD_data001[2].' de '.$nombre_credito0.' -- '.$user_auth_id.' - Fact: '.$rand_here.'" type="hidden">
<input name="custom" value="'.$user_auth_id.'-'.$iD_data001[2].'-'.$iD_data001[3].'-'.$iD_data001[1].'" id="sdcbyids" type="hidden">
<input name="shipping" value="0" type="hidden">
<input name="invoice" value="'.$rand_here.'" type="hidden">
<input name="amount" value="'.$iD_data001[5].'" id="cbyids" type="hidden">
<input name="return" value="'.$core['config']['website_url'].'" type="hidden">
<input name="cancel_return" value="'.$core['config']['website_url'].'" type="hidden">
<input name="notify_url" value="'.$core['config']['website_url'].'/engine/callbacks/paypal.php" type="hidden">
<input type="hidden" name="rm" value="2">

      <tr>
        <td style="padding-top: 3%;"><span class="label label-success" style="font-size:13px">'.$iD_data001[2].' de '.$nombre_credito0.' por '.$iD_data001[5].' '.$iD_data001[6].'</span></td>
        <td><input type="image" src="AOH_Addons/images/bancos/paypal.png" width="150px" name="submit_pp" value="SUBMIT" /></td>
      </tr>
</form>
';

?>

<?
}
?>
  </tbody>
  </table>
</div>


<!-- Lista de Bancos -->
<div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">Depositos en efectivo (recarga manual)</h3>
  </div>
<table class="table table-fix">
<thead>
        <tr>
          <th>Descripcion</th>
          <th>Precio</th>
        </tr>
    </thead>
  <tbody>
<?
foreach ($lista_precio as $iD_data00){
  $iD_data00 = explode(",",$iD_data00);

if ($iD_data00[2]==1){
  $nombre_credito=$get_config00->money_name1;
}elseif($iD_data00[2]==2){
  $nombre_credito=$get_config00->money_name2;
}
?>
    <tr>
      <td><? echo $iD_data00[1]; ?> de <? echo $nombre_credito; ?></td>
      <td><? echo $iD_data00[3]; ?></td>
    </tr>
<? } ?>
  </tbody>
  </table>
</div>







<!--Listado de Bancos-->
<?
foreach ($lista_bancos as $iD_data0){
  $iD_data0 = explode(",",$iD_data0);

?>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title"><? echo $iD_data0[1]; ?></h3>
  </div>
<div class="row show-grid">
    <div class="col-xs-6 col-md-4"><img src="<? echo $iD_data0[4]; ?>" class="img-responsive" /></div>
    <div class="col-xs-12 col-md-8">
  <table class="table table-bordered table-aoh">
  <tbody>
    <tr>
      <td class="tbtl">Beneficiado:</td>
      <td><? echo $iD_data0[3]; ?></td>
    </tr>
    <tr>
      <td class="tbtl">N. Cuenta o Pais</td>
      <td><? echo $iD_data0[2]; ?></td>
    </tr>
    <tr>
      <td colspan="2" class="text-left">
        Una vez realizado el envio debes enviar un mensaje a nuestra pagina de Facebook: <a href="<?=$config_template->Facebook;?>"><?=$config_template->Facebook;?></a> o a nuestro Email: <a href="mailto:<?=$core['config']['master_mail']?>"><?=$core['config']['master_mail']?></a> anunciando que es por una<b>&quot;Donaci&oacute;n&quot;</b> indicando los siguientes datos:<br /><br />
    -&nbsp;<b>Nombre de Cuenta</b><br />
    -&nbsp;<b>Cantidad de Creditos a recibir</b><br />
    -&nbsp;<b>Nombres y Apellido del remitente (quien env&iacute;a el dinero)</b><br />
    -&nbsp;<b>Ubicaci&oacute;n (pa&iacute;s donde vive quien env&iacute;a el dinero)</b><br />
    -&nbsp;<b>Monto enviado ($)</b><br />
    -&nbsp;<b>N&ordm; de Operaicon o MTCN:</b>
      </td>
    </tr>
  </tbody>
  </table>
    </div>
  </div>
</div>
<? } ?>

<?
//ELSE POSTBACK
}
?>