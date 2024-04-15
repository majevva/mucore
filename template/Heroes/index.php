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
	<script type="text/javascript" language="javascript" src="template/<?=$core['config']['template'] ?>/js/jquery.easing.1.3.js"></script>
	<script type="text/javascript" language="javascript" src="template/<?=$core['config']['template'] ?>/js/jquery.animate-colors-min.js"></script>
	<script type="text/javascript" language="javascript" src="template/<?=$core['config']['template'] ?>/js/jquery.skitter.min.js"></script>
	<script type="text/javascript" language="javascript" src="template/<?=$core['config']['template'] ?>/js/reloj.js"></script>
	<script type="text/javascript" src="template/<?=$core['config']['template'] ?>/js/heroes_config.js"></script>
	<!-- Init Skitter -->
	<script type="text/javascript" language="javascript">
		$(document).ready(function() {
			$('.box_skitter_large').skitter({
				theme: 'default',
				numbers_align: 'center',
				progressbar: false, 
				dots: false, 
				preview: false
			});
		});
	</script>

	



<style type="text/css">

</style>
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
<div style="width: 100%;position: absolute;">
<div id='cssmenu'>
<ul >
   <li><a href='<? echo $core['config']['website_url'];?>'>Inicio</a></li>
   <li><a href='<?=$config_template->Registro;?>'>Registrarse</a></li>
   <li><a href='<?=$config_template->Descargas;?>'>Descargas</a></li>
   <li><a href='<?=$config_template->Foro;?>' target='_blank'>Foro</a> </li>
   <li><a href='<?=$config_template->WebShop;?>'>Webshop</a></li>   
</ul>
</div>
</div>
<div class="headerweb">
	<div></div>
</div>
<div id="l_centered">
<div id="caja1">	
 

		  <div class="brian_cl">
		  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="bgheader_01">
		  <tr>
		  <td height="38">
		  	
		  </td>
		  </tr>
		  <tr>
		  	<td>
		  		<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="192" height="65" align="middle">
				<param name="movie" value="template/<?=$core['config']['template'] ?>/images/tpl/menu.swf">
				<param name="quality" value="high">
                                <param name="scale" value="noborder">
				<param name="salign" value="t">
				<param name="wmode" value="transparent">
                                <param name="allowfullscreen" value="false">
				<param name="allowscriptaccess" value="always">
				<object type="application/x-shockwave-flash" data="template/<?=$core['config']['template'] ?>/images/tpl/menu.swf" width="192" height="65" align="middle">
				<param name="quality" value="high">
                                <param name="scale" value="noborder">
				<param name="salign" value="t">
				<param name="wmode" value="transparent">
                                <param name="allowfullscreen" value="false">
		                <param name="allowscriptaccess" value="always">
               </object></object>
		  	</td>
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
		  		<div class="fixmen_01"></div>  
		</div>
	
		  <div class="brian_cl">
		  	<table width="100%" border="0" cellspacing="0" cellpadding="0">
		  <tr>
		  	<td>
		  		<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="192" height="65" align="middle">
				<param name="movie" value="template/<?=$core['config']['template'] ?>/images/tpl/status.swf">
				<param name="quality" value="high">
                                <param name="scale" value="noborder">
				<param name="salign" value="t">
				<param name="wmode" value="transparent">
                                <param name="allowfullscreen" value="false">
				<param name="allowscriptaccess" value="always">
				<object type="application/x-shockwave-flash" data="template/<?=$core['config']['template'] ?>/images/tpl/status.swf" width="192" height="65" align="middle">
				<param name="quality" value="high">
                                <param name="scale" value="noborder">
				<param name="salign" value="t">
				<param name="wmode" value="transparent">
                                <param name="allowfullscreen" value="false">
		                <param name="allowscriptaccess" value="always">
               </object></object>
		  	</td>
		  </tr>
		  </table>
		  <div class="oli_menu_pri">
			<table style="text-align:left;" cellspacing="0" cellpadding="0">
                                                              <tr>
                                                                <td width="100" style="color:#DDBE49;"><strong>Version:</strong></td>
					                                            <td width="70"><strong><?=$config_template->Version;?></strong></td>
                                                               </tr>
                                                               <tr>
                                                                <td width="100" style="color:#DDBE49;"><strong>Experiencia:</strong></td>
					                                            <td width="70"><strong><?=$config_template->Exp;?></strong></td>
                                                               </tr>
                                                               <tr>
                                                                <td width="100" style="color:#DDBE49;"><strong>Drop:</strong></td>
					                                            <td width="70"><strong><?=$config_template->Drop;?></strong></td>
                                                               </tr>
															   <tr>
					                        					<td width="100" style="color:#DDBE49;"><strong>Cuentas Totales:</strong></td>
																 <td width="70"><strong><?=$cues;?></strong></td>
																</tr>
															<tr>
					                        				<td style="color:#DDBE49;"><strong>Gremios Totales:</strong></td>
					                      				    <td><strong><?=$guild;?></strong></td>
             												 </tr>
					                      <tr>
	<? $barra = $core_db->Execute("SELECT count(*) FROM MEMB_STAT WHERE ConnectStat = '1'");	 
			$online= $barra->fields[0];?><td style="color:#DDBE49;"><strong>Usuarios Online:</strong></td>
					                        <td><strong><span><?=$online;?></span></strong></td>
                </tr>
                                                             </table>
        </div>
       <div class="fixmen_01"></div> 
	  </div>



	  		  		 	  	  
</div>

<div id="caja2">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
		  <tr>
		  <td>
		<div class="oli_co_2"> 
		<div class="slider-bg"></div>
			   <div class="box_skitter box_skitter_large">

						<ul>
							<li><a href="" target="_blank"><img src="template/<?=$core['config']['template'];?>/images/slider/001.jpg" class="cube" /></a></li>
							<li><a href="" target="_blank"><img src="template/<?=$core['config']['template'];?>/images/slider/002.jpg" class="cubeRandom" /></a></li>
							<li><a href="" target="_blank"><img src="template/<?=$core['config']['template'];?>/images/slider/003.jpg" class="block" /></a></li>
							<li><a href="" target="_blank"><img src="template/<?=$core['config']['template'];?>/images/slider/004.jpg" class="cube" /></a></li>
							<li><a href="" target="_blank"><img src="template/<?=$core['config']['template'];?>/images/slider/005.jpg" class="cubeRandom" /></a></li>
						</ul>
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
<div id="caja3">
	<div class="brian_cl2">	
		  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="bgheader_02">
		  <tr>
		  <td height="38">
		  	
		  </td>
		  </tr>
		  <tr>
		  	<td>
		  		<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="192" height="65" align="middle">
				<param name="movie" value="template/<?=$core['config']['template'] ?>/images/tpl/login.swf">
				<param name="quality" value="high">
                                <param name="scale" value="noborder">
				<param name="salign" value="t">
				<param name="wmode" value="transparent">
                                <param name="allowfullscreen" value="false">
				<param name="allowscriptaccess" value="always">
				<object type="application/x-shockwave-flash" data="template/<?=$core['config']['template'] ?>/images/tpl/login.swf" width="192" height="65" align="middle">
				<param name="quality" value="high">
                                <param name="scale" value="noborder">
				<param name="salign" value="t">
				<param name="wmode" value="transparent">
                                <param name="allowfullscreen" value="false">
		                <param name="allowscriptaccess" value="always">
               </object></object>
		  	</td>
		  </tr>
		  </table>			   
		  <?
		  if($user_login == '1'){
		  	echo '<div class="oli_menu_pri2">
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
		<table width="85%" border="0" align="center" cellpadding="0" cellspacing="4">
		 <tr>
		  <td align="left" class="yellow"><a  href="index.php?page_id=donar">Donar</a></td>
		  <td align="right" class="yellow"><a  href="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'=logout">'.link_log_out.'</a></td>
		 </tr>
		 </table>
		<div class="fixmen_02"></div>
		 </div>
		 
		 ';
		  }else{
		  	echo '<div class="oli_menu_pri2">
		  	<table cellpadding="0" cellspacing="0" style="width: 82%; height: 16px;background: #551400;font-size:11px;margin-left: 10px;">
							<tbody><tr>
								<td style="width: 39px">Tiempo:  </td>
								<td class="style50" style="width: 133px">&nbsp;<span id="ServerTime" style="color:#df5f18;"><span style="color:#f8b710"></span>
								<script type="text/javascript" language="javascript">
                                                                <!--
                                                                clock2.init(\' '.date("H:i:s F d, Y").' \',\'ServerTime\',1000);
                                                                -->
                                                                </script></td>
                                                                <td>&nbsp;</td>
							</tr>
						</tbody></table>
		  	<form method="post" action="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.LOGIN_CMS_PAGE.'" name="uss_login_form">
			 <table width="100%" border="0" align="center" cellpadding="0" cellspacing="4">
  <tr>
    <td style="height: 25px; padding-left: 2px;" width="80"><input type="text" name="uss_id" maxlength="10" class="login_field" value="USUARIO" OnClick="this.value=\'\'"></td>
    <td rowspan="2"><input id="ahrre" style="border:1px solid #535353;border-radius:8px;margin-left:3px;" type="image" src="template/'.$core['config']['template'].'/images/tpl/entrar.jpg" width="54" height="48" onclick="uss_login_form.submit();"></td>
  </tr>
  <tr>
    <td style="height: 10px; padding-left: 2px;"><input type="password" name="uss_password" class="login_field" value="PASSWORD" maxlength="12" OnClick="this.value=\'\'"><input type="hidden" name="process_login"></td>
  </tr>
    <tr>
    <td style="height: 13px; padding-left: 2px;" colspan="2" align="left" class="yellow"><a  href="index.php?page_id=lost_password"><h6 style="color: #a59f9a;font-size:11px;" align="center">Recuperar Password</h6></a></td>
  </tr>
</table>
</form></div><div class="fixmen_02"></div>';
		  }
		  ?>
		  </div>

		  <div class="brian_cl2">
		  	<table width="100%" border="0" cellspacing="0" cellpadding="0">
		  <tr>
		  	<td>
		  		<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="192" height="65" align="middle">
				<param name="movie" value="template/<?=$core['config']['template'] ?>/images/tpl/links.swf">
				<param name="quality" value="high">
                                <param name="scale" value="noborder">
				<param name="salign" value="t">
				<param name="wmode" value="transparent">
                                <param name="allowfullscreen" value="false">
				<param name="allowscriptaccess" value="always">
				<object type="application/x-shockwave-flash" data="template/<?=$core['config']['template'] ?>/images/tpl/links.swf" width="192" height="65" align="middle">
				<param name="quality" value="high">
                                <param name="scale" value="noborder">
				<param name="salign" value="t">
				<param name="wmode" value="transparent">
                                <param name="allowfullscreen" value="false">
		                <param name="allowscriptaccess" value="always">
               </object></object>
		  	</td>
		  </tr>
		  </table>
		  <div class="oli_menu_pri2">
			<?=$config_template->Plubli_Left;?>
        </div>
       <div class="fixmen_02"></div> 
	  </div>

<div class="brian_cl2">
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
	<td><h1 class="entrar" align="center" style="margin-top: 2px;">Servidores</h1></td>
	</tr>
	</table>	
	<div class="oli_menu_pri2">

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
	</div>
<div class="fixmen_02"></div> 
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


<table align="center" cellpadding="0" cellspacing="0" style="width: 100%" class="table30">
<tbody><tr>
 <td>
 <table width="1003" border="0" cellpadding="0" cellspacing="0" align="center" style="height: 362px">
  <tbody><tr>
     <td valign="top">
        <table class="table21" width="192" border="0" cellpadding="0" cellspacing="0">
        <tbody><tr>
       	  <td width="192" height="365" valign="top">   
          


          </td>
        </tr></tbody></table>        
        </td>
        <td valign="top">
        
        <table border="0" cellpadding="0" cellspacing="0" width="622" style="height: 365px">
                <tbody><tr>
<td class="table19" height="365">

  <table style="width: 100%" cellpadding="0" cellspacing="0">
	<tbody><tr>
		<td style="width: 17px">&nbsp;</td>
		<td style="width: 472px; height: 182px;">
			<? include('template/'.$core['config']['template'].'/config/module_gens.php'); ?>
		</td>
		<td valign="top"><span lang="es">&nbsp;
		<a href="<?=$config_template->Registro;?>">
		<img alt="" height="34" src="template/<?=$core['config']['template'] ?>/images/tpl/img_01.gif" width="64" style="border:0px"></a></span></td>
	</tr>
	<tr>
		<td style="width: 17px; height: 18px;"></td>
		<td style="width: 472px; height: 18px;"></td>
		<td style="height: 18px"></td>
	</tr>
	<tr>
		<td style="width: 17px; height: 143px;"></td>
		<td style="width: 472px; height: 148px;" class="style69" valign="top">
			<? include('template/'.$core['config']['template'].'/config/module_castle.php'); ?>
		</td>
		<td style="height: 143px"></td>
	</tr>
	<tr>
		<td style="width: 17px; height: 17px;"></td>
		<td style="width: 472px; height: 17px;"></td>
		<td style="height: 17px"></td>
	</tr>
</tbody></table>
 </td>         
</tr>
  </tbody></table>      
    </td>
        <td valign="top">
	<table width="189" border="0" cellpadding="0" cellspacing="0" class="table20">
        <tbody><tr><td valign="top">
        </td></tr>
        </tbody></table>
   </td>		
 </tr>
</tbody></table>
</td>
</tr>
</tbody></table>


<table width="1003" border="0" cellpadding="0" cellspacing="0" align="center" class="style31">
<tbody><tr>
<td align="left" valign="top" class="table27" style="height: 82px">
<table align="right" style="width: 100%; height: 82px">
	<tbody><tr>
		<td style="width: 38px">
		</td>
		<td style="width: 165px">
		</td>
		<td class="style30" style="text-align:center;width: 578px; color:#a09b98; font-family:Verdana, Geneva, Tahoma, sans-serif;font-size:12px">
		<?=$config_template->Nombre;?> - <?=$config_template->Version;?><br>
		&copy; Copyright 2016 - MuCore Premium <?=crypt_it($engine,'','1');?><br>
		Todos los derechos reservados.</td>
				<td>
				<table cellpadding="0" cellspacing="0" style="width: 100%; height: 63px;">
					<tbody><tr>
						<td style="width: 22px; height: 28px">
						</td>
						<td style="height: 28px">
						</td>
						<td style="height: 28px">
						</td>
						<td style="height: 28px">
						</td>
						<td style="height: 28px;">
						</td>
						<td style="height: 28px;">
						&nbsp;</td>
						<td style="height: 28px">
						</td>
					</tr>
					<tr>
						<td title="YouTube" style="width: 34px">
						<a target="_blank" href="<?=$config_template->YouTube;?>">
						<img alt="" class="style77" height="35" src="template/<?=$core['config']['template'] ?>/images/tpl/back_10.png" width="34" style="border:0"></a></td>
						<td title="Twitter" style="width: 34px">
						<a target="_blank" href="<?=$config_template->Twitter;?>">
						<img alt="" class="style77" height="35" src="template/<?=$core['config']['template'] ?>/images/tpl/back_10.png" width="34" style="border:0"></a></td>
						<td title="Heroes Networks" style="width: 34px">
						<a target="_blank" href="<?=$config_template->Foro;?>">
						<img alt="" class="style77" height="35" src="template/<?=$core['config']['template'] ?>/images/tpl/back_10.png" width="34" style="border:0"></a></td>
						<td title="Facebook" style="width: 34px">
						<a target="_blank" href="<?=$config_template->Facebook;?>">
						<img alt="" class="style77" height="35" src="template/<?=$core['config']['template'] ?>/images/tpl/back_10.png" width="34" style="border:0"></a></td>
						<td title="Google+" style="width: 34px">
						<a target="_blank" href="<?=$config_template->Google;?>">
						<img alt="" class="style77" height="35" src="template/<?=$core['config']['template'] ?>/images/tpl/back_10.png" width="34" style="border:0"></a></td>
						<td>
						&nbsp;</td>

					</tr>
				</tbody></table>

				</td>
				</tr>
			</tbody></table>

		</td>
				</tr>
			</tbody></table>
</body>
</html>