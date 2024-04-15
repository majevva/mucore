<? include("config/AOH_Template.php"); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<?=build_header_seo(); ?>
<title><?=build_header_title(); ?></title>
<META NAME="description" CONTENT="Mu Core Premium 2.0">
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script src="js/core_global.js" language="javascript" type="text/javascript"></script>
<script src="template/<?=$core['config']['template'] ?>/js/jquery.cslider.js" type="text/javascript"></script>
<script src="template/<?=$core['config']['template'] ?>/js/jquery-1.7.1.min.js" type="text/javascript"></script>
<script src="template/<?=$core['config']['template'] ?>/js/modernizr.custom.28468.js" type="text/javascript"></script>
<script src="template/<?=$core['config']['template'] ?>/js/reloj.js" type="text/javascript"></script>
<!-- Bootstrap -->
<?=LoadCustom('bs_head');?>
<?=LoadCustom('fontawesome');?>
<link rel="stylesheet" href="template/<?=$core['config']['template'] ?>/css/aohost.css" type="text/css" media="all" />
<link rel="stylesheet" href="template/<?=$core['config']['template'] ?>/css/nav.css" type="text/css" media="all" />
<link rel="SHORTCUT ICON" href="template/<?=$core['config']['template'] ?>/images/olimpo.ico"/>
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
<div id="siteVisualWrap">
<div id="siteVisualConts">
<div class="G_ContsWrap">
<div class="visualSpace"></div>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=1477465835872640";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div style="margin-left: -30px;">
<div id='cssmenu'>
<ul style="margin-left:220px;">
   <li><a href='<? echo $core['config']['website_url'];?>'><font style="font-family: Brian; font-size:21px;">INICIO</font></a></li>
   <li><a href='<?=$config_template->Registro;?>'><font style="font-family: Brian; font-size:21px;">REGISTRARSE</font></a></li>
   <li><a href='<?=$config_template->Descargas;?>'><font style="font-family: Brian; font-size:21px;">DESCARGAS</font></a></li>
   <li><a href='<?=$config_template->Foro;?>' target='_blank'><font style="font-family: Brian; font-size:21px;">FORO</font></a> </li>
   <li><a href='<?=$config_template->WebShop;?>'><font style="font-family: Brian; font-size:21px;">WEBSHOP</font></a></li>   
</ul>
</div>
</div>

<!--Logo-->
<article class="gLogo"><a href="index.php" rel=""><img src="template/<?=$core['config']['template'];?>/images/tpl/space.gif" width="185" height="145" alt="MU Online"></a></article>
<!--Download-->
<article id="gStarter"><a href="<?=$config_template->Descargas;?>" title="DOWNLOAD" onfocus="this.blur();" rel=""></a></article>
<!--Hora Server-->
<article id="gGST_Wrap">
				<div class="gGST_BoxOn" id="gstYourTime">
					<span>Server Time</span><time id="tLocalTime">17:02:41 Fri Oct 21</time>
					<script type="text/javascript" language="javascript">
            		<!--
            		clock2.init('<?php echo date("H:i:s F d, Y");?>','tLocalTime',1000);
            		-->
        			</script>
				</div>
				<div class="gGST_BoxOff">
					<span>Version</span><time id="tServerTime"><?=$config_template->Version;?></time>
				</div>
			</article>

<div id="l_centered">

<div id="caja2">
<table width="96%" border="0" cellspacing="0" cellpadding="0" align="center">
		  <tr>
		  <td>
		<div class="oli_co_2"> 

			   <div class="box_skitter box_skitter_large">
			   <div class="fixbg_slider"></div>
			   
						<ul>
							<li><a href="" target="_blank"><img src="template/<?=$core['config']['template'];?>/images/slider/001.jpg" class="cube" /></a></li>
							<li><a href="" target="_blank"><img src="template/<?=$core['config']['template'];?>/images/slider/002.jpg" class="cubeRandom" /></a></li>
							<li><a href="" target="_blank"><img src="template/<?=$core['config']['template'];?>/images/slider/003.jpg" class="block" /></a></li>
							<li><a href="" target="_blank"><img src="template/<?=$core['config']['template'];?>/images/slider/004.jpg" class="cubeRandom" /></a></li>
							<li><a href="" target="_blank"><img src="template/<?=$core['config']['template'];?>/images/slider/005.jpg" class="block" /></a></li>
						</ul>
				<span class="fixbg_slider_control"></span>
				</div>
			
		</div>
		</td>
		</tr>
		</table>
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

<div id="caja1">
<div class="gContsInfoBg">
<div class="brian_cl">	
		  <table width="100%" border="0" cellspacing="0" cellpadding="0">
		  <tr>
		  <td><div class="box_title">
				Member Area
				</div></td>
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
<div align="left" style="width: 280px; margin-top: 10px; margin-bottom: 10px;">
    <div style="margin-top: 20px;"></div>
    <div style="float:left; width: 100px;" class="font-login">Id de ingreso</div>
    <div style="float:left; width: 180px;"><input type="text" value="" name="uss_id" class="field" style="width: 177px;" maxlength="15"></div>
    
    <div style="clear:both;"></div>
    <div style="margin-top: 10px;"></div>
    
    <div style="float:left; width: 100px;" class="font-login">Contraseña</div>
    <div style="float:left; width: 180px;"><input type="password" value="" name="uss_password" class="field" style="width: 177px;" maxlength="10"></div>
    <input type="hidden" name="process_login">
    <div style="clear:both;"></div>   

</div>
<div style="clear:both;"></div>
<div align="right" style="margin-top: 12px; width: 284px;">
    
    <div style="float:left;"><a href="index.php?page_id=lost_password" class="font-login">» Recuperar contraseña</a></div>
    
    <div style="float:right;">
    <input type="submit" class="small_button" value="Entrar">
    </div>
    <div style="clear:both;"></div>
    </div>
    </form>';
		  }
		  ?>
		  </div> 

		  <div class="brian_cl">
				  		  		 <table width="100%" border="0" cellspacing="0" cellpadding="0">
		  <tr>
		  <td><h1 class="entrar">Menu General</h1></td>
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
		  	<table width="100%" border="0" cellspacing="0" cellpadding="0">
		  <tr>
		  <td><h1 class="entrar">Informacion</h1></td>
		  </tr>
		  </table>
			<table style="text-align:left;    margin-left: 20px;" cellspacing="0" cellpadding="0">
                                                              <tr>
                                                                <td width="150" style="color:#ffb400;">Version:</td>
					                                            <td width="85"><?=$config_template->Version;?></td>
                                                               </tr>
                                                               <tr>
                                                                <td width="150" style="color:#ffb400;">Experiencia:</td>
					                                            <td width="85"><?=$config_template->Exp;?></td>
                                                               </tr>
                                                               <tr>
                                                                <td width="150" style="color:#ffb400;">Drop:</td>
					                                            <td width="85"><?=$config_template->Drop;?></td>
                                                               </tr>
															   <tr>
					                        					<td width="150" style="color:#ffb400;">Cuentas Totales:</td>
																 <td width="85"><?=$cues;?></td>
																</tr>
															<tr>
					                        				<td style="color:#ffb400;">Gremios Totales:</td>
					                      				    <td><?=$guild;?></td>
             												 </tr>
					                      <tr>
	<? $barra = $core_db->Execute("SELECT count(*) FROM MEMB_STAT WHERE ConnectStat = '1'");	 
			$online= $barra->fields[0];?><td style="color:#ffb400;">Usuarios Online:</td>
					                        <td><span><?=$online;?></span></td>
                </tr>
                                                             </table>
	  </div>

<div class="brian_cl">
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
	<td><h1 class="entrar">Servidores</h1></td>
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
	  		  		 
<article class="mainSnsFanWrap">
        <h2>Facebook Fans</h2>
        <div>
        	<div class="fb-page" data-href="<?=$config_template->Facebook;?>" data-tabs="timeline" data-width="300" data-height="292" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="<?=$config_template->Facebook;?>" class="fb-xfbml-parse-ignore"><a href="<?=$config_template->Facebook;?>"></a></blockquote></div>
        </div>
    </article>

<ul class="mainSnsWrap">
        <li><a href="<?=$config_template->Facebook;?>" target="_blank" rel="nofollow"><img src="template/<?=$core['config']['template'];?>/images/tpl/icon_main_sns_facebook_20120710.gif" alt="facebook"></a></li>
        <li><a href="<?=$config_template->Twitter;?>" target="_blank" rel="nofollow"><img src="template/<?=$core['config']['template'];?>/images/tpl/icon_main_sns_twitter_20120710.gif" alt="tweeter"></a></li>
        <li><a href="<?=$config_template->YouTube;?>" target="_blank" rel="nofollow"><img src="template/<?=$core['config']['template'];?>/images/tpl/icon_main_sns_youtube_20120710.gif" alt="youtube"></a></li>
        
    </ul>


</div>
</div>


</td>
</tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td>

</td>
</tr>
</table>
</div>

</div>
</div>
<!--/siteVisualWrap-->
</div>
<aside class="footer-web">
			<div class="footer_one_bx">
			<img src="template/<?=$core['config']['template'] ?>/images/tpl/img_offical_logo_webzen_tit.png" class="logo webzen" alt="WEBZEN">
			<small><a target="_blank" href="http://www.mucorepremium.net">MuCore Premium v<?=crypt_it($engine,'','1');?></a><br>Copyright &copy; 2016.</small>
			
			</div>
	</aside>
<?=LoadCustom('bs_footer');?>
</body>
</html>