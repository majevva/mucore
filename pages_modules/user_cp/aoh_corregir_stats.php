<?

$min_stats = '100';

if(isset($_GET['rid'])){
	echo '<div style="margin-top: 10px;">';
	$id = safe_input($_GET['rid'],'');
	if(empty($id) || !is_numeric($id)){
		header('Location: '.$core_run_script.'');
		exit();
	}else{
		if(character_and_account($id,$user_auth_id) === false){
			header('Location: '.$core_run_script.'');
			exit();
		}else {
			if(account_online($user_auth_id) === true){
				echo msg('0',text_resetcharacter_t1);		
			}else{
				$select_req = $core_db->Execute("select clevel,money,resets,leveluppoint,Strength,Dexterity,Vitality,Energy from character where mu_id=? and accountid=?",array($id,$user_auth_id));


				if(($select_req->fields[4] + $select_req->fields[5] + $select_req->fields[6] + $select_req->fields[7]) <= $min_stats){
					echo msg('0',str_replace("{min_stats}",number_format($min_stats),"Stats insuficientes para utilizar la opcion"));
					$no_reset = 1;
				}
				if($no_reset != '1'){
$Hace_el_reset= "UPDATE character SET 
LevelUpPoint=LevelUpPoint+Strength+Energy+Dexterity+Vitality,
Strength = 25,
Energy = 25,
Dexterity = 25,
Vitality = 25
where AccountID='$user_auth_id' and mu_id='$id'";

					$exc_reset_formula=$core_db->Execute($Hace_el_reset);
					if($exc_reset_formula){
						echo msg('1','Stats Corregidos Correctamente');
					}else{
						echo msg('0',text_resetcharacter_t6);
					}
				}
			}
		}
	}
	echo '</div>';
}



$select_characters = $core_db->Execute("Select mu_id,name,clevel,class,".AOH_Resets_column.",money,leveluppoint,Strength,Dexterity,Vitality,Energy from character where accountid=? order by clevel desc ",array($user_auth_id));

while (!$select_characters->EOF){
	if(($select_characters->fields[7] + $select_characters->fields[8] + $select_characters->fields[9] + $select_characters->fields[10]) <= $min_stats){
		$lacking_error = '<span class="label label-danger">'.str_replace("{levels}",($min_stats),"stats insuficientes").'</span>';
	
	}else{
		
		$lacking_error = '<input type="button" class="btn btn-primary btn-sm" value="Corregir Stats" onclick="location.href=\''.$core_run_script.'&rid='.$select_characters->fields[0].'\'">';
	}
		echo '
	<div class="panel panel-default panel-body-cont">
  <div class="panel-body panel-fix">
	<table class="table table-fix">';
	echo '
  <tr>
    <td width="66" rowspan="2"><img src="template/'.$core['config']['template'].'/images/class/'.decode_class($select_characters->fields[3],'2').'" width="66" height="66" title="Class"></td>
    <td align="left" class="iR_name" width="100">'.htmlentities($select_characters->fields[1]).'</td>
    <td align="left"><b>Level:</b>  '.$select_characters->fields[2].'</td>
    <td align="left"><b>LevelUpPoint:</b>  '.number_format($select_characters->fields[6]).'</td>
    <td align="left"><b>Resets:</b>  '.$select_characters->fields[4].'</td>
  </tr>
  <tr>
    <td algin="left">'.decode_class($select_characters->fields[3]).'</td>
    <td colspan="3" align="left">'.$lacking_error.'</td>
  </tr>	
  ';
echo '</table>
	</div>
</div>';	
	$select_characters->MoveNext();
}



?>