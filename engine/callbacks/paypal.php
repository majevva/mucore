<?php
//======================================//
//=======CONECCIONES NECESARIAS=========//
//======================================//
session_start();
ob_start();
require('../../config.php');
require('../custom_variables.php');
require('../global_functions.php');
require('../global_config.php');
require('../global_cms.php');
require("../adodb/adodb.inc.php");

include("../connect_core.php");
require('../core.php');
//======================================//
//======CONFIGURACIONES GLOBALES========//
//======================================//
$lista_paypal = file('../variables_mods/paypal_donate.tDB');
$get_config = simplexml_load_file('../config_mods/donate_paypal_settings.xml');
$get_config00 = simplexml_load_file('../config_mods/mu_coins_settings.xml');
$config_coins = simplexml_load_file('../config_mods/mu_coins_settings.xml');
//Paypal
define("LOG_FILE_PayPal", "../logs/paypal/logpp.txt"); // Log Save
//======================================//
//======FIN DE ARCHIVOS INCLUIDOS=======//
//======================================//

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
        $open_f = fopen('../variables_mods/paypal_donate_logs.tDB','a');
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
?>