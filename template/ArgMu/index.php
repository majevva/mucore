<?php
require ( "config/AOH_Template.php" ) ;
include ( "engine/connect_core.php" ) ;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?=build_header_seo(); ?>
<title><?=build_header_title(); ?></title>
<script type="text/javascript" src="template/<?=$core['config']['template'] ?>/js/jquery-1.3.2.min.js"></script>
<script src="template/<?=$core['config']['template'] ?>/js/core_global.js" language="javascript" type="text/javascript"></script>
<script src="template/<?=$core['config']['template'] ?>/js/jquery.js" type="text/javascript"></script>
<script src="template/<?=$core['config']['template'] ?>/js/cufon-yui.js" type="text/javascript"></script>
<script src="template/<?=$core['config']['template'] ?>/js/Bebas_400.font.js" type="text/javascript"></script>
<script src="template/<?=$core['config']['template'] ?>/js/Shanti_400.font.js" type="text/javascript"></script>
<!-- Bootstrap -->
<?=LoadCustom('bs_head');?>
<?=LoadCustom('fontawesome');?>
<link rel="stylesheet" href="template/<?=$core['config']['template'] ?>/css/estilos.css" type="text/css" media="all" />
<script type="text/javascript" src="template/<?=$core['config']['template'] ?>/js/jquery.nivo.pack.js"></script>
<link rel="stylesheet" type="text/css" href="template/<?=$core['config']['template'] ?>/css/slider.css" />
<link rel="stylesheet" type="text/css" href="template/<?=$core['config']['template'] ?>/css/effect.css" />
<link rel="SHORTCUT ICON" href="template/<?=$core['config']['template'] ?>/images/ico.ico"/>
  <!-- Modificaciones Custom -->
<link rel="stylesheet" href="template/<?=$core['config']['template'] ?>/css/custom.css" type="text/css" media="all" /> 
<a href="#" id="top-link" style="position: fixed; bottom: 0pt; right:0;"><img src="template/<?=$core['config']['template'] ?>/images/subir.png" title="Subir" alt="" border="0"></a>
<?php  
if(constant("Show_FB") == 'true')
{				 
?>
<a href="<?php echo FB; ?>" target="_blank" style="position: fixed; bottom: 0pt; left: 0pt;"><img src="template/<?=$core['config']['template'] ?>/images/fb.png" title="" alt="" border="0"></a>
<?php } ?> 
<script type="text/javascript" src="template/<?=$core['config']['template'] ?>/js/jquery.scrollTo-1.4.0-min.js"></script>
<script type="text/javascript">
	jQuery.fn.topLink = function(settings) {
		settings = jQuery.extend({
			min: 1,
			fadeSpeed: 200,
			ieOffset: 50
		}, settings);
		return this.each(function() {
			//listen for scroll
			var el = $(this);
			el.css('display','none'); //in case the user forgot
			$(window).scroll(function() {
				if(!jQuery.support.hrefNormalized) {
					el.css({
						'position': 'absolute',
						'top': $(window).scrollTop() + $(window).height() - settings.ieOffset
					});
				}
				if($(window).scrollTop() >= settings.min)
				{
					el.fadeIn(settings.fadeSpeed);
				}
				else
				{
					el.fadeOut(settings.fadeSpeed);
				}
			});
		});
	};
	
	$(document).ready(function() {
		$('#top-link').topLink({
			min: 400,
			fadeSpeed: 500
		});
		//smoothscroll
		$('#top-link').click(function(e) {
			e.preventDefault();
			$.scrollTo(0,300);
		});
	});
</script>
<script language="JavaScript" type="text/JavaScript">
    var Hoy = new Date();
    function servertime(){ 
    Hora = Hoy.getHours() 
    Minutos = Hoy.getMinutes() 
    Segundos = Hoy.getSeconds() 
    if (Hora>=13) Hora = Hora - 12
	var ampm = "AM"
	if (Hoy.getHours()>=13) ampm = "PM"
	if (Hora<=9) Hora = "0" + Hora 
    if (Minutos<=9) Minutos = "0" + Minutos 
    if (Segundos<=9) Segundos = "0" + Segundos
    var Dia = new Array("Domingo ", "Lunes ", "Martes ", "Miercoles ", "Jueves ", "Viernes ", "Sabado ", "Domingo "); 
    var Mes = new Array("1","2","3","4","5","6","7","8","9","10","11","12"); 
	var Anio = Hoy.getFullYear(); 
    var Fecha = Dia[Hoy.getDay()] + "" + Hoy.getDate() + "/" + Mes[Hoy.getMonth()] + "/" + Anio; 
    var Inicio, Script, Final
    var Inicio2, Script2, Final2, Total  
    Inicio = "<font color=#FFCC00 style=font-size:11px>" 
    Script = Hora + ":" + Minutos + ":" + Segundos + " " + ampm + " "
    Final = "</font>"
    Inicio2 = "<font color=#999999 style=font-size:11px><b>" 
    Script2 = Fecha
    Final2 = "</b></font>"  
    Total = Inicio + Script + Final + Inicio2 + Script2 + Final2
    document.getElementById('servertime').innerHTML = Total 
    Hoy.setSeconds(Hoy.getSeconds() +1)
    setTimeout("servertime()",1000) 
} 
</script>
<script type="text/javascript">
 Cufon.replace(".entrar", {fontFamily:"bebas"});
 Cufon.replace("#menusup", {fontFamily:"bebas"});
 Cufon.replace(".menu", {fontFamily: "bebas"});
 Cufon.replace("div.tmp_right_title", {fontFamily: "bebas"});
 Cufon.replace(".tmp_left_menu", {fontFamily: "bebas"});
 Cufon.replace(".stadisticas_tab_bg", {fontFamily: "bebas"});
</script>
<style type="text/css">
/* reparador de imagenes - luchog zaz' */
ul#menu {
	background:transparent url("template/<?=$core['config']['template'] ?>/images/button_bg.html") repeat-x top left;
}
.iRg_line {
background:url(template/<?=$core['config']['template'] ?>/images/inner_line.jpg); background-position:bottom; background-repeat:repeat-x;
}
.iRg_line_top {
background:url(template/<?=$core['config']['template'] ?>/images/inner_line.jpg); background-position:top; background-repeat:repeat-x;
}
.msg_success {
background-image:url(template/<?=$core['config']['template'] ?>/images/success.gif);
}
.msg_error {
background-image:url(template/<?=$core['config']['template'] ?>/images/warning.gif);
}
#rss_feed li {
background-image: url(template/<?=$core['config']['template'] ?>/images/rss_icon.gif);
}
body { 
background:#000000 url(template/<?=$core['config']['template'] ?>/images/header.jpg) no-repeat top;
/*background-attachment:fixed !important;*/
}
div.tmp_m_content div.tmp_right_title { 
background-image:url(template/<?=$core['config']['template'] ?>/images/title.jpg);
}
h1.entrar {
background-image:url(template/<?=$core['config']['template'] ?>/images/g_title.png);width:200px; height:33px;
}
body,a {
cursor: url(template/<?=$core['config']['template'] ?>/images/cursor_normal.cur), auto;
}
A:hover {
cursor: url(template/<?=$core['config']['template'] ?>/images/cursor_link.cur), auto;
}
input#ahrre:hover {
cursor: url(template/<?=$core['config']['template'] ?>/images/cursor_link.cur), auto;
}
div.tmp_left_menu li.list_menu {
background-image:url(template/<?=$core['config']['template'] ?>/images/menu_modulos_bg.png); height: 32px;width: 165px; background-repeat: no-repeat;margin-left:2px;
}
div.tmp_left_side {
background-image:url(template/<?=$core['config']['template'] ?>/images/menu_content.jpg);	
}
#serverstat {
background-image:url(template/<?=$core['config']['template'] ?>/images/content_bg.jpg);
background-color:transparent;
}
div.tmp_right_side {
background-image:url(template/<?=$core['config']['template'] ?>/images/content_bg.jpg);
background-color:transparent;	
}
#arg-time {
background-image:url(template/<?=$core['config']['template'] ?>/images/menu_content.jpg);	
}
#arg_footer {
background-image:url(template/<?=$core['config']['template'] ?>/images/footer.jpg);	margin: auto; background-repeat: no-repeat;
}

.poss { margin-left:50px; margin-right:30px;}
.stadisticas_td_bg_izq {
    background-color: #141414;
	color: #FFFFFF;
	font-size:11px;
	border-top-right-radius: 0px;
	border-top-left-radius: 5px;
	border-bottom-right-radius: 0px;
	border-bottom-left-radius: 5px;
}
.stadisticas_td_bg_der {
    background-color: #151515;
	color: #FFFFFF;
	font-size:11px;
	border-top-right-radius: 5px;
	border-top-left-radius: 0px;
	border-bottom-right-radius: 5px;
	border-bottom-left-radius: 0px;
}
.stadisticas_td_bg_izq_onlines {
    background-color: #141414;
	color: #FFFFFF;
	font-size:11px;
	border-left: 1px solid #2a2a2a;
	border-right: 0px solid #2a2a2a;
	border-top: 1px solid #2a2a2a;
	border-bottom: 1px solid #2a2a2a;
	border-top-right-radius: 0px;
	border-top-left-radius: 5px;
	border-bottom-right-radius: 0px;
	border-bottom-left-radius: 5px;
}
.stadisticas_td_bg_der_onlines {
    background-color: #151515;
	color: #FFFFFF;
	font-size:11px;
	border-left: 0px solid #2a2a2a;
	border-right: 1px solid #2a2a2a;
	border-top: 1px solid #2a2a2a;
	border-bottom: 1px solid #2a2a2a;
	border-top-right-radius: 5px;
	border-top-left-radius: 0px;
	border-bottom-right-radius: 5px;
	border-bottom-left-radius: 0px;
}
.stadisticas_tab_bg {
	background-image:url(template/<?=$core['config']['template'] ?>/images/content_bg.jpg);
	background-color:transparent;
	color: #FFFFFF;
	font-size:11px;
}
#topbar{
position:absolute;
padding: 2px;
width: 291px;
visibility: hidden;
z-index: 90;
}
.pos { margin-left:-20px;}
.us { margin-top:-20px;}
</style>
</head>
<body>
<?
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
		welcome_start =  "Good morning";
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
<body oncontextmenu="return false">
<body onload="servertime()">

<div class="arg_mark">
<div id="escalade">
		  <div class="login">
			 <table width="100%" border="0" align="center" cellpadding="0" cellspacing="4">
 <?
		  if($user_login == '1'){
		  	echo '<div class="tmp_left_menu">
		  	<ul>';
		$m_uss_row_ = get_sort('engine/cms_data/mods_uss.cms',',');
 	 	$count_m_uss = 0;
		foreach ($m_uss_row_ as $tr){
			#explode("¦",$tr);
			
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
		  <td align="left" class="yellow"><a href="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.USER_CMS_PAGE.'&'.USER_GET_PAGE.'='.ACCOUNTSETTINGS_CMS_USER.'">'.link_account_settings.'</a></td>
		  <td align="right" class="yellow"><a href="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'=logout">'.link_log_out.'</a></td>
		 </tr>
		 </table>
		 
		 ';
		  }else{
		  	echo '<form method="post" action="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.LOGIN_CMS_PAGE.'" name="uss_login_form">
			 <table width="100%" border="0" align="center" cellpadding="0" cellspacing="4">
  <tr>
    <td style="height: 25px; padding-left: 2px;  " width="130"><input type="text" name="uss_id" maxlength="10" class="login_field" value="USER ID" OnClick="this.value=\'\'"></td>
    <td rowspan="2"><input type="image" src="template/'.$core['config']['template'].'/images/intro.png" width="50" height="46" onclick="uss_login_form.submit();"></td>
  </tr>
  <tr>
    <td style="height: 25px; padding-left: 2px;"><input type="password" name="uss_password" class="login_field" value="PASSWORD" maxlength="12" OnClick="this.value=\'\'"><input type="hidden" name="process_login"></td>
  </tr>
    <tr>
    <td style="height: 25px; padding-left: 2px;" colspan="2" align="left" class="yellow"><a href="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.LOSTPASSWORD_CMS_PAGE.'">Lost Password</a></td>
  </tr>
     <tr>
    <td style="height: 25px; padding-left: 2px;" colspan="2" align="left" class="yellow">'.text_start_play_now.'</span> <a href="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.REGISTER_CMS_PAGE.'">'.link_sign_up.'</a></td>
  </tr>
</table>
</form>';
		  }
		  ?>
</table>		  </div>
<div id="menu-arg">
<div class="menu">
 <ul>
  <li class="prima"><a href="#">INICIO</a>
     <ul>
      <li><a href="index.php?page_id=register">Crear cuenta</a></li>
	  <li><a href="index.php?page_id=historia">Historia</a></li>
	  <li><a href="index.php?page_id=staff">Staff</a></li>
	  <li><a href="index.php?page_id=terms">Terminos &amp; Condiciones</a></li> 
   </ul></li>
  <li class="prima"><a href="<?php echo foro; ?>" target="_blank">FORO</a>
   <ul>
      <li><a href="<?php echo register; ?>" target="_blank">Registrarse</a></li>
   </ul>
  </li>
  <li class="prima"><a href="index.php?page_id=news">NOTICIAS</a>
   <ul>
      <li><a href="index.php?page_id=news" target="_blank">Anuncios</a></li>
      <li><a href="index.php?page_id=news">Novedades</a></li>	  
   </ul>  
  </li>
  <li class="prima"><a href="index.php?page_id=descarga">DESCARGAS</a>
   <ul>
      <li><a href="<?php echo cliente; ?>" target="_blank">Cliente</a></li>
	  <li><a href="<?php echo parche; ?>" target="_blank">Parche</a></li>
	  <li><a href="<?php echo utilidades; ?>" target="_blank">Utilidades</a></li>
   </ul>
  </li>
    <li class="prima"><a href="#">RANKING</a>
   <ul>
      <li><a href="index.php?page_id=rankings">Personajes</a></li>
	  <li><a href="index.php?page_id=rankings&rank=guilds">Clanes</a></li>
	  <li><a href="index.php?page_id=top_asesinos">Asesinos</a></li>	  
   </ul>
  </li>
     <li class="prima"><a href="#">EVENTOS</a>
   <ul>
      <li><a href="index.php?page_id=castle_siegephp">Castle Siege</a></li> 
   </ul>
  </li>

  <li class="prima"><a href="#">SOCIAL</a>
   <ul>
      <li><a href="<? echo $yt['yt']; ?>" target="_blank">Youtube</a></li>
	  <li><a href="<? echo $fb['fb']; ?>" target="_blank">Facebook</a></li>	  
	  <li><a href="<? echo $tw['tw']; ?>" target="_blank">Twitter</a></li>	
	  <li><a href="index.php?page_id=recomendanos">Recomendanos</a></li>	  
	  <li><a href="index.php?page_id=votanos">Votanos</a></li>
   </ul>
  </li>
    <li class="prima"><a href="index.php?page_id=contact">CONTACTANOS</a></li>
 </ul>
 </ul>
 <div align="center">
       <object width="598" height="470" codebase="../download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000">
         <param value="template/<?=$core['config']['template'] ?>/swf/efecto.swf" name="movie"/>
         <param value="high" name="quality"/>
         <param value="false" name="menu"/>
         <param value="transparent" name="wmode"/>
         <param name="allowScriptAccess" value="always"/>
         <embed width="598" height="470" mwode="transparent" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" wmode="transparent" allowscriptaccess="always" quality="high" menu="false" src="template/<?=$core['config']['template'] ?>/swf/efecto.swf">
         </object>
     </div>
</div>
</div>
</div>
</div>
<div id="colapse">

 <div id="arg-time">
   <table>
   <tr>
    <td><div id="servertime"></div></td>
  </tr>
</table>
 </div>

<div id="serverstat">
<table cellspacing="2" class="stadisticas_tab_bg">
<tr>

<td colspan="2" height="15" style="background-color:#000000; color:#9C752E;"><center><b>ESTADISTICAS</b></center></td>
</tr>
 <?
$file_GameServer = file('engine/variables_mods/GameServers.tDB');
foreach ($file_GameServer as $GSL_DB){
  $GSL_DB = explode("|",$GSL_DB);

$consulta_gsl = $core_db->Execute("SELECT count(memb___id) FROM MEMB_STAT WHERE ConnectStat = '1' and ServerName='".$GSL_DB[3]."'");

if ($check=@fsockopen($GSL_DB[1],$GSL_DB[2],$ERROR_NO,$ERROR_STR,0.1)) 
   {
   fclose($check);
   $estadotplmu = '<img src="template/'.$core['config']['template'].'/images/online.gif" alt="Online">'; 
   } 
   else 
   {  
   $estadotplmu = '<img src="template/'.$core['config']['template'].'/images/offline.gif" alt="Offline">'; 
   } 
echo '
<tr>
	<td width="80" class="stadisticas_td_bg_izq" style="padding-left:5px;"><strong>'.$GSL_DB[3].'</strong>: '.$estadotplmu.'</td>
	<td width="80" class="stadisticas_td_bg_der" style="padding-left:5px;"><strong>users</strong>: '.$consulta_gsl->fields[0].'</td>
</tr>
';

}
?>
<? $barra = $core_db->Execute("SELECT count(memb___id) FROM MEMB_STAT WHERE ConnectStat = '1'");	 
			$online= $barra->fields[0]; ?>
<tr>
<td colspan="2" width="80" class="stadisticas_td_bg_onlines" style="padding-left:5px;">
<strong>Usuarios Online</strong>: <span style="color: #DDBE49; font-weight:bold;"><?=$online?></span>
</td>							                        
</tr>
</table>
</div>

                                            <div id="serverstat">
<?
$SiegeInfo = $core_db->Execute("SELECT OWNER_GUILD,MONEY,TAX_RATE_CHAOS,TAX_RATE_STORE,TAX_HUNT_ZONE,SIEGE_START_DATE,SIEGE_END_DATE FROM MuCastle_DATA");
$GuildInfo = $core_db->Execute("SELECT G_Master,G_Mark,G_Score,G_Name FROM Guild WHERE G_Name = ?", array($SiegeInfo->fields[0])); 
$MasterInfo = $core_db->Execute("SELECT Resets,cLevel FROM Character WHERE Name = ?", array($GuildInfo->fields[0])); 
$PaisMasterInfo = $core_db2->Execute("SELECT country FROM MEMB_INFO WHERE memb___id = ?", array($GuildInfo->fields[0])); 
$PaisG1 = $PaisMasterInfo->fields[0];
$AsistenteGuildInfo = $core_db->Execute("SELECT Name FROM GuildMember WHERE G_Name = ? AND G_Status = 64", array($SiegeInfo->fields[0]));
?>
<?php  
if(constant("Show_CS") == 'true')
{				 
?>
<table cellspacing="1" class="stadisticas_tab_bg" width="200" height="100" style="background-color:#000000;"> 
 <tr>
  <td colspan="2" height="15" style="background-color: #000000; color: #9C752E; font-family: Verdana, Geneva, sans-serif; font-size: 10px;"><center><b>GANADORES DEL CASTLE SIEGE</b></center></td></tr>
    <tr>
      <td style="background-image:url(template/<?=$core['config']['template'] ?>/images/statscs.jpg);">
									<table style="border:0px;" width="180" height="70" align="center" class="stadisticas_td_bg_izq">
									   <tr>
										  <td align="center"><b>Clan:</b><br /><span style="color:#FF0000; font-size:20px; font-weight:bold;"><?=$SiegeInfo->fields[0]?></span></center></td>
										  <td align="center" rowspan="2"><img src="get.php?aL=<?=urlencode(bin2hex($GuildInfo->fields[1]));?>.png" alt="" width="50" height="50" align="absmiddle" style="border:1px solid #2a2a2a;background-color:#272725;"/></td>
									   </tr>
									   <tr>
										  <td align="center"><b>Lider:</b> <span style="color:#FF6600; font-size:11px; font-weight:bold;"><?=$GuildInfo->fields[0]?></span></td>
<?php } ?>									   </tr>
									</table>								  
  </td>
 </tr>
</table></div>
</div>



<div id="centered">
    <div class="tmp_main_content">

      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="left" valign="top" >
		  <div class="tmp_left_side" style="width: 200px; ">
          <a href="index.php?page_id=descarga" target="_self" title="Descarga el cliente para empezar a jugar!"><img src="template/<?=$core['config']['template'] ?>/images/download.png" align="absmiddle" alt="Descarga el cliente para empezar a jugar!" /></a><br />
<a href="index.php?page_id=register" target="_self" title="Crea tu cuenta y empeza a jugar!"><img src="template/<?=$core['config']['template'] ?>/images/register.png" align="absmiddle" alt="Crea tu cuenta y empeza a jugar!" /></a>
		<div class="arg-uservip">
		 <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top: 4px;">
		  </table>
		             
			 
		 </div> 		  
		  <div class="tmp_left_m">
		  
		  
		  </div>
		 <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top: 4px;">
		  <tr>
		  <td  class="tmp_left_title"><h1 class="entrar"><div class="pos">MENU PRINCIPAL</div></h1></td>
		  </tr>
		  </table>
		  <div class="tmp_left_m">
		  <div class="tmp_left_menu">
		  <ul>
		 <?
					  $m_row_ = get_sort('engine/cms_data/pag_d.cms',',');
					#  echo $test[1][2][3];
					  foreach ($m_row_ as $li){
					 #  explode("¦",$li);
					   switch ($li[7]){
					   	case '0':
					   		if($li[8] == '1'){
					   			if($li[6] != '0'){
					   				echo '<li class="list_menu">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a  href="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.$li[3].'">'.str_replace($menu_links_title,$menu_links_translated,$li[2]).'</a></li>';
					   			}
					   	
					   		}
					   		break;
					   	case '1':
					   		switch ($li[11]){
					   			case '1': $target = "_blank"; break;
					   			case '0': $target = "_self"; break;
					   		}
					   		echo '<li class="list_menu">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a  href="'.$li[10].'"  target="'.$target.'">'.str_replace($menu_links_title,$menu_links_translated,$li[2]).'</a></li>  ';
					   	
					   	break;
					   }


					  	
					  }
					  
		  ?>
		  </ul>
		 </div>
		 <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top: 5px;margin-bottom:-6px;">
		  <tr>
		  <td  class="tmp_left_title"><h1 class="entrar">TOP 5 GUILDS</h1></td>
		  </tr>
		  </table><div class="top5"><table width="190" align="center">
                              <tr>
                  <td class="cabecerarank"><div align="center"><span style="color:#DDBE49;">#</span></div></td>
                  <td class="cabecerarank"><div align="center"><span style="color:#DDBE49;">Clan</span></div></td>
                  <td class="cabecerarank"><div align="center"><span style="color:#DDBE49;">Puntos</span></div></td>
                  <td class="cabecerarank"><div align="center"><span style="color:#DDBE49;">Logo</span></div></td>
                </tr>
<?
$Guild=$core_db->Execute("select TOP 5 G_Name,G_Score,G_Mark from Guild order by G_Score desc");
$count=0;
while(!$Guild->EOF){
?>
  <td><div align="center"  style="color:#DDBE49;"><?=++$count?></div></td>
      <td><div align="center" class="Estilo36">
          <?=$Guild->fields[0];?>
      </div></td>
    <td><div align="center" class="Estilo36">
          <?=$Guild->fields[1];?>
      </div></td>
    <td align="center"><img src="get.php?aL=<?=urlencode(bin2hex($Guild->fields[2]))?>" alt="" width="16" height="16" style="border: 1px solid #2a2a2a; background-color:#000000;" align="absmiddle"></td>
  </tr>
  <?
$Guild->MoveNext();
}
?>
                            </table></div>
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top: 5px;margin-bottom:-6px;">
		  <tr>
		  <td  class="tmp_left_title"><h1 class="entrar">TOP 10 RESET</h1></td>
		  </tr>
		  </table><div class="top5"><table width="190" align="center">
                          <tr>
                          <td class="cabecerarank"><div align="center"><span style="color:#DDBE49;">#</span></div></td>
                          <td class="cabecerarank"><div align="center"><span style="color:#DDBE49;">Nombre</span></div></td>
                          <td class="cabecerarank"><div align="center"><span style="color:#DDBE49;">Nivel</span></div></td>
                          <td class="cabecerarank"><div align="center"><span style="color:#DDBE49;">Resets</span></div></td>
                        </tr>

                          <tr>
                            <?
$Chars=$core_db->Execute("select TOP 10 Name,cLevel,Resets from Character Where ctlcode !='32' and ctlcode !='8' order by Resets desc, cLevel desc");
while(!$Chars->EOF){
?>
                            <td><div align="center" class="Estilo36">
                               <span style="color:#DDBE49;"><?=++$count1;?></span>
                            </div></td>
                            <td><div align="center" class="Estilo36">
                                <?=$Chars->fields[0];?>
                            </div></td>
                            <td><div align="center" class="Estilo36">
                                <?=$Chars->fields[1];?>
                            </div></td>
                            <td><div align="center" class="Estilo36">
                                <?=$Chars->fields[2];?>
                            </div></td>
                          </tr>
                          <?
$Chars->MoveNext();
}
?>
                        </table>
		 </div>
		 
				<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top: 15px; ">
		  <tr>
		  		  <td  class="tmp_left_title"><h1 class="entrar">Donaciones</h1></td>
		  </tr>
		  </table>
		  <div class="tmp_left_m">
		   <div class="right_page_content">

<center><a href="index.php?page_id=donate" title="Donar por MU Coins!" target="_self"><img src="template/<?=$core['config']['template'] ?>/images/donxmc.png" alt="Donar por MU Coins!" name="Donar por MU Coins!" width="180" height="87" border="0" id="Donar por MU Coins!" /></a>
<br>
<a href="index.php?page_id=user_cp&panel=vip" title="Donar por VIP!" target="_self"><img src="template/<?=$core['config']['template'] ?>/images/donxvip.png" alt="Donar por VIP!" name="Donar por VIP!" width="180" height="87" border="0" id="Donar por VIP!" /></a></center>
 <div align="center">
  <div align="right" style="width: 990px;" class="language_select">
  <?
  if($core['language_switch'] == '1'){
  	foreach ($languages as $language_id => $language_data){
  		echo '&nbsp;<img src="template/'.$core['config']['template'].'/images/flags/'.$language_data[2].'"> <a href="'.ROOT_INDEX.'?change_language='.$language_id.'">'.$language_data[0].'</a>';
  	}
  }
  ?></div>
  </div>
</body>


</div></div>		 <!-- End Left -->
		 </div>
		  </td>
		  <td align="left" valign="top" style="width: 100%; ">
		  <div class="tmp_right_side">
<style type="text/css">
<!--
a { 
text-decoration: none;

}

a:hover { 
text-decoration: underline;
}

.themain {
    background-image:url("template/<?=$core['config']['template'] ?>/images/menu_content.jpg");
	font-size:11px;
    border: 1px solid #2a2a2a;
    border-radius: 5px;
}

.themain2 {
    background-image:url("template/<?=$core['config']['template'] ?>/images/menu_content.jpg");
	font-size:11px;
    border: 0px solid #2a2a2a;
    border-radius: 5px;
}

.themain3 {
    background-image:url("template/<?=$core['config']['template'] ?>/images/main0bg.jpg");
    background-color: #000000;
	color: #CCCCCC;
	font-size:14px;
	border-left: 1px solid #2a2a2a;
	border-right: 1px solid #2a2a2a;
	border-top: 1px solid #2a2a2a;
    border-radius: 5px;
}

.themain0 {
    background-image:url("template/<?=$core['config']['template'] ?>/images/main0bg.jpg");
    background-color: #000000;
	color: #FFFFFF;
	font-size:11px;
	border-left: 1px solid #2a2a2a;
	border-right: 1px solid #2a2a2a;
	border-top: 1px solid #2a2a2a;
    border-radius: 5px;
}

.themain tbody tr td table tbody tr .trhover strong font {
	font-weight: bold;
}

div#toptexto {
	font-size:16px;
	color: #FFFFFF;
	font-weight: bold;
    opacity: 0.8;
    filter: alpha(opacity=80);
}

div#fecha {
	font-size:10px;
	color: #CCCCCC;
	font-weight: normal;
    opacity: 0.8;
    filter: alpha(opacity=80);
}

.trhover1 {
    background: #292929;
    color: #b5b5b5;
    opacity: 0.8;
    filter: alpha(opacity=80);
}

.trhover2 {
    background: #393939;
    color: #b5b5b5;
    opacity: 0.8;
    filter: alpha(opacity=80);
}

.trhover2va {
    background: #393939;
    color: #00CC00;
	font-weight: normal;
    opacity: 0.8;
    filter: alpha(opacity=80);
}

.trhover3 {
    background: #494949;
    color: #b5b5b5;
    line-height:12px;
    font-size:10px;
    opacity: 0.8;
    filter: alpha(opacity=80);
}
-->
</style>

<div class="tmp_page_content">

<script type="text/javascript">
	$(window).load(function() {
		$('#slider').nivoSlider();
	});
	</script>
<?php  if(constant("Show_Slider") == 'true')
			 {
				 
?>
<div align="center" id='slider_block'>
											<div id="slider-wrapper">
												<div id="slider" class="nivoSlider">
													<img src="template/<?=$core['config']['template'] ?>/images/Gallery/1.jpg" alt="" title="#htmlcaption1">
													<img src="template/<?=$core['config']['template'] ?>/images/Gallery/2.jpg" alt="" title="#htmlcaption2">
													<img src="template/<?=$core['config']['template'] ?>/images/Gallery/3.jpg" alt="" title="#htmlcaption3">
													<img src="template/<?=$core['config']['template'] ?>/images/Gallery/4.jpg" alt="" title="#htmlcaption4">
													<img src="template/<?=$core['config']['template'] ?>/images/Gallery/5.jpg" alt="" title="#htmlcaption5">
													<img src="template/<?=$core['config']['template'] ?>/images/Gallery/6.jpg" alt="" title="#htmlcaption5">
												</div>
											</div>
										</div>
                                        <?php } ?> 
<div align="left"><?
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
                                        $title_p =  '';
                                    }elseif  (isset($_GET[LOAD_GET_PAGE])){
                                        if(isset($_GET[USER_GET_PAGE])){
                                            $usercp_module_title =  str_replace($modules_text_tile,$modules_text_translate,$secondary_l);
$title_p =  '';
                                        }else{ $title_p =  '';}
                                    }
                  echo '
                  
                  <div class="where_nav">
                  <table cellpadding="0" cellspacing="0" border="0" >
                  <tr>
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
;			break;
		}
	}
}
	if($ann_found == '1'){
		echo '
		<div class="tmp_m_content"> 
					<div  class="tmp_right_title">'.text_announcement.'</div>
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
				
					echo '<div class="tmp_m_content"> 
					 <div  class="tmp_right_title">'.htmlspecialchars(str_replace($modules_text_tile,$modules_text_translate,$give_me_out[3])).'</div>
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
?></div>
		  
		</td>
        </tr>
      </table>
</div>
    </div>

  </div>
</div>


<div id="arg_footer" style="margin-top: 10px;">
<div id="foot_info"><div align="center" class="footer_font">

<center>
  <p><span style="color: #FFA703;">Copyrights reserved </span><span style="color: #FF0000;"><? echo $config_template->Nombre; ?></span> - <? echo date("Y"); ?>. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #FFA703;"><a href="http://mucorepremium.net/" style="color: #FFA703;text-decoration:none;">MuCore Premium v<?=crypt_it($engine,'','1');?> </a> <span style="color: #FF0000;">Todos los Derechos Reservados.!</span> </span> </p>
</center>

</div>
</div>
<div id="social_icons" align="center"><a href="<?php echo FB; ?>" target="_blank"><img src="template/<?=$core['config']['template'] ?>/images/facebook.png" width="30" height="30" border="0" /></a><a href="<?php echo TW; ?>" target="_blank"><img src="template/<?=$core['config']['template'] ?>/images/twitter.png" width="30" height="30" border="0" /></a><a href="<?php echo YT; ?>" target="_blank"><img src="template/<?=$core['config']['template'] ?>/images/youtube.png" width="30" height="30" border="0" /></a></div></div>
</div>

</body>

</html>