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
	<script type="text/javascript" language="javascript" src="template/<?=$core['config']['template'] ?>/js/jquery.easing.1.3.js"></script>
	<script type="text/javascript" language="javascript" src="template/<?=$core['config']['template'] ?>/js/jquery.animate-colors-min.js"></script>
	<script type="text/javascript" language="javascript" src="template/<?=$core['config']['template'] ?>/js/jquery.skitter.min.js"></script>
	<script type="text/javascript" language="javascript" src="template/<?=$core['config']['template'] ?>/js/reloj.js"></script>
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

<header class="header">
<div class="topbar">
  		<div class="container clearfix">
  			<div class="languages">
			<span>
            <a href="#" title="GB" class="f16">
            <span class="active flag gb">
            </span>
            </a>
            </span>
  			</div>
		    <nav class="navbar" id="navigation">
		      <ul class="nav">
    <li><a href='<? echo $core['config']['website_url'];?>'>Inicio</a></li>
   <li><a href='<?=$config_template->Registro;?>'>Registrarse</a></li>
   <li><a href='<?=$config_template->Descargas;?>'>Descargas</a></li>
   <li><a href='<?=$config_template->Foro;?>' target='_blank'>Foro</a> </li>
   <li><a href='<?=$config_template->WebShop;?>'>Webshop</a></li>       
		      </ul>
		    </nav>
		  </div>
</div>

<div class="container head">
        <aside class="sidebar">
        <div class="cp-btn">
          
          <a href="<?=$config_template->Registro;?>" class="unhwid">Create Account</a>
          <br>
          <a href="<?=$config_template->Recover;?>" class="reminder">Recover Password</a>
        </div>
        
      <div class="servers">
                
<?
$file_GameServer00 = file('engine/variables_mods/GameServers.tDB');
foreach ($file_GameServer00 as $GSL_DB00){
  $GSL_DB00 = explode("|",$GSL_DB00);

$consulta_gsl00 = $core_db->Execute("SELECT count(memb___id) FROM MEMB_STAT WHERE ConnectStat = '1' and ServerName='".$GSL_DB00[3]."'");
$porcentajeGSL00 = substr(100 * $consulta_gsl00->fields[0] / $GSL_DB00[4], 0, 5);
if ($porcentajeGSL00 >= 0){$gsl_color='success';}
if ($porcentajeGSL00 > 49){$gsl_color='info';}
if ($porcentajeGSL00 > 69){$gsl_color='warning';}
if ($porcentajeGSL00 > 79){$gsl_color='danger';}

echo '
<div class="inner status">
          <div class="item serv-block" data-online=">758">
            <div class="ico"><img src="https://titanmu.net/assets/titanmu/images/sv1.png" width="50px" alt="">
            </div>
            <div class="desp">
              <div class="name">'.$GSL_DB00[3].'</div>
              <div class="status"><font color="green">'.ChekServer($GSL_DB00[1],$GSL_DB00[2]).'</font></div>
              <div class="serv-im">
                <div class="scale" style="width:'.$porcentajeGSL00.'%"></div>
              </div>
              <div class="clr"></div>
              <p class="narg2">Active In 24H: <span class="scale2">'.$porcentajeGSL00.'%</span></p>
              <p class="narg">Online: <span class="scale2">'.$consulta_gsl00->fields[0].'</span></p>
            </div>
            <div class="clr"></div>
          </div>
        </div>
';
}
?>

        </div>


      </aside>
      <aside class="sidebar-right">
        <div class="logo">
          <a href="index.php"><img src="template/<?=$core['config']['template'];?>/images/logo.png" alt="" style="width: 230px;height:160px;margin-right: -65px;"></a>
        </div>
        <div class="start">
          <h3>Comming soon</h3>
          <a href="<?=$config_template->Registro;?>" class="btn-start">Registration</a>
          <a href="<?=$config_template->Descargas;?>" class="btn-download">
            <span class="size">Soon</span>
            DOWNLOAD
            <p>Start your journey with <?=$config_template->Nombre;?></p>
          </a>
        </div>
      </aside>
</div>


</header>

<div id="l_centered">

<div id="caja1">

<div class="block tops">
  <div class="title"><span>Panel de Usuario</span></div>
    <div class="tops-nav">
      <div class="entry">		   
		  <?
		  if($user_login == '1'){
		  	echo '<div class="oli_menu_pri">
			<center><div style="background-color:#28334c; color:#ffffff; font-size: 10.5px; padding-left: 5px; margin-left:1px; margin-right:1px; margin-bottom: 3px;"><b>¡Bienvenido/a '.$user_auth_id.'!</b></div></center>
		  	<ul>';
		$m_uss_row_ = get_sort('engine/cms_data/mods_uss.cms',',');
 	 	$count_m_uss = 0;
		foreach ($m_uss_row_ as $tr){
			@explode(",",$tr);
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
			 <table width="100%" border="0" align="center" cellpadding="0" cellspacing="4">
  <tr>
    <td style="height: 25px; padding-left: 2px;" width="190">
    <input type="text" name="uss_id" maxlength="10" class="login_field" placeholder="username"></td>
    <td rowspan="2" style="padding-top: 2px;opacity:0.7;">
    <input type="submit" id="submit" value="Login" class="bl" style="border:none;cursor:pointer;margin-left: 10px;">
    </td>
  </tr>
  <tr>
    <td style="height: 10px; padding-left: 2px;">
    <input type="password" name="uss_password" class="login_field" placeholder="password" maxlength="12">
    <input type="hidden" name="process_login"></td>
  </tr>
    <tr>
    <td style="padding-top: 20px;" colspan="2" align="left" class="yellow">
    <a  href="index.php?page_id=lost_password"><h6 style="font-weight:bold;" align="center">Recuperar Password</h6></a></td>
  </tr>
</table>
</form>';
		  }
		  ?>
</div>
    <div class="clear"></div>
    </div>
      <div class="tops-content">
                        
      </div>
</div>



<div class="block tops">
  <div class="title"><span>Menu General</span></div>
    <div class="tops-nav">
      <div class="entry">
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
    <div class="clear"></div>
    </div>
      <div class="tops-content">
                        
      </div>
</div>



<div class="block tops">
  <div class="title"><span>Servidores</span></div>
    <div class="tops-nav">
      <div class="entry">	
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
    <div class="clear"></div>
    </div>
      <div class="tops-content">
                        
      </div>
</div>

	
<div class="block tops">
  <div class="title"><span>Informacion</span></div>
    <div class="tops-nav">
      <div class="entry">
			<table style="text-align:left;" cellspacing="0" cellpadding="0">
                                                              <tr>
                                                                <td width="150" style="color:#6A91BD;">Version:</td>
					                                            <td width="100"><?=$config_template->Version;?></td>
                                                               </tr>
                                                               <tr>
                                                                <td width="150" style="color:#6A91BD;">Experiencia:</td>
					                                            <td width="100"><?=$config_template->Exp;?></td>
                                                               </tr>
                                                               <tr>
                                                                <td width="150" style="color:#6A91BD;">Drop:</td>
					                                            <td width="100"><?=$config_template->Drop;?></td>
                                                               </tr>
															   <tr>
					                        					<td width="150" style="color:#6A91BD;">Cuentas Totales:</td>
																 <td width="100"><?=$cues;?></td>
																</tr>
															<tr>
					                        				<td style="color:#6A91BD;">Gremios Totales:</td>
					                      				    <td><?=$guild;?></td>
             												 </tr>
					                      <tr>
	<? $barra = $core_db->Execute("SELECT count(memb___id) FROM MEMB_STAT WHERE ConnectStat = '1'");	 
			$online= $barra->fields[0]; ?><td style="color:#6A91BD;">Usuarios Online:</td>
					                        <td><span><?=$online;?></span></td>
                </tr>
                                                             </table>
      </div>
    <div class="clear"></div>
    </div>
      <div class="tops-content">
                        
      </div>
</div>
	  		  		 
<div class="block tops">
  <div class="title"><span>Redes Sociales</span></div>
    <div class="tops-nav">
      <div class="entry">

<div id="social_icons" align="center">
<a href="<?=$config_template->Facebook;?>" target="_blank"><img src="template/<?=$core['config']['template'];?>/images/facebook.png" width="30" height="30" border="0" /></a>
<a href="<?=$config_template->Twitter;?>" target="_blank"><img src="template/<?=$core['config']['template'];?>/images/twitter.png" width="30" height="30" border="0" /></a>
<a href="<?=$config_template->YouTube;?>" target="_blank"><img src="template/<?=$core['config']['template'];?>/images/youtube.png" width="30" height="30" border="0" /></a>
<a href="<?=$config_template->Instagram;?>" target="_blank"><img src="template/<?=$core['config']['template'];?>/images/instagram.png" width="30" height="30" border="0" /></a>
<a href="<?=$config_template->Google;?>" target="_blank"><img src="template/<?=$core['config']['template'];?>/images/google.png" width="30" height="30" border="0" /></a>
</div>

      </div>
    <div class="clear"></div>
    </div>
      <div class="tops-content">
                        
      </div>
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


</td>
</tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td>
<div id="arg_footer">
<div class="scrollTop">
      <a href="#" class="scroll"></a>
    </div>
<div id="foot_info">
<p style="color: #6A91BD;"><? echo $config_template->Nombre; ?> &copy; 2017</p>
<p> <a href="http://mucorepremium.net/">MuCore Premium v<?=crypt_it($engine,'','1');?> </a> <br>
<font style="color: #84a79f;">Todos los Derechos Reservados.</font></p>
</div>
</div>
</td>
</tr>
</table>
</div>
<?=LoadCustom('bs_footer');?>
</body>
</html>