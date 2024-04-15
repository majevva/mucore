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

<div id="tmp_nav_header" class="sticky">
<div id="tmp_nav_header_menu">
<div id='cssmenu'>
<ul style="margin-left:220px;">
   <li><a href='<? echo $core['config']['website_url'];?>'><font style="font-family: Brian; font-size:21px;">INICIO</font></a></li>
   <li><a href='<?=$config_template->Registro;?>'><font style="font-family: Brian; font-size:21px;">REGISTRARSE</font></a></li>
   <li><a href='<?=$config_template->Descargas;?>'><font style="font-family: Brian; font-size:21px;">DESCARGAS</font></a></li>
   <li><a href='<?=$config_template->Foro;?>' target='_blank'><font style="font-family: Brian; font-size:21px;">FORO</font></a> </li>
   <li><a href='<?=$config_template->WebShop;?>'><font style="font-family: Brian; font-size:21px;">WEBSHOP</font></a></li>   
</ul>
</div>
	<div class="logotyp"><a href="index.php"><img src="template/<?=$core['config']['template'] ?>/images/logo.png"> </a> </div>
</div>
</div>
<div id="caja_header">
<div id="caja_header_in0">
</div>
<div id="caja_header_in">
	<div class="buttony">
      <a href="index.php?page_id=register"><img src="template/<?=$core['config']['template'] ?>/images/tpl/login.png"></a>
      <a href="index.php?page_id=descarga"><img src="template/<?=$core['config']['template'] ?>/images/tpl/download.png"></a>
    </div>
</div>
</div>

<!--CAJA DE SLIDER Y STATUS-->
<div id="kontenergora">

	<div class="newsgora">
		<? $barra = $core_db->Execute("SELECT count(memb___id) FROM MEMB_STAT WHERE ConnectStat = '1'");	 
			$online= $barra->fields[0]; ?>

	<div class="sstatus"> <br><br><br><br><br><br><br>
		<div class="dateicon"> <img src="template/<?=$core['config']['template'] ?>/images/tpl/icon-up.png">
			<li>Server time: <time id="tLocalTime">17:02:41 Fri Oct 21</time> </li>
					<script type="text/javascript" language="javascript">
            		<!--
            		clock2.init('<?php echo date("H:i:s F d, Y");?>','tLocalTime',1000);
            		-->
        			</script>
		</div>   
		<div class="dateicon">
			<img src="template/<?=$core['config']['template'] ?>/images/tpl/icon-down.png"> 
			<li><font color="green">EXP <?=$config_template->Exp;?> - DROP <?=$config_template->Drop;?></font></li>
		</div><br>
		<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<font color="#d8d8d8"><?=$config_template->Nombre;?> is</font> <font color="green"> ONLINE </font><br>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<font color="#d8d8d8">Version: </font><?=$config_template->Version;?><br>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<font color="#d8d8d8">Players Online: </font><?=$online;?><br>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<font color="#d8d8d8">Cuentas: </font><?=$cues;?><br>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<font color="#d8d8d8">Guilds: </font><?=$guild;?></p> 						
	</div>
	<div class="diamentowy"> </div>
	<div class="box_skitter box_skitter_large">
	<ul>
		<li><a href="" target="_blank"><img src="template/<?=$core['config']['template'];?>/images/slider/001.jpg" class="cube" /></a></li>
		<li><a href="" target="_blank"><img src="template/<?=$core['config']['template'];?>/images/slider/002.jpg" class="cubeRandom" /></a></li>
	</ul>
</div>

	</div>
</div>

<!--FIN DE CAJA DE SLIDER Y STATUS-->
<div id="l_centered">
<!--INICIO IZQUIERDA-->
<div id="caja1">	
<div class="brian_cl"  <? if($user_login == '1'){ echo 'style="margin-bottom: -3px;"'; } ?> >		   
		  <?
		  if($user_login == '1'){
		  	echo '<div class="oli_menu_pri">
		  	<div class="tmp_left_menu1">
		  	<div style="height:34px;"></div>
		  	<ul>';
		$m_uss_row_ = get_sort('engine/cms_data/mods_uss.cms',',');
 	 	$count_m_uss = 0;
		foreach ($m_uss_row_ as $tr){
			explode(",",$tr);
			$count_m_uss++;
			if($tr[6] == '1'){
				if($tr[3] != ACCOUNTSETTINGS_CMS_USER){
					echo '<li class="list_menu00"><a  href="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.USER_CMS_PAGE.'&'.USER_GET_PAGE.'='.$tr[3].'">'.str_replace($menu_links_title,$menu_links_translated,$tr[2]).'</a></li>';
				}
				
			}
		}
		echo ' </ul>
		<table width="100%" border="0" align="center" cellpadding="0" cellspacing="4">
		 <tr>
		  <td class="yellow"><a  href="index.php?page_id=donar">Donar</a></td>
		  <td class="yellow"><a  href="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'=logout">'.link_log_out.'</a></td>
		 </tr>
		 </table>
		</div>
		 </div>
		 
		 ';
		  }else{
		  	echo '<div class="loginbox">
	<form method="post" action="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.LOGIN_CMS_PAGE.'" name="uss_login_form">
	<br><br><br>
	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="4">
  <tbody>
  <tr>
    <td style="height: 25px; padding-left: 0px;   font-family: Titillium Web, sans-serif;" width="130"> 
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <font color="#d5c692" size="2">&nbsp;&nbsp;Username:&nbsp;&nbsp;&nbsp;  </font>
    <input type="text" name="uss_id" maxlength="12" class="login_field" onclick="this.value=\'\'">
    </td>
  </tr>
  <tr>
    <td style=" height: 25px; font-family: Titillium Web, sans-serif; ">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <font color="#d5c692" size="2">&nbsp;&nbsp;Password: &nbsp;&nbsp;</font>  
	<input type="password" name="uss_password" class="login_field" maxlength="12" onclick="this.value=\'\'">
	<input type="hidden" name="process_login"></td>
  </tr>
  <tr>
  <td rowspan="2">
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <login_field type="image" class="loginy" src="template/'.$core['config']['template'].'/images/tpl/lost_paswd.png" width="120" height="30" onclick="uss_login_form.submit();">
   <a href="index.php?page_id=lost_password"><img class="loginy" src="template/'.$core['config']['template'].'/images/tpl/lost_paswd.png" width="120" height="30"></a>
   <input type="image" class="loginy" src="template/'.$core['config']['template'].'/images/tpl/login_button.png" width="120" height="30" onclick="uss_login_form.submit();">
  </login_field></td>
  </tr>

</tbody>
</table>
</form>	
</div>';
		  }
		  ?>
		  </div> 

<div class="brian_cl">
<div class="oli_menu_pri">
<div class="marketplace">
<div style="height: 48px;"></div>
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
</div>


<div class="brian_cl">
<div class="oli_menu_pri">
<?
$SiegeInfo = $core_db->Execute("SELECT OWNER_GUILD,MONEY,TAX_RATE_CHAOS,TAX_RATE_STORE,TAX_HUNT_ZONE,SIEGE_START_DATE,SIEGE_END_DATE FROM MuCastle_DATA");
$GuildInfo = $core_db->Execute("SELECT G_Master,G_Mark,G_Score,G_Name FROM Guild WHERE G_Name = ?", array($SiegeInfo->fields[0])); 
$TotalMembersGuild = $core_db->Execute("SELECT Count(Name) FROM GuildMember WHERE G_Name = ?", array($SiegeInfo->fields[0]));
?>
<div class="castlesiege">
<div style="height:48px;">
</div>	
	<div class="battle"> 
		<img src="template/<?=$core['config']['template'];?>/images/tpl/icon-down.png"> Next Battle: 
	</div>
	<table width="300" border="0" align="center" cellpadding="3" cellspacing="0" style=" margin-top:2px; margin-bottom:15px; padding: 4px; width:300px;">
		<tbody>
		<tr>
			<td width="15" style="color: #ffd751; font-size:14px; font-family: Titillium Web, sans-serif;">#
			</td>
			<td width="100" style="color: orange; font-family: Titillium Web, sans-serif;">
				<div align="center" style="color: #ffd751; font-size:14px;font-family: Titillium Web, sans-serif;">Owner
				</div>
			</td>
			<td width="100" style="color: orange; font-family: Titillium Web, sans-serif;">
				<div align="center" style="color: #ffd751; font-size:14px;font-family: Titillium Web, sans-serif;">Guild Master
				</div>
			</td>
			<td width="55" style="color: orange;  font-family: Titillium Web, sans-serif;">
				<div align="center" style="font-size:14px;font-family: Titillium Web, sans-serif;">
				<font color="#ffd751">Members</font>
				</div>
			</td>
            
		</tr>
		<tr>
			<td width="15" style="color: orange;  font-family: Titillium Web, sans-serif;">
				<div align="left" style="color: #d5c692;font-size:14px;font-family: Titillium Web, sans-serif;">  1  </div> 
            </td>
			<td width="100" style=" font-family: Titillium Web, sans-serif;color: orange;">
				<div align="center" style="font-family: Titillium Web, sans-serif;color: #d5c692;;font-size:14px; margin-bottom: 5px;margin-top:4px;">  
				&nbsp;<?=$SiegeInfo->fields[0]?> </div>
            </td>
			<td width="100" style=" font-family: Titillium Web, sans-serif;color: #ffd751;">
				<div align="center" style="font-family: Titillium Web, sans-serif;color: #d5c692;;font-size:14px; margin-bottom: 5px;margin-top:4px;">  
				&nbsp;<?=$GuildInfo->fields[0]?> </div>
            </td>
			<td width="55" style="  font-family: Titillium Web, sans-serif;color: #d5c692;">
				<div align="center" style="color: #d5c692;font-size:14px;padding:4px;font-family: Titillium Web, sans-serif;margin-top:0px;">  
				<?=$TotalMembersGuild->fields[0];?>&nbsp; </div>
            </td>
							
        </tr>	
</tbody>
</table>
</div>
</div>
</div>


<div class="brian_cl">
<div class="oli_menu_pri">
<div class="rankingnowy"><br><br>
	<table width="330" border="0" align="center" cellpadding="3" cellspacing="0" style=" margin-top:2px; margin-bottom:15px; padding: 4px; width:320px;">
		<tbody>
		<tr>
			<td width="20" align="center" style="color: white; font-size:14px; font-family: Titillium Web, sans-serif;">
			#
			</td>
			<td width="85" style="color: orange; font-family: Titillium Web, sans-serif;">
				<div align="left" style="color: white;font-family: Titillium Web, sans-serif; font-size:14px;">Player Name
				</div>
			</td>
			<td width="40" style="color: orange;  font-family: Titillium Web, sans-serif;">
				<div align="center" style="font-size:14px;font-family: Titillium Web, sans-serif;">
				<font color="white">Nivel</font>
				</div>
			</td>
			<td width="40" style="color: orange;  font-family: Titillium Web, sans-serif;">
				<div align="center" style="font-size:14px;font-family: Titillium Web, sans-serif;">
				<font color="white">Reset </font> 
				</div>
			</td>
            
		</tr>
<?
$Chars=$core_db->Execute("select TOP 5 Name,cLevel,".AOH_Resets_column." from Character Where ctlcode !='32' and ctlcode !='8' order by ".AOH_Resets_column." desc, cLevel desc");
$count=1;
while(!$Chars->EOF){
$count0=$count++;
?>
		<tr>
			<td width="20" style="color: orange;  font-family: Titillium Web, sans-serif; ">
				<div align="center" style="font-family: Titillium Web, sans-serif;color: white;font-size:13px; padding-top:10px;margin-top:-1px;">
				  <?=$count0;?>  
				</div> 
            </td>
			<td width="85" style=" font-family: Titillium Web, sans-serif;">
				<div align="left" style="font-family: Titillium Web, sans-serif;color: #d5c692;font-size:13px;padding-top: 9px;">
				&nbsp;<?=$Chars->fields[0];?>
				</div>
            </td>
			<td width="40" style="font-family: Titillium Web, sans-serif;">
				<div align="center" style="font-family: Titillium Web, sans-serif;color: white;font-size:13px;margin-top:13px">
				<?=$Chars->fields[1];?>
				</div>
            </td>
			<td width="40" style="color: #d5c692;  font-family: Titillium Web, sans-serif;">
				<div align="center" style="margin-top:13px;font-size:13px;font-family: Titillium Web, sans-serif;">
				<?=$Chars->fields[2];?>
				</div>
	
			</td>
		</tr>
<?
$Chars->MoveNext();
}
?>  
 </tbody>
 </table> 
</div>
</div>
</div>


<div class="brian_cl">	
<div class="oli_menu_pri">
<div class="servidores_list">
<div style="height: 38px;"></div>
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
<div class="gslist" style="width:90%;margin: auto;">
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


	  		  		 
	  		  <div class="brian_cl">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
		  <tr>
		  <td>
		  <h1 class="entrar" align="center" style="margin-top: 2px;background:none;">Redes Sociales</h1></td>
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
<!--INICIO DERECHA-->
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
<div class="copyrights">Copyrights reserved <? echo $config_template->Nombre; ?> - <? echo date("Y"); ?>.<br>
  <font color="red">MUOnline is free MMORPG provided by WebZen </font> </div>
<div class="copyrights1">
<a href="http://mucorepremium.net/">MuCore Premium v<?=crypt_it($engine,'','1');?> </a><br>
  Todos los Derechos Reservados.!
 </div>
</div>
</td>
</tr>
</table>
</div>
<?=LoadCustom('bs_footer');?>
</body>
</html>