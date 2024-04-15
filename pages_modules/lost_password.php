
<?


$get_config = simplexml_load_file('engine/config_mods/lostpassword_settings.xml');
if($get_config->active == '0'){
	echo msg('0',text_sorry_feature_disabled);
}else{
	switch ($get_config->method){
		case '1':
				$verification_config = simplexml_load_file('engine/config_mods/human_verification.xml');
	if($verification_config->human_verification_type == 'reCAPTCHA'){
		$is_reCAPTCHA = '1';
		require_once('engine/recaptchalib.php');
		$privatekey = $verification_config->reCAPTCHA_private_key;
        $publickey = $verification_config->reCAPTCHA_public_key;

// respuesta vacía
$response = null;
 
// comprueba la clave secreta
$reCaptcha = new ReCaptcha($privatekey);

if ($_POST["g-recaptcha-response"]) {
$response = $reCaptcha->verifyResponse(
        $_SERVER["REMOTE_ADDR"],
        $_POST["g-recaptcha-response"]
    );
}

	}
	

			if(isset($_POST['proccess_password'])){
				require("engine/validate.php");
				$elems[] = array('name'=>'userid','label'=>''.text_lostpwd_t1.'', 'type'=>'text','uname'=>'true', 'required'=>true, 'len_min'=>4,'len_max'=>12, 'cont' =>'alpha');
				$f = new FormValidator($elems);
				$err = $f->validate($_POST);
				if ( $err === true ) {
					$valid = $f->getValidElems();
					foreach ( $valid as $k => $v ) {
						if ( $valid[$k][0][1] == false ) {
							if ( empty($valid[$k][0][2]) ) {
								$error =  msg('0',$valid[$k][0][2]);
							}else{
								$error =  msg('0',$valid[$k][0][2]);
							}
						}
					}
				} else {
							
					$userid = safe_input($_POST['userid'],'');
					if($_SESSION['SID_code'] != md5($_POST['verify_int'])){
						
						$error = msg('0',''.text_lostpwd_t2.'');
					}else{
						if(check_account($userid) === false){
							$error = msg('0',''.text_lostpwd_t3.'');
						}else{
							$select_q = $core_db2->Execute("Select SecretQuestion from MEMB_INFO where memb___id=?",array($userid));
							$userid_p_f = '1';
							$userid_f = '1';
						}
			
					}
					
		
				}
			}
			
			
			if(isset($_POST['proccess_answer'])){
				require("engine/validate.php");
				$elems[] = array('name'=>'answer', 'label'=>''.text_lostpwd_t4.'','type'=>'text', 'required'=>true, 'len_min'=>4,'len_max'=>20, 'cont' =>'alpha');
				$f = new FormValidator($elems);
				$err = $f->validate($_POST);
				if ( $err === true ) {
					$valid = $f->getValidElems();
					foreach ( $valid as $k => $v ) {
						if ( $valid[$k][0][1] == false ) {
							if ( empty($valid[$k][0][2]) ) {
								$error =  msg('0',$valid[$k][0][2]);
							}else{
								$error =  msg('0',$valid[$k][0][2]);
							}
						}
					}
				} else {
					$userid = safe_input(crypt_it($_POST['userid'],$core['config']['crypt_key']),'');
					$answer = safe_input($_POST['answer'],'');
					
					
					if($is_reCAPTCHA == '1'){
			if ($response != null && $response->success) {
                    $bot_check = '0';
                }else{
                	$bot_check = '1';
                }
		}else{
			if($_SESSION['SID_code'] != md5($_POST['verify_int'])){
				$bot_check = '1';
			}
		}
		
					
					if($bot_check == '1'){
						$error = msg('0',''.text_lostpwd_t2.'');
					}else{
						if(check_account($userid) === false){
							$error = msg('0',''.text_lostpwd_t3.'');
						}else{
							$select_q = $core_db2->Execute("Select memb_guid from MEMB_INFO where memb___id=? and SecretAnswer=?",array($userid,$answer));
							if($select_q->EOF){
								$error = msg('0',''.text_lostpwd_t5.'');
							}else{
								$new_password = get_rand_id('10');
								if($core['config']['md5'] == '1'){
									$pass_up = $core_db2->Execute("Update MEMB_INFO set memb__pwd = [dbo].[fn_md5](?,?) where memb___id=?",array($new_password,$userid,$userid));
								}elseif ($core['config']['md5'] == '0'){
									$pass_up = $core_db2->Execute("Update MEMB_INFO set memb__pwd = ? where memb___id=?",array($new_password,$userid));
								}
								if($pass_up){
									$userid_f = '1';
									$userid_a_f = '1';
								}else{
									echo msg('0',''.text_lostpwd_t6.'');
								}
							}
						}
					}
				}
			}
			
			echo '	<table  border="0" cellspacing="4" cellpadding="0"  align="center" width="100%" >
			<tr>';
			if($userid_f != '1'){
				echo '<td align="left" class="curent_step" width="33%">1. '.text_lostpwd_t7.'</td>';
			}else{
				echo '<td align="left" class="step" width="33%">1. '.text_lostpwd_t7.'</td>';
			}
			if($userid_p_f == '1'){
				echo '<td align="left" class="curent_step"  width="33%">2. '.text_lostpwd_t8.'</td>';
			}else{
				echo '<td align="left" class="step"  width="33%">2. '.text_lostpwd_t8.'</td>';
			}
			if($userid_a_f == '1'){
				echo '<td align="left" class="curent_step"  width="33%">3. '.text_lostpwd_t9.'</td>';
			}else {
				echo '<td align="left" class="step"  width="33%">3. '.text_lostpwd_t9.'</td>';
			}
			echo '
			</tr>
			</table>';
			if($error){
				echo $error;
			}
			if($userid_a_f){
				echo '
				<table border="0" cellspacing="10" cellpadding="0" width="100%" style="margin-top: 10px; margin-bottom: 10px;" align="center">
			<tr>
			<td colspan="3" align="left" class="iRg_line">'.text_lostpwd_t10.'</td>
			</tr>
			<tr>
			<td align="left" class="iRg_text" style="padding-left: 24px;" width="150">'.text_lostpwd_t11.':</td>
			<td align="left" class="iRg_inf"><div class="hidden_password">'.$new_password.'</div></td>
			<td align="left" ><span class="iRg_inf">'.text_lostpwd_t12.'</span></td>
			</tr>

			</table>';
			}
			if($userid_p_f == '1'){
				echo '	<form name="sign_up_frm" method="post" action="" id="sign_up_frm">
			<table border="0" cellspacing="10" cellpadding="0" width="100%" style="margin-top: 10px; margin-bottom: 10px;" align="center">
			<tr>
			<td colspan="3" align="left" class="iRg_line">'.text_lostpwd_t13.':</td>
			</tr>
			<tr>
			<td align="left" class="iRg_text" style="padding-left: 24px;" width="130">'.text_lostpwd_t14.':</td>
			<td align="left" class="iRg_inf" colspan="2">'.s_question($select_q->fields[0]).'</td>
			</tr>
			<tr>
			<td align="left" class="iRg_text" width="130">'.text_lostpwd_t15.':</td>
			<td align="left" class="iRg_inf">
			<input class="iRg_input" type="text" name="answer" id="answer" maxlength="12"></td>
			<td align="left" ><span class="iRg_inf"><div id="c_uss">'.text_lostpwd_t16.'</div></span></td>
			</tr>
			<tr>
<td colspan="3" align="left" class="iRg_line">'.text_lostpwd_t17.':</td>
</tr>
			<tr>
<td align="left" colspan="3"> ';
if($is_reCAPTCHA == '1'){
   	$publickey = $verification_config->reCAPTCHA_public_key;
   	echo '<div class="g-recaptcha" data-sitekey="'.$publickey.'"></div>';
    echo "<script src='https://www.google.com/recaptcha/api.js'></script>";
    echo '</td></tr></table>';

   }else{
   	 echo '
<table border="0" cellspacing="0" cellpadding="0" width="100%">
<tr>
<td align="left"><img src="get.php?aI" border="0"></td>
<td align="left" class="iRg_inf"><div align="left">'.text_lostpwd_t18.'</div><input class="iRg_input" type="text" name="verify_int" id="verify_int"></td>
</tr>
</table>'
;
   }	
   				
				echo '
</td>
</tr>
			</table>
			<input type="hidden" name="proccess_answer">
			<input type="hidden" name="userid" value="'.crypt_it($_POST['userid'],$core['config']['crypt_key']).'">
			<table border="0" cellspacing="10" cellpadding="0" width="100%"  align="center">
			<tr>
			<td align="right"><input type="button" class="btn btn-success" value="Aceptar" onclick="submit()"></td>
			<td align="left"><input type="button" class="btn btn-danger" value="Cancelar" onclick="location.href=\''.$core_run_script.'\'"></td>
			</table>
			</form>';
			}
						

			if($userid_f != '1'){
				echo '	<form name="sign_up_frm" method="post" action="" id="sign_up_frm">
			<table border="0" cellspacing="10" cellpadding="0" width="100%" style="margin-top: 10px; margin-bottom: 10px;" align="center">
			<tr>
			<td colspan="3" align="left" class="iRg_line">'.text_lostpwd_t19.':</td>
			</tr>
			<tr>
			<td align="left" class="iRg_text" style="padding-left: 24px;" width="130">'.text_lostpwd_t20.'</td>
			<td align="left" class="iRg_inf"><input class="iRg_input" type="text" name="userid" id="userid" maxlength="12"></td>
			<td align="left" ><span class="iRg_inf"><div id="c_uss">'.text_lostpwd_t21.'</div></span></td>
			</tr>
			<tr>
<td colspan="3" align="left" class="iRg_line">'.text_lostpwd_t17.':</td>
</tr>
			<tr>
<td align="left" colspan="3"> 
<table border="0" cellspacing="0" cellpadding="0" width="100%">
<tr>
<td align="left"><img src="get.php?aI" border="0"></td>
<td align="left" class="iRg_inf"><div align="left" style="padding-bottom: 4px;">'.text_lostpwd_t18.'</div><input class="iRg_input" type="text" name="verify_int" id="verify_int"></td>
</tr>
</table>
</td>
</tr>
			</table>
			<input type="hidden" name="proccess_password">
			
			<table border="0" cellspacing="10" cellpadding="0" width="100%"  align="center">
			<tr>
			<td align="right"><input type="button" class="btn btn-success" value="Aceptar" onclick="submit()"></td>
			<td align="left"><input type="button" class="btn btn-danger" value="Cancelar" onclick="location.href=\''.$core['config']['website_url'].'\'"></td>
			</table>
			</form>';
			}
		break;
		
		case '2':
				$verification_config = simplexml_load_file('engine/config_mods/human_verification.xml');
	if($verification_config->human_verification_type == 'reCAPTCHA'){
		$is_reCAPTCHA = '1';
		require_once('engine/recaptchalib.php');
		$privatekey = $verification_config->reCAPTCHA_private_key;
        $publickey = $verification_config->reCAPTCHA_public_key;

// respuesta vacía
$response = null;
 
// comprueba la clave secreta
$reCaptcha = new ReCaptcha($privatekey);

if ($_POST["g-recaptcha-response"]) {
$response = $reCaptcha->verifyResponse(
        $_SERVER["REMOTE_ADDR"],
        $_POST["g-recaptcha-response"]
    );
}
	}
	
			if(isset($_POST['proccess_password'])){
				require("engine/validate.php");
				$elems[] = array('name'=>'email_address', 'label'=>'You have entered an invalid  Email Address (ex. somebody@gmail.com)', 'type'=>'text', 'required'=>true, 'len_max'=>50, 'cont' => 'email');
				$f = new FormValidator($elems);
				$err = $f->validate($_POST);
				if ( $err === true ) {
					$valid = $f->getValidElems();
					foreach ( $valid as $k => $v ) {
						if ( $valid[$k][0][1] == false ) {
							if ( empty($valid[$k][0][2]) ) {
								echo  msg('0',$valid[$k][0][2]);
							}else{
								echo  msg('0',$valid[$k][0][2]);
							}
						}
					}
				} else {
					$email = safe_input($_POST['email_address'],'\_\@\.\-');
					
					if($is_reCAPTCHA == '1'){
			if ($response != null && $response->success) {
                    $bot_check = '0';
                }else{
                	$bot_check = '1';
                }
		}else{
			if($_SESSION['SID_code'] != md5($_POST['verify_int'])){
				$bot_check = '1';
			}
		}
		
		
					if($bot_check == '1'){
						echo msg('0',''.text_lostpwd_t2.'');
					}else{
						$chceck_mail = $core_db2->Execute("Select mail_addr,memb___id,memb_guid from MEMB_INFO where mail_addr=?",array($email));
						if($chceck_mail->EOF){
							echo  msg('0',''.text_lostpwd_t22.'');
						}else{
							$hash = md5(uniqid(microtime(),1));
							$insert_temp_password = $core_db->Execute("Insert INTO MUCore_temp_passwords (memb_guid,expire,hash,memb___id) VALUES (?,?,?,?)",array($chceck_mail->fields[2],(time()+86400),$hash,$chceck_mail->fields[1]));
							if($insert_temp_password){
								/*
								require("engine/smtp.php");
								
								$mail = new SMTP($get_config->smtp_server,$get_config->smtp_username,$get_config->smtp_password);
								$header = $mail->make_header($core['config']['master_mail'], $chceck_mail->fields[0],'Your login details for '.$core['config']['websitetitle'].'');
								$header .= "Content-Type: text/html; charset=\"iso-8859-1\" \r\n";
								$header .= "Content-Transfer-Encoding: 8bit \r\n";
								$header .= "MIME-Version: 1.0 \r\n";
								$mail->smtp_send($core['config']['master_mail'],$chceck_mail->fields[0], $header, $body
								*/
								
								$get_config = simplexml_load_file('engine/config_mods/smtp_settings.xml');
								
								$body = str_replace("{user_id}",$chceck_mail->fields[1],mail_lostpassword_t1);
								$body = str_replace("{reset_password_url}",$core['config']['website_url'].'/'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.LOSTPASSWORD_CMS_PAGE.'&hash='.$hash,$body);
								$body = str_replace("{website_title}",$core['config']['websitetitle'],$body);
							
								/*
								$body = 'Dear '.$chceck_mail->fields[1].',<br><br>
								You have requested to reset your password on '.$core['config']['websitetitle'].' because you have forgotten your password. If you did not request this, please ignore it. It will expire in 24 hours time.<br>
								<br>
								To reset your password, please visit the following page:<br>
								<a href="'.$core['config']['website_url'].'/'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.LOSTPASSWORD_CMS_PAGE.'&hash='.$hash.'">'.$core['config']['website_url'].'/'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.LOSTPASSWORD_CMS_PAGE.'&hash='.$hash.'</a><br><br>
								When you visit that page, your password will be reset, and the new password will be emailed to you.<br><br>
								Your username is: '.$chceck_mail->fields[1].'<br><br><br>
								All the best,<br>
								'.$core['config']['websitetitle'].' Team.';
								*/
								
								
								
								if($core['debug'] == '1'){
									define('DISPLAY_XPM4_ERRORS', true);
								}else{
									define('DISPLAY_XPM4_ERRORS', false);
								}
								
								
								
require("engine/phpmail/PHPMailerAutoload.php");

//Luego tenemos que iniciar la validación por SMTP:
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Host = $get_config->smtp_server; // SMTP a utilizar. Por ej. smtp.elserver.com
$mail->Username = $get_config->smtp_username; // Correo completo a utilizar
$mail->Password = $get_config->smtp_password; // Contraseña
$mail->Port = $get_config->smtp_port; // Puerto a utilizar

//Con estas pocas líneas iniciamos una conexión con el SMTP. Lo que ahora deberíamos hacer, es configurar el mensaje a enviar, el //From, etc.
$mail->From = $core['config']['master_mail']; // Desde donde enviamos (Para mostrar)
$mail->FromName = $core['config']['websitetitle'];

//Estas dos líneas, cumplirían la función de encabezado (En mail() usado de esta forma: “From: Nombre <correo@dominio.com>”) de //correo.
$mail->AddAddress($chceck_mail->fields[0]); // Esta es la dirección a donde enviamos
$mail->IsHTML(true); // El correo se envía como HTML
$mail->Subject = 'Your login details for '.$core['config']['websitetitle'].''; // Este es el titulo del email.
$mail->Body = $body; // Mensaje a enviar
$mail->Send(); // Envía el correo.

if(!$mail->send()) {
    echo msg('0',text_lostpwd_t25);
    echo msg('0','Mailer Error: ' . $mail->ErrorInfo);
} else {
    echo msg('1',text_lostpwd_t23); //Datos Enviados
}

							}else{
								echo msg('0',text_lostpwd_t24);
							}
						}
					}
				}
			}
			
			
			if(isset($_GET['hash'])){
				if(empty($_GET['hash'])){
					header('Location: '.$core['config']['website_url'].'');
				}else{
					$hash = safe_input(xss_clean($_GET['hash']),'');
					$check_hash = $core_db->Execute("Select memb_guid,id,memb___id from MUCore_temp_passwords where hash=?",array($hash));
					if($check_hash->EOF){
						header('Location: '.$core['config']['website_url'].'');
					}else{
						$new_password = get_rand_id('10');
						if($core['config']['md5'] == '1'){
							$update_password = $core_db2->Execute("Update MEMB_INFO set memb__pwd=[dbo].[fn_md5](?,?) where memb_guid=?",array($new_password,$check_hash->fields[2],$check_hash->fields[0]));
						}elseif ($core['config']['md5'] == '0'){
							$update_password = $core_db2->Execute("Update MEMB_INFO set memb__pwd=? where memb_guid=?",array($new_password,$check_hash->fields[0]));
						}
						if($update_password){
							$take_mail = $core_db2->Execute("Select mail_addr from MEMB_INFO where memb_guid=?",array($check_hash->fields[0]));
							/*
							$mail->smtp_send($core['config']['master_mail'],$take_mail->fields[0], $header, $body)
							
							    require("engine/smtp.php");
								
								$mail = new SMTP($get_config->smtp_server,$get_config->smtp_username,$get_config->smtp_password);
								$header = $mail->make_header($core['config']['master_mail'], $take_mail->fields[0],'Your new password for '.$core['config']['websitetitle'].'');
								$header .= "Content-Type: text/html; charset=\"iso-8859-1\" \r\n";
								$header .= "Content-Transfer-Encoding: 8bit \r\n";
								$header .= "MIME-Version: 1.0 \r\n";
								*/
							$body = str_replace("{user_id}",$chceck_mail->fields[1],mail_lostpassword_t2);
							$body = str_replace("{request_username}",$check_hash->fields[2],$body);
							$body = str_replace("{new_password}",$new_password,$body);
							$body = str_replace("{change_password_url}",$core['config']['website_url'].'/'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.USER_CMS_PAGE.'&'.USER_GET_PAGE.'='.ACCOUNTSETTINGS_CMS_USER,$body);
							$body = str_replace("{website_title}",$core['config']['websitetitle'],$body);
							
							/*
								$body = 'Dear '.$chceck_mail->fields[1].',<br><br>
								As you requested, your password has now been reset. Your new details are as follows:<br><br>
								Username: '.$check_hash->fields[2].'<br>
								Password: '.$new_password.'<br><br>
								To reset your password, please visit the following page:<br>
								<a href="'.$core['config']['website_url'].'/'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.USER_CMS_PAGE.'&'.USER_GET_PAGE.'='.ACCOUNTSETTINGS_CMS_USER.'">'.$core['config']['website_url'].'/'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.USER_CMS_PAGE.'&'.USER_GET_PAGE.'='.ACCOUNTSETTINGS_CMS_USER.'</a><br><br>
								All the best,<br>
								'.$core['config']['websitetitle'].' Team.';
								*/
								
								$get_config = simplexml_load_file('engine/config_mods/smtp_settings.xml');
								
								if($core['debug'] == '1'){
									define('DISPLAY_XPM4_ERRORS', true);
								}else{
									define('DISPLAY_XPM4_ERRORS', false);
								}
								
								
require("engine/phpmail/PHPMailerAutoload.php");

//Luego tenemos que iniciar la validación por SMTP:
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Host = $get_config->smtp_server; // SMTP a utilizar. Por ej. smtp.elserver.com
$mail->Username = $get_config->smtp_username; // Correo completo a utilizar
$mail->Password = $get_config->smtp_password; // Contraseña
$mail->Port = $get_config->smtp_port; // Puerto a utilizar

//Con estas pocas líneas iniciamos una conexión con el SMTP. Lo que ahora deberíamos hacer, es configurar el mensaje a enviar, el //From, etc.
$mail->From = $core['config']['master_mail']; // Desde donde enviamos (Para mostrar)
$mail->FromName = $core['config']['websitetitle'];

//Estas dos líneas, cumplirían la función de encabezado (En mail() usado de esta forma: “From: Nombre <correo@dominio.com>”) de //correo.
$mail->AddAddress($take_mail->fields[0]); // Esta es la dirección a donde enviamos
$mail->IsHTML(true); // El correo se envía como HTML
$mail->Subject = 'Your new password for '.$core['config']['websitetitle'].''; // Este es el titulo del email.
$mail->Body = $body; // Mensaje a enviar
$mail->Send(); // Envía el correo.

if(!$mail->send()) {
    echo msg('0',text_lostpwd_t25);
    echo msg('0','Mailer Error: ' . $mail->ErrorInfo);
} else {
$delete_hash = $core_db->Execute("Delete from MUCore_temp_passwords where id=?",array($check_hash->fields[1]));
echo '
			<table border="0" cellspacing="10" cellpadding="0" width="100%" style="margin-top: 10px; margin-bottom: 10px;" align="center">
			<tr>
			<td align="left" class="iRg_line">&nbsp;</td>
			</tr>
			<tr>
			<td align="center">'.text_lostpwd_t26.'</td>
			</tr>
			<tr>
			<td align="left" class="iRg_line_top">&nbsp;</td>
			</tr>
			</table>';
}
						}
						
					}
					
				}
				
			}else{
				$jq_cron = $core_db->Execute("Select next_cron from MUCore_Cron_Jobs where cron_id=?",array(trim($get_config->cron_job)));
				if(cron_check($jq_cron->fields[0]) == false){
					$jq_cron_up = $core_db->Execute("Update MUCore_Cron_Jobs set next_cron=(".time()."+cron_time_set) where cron_id=?",array(trim($get_config->cron_job)));
					$_get_temp_passwords = $core_db->Execute("Select id,expire from MUCore_temp_passwords order by expire asc");
					while (!$_get_temp_passwords->EOF){
						$temp_expire_pass_time = $_get_temp_passwords->fields[1]-time();
						if($temp_expire_pass_time <= 0){
							$delete_temp_pass = $core_db->Execute("Delete from MUCore_temp_passwords where id=?",array($_get_temp_passwords->fields[0]));
						}	
						$_get_temp_passwords->MoveNext();
	
					}
					
				
				}
				echo '<form name="sign_up_frm" method="post" action="">
			<table border="0" cellspacing="4" cellpadding="0" width="100%" style="margin-top: 10px;" align="center">
			<tr>
			<td colspan="2" align="left" class="iRg_line">'.text_lostpwd_t27.':</td>
			</tr>
			<tr>
			<td align="right" class="iRg_text">'.text_lostpwd_t28.'</td>
			<td align="center" class="iRg_inf">
			<input width="130" class="iRg_input" type="text" name="email_address" id="email_address" maxlength="50" placeholder="Email"></td>
			
			</tr>
			<tr>
<td colspan="2" align="left" class="iRg_line">'.text_lostpwd_t17.':</td>
</tr>
			<tr>
<td align="center" colspan="2"> ';
if($is_reCAPTCHA == '1'){
   	$publickey = $verification_config->reCAPTCHA_public_key;
   	echo '<div class="g-recaptcha" data-sitekey="'.$publickey.'"></div>';
    echo "<script src='https://www.google.com/recaptcha/api.js'></script>";
    echo '</td></tr></table>';

   }else{
   	 echo '</td></tr></table>
<table border="0" cellspacing="4" cellpadding="0" width="100%" align="center">
<tr>
	<td align="center" colspan="2"><img src="get.php?aI" border="0"></td>
</tr>
<tr>
<td align="right" class="iRg_text">'.text_lostpwd_t18.'</td>
<td align="center"><input width="130" class="iRg_input" type="text" name="verify_int" id="verify_int"></td>
</tr>
</table>';
   }				
				
				echo '
			<input type="hidden" name="proccess_password">
			
			<table border="0" cellspacing="10" cellpadding="0" width="100%"  align="center">
			<tr>
			<td align="right"><input type="button" class="btn btn-success" value="Aceptar" onclick="submit()"></td>
			<td align="left"><input type="button" class="btn btn-danger" value="Cancelar" onclick="location.href=\''.$core['config']['website_url'].'\'"></td>
			</table>
			</form>';
			}
			
		break;
	}
	
}
?>