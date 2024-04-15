<?
$config_template = simplexml_load_file('template/'.$core['config']['template'].'/config/Config_Template.xml');


$Sdaaq1 = $core_db->Execute("SELECT count(*) FROM Guild");	 
$guild= $Sdaaq1->fields[0];
//
$Sdaaq2 = $core_db->Execute("SELECT count(*) FROM Character");	 
$charac = $Sdaaq2->fields[0];
//
$Sdaaq3 = $core_db2->Execute("SELECT count(*) FROM MEMB_INFO");	 
$cues= $Sdaaq3->fields[0];
//
$bannedchar = $core_db->Execute("SELECT count(*) FROM Character WHERE CtlCode='1'");
$bannchar = $bannedchar->fields[0];

//QUERRYS DE GENS
function GensContribution($Tipo) {
	global $core_db;
	$resulta = $core_db->Execute("SELECT SUM(".AOH_Gens_Contribution_Column.") as total FROM ".AOH_Gens_Table." WHERE ".AOH_Gens_Family_Column." = '$Tipo'"); 
	$rowa=$resulta->fields[0];

	return $rowa;
}

function GensTotalMembers($Tipo) {
	global $core_db;
	$totalgens1 = $core_db->Execute("SELECT count(*) FROM ".AOH_Gens_Table." WHERE ".AOH_Gens_Family_Column." = '$Tipo'");
	return $totalgens1->fields[0];
}

function GensTopMember($Tipo) {
	global $core_db;
	$topgens1= $core_db->Execute("select TOP 1 c.AccountId,c.name,g.".AOH_Gens_Contribution_Column." from character c, ".AOH_Gens_Table." g where c.Name=g.".AOH_Gens_Name_Column." and g.".AOH_Gens_Family_Column." = '$Tipo' order by g.".AOH_Gens_Contribution_Column." desc");
	$ftopgens1=$topgens1->fields[0];
	return $ftopgens1;
}
?>	