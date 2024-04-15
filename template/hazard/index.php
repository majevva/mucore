<? include("config/AOH_Template.php"); 
 include("config/config.php"); ?>
 
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?=build_header_seo(); ?>
<title><?=build_header_title(); ?></title>
<META NAME="description" CONTENT="Mu Core Premium 2.0">
<script type="text/javascript" src="template/<?=$core['config']['template'] ?>/js/lf.js"></script>
<!-- Bootstrap -->
<?=LoadCustom('bs_head');?>
<?=LoadCustom('fontawesome');?>
<link rel="stylesheet" href="template/<?=$core['config']['template'] ?>/css/aohost.css" type="text/css" media="all" />
<link rel="stylesheet" href="template/<?=$core['config']['template'] ?>/css/lol_global_elements.css" type="text/css" media="all" />
  <!-- Modificaciones Custom -->
<link rel="stylesheet" href="template/<?=$core['config']['template'] ?>/css/custom.css" type="text/css" media="all" /> 
  </head>
<body>
  <div id="lol-pvpnet">
	<div id="lol-pvpnet-bar">
	  <div  align="right"  id="lol-pvpnet-bar-inner">
	  <div  align="right"  id="lol-pvpnet-bar-inner2">
	    <table>
	      <td style="padding-top:8px;" align="left"><?
if($core['config']['on_off'] == '0' || $core['debug'] == '1'){
	if(isset($_SESSION['admin_login_auth'])){
		echo '<div align="center" style="color: red; background-color: white; padding:2px"><b>Warning: The website is currently turned off!</b></div>';
	}

}
echo '<script type="text/javascript">
<!--
var currentTime = new Date();
var c_hours = currentTime.getHours() ;
var c_minutes = currentTime.getMinutes();
time_c_d = c_hours;


function make_header_welcome(time,user,last_msg){
	if(time < \'1\'){
		welcome_start =  "Shouldn\'t you be going to bed soon";
		welcome_end = \'?\';
	}
	else if(time < \'2\'){
		welcome_start =  "Up late, aren\'t we";
		welcome_end = \'?\';
	}
	else if(time < \'4\'){
		welcome_start =  "Having trouble sleeping";
		welcome_end = \'?\';
	}
	else if(time < \'5\'){
		welcome_start =  "Still can\'t sleep";
		welcome_end = \'?\';
	}
	else if(time < \'7\'){
		welcome_start =  "Aren\'t you the early bird";
		welcome_end = \'?\';
	}
	else if(time <\'12\'){
		welcome_start =  "Buenos Dias";
		welcome_end = \'.\';
	}
	else if(time < \'13\'){
		welcome_start =  "Enjoying your lunch break";
		welcome_end = \'?\';
	}
	else if(time < \'17\'){
		welcome_start =  "Good Afternoon";
		welcome_end = \'.\';
	}	
	else if(time < \'18\'){
		welcome_start =  "What\'s for dinner";
		welcome_end = \'?\';
	}
	else if(time < \'22\'){
		welcome_start =  "Good Evening";
		welcome_end =  \'.\';
	}
	else if(time < \'23\'){
		welcome_start =  "Where your children are";
		welcome_end = \'?\';
	}else{
		welcome_start =  "Shouldn\'t you be going to bed soon";
		welcome_end = \'?\';
	}
	document.getElementById(\'welcome_stats\').innerHTML = welcome_start+\', \'+user+welcome_end+last_msg;
}
//-->
</script>';
?>
<div id="welcome_stats"></div>
<?
 if ($user_login == '1') { 
 	echo '<script type="text/javascript">make_header_welcome(time_c_d,\'<a href="">'.$user_auth_id.'</a>\',\'\');</script>';
 }else{
 	echo ''.text_not_loggd_in.', <a  href="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.LOGIN_CMS_PAGE.'">'.text_log_in.'</a>';
 }
?></td>  <td style="padding-top:8px;" align="right"><?
                    if($core['language_switch'] == '1'){
                        foreach ($languages as $language_id =>  $language_data){
                            echo '&nbsp;<img  src="template/'.$core['config']['template'].'/images/flags/'.$language_data[2].'">  <a  href="'.ROOT_INDEX.'?change_language='.$language_id.'">'.$language_data[0].'</a>';
                        }
                    }
                    ?></td>
        </table>
	    </div>
	  </div>
	</div>

</div>

<div id="lol-header" role="banner" class="i18n-es">
  <div class="section clearfix">
    <div id="lol-header-sitename"></div>
    <div id="lol-header-play-free">
      <a href="<?=ROOT_INDEX.'?'.LOAD_GET_PAGE.'='?>register" class="play-free-link">Registre-se</a>    </div>
    <div id="lol-header-nav" role="navigation">
      <ul class="lol-menu lol-menu-down level-0" id="lol-menu-0"><li class="menu-item menu-314 menuparent menu-path-leagueoflegendscom-news first  odd "><a href="<?=ROOT_INDEX?>" title=""><span><?=link_home;?></span></a><div class="lol-nav-dropdown-trigger"><div class="lol-nav-dropdown-container"> 
<li class="menu-item menu-315 menuparent menu-path-leagueoflegendscom-learn even "><a href="" title=""><span>Novedades</span></a>
  <div class="lol-nav-dropdown-trigger">
  <div class="lol-nav-dropdown-container">  <ul class="level-1">
    <li class="menu-item menu-344 menuparent menu-path-leagueoflegendscom-learn-gameplay first  odd "><a href="<?=ROOT_INDEX?>" title=""><span>Noticias</span></a> </li>
<li class="menu-item menu-321 menu-path-leagueoflegendscom-champions even "><a href="<?=ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.ANNOUNCEMENTS_CMS_PAGE  ?>" title=""><span><?=link_announcements;?></span></a></li>
  </ul>  <span class="lol-nav-rightbar"></span>  <span class="lol-nav-leftbar"></span>  <span class="lol-nav-topbar"></span>  <span class="lol-nav-bottombar"></span></div></div></li>
<li class="menu-item menu-337 menuparent menu-path-competitive odd "><a href="<?=ROOT_INDEX.'?'.LOAD_GET_PAGE.'='?>rankings" title=""><span>Rankings</span></a><div class="lol-nav-dropdown-trigger"><div class="lol-nav-dropdown-container">  <ul class="level-1"><li class="menu-item menu-892 menu-path-node-2257 first  odd "><a href="<?=ROOT_INDEX.'?'.LOAD_GET_PAGE.'='?>rankings"><span>Jugadores</span></a></li>
<li class="menu-item menu-956 menuparent menu-path-competitive-circuit even "><a href="<?=ROOT_INDEX.'?'.LOAD_GET_PAGE.'='?>rankings&rank=guilds" title=""><span>Guilds</span></a></li>
</ul>  <span class="lol-nav-rightbar"></span>  <span class="lol-nav-leftbar"></span>  <span class="lol-nav-topbar"></span>  <span class="lol-nav-bottombar"></span></div></div></li>
<li class="menu-item menu-952 menuparent menu-path-euwleagueoflegendscom-board- even "><a href="board/indexd78f.html?langid=3" title=""><span>Jugar</span></a><div class="lol-nav-dropdown-trigger">
  <div class="lol-nav-dropdown-container">  <ul class="level-1"><li class="menu-item menu-955 menu-path-euwleagueoflegendscom-board-forumdisplayphpf3 first  odd "><a href="<?=ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.REGISTER_CMS_PAGE  ?>" title=""><span><?=link_new_account;?></span></a></li>
<li class="menu-item menu-912 menu-path-euwleagueoflegendscom-board-devtrackerphpgRiot even "><a href="<?=ROOT_INDEX.'?'.LOAD_GET_PAGE.'='?>downloads" title=""><span>Downalod</span></a></li>
  </ul>  <span class="lol-nav-rightbar"></span>  <span class="lol-nav-leftbar"></span>  <span class="lol-nav-topbar"></span>  <span class="lol-nav-bottombar"></span></div></div></li>
<li class="menu-item menu-1012 menu-path-jinxcom-shop-coll-leagueoflegends-langen-IE odd "><a href="<?php echo MENU_LINK_CUSTOM1;?>" title=""><span><?php echo MENU_NOMBRE_CUSTOM1;?></span></a></li>
<li class="menu-item menu-319 menuparent menu-path-media even  last "><a href="<?php echo MENU_LINK_CUSTOM2;?>" title=""><span><?php echo MENU_NOMBRE_CUSTOM2;?></span></a><div class="lol-nav-dropdown-trigger">
  <div class="lol-nav-dropdown-container">  <ul class="level-1">
    <li class="menu-item menu-724 menuparent menu-path-media-videos-all first  odd "><a href="<?php echo MENU_LINK_CUSTOM2_SUB1;?>" title=""><span><?php echo MENU_NOMBRE_CUSTOM2_SUB1;?> </span></a> </li>
<li class="menu-item menu-726 menu-path-media-galleries-fan-art odd "><a href="<?php echo MENU_LINK_CUSTOM2_SUB2;?>" title=""><span><?php echo MENU_NOMBRE_CUSTOM2_SUB2;?></span></a></li>
<li class="menu-item menu-340 menu-path-media-galleries-screenshot even "><a href="<?php echo MENU_LINK_CUSTOM2_SUB3;?>" title=""><span><?php echo MENU_NOMBRE_CUSTOM2_SUB3;?></span></a></li>
<li class="menu-item menu-343 menu-path-media-wallpaper odd  last "><a href="<?php echo MENU_LINK_CUSTOM2_SUB4;?>" title=""><span><?php echo MENU_NOMBRE_CUSTOM2_SUB4;?></span></a></li>
  </ul>  <span class="lol-nav-rightbar"></span>  <span class="lol-nav-leftbar"></span>  <span class="lol-nav-topbar"></span>  <span class="lol-nav-bottombar"></span></div></div></li>
</ul>
    </div>
    <div class="lol-header-flang lol-header-flang-left"></div>
    <div class="lol-header-flang lol-header-flang-right"></div>
  </div>
</div>

		<div id="content_area">
		  <div id="layout_1_content">
		    <div id="container_top"></div>
		    <div id="container_bottom"></div>
		    <div id="region_content">
		      <?php 

if(isset($_GET['page_id'])){
   switch ($_GET['page_id']) {
     
       

   }
}else{
  include('imagesl.php');
}

?>
		      <div id="block-block-17" class="clear-block block block-block">
		        <div class="content"></div>
	          </div>
		      <div id="block-menu-menu-fp-content" class="clear-block block block-menu">
		        <div class="content"> </div>
	          </div>
		      <div id="block-views-news-block_1" class="clear-block block block-views" style="color:#bd1300;">
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
                  	$title_p =  '<a href="'.$core['config']['website_url'].'">'.$core['config']['websitetitle'].'</a>';
                  }elseif (isset($_GET[LOAD_GET_PAGE])){
                  	if(isset($_GET[USER_GET_PAGE])){
                  		$usercp_module_title = str_replace($modules_text_tile,$modules_text_translate,$secondary_l);
$title_p =  '<a href="'.$core['config']['website_url'].'">'.$core['config']['websitetitle'].'</a> &gt; <a href="'.$core['config']['website_url'].'/'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.$l_name[3].'">'.str_replace($menu_links_title,$menu_links_translated,$primary_l).'</a> &gt; <a href="'.$core['config']['website_url'].'/'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.$l_name[3].'&panel='.$l2_name[3].'">'.$usercp_module_title.'</a>';
                  	}else{
                  		$title_p =  '<a href="'.$core['config']['website_url'].'">'.$core['config']['websitetitle'].'</a> &gt; <a href="'.$core['config']['website_url'].'/'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.$l_name[3].'">'.str_replace($menu_links_title,$menu_links_translated,$primary_l).'</a>';
                  	}
                  }
                  echo '
                  
                  <div class="where_nav">
                  <table cellpadding="0" cellspacing="0" border="0" >
                  <tr>
                  <td align="left"><img src="template/'.$core['config']['template'].'/images/arrow.gif" border="0"></td>
                  <td>&nbsp;</td>
                  <td width="100%" align="left">'.$title_p.'</td>
                  </table>
                  </div>';
		  	
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
			break;
		}
	}
}
	if($ann_found == '1'){
		echo '
		<div class="tmp_m_content"> 
					<div class="tmp_right_title"><h2>'.text_announcement.'</h2></div>
					<div class="article_body">
								<table cellpadding="0" cellspacing="0" border="0" width="100%">
					  <tr>
					  <td rowspan="3" align="left" width="60"><img src="template/'.$core['config']['template'].'/images/announcement.gif" width="38" height="38"></td>
					  <td align="left" style="padding-top: 2px; padding-bottom: 2px;" class="ann_titulo"><a href="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.ANNOUNCEMENTS_CMS_PAGE.'#announcement-'.$ann_id.'">'.$ann_title.'</a></td>
					  <td align="right" class="ann_date">'.date('F j, Y | H:i',$ann_date).'</td>
					  </tr>
					  <tr>
					  <td colspan="2"  align="left" style="background-image:url(template/'.$core['config']['template'].'/images/inner_line.jpg); height: 2px;"></td>
					  </tr>
					  
					  ';
		if($core['ANNOUNCEMENT']['AUTHOR'] == '1'){
			echo '<tr>
			<td height="40" colspan="2" align="right"><b>'.$core['config']['admin_nick'].'</b> (Administrator)</td>
			</tr>';
			
		}
		echo '</table></div>
							</div><div style="background-image: url(template/'.$core['config']['template'].'/images/article_footer_bg.jpg); height: 1px;"> </div>
						<p>';
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
						  
						  echo '</p>
						
					<div class="tmp_m_content"> 
					<div class="tmp_right_title"><h2>'.htmlspecialchars(str_replace($modules_text_tile,$modules_text_translate,$give_me_out[3])).'</h2></div>
					<div class="article_body">';
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
		echo '</div> </div>			<div style="background-image: url(template/'.$core['config']['template'].'/images/article_footer_bg.jpg); height: 1px;"> </div>
		';
				}
			}
		}
	}
}
}
?>
	          </div>

		      <div id="block-views-fpimage-block_1" class="clear-block block block-views">
		        <div class="content">
		          <div class="view view-fpimage view-id-fpimage view-display-id-block_1 view-dom-id-3">
		            <hr>
	              </div>
	            </div>
	          </div>
	        </div>
		    <div id="region_sidebar">
		      <div id="block-views-latest_articles-block_1" class="clear-block block block-views">
		        <h2>
		          <?=text_member_area; ?>
	            </h2>
		        <div class="content">
		          <div class="view view-latest-articles view-id-latest_articles view-display-id-block_1 view-dom-id-4">
		            <div class="view-content">
		              <div class="item-list">
		                <ul>
		                  <div class="menu-loginlf">
		                  <?
		  if($user_login == '1'){
		  	echo '<div class="tmp_left_menu">
		  	<ul>';
		$m_uss_row_ = get_sort('engine/cms_data/mods_uss.cms',',');
 	 	$count_m_uss = 0;
		foreach ($m_uss_row_ as $tr){
			#explode(",",$tr);
			
			$count_m_uss++;
			if($tr[6] == '1'){
				if($tr[3] != ACCOUNTSETTINGS_CMS_USER){
					if($tr[7] != '1'){
						echo '<li class="list_menu"><a href="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.USER_CMS_PAGE.'&'.USER_GET_PAGE.'='.$tr[3].'">'.str_replace($menu_links_title,$menu_links_translated,$tr[2]).'</a></li>';
					}
				}
				
			}
		}
		echo ' </ul>
		 </div>
		 <table width="100%" border="0" align="center" cellpadding="0" cellspacing="4">
		 <tr>
		  <td style="padding-left:25px; padding-bottom:5px;" align="left" class="yellow"><a href="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.USER_CMS_PAGE.'&'.USER_GET_PAGE.'='.ACCOUNTSETTINGS_CMS_USER.'">'.link_account_settings.'</a></td>
		  <td style="padding-right:25px; padding-bottom:5px;" align="right" class="yellow"><a href="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'=logout">'.link_log_out.'</a></td>
		 </tr>
		 </table>
		 
		 ';
		  }else{
		  	echo '<form method="post" action="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.LOGIN_CMS_PAGE.'" name="uss_login_form">
			 <table width="100%" border="0" align="center" cellpadding="0" cellspacing="4">
  <tr>
    <td style="height: 25px; padding-left: 20px;  " width="130"><input name="uss_id" type="text" id="pvp-login-username" style="width:150px" OnClick="this.value=\'\'" value="USER ID" maxlength="10" ></td>
    <td rowspan="2"><input type="image" src="template/'.$core['config']['template'].'/images/login.png" width="55" height="55" onclick="uss_login_form.submit();" style=" padding-left:10PX"></td>
  </tr>
  <tr>
    <td style="height: 25px; padding-left: 20px;"><input type="password" name="uss_password"  style="width:150px" id="pvp-login-username" value="PASSWORD" maxlength="12" OnClick="this.value=\'\'"><input type="hidden" name="process_login"></td>
  </tr>
    <tr>
    <td style="height: 25px; padding-left: 20px;" colspan="2" align="left" class="yellow"><a href="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.LOSTPASSWORD_CMS_PAGE.'">Recuperar Password</a></td>
  </tr>
     <tr>
    <td style="height: 25px; padding-left: 20px;" colspan="2" align="left"><a href="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.REGISTER_CMS_PAGE.'">'.link_sign_up.'</a></td>
  </tr>
</table>
</form>';
		  }
		  ?>
	                    </ul>
	                  </div>
	                </div>
	              </div>
	            </div>
	          </div>
		      <div id="block-views-latest_articles-block_2" class="clear-block block block-views">
		        <h2>Estadisticas</h2>
		        <div class="content">
		          <div class="view view-latest-articles view-id-latest_articles view-display-id-block_1 view-dom-id-4">
		            <div class="view-content">
		              <div class="item-list">
		                <ul>
		                  <div class="menu-loginlf">
		                  <td colspan="2"><table align="center" style="width: 80%;" cellspacing=;"0" cellpadding="0">
		                    <tr>          
		                    <tr>
		                      <td class="style16" ><table  style="width: 100%; text-align:left;" cellspacing="0" cellpadding="0">
	                            <tr>               
	                              <td width="258" style="color:#ffd308;"><strong>Version: <? echo $config_template->Version; ?></strong></td>
	                              <td width="1" style="color:#ffd308;"></td>
                                </tr>
	                            <tr>
	                              <td style="color:#ffd308;"><strong>Exp: <? echo $config_template->Exp; ?></strong></td>
	                              <td class="stadisticas_td_bg"></td>
                                </tr>
                                <tr>
	                              <td style="color:#ffd308;"><strong>Drop: <? echo $config_template->Drop; ?></strong></td>
	                              <td class="stadisticas_td_bg"></td>
                                </tr>                      
                                

	                            </table></td>
	                        </tr>
		                    <td style="height:5px;"></td>
		                                </table>
		                    <table align="center" style="width: 80%;" cellspacing=;"0" cellpadding="0">
		                      <tr>
	                          <tr>
		                          <td class="style16" >
		                            <table  style="width: 100%; text-align:left;" cellspacing="0" cellpadding="0">
		                              <tr>
		                                <?
//Estadisticas Usuarios

$statistics_users2=$core_db2->Execute("SELECT count(*) memb___id FROM MEMB_INFO");
$core['accounts_reults']=$statistics_users2->fields[0];
?>
		                                <td width="179" class="stadisticas_td_bg"><strong>Cuentas</strong>:</td>
		                                <td width="52" class="stadisticas_td_bg"><?=$core['accounts_reults'];?></td>

	                                  </tr>
		                              <tr>
		                                <?
//Estadisticas Personajes

$statistics_accounts=$core_db->Execute("SELECT count(*) AccountID FROM Character");
$core['character_reults']=$statistics_accounts->fields[0];
?>
		                                <td class="stadisticas_td_bg"><strong>Personajes</strong>:</td>
		                                <td class="stadisticas_td_bg"><?=$core['character_reults'];?></td>

	                                  </tr>
		                              <tr>
		                                <?
//Estadisticas Clanes

$statistics_guilds2=$core_db->Execute("SELECT count(*) G_Name FROM Guild");
$core['guild_reults']=$statistics_guilds2->fields[0];
?>
		                                <td class="stadisticas_td_bg"><strong>Guilds</strong>:</td>
		                                <td class="stadisticas_td_bg"><?=$core['guild_reults'];?></td>

	                                  </tr>
		                              <tr>
		                                <?
//Estadisticas Usuarios Conectados

$statistics_players=$core_db->Execute("SELECT count(*) ConnectStat FROM MEMB_STAT WHERE ConnectStat='1'");
$core['config']['statistics_results']=$statistics_players->fields[0];
?>
		                                <td class="stadisticas_td_bg"><strong>Usuarios Conectados</strong>:</td>
		                                <td class="stadisticas_td_bg"><?=$core['config']['statistics_results'];?></td>

	                                  </tr>
	                                </table></td>
	                          </tr>
		                      <td style="height:5px;"></td>
	                                    </table>
                        </ul>
	                  </div>
	                </div>
	              </div>
	            </div>
	          </div>


<div id="block-views-latest_articles-block_1" class="clear-block block block-views">
		        <h2>
		          Servidores
	            </h2>
		        <div class="content">
		          <div class="view view-latest-articles view-id-latest_articles view-display-id-block_1 view-dom-id-4">
		            <div class="view-content">
		              <div class="item-list">
<?
$ann_file22 = array_reverse(file('engine/variables_mods/GameServers.tDB'));

	$count_ann22 = '0';
	foreach ($ann_file22 as $ann22){
		$ann22 = explode("|",$ann22);
$consulta_gsl22 = $core_db->Execute("SELECT count(memb___id) FROM MEMB_STAT WHERE ConnectStat = '1' and ServerName='".$ann22[3]."'");
$porcentajeGSL = substr(100 * $consulta_gsl22->fields[0] / $ann22[4], 0, 5);	
if ($porcentajeGSL >= 0){$gsl_color='success';}
if ($porcentajeGSL > 49){$gsl_color='info';}
if ($porcentajeGSL > 69){$gsl_color='warning';}
if ($porcentajeGSL > 79){$gsl_color='danger';}
echo '
<div class="gslist">
<p style="color: #fff;">'.$ann22[3].' - '.ChekServer($ann22[1],$ann22[2]).'</p>
<div class="progress">
  <div class="progress-bar progress-bar-'.$gsl_color.'" role="progressbar" aria-valuenow="'.$porcentajeGSL.'"
  aria-valuemin="0" aria-valuemax="'.$ann22[4].'" style="width:'.$porcentajeGSL.'%">
    '.$porcentajeGSL.'% ('.$consulta_gsl22->fields[0].' users)
  </div>
</div>
</div>
';
	}
?>
	                  </div>
	                </div>
	              </div>
	            </div>
	          </div>

		      <div id="block-views-latest_articles-block_1" class="clear-block block block-views">
		        <h2>
		          <?=text_menu?>
	            </h2>
		        <div class="content">
		          <div class="view view-latest-articles view-id-latest_articles view-display-id-block_1 view-dom-id-4">
		            <div class="view-content">
		              <div class="item-list">
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
					   				echo '<li class="list_menu"><a href="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.$li[3].'">'.str_replace($menu_links_title,$menu_links_translated,$li[2]).'</a></li>';
					   			}
					   	
					   		}
					   		break;
					   	case '1':
					   		switch ($li[11]){
					   			case '1': $target = "_blank"; break;
					   			case '0': $target = "_self"; break;
					   		}
					   		echo '<li class="list_menu"><a href="'.$li[10].'" target="'.$target.'">'.str_replace($menu_links_title,$menu_links_translated,$li[2]).'</a></li> ';
					   	
					   	break;
					   }


					  	
					  }
					  
		  ?>
	                    </ul>
	                  </div>
	                </div>
	              </div>
	            </div>
	          </div>
		      <div id="block-views-latest_articles-block_1" class="clear-block block block-views">
		        <div class="content">
		          <div class="view view-latest-articles view-id-latest_articles view-display-id-block_1 view-dom-id-4">
		            <div class="view-content">
		              <div class="item-list">
		                <ul>
		                  <div class="menu-loginlf2">
		                  <?
$load_pages_lef = file('engine/cms_data/pag_d.cms');
foreach ($load_pages_lef as $pages_loaded_lef){
	$pages_loaded_lef = explode(",",$pages_loaded_lef);
	if($pages_loaded_lef[3] == $page_check_id){
		$p_loaded_array_lef = preg_split( "/\ /", $pages_loaded_lef[4]); 
		$p_l_lef = '1';
		break;
	}
}
if($p_l_lef == '1'){
$load_mods_lef = file('engine/cms_data/mods.cms');
foreach ($load_mods_lef as $mods_loaded_lef){
	$mods_loaded_lef = explode(",",$mods_loaded_lef);

	if(in_array($mods_loaded_lef[0],$p_loaded_array_lef)){
		$_c_id_m_lef[] = $mods_loaded_lef[0];
	}else {
		$_c_id_m_lef[] = 'NULL';
	}
}
$co=0;
foreach ($p_loaded_array_lef as $give_lef){
	#echo $give;
	if(in_array($give_lef,$_c_id_m_lef)){
		foreach ($load_mods_lef as $give_me_out_lef){
			$give_me_out_lef = explode(",",$give_me_out_lef);
			if($give_me_out_lef[0] == $give_lef){
				if($give_me_out_lef[4] == '1'){
					echo '
				<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top: 15px; ">
		  <tr>
		  <td width="2" height="33"></td>
		  <td class="tmp_left_title">'.htmlspecialchars(str_replace($modules_text_tile,$modules_text_translate,$give_me_out_lef[3])).'</td>
		  <td width="2" height="33"></td>
		  </tr>
		  </table>
		  <div class="tmp_left_m">
		   <div class="right_page_content">';
				
					
				if($give_me_out_lef[1] == '1'){
					$mod_file_lef = $give_me_out_lef[2];
					if(is_file('pages_modules/'.$mod_file_lef.'')){
						include('pages_modules/'.$mod_file_lef.'');
					}else{
						echo 'Unable to load module file, reason: not found.';
					}
				}elseif ($give_me_out_lef[1] == '0'){
					if(is_file('engine/cms_data/cms_co/'.$give_me_out_lef[0].'_cms.cms')){
						include('engine/cms_data/cms_co/'.$give_me_out_lef[0].'_cms.cms');
					}else{
						echo 'Unable to load module content, reason: not found.';
					}
					
					#echo $give_me_out_lef[4];
				}
				
				echo '</div></div>';
				}
			}
		}
		#echo $module;
	}
}
}
      ?>
	                    </ul>
	                  </div>
	                </div>
	              </div>
	            </div>
	          </div>
		      <div id="block-menu-menu-fp-top-right" class="clear-block block block-menu">
		        <div class="content">
		          <ul class="menu">
		            <li class="leaf last"><a href="<?=ROOT_INDEX.'?'.LOAD_GET_PAGE.'='?>downloads" title="" class="menu_icon menu-1418">Descargar Cliente</a></li>
	              </ul>
	            </div>
	          </div>
		      <div id="block-menu-menu-fp-bottom-right" class="clear-block block block-menu"></div>
		      <div id="region_sidebar_bottom"></div>
	        </div>
		    <div style="clear:both;"></div>
	      </div>
		  <div id="lol-footer" role="contentinfo" class="i18n-es">
		    <div class="section">
    <div id="lol-footer-top">
      <div id="lol-footer-info">
        <a href="<?=FACEBOOK_LINK;?>" class="logo-riotgamescom hidden-text" alt="Logotipo de Riot Games" target="_blank"></a>
        <a href="<?=ROOT_INDEX.'?'.LOAD_GET_PAGE.'='?>register" class="play-free-link" target="_blank">Registre-Se</a>       
        <div id="lol-footer-copyright">
         <?=build_footer();?>
        </div>
    </div>
    </div>
  </div>
</div>

  </div>
  <?=LoadCustom('bs_footer');?>
	</body>
</html>
