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

$tpl_user_online = $core_db->Execute("SELECT count(memb___id) FROM MEMB_STAT WHERE ConnectStat = '1'");
$tpl_user_online2 = $tpl_user_online->fields[0];

function CastleQuerry($Dato) {
	global $core_db;
$dados_query = $core_db->Execute("Select OWNER_GUILD,MONEY,TAX_RATE_CHAOS,TAX_RATE_STORE From MuCastle_DATA");
$dados = $dados_query->fields[$Dato];

return $dados;
}
function CastleInfoGuild($Nombre,$Dato) {
	global $core_db;
$dados_query = $core_db->Execute("Select G_Mark,G_Master,G_Score From Guild Where G_Name='$Nombre'");
$dados = $dados_query->fields[$Dato];
return $dados;
}
?>	