<?
$get_config = simplexml_load_file('engine/config_mods/aoh_quest_manager.xml');
$verf_vip = $core_db->Execute("select Vip,VipTipe  from MEMB_INFO where memb___id=?",array($user_auth_id));
if ($get_config->active == '0') {
    echo msg('0', 'Sorry, this feature is temporarily unavailable at the moment.');
}else{

if(isset($_POST['change'])){
	echo '<div style="margin-top: 10px;">';
	$id = safe_input($_POST['name'],'');

		if(character_and_account($id,$user_auth_id) === false){
			header('Location: '.$core_run_script.'');
			exit();
		}else {
			if(account_online($user_auth_id) === true){
				echo msg('0',text_resetcharacter_t1);		
			}else{
				$ver_zen = $core_db->Execute("Select money from warehouse where AccountID=?",array($user_auth_id));
				$ver_resets = $core_db->Execute("Select ".AOH_Resets_column." from Character where mu_id=?",array($id));
				if($ver_zen->fields[0] < $get_config->precio) {
					echo msg('0', 'No tiene suficiente Zen en su Baul, intentelo luego.');
				}elseif($ver_resets->fields[0] < $get_config->resets) {
					echo msg('0', 'No tiene suficientes Resets, intentelo luego.');
				}else{
				$select_req = $core_db->Execute("Update warehouse set money=money-".$get_config->precio." where AccountID=?",array($user_auth_id));

switch ($_POST['quest']) {
	case 'cbbk':
		$code_quest = '0xAAF6FFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFF';
		break;
	
	case 'cbmg':
		$code_quest = '0xAAEAFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFF';
		break;

	case 'nova':
		$code_quest = '0xAAFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFF';
		break;
}

$Hace_el_reset= "UPDATE character SET 
Quest = $code_quest
where AccountID='$user_auth_id' and mu_id='$id'";

					$exc_reset_formula=$core_db->Execute($Hace_el_reset);
					if($exc_reset_formula){
						echo msg('1','Quest Realizada con Exito.');
					}else{
						echo msg('0',text_resetcharacter_t6);
					}
				}
			}
		}

	echo '</div>';
}



$select_characters = $core_db->Execute("Select mu_id,name,clevel,class,money,".AOH_Resets_column." from character where accountid=? order by clevel desc ",array($user_auth_id));

echo '
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Ejecutar Quest</h3>
  </div>
  <div class="panel-body panel-fix">
';
echo '<form action="" name="change" method="POST">
<table class="table">

  <tr>
  <td>Precio:</td>
  <td>'.$get_config->precio.' de Zen (Baul)</td
  </tr>
  <tr>
  <td>Resets Minimo:</td>
  <td>'.$get_config->resets.' Resets</td
  </tr>

  <tr>
  <td>Personaje</td>
  <td>
  <select class="form-control" name="name" id="name">';
		foreach ($select_characters as $nombre_char){
						echo '<option value="'.$nombre_char[0].'">'.$nombre_char[1].' - '.$characters_class[$nombre_char[3]][0].' - '.$nombre_char[5].' Resets</option>';
					
				}
		echo '</select></td
  </tr>

  <tr>
  <td>QUEST</td>
  <td>
  <select class="form-control" name="quest" id="quest">
	<option value="cbbk">QUEST Combo BK</option>
	<option value="cbmg">QUEST Combo MG</option>
	<option value="nova">Quest Nova(GM)</option>
	</select></td
  </tr>

<tr>
<td align="center" colspan="2">
<input type="hidden" name="change">
<input type="submit" class="btn btn-success btn-sm" value="Realizar QUEST">
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