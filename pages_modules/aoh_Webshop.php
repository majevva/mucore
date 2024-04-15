<?
$get_config = simplexml_load_file('engine/config_mods/aoh_Webshop.xml');
if ($get_config->active == '0') {
    echo msg('0', 'Sorry, this feature is temporarily unavailable at the moment.');
} else { 
?>

<? include('AOH_Addons/config_Webshop.php'); ?>
<link href="AOH_Addons/css/style_inventory.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="AOH_Addons/js/ajax.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>

  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <script type="text/javascript">
  var jQuery_1_11_4 = $.noConflict(true);
  </script>
<script>

  function itemClicked(iName, iId, iCat, iExc, iRefin, iSk, iAnc, iAd, iSkill, iLuck, iLevel, linkData) {
    
    var xmlhttp;
    if (window.XMLHttpRequest) { xmlhttp=new XMLHttpRequest(); }
    else { xmlhttp=new ActiveXObject("Microsoft.XMLHTTP"); } xmlhttp.onreadystatechange=function() { if (xmlhttp.readyState==4 && xmlhttp.status==200)
    { jQuery_1_11_4( "#dropitemhtmlssd" ).html(xmlhttp.responseText);

jQuery_1_11_4("#dropitemhtmls").dialog({
                        width: '670',
                        modal: true,
                        autoOpen: true,
                        draggable: true,
                        resizable: false,
            close: function(event, ui){ 
                                  jQuery_1_11_4(this).dialog('destroy'); 
                                  jQuery_1_11_4('#dropitemhtmls').remove();
            }
                 });

         } }
    xmlhttp.open("GET","shop.php?" + "name=" + iName  + "&ids=" + iId  + "&cat=" + iCat + "&exc=" + iExc + "&refin=" + iRefin + "&sk=" + iSk + "&anc=" + iAnc + "&ad=" + iAd + "&skill=" + iSkill + "&luck=" + iLuck + "&level=" + iLevel + "&linkdata=" + linkData,true); xmlhttp.send();

  }

</script>
<?
function generateRandomString($length = 8) {
    $characters = '0123456789ABCDE';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function itemslot($whbin, $itemX, $itemY)
{
    global $core_db;
    if (substr($whbin, 0, 2) == '0x')
        $whbin = substr($whbin, 2);
    $items  = str_repeat('0', 120);
    $itemsm = str_repeat('1', 120);
    $i      = 0;
    while ($i < 120) {
        $_item = substr($whbin, (32 * $i), 32);
        $type  = hexdec(substr($_item, 18, 1));
        $query = $core_db->Execute("select top 1 x,y from wshopp where id='" . hexdec(substr($_item, 0, 2)) . "' and cat='" . $type . "'");
        $query = $query->fetchrow();
        $y     = 0;
        while ($y < $query[1]) {
            $y++;
            $x = 0;
            while ($x < $query[0]) {
                $items = substr_replace($items, '1', ($i + $x) + (($y - 1) * 8), 1);
                $x++;
            }
        }
        $i++;
    }
    $y = 0;
    while ($y < $itemY) {
        $y++;
        $x = 0;
        while ($x < $itemX) {
            $x++;
            $spacerq[$x + (8 * ($y - 1))] = true;
        }
    }
    $walked = 0;
    $i      = 0;
    while ($i < 120) {
        if (isset($spacerq[$i])) {
            $itemsm = substr_replace($itemsm, '0', $i - 1, 1);
            $last   = $i;
            $walked++;
        }
        if (@$walked == count($spacerq))
            $i = 119;
        $i++;
    }
    $useforlength     = substr($itemsm, 0, $last);
    $findslotlikethis = '^' . str_replace('++', '+', str_replace('1', '+[0-1]+', $useforlength));
    $i                = 0;
    $nx               = 0;
    $ny               = 0;
    while ($i < 120) {
        if ($nx == 8) {
            $ny++;
            $nx = 0;
        }
        if ((eregi($findslotlikethis, substr($items, $i, strlen($useforlength)))) && ($itemX + $nx < 9) && ($itemY + $ny < 16))
            return $i;
        $i++;
        $nx++;
    }
    return 1337;
}



$Character = $_SESSION["Web_ManageChar"];
		$id = $Character;
		$zcore=$_GET['zcore'];
		$zcore_tipo=$_GET['zcoretp'];
		$useracc = $user_auth_id; // Get Loged In Username
		$useracc22 = $user_auth_id; // Get Loged In Username
		
		if($_GET["cmd"] == TRUE)
		{
		//parte 1
		if($zcore==="buy_item") {
//main functions
$item_level = $_POST['item_level']; // 0 = nothing
$item_luck = $_POST['item_luck']; // 0 = nothing
$item_opt = $_POST['item_opt']; // 0 = nothing
$item_skill = $_POST['item_skill']; // 0 = nothing
$item_ref = $_POST['item_ref']; // 0 = nothing
$item_harm = $_POST['item_harm']; // na = nothing
$item_anc = $_POST['item_anc']; // na = nothing
$item_exe1 = $_POST['exe1']; // 0 = nothing
$item_exe2 = $_POST['exe2']; // 0 = nothing
$item_exe3 = $_POST['exe3']; // 0 = nothing
$item_exe4 = $_POST['exe4']; // 0 = nothing
$item_exe5 = $_POST['exe5']; // 0 = nothing
$item_exe6 = $_POST['exe6']; // 0 = nothing
$is_fenrir1 = $_POST['fenrir1']; //  = nothing

if($mvcore['socket_type'] == 'scfmt'){
$item_socket1 = $_POST['socket1'] + 1; // 255 = Empty Socket
$item_socket2 = $_POST['socket2'] + 1; // 255 = Empty Socket
$item_socket3 = $_POST['socket3'] + 1; // 255 = Empty Socket
$item_socket4 = $_POST['socket4'] + 1; // 255 = Empty Socket
$item_socket5 = $_POST['socket5'] + 1; // 255 = Empty Socket
} else {
$item_socket1 = $_POST['socket1']; // 254 = Empty Socket
$item_socket2 = $_POST['socket2']; // 254 = Empty Socket
$item_socket3 = $_POST['socket3']; // 254 = Empty Socket
$item_socket4 = $_POST['socket4']; // 254 = Empty Socket
$item_socket5 = $_POST['socket5']; // 254 = Empty Socket
}



$check_item_data = $core_db->Execute("Select name, cost, cost_zen, pay_type_gc, pay_type_c, pay_type_zen, harmony, bought_times, item_exc_type, id, cat, x, y, dur, sk from wshopp where name='".$_POST['buy_item']."'");
$check_item_dat = $check_item_data;

$select_joh_info= $core_db->Execute("Select joh_id, joh_val from wshopp_harmony where joh_name='".$item_harm."'");
$check_joh_info = $select_joh_info;

//Item Cost calculate
if($item_anc == '5'){
$c_anc = $mvcore['cost_anc1'];
$c_zen_anc = $mvcore['cost_anc1'] * $mvcore['cost_cred_to_zen'];
} elseif ($item_anc == '10') {
$c_anc = $mvcore['cost_anc2'];
$c_zen_anc = $mvcore['cost_anc2'] * $mvcore['cost_cred_to_zen'];
}


	if($item_harm == 'na') { $har_opt='0'; } else {
		$select_joh_info= $core_db->Execute("Select joh_id, joh_val, joh_cost from wshopp_harmony where joh_name='".$item_harm."'");
		$check_joh_info = $select_joh_info;
		$har_opt = ''.$check_joh_info->fields[2].'';
		$har_opt_zen = $check_joh_info->fields[2] * $mvcore['cost_cred_to_zen'];
	}

if($mvcore['socket_type'] == 'scfmt'){
	$item_sockets1 = $item_socket1 - 1;
	if($item_sockets1 == '254' || $item_sockets1 == '255' || $item_sockets1 == '') { $socket_i1_item = '0'; } else {
		$select_soc_info= $core_db->Execute("Select sok_id, sok_name, type, sok_cost from wshopp_socket where sok_id='".$item_sockets1."'");
		$check_soc_info = $select_soc_info;
		$socket_i1_item = $check_soc_info->fields[3] ;
		$socket_i1_item_zen = $check_soc_info->fields[3] * $mvcore['cost_cred_to_zen'];
	}
	$item_sockets2 = $item_socket2 - 1;
	if($item_sockets2 == '254' || $item_sockets2 == '255' || $item_sockets2 == '') { $socket_i2_item = '0'; } else {
		$select_soc_info= $core_db->Execute("Select sok_id, sok_name, type, sok_cost from wshopp_socket where sok_id='".$item_sockets2."'");
		$check_soc_info = $select_soc_info;
		$socket_i2_item = $check_soc_info->fields[3] ;
		$socket_i2_item_zen = $check_soc_info->fields[3] * $mvcore['cost_cred_to_zen'];
	}
	$item_sockets3 = $item_socket3 - 1;
	if($item_sockets3 == '254' || $item_sockets3 == '255' || $item_sockets3 == '') { $socket_i3_item = '0'; } else {
		$select_soc_info= $core_db->Execute("Select sok_id, sok_name, type, sok_cost from wshopp_socket where sok_id='".$item_sockets3."'");
		$check_soc_info = $select_soc_info;
		$socket_i3_item = $check_soc_info->fields[3] ;
		$socket_i3_item_zen = $check_soc_info->fields[3] * $mvcore['cost_cred_to_zen'];
	}
	$item_sockets4 = $item_socket4 - 1;
	if($item_sockets4 == '254' || $item_sockets4 == '255' || $item_sockets4 == '') { $socket_i4_item = '0'; } else {
		$select_soc_info= $core_db->Execute("Select sok_id, sok_name, type, sok_cost from wshopp_socket where sok_id='".$item_sockets4."'");
		$check_soc_info = $select_soc_info;
		$socket_i4_item = $check_soc_info->fields[3] ;
		$socket_i4_item_zen = $check_soc_info->fields[3] * $mvcore['cost_cred_to_zen'];
	}
	$item_sockets5 = $item_socket5 - 1;
	if($item_sockets5 == '254' || $item_sockets5 == '255' || $item_sockets5 == '') { $socket_i5_item = '0'; } else {
		$select_soc_info= $core_db->Execute("Select sok_id, sok_name, type, sok_cost from wshopp_socket where sok_id='".$item_sockets5."'");
		$check_soc_info = $select_soc_info;
		$socket_i5_item = $check_soc_info->fields[3] ;
		$socket_i5_item_zen = $check_soc_info->fields[3] * $mvcore['cost_cred_to_zen'];
	}
} else {
	if($item_socket1 == '254' || $item_socket1 == '255' || $item_socket1 == '') { $socket_i1_item = '0'; } else {
		$select_soc_info= $core_db->Execute("Select sok_id, sok_name, type, sok_cost from wshopp_socket where sok_id='".$item_socket1."'");
		$check_soc_info = $select_soc_info;
		$socket_i1_item = $check_soc_info->fields[3] ;
		$socket_i1_item_zen = $check_soc_info->fields[3] * $mvcore['cost_cred_to_zen'];
	}
	
	if($item_socket2 == '254' || $item_socket2 == '255' || $item_socket2 == '') { $socket_i2_item = '0'; } else {
		$select_soc_info= $core_db->Execute("Select sok_id, sok_name, type, sok_cost from wshopp_socket where sok_id='".$item_socket2."'");
		$check_soc_info = $select_soc_info;
		$socket_i2_item = $check_soc_info->fields[3] ;
		$socket_i2_item_zen = $check_soc_info->fields[3] * $mvcore['cost_cred_to_zen'];
	}
	
	if($item_socket3 == '254' || $item_socket3 == '255' || $item_socket3 == '') { $socket_i3_item = '0'; } else {
		$select_soc_info= $core_db->Execute("Select sok_id, sok_name, type, sok_cost from wshopp_socket where sok_id='".$item_socket3."'");
		$check_soc_info = $select_soc_info;
		$socket_i3_item = $check_soc_info->fields[3] ;
		$socket_i3_item_zen = $check_soc_info->fields[3] * $mvcore['cost_cred_to_zen'];
	}
	
	if($item_socket4 == '254' || $item_socket4 == '255' || $item_socket4 == '') { $socket_i4_item = '0'; } else {
		$select_soc_info= $core_db->Execute("Select sok_id, sok_name, type, sok_cost from wshopp_socket where sok_id='".$item_socket4."'");
		$check_soc_info = $select_soc_info;
		$socket_i4_item = $check_soc_info->fields[3] ;
		$socket_i4_item_zen = $check_soc_info->fields[3] * $mvcore['cost_cred_to_zen'];
	}
	
	if($item_socket5 == '254' || $item_socket5 == '255' || $item_socket5 == '') { $socket_i5_item = '0'; } else {
		$select_soc_info= $core_db->Execute("Select sok_id, sok_name, type, sok_cost from wshopp_socket where sok_id='".$item_socket5."'");
		$check_soc_info = $select_soc_info;
		$socket_i5_item = $check_soc_info->fields[3] ;
		$socket_i5_item_zen = $check_soc_info->fields[3] * $mvcore['cost_cred_to_zen'];
	}
}

if($item_exe1 > '0'){
$c_exe1 = $mvcore['cost_exe'];
$c_zen_exe1 = $mvcore['cost_exe'] * $mvcore['cost_cred_to_zen'];
}
if($item_exe2 > '0'){
$c_exe2 = $mvcore['cost_exe'];
$c_zen_exe2 = $mvcore['cost_exe'] * $mvcore['cost_cred_to_zen'];
}
if($item_exe3 > '0'){
$c_exe3 = $mvcore['cost_exe'];
$c_zen_exe3 = $mvcore['cost_exe'] * $mvcore['cost_cred_to_zen'];
}
if($item_exe4 > '0'){
$c_exe4 = $mvcore['cost_exe'];
$c_zen_exe4 = $mvcore['cost_exe'] * $mvcore['cost_cred_to_zen'];
}
if($item_exe5 > '0'){
$c_exe5 = $mvcore['cost_exe'];
$c_zen_exe5 = $mvcore['cost_exe'] * $mvcore['cost_cred_to_zen'];
}
if($item_exe6 > '0'){
$c_exe6 = $mvcore['cost_exe'];
$c_zen_exe6 = $mvcore['cost_exe'] * $mvcore['cost_cred_to_zen'];
}

if($is_fenrir1 == '1'){
$c_fenrir1 = $mvcore['cost_fenblack'];
$c_zen_fenrir1 = $mvcore['cost_fenblack'] * $mvcore['cost_cred_to_zen'];
}
if($is_fenrir1 == '2'){
$c_fenrir2 = $mvcore['cost_fenblue'];
$c_zen_fenrir2 = $mvcore['cost_fenblue'] * $mvcore['cost_cred_to_zen'];
}
if($is_fenrir1 == '4'){
$c_fenrir3 = $mvcore['cost_fengold'];
$c_zen_fenrir3 = $mvcore['cost_fengold'] * $mvcore['cost_cred_to_zen'];
}

if($item_level > '0'){
$c_level = $mvcore['cost_level'] * $item_level;
$c_zen_level = $mvcore['cost_level'] * $item_level * $mvcore['cost_cred_to_zen'];
}
if($item_luck > '0'){
$c_luck = $mvcore['cost_luck'];
$c_zen_luck = $mvcore['cost_luck'] * $mvcore['cost_cred_to_zen'];
}
if($item_skill > '0'){
	$c_skill = $mvcore['cost_skill'];
	$c_zen_skill = $mvcore['cost_skill'] * $mvcore['cost_cred_to_zen'];
}
if($item_ref > '0'){
	$c_ref = $mvcore['cost_ref'];
	$c_zen_ref = $mvcore['cost_ref'] * $mvcore['cost_cred_to_zen'];
}
if($item_opt > '0'){
$c_opt = $mvcore['cost_opt'] * $item_opt;
$c_zen_opt = $mvcore['cost_opt'] * $item_opt * $mvcore['cost_cred_to_zen'];
}

//total item cost
$convert_to_zen = $check_item_dat->fields[1] * $mvcore['cost_cred_to_zen'];
$item_cost_zen = $convert_to_zen + $c_zen_fenrir1 + $c_zen_fenrir2 + $c_zen_fenrir3 + $c_zen_level + $c_zen_luck + $c_zen_opt + $c_zen_skill + $c_zen_ref + $c_zen_exe1 + $c_zen_exe2 + $c_zen_exe3 + $c_zen_exe4 + $c_zen_exe5 + $c_zen_exe6 + $socket_i1_item_zen + $socket_i2_item_zen + $socket_i3_item_zen + $socket_i4_item_zen + $socket_i5_item_zen + $c_zen_anc + $har_opt_zen; // Zen

$item_cost_cred = $check_item_dat->fields[1] + $c_fenrir1 + $c_fenrir2 + $c_fenrir3 + $c_level + $c_luck + $c_opt + $c_skill + $c_ref + $c_exe1 + $c_exe2 + $c_exe3 + $c_exe4 + $c_exe5 + $c_exe6 + $socket_i1_item + $socket_i2_item + $socket_i3_item + $socket_i4_item + $socket_i5_item + $c_anc + $har_opt; // Tokens

$calc_into_gold = $item_cost_cred + ((- $mvcore['gold_dif'] * $item_cost_cred) / 100) ;


			$item_cost_zen = floor($item_cost_zen + ((- $mvcore['shop_perc'] * $item_cost_zen) / 100));
			$item_cost_cred = floor($item_cost_cred + ((- $mvcore['shop_perc'] * $item_cost_cred) / 100));
			$calc_into_gold = floor($calc_into_gold + ((- $mvcore['shop_perc'] * $calc_into_gold) / 100));


//check if player button click was normal.
if($zcore_tipo==="buygoldcred") { 
	$is_cost_type = '1'; 
	if($check_item_dat->fields[3] != '1') { 
		$has_error = '1';
		 exit('<div class="success-box" style="background: #fff;color: #000;padding: 10px;">You can not buy this item with '.$mvcore['money_name2'].'.</div>'); 
		}; 
	} elseif($zcore_tipo==="buycred") { 
		$is_cost_type = '2'; 
		if($check_item_dat->fields[4] != '1') { 
			$has_error = '1'; 
			exit('<div class="success-box" style="background: #fff;color: #000;padding: 10px;">You can not buy this item with '.$mvcore['money_name1'].'.</div>'); 
		}; 
	} elseif($zcore_tipo==="buyzen") { 
		$is_cost_type = '3'; 
		if($check_item_dat->fields[5] != '1') { 
			$has_error = '1'; 
			exit('<div class="success-box" style="background: #fff;color: #000;padding: 10px;">You can not buy this item with zen.</div>'); 
		}; 
	};
//end

//ID
if(strlen(dechex($check_item_dat->fields[9])) == '1') { $it_id = '0'.dechex($check_item_dat->fields[9]).''; } else { $it_id = ''.dechex($check_item_dat->fields[9]).''; }; //Fix id

//Option data
if($item_luck == '1') { $item_luck = '4'; } else { $item_luck = '0'; };
if($item_skill == '1') { $item_skill = '128'; } else { $item_skill = '0'; };
if($item_opt > '3') { $item_opt_add = '64'; } else { $item_opt_add = '0'; };
if($item_opt == '4') { $item_opt = '0'; } 
elseif($item_opt == '5' || $item_opt == '1') { $item_opt = '1'; }
elseif($item_opt == '6' || $item_opt == '2') { $item_opt = '2'; }
elseif($item_opt == '7' || $item_opt == '3') { $item_opt = '3'; };
$item_level_calc = $item_level * 8;
$optwo_count = $item_luck + $item_level_calc + $item_skill + $item_opt;
if(strlen(dechex($optwo_count)) == '1') { $optwo_count = '0'.dechex($optwo_count).''; } else { $optwo_count = dechex($optwo_count); }; //Fix opts

//Item Duration
$item_dur_c = $check_item_dat->fields[13];
if(strlen(dechex($item_dur_c)) == '1') { $item_dur_c = '0'.dechex($item_dur_c).''; } else { $item_dur_c = dechex($item_dur_c); }; //Fix Exc

//Random serial


//Exc option
if($item_exe1 == '1') { $item_exe1 = '1'; } else { $item_exe1 = '0'; };
if($item_exe2 == '2') { $item_exe2 = '2'; } else { $item_exe2 = '0'; };
if($item_exe3 == '3') { $item_exe3 = '4'; } else { $item_exe3 = '0'; };
if($item_exe4 == '4') { $item_exe4 = '8'; } else { $item_exe4 = '0'; };
if($item_exe5 == '5') { $item_exe5 = '16'; } else { $item_exe5 = '0'; };
if($item_exe6 == '6') { $item_exe6 = '32'; } else { $item_exe6 = '0'; };
$calc_item_exc = $item_opt_add + $item_exe1 + $item_exe2 + $item_exe3 + $item_exe4 + $item_exe5 + $item_exe6;

if($is_fenrir1 == '1') { $calc_item_exc = '1'; } elseif($is_fenrir1 == '2') { $calc_item_exc = '2'; } elseif($is_fenrir1 == '4') { $calc_item_exc = '4'; };

if(strlen(dechex($calc_item_exc)) == '1') { $calc_item_exc = '0'.dechex($calc_item_exc).''; } else { $calc_item_exc = dechex($calc_item_exc); }; //Fix Exc

//Ancient option
if($item_anc == '5') { $addhex = '05'; } elseif($item_anc == '10') { $addhex = '0A'; } else { $addhex = '00'; };

//Item Category
$item_cat_calc = $check_item_dat->fields[10] ;
if(strlen(dechex($item_cat_calc)) == '1') { $item_cat_calc = ''.dechex($item_cat_calc).''; } else { $item_cat_calc = dechex($item_cat_calc); }; //Fix cat

//item refinary
if($item_ref == '1') { $item_ref = '8'; } else { $item_ref = '0'; }; //refin

//Item harmony
$item_har_data = ''.dechex($check_joh_info->fields[0]).''.dechex($check_joh_info->fields[1]).'';

//Socket option
if(strlen(dechex($item_socket1)) == '1') { $item_socket1 = '0'.dechex($item_socket1).''; } else { $item_socket1 = dechex($item_socket1); }; //Fix sk
if(strlen(dechex($item_socket2)) == '1') { $item_socket2 = '0'.dechex($item_socket2).''; } else { $item_socket2 = dechex($item_socket2); }; //Fix sk
if(strlen(dechex($item_socket3)) == '1') { $item_socket3 = '0'.dechex($item_socket3).''; } else { $item_socket3 = dechex($item_socket3); }; //Fix sk
if(strlen(dechex($item_socket4)) == '1') { $item_socket4 = '0'.dechex($item_socket4).''; } else { $item_socket4 = dechex($item_socket4); }; //Fix sk
if(strlen(dechex($item_socket5)) == '1') { $item_socket5 = '0'.dechex($item_socket5).''; } else { $item_socket5 = dechex($item_socket5); }; //Fix sk

if($check_item_dat->fields[14] >= '1') {
	if($mvcore['socket_type'] == 'scfmt'){
		if($item_socket1 == '0' || $item_socket1 == '255' || $item_socket1 == '00') { $item_socket1 = dechex(255); } else { $item_socket1 = $item_socket1; }; //Fix sk2
		if($item_socket2 == '0' || $item_socket2 == '255' || $item_socket2 == '00') { $item_socket2 = dechex(255); } else { $item_socket2 = $item_socket2; }; //Fix sk2
		if($item_socket3 == '0' || $item_socket3 == '255' || $item_socket3 == '00') { $item_socket3 = dechex(255); } else { $item_socket3 = $item_socket3; }; //Fix sk2
		if($item_socket4 == '0' || $item_socket4 == '255' || $item_socket4 == '00') { $item_socket4 = dechex(255); } else { $item_socket4 = $item_socket4; }; //Fix sk2
		if($item_socket5 == '0' || $item_socket5 == '255' || $item_socket5 == '00') { $item_socket5 = dechex(255); } else { $item_socket5 = $item_socket5; }; //Fix sk2
	} else {
		if($item_socket1 == '254') { $item_socket1 = dechex(254); } else { $item_socket1 = $item_socket1; }; //Fix sk2
		if($item_socket2 == '254') { $item_socket2 = dechex(254); } else { $item_socket2 = $item_socket2; }; //Fix sk2
		if($item_socket3 == '254') { $item_socket3 = dechex(254); } else { $item_socket3 = $item_socket3; }; //Fix sk2
		if($item_socket4 == '254') { $item_socket4 = dechex(254); } else { $item_socket4 = $item_socket4; }; //Fix sk2
		if($item_socket5 == '254') { $item_socket5 = dechex(254); } else { $item_socket5 = $item_socket5; }; //Fix sk2
	};
} else {
	if($item_socket1 == '0' || $item_socket1 == '254' || $item_socket1 == '00') { $item_socket1 = '00'; } else { $item_socket1 = $item_socket1; }; //Fix sk2
	if($item_socket2 == '0' || $item_socket2 == '254' || $item_socket2 == '00') { $item_socket2 = '00'; } else { $item_socket2 = $item_socket2; }; //Fix sk2
	if($item_socket3 == '0' || $item_socket3 == '254' || $item_socket3 == '00') { $item_socket3 = '00'; } else { $item_socket3 = $item_socket3; }; //Fix sk2
	if($item_socket4 == '0' || $item_socket4 == '254' || $item_socket4 == '00') { $item_socket4 = '00'; } else { $item_socket4 = $item_socket4; }; //Fix sk2
	if($item_socket5 == '0' || $item_socket5 == '254' || $item_socket5 == '00') { $item_socket5 = '00'; } else { $item_socket5 = $item_socket5; }; //Fix sk2	
};

if($mvcore['socket_type'] == 'scfmt'){
if($check_item_dat->fields[14] >= '1') { $item_socket1 = $item_socket1; } else { $item_socket1 = '00'; };
if($check_item_dat->fields[14] >= '2') { $item_socket2 = $item_socket2; } else { $item_socket2 = '00'; };
if($check_item_dat->fields[14] >= '3') { $item_socket3 = $item_socket3; } else { $item_socket3 = '00'; };
if($check_item_dat->fields[14] >= '4') { $item_socket4 = $item_socket4; } else { $item_socket4 = '00'; };
if($check_item_dat->fields[14] == '5') { $item_socket5 = $item_socket5; } else { $item_socket5 = '00'; };
} else {
if($check_item_dat->fields[14] >= '1') { $item_socket1 = $item_socket1; } else { $item_socket1 = 'FF'; };
if($check_item_dat->fields[14] >= '2') { $item_socket2 = $item_socket2; } else { $item_socket2 = 'FF'; };
if($check_item_dat->fields[14] >= '3') { $item_socket3 = $item_socket3; } else { $item_socket3 = 'FF'; };
if($check_item_dat->fields[14] >= '4') { $item_socket4 = $item_socket4; } else { $item_socket4 = 'FF'; };
if($check_item_dat->fields[14] == '5') { $item_socket5 = $item_socket5; } else { $item_socket5 = 'FF'; };
}

//building HEX
$hex = "".$it_id."".$optwo_count."".$item_dur_c."".generateRandomString()."".$calc_item_exc."".$addhex."".$item_cat_calc."".$item_ref."".$item_har_data."".$item_socket1."".$item_socket2."".$item_socket3."".$item_socket4."".$item_socket5."";
//end
//echo '<div style="color:#fff;">'.$hex.'</div>';

$Final_Result_hex = ''.$hex.'';

//ACA VA LA FUNCION
$i            = 0;
$mycuritems    = '0x';                   
while ($i<240) {
$query = $core_db->Execute("select substring(Items,".($i*16+1).",16) from warehouse where AccountID=?",array($user_auth_id));
$i++;
$query = $query->fetchrow();

if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') { 
	$mycuritems .= $query[0];   //PARA PHP 5.6 EN ADELANTE
} else { 
	$mycuritems .= bin2hex(strtoupper($query[0])); //SOLO FUNCIONA EN PHP 5.4 O MENOS
}


}
//DEBUG
//echo '<br><div style="color:#fff;">'.$mycuritems.'</div>';
//FIN DEBUG

$newitem	= $Final_Result_hex;
$test		= 0;
//$slot 		= smartsearch($mycuritems,$check_item_dat->fields[11],$check_item_dat->fields[12]);
//$test		= $slot*32;

$slot         = itemslot($mycuritems,$check_item_dat->fields[11],$check_item_dat->fields[12]);
$test        = $slot*32;

$mynewitems = substr_replace($mycuritems, $newitem, ($test+2), 32);
//$mynewitems = substr_replace($mycuritems, $itemhex, ($test+2), 32)


$get_ware_info_name= $core_db->Execute("Select money from warehouse where AccountID='".$useracc."'");
$drop_infoa= $get_ware_info_name;

//$sys_startsb= $core_db->Execute("Select name from Character where name='".$Character."'");
//$drop_infoab= $sys_startsb; // Check if Can BUY

$sys_starst = $core_db->Execute("select name from character where AccountID = '".$useracc."'"); // Check if Char Exists.
$drop_info = $sys_starst;

$get_credits = $core_db->Execute("select ".$mvcore['credits_column'].",".$mvcore['credits2_column']." from ".$mvcore['credits_table']." where ".$mvcore['user_column']." ='".$useracc."'"); 
$get_creditss = $get_credits;



		if($is_cost_type == '3') {
			$drop_infoa->fields[0] <= $item_cost_zen ? $costz=1 : $costz=0; //Zen
				if( $costz == '1' ) { $has_error = '1'; exit('<div class="error-box" style="background: #fff;color: #ff0000;padding: 10px;">You need more zen to buy this item!</div>'); };
		}
		elseif($is_cost_type == '2') {
			$get_creditss->fields[0] <= $item_cost_cred ? $costc=1 : $costc=0; //Credits
				if( $costc == '1' ) { $has_error = '1'; exit('<div class="error-box" style="background: #fff;color: #ff0000;padding: 10px;">You need more '.$mvcore['money_name1'].' to buy this item!</div>'); };
		}
		elseif($is_cost_type == '1') {
			$get_creditss->fields[1] <= floor($calc_into_gold) ? $costg=1 : $costg=0; //Credits2 
				if( $costg == '1' ) { $has_error = '1'; exit('<div class="error-box" style="background: #fff;color: #ff0000;padding: 10px;">You need more '.$mvcore['money_name2'].' to buy this item!</div>'); };
		};

		if(strlen($Final_Result_hex) < '32') { $has_error = '1'; exit('<div class="error-box" style="background: #fff;color: #ff0000;padding: 10px;">Something went wrong, please contact server administrator.!</div>'); };
		
		if($drop_info->fields[0] == '' ) { $has_error = '1'; exit('<div class="success-box" style="background: #fff;color: #000;padding: 10px;">Create character before you buy items :)</div>'); };

if($slot == '1337' ) { $has_error = '1'; exit('<div class="error-box" style="background: #fff;color: #ff0000;padding: 10px;">Warehouse seems to be full, clean and try again!.</div>'); };

$check_online = $core_db->Execute("Select ConnectStat from memb_stat where memb___id='".$useracc."'");
$check_onlines = $check_online;
		
		if( $check_onlines->fields[0] == '1' ) { $has_error = '1'; exit('<div class="success-box" style="background: #fff;color: #000;padding: 10px;">Character is online, please exit game!</div>'); };
		
if($has_error >= '1'){} else {

		$up_data = $core_db->Execute("UPDATE warehouse SET Items = ".$mynewitems." WHERE AccountId='".$useracc."'");
		
			$up_data = $core_db->Execute("UPDATE wshopp SET bought_times = bought_times + '1' WHERE name='".$_POST['buy_item']."'");
	
		//Take Cost
		if($is_cost_type == '3') {
			$run = $core_db->Execute("update warehouse set money = money - '".$item_cost_zen."' where AccountID ='".$useracc."'"); 
			$do_insert = $core_db->Execute("insert into wshopp_item_log (name,hex,cost,boughtby,date,type) VALUES ('".$check_item_dat->fields[0]."','".$hex."','".$item_cost_zen."','".$useracc."','".time()."','3')");
		}
		elseif($is_cost_type == '2') {
			$run = $core_db->Execute("update ".$mvcore['credits_table']." set ".$mvcore['credits_column']." = ".$mvcore['credits_column']." - '".$item_cost_cred."' where ".$mvcore['user_column']." ='".$useracc."'"); 
			$do_insert = $core_db->Execute("insert into wshopp_item_log (name,hex,cost,boughtby,date,type) VALUES ('".$check_item_dat->fields[0]."','".$hex."','".$item_cost_cred."','".$useracc."','".time()."','2')");
		}
		elseif($is_cost_type == '1') {
			$run = $core_db->Execute("update ".$mvcore['credits_table']." set ".$mvcore['credits2_column']." = ".$mvcore['credits2_column']." - '".floor($calc_into_gold)."' where ".$mvcore['user_column']." ='".$useracc."'"); 
			$do_insert = $core_db->Execute("insert into wshopp_item_log (name,hex,cost,boughtby,date,type) VALUES ('".$check_item_dat->fields[0]."','".$hex."','".floor($calc_into_gold)."','".$useracc."','".time()."','1')");
		};
		//end

exit('<div class="success-box" style="background: #fff;color: #000;padding: 10px;">'.$check_item_dat->fields[0].' Ha sido agregado a su Baul.</div>');

};

};
		//fin parte 1


		}
		//fin parte4



echo '<div id="dropitemhtmlssd">
</div>
<div id="ucp_info" align="center" style="width:100%;padding-top: 15px; padding-bottom: 15px;">
<div align="center" style="width:440px;text-align:center;line-height: 20px;">';

				if($shop_page0 == '1') { echo "<a class=\"label label-primary lbl-fix\" href=\"".$core_run_script."&op2=0\">Swords</a> - ";}
				if($shop_page1 == '1') { echo "<a class=\"label label-primary lbl-fix\" href=\"".$core_run_script."&op2=1\">Axes</a> - ";}
				if($shop_page2 == '1') { echo "<a class=\"label label-primary lbl-fix\" href=\"".$core_run_script."&op2=2\">Maces &amp; Scepters</a> - ";}
				if($shop_page3 == '1') { echo "<a class=\"label label-primary lbl-fix\" href=\"".$core_run_script."&op2=3\">Spears</a> - ";}
				if($shop_page4 == '1') { echo "<a class=\"label label-primary lbl-fix\" href=\"".$core_run_script."&op2=4\">Bows &amp; Crosbows</a> - ";}
				if($shop_page5 == '1') { echo "<a class=\"label label-primary lbl-fix\" href=\"".$core_run_script."&op2=5\">Staffs</a> - ";}
				if($shop_page6 == '1') { echo "<a class=\"label label-primary lbl-fix\" href=\"".$core_run_script."&op2=6\">Shields</a> - ";}
				if($shop_page7 == '1') { echo "<a class=\"label label-primary lbl-fix\" href=\"".$core_run_script."&op2=7\">Helms</a> - ";}
				if($shop_page8 == '1') { echo "<a class=\"label label-primary lbl-fix\" href=\"".$core_run_script."&op2=8\">Armor</a> - ";}
				if($shop_page9 == '1') { echo "<a class=\"label label-primary lbl-fix\" href=\"".$core_run_script."&op2=9\">Pants</a> - ";}
				if($shop_page10 == '1') { echo "<a class=\"label label-primary lbl-fix\" href=\"".$core_run_script."&op2=10\">Gloves</a> - ";}
				if($shop_page11 == '1') { echo "<a class=\"label label-primary lbl-fix\" href=\"".$core_run_script."&op2=11\">Boots</a> - ";}
				if($shop_page12 == '1') { echo "<a class=\"label label-primary lbl-fix\" href=\"".$core_run_script."&op2=12\">Accessories</a> - ";}
				if($shop_page13 == '1') { echo "<a class=\"label label-primary lbl-fix\" href=\"".$core_run_script."&op2=13\">Miscellaneous Items</a> - ";}
				if($shop_page14 == '1') { echo "<a class=\"label label-primary lbl-fix\" href=\"".$core_run_script."&op2=14\">Miscellaneous Items II</a> - ";}
				if($shop_page15 == '1') { echo "<a class=\"label label-primary lbl-fix\" href=\"".$core_run_script."&op2=15\">Scrolls</a>";}

 echo '</div>
</div>
<br>';

//LISTA DE CLASES
echo '<div style="float:right;padding-bottom:10px;"> Elegir Raza: 
							<form action="" method="POST">
								<select onchange="this.form.submit()" style="width:200px !important;" class="form-control" name="getClassCode" id="getClassCode">
									<option value="0" > All Classes </option>
									<option value="1" '.(($_POST['getClassCode']=='1') ? 'selected':"").'> Dark Wizard </option>
									<option value="2" '.(($_POST['getClassCode']=='2') ? 'selected':"").'> Dark Knight </option>
									<option value="3" '.(($_POST['getClassCode']=='3') ? 'selected':"").'> Elf </option>
									<option value="4" '.(($_POST['getClassCode']=='4') ? 'selected':"").'> Magic Gladiator </option>
									<option value="5" '.(($_POST['getClassCode']=='5') ? 'selected':"").'> Dark Lord </option>
									<option value="6" '.(($_POST['getClassCode']=='6') ? 'selected':"").'> Summoner </option>
									<option value="7" '.(($_POST['getClassCode']=='7') ? 'selected':"").'> Rage Figther </option>
								</select>
							</form>
							</div><br>';

echo '<table border="0" align="center" cellpadding="0" cellspacing="0" width="100%">
<tr>
<td width="200">
<table width="200" border="0" align="center" cellpadding="3" cellspacing="0">';


if($_GET['op2'] == '') { $cat_drop = '0'; } else { $cat_drop = $_GET['op2']; };
//VERIFICACION DE RAZAS
if($_POST['getClassCode'] == '1') {
$select_items = $core_db->Execute("select top 300 name, cat, id, cost, onsell, exc, refin, sk, anc, ad, skill, luck, level from wshopp where cat = '".$cat_drop."' and onsell >= '1' and class1 > '0'");

}elseif($_POST['getClassCode'] == '2') {
$select_items = $core_db->Execute("select top 300 name, cat, id, cost, onsell, exc, refin, sk, anc, ad, skill, luck, level from wshopp where cat = '".$cat_drop."' and onsell >= '1' and class2 > '0'");

}elseif($_POST['getClassCode'] == '3') {
$select_items = $core_db->Execute("select top 300 name, cat, id, cost, onsell, exc, refin, sk, anc, ad, skill, luck, level from wshopp where cat = '".$cat_drop."' and onsell >= '1' and class3 > '0'");

}elseif($_POST['getClassCode'] == '4') {
$select_items = $core_db->Execute("select top 300 name, cat, id, cost, onsell, exc, refin, sk, anc, ad, skill, luck, level from wshopp where cat = '".$cat_drop."' and onsell >= '1' and class4 > '0'");

}elseif($_POST['getClassCode'] == '5') {
$select_items = $core_db->Execute("select top 300 name, cat, id, cost, onsell, exc, refin, sk, anc, ad, skill, luck, level from wshopp where cat = '".$cat_drop."' and onsell >= '1' and class5 > '0'");

}elseif($_POST['getClassCode'] == '6') {
$select_items = $core_db->Execute("select top 300 name, cat, id, cost, onsell, exc, refin, sk, anc, ad, skill, luck, level from wshopp where cat = '".$cat_drop."' and onsell >= '1' and class6 > '0'");

}elseif($_POST['getClassCode'] == '7') {
$select_items = $core_db->Execute("select top 300 name, cat, id, cost, onsell, exc, refin, sk, anc, ad, skill, luck, level from wshopp where cat = '".$cat_drop."' and onsell >= '1' and class7 > '0'");

}else{
$select_items = $core_db->Execute("select top 300 name, cat, id, cost, onsell, exc, refin, sk, anc, ad, skill, luck, level from wshopp where cat = '".$cat_drop."' and onsell >= '1'");

}

$select_items_drop = $select_items;

$i = 0;
while(!$select_items->EOF){
$i++;

if(strlen($select_items_drop->fields[0]) > '17'){ $ech_name = ''.substr($select_items_drop->fields[0], 0, 14).'...'; } else { $ech_name = $select_items_drop->fields[0]; };
	
if (file_exists("AOH_Addons/images/webshop/item_images/".$select_items_drop->fields[1]."/".$select_items_drop->fields[2].".gif")) { $image_load = "AOH_Addons/images/webshop/item_images/".$select_items_drop->fields[1]."/".$select_items_drop->fields[2].".gif"; } else { $image_load = 'AOH_Addons/images/webshop/item_images/no-img.gif'; };
	
if($i == 0 ) { echo '<tr align="center">'; };

if($i == 3 ) { echo '<tralign="center">'; };
if($i == 6 ) { echo '<tralign="center">'; };
if($i == 9 ) { echo '<tralign="center">'; };
if($i == 12 ) { echo '<tralign="center">'; };
if($i == 15 ) { echo '<tralign="center">'; };
if($i == 18 ) { echo '<tralign="center">'; };
if($i == 21 ) { echo '<tralign="center">'; };
if($i == 24 ) { echo '<tralign="center">'; };
if($i == 27 ) { echo '<tralign="center">'; };
if($i == 30 ) { echo '<tralign="center">'; };
if($i == 33 ) { echo '<tralign="center">'; };
if($i == 36 ) { echo '<tralign="center">'; };
if($i == 39 ) { echo '<tralign="center">'; };
if($i == 42 ) { echo '<tralign="center">'; };
if($i == 45 ) { echo '<tralign="center">'; };
if($i == 48 ) { echo '<tralign="center">'; };
if($i == 51 ) { echo '<tralign="center">'; };
if($i == 54 ) { echo '<tralign="center">'; };
if($i == 57 ) { echo '<tralign="center">'; };
if($i == 60 ) { echo '<tralign="center">'; };
if($i == 63 ) { echo '<tralign="center">'; };
if($i == 66 ) { echo '<tralign="center">'; };
if($i == 69 ) { echo '<tralign="center">'; };
if($i == 72 ) { echo '<tralign="center">'; };
if($i == 75 ) { echo '<tralign="center">'; };
if($i == 78 ) { echo '<tralign="center">'; };
if($i == 81 ) { echo '<tralign="center">'; };
if($i == 84 ) { echo '<tralign="center">'; };
if($i == 87 ) { echo '<tralign="center">'; };
if($i == 90 ) { echo '<tralign="center">'; };
if($i == 93 ) { echo '<tralign="center">'; };
if($i == 96 ) { echo '<tralign="center">'; };
if($i == 99 ) { echo '<tralign="center">'; };
if($i == 102 ) { echo '<tralign="center">'; };
if($i == 105 ) { echo '<tralign="center">'; };
if($i == 108 ) { echo '<tralign="center">'; };
if($i == 111 ) { echo '<tralign="center">'; };
if($i == 114 ) { echo '<tralign="center">'; };
if($i == 117 ) { echo '<tralign="center">'; };

echo '
<td class="itemnclass" >
	<table align="center" cellpadding="0" cellspacing="0">
		<tr>
			<td height="34px" style="background: url(AOH_Addons/images/webshop/ws_item_name.png) no-repeat;" class="items"><div align="center"><a onclick="itemClicked(\''.$select_items_drop->fields[0].'\', \''.$select_items_drop->fields[2].'\', \''.$select_items_drop->fields[1].'\', \''.$select_items_drop->fields[5].'\', \''.$select_items_drop->fields[6].'\', \''.$select_items_drop->fields[7].'\', \''.$select_items_drop->fields[8].'\', \''.$select_items_drop->fields[9].'\', \''.$select_items_drop->fields[10].'\', \''.$select_items_drop->fields[11].'\', \''.$select_items_drop->fields[12].'\', \''.$_GET['op2'].'\'); return false;" href="#">'.$ech_name.'</a></div></td>
		</tr>
		<tr>
			<td style="background: url(AOH_Addons/images/webshop/ws_item_bg.png);"><div align="center" style="width:136px;height: 128px;"><center><img src="'.$image_load.'" border="0"></center></div></td>
		
		</tr>
		<tr>
			<td width="136px" height="6px" style="background: url(AOH_Addons/images/webshop/ws_item_footer.png)no-repeat;"></td>
		</tr>
	</table>
</td>
'; 

if($i == 2 ) { echo '</tr><tr><td height="15px"></td></tr>';};
if($i == 5 ) { echo '</tr><tr><td height="15px"></td></tr>';};
if($i == 8 ) { echo '</tr><tr><td height="15px"></td></tr>';};
if($i == 11 ) { echo '</tr><tr><td height="15px"></td></tr>';};
if($i == 14 ) { echo '</tr><tr><td height="15px"></td></tr>';};
if($i == 17 ) { echo '</tr><tr><td height="15px"></td></tr>';};
if($i == 20 ) { echo '</tr><tr><td height="15px"></td></tr>';};
if($i == 23 ) { echo '</tr><tr><td height="15px"></td></tr>';};
if($i == 26 ) { echo '</tr><tr><td height="15px"></td></tr>';};
if($i == 29 ) { echo '</tr><tr><td height="15px"></td></tr>';};
if($i == 32 ) { echo '</tr><tr><td height="15px"></td></tr>';};
if($i == 35 ) { echo '</tr><tr><td height="15px"></td></tr>';};
if($i == 38 ) { echo '</tr><tr><td height="15px"></td></tr>';};
if($i == 41 ) { echo '</tr><tr><td height="15px"></td></tr>';};
if($i == 44 ) { echo '</tr><tr><td height="15px"></td></tr>';};
if($i == 47 ) { echo '</tr><tr><td height="15px"></td></tr>';};
if($i == 50 ) { echo '</tr><tr><td height="15px"></td></tr>';};
if($i == 53 ) { echo '</tr><tr><td height="15px"></td></tr>';};
if($i == 56 ) { echo '</tr><tr><td height="15px"></td></tr>';};
if($i == 59 ) { echo '</tr><tr><td height="15px"></td></tr>';};
if($i == 62 ) { echo '</tr><tr><td height="15px"></td></tr>';};
if($i == 65 ) { echo '</tr><tr><td height="15px"></td></tr>';};
if($i == 68 ) { echo '</tr><tr><td height="15px"></td></tr>';};
if($i == 71 ) { echo '</tr><tr><td height="15px"></td></tr>';};
if($i == 74 ) { echo '</tr><tr><td height="15px"></td></tr>';};
if($i == 77 ) { echo '</tr><tr><td height="15px"></td></tr>';};
if($i == 80 ) { echo '</tr><tr><td height="15px"></td></tr>';};
if($i == 83 ) { echo '</tr><tr><td height="15px"></td></tr>';};
if($i == 86 ) { echo '</tr><tr><td height="15px"></td></tr>';};
if($i == 89 ) { echo '</tr><tr><td height="15px"></td></tr>';};
if($i == 92 ) { echo '</tr><tr><td height="15px"></td></tr>';};
if($i == 95 ) { echo '</tr><tr><td height="15px"></td></tr>';};
if($i == 98 ) { echo '</tr><tr><td height="15px"></td></tr>';};
if($i == 101 ) { echo '</tr><tr><td height="15px"></td></tr>';};
if($i == 104 ) { echo '</tr><tr><td height="15px"></td></tr>';};
if($i == 107 ) { echo '</tr><tr><td height="15px"></td></tr>';};
if($i == 110 ) { echo '</tr><tr><td height="15px"></td></tr>';};
if($i == 113 ) { echo '</tr><tr><td height="15px"></td></tr>';};
if($i == 116 ) { echo '</tr><tr><td height="15px"></td></tr>';};
if($i == 119 ) { echo '</tr><tr><td height="15px"></td></tr>';};

$select_items->MoveNext();
                
}


echo '</table>
</td>
</tr>
</table>';
?>

	
<? } ?>