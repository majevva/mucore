<?
$get_config = simplexml_load_file('engine/config_mods/aoh_cambiar_nombre.xml');
$verf_vip = $core_db2->Execute("select ".AOH_VIP_column."  from ".AOH_VIP_Table." where ".AOH_VIP_user."=?",array($user_auth_id));
if ($get_config->active == '0') {
    echo msg('0', 'Sorry, this feature is temporarily unavailable at the moment.');
} elseif($get_config->vip == '1' and $verf_vip->fields[0] < 1) {
	echo msg('0', 'Necesita ser vip para Usar la opcion.');
}else{

if(isset($_POST['change'])){
	echo '<div style="margin-top: 10px;">';
	$id = safe_input($_POST['name'],'');
	$class = $_POST['newname'];

		if (strlen($class) < 4 or strlen($class) > 10){
			echo msg('0', 'El nombre debe tener: 4 - 10 caracteres.');
		}elseif(character_and_account($id,$user_auth_id) === false){
			header('Location: '.$core_run_script.'');
			exit();
		}else {
			if(account_online($user_auth_id) === true){
				echo msg('0',text_resetcharacter_t1);		
			}else{
				$ver_zen = $core_db->Execute("Select money from warehouse where AccountID=?",array($user_auth_id));
				if($ver_zen->fields[0] < $get_config->precio) {
					echo msg('0', 'No tiene suficiente Zen en su Baul, intentelo luego.');
				}else{
			
			function soloLetras($x){
  			if (preg_match("/^[0-9a-zA-Z_.~@!()-\[\]]+$/",$x)) {
  				$rpta= "1";
  			}
  			else{
  				$rpta= "0";
  			}
  			return $rpta;
			}

			if (soloLetras($class)=="0"){
				echo msg('0', 'Solo se permite: a-Z, [ ] . - _ ~ ( ) !');
			}else{
				$select_req = $core_db->Execute("Update warehouse set money=money-".$get_config->precio." where AccountID=?",array($user_auth_id));

				$buscar_name = $core_db->Execute("Select Name from Character where mu_id=?",array($id));
				$oldname=$buscar_name->fields[0];


				$query1= "UPDATE AccountCharacter set GameID1='$class' where GameID1='$oldname'";
				$query2= "UPDATE AccountCharacter set GameID2='$class' where GameID2='$oldname'";
				$query3= "UPDATE AccountCharacter set GameID3='$class' where GameID3='$oldname'";
				$query4= "UPDATE AccountCharacter set GameID4='$class' where GameID4='$oldname'";
				$query5= "UPDATE AccountCharacter set GameID5='$class' where GameID5='$oldname'";
				$query6= "UPDATE AccountCharacter set GameIDC='$class' where GameIDC='$oldname'";
				$query7= "UPDATE Guild SET G_Master='$class' where G_Master='$oldname'";
				$query8= "UPDATE GuildMember set Name='$class' where Name='$oldname'";
				$query9= "UPDATE character SET Name= '$class' where AccountID='$user_auth_id' and mu_id='$id'";



					$exc_query1=$core_db->Execute($query1);
					$exc_query2=$core_db->Execute($query2);
					$exc_query3=$core_db->Execute($query3);
					$exc_query4=$core_db->Execute($query4);
					$exc_query5=$core_db->Execute($query5);
					$exc_query6=$core_db->Execute($query6);
					$exc_query7=$core_db->Execute($query7);
					$exc_query8=$core_db->Execute($query8);
					$exc_query9=$core_db->Execute($query9);
					if($exc_query1 and $exc_query2){
						echo msg('1','Se ha cambiado el Nombre con exito.');
					}else{
						echo msg('0',text_resetcharacter_t6);
					}

			}
				
				}
			}
		}

	echo '</div>';
}



$select_characters = $core_db->Execute("Select mu_id,name,clevel,class,money from character where accountid=? order by clevel desc ",array($user_auth_id));

echo '
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Change Name</h3>
  </div>
  <div class="panel-body panel-fix">
';

echo '<form name="fmr_newname" action="" name="change" method="POST">
<table class="table">

  <tr>
  <td>Precio:</td>
  <td>'.$get_config->precio.' de Zen (Baul)</td
  </tr>

  <tr>
  <td>Personaje</td>
  <td>
  <select class="form-control" name="name" id="name">';
		foreach ($select_characters as $nombre_char){
						echo '<option value="'.$nombre_char[0].'">'.$nombre_char[1].' - '.$characters_class[$nombre_char[3]][0].'</option>';
					
				}
		echo '</select></td
  </tr>

  <tr>
  <td>Nuevo Nombre: </td>
  <td>
  	<input class="iRg_input" type="text" id="newname" name="newname" maxlength="10">
  </td
  </tr>
<tr>
<td align="center" colspan="2">
<input type="hidden" name="change">
<input type="submit" class="btn btn-success btn-sm" value="Cambiar Nombre">
</td>
</tr>

</table>
</form>
';
echo '</div>
</div>
';
}
?>