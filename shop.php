<?php
error_reporting(E_ALL ^E_NOTICE ^E_WARNING);
session_start(); 
ob_start();
header("Cache-control: private");
require("engine/adodb/adodb.inc.php"); //Conector SQL
require('AOH_Addons/sys/functions.inc.php'); //Web Functions
ob_end_flush();

$core_run_script="index.php?page_id=aoh_Webshop"; // DIRECCION DEL MODULO
?>
<?php

if(isset($_POST['hopt'])) {
	if($_POST['hopt'] == 'na') { echo '0'; } else {
		$select_joh_info= $core_db->Execute("Select joh_id, joh_val, joh_cost from wshopp_harmony where joh_name='".$_POST['hopt']."'");
		$check_joh_info = $select_joh_info;
		echo ''.$check_joh_info->fields[2].'';
	}
exit;
};

if(isset($_POST['plusone'])) {
	
	$count = $mvcore['dwn_click_count'] + 1;

				$new_db = fopen("AOH_Addons/sys/dwn_count.php", "w"); //configs patch 
				$data = "<?\n";
				$data .="\$mvcore['dwn_click_count'] = \"".$count."\";\n";
				$data .="?>";
				fwrite($new_db,$data); fclose($new_db);

};

if(isset($_POST['s_option'])) {
	if($_POST['s_option'] == '254') { echo '0'; } else {
		$select_soc_info= $core_db->Execute("Select sok_id, sok_name, type, sok_cost from wshopp_socket where sok_id='".$_POST['s_option']."'");
		$check_soc_info = $select_soc_info;
		echo ''.$check_soc_info->fields[3].'';
	}
exit;
};


if(isset($_POST['ancname'])) {
	
	if($_POST['ancname'] == '1') {$anc_type = '5';} else {$anc_type = '10';}
		$select_anc_info= $core_db->Execute("Select top 2 anc_type,anc_name,options,item_id,item_cat from wshopp_ancient where anc_type = '".$anc_type."' and item_id='".$_POST['idss']."' and item_cat='".$_POST['catss']."'");
		$check_anc_info = $select_anc_info;
		echo ''.$check_anc_info->fields[1].'';
	
	
exit;
};


?>

<?php if($mvcore['wshop_load'] != '1') { echo'<div class="e_note">For the moment this page is disabled, come back later!</div>'; } ?>
<?php if($mvcore['wshop_load'] == '1') { ?>
<?php


//checking all

	$link_get = $_GET['linkdata'];
	$item_name = $_GET['name'];
	$item_id = $_GET['ids'];
	$item_cat = $_GET['cat'];
	$item_exc = $_GET['exc'];
	$item_refin = $_GET['refin'];
	$item_sk = $_GET['sk'];
	$item_anc = $_GET['anc'];
	$item_ad = $_GET['ad'];
	$item_skill = $_GET['skill'];
	$item_luck = $_GET['luck'];
	$item_level = $_GET['level'];
	
$check_item = $core_db->Execute("Select name, cost, cost_zen, pay_type_gc, pay_type_c, pay_type_zen, harmony, bought_times, item_exc_type from wshopp where name='".$item_name."' and cat='".$item_cat."'");
$check_item_ok = $check_item;

if($mvcore['sockets_parts'] == 'yes') { $drop_sockets = 'where type >= 1'; }
elseif($item_cat >= '0' && $item_cat <= '5' ) { $drop_sockets = 'where type = 1'; }
elseif($item_cat >= '6' && $item_cat <= '11' ) { $drop_sockets = 'where type = 2'; };

$calc_gold_cost = $check_item_ok->fields[1] + ((- $mvcore['gold_dif'] * $check_item_ok->fields[1]) / 100) ;
$zen_cost = $check_item_ok->fields[1] * $mvcore['cost_cred_to_zen'];

//allow buy with ?
if($check_item_ok->fields[3] == '1') { $drop_costshow_gcred = '<div class="item_info"><div class="info">Price <span class="btimes" id="total_credits_g">'.floor($calc_gold_cost).'</span> <span class="goldcr">'.$mvcore['money_name2'].'</span></div></div>'; };
if($check_item_ok->fields[4] == '1') { $drop_costshow_cred = '<div class="item_info"><div class="info">Price <span class="btimes" id="total_credits">'.$check_item_ok->fields[1].'</span> <span class="normalcr">'.$mvcore['money_name1'].'</span></div></div>'; };
if($check_item_ok->fields[5] == '1') { $drop_costshow_zen = '<div class="item_info"><div class="info">Price <span class="btimes" id="total_zen">'.$zen_cost.'</span> <span class="normalcr">Zen</span></div></div>'; };

if($check_item_ok->fields[3] == '1') { $drop_cost_gcred = '<button id="gcred" type="button" class="buy_button" name="buygoldcred" value="Buy With Gold Credits" onclick="CTM_Load(\''.$core_run_script.'&null=1&cmd=true&zcore=buy_item&zcoretp=buygoldcred\', \'Command\', \'POST\',BuscaElementosForm(\'item_form\'));">'.$mvcore['money_name2'].'</button>'; };
if($check_item_ok->fields[4] == '1') { $drop_cost_cred = '<button id="tokens" type="button" class="buy_button" name="buycred" value="Buy With Tokens" onclick="CTM_Load(\''.$core_run_script.'&null=1&cmd=true&zcore=buy_item&zcoretp=buycred\', \'Command\', \'POST\',BuscaElementosForm(\'item_form\'));">'.$mvcore['money_name1'].'</button>'; };
if($check_item_ok->fields[5] == '1') { $drop_cost_zen = '<button id="tokens" type="button" class="buy_button" name="buyzen" value="Buy With Tokens" onclick="CTM_Load(\''.$core_run_script.'&null=1&cmd=true&zcore=buy_item&zcoretp=buyzen\', \'Command\', \'POST\',BuscaElementosForm(\'item_form\'));">Zen</button>'; };
//end allow buy
			
//---------------------
if($item_ad == '1') { // 1 for swords, Axe, Spears, Mace, Scepters, Bows, Crossbows,
$drop_ad_opt = '
			<div class="opt_title">Additional Damage:</div>
			<div class="opt">
				<select id="item_opt" onchange="checkall();" name="item_opt">
					<option value="0" data-info="0" selected="selected">0</option>
					<option value="1" data-info="1">4</option>
					<option value="2" data-info="2">8</option>
					<option value="3" data-info="3">12</option>
					<option value="4" data-info="4">16</option>
					<option value="5" data-info="5">20</option>
					<option value="6" data-info="6">24</option>
					<option value="7" data-info="7">28</option>
			</select>
			<span id="credits_opt">0</span> Points
			</div>
';} elseif($item_ad == '2') { // 2 for stafs, Shield, Set Items, Wings Level 1 , Wings level 2
$drop_ad_opt = '
			<div class="opt_title">Additional Defense:</div>
			<div class="opt">
				<select id="item_opt" onchange="checkall();" name="item_opt">
					<option value="0" data-info="0" selected="selected">0</option>
					<option value="1" data-info="1">4</option>
					<option value="2" data-info="2">8</option>
					<option value="3" data-info="3">12</option>
					<option value="4" data-info="4">16</option>
					<option value="5" data-info="5">20</option>
					<option value="6" data-info="6">24</option>
					<option value="7" data-info="7">28</option>
			</select>
			<span id="credits_opt">0</span> Points
			</div>
';} elseif($item_ad == '3') { // 3 for Rings, Pendant, Wings level 3
$drop_ad_opt = '
			<div class="opt_title">Automatic HP Recovery:</div>
			<div class="opt">
				<select id="item_opt" onchange="checkall();" name="item_opt">
					<option value="0" data-info="0" selected="selected">0</option>
					<option value="1" data-info="1">1%</option>
					<option value="2" data-info="2">2%</option>
					<option value="3" data-info="3">3%</option>
					<option value="4" data-info="4">4%</option>
					<option value="5" data-info="5">5%</option>
					<option value="6" data-info="6">6%</option>
					<option value="7" data-info="7">7%</option>
			</select>
			<span id="credits_opt">0</span> Points
			</div>
';} elseif($item_ad == '4') { // 4 for Rings of Magic.
$drop_ad_opt = '
			<div class="opt_title">Max Mana Increase:</div>
			<div class="opt">
				<select id="item_opt" onchange="checkall();" name="item_opt">
					<option value="0" data-info="0" selected="selected">0</option>
					<option value="1" data-info="1">1%</option>
					<option value="2" data-info="2">2%</option>
					<option value="3" data-info="3">3%</option>
					<option value="4" data-info="4">4%</option>
					<option value="5" data-info="5">5%</option>
					<option value="6" data-info="6">6%</option>
					<option value="7" data-info="7">7%</option>
			</select>
			<span id="credits_opt">0</span> Points
			</div>
';};

?>
<script>
function checkall(){
		var shopDiscStart = '<?php echo $mvcore['shop_disc_start'];?>'; // Discount Start RUN
		var shopDisc = '<?php echo $mvcore['shop_disc'];?>'; // Discount ON OFF
		var shopPerc = '<?php echo $mvcore['shop_perc'];?>'; // Discount Percent ( Without % )
		
//Item Cost
		var zenCalc = '<?php echo $mvcore['cost_cred_to_zen'];?>';
		var costItem = '<?php echo $check_item_ok->fields[1];?>';
		var costLevel = '<?php echo $mvcore['cost_level'];?>';
		var costOpt = '<?php echo $mvcore['cost_opt'];?>';
		var costLuck = '<?php echo $mvcore['cost_luck'];?>';
		var costSkill = '<?php echo $mvcore['cost_skill'];?>';
		var costRef = '<?php echo $mvcore['cost_ref'];?>';
		var costExe = '<?php echo $mvcore['cost_exe'];?>';
		var costAnc1 = '<?php echo $mvcore['cost_anc1'];?>';
		var costAnc2 = '<?php echo $mvcore['cost_anc2'];?>';
		
		var costFen1 = '<?php echo $mvcore['cost_fenblack'];?>';
		var costFen2 = '<?php echo $mvcore['cost_fenblue'];?>';
		var costFen3 = '<?php echo $mvcore['cost_fengold'];?>';

var itemCostMainZen = costItem * zenCalc;
//Separator ^^ -------------------------------------------------------------------------------------------------
	var credits 	= Math.ceil(costItem);
	var zen 		= Math.ceil(itemCostMainZen);
	var options		= 0;
//Separator ^^ -------------------------------------------------------------------------------------------------
		if ($('#item_level option:selected').length){
			if ($('#item_level option:selected').val() > 0){
				$('#credits_level').html("<b>"+$('#item_level option:selected').val()*parseInt(costLevel)+"</b>");
				credits = credits + $('#item_level option:selected').val() * parseInt(costLevel);
				zen = zen + $('#item_level option:selected').val() * parseInt(costLevel) * parseInt(zenCalc);
				setPrice(credits);
				setPriceZen(zen);
			}
			else{
				$('#credits_level').html(0);
				setPrice(credits);
				setPriceZen(zen);
			}
		}
//Separator ^^ -------------------------------------------------------------------------------------------------			
		if ($('#item_opt option:selected').length){
			if ($('#item_opt option:selected').val() > 0){	
				$('#credits_opt').html("<b>"+$('#item_opt option:selected').val()*parseInt(costOpt)+"</b>");
				credits = credits + $('#item_opt option:selected').val() * parseInt(costOpt);
				zen = zen + $('#item_opt option:selected').val() * parseInt(costOpt) * parseInt(zenCalc);
				setPrice(credits);
				setPriceZen(zen);
			}
			else{
				$('#credits_opt').html(0);
				setPrice(credits);
				setPriceZen(zen);
			}
		}
//Separator ^^ -------------------------------------------------------------------------------------------------		
		for(i = 1; i <= 6; i++){
			if($("#ex"+i+":checked")){
				if ($("#ex"+i+":checked").length > 0){
					options = options + parseInt(costExe);
				}
			}
		}
		
		if(options > 0){
			$('#credits_exe').html("<b>"+options+"</b>");
			zen = zen + options * parseInt(zenCalc);
			credits = credits + options;
			setPrice(credits);
			setPriceZen(zen);
		}
		else{
			$('#credits_exe').html(0);
			setPrice(credits);
			setPriceZen(zen);
		}
//Separator ^^ -------------------------------------------------------------------------------------------------
		if($("#item_anc option:selected")){
			if($("#item_anc option:selected").val() == 5){
				$('#credits_ancient').html("<b>"+parseInt(costAnc1)+"</b>");
				zen = zen + parseInt(costAnc1) * parseInt(zenCalc);
				credits = credits + parseInt(costAnc1);
				setPrice(credits);
				setPriceZen(zen);
			}
			else if($("#item_anc option:selected").val() == 10){
				$('#credits_ancient').html("<b>"+parseInt(costAnc2)+"</b>");
				zen = zen + parseInt(costAnc2) * parseInt(zenCalc);
				credits = credits + parseInt(costAnc2);
				setPrice(credits);
				setPriceZen(zen);
			}
			else{
				$('#credits_ancient').html(0); 
				setPrice(credits);
				setPriceZen(zen);
			}
		}
//Separator ^^ -------------------------------------------------------------------------------------------------		
		if ($("#item_luck:checked")){ 
			if ($("#item_luck:checked").length > 0){
				$('#credits_luck').html("<b>"+parseInt(costLuck)+"</b>");
				zen = zen + parseInt(costLuck) * parseInt(zenCalc) ;
				credits = credits + parseInt(costLuck);
				setPrice(credits);
				setPriceZen(zen);
			}
			else{
				$('#credits_luck').html(0);
				setPrice(credits);
				setPriceZen(zen);
			}
		}
//Separator ^^ -------------------------------------------------------------------------------------------------
		if ($('#item_harm option:selected')){
			if (($('#item_harm option:selected').val() != undefined) && ($('#item_harm option:selected').val() != '')){
				$(document).ready(function() {
					$.post("shop.php", {
							hopt: $('#item_harm').val()
					},
					function(data) {
						$('#credits_harm').html("<b>"+parseInt(data)+"</b>");
						zen = zen + parseInt(data) * parseInt(zenCalc) ;
						credits = credits + parseInt(data);
						setPrice(credits);
						setPriceZen(zen);
					});
				});		
			}
			else{
				$('#credits_harm').html(0);
				setPrice(credits);
				setPriceZen(zen);
			}
		}
//Separator ^^ -------------------------------------------------------------------------------------------------
		if($('#socket1 option:selected').length && $('#socket1 option:selected').val() != 'no'){
			$(document).ready(function(){
				$.post("shop.php", {
					s_option: $('#socket1 option:selected').data('info'),
					//$(elemento).find(':selected').data('info');			
				},
				function(data) {
					$('#credits_socket1').html("<b>"+parseInt(data)+"</b>");
					credits = credits + parseInt(data);
					setPrice(credits);
					zen = zen + parseInt(data) * parseInt(zenCalc) ;
					setPriceZen(zen);
				});
			});	
			removeOpt(1);	
		}
		if($('#socket2 option:selected').length && $('#socket2 option:selected').val() != 'no'){
			$(document).ready(function(){
				$.post("shop.php", {
					s_option: $('#socket2 option:selected').data('info'),			
				},
				function(data) {
					$('#credits_socket2').html("<b>"+parseInt(data)+"</b>");
					credits = credits + parseInt(data);
					setPrice(credits);
					zen = zen + parseInt(data) * parseInt(zenCalc) ;
					setPriceZen(zen);
				});
			});	
			removeOpt(2);	
		}
		if($('#socket3 option:selected').length && $('#socket3 option:selected').val() != 'no'){
			$(document).ready(function(){
				$.post("shop.php", {
					s_option: $('#socket3 option:selected').data('info'),			
				},
				function(data) {
					$('#credits_socket3').html("<b>"+parseInt(data)+"</b>");
					credits = credits + parseInt(data);
					setPrice(credits);
					zen = zen + parseInt(data) * parseInt(zenCalc) ;
					setPriceZen(zen);
				});
			});	
			removeOpt(3);	
		}
		if($('#socket4 option:selected').length && $('#socket4 option:selected').val() != 'no'){
			$(document).ready(function(){
				$.post("shop.php", {
					s_option: $('#socket4 option:selected').data('info'),			
				},
				function(data) {
					$('#credits_socket4').html("<b>"+parseInt(data)+"</b>");
					credits = credits + parseInt(data);
					setPrice(credits);
					zen = zen + parseInt(data) * parseInt(zenCalc) ;
					setPriceZen(zen);
				});
			});	
			removeOpt(4);	
		}
		if($('#socket5 option:selected').length && $('#socket5 option:selected').val() != 'no'){
			$(document).ready(function(){
				$.post("shop.php", {
					s_option: $('#socket5 option:selected').data('info'),			
				},
				function(data) {
					$('#credits_socket5').html("<b>"+parseInt(data)+"</b>");
					credits = credits + parseInt(data);
					setPrice(credits);
					zen = zen + parseInt(data) * parseInt(zenCalc) ;
					setPriceZen(zen);
				});
			});	
			removeOpt(5);		
		}
//Separator ^^ -------------------------------------------------------------------------------------------------		
		if ($("#item_skill:checked")){ 
			if ($("#item_skill:checked").length > 0){
				$('#credits_skill').html("<b>"+parseInt(costSkill)+"</b>");
				zen = zen + parseInt(costSkill) * parseInt(zenCalc);
				credits = credits + parseInt(costSkill);
				setPrice(credits);
				setPriceZen(zen);
			}
			else{
				$('#credits_skill').html(0);
				setPrice(credits);
				setPriceZen(zen);
			}
		}
//Separator ^^ -------------------------------------------------------------------------------------------------		
		if ($("#item_ref:checked")){
			if ($("#item_ref:checked").length > 0){
				$('#credits_ref').html("<b>"+parseInt(costRef)+"</b>");
				zen = zen + parseInt(costRef) * parseInt(zenCalc);
				credits = credits + parseInt(costRef);
				setPrice(credits);
				setPriceZen(zen);
			}
			else{
				$('#credits_ref').html(0);
				setPrice(credits);
				setPriceZen(zen);
			}
		}	
//Separator ^^ -------------------------------------------------------------------------------------------------
		if($("#fenrir1:checked")){
			if ($("#fenrir1:checked").length > 0){
				$('#credits_fenrir1').html("<b>"+parseInt(costFen1)+"</b>");
				zen = zen + parseInt(costFen1) * parseInt(zenCalc);
				credits = credits + parseInt(costFen1);
				setPrice(credits);
				setPriceZen(zen);
			}
			else{
				$('#credits_fenrir1').html(0);
				setPrice(credits);
				setPriceZen(zen);
			}
		}
//Separator ^^ -------------------------------------------------------------------------------------------------		
		if($("#fenrir2:checked")){
			if ($("#fenrir2:checked").length > 0){
				$('#credits_fenrir2').html("<b>"+parseInt(costFen2)+"</b>");
				zen = zen + parseInt(costFen2) * parseInt(zenCalc);
				credits = credits + parseInt(costFen2);
				setPrice(credits);
				setPriceZen(zen);
			}
			else{
				$('#credits_fenrir2').html(0);
				setPrice(credits);
				setPriceZen(zen);
			}
		}
//Separator ^^ -------------------------------------------------------------------------------------------------		
		if($("#fenrir3:checked")){
			if ($("#fenrir3:checked").length > 0){
				$('#credits_fenrir3').html("<b>"+parseInt(costFen3)+"</b>");
				zen = zen + parseInt(costFen3) * parseInt(zenCalc);
				credits = credits + parseInt(costFen3);
				setPrice(credits);
				setPriceZen(zen);
			}
			else{
				$('#credits_fenrir3').html(0);
				setPrice(credits);
				setPriceZen(zen);
			}
		}
//Separator ^^ -------------------------------------------------------------------------------------------------
}
		
function setPrice(credits){
		var shopDiscStart = '<?php echo $mvcore['shop_disc_start'];?>'; // Discount Start RUN
		var shopDisc = '<?php echo $mvcore['shop_disc'];?>'; // Discount ON OFF
		var shopPerc = '<?php echo $mvcore['shop_perc'];?>'; // Discount Percent ( Without % )
		
	var goldDif = '<?php echo $mvcore['gold_dif'];?>';
	
	if(shopDisc == "on"){
		if(shopDiscStart == 1){
			var credits = Math.floor(credits + ((- shopPerc * credits) / 100));
			$('#total_credits').html(credits);
			$('#total_credits_g').html(Math.floor(credits + (( - goldDif * credits) / 100)));
		} else {
			$('#total_credits').html(credits);
			$('#total_credits_g').html(Math.floor(credits + (( - goldDif * credits) / 100)));
		}
	} else {
		$('#total_credits').html(credits);
		$('#total_credits_g').html(Math.floor(credits + (( - goldDif * credits) / 100)));
	}
}

function setPriceZen(zen){
		var shopDiscStart = '<?php echo $mvcore['shop_disc_start'];?>'; // Discount Start RUN
		var shopDisc = '<?php echo $mvcore['shop_disc'];?>'; // Discount ON OFF
		var shopPerc = '<?php echo $mvcore['shop_perc'];?>'; // Discount Percent ( Without % )
		
	if(shopDisc == "on"){
		if(shopDiscStart == 1){
			var zen = Math.floor(zen + ((- shopPerc * zen) / 100));
			if(zen >= '2000000000') { $('#total_zen').html("2000000000"); } else {
				$('#total_zen').html(zen);
			}
		} else {
			if(zen >= '2000000000') { $('#total_zen').html("2000000000"); } else {
				$('#total_zen').html(zen);
			}
		}
	} else {
		if(zen >= '2000000000') { $('#total_zen').html("2000000000"); } else {
			$('#total_zen').html(zen);
		}
	}
}

function removeOpt(socket){
		if($('#socket'+socket+' option:selected').val() != '254' && $('#socket'+socket+' option:selected').val() != 'no'){
			for(i = 1; i <= 5; i++){
				if(i == socket)
					i += 1;
				
				var eqeSocketsdd = '<?php echo $mvcore['eqe_sockets'];?>';
				
				if(eqeSocketsdd == 'yes') {
				} else {
					$("#socket"+i+" > option[value='"+$('#socket'+socket+' option:selected').val()+"']").remove();
					$("#socket"+i+" > option[value='"+$('#socket'+socket+' option:selected').val()+"']").remove();
					$("#socket"+i+" > option[value='"+$('#socket'+socket+' option:selected').val()+"']").remove();
					$("#socket"+i+" > option[value='"+$('#socket'+socket+' option:selected').val()+"']").remove();
				}
			}
		}		
}

function ocultardiv(){
document.getElementById('dropitemhtmls').style.display = 'none';
}

</script>
<div id="dropitemhtmls" title="<?php echo $check_item_ok->fields[0];?>">
<form method="POST" name="item_form" id="item_form">
<input type="hidden" name="buy_item" value="<?php echo $check_item_ok->fields[0];?>">
<?php if($mvcore['shop_disc'] == 'on'){ if($mvcore['shop_disc_start'] == 1) { echo'<center><h3><b>Webshop Discount '.$mvcore['shop_perc'].'% FOR ONE HOUR !! Buy While Can.</b></h3></center>'; } }; ?>
	<div id="item_buy">
		<div id="item_buy_left">
			<div id="idistest">
				<div id="item_image_bg">
					<img src="AOH_Addons/images/webshop/item_images/<?php echo $item_cat;?>/<?php echo $item_id;?>.gif" alt="" style="border: 0px;">
				</div>
			</div>
			<div class="item_info">
				<div class="info">
					Bought <span class="btimes" id="total_bought"><?php echo $check_item_ok->fields[7];?></span> Times
				</div>
			</div>
			<?php echo $drop_costshow_gcred;?>
			<?php echo $drop_costshow_cred;?>
			<?php echo $drop_costshow_zen;?>
		</div>
		<div id="item_buy_right">
		
		<?php if($item_level >= '1') { ?>
			<div class="opt_title">Item Level:</div>
			<div class="opt">
				<select id="item_level" onchange="checkall();" name="item_level">
					<option value="0" data-info="0" selected="selected">+ 0</option>
							<?php
								for($i=0;$i < $item_level;++$i) {
									$value = $i + 1;
									echo'<option value="'.$value.'" data-info="'.$value.'">+ '.$value.'</option>';
								};
							?>
				</select>
				<span id="credits_level">0</span> Points
			</div>
		<?php } ?>
		<?php if($item_ad >= '1') { ?>
			<?php echo $drop_ad_opt;?>
		<?php } ?>
		
		<?php if($item_luck >= '1') { ?>
			<div class="opt_title">Item Luck:</div>
			<div class="opt">
				<input id="item_luck" onclick="checkall();" name="item_luck" value="1" type="checkbox"> 
				<span id="credits_luck">0</span> Points
			</div>
		<?php } ?>	
		
		<?php if($item_skill >= '1') { ?>
			<div class="opt_title">Item Skill:</div>
			<div class="opt">
				<input id="item_skill" onclick="checkall();" name="item_skill" value="1" type="checkbox"> 
				<span id="credits_skill">0</span> Points
			</div>
		<?php } ?>	
		
		<?php if($item_refin >= '1') { ?>
			<div class="opt_title">Refinery Option:</div>
			<div class="opt">
				<input id="item_ref" onclick="checkall();" name="item_ref" value="1" type="checkbox"> 
				<span id="credits_ref">0</span> Points
			</div>
		<?php } ?>		
			
			<?php if($check_item_ok->fields[6] >= '1') { ?>
			<div class="opt_title">Harmony Option:</div>
			<div class="opt">
				<select id="item_harm" onchange="checkall();" name="item_harm">
					<option value="na" data-info="na" selected="selected"> - Select - </option>
					<?php 
					if($check_item_ok->fields[6] == '1') { // 1 for Swords

						$select_joh_info= $core_db->Execute("Select top 99 joh_name from wshopp_harmony where joh_type='1'");

						$i=0;
						while (!$select_joh_info->EOF){
						$i++;
						$value = $i + 1;
						$s_joh_i= $select_joh_info;
						echo'<option value="'.$s_joh_i->fields[0].'" data-info="'.$s_joh_i->fields[0].'">'.$s_joh_i->fields[0].'</option>'; 
						$select_joh_info->MoveNext();
						};


					} elseif($check_item_ok->fields[6] == '2') { // 2 for staffs
						$select_joh_info= $core_db->Execute("Select top 99 joh_name from wshopp_harmony where joh_type='2'");

						$i=0;
						while (!$select_joh_info->EOF){
						$i++;
						$value = $i + 1;
						$s_joh_i= $select_joh_info;
						echo'<option value="'.$s_joh_i->fields[0].'" data-info="'.$s_joh_i->fields[0].'">'.$s_joh_i->fields[0].'</option>'; 
						$select_joh_info->MoveNext();
						};

					} elseif($check_item_ok->fields[6] == '3') { // 3 for sets & shields
						$select_joh_info= $core_db->Execute("Select top 99 joh_name from wshopp_harmony where joh_type='3'");

						$i=0;
						while (!$select_joh_info->EOF){
						$i++;
						$value = $i + 1;
						$s_joh_i= $select_joh_info;
						echo'<option value="'.$s_joh_i->fields[0].'" data-info="'.$s_joh_i->fields[0].'">'.$s_joh_i->fields[0].'</option>'; 
						$select_joh_info->MoveNext();
						};
					}
					?>
				</select>
				<span id="credits_harm">0</span> Points
			</div>
			<?php } ?>
			
			<?php if($item_anc == '1') { ?>
			<div class="opt_title">Ancient Set:</div>
			<div class="opt">
				<select id="item_anc" onchange="checkall();" name="item_anc">
					<option value="na" data-info="na" selected="selected"> - Select - </option>
							<?php
								$select_anc_info= $core_db->Execute("Select top 2 anc_type,anc_name,options,item_id,item_cat from wshopp_ancient where item_id='".$item_id."' and item_cat='".$item_cat."'");

								$i=0;
								while (!$select_anc_info->EOF){
								$i++;

								$s_anc_i= $select_anc_info;
								echo'<option value="'.$s_anc_i->fields[0].'" data-info="'.$s_anc_i->fields[0].'">Set '.$s_anc_i->fields[1].'</option>';

								$select_anc_info->MoveNext();
								};

							?>
				</select>
				<span id="credits_ancient">0</span> Points
			</div>
			<?php } ?>
			
				<?php if($check_item_ok->fields[8] == '5') { // 5 for Fenrirs ?> 	
					<div class="opt_title">Fenrir +Damage (Black)</div>
					<div class="opt"><input id="fenrir1" name="fenrir1" onclick="checkall();" value="1" type="radio"> <span id="credits_fenrir1">0</span> Points</div>
					<div class="opt_title">Fenrir +Defense (Blue)</div>
					<div class="opt"><input id="fenrir2" name="fenrir1" onclick="checkall();" value="2" type="radio"> <span id="credits_fenrir2">0</span> Points</div>
					<div class="opt_title">Fenrir +Illusion (Gold)</div>
					<div class="opt"><input id="fenrir3" name="fenrir1" onclick="checkall();" value="4" type="radio"> <span id="credits_fenrir3">0</span> Points</div>
				<?php } ?>
<?php 
if($check_item_ok->fields[8] == '0') { // 0 for Weapons Pendants
			if($item_exc >= '1') { echo'
							<div class="opt_title">Increases Mana After monster +Mana/8</div>
							<div class="opt"><input id="ex1" onclick="checkall();" name="exe1" value="1" type="checkbox"></div>
			';};
			if($item_exc >= '2') { echo'
							<div class="opt_title">Increases Life After monster +Life/8</div>
							<div class="opt"><input id="ex2" onclick="checkall();" name="exe2" value="2" type="checkbox"></div>
			';};
			if($item_exc >= '3') { echo'
							<div class="opt_title">Increase attacking(wizardly)speed+7</div>
							<div class="opt"><input id="ex3" onclick="checkall();" name="exe3" value="3" type="checkbox"></div>
			';};
			if($item_exc >= '4') { echo'
							<div class="opt_title">Increase Damage +2%</div>
							<div class="opt"><input id="ex4" onclick="checkall();" name="exe4" value="4" type="checkbox"></div>
			';};
			if($item_exc >= '5') { echo'
							<div class="opt_title">Increase Damage +level/20</div>
							<div class="opt"><input id="ex5" onclick="checkall();" name="exe5" value="5" type="checkbox"></div>
			';};
			if($item_exc >= '6') { echo'
							<div class="opt_title">Excellent Damage Rate +10%</div>
							<div class="opt"><input id="ex6" onclick="checkall();" name="exe6" value="6" type="checkbox"></div>
			';};
} elseif($check_item_ok->fields[8] == '1') { // 1 for Shield & Set Parts
			if($item_exc >= '1') { echo'
							<div class="opt_title">Increase MaxHP +4%</div>
							<div class="opt"><input id="ex1" onclick="checkall();" name="exe6" value="6" type="checkbox"></div>
			';};
			if($item_exc >= '2') { echo'
							<div class="opt_title">Increase MaxMana +4%</div>
							<div class="opt"><input id="ex2" onclick="checkall();" name="exe5" value="5" type="checkbox"></div>
			';};
			if($item_exc >= '3') { echo'
							<div class="opt_title">Damage decrease +4%</div>
							<div class="opt"><input id="ex3" onclick="checkall();" name="exe4" value="4" type="checkbox"></div>
			';};
			if($item_exc >= '4') { echo'
							<div class="opt_title">Reflect damage +5%</div>
							<div class="opt"><input id="ex4" onclick="checkall();" name="exe3" value="3" type="checkbox"></div>
			';};
			if($item_exc >= '5') { echo'
							<div class="opt_title">Defense success rate +10%</div>
							<div class="opt"><input id="ex5" onclick="checkall();" name="exe2" value="2" type="checkbox"></div>
			';};
			if($item_exc >= '6') { echo'
							<div class="opt_title">Increase Zen After Hunt +40%</div>
							<div class="opt"><input id="ex6" onclick="checkall();" name="exe1" value="1" type="checkbox"></div>
			';};
} elseif($check_item_ok->fields[8] == '2') { // 2 Wings level 1 & 2
			if($item_exc >= '1') { echo'
							<div class="opt_title">HP +115 Increase</div>
							<div class="opt"><input id="ex1" onclick="checkall();" name="exe1" value="1" type="checkbox"></div>
			';};
			if($item_exc >= '2') { echo'
							<div class="opt_title">MP +115 Increase</div>
							<div class="opt"><input id="ex2" onclick="checkall();" name="exe2" value="2" type="checkbox"></div>
			';};
			if($item_exc >= '3') { echo'
							<div class="opt_title">Ignore enemys defensive power by 3%</div>
							<div class="opt"><input id="ex3" onclick="checkall();" name="exe3" value="3" type="checkbox"></div>
			';};
			if($item_exc >= '4') { echo'
							<div class="opt_title">Max AG +50 Increase</div>
							<div class="opt"><input id="ex4" onclick="checkall();" name="exe4" value="4" type="checkbox"></div>
			';};
			if($item_exc >= '5') { echo'
							<div class="opt_title">Increase attacking(wizardly)speed+5</div>
							<div class="opt"><input id="ex5" onclick="checkall();" name="exe5" value="5" type="checkbox"></div>
			';};
} elseif($check_item_ok->fields[8] == '3') { // 3 Wings level 3
			if($item_exc >= '1') { echo'
							<div class="opt_title">Ingore opponents defensive power by 5%</div>
							<div class="opt"><input id="ex1" onclick="checkall();" name="exe1" value="1" type="checkbox"></div>
			';};
			if($item_exc >= '2') { echo'
							<div class="opt_title">Returns the enemys attack power in 5%</div>
							<div class="opt"><input id="ex2" onclick="checkall();" name="exe2" value="2" type="checkbox"></div>
			';};
			if($item_exc >= '3') { echo'
							<div class="opt_title">Complete recovery of life in 5% rate</div>
							<div class="opt"><input id="ex3" onclick="checkall();" name="exe3" value="3" type="checkbox"></div>
			';};
			if($item_exc >= '4') { echo'
							<div class="opt_title">Complete recover of Mana in 5% rate</div>
							<div class="opt"><input id="ex4" onclick="checkall();" name="exe4" value="4" type="checkbox"></div>
			';};
} elseif($check_item_ok->fields[8] == '4') { // 4 Rings
			if($item_exc >= '1') { echo'
							<div class="opt_title">Increase MaxHP +4%</div>
							<div class="opt"><input id="ex1" onclick="checkall();" name="exe6" value="6" type="checkbox"></div>
			';};
			if($item_exc >= '2') { echo'
							<div class="opt_title">Increase MaxMana +4%</div>
							<div class="opt"><input id="ex2" onclick="checkall();" name="exe5" value="5" type="checkbox"></div>
			';};
			if($item_exc >= '3') { echo'
							<div class="opt_title">Damage decrease +4%</div>
							<div class="opt"><input id="ex3" onclick="checkall();" name="exe4" value="4" type="checkbox"></div>
			';};
			if($item_exc >= '4') { echo'
							<div class="opt_title">Reflect damage +5%</div>
							<div class="opt"><input id="ex4" onclick="checkall();" name="exe3" value="3" type="checkbox"></div>
			';};
			if($item_exc >= '5') { echo'
							<div class="opt_title">Defense success rate +10%</div>
							<div class="opt"><input id="ex5" onclick="checkall();" name="exe2" value="2" type="checkbox"></div>
			';};
			if($item_exc >= '6') { echo'
							<div class="opt_title">Increase Zen After Hunt +40%</div>
							<div class="opt"><input id="ex6" onclick="checkall();" name="exe1" value="1" type="checkbox"></div>
			';};
};
?>
					
			<?php if($item_exc >= '1') { ?>
			<div class="opt_title">Exe Price:</div>
			<div class="opt"><span id="credits_exe">0</span> Points</div>
			<?php } ?>
		<?php
		//FIX CODIGO EMPTY SOCKET
		if($mvcore['socket_type'] == 'scfmt'){
			$fixsocketnull=254;
		}else{
			$fixsocketnull=255;
		}
		?>
		<?php if($item_sk >= '1') { ?>
			<div class="opt_title">Socket 1:</div>
			<div class="opt">
				<select name="socket1" onchange="checkall();" id="socket1">
							<option value="254" data-info="<?php echo $fixsocketnull; ?>">EMPTY (No Mounting Socket)</option>
					<?php
						$select_sk_info= $core_db->Execute("Select sok_name, sok_id, cat from wshopp_socket ".$drop_sockets."");

						$i=0;
						while (!$select_sk_info->EOF){
						$i++;
						$value = $i;
						echo'<option value="'.$select_sk_info->fields[2].'" data-info="'.$select_sk_info->fields[1].'">'.$select_sk_info->fields[0].'</option>';
						$select_sk_info->MoveNext();
						};
					?>
				</select>
				<span id="credits_socket1">0</span> Points
			</div>
		<?php } ?>
		<?php if($item_sk >= '2') { ?>
			<div class="opt_title">Socket 2:</div>
			<div class="opt">
				<select name="socket2" onchange="checkall();" id="socket2">
							<option value="254" data-info="<?php echo $fixsocketnull; ?>">EMPTY (No Mounting Socket)</option>
					<?php
						$select_sk_info= $core_db->Execute("Select sok_name, sok_id, cat from wshopp_socket ".$drop_sockets."");

						$i=0;
						while (!$select_sk_info->EOF){
						$i++;
						echo'<option value="'.$select_sk_info->fields[2].'" data-info="'.$select_sk_info->fields[1].'">'.$select_sk_info->fields[0].'</option>';
						$select_sk_info->MoveNext();
						};
					?>
				</select>
				<span id="credits_socket2">0</span> Points
			</div>
		<?php } ?>
		<?php if($item_sk >= '3') { ?>
			<div class="opt_title">Socket 3:</div>
			<div class="opt">
				<select name="socket3" onchange="checkall();" id="socket3">
							<option value="254" data-info="<?php echo $fixsocketnull; ?>">EMPTY (No Mounting Socket)</option>
					<?php
						$select_sk_info= $core_db->Execute("Select sok_name, sok_id, cat from wshopp_socket ".$drop_sockets."");

						$i=0;
						while (!$select_sk_info->EOF){
						$i++;
						echo'<option value="'.$select_sk_info->fields[2].'" data-info="'.$select_sk_info->fields[1].'">'.$select_sk_info->fields[0].'</option>';
						$select_sk_info->MoveNext();
						};
					?>
				</select>
				<span id="credits_socket3">0</span> Points
			</div>
		<?php } ?>
		<?php if($item_sk >= '4') { ?>
			<div class="opt_title">Socket 4:</div>
			<div class="opt">
				<select name="socket4" onchange="checkall();" id="socket4">
							<option value="254" data-info="<?php echo $fixsocketnull; ?>">EMPTY (No Mounting Socket)</option>
					<?php
						$select_sk_info= $core_db->Execute("Select sok_name, sok_id, cat from wshopp_socket ".$drop_sockets."");

						$i=0;
						while (!$select_sk_info->EOF){
						$i++;
						echo'<option value="'.$select_sk_info->fields[2].'" data-info="'.$select_sk_info->fields[1].'">'.$select_sk_info->fields[0].'</option>';
						$select_sk_info->MoveNext();
						};
					?>
				</select>
				<span id="credits_socket4">0</span> Points
			</div>
		<?php } ?>
		<?php if($item_sk >= '5') { ?>
			<div class="opt_title">Socket 5:</div>
			<div class="opt">
				<select name="socket5" onchange="checkall();" id="socket5">
							<option value="254" data-info="<?php echo $fixsocketnull; ?>">EMPTY (No Mounting Socket)</option>
					<?php
						$select_sk_info= $core_db->Execute("Select sok_name, sok_id, cat from wshopp_socket ".$drop_sockets."");

						$i=0;
						while (!$select_sk_info->EOF){
						$i++;
						echo'<option value="'.$select_sk_info->fields[2].'" data-info="'.$select_sk_info->fields[1].'">'.$select_sk_info->fields[0].'</option>';
						$select_sk_info->MoveNext();
						};
					?>
				</select>
				<span id="credits_socket5">0</span> Points
			</div>
		<?php } ?>
			
		</div>
	</div>	
	<div id="buy_buttons">
			<?php echo $drop_cost_gcred;?>
			<?php echo $drop_cost_cred;?>
			<?php echo $drop_cost_zen;?>
	</div>
	<div>
	<button style="width:120px;visibility: hidden;" class="input-main" type="button" onclick="ocultardiv();">Cerrar Ventana</button>
	</div>
	<div id="Command"></div>
	<div style="clear:both;"></div>
</form>
</div>
<?php } ?>