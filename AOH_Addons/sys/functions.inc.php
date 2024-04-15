<?php

/* require('config.inc.php');*/
require('config.php');
$zCore_sqluser = $core['db_user'];
$zCore_sqlpass = $core['db_password'];
$zCore_base_datos = $core['db_name'];
$zCore_base_datosMuGen = $core['db_name'];
$zCore_base_datosWeb = $core['db_name'];
$zCore_servidorsql = $core['db_host'];
$zCore_['db_multi'] = "1";

//Set new database
if( $_SESSION['db_in_use'] == '' ) { $_SESSION['db_in_use'] = '1'; };
if( $_SESSION['db_in_use'] == '2' && $zCore_['db_multi'] == '1' ) { $_SESSION['db_in_use'] = '1'; };
if( $_SESSION['db_in_use'] == '3' && $zCore_['db_multi'] == '1' ) { $_SESSION['db_in_use'] = '1'; };
if( $_SESSION['db_in_use'] == '3' && $zCore_['db_multi'] == '2' ) { $_SESSION['db_in_use'] = '2'; };

if($_SESSION['db_in_use'] == '1') {$c_cnf_f = ''; $db_name_drop = $zCore_base_datos;}
elseif($_SESSION['db_in_use'] == '2') {$c_cnf_f = 'b'; $db_name_drop = $mvcore['db_name_2'];} 
elseif($_SESSION['db_in_use'] == '3') {$c_cnf_f = 'c'; $db_name_drop = $mvcore['db_name_3'];};

//adminCP page load save


//Config load
require('AOH_Addons/config_Webshop.php');
//end


$con_type = $core['connection_type']; // for future configs..


//CONECTORES
if($core['connection_type'] == "ODBC"){
	$core_db = &ADONewConnection('odbc');
	if($core['debug'] == 1){ $core_db->debug = true; }
	$core_db_connect_sql = $core_db->Connect($core['db_name'],$core['db_user'],$core['db_password'],$core['db_host']);
	if(!$core_db_connect_sql){
		$sql_part = '1';
		include('error_templates/sql_error.php');
		exit;
	}
	$core_db2 = $core_db;
	if($core['server_use_2_db'] == "1"){
		$core_db2 = &ADONewConnection('odbc');
		if($core['debug'] == 1){ $core_db2->debug = true; }
		$core_db_connect_sql2 = $core_db2->NConnect($core['db_name2'],$core['db_user2'],$core['db_password2'],$core['db_host2']);
		if(!$core_db_connect_sql2){
			$sql_part = '2';
			include('error_templates/sql_error.php');
			exit;
		}
		$core_db2 = $core_db2;
	}
}elseif ($core['connection_type'] == "MSSQL"){
	$core_db = &ADONewConnection('mssql');
	if($core['debug'] == 1){ $core_db->debug = true; }
	$core_db_connect_sql = $core_db->Connect($core['db_host'],$core['db_user'],$core['db_password'],$core['db_name']);
	if(!$core_db_connect_sql){
		$sql_part = '1';
		include('error_templates/sql_error.php');
		exit;
	}
	$core_db2 = $core_db;
	if($core['server_use_2_db'] == "1"){
		$core_db2 = &ADONewConnection('mssql');
		if($core['debug'] == 1){ $core_db2->debug = true; }
		$core_db_connect_sql2 = $core_db2->NConnect($core['db_host2'],$core['db_user2'],$core['db_password2'],$core['db_name2']);
		if(!$core_db_connect_sql2){
			$sql_part = '2';
			include('error_templates/sql_error.php');
			exit;
		}
		$core_db2 = $core_db2;
	}
}elseif ($core['connection_type'] == "PDO"){
    $core_db = ADONewConnection('pdo');
    if($core['debug'] == 1){ $core_db->debug = true; }
    $core_db_connect_sql = $core_db->PConnect('sqlsrv:server='.$core['db_host'].';database='.$core['db_name'].';',$core['db_user'],$core['db_password']);
    if(!$core_db_connect_sql){
        $sql_part = '1';
        include('error_templates/sql_error.php');
        exit;
    }
    $core_db2 = $core_db;
    if($core['server_use_2_db'] == "1"){
        $core_db2 = ADONewConnection('pdo');
        if($core['debug'] == 1){ $core_db2->debug = true; }
        $core_db_connect_sql2 = $core_db2->NConnect('sqlsrv:server='.$core['db_host2'].';database='.$core['db_name2'].';',$core['db_user2'],$core['db_password2']);
        if(!$core_db_connect_sql2){
            $sql_part = '2';
            include('error_templates/sql_error.php');
            exit;
        }
        $core_db2 = $core_db2;
    }
}
//FIN CONECTORES


//------------------------------------------------------------
//Experimental php script.......
if($mvcore['shop_disc'] == 'on') {
	
		$date_calc = $mvcore['shop_new_date'];
		
		if( time() >= $date_calc){
			
			//Do Process
				$mvcore['shop_disc_start'] = '1';
			//END
			
			//Set Timeout
				$time_nes = $date_calc + 3600;
			//END
				
			if( time() >= $time_nes ){
					$update_this = time() + $mvcore['shop_interv'] - 3600;

				$new_db = fopen("sys/configs".$c_cnf_f."/shop_drop_date.php", "w"); //configs patch 
				$data = "<?\n";
				$data .="\$mvcore['shop_new_date'] = \"".$update_this."\";\n";
				$data .="?>";
				fwrite($new_db,$data); fclose($new_db);
				//header("Refresh:0");
			};
		};
		
};
//------------------------------------------------------------


//Checking blocked accounts
$ip_gots = getUserIP();

//set time coutdown
function decode_time($s_t,$e_t,$type,$text){ 
	$difference = $e_t - $s_t; 
	$seconds = 0; 
	$hours = 0; 
	$minutes = 0; 
	
		if($difference % 86400 <= 0){ 
			$days = $difference / 86400; 
		};
		
		if($difference % 86400 > 0){ 
			$rest = ($difference % 86400); 
			$days = ($difference - $rest) / 86400; 
				if($rest % 3600 > 0){ 
					$rest_1 = ($rest % 3600); 
					$hours = ($rest - $rest_1) / 3600; 
						if($rest_1 % 60 > 0){ 
							$rest_2 = ($rest_1 % 60); 
							$minutes = ($rest_1 - $rest_2) / 60; 
							$seconds = $rest_2; 
						}else{
							$minutes = $rest_1 / 60; 
						}; 
				}
				else{ 
					$hours = $rest / 3600; 
				}; 
		};
		
		if($type == "short"){ 
			$time = (($days > 0) ? $days .' days ' : '' ). (($hours > 0 ) ? $hours .' h ' :'' ). (($minutes > 0 ) ? $minutes .' m ' :'' ). (($seconds > 0 ) ? $seconds .' s ' : ''). ((($seconds <= 0) AND ($minutes <= 0) AND ($hours <= 0) AND ($days <= 0)) ? $text : '');
		}
		else{ 
			$time = (($days > 0) ? $days .' days ' : '' ). (($hours > 0 ) ? $hours .' hours ' :'' ). (($minutes > 0 ) ? $minutes .' minutes ' :'' ). (($seconds > 0 ) ? $seconds .' seconds ' : ''). ((($seconds <= 0) AND ($minutes <= 0) AND ($hours <= 0) AND ($days <= 0)) ? $text : '');
		};
	return $time; 
}

function clean_variable($var)
{
	$newvar = preg_replace('/[^a-zA-Z0-9\_\?\-\@\ \!\>\<\=\"\#\|\$\%\:\;\^\/\\\+\-\&\*\(\)\`\.\}\{\]\[]/', '', $var);
	//$newvar = $var;
	return $newvar;
}

//check for client ip adress
function getUserIP()
{
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    return $ip;
}

//Character stats 65k fix
function Show65kStats($stat_value) { if ($stat_value < 0) { $stat_value = $stat_value  + 65536; return $stat_value; } return $stat_value; }

//Character class switch
function getClass($value) { switch ($value) { 
case 0: $gclass="Dark Wizard"; break;
case 1: $gclass="Soul Master"; break;
case 2: $gclass="Grand Master"; break;
case 3: $gclass="Grand Master"; break;
Case 16: $gclass="Dark Knight"; break;
case 17: $gclass="Blade Knight"; break;
case 18: $gclass="Blade Master"; break;
case 19: $gclass="Blade Master"; break;
Case 32: $gclass="Elf"; break;
case 33: $gclass="Muse Elf"; break;
case 34: $gclass="Hight Elf"; break;
case 35: $gclass="Hight Elf"; break;
Case 48: $gclass="Magic Gladiator"; break;
case 49: $gclass="Duel Master"; break;
case 50: $gclass="Duel Master"; break;
case 51: $gclass="Duel Master"; break;
Case 64: $gclass="Dark Lord"; break;
case 65: $gclass="Lord Emperor"; break;
case 66: $gclass="Lord Emperor"; break;
case 67: $gclass="Lord Emperor"; break;
Case 80: $gclass="Summoner"; break;
case 81: $gclass="Bloody Summoner"; break;
case 82: $gclass="Dimension Master"; break;
case 83: $gclass="Dimension Master"; break;
case 96: $gclass="Rage Fighter"; break;
case 97: $gclass="Fist Master"; break;
case 98: $gclass="Fist Master"; break;};

return $gclass;
};

//Character loccation switch
function getMap($value) { switch ($value) { 
case 0: $map="Lorencia"; break;
case 1: $map="Dungeon"; break;
case 2: $map="Devias"; break;
case 3: $map="Noria"; break;
case 4: $map="LostTower"; break;
case 5: $map="Exile"; break;
case 6: $map="Arena"; break;
case 7: $map="Atlans"; break;
case 8: $map="Tarkan"; break;
case 9: $map="DevilSquare"; break;
case 10: $map="Icarus"; break;
case 11: $map="BloodCastle1"; break;
case 12: $map="BloodCastle2"; break;
case 13: $map="BloodCastle3"; break;
case 14: $map="BloodCastle4"; break;
case 15: $map="BloodCastle5"; break;
case 16: $map="BloodCastle6"; break;
case 17: $map="BloodCastle7"; break;
case 52: $map="BloodCastle8"; break;
case 18: $map="ChaosCastle1"; break;
case 19: $map="ChaosCastle2"; break;
case 20: $map="ChaosCastle3"; break;
case 21: $map="ChaosCastle4"; break;
case 22: $map="ChaosCastle5"; break;
case 23: $map="ChaosCastle6"; break;
case 53: $map="ChaosCastle7"; break;
case 24: $map="Kalima1"; break;
case 25: $map="Kalima2"; break;
case 26: $map="Kalima3"; break;
case 27: $map="Kalima4"; break;
case 28: $map="Kalima5"; break;
case 29: $map="Kalima6"; break;
case 36: $map="Kalima7"; break;
case 30: $map="ValleyOfLoren"; break;
case 31: $map="LandOfTrial"; break;
case 40: $map="Silent"; break;
case 33: $map="Aida"; break;
case 34: $map="Crywolf"; break;
case 57: $map="Raklion"; break;
case 58: $map="Hatchery"; break;
case 51: $map="Elbeland"; break;
case 56: $map="Swamp"; break;
case 37: $map="Kantru1"; break;
case 38: $map="Kantru2"; break;
case 45: $map="Illusion Temple"; break;
case 39: $map="KantruTower"; break;
case 41: $map="Barracks"; break;
case 42: $map="Refuge"; break;
case 63: $map="Vulcanus"; break;
case 62: $map="Santa's Village"; break;
case 64: $map="DuelArena"; break;
case 79: $map="Loren Market"; break;
case 69: $map="Varka"; break;
case 80: $map="Kalrutan"; break;
case 81: $map="Kalrutan"; break;
};
return $map;
};

//Bad word check in post,get,cokie,request ( anti Inject )
$_REQUEST = clean_variable($_REQUEST);
$_POST = clean_variable($_POST);
$_GET = clean_variable($_GET);
$_COOKIE = clean_variable($_COOKIE);
$_SESSION = clean_variable($_SESSION);
$badwords = array("xp_cmdshell","EXEC","insert","INSERT","DROP", "SELECT", "UPDATE", "DELETE", "drop", "select", "update", "delete", "WHERE", "where");
foreach($_POST as $value)
foreach($badwords as $word)
if(substr_count($value, $word) > 0) {
header('Location: MVCore_News.html');};

foreach($_GET as $value)
foreach($badwords as $word)
if(substr_count($value, $word) > 0){
header('Location: MVCore_News.html');};

foreach($_COOKIE as $value)
foreach($badwords as $word)
if(substr_count($value, $word) > 0){
header('Location: MVCore_News.html');};

foreach($_REQUEST as $value)
foreach($badwords as $word)
if(substr_count($value, $word) > 0){
header('Location: MVCore_News.html');};
?>