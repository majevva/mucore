<? include("config/AOH_Template.php"); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta charset="utf-8">

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
<link href="https://fonts.googleapis.com/css?family=New+Rocker" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Black+Ops+One" rel="stylesheet">
	<script type="text/javascript" language="javascript" src="template/<?=$core['config']['template'] ?>/js/jquery.easing.1.3.js"></script>
	<script type="text/javascript" language="javascript" src="template/<?=$core['config']['template'] ?>/js/jquery.animate-colors-min.js"></script>
	<script type="text/javascript" language="javascript" src="template/<?=$core['config']['template'] ?>/js/jquery.skitter.min.js"></script>
	<script type="text/javascript" language="javascript" src="template/<?=$core['config']['template'] ?>/js/reloj.js"></script>
	<!-- Init Skitter -->
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

			window.onload = function() {
				setInterval("displaytime()", 1000);
				setInterval("displayCountdown()", 1000);
			}
		</script>
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
<video class="video" loop="loop" poster="template/<?=$core['config']['template'] ?>/images/tpl/fondo10.jpg" autoplay="">
	<source src="template/<?=$core['config']['template'] ?>/images/video/background.mp4" type="video/mp4">
	</video>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : 'your-app-id',
      xfbml      : true,
      version    : 'v2.5'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/es_ES/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>

<div id="cabecera" align="center">
    <div id="logotipo" align="center">
        <a href="index.php" target="_blank">
        <img src="template/<?=$core['config']['template'] ?>/images/logo.png" width="700px" alt="Inicio"></a>
        <span id="servertime"></span>
        
    </div>
</div>

<div class="cajatop">
<div class="container-web">
<div id="l_centered">
<div id='cssmenu'>
<ul>
   <li><a href='<? echo $core['config']['website_url'];?>'>Inicio</a></li>
   <li><a href='<?=$config_template->Registro;?>' class="new">Registrar</a></li>
   <li><a href='<?=$config_template->Descargas;?>'>Descargas</a></li>
   <li><a href='index.php?page_id=castle_siegephp'>Castle Siege</a></li>
   <li><a href='index.php?page_id=rankings'>Ranking</a></li>
   <li><a href='<?=$config_template->Foro;?>' target='_blank'>Foro</a> </li>
   <li><a href='<?=$config_template->WebShop;?>'>Webshop</a></li>   
</ul>
</div>
<!-- CASTLE SIEGE BANNER -->
<script type="text/javascript">
				var csTimeStamp = <? echo strtotime($config_template->castle_siege_mes.'/'.$config_template->castle_siege_dia.'/'.$config_template->castle_siege_anio);?>;
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
			</script>
<div id="castle-siege">
				<table cellspacing="0" cellpadding="0">
					<tbody><tr>
						<td class="cs-logo"><img src="get.php?aL=<? echo urlencode(bin2hex(CastleInfoGuild(CastleQuerry(0),0))); ?>" width="112" height="112"></td>
						<td class="cs-guild-info">
							

							
							
							<span class="cs-guild-title"><? echo CastleQuerry(0);?></span><br>
							<span>Dueño del Castillo</span>
						</td>
						<td>
							<span class="txtmaster">Master:</span><br>
							<span><? echo CastleInfoGuild(CastleQuerry(0),1);?></span><br>
							
							
						</td>
						<td width="300">
							LA BATALLA INICIA EN<br>
							<span class="cs-timeleft" id="cscountdown">0<span>h</span> 0<span>m</span> 0<span>s</span></span>
						</td><td> </td></tr>
				</tbody></table>
</div>
<div id="content">
<div id="sidebar">	

	<div class="brian_cl">
	<table class="sidebar-srvinfo" cellspacing="0" cellpadding="0">
	<thead>
	<tr>
	<th></th>
	</tr>
	</thead>
	<tbody><tr><td colspan="4">Top Gens</td></tr>
	<tr>
	<td><strong><u>Personaje</u></strong></td>
	<td><u><strong>G.Duke</strong></u></td>
	</tr>

	<tr>
	<td>
	<a href="#" target="_blank"><?=GensTopMember(1);?></a>
	</td>
	<td><?=GensContribution(1);?></td>
	<td><img src="AOH_Addons/images/ranking/gens1.png" width="54" height="76"></td>
	</tr>
	<tr>
	<td>
	<a href="#" target="_blank"><?=GensTopMember(2);?></a>
	</td>
	<td><?=GensContribution(2);?></td>
	<td><img src="AOH_Addons/images/ranking/gens2.png" width="54" height="76"></td>
	</tr>

	</tbody>
	</table> 
		  		  
	</div>

	<!--DUELOS-->
	<div class="brian_cl">
	<table class="sidebar-srvinfo" cellspacing="0" cellpadding="0">
	<thead>
	<tr>
	<th></th>
	</tr>
	</thead>
	<tbody><tr><td colspan="4">Top 5 Duelistas</td></tr>
	<tr>
	<td><strong><u>Personaje</u></strong></td>
	<td><u><strong>G</strong></u></td>
	<td><u><strong>P</strong></u></td>
	<td><u><strong>T</strong></u></td>
	</tr>
	<?
	$cslt_topduelo = $core_db->Execute("SELECT TOP 5 ".AOH_Duelo_Name_Column.",".AOH_Duelo_Win_Column.",".AOH_Duelo_Lose_Column." FROM ".AOH_Duelo_Table." order by ".AOH_Duelo_Win_Column." DESC"); 
	while (!$cslt_topduelo->EOF){
	?>
	<tr>
	<td>
	<a href="#" target="_blank"><?=$cslt_topduelo->fields[0];?></a>
	</td>
	<td><?=$cslt_topduelo->fields[1];?></td>
	<td><?=$cslt_topduelo->fields[2];?></td>
	<td><?=$cslt_topduelo->fields[1]+$cslt_topduelo->fields[2];?></td>
	</tr>
	<? 
	$cslt_topduelo->MoveNext();
	} ?>
	</tbody>
	</table> 
		  		  
	</div>

	<!--MATONES-->
	<div class="brian_cl">
	<table class="sidebar-srvinfo" cellspacing="0" cellpadding="0">
	<thead>
	<tr>
	<th></th>
	</tr>
	</thead>
	<tbody><tr><td colspan="4">Top 5 Matones</td></tr>
	<tr>
	<td><strong><u>Personaje</u></strong></td>
	<td><u><strong>Muertes</strong></u></td>
	</tr>
	<?
	$cslt_topgens = $core_db->Execute("SELECT TOP 5 Name,PkCount FROM Character  where PkCount > 0 order by PkCount DESC"); 
	while (!$cslt_topgens->EOF){
	$img_gens='<img src="AOH_Addons/images/ranking/gens'.$cslt_topgens->fields[1].'.png" width="54" height="76">';
	?>
	<tr>
	<td>
	<a href="#" target="_blank"><?=$cslt_topgens->fields[0];?></a>
	</td>
	<td><?=$cslt_topgens->fields[1];?></td>
	</tr>
	<? 
	$cslt_topgens->MoveNext();
	} ?>
	</tbody>
	</table> 
		  		  
	</div>

	<div class="brian_cl">
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
	<td><h1 class="entrar" align="center" style="margin-top: 2px;">Servidores</h1></td>
	</tr>
	</table>	
	<div class="oli_menu_pri">
		<ul>
<?
$file_GameServer = file('engine/variables_mods/GameServers.tDB');
foreach ($file_GameServer as $GSL_DB){
  $GSL_DB = explode("|",$GSL_DB);

$consulta_gsl = $core_db->Execute("SELECT count(memb___id) FROM MEMB_STAT WHERE ConnectStat = '1' and ServerName='".$GSL_DB[3]."'");
$porcentajeGSL = substr(100 * $consulta_gsl->fields[0] / $GSL_DB[4], 0, 5);
if ($porcentajeGSL >= 0){$gsl_color='success';}
if ($porcentajeGSL > 49){$gsl_color='info';}
if ($porcentajeGSL > 69){$gsl_color='warning';}
if ($porcentajeGSL > 79){$gsl_color='danger';}

echo '
<div class="gslist">
<p>'.$GSL_DB[3].' - '.ChekServer($GSL_DB[1],$GSL_DB[2]).'</p>
<div class="progress">
  <div class="progress-bar progress-bar-'.$gsl_color.'" role="progressbar" aria-valuenow="'.$porcentajeGSL.'"
  aria-valuemin="0" aria-valuemax="'.$GSL_DB[4].'" style="width:'.$porcentajeGSL.'%">
    '.$porcentajeGSL.'% ('.$consulta_gsl->fields[0].' users)
  </div>
</div>
</div>
';

}
?>
		</ul>
	</div>
</div>

</div>

<div id="page-container">

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
				
					echo '
					
					<div class="oli_co_1"> 
					<div class="oli_module_title"> 
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

<div id="sidebar2">	
<div class="brian_cl">	
		  <table width="100%" border="0" cellspacing="0" cellpadding="0">
		  <tr>
		  <td><h1 class="entrar" align="center" style="margin-top: 2px;">Panel de Usuario</h1></td>
		  </tr>
		  </table>		   
		  <?
		  if($user_login == '1'){
		  	echo '<div class="oli_menu_pri">
			<center><div style="background-color:#942100; color:#DDBE49; font-size: 10.5px; text-transform: uppercase; padding-left: 5px; margin-left:1px; margin-right:1px; margin-bottom: 3px;"><b>¡Bienvenido/a '.$user_auth_id.'!</b></div></center>
		  	<ul>';
		$m_uss_row_ = get_sort('engine/cms_data/mods_uss.cms',',');
 	 	$count_m_uss = 0;
		foreach ($m_uss_row_ as $tr){
			explode(",",$tr);
			$count_m_uss++;
			if($tr[6] == '1'){
				if($tr[3] != ACCOUNTSETTINGS_CMS_USER){
					echo '<li class="list_menu"><a  href="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.USER_CMS_PAGE.'&'.USER_GET_PAGE.'='.$tr[3].'">'.str_replace($menu_links_title,$menu_links_translated,$tr[2]).'</a></li>';
				}
				
			}
		}
		echo ' </ul>
		 </div>
		 <table width="100%" border="0" align="center" cellpadding="0" cellspacing="4">
		 <tr>
		  <td align="left" class="yellow"><a  href="index.php?page_id=donar">Donar</a></td>
		  <td align="right" class="yellow"><a  href="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'=logout">'.link_log_out.'</a></td>
		 </tr>
		 </table>
		 
		 ';
		  }else{
		  	echo '<form method="post" action="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.LOGIN_CMS_PAGE.'" name="uss_login_form">
			 <table width="100%" cellpadding="5" cellspacing="5" class="fix-table">
  <tr>
    <td>
    Usuario:
    </td>
    <td><input type="text" name="uss_id" maxlength="10" class="login_field"></td>
  </tr>
  <tr>
  	<td>
  	Clave:
  	</td>
    <td>
    <input type="password" name="uss_password" class="login_field" maxlength="12">
    <input type="hidden" name="process_login">
    <br>
    <span class="input-tip"><a href="index.php?page_id=lost_password">Perdio su clave?</a></span>
    </td>
  </tr>
  <tr>
  <td></td>
  <td>
  <button name="submit" value="submit" class="ui-button button1"><span class="button-left"><span class="button-right">Ingresar</span></span></button>
  </td>
  </tr>
</table>
</form>';
		  }
		  ?>
		  </div> 

		  <div class="brian_cl">
				  		  		 <table width="100%" border="0" cellspacing="0" cellpadding="0">
		  <tr>
		  <td><h1 class="entrar" align="center" style="margin-top: 2px;">Menu General</h1></td>
		  </tr>
		  </table>	
		  <div class="oli_menu_pri">
			<ul>
		  <?
					  $m_row_ = get_sort('engine/cms_data/pag_d.cms',',');
					#  echo $test[1][2][3];
					  foreach ($m_row_ as $li){
					 #  explode(",",$li);
					   switch ($li[7]){
					   	case '0':
					   		if($li[8] == '1'){
					   			if($li[6] != '0'){
					   				echo '<li class="list_menu"><a  href="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.$li[3].'"> '.str_replace($menu_links_title,$menu_links_translated,$li[2]).'</a></li>';
					   			}
					   	
					   		}
					   		break;
					   	case '1':
					   		switch ($li[11]){
					   			case '1': $target = "_blank"; break;
					   			case '0': $target = "_self"; break;
					   		}
					   		echo '<li class="list_menu"><a  href="'.$li[10].'"  target="'.$target.'"> '.str_replace($menu_links_title,$menu_links_translated,$li[2]).'</a></li>  ';
					   	
					   	break;
					   }			  	
					  }
					  
		  ?>
		  </ul>
		  </div>
		  		  
		</div>




	
		  <div class="brian_cl">
	<table class="sidebar-srvinfo" cellspacing="0" cellpadding="0">
	<thead>
	<tr>
	<th></th>
	</tr>
	</thead>
	<tbody><tr><td colspan="4">Informacion del Servidor</td>
	</tr>
                                                              <tr>
                                                                <td width="150" style="color:#DDBE49;"><strong>Version:</strong></td>
					                                            <td width="85"><strong><?=$config_template->Version;?></strong></td>
                                                               </tr>
                                                               <tr>
                                                                <td width="150" style="color:#DDBE49;"><strong>Experiencia:</strong></td>
					                                            <td width="85"><strong><?=$config_template->Exp;?></strong></td>
                                                               </tr>
                                                               <tr>
                                                                <td width="150" style="color:#DDBE49;"><strong>Drop:</strong></td>
					                                            <td width="85"><strong><?=$config_template->Drop;?></strong></td>
                                                               </tr>
															   <tr>
					                        					<td width="150" style="color:#DDBE49;"><strong>Cuentas Totales:</strong></td>
																 <td width="85"><strong><?=$cues;?></strong></td>
																</tr>
															<tr>
					                        				<td style="color:#DDBE49;"><strong>Gremios Totales:</strong></td>
					                      				    <td><strong><?=$guild;?></strong></td>
             												 </tr>
					                      <tr>
	<? $barra = $core_db->Execute("SELECT count(memb___id) FROM MEMB_STAT WHERE ConnectStat = '1'");	 
			$online= $barra->fields[0]; ?><td style="color:#DDBE49;"><strong>Usuarios Online:</strong></td>
					                        <td><strong><span><?=$online;?></span></strong></td>
                </tr>
</tbody>
	</table> 
		  		  
	</div>
	  		  		 
	  		  <div class="brian_cl">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
		  <tr>
		  <td><h1 class="entrar" align="center" style="margin-top: 2px;">Redes Sociales</h1></td>
		  </tr>
		  </table>
<div id="social_icons" align="center">
<a href="<?=$config_template->Facebook;?>" target="_blank"><img src="template/<?=$core['config']['template'];?>/images/facebook.png" width="30" height="30" border="0" /></a>
<a href="<?=$config_template->Twitter;?>" target="_blank"><img src="template/<?=$core['config']['template'];?>/images/twitter.png" width="30" height="30" border="0" /></a>
<a href="<?=$config_template->YouTube;?>" target="_blank"><img src="template/<?=$core['config']['template'];?>/images/youtube.png" width="30" height="30" border="0" /></a>
<a href="<?=$config_template->Instagram;?>" target="_blank"><img src="template/<?=$core['config']['template'];?>/images/instagram.png" width="30" height="30" border="0" /></a>
<a href="<?=$config_template->Google;?>" target="_blank"><img src="template/<?=$core['config']['template'];?>/images/google.png" width="30" height="30" border="0" /></a>
</div>
</div>		  	  
</div>

</div>

</div>

</div>
<div class="container-csdata">
  
<div class="row">

    <div class="col-sm-24">
				<div style="text-align:center;">
					<h2 class="font"> Ganadores del Castle Siege </h2></div>
	</div>
	    <div class="col-sm-24">
				<div style="text-align:center;">

					<span class="guildOwnerok"><?=CastleQuerry(0);?></span>
				</div>
	</div>
		    <div class="col-sm-24">
				<div style="text-align:center;padding-top: 30px;">
<br>
					<p class="marcareg"><strong> <? echo $config_template->Nombre; ?> - Todos los derechos reservados </strong>  </p>
				</div>
	</div>
</div>
</div>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td>
<div id="arg_footer">
<div id="foot_info">
<p><? echo $config_template->Nombre; ?> &copy; 2016</p>
<p> <a href="http://mucorepremium.net/">MuCore Premium v<?=crypt_it($engine,'','1');?> </a> <br>Todos los Derechos Reservados.</p>
</div>
</div>
</td>
</tr>
</table>
</div>
<?=LoadCustom('bs_footer');?>
</body>
</html>