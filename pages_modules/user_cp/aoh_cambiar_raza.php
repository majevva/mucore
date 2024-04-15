<?
$get_config = simplexml_load_file('engine/config_mods/aoh_cambiar_raza.xml');
$verf_vip = $core_db2->Execute("select ".AOH_VIP_column."  from ".AOH_VIP_Table." where ".AOH_VIP_user."=?",array($user_auth_id));
if ($get_config->active == '0') {
    echo msg('0', 'Sorry, this feature is temporarily unavailable at the moment.');
} elseif($get_config->vip == '1' and $verf_vip->fields[0] < 1) {
	echo msg('0', 'Necesita ser vip para Usar la opcion.');
}else{

if(isset($_POST['change'])){
	echo '<div style="margin-top: 10px;">';
	$id = safe_input($_POST['name'],'');
	$class = safe_input($_POST['class'],'');

		if(character_and_account($id,$user_auth_id) === false){
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
				$select_req = $core_db->Execute("Update warehouse set money=money-".$get_config->precio." where AccountID=?",array($user_auth_id));


$Hace_el_reset= "UPDATE character SET 
Class= '$class'
where AccountID='$user_auth_id' and mu_id='$id'";

					$exc_reset_formula=$core_db->Execute($Hace_el_reset);
					if($exc_reset_formula){
						echo msg('1','Se ha cambiado la raza con exito.');
					}else{
						echo msg('0',text_resetcharacter_t6);
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
    <h3 class="panel-title">Change Class</h3>
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
  <td>Personaje</td>
  <td>
  <select class="form-control" name="name" id="name">';
		foreach ($select_characters as $nombre_char){
						echo '<option value="'.$nombre_char[0].'">'.$nombre_char[1].' - '.$characters_class[$nombre_char[3]][0].'</option>';
					
				}
		echo '</select></td
  </tr>

  <tr>
  <td>Nueva Raza: </td>
  <td>
  	<select name="class" class="form-control">
	<option value="x">Choose a class</option>
	<optgroup label="---------------">
		';
				foreach ($characters_class as $class_id => $class_name){
					if($info->fields[4] == $class_id){
						echo '<option value="'.$class_id.'" selected="selected">'.$class_name[0].'</option>';
						
					}else{
						echo '<option value="'.$class_id.'">'.$class_name[0].'</option>';
					}
					
				}
				echo '</select>
  </td
  </tr>
<tr>
<td align="center" colspan="2">
<input type="hidden" name="change">
<input type="submit" class="btn btn-success btn-sm" value="Cambiar Raza">
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