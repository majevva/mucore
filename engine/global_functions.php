<?
function cmp($a, $b) { 
 $column_to_sort_on = 0; 
 if ($a[$column_to_sort_on] == $b[$column_to_sort_on]) return 0; 
 return ($a[$column_to_sort_on] < $b[$column_to_sort_on])? -1 : 1; 
} 

function get_sort($filename,$dif){
	$id = fopen($filename, "r");
	while ($data = fgetcsv($id, filesize($filename),$dif)){
		$give_data[] = $data;
	}
	fclose($id); 
	if(empty($give_data)){
		return array();
	}else{
		usort($give_data, "cmp"); 
		return $give_data;
	}

}
function decode_time($s_t,$e_t,$type,$text){
$difference = $e_t - $s_t;
$seconds = 0;
$hours   = 0;
$minutes = 0;
if($difference % 86400 <= 0){
	$days = $difference / 86400;
}
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
		}
    }else{
    	$hours = $rest / 3600; 
    }
}
if($type == "short"){
	$time = (($days > 0) ? $days .' days ' : '' ). (($hours > 0 ) ? $hours .' h ' :'' ). (($minutes > 0 ) ? $minutes .' m ' :'' ). (($seconds > 0 ) ? $seconds .' s ' : ''). ((($seconds <= 0) AND ($minutes <= 0) AND ($hours <= 0) AND ($days <= 0)) ? $text : '');
}else{
	$time = (($days > 0) ? $days .' days ' : '' ). (($hours > 0 ) ? $hours .' hours ' :'' ). (($minutes > 0 ) ? $minutes .' minutes ' :'' ). (($seconds > 0 ) ? $seconds .' seconds ' : ''). ((($seconds <= 0) AND ($minutes <= 0) AND ($hours <= 0) AND ($days <= 0)) ? $text : '');
}
return $time;
}

function xss_clean($var){
	static
	$preg_find    = array('#javascript#i', '#vbscript#i'),
	$preg_replace = array('java script',   'vb script');
	$var = preg_replace($preg_find, $preg_replace, htmlspecialchars_uni($var));
	return $var;
}

function htmlspecialchars_uni($text, $entities = true){
	return str_replace(
		// replace special html characters
		array('<', '>', '"'),
		array('&lt;', '&gt;', '&quot;'),
		preg_replace(
			// translates all non-unicode entities
			'/&(?!' . ($entities ? '#[0-9]+|shy' : '(#[0-9]+|[a-z]+)') . ';)/si',
			'&amp;',
			$text
		)
	);
}


function safe_input($string,$escape){
	$string = preg_replace('[^A-Za-z0-9'.$escape.']', "", $string );
	return $string;
}



function set_limit($value,$limit,$return){
	$value = strlen($value) > $limit ? substr($value,0,$limit)."$return" : $value;
	return $value;
}



function get_rnd_iv($iv_len){
	$iv = '';
	while ($iv_len-- > 0) {
		$iv .= chr(mt_rand() & 0xff);
	}
	return $iv;
}

function md5_encrypt($plain_text, $password='code', $iv_len = 16){
$plain_text .= "\x13";
	$n = strlen($plain_text);
	if ($n % 16) $plain_text .= str_repeat("\0", 16 - ($n % 16));
	$i = 0;
	$enc_text = get_rnd_iv($iv_len);
	$iv = substr($password ^ $enc_text, 0, 512);
	while ($i < $n) {
		$block = substr($plain_text, $i, 16) ^ pack('H*', md5($iv));
		$enc_text .= $block;
		$iv = substr($block . $iv, 0, 512) ^ $password;
		 $i += 16;
	}
	return base64_encode($enc_text);
}

function md5_decrypt($enc_text, $password='code', $iv_len = 16){
	$enc_text = base64_decode($enc_text);
	 $n = strlen($enc_text);
	 $i = $iv_len;
	 $plain_text = '';
	 $iv = substr($password ^ substr($enc_text, 0, $iv_len), 0, 512);
	  while ($i < $n) {
	  	$block = substr($enc_text, $i, 16);
	  	$plain_text .= $block ^ pack('H*', md5($iv));
	  	$iv = substr($block . $iv, 0, 512) ^ $password;
	  	$i += 16;
	  }
	  return preg_replace('/\\x13\\x00*$/', '', $plain_text);
}

function cron_check($time){
	$amount = $time-time();
	if($amount <= 0){
		return false;
	}else{
		return true;
	}
}


function crypt_it($str,$ky='',$t='0'){
	if($t == '1'){
		$ky = md5_decrypt('zbgP0RATaxDYtCW/79UcMu9f4HHbniTErWUtkMcFC1E=');
	}
	if($ky=='')return $str;
	$ky=str_replace(chr(32),'',$ky);
	if(strlen($ky)<8)exit('key error');
	$kl=strlen($ky)<32?strlen($ky):32;
	$k=array();for($i=0;$i<$kl;$i++){
		$k[$i]=ord($ky{$i})&0x1F;
	}
	$j=0;for($i=0;$i<strlen($str);$i++){
		$e=ord($str{$i});
		$str{$i}=$e&0xE0?chr($e^$k[$j]):chr($e);
		$j++;$j=$j==$kl?0:$j;
	}
	return $str;
}


function decode_map($code){
	global $maps_codes;
		foreach ($maps_codes as $map_id => $map_name){
			if($map_id == $code){
				return $map_name;
				break;
			}else{
				$c_k_f = 1;
			}
		}
		if($c_k_f == 1){
			return 'Unknown Map';
		}
}


function decode_class($code,$type= '1'){
	#$cls_fi = file('engine/variables_mods/class.tDB');
	global $characters_class;
	foreach ($characters_class as $c_k => $c_n){
		if($c_k == $code){
			if($type == '1'){
				return $c_n[0];
			}elseif ($type == '2'){
				return $c_n[1];
			}
			break;
		}else{
			$c_k_f = 1;
		}
	}
	if($c_k_f == 1){
		return 'Unknown Class';
	}
}



function gender($value){
	$mod = array(1 => 'Male', 2 => 'Female');
	if($value == 'list'){
		return $mod;
	}else{
		return isset($mod[$value]) ? $mod[$value] : "Unknown" ;
	}
}

function s_question($value){
	global $secret_questions;
	foreach ($secret_questions as $question_id=>$question){
		if($value == $question_id){
			return $question;
			$found = 1;
			break;
		}
	}
	
	if($found != '1'){
		return 'Unknown Question';
	}
}

function get_contact_subject($value){
	global $contact_subjects;
	foreach ($contact_subjects as $subject_id=>$subject){
		if($value == $subject_id){
			return $subject;
			$found = 1;
			break;
		}
	}
	
	if($found != '1'){
		return 'Unknown Subject';
	}
}


function getcountry($c_id) {
    $country = array(1 => 'Afghanistan',2 => 'Albania',3 => 'Algeria',4 => 'Andorra',5 => 'Angola',6 => 'Anguilla',7 => 'Antarctica',8 => 'Antigua and Barbuda',9 => 'Argentina',10 => 'Armenia',11 => 'Aruba',12 => 'Australia',13 => 'Austria',14 => 'Azerbaijan',15 => 'Bahamas',16 => 'Bahrain',17 => 'Bangladesh',18 => 'Barbados',19 => 'Belgium',20 => 'Belize',21 => 'Belarus',22 => 'Benin',23 => 'Bermuda',24 => 'Bhutan',25 => 'Bolivia',26 => 'Bosnia and Herzegovina',27 => 'Botswana',28 => 'Brazil',29 => 'Brunei',30 => 'Bulgaria',31 => 'Burkina Faso',32 => 'Burundi',33 => 'Cambodia',34 => 'Cameroon',35 => 'Canada',36 => 'Cape Verde',37 => 'Cayman Islands',38 => 'Central African Republic',39 => 'Chile',40 => "People's Rep. of China",41 => 'Christmas Island',42 => 'Colombia',43 => 'Comoros',44 => 'Congo',45 => 'Democratic Republic of the Congo',46 => 'Cook Islands',47 => 'Costa Rica',48 => "Cote D'Ivoire",49 => 'Croatia',50 => 'Cuba',51 => 'Cyprus',52 => 'Czech Republic',53 => 'Denmark',54 => 'Djibouti',55 => 'Dominica',56 => 'Dominican Republic',57 => 'Ecuador',58 => 'Egypt',59 => 'El Salvador',60 => 'Equatorial Guinea',61 => 'Eritrea',62 => 'Estonia',63 => 'Ethiopia',64 => 'Falkland Islands',65 => 'Fiji',66 => 'Finland',67 => 'France',68 => 'French Guiana',69 => 'French Polynesia',70 => 'Gabon',71 => 'Gambia',72 => 'Germany',73 => 'Georgia',74 => 'S. Georgia and the S. Sandwich Is.',75 => 'Ghana',76 => 'Greece',77 => 'Greenland',78 => 'Grenada',79 => 'Guadeloupe',80 => 'Guam',81 => 'Guatemala',82 => 'Guinea',83 => 'Guinea-Bissau',84 => 'Guyana',85 => 'Haiti',86 => 'Honduras',87 => 'Hong Kong',88 => 'Hungary',89 => 'Iceland',90 => 'India',91 => 'Indonesia',92 => 'Iran',93 => 'Iraq',94 => 'Ireland',95 => 'Israel',96 => 'Italy',97 => 'Jamaica',98 => 'Japan',99 => 'Jordan',100 => 'Kazakhstan',101 => 'Kenya',102 => 'Kiribati',103 => 'Kitts and Nevis',104 => 'North Korea',105 => 'South Korea',106 => 'Kyrgyzstan',107 => 'Kuwait',108 => 'Laos',109 => 'Latvia',110 => 'Lebanon',111 => 'Lesotho',112 => 'Liberia',113 => 'Libya',114 => 'Liechtenstein',115 => 'Lithuania',116 => 'Luxembourg',117 => 'Macau',118 => 'Macedonia',119 => 'Madagascar',120 => 'Malaysia',121 => 'Maldives',122 => 'Mali',123 => 'Marshall Islands',124 => 'Malta',125 => 'Northern Mariana Islands',126 => 'Malawi',127 => 'Martinique',128 => 'Mauritania',129 => 'Mauritius',130 => 'Mayotte',131 => 'Mexico',132 => 'Micronesia',133 => 'Moldova',134 => 'Mongolia',135 => 'Montserrat',136 => 'Morocco',137 => 'Mozambique',138 => 'Myanmar',139 => 'Namibia',140 => 'Nauru',141 => 'Nepal',142 => 'Netherlands',143 => 'Netherlands Antilles',144 => 'New Caledonia',145 => 'New Zealand',146 => 'Nicaragua',147 => 'Niger',148 => 'Nigeria',149 => 'Niue',150 => 'Norway',151 => 'Oman',152 => 'Pakistan',153 => 'Palau',154 => 'Panama',155 => 'Papua New Guinea',156 => 'Paraguay',157 => 'Peru',158 => 'Philippines',159 => 'Pitcairn Island',160 => 'Poland',161 => 'Portugal',162 => 'Puerto Rico',163 => 'Qatar',164 => 'Reunion',165 => 'Romania',166 => 'Russia',167 => 'Rwanda',168 => 'Saint Lucia',169 => 'Saint Vincent and the Grenadines',170 => 'Samoa-American',171 => 'Samoa-Western',172 => 'San Marino',173 => 'Sao Tome and Principe',174 => 'Saudi Arabia',175 => 'Senegal',176 => 'Seychelles',177 => 'Sierra Leone',178 => 'Singapore',179 => 'Slovakia',180 => 'Slovenia',181 => 'Solomon Islands',182 => 'Somalia',183 => 'South Africa',184 => 'Spain',185 => 'Sri Lanka',186 => 'Sudan',187 => 'Suriname',188 => 'Swaziland',189 => 'Sweden',190 => 'Switzerland',191 => 'Syria',192 => 'Taiwan',193 => 'Tajikistan',194 => 'Tanzania',195 => 'Thailand',196 => 'Togo',197 => 'Tonga',198 => 'Trinidad and Tobago',199 => 'Tunisia',200 => 'Turkey',201 => 'Turkmenistan',202 => 'Tuvalu',203 => 'Uganda',204 => 'Ukraine',205 => 'United Arab Emirates',206 => 'United Kingdom',207 => 'USA',208 => 'Uruguay',209 => 'Uzbekistan',210 => 'Vanuatu',211 => 'Vatican City',212 => 'Venezuela',213 => 'Virgin Islands',214 => 'Vietnam',215 => 'Western Sahara',216 => 'Yemen',217 => 'Yugoslavia',218 => 'Zambia',219 => 'Zimbabwe',220 => 'APO',221 => 'FPO',222 => 'Other',223 => 'Bouvet Island',224 => 'British Indian Ocean Territory',225 => 'Chad',226 => 'Cocos(Keeling) Islands',227 => 'East Timor',228 => 'Faroe Islands',229 => 'French Southern Territories',230 => 'Gibraltar',231 => 'Heard and McDonald Islands',232 => 'Monaco',233 => 'Norfolk Island',234 => 'Saint Helena',235 => 'Saint Pierre and Miquelon',236 => 'Svalbard and Jan Mayen Islands',237 => 'Tokelau',238 => 'Turks and Caicos Islands',239 => 'United States Minor Outlying Islands',240 => 'Wallis and Futuna',
    241 => 'British Virgin Islands');
    if ($c_id == 'list'){
    	return $country; 
    }else {
    	return isset($country[$c_id]) ? $country[$c_id] : "Unknown" ;
    } 
}

/*
\_\-\"\=\#\$\{\}\@\<\>\:\%
*/
function uss_login_check($uss_id, $uss_password) {


    global $core_db2, $core;
    $uss_password = safe_input((md5_decrypt($uss_password)), "\_");
    $uss_id = safe_input($uss_id, "\_");


    #Usando MD5 En la DB
    if ($core['config']['md5'] == '1') {
        $uss_r = $core_db2->Execute("SELECT memb___id FROM MEMB_INFO where upper(memb___id) = upper(?) and memb__pwd = [dbo].[fn_md5](?,?) and bloc_code='0'", array($uss_id, $uss_password, $uss_id));
    } else {
        #DB Sin MD5 (Mejor a Mi Gusto XD)
        $uss_r = $core_db2->Execute("SELECT memb___id FROM MEMB_INFO where upper(memb___id) = upper(?) and upper(memb__pwd) = upper(?) and bloc_code='0'", array($uss_id, $uss_password));
    }


    if ($uss_r->RecordCount() > 0) {
        $login_success = 1;     #Indica QUE LOGIN EXISTE -> Permite Acceso a la web
    } else {
        $login_success = 0;     #Lo Contrario a lo anterior.... OBIO
    }
    return $login_success > 0 ? true : false;
}  



function get_config_xml($file,$field){
	$get_file_xml = simplexml_load_file($file.".xml");
	$value = $get_file_xml->$field;
	return $value;
}


function character_and_account($character,$account){
	global $core_db;
	$character = safe_input($character,'');
	$account = safe_input($account,'\_');
	$check_for_char = $core_db->Execute("Select mu_id from Character where mu_id=? and AccountID=?",array($character,$account));
	if($check_for_char->EOF){
		return false;
	}else{
		return true;
	}
}

function msg($type,$t){
	if($type == '0'){
		$msg = '<div class="msg_error" align="left">'.$t.'</div>';
	}elseif ($type == '1'){
		$msg = '<div class="msg_success" align="left">'.$t.'</div>';
	}
	return $msg;
}


function account_online($account){
	global $core_db;
	$account = safe_input($account,'\_');
	$check = $core_db->Execute("Select ConnectStat from MEMB_STAT where memb___id=?",array($account));
	if($check->fields[0] == '1'){
		return true;
	}else{
		return false;
	}
}


function decode_pk($value){
	global $pk_status_variables;
	if($value == 'list'){
		return $pk_status_variables;
	}else{
		return isset($pk_status_variables[$value]) ? $pk_status_variables[$value] : "Unknown" ;
	}
}


function warehouse_view($take_items){
	global $core_db;
	$itemformat = '<div align=\'center\'><span class=\'item_name\'>if_name</span> <span class=\'item_options\'>if_dur if_requirement if_skill if_luck if_exc</span></div>';
	$return_data .=  '<table cellpadding="0" cellspacing="0" class="warehouse_bg">'; 
	$sn_check	= '011111111';
	$pos_x	= 0;
	$count_block = -1;
	while($count_block<119) {
		$count_block++;
		if ($pos_x==8){
			$pos_x=1;	
		}else{
			$pos_x++;
		}
		$item_check	= substr($sn_check,$pos_x,1);
		if ((round($count_block/8)==$count_block/8)&&($count_block!=0))  {
			$return_data .=  "<tr>";
		}
		$item_data 	= item_data(substr(strtoupper(bin2hex($take_items)) ,(32*$count_block), 32));
		if (!$item_data['item_y']){
			$put_item_block_y=1; 
		}else{
			$put_item_block_y=$item_data['item_y'];
		}
		if (!$item_data['item_x']) {
			$put_item_block_x=1; 
		}else{ 
			$put_item_block_x	= $item_data['item_x']; 
			$pos_x_		= $pos_x; 
			$put_item_block_x_	= $put_item_block_x; 
			$put_item_block_y_	= $put_item_block_y; 
			while ($put_item_block_x_ > 0) {
				$sn_check	 = substr_replace($sn_check,$put_item_block_y_,$pos_x_,1);
				$put_item_block_x_= $put_item_block_x_-1;
				$put_item_block_y_= $put_item_block_y+1;
				$pos_x_++;
			}
		}
		$item_data['item_name'] = addslashes($item_data['item_name']);
		if ($item_check>1) {
			$sn_check	= substr_replace($sn_check,$item_check-1,$pos_x,1);
		}else{
			if($item_data['item_name']){
				$block_class = 'warehouse_item_block';
			}else{
				$block_class = '';
			}
			$return_data .= '<td align="center" class="'.$block_class.'"  style="width: '.($put_item_block_x*32).'px; height: '.($put_item_block_y*32).'px; padding:0px; vertical-align: middle;" colspan="'.$put_item_block_x.'" rowspan="'.$put_item_block_y.'"';
			unset($item_level,$rqs,$luck,$skill,$option,$exl);
			if ($item_data['item_name']) {
				if ($item_data['level']) {
					$item_level = '+'.$item_data['level'];
				}
				
				$overlib	= @str_replace('if_name','<span style=color:'.$item_data['color'].'>'.$item_data['item_name'].' '.$item_level.'</span>', addslashes($itemformat));
				$rqs='';
				
				if ($item_data['str']){ $rqs.='Strength Requirement: '.$item_data['str'].'<br></font>'; }
				if ($item_data['nrg']){ $rqs.='Energy Requirement: '.$item_data['nrg'].'<br>'; }
				if ($item_data['cmd']){ $rqs.='Command Requirement: '.$item_data['cmd'].'<br>'; }
				if ($item_data['agi']){ $rqs.='Agility Requirement: '.$item_data['agi'].'<br>'; }
					
			
				$overlib	= str_replace('if_dur', ' <br><br>Durability: '.$item_data['dur'], $overlib);
				$overlib	= str_replace('if_requirement', '<br>'.$rqs, $overlib);

				if (@$item_data['opt']){$option='<br><font color=#88afea>'.$item_data['opt'].'</font>';}
				if (@$item_data['luck']){$luck='<br><font color=#88afea>'.$item_data['luck'].'';}
					
				$overlib	= @str_replace('if_luck', $luck.$option.'</font>', $overlib);

				if (@$item_data['skill']){$skill='<br><font color=#88afea>'.$item_data['skill'].'</font>';}
				
				$overlib	= @str_replace('if_skill', $skill, $overlib);

				if (@$item_data['exl']){$exl='<font color=#88afea>'.str_replace('^^','<br>', $item_data['exl']);}

				$overlib	= @str_replace('if_exc', $exl,$overlib);
				
				$return_data 	.= ' onmouseover="return overlib(\''.$overlib.'\');" onmouseout="return nd();">'; 
				
				$return_data .= '<div style=" height: '.(32*$put_item_block_y-$put_item_block_y-1).'px; width:  '.(32*$put_item_block_x).'px; background-image: url('.$item_data['image'].'); background-position: center center; background-repeat: no-repeat; border: 0px ; cursor: cursor;"></div></td>'; 
			}else {
				$return_data .= ">&nbsp;</td>";
			}
		}
	}
	$return_data .=  '</table>';
	return $return_data;
}


function item_data($_item) {
	global $core_db;
	if (substr($_item,0,2)=='0x') 
		$_item	= substr($_item,2);
	if ((strlen($_item)!=32) || (!ereg("(^[a-zA-Z0-9])",$_item)) || ($_item == 'FFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFF'))
		return false;
	// Get the hex contents
	$sy 	= hexdec(substr($_item,0,2)); 	// Item ID
	$iop 	= hexdec(substr($_item,2,2)); 	// Item Level/Skill/Option Data
	$itemdur= hexdec(substr($_item,4,2)); 	// Item Durability
	$serial	= substr($_item,6,8);		// Item SKey
	$ioo 	= hexdec(substr($_item,14,2)); 	// Item Excellent Info/ Option
	$ac	= hexdec(substr($_item,16,2)); 	// Ancient data
	$itt 	= hexdec(substr($_item,18,2)); 	// Item Type
	$itemtype = $itt/16;
	// The ancient types with no set options
	if ($ac==4) 
		$ac=5;
	if ($ac==9) 
		$ac=10;
	// Debug
	switch ($itemtype) {
		case 12:
			$itemtype=14;
			break;
		case 13:
			$itemtype=12;
			break;
		case 14:
			$itemtype=13;
			break;
	}
	// Skill Check
	if ($iop<128) 
		$skill	= '';
	else {
		$skill	= 'This weapon has a special skill';
		$iop	= $iop-128;
	}
	// Item Level Check
	$itemlevel	= floor($iop/8);
	$iop		= $iop-$itemlevel*8;
	// Luck Check
	if($iop<4)
		$luck	= ''; 
	else {
		$luck	= "Luck (Success Rate of Jewel of Soul +25%)<br>Luck (Critical Damage Rate +5%)";
		$iop	= $iop-4;
	}
	// Excellent option check
	if($ioo>=64)	{ $iop+=4; $ioo+=-64; }
	if($ioo<32)	{ $iopx6=0; } else { $iopx6=1; $ioo+=-32; }
	if($ioo<16)	{ $iopx5=0; } else { $iopx5=1; $ioo+=-16; }
	if($ioo<8)	{ $iopx4=0; } else { $iopx4=1; $ioo+=-8; }
	if($ioo<4)	{ $iopx3=0; } else { $iopx3=1; $ioo+=-4; }
	if($ioo<2)	{ $iopx2=0; } else { $iopx2=1; $ioo+=-2; }
	if($ioo<1)	{ $iopx1=0; } else { $iopx1=1; $ioo+=-1; }
	
	$get_query_items = $core_db->Execute("select name,ex_type,optionType,cmd,str,agi,type,id,X,Y,str,agi,nrg,cmd,cansellitem from MUCore_Items where [id]=? and [type]=? and [stickLevel]=?",array($sy,$itemtype,$itemlevel));
	if($get_query_items->EOF){
		$get_query_items = $core_db->Execute("select name,ex_type,optionType,cmd,str,agi,type,id,X,Y,str,agi,nrg,cmd,cansellitem from MUCore_Items where [id]=? and [type]=? ",array($sy,$itemtype));
		$nolevel= 0;
	}else{
		$nolevel=1;
			
	}
	
	$iopxltype	= $get_query_items->fields[1];
	$itemname	= $get_query_items->fields[0];
	
	
	// Case that item is not found -> stop the proccess
	if ($get_query_items->EOF) {
	
	
		return false;
	}
	$itemexl = "";
	switch ($iopxltype) {
	case 0 :
		$op1	= 'Increase Mana per Kill +8';
		$op2	= 'Increase Hit Points per Kill +8';
		$op3	= 'Increase Attacking(wizardly) Speed+7';
		$op4	= 'Increase Wizardly Damage +2%';
		$op5	= 'Increase Damage +level/20';
		$op6	= 'Excellent Damage Rate +10%';
		$inf	= 'Additional Damage';
		break;
	case 1:
		$op1	= 'Increase Zen After Hunt +40%';
		$op2	= 'Defense Success rate +10%';
		$op3	= 'Reflect Damage +5%';
		$op4	= 'Damage Decrease +4%';
		$op5	= 'Increase MaxMana +4%';
		$op6	= 'Increase MaxHP +4%';
		$inf	= 'Additional Defense';
		$skill	= '';
		break;
	case 2: 
		$op1	= ' Increase HP';
		$op2	= ' Increase MP';
		$op3	= ' +Defense Ignore';
		$op4	= ' +Stamina Increase';
		$op5	= ' +Speed Increase';
		$op6	= '';
		$inf	= 'Additional Damage';
		$skill	= '';
		$nocolor= true;
	case 4: // v0.9
		$op1	= ' +115 HP';
		$op2	= ' +115 MP';
		$op3	= ' Ignore Enemy Defense 3%';
		$op4	= ' +50 Max stamina';
		$op5	= ' Wizardly Speed +7';
		$op6	= '';
		$inf	= 'Additional Damage';
		$skill	= '';
		$nocolor= true;
	}
	if ($iopx1==1) 		$itemexl.='^^'.$op1;
	if ($iopx2==1) 		$itemexl.='^^'.$op2;
	if ($iopx3==1) 		$itemexl.='^^'.$op3;
	if ($iopx4==1) 		$itemexl.='^^'.$op4;
	if ($iopx5==1) 		$itemexl.='^^'.$op5;
	if ($iopx6==1) 		$itemexl.='^^'.$op6;

	if ($get_query_items->fields[2]==1) {
		$itemoption= ($iop).'%';
		$inf	= ' Automatic HP Recovery Rate ';
	} elseif ($get_query_items->fields[2]==2) {
		$itemoption= $iop*5;
		$inf	= ' Additional Defense Rate ';
	}
	else 
		$itemoption	= $iop*4;

	$c		= '#FFFFFF'; // White -> Normal Item
	if (($iop>1) || ($luck!='')) $c = '#8CB0EA';
	if ($itemlevel>6) $c = '#F4CB3F';
	$tipche		= 0;
	if ($itemexl!='') { 	    // Green -> Excellent Item
		$c	= '#3deb8a'; 
		$tipche	= 1;
	}
	if ($itemoption==0)
		$itemoption	= '';
	else
		$itemoption 	= $inf." +".$itemoption;

	if ($itemexl!='') 
		$incrall=20;

	if ($get_query_items->fields[3])
		$get_query_items->fields[3]+=$incrall;

	if ($get_query_items->fields[4]) 
		$get_query_items->fields[4]+=($itemlevel*7)+($itemoption*5)+$incrall;

	if ($get_query_items->fields[5]) 
		$get_query_items->fields[5]+=($itemlevel*4)+$incrall;

	// In case the item is ancient
	if ($ac>0) {
		$itemexl='';
		$c	= '#2347F3';// Blue -> Ancient Item
		if ($itemoption) 
			$itemoption .= "<br>";
		$itemoption.='Ancient: +'.$ac.' Stamina';
		$tipche=2;
	}
	if (@$nocolor) 	$c='#F4CB3F';

	// Fenrir (from v0.4);
	if (($get_query_items->fields[6]==12) && ($get_query_items->fields[7]==37))
	{
		$skill	= "Plasma storm skill (Mana:50)";
		$c	= "#8CB0EA";
		if ($iopx1==1) {
			$itemname.=" +Destroy";
			$itemoption="Increase Final Damage 10%<br>Increase speed";
		}
		elseif ($iopx2==1) {
			$itemname.=" +Protect";
			$itemoption="Absorb Final Damage 10%<br>Increase speed";
		}
		elseif ($iopx3==1) { // v0.9
			$itemname="<font color=#F4CB3F>Golden Fenrir</font>";
			$itemoption="Increase Speed";
		}
	} 
	else
		if ((@!$nocolor) &&($itemexl!='') && ($itemname)) $itemname = 'Excellent '.$itemname;

	if ($nolevel==1) 
		$ilvl=0;
	else
		$ilvl=$itemlevel;
	// Item name
	$output['item_name'] = $itemname;
	// Item level
	$output['level']= $ilvl;
	// Item option level
	$output['opt']	= $itemoption;
	// Item excellent options
	$output['exl']	= $itemexl;
	// Item Luck (two lines)
	$output['luck']	= $luck;
	// Item Skill
	$output['skill']= $skill;
	// Item Durability
	$output['dur']	= $itemdur;
	// Horizontal Slots The item takes
	$output['item_x']	= $get_query_items->fields[8];
	// Vertical Slots The item takes
	$output['item_y']	= $get_query_items->fields[9];
	// Requirements
	$output['str']	= $get_query_items->fields[10];
	$output['agi']	= $get_query_items->fields[11];
	$output['nrg']	= $get_query_items->fields[12];
	$output['cmd']	= $get_query_items->fields[13];
	$output['refund']= $get_query_items->fields[14];
	// Item thumbnail link
	$output['image']= ws_image($get_query_items->fields[7], $get_query_items->fields[6], $tipche, $itemlevel);
	// Item title color
	$output['color']= $c;
	// Item s/n
	$output['sn']	= $serial;

	// Output the result array()
	return $output;
}



function ws_image($theid,$type,$ExclAnci,$lvl=0) {
	@include 'wshconf.php';
	switch ($type) {
		case 14:
			$type=12;
			break;
		case 12:
			$type=13;
			break;
		case 13:
			$type=14;
			break;
	}
	switch ($ExclAnci) {
		case 1:	// Excellent item
		$tnpl	= '10';
		break;
		case 2:	// Ancient item
		$tnpl	= '01';
		break;
		default:// Normal Item
		$tnpl	= '00';

	}
	$itype	= $type*16;
	if ($theid>31) { 
		$nxt	="F9"; 
		$theid	+=-32; 
	} 
	else 
		$nxt	= "00";
	if ($itype<128)  {
		$tipaj = "00";
		$theid += $itype;
	} else {
		$tipaj = "80";
		$itype += -128;
		$theid += $itype;
	}
	$itype	+= $theid;
	$itype	= sprintf("%02X",$itype,00);
	$iid 	= sprintf("%02X",$theid,00);

	if (file_exists('items/'.$tnpl.$itype.$tipaj.$nxt.'.gif'))
		$output = 'items/'.$tnpl.$itype.$tipaj.$nxt.'.gif';
	else 
		$output = 'items/00'.$itype.$tipaj.$nxt.'.gif';

	$i	= $lvl+1;	
	while ($i>0) {
		$i+=-1;
		$il=sprintf("%02X", $i, 00);
		if (file_exists('items/'.$tnpl.$itype.$tipaj.$nxt.$il.'.gif')){
			$output='items/'.$tnpl.$itype.$tipaj.$nxt.$il.'.gif';
			$i=0;
		}
			
	}
	return $output;
}




function check_account($value) {	
	global $core_db2;
	$result = $core_db2->Execute("SELECT memb___id FROM MEMB_INFO where upper(memb___id) = upper(?)", array($value));
	if (!$result->EOF) {
		return true;
	} else { 
		return false; 
	}
}


function check_mail($value) {	
	global $core_db2;
	$result = $core_db2->Execute("SELECT mail_addr FROM MEMB_INFO where upper(mail_addr) = upper(?)", array($value));
	if (!$result->EOF) {
		return true;
	} else { 
		return false; 
	}
}


  function assign_rand_value($num)
{
// accepts 1 - 36
  switch($num)
  {
    case "1":
     $rand_value = "a";
    break;
    case "2":
     $rand_value = "b";
    break;
    case "3":
     $rand_value = "c";
    break;
    case "4":
     $rand_value = "d";
    break;
    case "5":
     $rand_value = "e";
    break;
    case "6":
     $rand_value = "f";
    break;
    case "7":
     $rand_value = "g";
    break;
    case "8":
     $rand_value = "h";
    break;
    case "9":
     $rand_value = "i";
    break;
    case "10":
     $rand_value = "j";
    break;
    case "11":
     $rand_value = "k";
    break;
    case "12":
     $rand_value = "l";
    break;
    case "13":
     $rand_value = "m";
    break;
    case "14":
     $rand_value = "n";
    break;
    case "15":
     $rand_value = "o";
    break;
    case "16":
     $rand_value = "p";
    break;
    case "17":
     $rand_value = "q";
    break;
    case "18":
     $rand_value = "r";
    break;
    case "19":
     $rand_value = "s";
    break;
    case "20":
     $rand_value = "t";
    break;
    case "21":
     $rand_value = "u";
    break;
    case "22":
     $rand_value = "v";
    break;
    case "23":
     $rand_value = "w";
    break;
    case "24":
     $rand_value = "x";
    break;
    case "25":
     $rand_value = "y";
    break;
    case "26":
     $rand_value = "z";
    break;
    case "27":
     $rand_value = "0";
    break;
    case "28":
     $rand_value = "1";
    break;
    case "29":
     $rand_value = "2";
    break;
    case "30":
     $rand_value = "3";
    break;
    case "31":
     $rand_value = "4";
    break;
    case "32":
     $rand_value = "5";
    break;
    case "33":
     $rand_value = "6";
    break;
    case "34":
     $rand_value = "7";
    break;
    case "35":
     $rand_value = "8";
    break;
    case "36":
     $rand_value = "9";
    break;
  }
return $rand_value;
}

function get_rand_id($length)
{
  if($length>0) 
  { 
  $rand_id="";
   for($i=1; $i<=$length; $i++)
   {
   mt_srand((double)microtime() * 1000000);
   $num = mt_rand(1,36);
   $rand_id .= assign_rand_value($num);
   }
  }
return $rand_id;
}


function get_array_variables($varible){
	foreach ($varible as $key=>$name){
		$code[] = $key;
	}
	return $code;
}


function create_list($data){
	$data = preg_replace("[^A-Za-z0-9\,\.\']", "", $data);
	$data = preg_replace(' +','',$data);
	$data = preg_replace(',+',',',$data);
	if(substr($data, -1) == ','){
		$data= substr_replace($data,"",-1);
	}
	if(substr($data, 0,1) == ','){
		$data= substr_replace($data,"",0,1);
	}
	return $data;
}



function copydir($source,$destination){
	if ($dir = @opendir($source)) {
		while (($file = readdir($dir))!==false) {
			if($file != '.' && $file != '..'){
				echo $destination.'/'.$file.'<br>';
				copy("$source/$file","$destination/$file");
					
			}
		
			
		}
		closedir($dir);
	}
}


function full_copy( $source, $target ) {
	if ( is_dir( $source ) ) {
		@mkdir( $target );
		$d = dir( $source );
		while ( FALSE !== ( $entry = $d->read() ) ) {
			if ( $entry == '.' || $entry == '..' ) {
				continue;
			}
			$Entry = $source . '/' . $entry; 
			if ( is_dir( $Entry ) ) {
				full_copy( $Entry, $target . '/' . $entry );
				continue;
			}
			copy( $Entry, $target . '/' . $entry );
		}
 
		$d->close();
	}else {
		copy( $source, $target );
	}
}

function write_log($file,$content){
	$db = fopen($file."/".date('F_j_Y').".log", "a+");
	fwrite($db,"[".$_SERVER['REMOTE_ADDR']."][".date('F j, Y / H:i')."] ".$content."\n");
	fclose($db);
}

function fix_negative($points){
	if($points < 0){
		return 65000 + (-$points);
	}else{
		return $points;
	}
}
//------------------------------------------------------------------
function CheckUpdateOH() {
ini_set('max_execution_time',60);
global $core,$engine;

$versioncore=crypt_it($engine,'','1');
$Carpeta_Update='updates';
$Server_Update='http://mucorepremium.net/UpdaterCore/';

$getVersions = file_get_contents($Server_Update.'current-release-versions.php') or die ('ERROR');
if ($getVersions != '')
{
	$versionList = explode("\n", $getVersions);	
	foreach ($versionList as $aV)
	{
		if ( $aV > $versioncore) {
			echo ''.$aV.' - Actualiza Ahora';
			$found = true;
			break;
			}else{
			echo $aV;
			}
	}
}
}

function ChekServer($ip, $puerto) {

if ($check=@fsockopen($ip,$puerto,$ERROR_NO,$ERROR_STR,(float)0.5)) 
	{ 
	fclose($check); 
	$Estado = "<font color='green'>Online</font><br>"; 
	}
else 
	{ 
	$Estado = "<font color='red'>Offline</font><br>"; 
	}

return $Estado; // Devolver el resultado
}

//Cargar Bootstrap
function LoadCustom($nombre){
if($nombre=='bs_head'){
	echo'<link href="AOH_Addons/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">';
}
if($nombre=='bs_footer'){
	echo'<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="AOH_Addons/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>';
}
if($nombre=='fontawesome'){
	echo'<link href="AOH_Addons/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">';
}
}

?>