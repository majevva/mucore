<?php
if($CoD3e4rN0lCl_xF2S3A52CvZ !='x"CwFhks26N|*zgf93NS'){
	echo msg('0','Necesitas MuCore Premium para utilizar este Template <br> Compra tu Licencia en: <a href="https://www.facebook.com/AOHOSTPeru/">https://www.facebook.com/AOHOSTPeru/</a>');
}else{
?>
<? include("config/AOH_Template.php"); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?=build_header_seo(); ?>
<title><?=build_header_title(); ?></title>
<META NAME="description" CONTENT="Mu Core Premium 2.0">
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script src="js/core_global.js" language="javascript" type="text/javascript"></script>
<script src="template/<?=$core['config']['template'] ?>/js/jquery.cslider.js" type="text/javascript"></script>
<script src="template/<?=$core['config']['template'] ?>/js/jquery-1.7.1.min.js" type="text/javascript"></script>
<script src="template/<?=$core['config']['template'] ?>/js/modernizr.custom.28468.js" type="text/javascript"></script>

<!-- Bootstrap -->
<?=LoadCustom('bs_head');?>
<?=LoadCustom('fontawesome');?>
<link rel="stylesheet" href="template/<?=$core['config']['template'] ?>/css/aohost.css" type="text/css" media="all" />
<link rel="stylesheet" href="template/<?=$core['config']['template'] ?>/css/nav.css" type="text/css" media="all" />
<link rel="SHORTCUT ICON" href="template/<?=$core['config']['template'] ?>/images/webicon.ico"/>
  <!-- Modificaciones Custom -->
<link rel="stylesheet" href="template/<?=$core['config']['template'] ?>/css/custom.css" type="text/css" media="all" /> 
	<!-- Skitter Styles -->
	<link href="template/<?=$core['config']['template'] ?>/css/skitter.styles.css" type="text/css" media="all" rel="stylesheet" />
	<!-- Skitter JS -->
	<script type="text/javascript" language="javascript" src="template/<?=$core['config']['template'] ?>/js/jquery-1.6.3.min.js"></script>
	<script>
       var jQuery163 = jQuery.noConflict();
       window.jQuery = jQuery163;
     </script>
	<script type="text/javascript" language="javascript" src="template/<?=$core['config']['template'] ?>/js/jquery.easing.1.3.js"></script>
	<script type="text/javascript" language="javascript" src="template/<?=$core['config']['template'] ?>/js/jquery.animate-colors-min.js"></script>
	<script type="text/javascript" language="javascript" src="template/<?=$core['config']['template'] ?>/js/jquery.skitter.min.js"></script>
	<script type="text/javascript" language="javascript" src="template/<?=$core['config']['template'] ?>/js/reloj.js"></script>

	<script type="text/javascript">
			var currenttime = '<? echo date('F j, Y H:i:s');?>';
			var montharray = new Array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
			var serverdate = new Date(currenttime);

			function padlength(what) {
				var output = (what.toString().length==1) ? "0" + what : what;
				return output; 
			}

			function displaytime() {
				serverdate.setSeconds(serverdate.getSeconds()+1);
				var datestring = montharray[serverdate.getMonth()] + " "+ padlength(serverdate.getDate()) + ", " + serverdate.getFullYear();
				var timestring = padlength(serverdate.getHours()) + ":" + padlength(serverdate.getMinutes()) + ":" + padlength(serverdate.getSeconds());
				document.getElementById("servertime").innerHTML = "Horario del Servidor<br />" + datestring + " " + timestring;
			}

			
		</script>
	<!-- Init Skitter -->
	<script type="text/javascript" language="javascript">
		jQuery163(document).ready(function() {
			jQuery163('.box_skitter_large').skitter({
				theme: 'default',
				numbers_align: 'center',
				progressbar: false, 
				dots: false, 
				preview: false
			});
		});
	</script>

	
</head>
<body>

<!--HEADER-->
<div class="main-header">
			<div class="main-logo">

			</div>
		</div>

<div class="main-navbar">
			<div class="main-navbar-container">
			<ul class="left">
				<li><a href="<? echo $core['config']['website_url'];?>">Inicio</a></li>
				<li><a href="<?=$config_template->Registro;?>">Registro</a></li>
				<li><a href="<?=$config_template->Descargas;?>">Descargas</a></li>
				<li><a href="<?=$config_template->Foro;?>">Foro</a></li>
			</ul>
			<ul class="right">
				<li><a href="<?=$config_template->WebShop;?>">WebShop</a></li>
				<li><a href="<?=$config_template->Rankings;?>">Rankings</a></li>
				<li><a href="<?=$config_template->CastleSiege;?>">Castle</a></li>
				<li><a href="<?=$config_template->Facebook;?>" target="_blank">Facebook</a></li>
			</ul>
			</div>
</div>


<?php 
if ($_GET['page_id']==''){
?>

<div class="home-main-content">
	<div class="left-side">
		<div class="left-side-container">
<!--LOGIN BOX-->
<?
		  if($user_login == '1'){
		  	header ("Location: index.php?page_id=user_cp");
		  }else{
		  	echo '<div class="login-box">
<form method="post" action="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.LOGIN_CMS_PAGE.'" name="uss_login_form">
<input type="text" name="uss_id" maxlength="25" class="login-username" placeholder="username">
<input type="password" name="uss_password" class="login-password" placeholder="password" maxlength="12"><br>
<button type="submit" id="submit" value="ok" class="login-submit" style="cursor:pointer;"></button>
<input type="hidden" name="process_login"><br>
</form>
</div>';
		  }
		  ?>
<!--FIN LOGIN BOX-->
						<div class="left-text-container">
				<p>Welcome to <span style="color:#d6be93;"><? echo $config_template->Nombre; ?></span></p>
				<p><? echo $config_template->Version; ?></p>
				<div class="left-text-container-newsblock">
<?
$Notis_file = array_reverse(file('engine/variables_mods/news.tDB'));
?>
					<span class="newsheader">Latest News:</span>

					<table class="newstable">
					<tbody>
<?
foreach ($Notis_file as $iN_Data_full){
		$iN_Data_full = explode(",",$iN_Data_full);
		if($iN_Data_full[8] == '1'){
		echo '
					<tr>
						<td class="newstitle">
							<a href="'.$core_run_script.'&iN='.$iN_Data_full[0].'#news-'.$iN_Data_full[0].'">
							'.htmlentities($iN_Data_full[2]).'</a>
						</td>
						<td class="newsdate">'.date('M j',$iN_Data_full[4]).'</td>
					</tr>
		';
		}
		
	}
?>
					</tbody>
					</table>
									</div>
			</div>
		</div>
	</div>
	<div class="middle">
		<div class="middle-container">
			<a href="<?=$config_template->Registro;?>" class="register-button"></a>
			
			<div class="home-rankings-container">
				
				<div class="home-rankings">
				<!-- Nav tabs -->
				<table class="abysstable">
				<tbody>
				<tr>
				<th>Name</th>
				<th>Resets</th>
				<th>Level</th>
				<th></th>
				<th></th>
				</tr>
<?
$Chars=$core_db->Execute("select TOP 10 Name,cLevel,".AOH_Resets_column." from Character Where ctlcode !='32' and ctlcode !='8' order by ".AOH_Resets_column." desc, cLevel desc");
$count=1;
while(!$Chars->EOF){
$count0=$count++;
?>
				<tr>
				<td><?=$Chars->fields[0];?></td>
				<td><?=$Chars->fields[2];?></td>
				<td><?=$Chars->fields[1];?></td>
				<td></td>
				<td></td>
				</tr>
<?
$Chars->MoveNext();
}
?> 
				</tbody></table>

				</div>
				
			</div>
		</div>
	</div>

<script type="text/javascript">
				var csTimeStamp = <? echo strtotime($config_template->castle_siege_anio.'-'.$config_template->castle_siege_mes.'-'.$config_template->castle_siege_dia.' '.$config_template->castle_siege_hora.':'.$config_template->castle_siege_minuto);?>;
				function displayCountdown() {
					var timestamp = Math.floor((new Date().getTime())/1000);
					var input_timestamp = csTimeStamp-timestamp;
					if(input_timestamp >= 1) {
						var hours_module = input_timestamp % 3600;
						var hours = (input_timestamp-hours_module)/3600;
						var minutes_module = hours_module % 60;
						var minutes = (hours_module-minutes_module)/60;
						var seconds = minutes_module;
					} else {
						var hours = 0;
						var minutes = 0;
						var seconds = 0;
					}
					document.getElementById("cscountdown").innerHTML = hours + "<span>h</span> " + minutes + "<span>m</span> " + seconds + "<span>s</span>";
				}
				window.onload = function() {
				setInterval("displayCountdown()", 1000);
			}
			</script>

	<div class="right-side">
		<div class="right-side-container">
			<a href="<?=$config_template->Descargas;?>" class="download-button"></a>
			
			<div class="connect-title"></div>
			<div class="right-text-container">

			<div class="row show-grid">
    			<div class="col-md-6">
    			<img src="get.php?aL=<? echo urlencode(bin2hex(CastleInfoGuild(CastleQuerry(0),0))); ?>" width="110" height="110">
    			</div>
    			<div class="col-md-6">
    				<p><span style="color:#d6be93;font-size:16px;">
    				Clan Ganador:</span> <br>
    				<? echo CastleQuerry(0);?></p>
    				<p><span style="color:#d6be93;font-size:16px;">
    				Master Clan:</span> <br>
    				<? echo CastleInfoGuild(CastleQuerry(0),1);?></p>
    			</div>
  			</div>

  			<div class="row show-grid">
    			<div style="text-align: center;padding-top: 30px;">
    				<span style="color:#d6be93;font-size:16px;">Proxima Batalla</span><br>
					<span class="cs-timeleft" id="cscountdown">0<span>h</span> 0<span>m</span> 0<span>s</span></span>
    			</div>
    		</div>

			</div>
		</div>
	</div>
</div>


<?
}else{
?>

<!--CONTENIDO-->
<div id="l_centered">
	<div class="main-content-container">

<div id="caja1">

<div class="block tops">		   
		  <?
		  if($user_login == '1'){
		  	echo '<div class="usercp-block">

<div class="container">';
		$m_uss_row_ = get_sort('engine/cms_data/mods_uss.cms',',');
 	 	$count_m_uss = 0;
		foreach ($m_uss_row_ as $tr){
			@explode(",",$tr);
			$count_m_uss++;
			if($tr[6] == '1'){
				if($tr[3] != ACCOUNTSETTINGS_CMS_USER){
					$num_ico_rndn=rand(0, 9);
					echo '<div class="item">
					<div class="itemicon">
					<img src="template/'.$core['config']['template'].'/images/icons/'.$num_ico_rndn.'.png"></div>
					<div class="itemlink">
					<a href="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.USER_CMS_PAGE.'&'.USER_GET_PAGE.'='.$tr[3].'">'.str_replace($menu_links_title,$menu_links_translated,$tr[2]).'</a>
					</div>
					</div>
					<div class="separator"></div>
					';
				}
				
			}
		}
		echo '
</div>
</div>
<div class="usercp-loggedin-block">
Welcome <strong>'.$user_auth_id.'</strong>!<br>
<a href="index.php?page_id=donar">Donar</a> 
<a href="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'=logout">logout</a>
</div>
		 
		 ';
		  }else{
		  	echo '<div class="login-box">
<form method="post" action="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.LOGIN_CMS_PAGE.'" name="uss_login_form">
<input type="text" name="uss_id" maxlength="25" class="login-username" placeholder="username">
<input type="password" name="uss_password" class="login-password" placeholder="password" maxlength="12"><br>
<button type="submit" id="submit" value="ok" class="login-submit" style="cursor:pointer;"></button>
<input type="hidden" name="process_login"><br>
</form>
</div>';
		  }
		  ?>
</div>

<div class="sidebar-block">
<a href="<?=$config_template->Descargas;?>" class="sidebar-download"></a>
</div>

<div class="sidebar-block">
<a href="<?=$config_template->WebShop;?>" class="sidebar-enchant"></a>
</div>


<div class="sidebar-forumarket-container">
<span class="title">Menu</span>
<table class="sidebar-forumarket">
<tbody>
<?
					  $m_row_ = get_sort('engine/cms_data/pag_d.cms',',');
					#  echo $test[1][2][3];
					  foreach ($m_row_ as $li){
					 #  explode(",",$li);
					   switch ($li[7]){
					   	case '0':
					   		if($li[8] == '1'){
					   			if($li[6] != '0'){
					   				echo '<tr><td>
<a href="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.$li[3].'">
'.str_replace($menu_links_title,$menu_links_translated,$li[2]).'</a>
</td></tr>';
					   			}
					   	
					   		}
					   		break;
					   	case '1':
					   		switch ($li[11]){
					   			case '1': $target = "_blank"; break;
					   			case '0': $target = "_self"; break;
					   		}
					   		echo '<tr>
<td>
<a href="'.$li[10].'"  target="'.$target.'">
'.str_replace($menu_links_title,$menu_links_translated,$li[2]).'</a>
</td>
</tr>';
					   	
					   	break;
					   }			  	
					  }
					  
		  ?>
</tbody>
</table>
</div>




		</div>




		<div id="caja2">
<?
		  if(CMS_NAVBAR == '1'){
		  	if(isset($_GET[LOAD_GET_PAGE])){
                  	$l_load = file("engine/cms_data/pag_d.cms");
                  	foreach ($l_load as $l_name){
                  		$l_name = explode(",",$l_name);
                  		if($l_name[3] == $page_check_id){
                  			$primary_l = $l_name[2];
                  			break;
                  		}

                  	}
                  }
                  
                  if(isset($_GET[USER_GET_PAGE])){
                  	$ti2_td = xss_clean(safe_input($_GET[USER_GET_PAGE],"_"));
                  	$l2_load = file("engine/cms_data/mods_uss.cms");
                  	foreach ($l2_load as $l2_name){
                  		$l2_name = explode(",",$l2_name);
                  		if($l2_name[3] == $ti2_td){
                  			$secondary_l = $l2_name[2];
                  			break;
                  		}
                  	}
                  }
                  
                  if(!isset($_GET[LOAD_GET_PAGE])){
                                        #&gt;
                                        $title_p =  '<a  href="'.$core['config']['website_url'].'">'.$core['config']['websitetitle'].'</a>';
                                    }elseif  (isset($_GET[LOAD_GET_PAGE])){
                                        if(isset($_GET[USER_GET_PAGE])){
                                            $usercp_module_title =  str_replace($modules_text_tile,$modules_text_translate,$secondary_l);
$title_p =  '<a  href="'.$core['config']['website_url'].'">'.$core['config']['websitetitle'].'</a>  &gt; <a  href="'.$core['config']['website_url'].'/'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.$l_name[3].'">'.str_replace($menu_links_title,$menu_links_translated,$primary_l).'</a>  &gt; <a  href="'.$core['config']['website_url'].'/'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.$l_name[3].'&panel='.$l2_name[3].'">'.$usercp_module_title.'</a>';
                                        }else{ $title_p =  '<a  href="'.$core['config']['website_url'].'">'.$core['config']['websitetitle'].'</a>  &gt; <a  href="'.$core['config']['website_url'].'/'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.$l_name[3].'">'.str_replace($menu_links_title,$menu_links_translated,$primary_l).'</a>';}
                                    }

		  	
		  }

if($page_check_id != ANNOUNCEMENTS_CMS_PAGE){
	require('engine/announcement_config.php');
if($core['ANNOUNCEMENT']['ACTIVE'] == '1'){
	$ann_file = array_reverse(file('engine/variables_mods/announcements.tDB'));
	$count_ann = '0';
	foreach ($ann_file as $ann){
		$ann = explode(",",$ann);
		if($ann[3] > time()){
			$ann_found = '1';
			$ann_title = $ann[1];
			$ann_date = $ann[2];
			$ann_id = $ann[0];
;			break;
		}
	}
}
	if($ann_found == '1'){
		
		echo '
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
		  <tr>
		  <td>
		<div class="oli_co_1"> 
					<div  class="oli_module_title">'.text_announcement.'</div>
					<div class="tmp_page_content">
								<table cellpadding="0" cellspacing="0" border="0" width="100%">
					  <tr>
					  <td rowspan="3" align="left" width="60"><img src="template/'.$core['config']['template'].'/images/announcement.gif" width="38" height="38"></td>
					  <td align="left" style="padding-top: 2px; padding-bottom: 2px;"><a href="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.ANNOUNCEMENTS_CMS_PAGE.'#announcement-'.$ann_id.'">'.$ann_title.'</a></td>
					  <td align="right" class="ann_date">'.date('F j, Y | H:i',$ann_date).'</td>
					  </tr>
					  <tr>
					  <td colspan="2"  align="left" style="background-image:url(template/'.$core['config']['template'].'/images/inner_line.jpg); height: 2px;"></td>
					  </tr>
					  
					  ';
		if($core['ANNOUNCEMENT']['AUTHOR'] == '1'){
			echo '<tr>
			<td colspan="2" align="right"><b>'.$core['config']['admin_nick'].'</b> (Administrator)</td>
			</tr>';
			
		}
		echo '</table></div>
							</div>
						';
	}
}
		  
		  
	
$load_pages = file('engine/cms_data/pag_d.cms');
foreach ($load_pages as $pages_loaded){
	$pages_loaded = explode(",",$pages_loaded);
	
	if($pages_loaded[3] == $page_check_id){
		$p_loaded_array = preg_split( "/\ /", $pages_loaded[5]); 
		$p_l = '1';
		break;
	}
}
if($p_l == '1'){
$load_mods = file('engine/cms_data/mods.cms');
foreach ($load_mods as $mods_loaded){
	$mods_loaded = explode(",",$mods_loaded);
	if(in_array($mods_loaded[0],$p_loaded_array)){
		$_c_id_m[] = $mods_loaded[0];
	}else {
		$_c_id_m[] = 'NULL';
	}
}
$co=0;
foreach ($p_loaded_array as $give){
	#echo $give;
	if(in_array($give,$_c_id_m)){
		foreach ($load_mods as $give_me_out){
			$give_me_out = explode(",",$give_me_out);
			if($give_me_out[0] == $give){
				if($give_me_out[4] == '1'){
					if($_GET[LOAD_GET_PAGE] == USER_CMS_PAGE && isset($_GET[USER_GET_PAGE])){
						$construct_title = $secondary_l;
					}else{
						$construct_title = $give_me_out[3];
					}

				$num_bg_title=rand(0, 3);

					echo '
					
					<div class="oli_co_1"> 
					<div style="background: url(template/'.$core['config']['template'].'/images/titles/'.$num_bg_title.'.jpg) no-repeat top center;" class="oli_module_title"> 
					'.htmlspecialchars(str_replace($modules_text_tile,$modules_text_translate,$give_me_out[3])).'
					</div>
					<div class="tmp_page_content">';
					if($give_me_out[1] == '1'){
						if(is_file("pages_modules/".$give_me_out[2]."")){
							include('pages_modules/'.$give_me_out[2].'');
						}else{
							echo 'Unable to load module file, reason: not found.';
						}
					}elseif ($give_me_out[1] == '0'){
						if(is_file('engine/cms_data/cms_co/'.$give_me_out[0].'_cms.cms')){
							include('engine/cms_data/cms_co/'.$give_me_out[0].'_cms.cms');
						}else{
							echo 'Unable to load module content, reason: not found.';
						}
					}
					echo '</div> </div>';
				}
			}
		}
	}
}
}
?>
		</div>


	</div>
</div>
<!--FIN CONTENIDO-->
<?
}
?>
<!--FOOTER-->
<div class="main-footer">
<div class="row show-grid">
	<div class="col-md-4"><img src="template/<?=$core['config']['template'] ?>/images/bg/copy.png"></div>
    <div class="col-md-8" style="padding: 5px 10px;">
    	<p style="color: #6A91BD;font-size: 15px;margin: 0px;"><? echo $config_template->Nombre; ?> &copy; <?=date('Y')?></p>
    	<a href="http://mucorepremium.net/" style="color:#fff !important;">MuCore Premium v<?=crypt_it($engine,'','1');?> </a>
    </div>
  </div>
</div>

<?=LoadCustom('bs_footer');?>
</body>
</html>
<?
}
?>