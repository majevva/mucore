<?
include ('AOH_Addons/config_reset_custom.php');

function Menu_ResetsCustom()
	{
		global $_ResetsCustom,$core_run_script;
		
		for($Menu = 0; $Menu < count($_ResetsCustom); $Menu++)
		{
			//$Return .= "<tr><td align=\"left\" colspan=\"2\">* <a  onclick=\"location.href='".$core_run_script."&cat=".$_ResetsCustom[$Menu][0]."\">Resetear de ".$_ResetsCustom[$Menu][2]." a ".$_ResetsCustom[$Menu][3]." Resets</a></td></tr>";

			$Return .= '<tr><td align="left" colspan="2">* <a class="label label-primary" onclick="location.href=\''.$core_run_script.'&cat='.$_ResetsCustom[$Menu][0].'\'">Resetear de '.$_ResetsCustom[$Menu][2].' a '.$_ResetsCustom[$Menu][3].' Resets</a></td></tr>';
		}
		return $Return;
	}

$Cat_Reset=$_GET['cat'];
$CategoriaReset=$_GET['cat'];
$load_reset_settings = simplexml_load_file('engine/config_mods/reset_character_settings.xml');
$active = trim($load_reset_settings->active);
if($active == '0'){
	echo msg('0',text_sorry_feature_disabled);
}else{
$reset_level = trim($_ResetsCustom[$Cat_Reset][1]);
$reset_zen  = trim($_ResetsCustom[$Cat_Reset][4]);
$reset_points = trim($_ResetsCustom[$Cat_Reset][5]);
$reset_points_formula = trim($load_reset_settings->bpoints_formula);

$reset_clear_skills = trim($load_reset_settings->clear_skills);
$reset_clear_inv = trim($load_reset_settings->clear_inv);
$reset_stats = trim($load_reset_settings->reset_stats);

$reset_limit0 = trim($_ResetsCustom[$Cat_Reset][2]);
$reset_limit = trim($_ResetsCustom[$Cat_Reset][3]);


$ResetCustom_Nivel=$_ResetsCustom[$Cat_Reset][1];
$ResetCustom_ResetMin=$_ResetsCustom[$Cat_Reset][2];
$ResetCustom_ResetMax=$_ResetsCustom[$Cat_Reset][3];
$ResetCustom_Precio=$_ResetsCustom[$Cat_Reset][4];
$ResetCustom_Puntos=$_ResetsCustom[$Cat_Reset][5];

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
				$select_req = $core_db->Execute("select clevel,money,".AOH_Resets_column.",leveluppoint from character where mu_id=? and accountid=?",array($id,$user_auth_id));
				if($select_req->fields[0] < $reset_level){
					echo msg('0',str_replace("{levels}",($reset_level - $select_req->fields[0]),text_resetcharacter_t2));
					$no_reset = 1;
				}
				if($select_req->fields[1] < $reset_zen){
					echo msg('0',str_replace("{zen}",number_format($reset_zen - $select_req->fields[1]),text_resetcharacter_t3));
					$no_reset = 1;
				}
				if($select_req->fields[2] < $reset_limit0 - 1){
					echo msg('0',str_replace("{resets_limit0}",number_format($reset_limit0),"Ud tiene menos de {resets_limit0} resets, use la opcion anterior"));
					$no_reset = 1;
				}
				if($select_req->fields[2] >= $reset_limit){
					echo msg('0',str_replace("{resets_limit}",number_format($reset_limit),"Maximo de resets alcanzado, use la siguiente opcion"));
					$no_reset = 1;
				}
				if($no_reset != '1'){
					
					//$exc_reset_formula=$core_db->Execute($reset_formula,array($new_bpoints,$new_money,$id));
//INICIA LAS FORMULAS - NO TOCAR
$sql_resets= $core_db->Execute("SELECT ".AOH_Resets_column." FROM Character WHERE mu_id='$id' and AccountID = '$user_auth_id'"); 
$resets = $sql_resets->fields[0]; 

if ($CategoriaReset==="0") {
$ResetCustom_PuntosExtras="0";
$pfinal="1";
$rfinal=$pfinal+$resets;

}elseif ($CategoriaReset==="1"){
$ResetCustom_ResetMax1=$_ResetsCustom[0][3];
$ResetCustom_Puntos1=$_ResetsCustom[0][5];
$ResetCustom_PuntosExtras=$ResetCustom_ResetMax1*$ResetCustom_Puntos1;

$pfinal00=$ResetCustom_ResetMax-1;
$rfinal00=$pfinal00-$resets;
$pfinal20=($ResetCustom_ResetMax+1)-$ResetCustom_ResetMin;
$rfinal=$pfinal20-$rfinal00;

}elseif ($CategoriaReset==="2"){
$ResetCustom_ResetMax1=$_ResetsCustom[0][3];
$ResetCustom_Puntos1=$_ResetsCustom[0][5];
$ResetCustom_PuntosExtras1=$ResetCustom_ResetMax1*$ResetCustom_Puntos1;

$MaxReset1=$_ResetsCustom[1][3];
$MinReset1=$_ResetsCustom[1][2]-1;
$DifReset1=$MaxReset1-$MinReset1;
$MultReset1=$DifReset1*$_ResetsCustom[1][5];

$ResetCustom_PuntosExtras=$MultReset1+$ResetCustom_PuntosExtras1;

$pfinal00=$ResetCustom_ResetMax-1;
$rfinal00=$pfinal00-$resets;
$pfinal20=($ResetCustom_ResetMax+1)-$ResetCustom_ResetMin;
$rfinal=$pfinal20-$rfinal00;

}elseif ($CategoriaReset==="3"){
$ResetCustom_ResetMax1=$_ResetsCustom[0][3];
$ResetCustom_Puntos1=$_ResetsCustom[0][5];
$ResetCustom_PuntosExtras1=$ResetCustom_ResetMax1*$ResetCustom_Puntos1;

$MaxReset1=$_ResetsCustom[1][3];
$MinReset1=$_ResetsCustom[1][2]-1;
$DifReset1=$MaxReset1-$MinReset1;
$MultReset1=$DifReset1*$_ResetsCustom[1][5];

$MaxReset2=$_ResetsCustom[2][3];
$MinReset2=$_ResetsCustom[2][2]-1;
$DifReset2=$MaxReset2-$MinReset2;
$MultReset2=$DifReset2*$_ResetsCustom[2][5];

$ResetCustom_PuntosExtras=$MultReset1+$MultReset2+$ResetCustom_PuntosExtras1;

$pfinal00=$ResetCustom_ResetMax-1;
$rfinal00=$pfinal00-$resets;
$pfinal20=($ResetCustom_ResetMax+1)-$ResetCustom_ResetMin;
$rfinal=$pfinal20-$rfinal00;

}elseif ($CategoriaReset==="4"){
$ResetCustom_ResetMax1=$_ResetsCustom[0][3];
$ResetCustom_Puntos1=$_ResetsCustom[0][5];
$ResetCustom_PuntosExtras1=$ResetCustom_ResetMax1*$ResetCustom_Puntos1;

$MaxReset1=$_ResetsCustom[1][3];
$MinReset1=$_ResetsCustom[1][2]-1;
$DifReset1=$MaxReset1-$MinReset1;
$MultReset1=$DifReset1*$_ResetsCustom[1][5];

$MaxReset2=$_ResetsCustom[2][3];
$MinReset2=$_ResetsCustom[2][2]-1;
$DifReset2=$MaxReset2-$MinReset2;
$MultReset2=$DifReset2*$_ResetsCustom[2][5];

$MaxReset3=$_ResetsCustom[3][3];
$MinReset3=$_ResetsCustom[3][2]-1;
$DifReset3=$MaxReset3-$MinReset3;
$MultReset3=$DifReset3*$_ResetsCustom[3][5];

$ResetCustom_PuntosExtras=$MultReset1+$MultReset2+$MultReset3+$ResetCustom_PuntosExtras1;

$pfinal00=$ResetCustom_ResetMax-1;
$rfinal00=$pfinal00-$resets;
$pfinal20=($ResetCustom_ResetMax+1)-$ResetCustom_ResetMin;
$rfinal=$pfinal20-$rfinal00;

}elseif ($CategoriaReset==="5"){
$ResetCustom_ResetMax1=$_ResetsCustom[0][3];
$ResetCustom_Puntos1=$_ResetsCustom[0][5];
$ResetCustom_PuntosExtras1=$ResetCustom_ResetMax1*$ResetCustom_Puntos1;

$MaxReset1=$_ResetsCustom[1][3];
$MinReset1=$_ResetsCustom[1][2]-1;
$DifReset1=$MaxReset1-$MinReset1;
$MultReset1=$DifReset1*$_ResetsCustom[1][5];

$MaxReset2=$_ResetsCustom[2][3];
$MinReset2=$_ResetsCustom[2][2]-1;
$DifReset2=$MaxReset2-$MinReset2;
$MultReset2=$DifReset2*$_ResetsCustom[2][5];

$MaxReset3=$_ResetsCustom[3][3];
$MinReset3=$_ResetsCustom[3][2]-1;
$DifReset3=$MaxReset3-$MinReset3;
$MultReset3=$DifReset3*$_ResetsCustom[3][5];

$MaxReset4=$_ResetsCustom[4][3];
$MinReset4=$_ResetsCustom[4][2]-1;
$DifReset4=$MaxReset4-$MinReset4;
$MultReset4=$DifReset4*$_ResetsCustom[4][5];

$ResetCustom_PuntosExtras=$MultReset1+$MultReset2+$MultReset3+$MultReset4+$ResetCustom_PuntosExtras1;

$pfinal00=$ResetCustom_ResetMax-1;
$rfinal00=$pfinal00-$resets;
$pfinal20=($ResetCustom_ResetMax+1)-$ResetCustom_ResetMin;
$rfinal=$pfinal20-$rfinal00;

}elseif ($CategoriaReset==="6"){
$ResetCustom_ResetMax1=$_ResetsCustom[0][3];
$ResetCustom_Puntos1=$_ResetsCustom[0][5];
$ResetCustom_PuntosExtras1=$ResetCustom_ResetMax1*$ResetCustom_Puntos1;

$MaxReset1=$_ResetsCustom[1][3];
$MinReset1=$_ResetsCustom[1][2]-1;
$DifReset1=$MaxReset1-$MinReset1;
$MultReset1=$DifReset1*$_ResetsCustom[1][5];

$MaxReset2=$_ResetsCustom[2][3];
$MinReset2=$_ResetsCustom[2][2]-1;
$DifReset2=$MaxReset2-$MinReset2;
$MultReset2=$DifReset2*$_ResetsCustom[2][5];

$MaxReset3=$_ResetsCustom[3][3];
$MinReset3=$_ResetsCustom[3][2]-1;
$DifReset3=$MaxReset3-$MinReset3;
$MultReset3=$DifReset3*$_ResetsCustom[3][5];

$MaxReset4=$_ResetsCustom[4][3];
$MinReset4=$_ResetsCustom[4][2]-1;
$DifReset4=$MaxReset4-$MinReset4;
$MultReset4=$DifReset4*$_ResetsCustom[4][5];

$MaxReset5=$_ResetsCustom[5][3];
$MinReset5=$_ResetsCustom[5][2]-1;
$DifReset5=$MaxReset5-$MinReset5;
$MultReset5=$DifReset5*$_ResetsCustom[5][5];

$ResetCustom_PuntosExtras=$MultReset1+$MultReset2+$MultReset3+$MultReset4+$MultReset5+$ResetCustom_PuntosExtras1;

$pfinal00=$ResetCustom_ResetMax-1;
$rfinal00=$pfinal00-$resets;
$pfinal20=($ResetCustom_ResetMax+1)-$ResetCustom_ResetMin;
$rfinal=$pfinal20-$rfinal00;

}elseif ($CategoriaReset==="7"){
$ResetCustom_ResetMax1=$_ResetsCustom[0][3];
$ResetCustom_Puntos1=$_ResetsCustom[0][5];
$ResetCustom_PuntosExtras1=$ResetCustom_ResetMax1*$ResetCustom_Puntos1;

$MaxReset1=$_ResetsCustom[1][3];
$MinReset1=$_ResetsCustom[1][2]-1;
$DifReset1=$MaxReset1-$MinReset1;
$MultReset1=$DifReset1*$_ResetsCustom[1][5];

$MaxReset2=$_ResetsCustom[2][3];
$MinReset2=$_ResetsCustom[2][2]-1;
$DifReset2=$MaxReset2-$MinReset2;
$MultReset2=$DifReset2*$_ResetsCustom[2][5];

$MaxReset3=$_ResetsCustom[3][3];
$MinReset3=$_ResetsCustom[3][2]-1;
$DifReset3=$MaxReset3-$MinReset3;
$MultReset3=$DifReset3*$_ResetsCustom[3][5];

$MaxReset4=$_ResetsCustom[4][3];
$MinReset4=$_ResetsCustom[4][2]-1;
$DifReset4=$MaxReset4-$MinReset4;
$MultReset4=$DifReset4*$_ResetsCustom[4][5];

$MaxReset5=$_ResetsCustom[5][3];
$MinReset5=$_ResetsCustom[5][2]-1;
$DifReset5=$MaxReset5-$MinReset5;
$MultReset5=$DifReset5*$_ResetsCustom[5][5];

$MaxReset6=$_ResetsCustom[6][3];
$MinReset6=$_ResetsCustom[6][2]-1;
$DifReset6=$MaxReset6-$MinReset6;
$MultReset6=$DifReset6*$_ResetsCustom[6][5];

$ResetCustom_PuntosExtras=$MultReset1+$MultReset2+$MultReset3+$MultReset4+$MultReset5+$MultReset6+$ResetCustom_PuntosExtras1;

$pfinal00=$ResetCustom_ResetMax-1;
$rfinal00=$pfinal00-$resets;
$pfinal20=($ResetCustom_ResetMax+1)-$ResetCustom_ResetMin;
$rfinal=$pfinal20-$rfinal00;

}elseif ($CategoriaReset==="8"){
$ResetCustom_ResetMax1=$_ResetsCustom[0][3];
$ResetCustom_Puntos1=$_ResetsCustom[0][5];
$ResetCustom_PuntosExtras1=$ResetCustom_ResetMax1*$ResetCustom_Puntos1;

$MaxReset1=$_ResetsCustom[1][3];
$MinReset1=$_ResetsCustom[1][2]-1;
$DifReset1=$MaxReset1-$MinReset1;
$MultReset1=$DifReset1*$_ResetsCustom[1][5];

$MaxReset2=$_ResetsCustom[2][3];
$MinReset2=$_ResetsCustom[2][2]-1;
$DifReset2=$MaxReset2-$MinReset2;
$MultReset2=$DifReset2*$_ResetsCustom[2][5];

$MaxReset3=$_ResetsCustom[3][3];
$MinReset3=$_ResetsCustom[3][2]-1;
$DifReset3=$MaxReset3-$MinReset3;
$MultReset3=$DifReset3*$_ResetsCustom[3][5];

$MaxReset4=$_ResetsCustom[4][3];
$MinReset4=$_ResetsCustom[4][2]-1;
$DifReset4=$MaxReset4-$MinReset4;
$MultReset4=$DifReset4*$_ResetsCustom[4][5];

$MaxReset5=$_ResetsCustom[5][3];
$MinReset5=$_ResetsCustom[5][2]-1;
$DifReset5=$MaxReset5-$MinReset5;
$MultReset5=$DifReset5*$_ResetsCustom[5][5];

$MaxReset6=$_ResetsCustom[6][3];
$MinReset6=$_ResetsCustom[6][2]-1;
$DifReset6=$MaxReset6-$MinReset6;
$MultReset6=$DifReset6*$_ResetsCustom[6][5];

$MaxReset7=$_ResetsCustom[7][3];
$MinReset7=$_ResetsCustom[7][2]-1;
$DifReset7=$MaxReset7-$MinReset7;
$MultReset7=$DifReset7*$_ResetsCustom[7][5];

$ResetCustom_PuntosExtras=$MultReset1+$MultReset2+$MultReset3+$MultReset4+$MultReset5+$MultReset6+$MultReset7+$ResetCustom_PuntosExtras1;

$pfinal00=$ResetCustom_ResetMax-1;
$rfinal00=$pfinal00-$resets;
$pfinal20=($ResetCustom_ResetMax+1)-$ResetCustom_ResetMin;
$rfinal=$pfinal20-$rfinal00;

}elseif ($CategoriaReset==="9"){
$ResetCustom_ResetMax1=$_ResetsCustom[0][3];
$ResetCustom_Puntos1=$_ResetsCustom[0][5];
$ResetCustom_PuntosExtras1=$ResetCustom_ResetMax1*$ResetCustom_Puntos1;

$MaxReset1=$_ResetsCustom[1][3];
$MinReset1=$_ResetsCustom[1][2]-1;
$DifReset1=$MaxReset1-$MinReset1;
$MultReset1=$DifReset1*$_ResetsCustom[1][5];

$MaxReset2=$_ResetsCustom[2][3];
$MinReset2=$_ResetsCustom[2][2]-1;
$DifReset2=$MaxReset2-$MinReset2;
$MultReset2=$DifReset2*$_ResetsCustom[2][5];

$MaxReset3=$_ResetsCustom[3][3];
$MinReset3=$_ResetsCustom[3][2]-1;
$DifReset3=$MaxReset3-$MinReset3;
$MultReset3=$DifReset3*$_ResetsCustom[3][5];

$MaxReset4=$_ResetsCustom[4][3];
$MinReset4=$_ResetsCustom[4][2]-1;
$DifReset4=$MaxReset4-$MinReset4;
$MultReset4=$DifReset4*$_ResetsCustom[4][5];

$MaxReset5=$_ResetsCustom[5][3];
$MinReset5=$_ResetsCustom[5][2]-1;
$DifReset5=$MaxReset5-$MinReset5;
$MultReset5=$DifReset5*$_ResetsCustom[5][5];

$MaxReset6=$_ResetsCustom[6][3];
$MinReset6=$_ResetsCustom[6][2]-1;
$DifReset6=$MaxReset6-$MinReset6;
$MultReset6=$DifReset6*$_ResetsCustom[6][5];

$MaxReset7=$_ResetsCustom[7][3];
$MinReset7=$_ResetsCustom[7][2]-1;
$DifReset7=$MaxReset7-$MinReset7;
$MultReset7=$DifReset7*$_ResetsCustom[7][5];

$MaxReset8=$_ResetsCustom[8][3];
$MinReset8=$_ResetsCustom[8][2]-1;
$DifReset8=$MaxReset8-$MinReset8;
$MultReset8=$DifReset8*$_ResetsCustom[8][5];

$ResetCustom_PuntosExtras=$MultReset1+$MultReset2+$MultReset3+$MultReset4+$MultReset5+$MultReset6+$MultReset7+$MultReset8+$ResetCustom_PuntosExtras1;

$pfinal00=$ResetCustom_ResetMax-1;
$rfinal00=$pfinal00-$resets;
$pfinal20=($ResetCustom_ResetMax+1)-$ResetCustom_ResetMin;
$rfinal=$pfinal20-$rfinal00;
}
//TERMINA LAS FORUMLAS

$sql_raza= $core_db->Execute("SELECT class FROM Character WHERE mu_id='$id' and AccountID = '$user_auth_id'"); 
$raza = $sql_raza->fields[0]; 
if 
(($raza === 32) or ($raza === 33) or ($raza === 34)) { //ELFA
$CLASEMAPA="3";
$CORX="176";
$CORY="110";
}
elseif (($raza === 80) or ($raza === 81) or ($raza === 82)) { //Summoner
$CLASEMAPA="51";
$CORX="53";
$CORY="217";
}
else
{
$CLASEMAPA="0";
$CORX="135";
$CORY="135";
}

$puntos=$reset_points;
$Hace_el_reset= "UPDATE character SET 
CLEVEL=1,
".AOH_Resets_column."=".AOH_Resets_column."+1,
LevelUpPoint='$ResetCustom_PuntosExtras'+'$ResetCustom_Puntos'*$rfinal,
MONEY=MONEY-'$ResetCustom_Precio',
Experience = 1400,
Strength = 25,
Energy = 25,
Dexterity = 25,
Vitality = 25,
Leadership = (RESETS+1)*('$puntos'/4),
Life = 60,
MaxLife = 60,
Mana = 60,
MaxMana = 60,
MapNumber = '$CLASEMAPA',
MapPosX = '$CORX',
MapPosY = '$CORY',
MapDir = 1
where AccountID='$user_auth_id' and mu_id='$id'";

					$exc_reset_formula=$core_db->Execute($Hace_el_reset);
					if($exc_reset_formula){
						echo msg('1',text_resetcharacter_t5);
					}else{
						echo msg('0',text_resetcharacter_t6);
					}
				}
			}
		}
	}
	echo '</div>';
}

echo '
<div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">Elige la categoria de Reset a usar</h3>
  </div>
  <table class="table table-fix">
    '.Menu_ResetsCustom().'
  </table>
</div>
';
?>
<? //ESPECIFICACIONES DEL RESET
if($Cat_Reset!='') { 
?>
<?
echo'
<div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">'.text_resetcharacter_t8.'</h3>
  </div>
  <table class="table table-fix">
<tr>
<td align="left" width="30%" valign="top"><b>Reset Minimo:</b></td>
<td align="left">'.$_ResetsCustom[$Cat_Reset][2].'</td>
</tr>
<tr>
<td align="left"><b>Reset Maximo:</b></td>
<td align="left">'.$_ResetsCustom[$Cat_Reset][3].'</td>
</tr>
<tr>
<td align="left"><b>Nivel de Reset:</b></td>
<td align="left">'.$_ResetsCustom[$Cat_Reset][1].'</td>
</tr>
<tr>
<td align="left"><b>Precio en Zen:</b></td>
<td align="left">'.$_ResetsCustom[$Cat_Reset][4].'</td>
</tr>
<tr>
<td align="left"><b>Puntos por Reset:</b></td>
<td align="left">'.$_ResetsCustom[$Cat_Reset][5].'</td>
</tr>
  </table>
</div>
';

$select_characters = $core_db->Execute("Select mu_id,name,clevel,class,".AOH_Resets_column.",money,leveluppoint from character where accountid=? order by clevel desc ",array($user_auth_id));

?>
<? } 
//FINAL DE ESPECIFICACIONES
?>
<? //LISTA DE PERSONAJES
if($Cat_Reset!='') { 
?>
<?

while (!$select_characters->EOF){
	if($select_characters->fields[2] < $_ResetsCustom[$Cat_Reset][1] && $select_characters->fields[5] < $_ResetsCustom[$Cat_Reset][4]){
		$lacking_error = '<span class="label label-danger">'.str_replace("{levels}",($reset_level - $select_characters->fields[2]),str_replace("{zen}",number_format($reset_zen - $select_characters->fields[5]),text_resetcharacter_t16)).'</span>';
		
	}elseif ($select_characters->fields[2] < $_ResetsCustom[$Cat_Reset][1]){
		$lacking_error = '<span class="label label-danger">'.str_replace("{levels}",($_ResetsCustom[$Cat_Reset][1] - $select_characters->fields[2]),text_resetcharacter_t17).'</span>';
	}elseif ($select_characters->fields[4] < $_ResetsCustom[$Cat_Reset][2] - 1){
		$lacking_error = '<span class="label label-danger">'.str_replace("{resets_limit0}",number_format($_ResetsCustom[$Cat_Reset][2]-1),"Reset Minimo: {resets_limit0}, Utilice la categoria anterior").'</span>';
	}elseif ($select_characters->fields[4] >= $_ResetsCustom[$Cat_Reset][3]){
		$lacking_error = '<span class="label label-danger">'.str_replace("{resets_limit}",number_format($_ResetsCustom[$Cat_Reset][3]),"Reset Maximo: {resets_limit}, Utilice la siguiente categoria").'</span>';
	}elseif ($select_characters->fields[5] < $_ResetsCustom[$Cat_Reset][4]){
		$lacking_error = '<span class="label label-danger">'.str_replace("{zen}",number_format($_ResetsCustom[$Cat_Reset][4] - $select_characters->fields[5]),text_resetcharacter_t18).'</span>';
	}else{
		
		$lacking_error = '<input type="button" class="btn btn-primary btn-sm" value="'.button_reset_character.'" onclick="location.href=\''.$core_run_script.'&cat='.$Cat_Reset.'&rid='.$select_characters->fields[0].'\'">';
	}
	echo '
	<div class="panel panel-default panel-body-cont">
  <div class="panel-body panel-fix">
	<table class="table table-fix">';	
	echo '
  <tr>
    <td width="66" rowspan="2"><img src="template/'.$core['config']['template'].'/images/class/'.decode_class($select_characters->fields[3],'2').'" width="66" height="66" title="Class"></td>
    <td align="left" class="iR_name" width="100">'.htmlentities($select_characters->fields[1]).'</td>
    <td align="left"><b>Level:</b> '.$select_characters->fields[2].'</td>
    <td align="left"><b>Zen:</b> '.number_format($select_characters->fields[5]).'</td>
    <td align="left"><b>Resets:</b> '.$select_characters->fields[4].'</td>
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


}

?>
<? } 
//FINAL LISTA DE PERSONAJES
?>
