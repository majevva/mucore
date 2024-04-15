<? include("config/AOH_Template.php"); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?=build_header_seo(); ?>
<title><?=build_header_title(); ?></title>
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>

<script src="js/core_global.js" language="javascript" type="text/javascript"></script>
<!-- Google Fonts-->
<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet" type="text/css">

<script src="template/<?=$core['config']['template'] ?>/js/jquery.cslider.js" type="text/javascript"></script>
<script src="template/<?=$core['config']['template'] ?>/js/jquery-1.7.1.min.js" type="text/javascript"></script>

<script src="template/<?=$core['config']['template'] ?>/js/modernizr.custom.28468.js" type="text/javascript"></script>

<!-- Bootstrap -->
<?=LoadCustom('bs_head');?>
<?=LoadCustom('fontawesome');?>
<link rel="stylesheet" href="template/<?=$core['config']['template'] ?>/css/youplay.min.css" type="text/css" media="all" />
<link rel="stylesheet" href="template/<?=$core['config']['template'] ?>/css/aohost.css" type="text/css" media="all" />

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
<!--PRELOADER-->
<div id="preloader" class="page-preloader preloader-wrapp">
	<img src="template/<?=$core['config']['template'] ?>/images/logo3.png" alt="">
	<div class="preloader"></div>
</div>
<!--/PRELOADER-->

<!-- NAVBAR-->
<nav class="navbar-youplay navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="off-canvas" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">
                <img src="template/<?=$core['config']['template'] ?>/images/logo.png" alt="">
            </a>
        </div>
        
<div id="navbar" class="navbar-collapse collapse">
    <ul class="nav navbar-nav">
        <li class="dropdown dropdown-hover ">
            <a href="#!" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                Menu Basico <span class="caret"></span> <span class="label" style="text-transform: lowercase">Opciones</span>
            </a>
            <div class="dropdown-menu">
                <ul role="menu">
                    <li><a href="<?=$config_template->Descargas;?>">Downloads</a>
                    </li>
                    <li><a href="<?=$config_template->Registro;?>">Registro</a>
                    </li>
                    <li><a href="<?=$config_template->WebShop;?>">WebShop</a>
                    </li>
                    <li><a href="<?=$config_template->RPassword;?>">Recuperar Clave</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="dropdown dropdown-hover ">
            <a href="<?=$config_template->Ranking;?>" >
                Ranking General<span class="caret"></span> <span class="label" style="text-transform: lowercase">Los mejores</span>
            </a>

        </li>
        <li class="dropdown dropdown-hover ">
            <a href="forum" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                Comunidad <span class="caret"></span> <span class="label">Redes</span>
            </a>
            <div class="dropdown-menu">
                <ul role="menu">
                    <li><a href="<?=$config_template->Foro;?>">Foro</a>
                    </li>
                    
                    <li><a href="<?=$config_template->Facebook;?>">Facebook</a>
                    </li>
                    <li><a href="<?=$config_template->Twitter;?>">Twitter</a>
                    </li>
                    <li><a href="<?=$config_template->Instagram;?>">Instagram</a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
                <li>
            <a style="font-weight: bold;" href="<?=$config_template->Registro;?>" role="button" aria-expanded="false">
                CREAR CUENTA <span class="label"></span>
            </a>
        </li>
        <? if($user_login != '1'){ ?>
        <li class="dropdown dropdown-hover dropdown-cart">
            <a href="#login" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                INICIAR SESION
            </a>
            <div class="dropdown-menu" style="width: 300px;">
                <div class="row header-login">
                    <form role="form" method="post" action="<? echo ''.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.LOGIN_CMS_PAGE.'';?>" name="uss_login_form">
                        <div class="youplay-input">
                            <input type="text" name="uss_id" class="form-control" placeholder="Login" onclick="$('.dropdown-cart').addClass('open');">
                        </div>
                        <div class="youplay-input">
                            <input type="password" name="uss_password" maxlength="10" class="form-control" placeholder="Clave" onclick="$('.dropdown-cart').addClass('open');">
                            <input type="hidden" name="process_login">
                        </div>
                        <div class="row">
                            <div class="col-sm-7 small">
                                <div class="youplay-checkbox">
                                    <input class="pull-left" type="checkbox" name="remember" value="yes" id="checkbox1" checked="">
                                    <label for="checkbox1" style="padding-left: 25px;" class="mt-10">Permanezca conectado</label>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <button type="submit" class="btn btn-default pull-right">Login</button>
                            </div>
                        </div>
                        <div class="mt-5 small" style="text-align: center; color: #999">
                            <a href="<?=$config_template->RPassword;?>">Olvido de clave</a>
                        </div>
                    </form>
                </div>
            </div>
        </li>
        <? }else{ ?>
        <li class="dropdown dropdown-hover ">
            <a href="<?=$config_template->LogOut;?>" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                CERRAR SESION <span class="caret"></span> <span class="label"><?=$user_auth_id;?></span>
            </a>
        </li>
        <? } ?>

    </ul>
</div>    </div>
</nav>
<!-- /NAVBAR-->

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



<section class="content-wrap">
<!--HEADER-->
<section class="youplay-banner banner-top youplay-banner-parallax">
    <div class="image"><video style="width: 100%;" src="template/<?=$core['config']['template'];?>/images/video/headerice.mp4" autoplay loop poster="template/<?=$core['config']['template'];?>/images/tpl/placer.png"></video></div>

    <div class="info">
        <div>
            <div class="container">
                                <h1><?=$config_template->Nombre;?> - <?=$config_template->Version;?></h1>
                <br>
                <h4><?=$config_template->Slogan;?></h4>
                <br>
                <br>
                <a class="btn btn-lg" href="<?=$config_template->InfoServer;?>">Informacion del Servidor</a>
                <a class="btn btn-lg" href="<?=$config_template->Registro;?>">Registrarme Ahora</a>
                <a class="btn btn-lg" href="<?=$config_template->Descargas;?>">Downloads</a>
                            </div>
        </div>
    </div>
</section>
<!--/HEADER-->
<!--BANNER GENS-->
<section class="youplay-banner youplay-banner-parallax small-1">
    <div class="image" style="background-image: url('template/<?=$core['config']['template'];?>/images/fondos/secondbg2.jpg');">
    </div>

    <div class="info container align-center">
      <div class="container">
        <div class="pt-40 pb-40">
          <div class="row">
            <div class="col-xs-12 text-center">
              <h2 style="font-size: 4rem;">¡INTEGRANTES DE FAMILIAS GENS!</h2>
            </div>
          </div>
          <div class="row">
            <div class="col-md-5">
              <div class="youplay-match-left">
                <div class="youplay-match">
                  <div class="youplay-match-data">
                    <h3>DUPRIAN</h3>
                  </div>
                  <div class="angled-img">
                    <div class="img"> <img src="template/<?=$core['config']['template'];?>/images/tpl/DUPRIAN.jpg" alt="DUPRIAN"> </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-2 text-center">
              <div class="youplay-match-vs" style="font-size: 1.8rem;"> <span><span style="color: #CB0003; font-weight: bold"></span> 
<? echo GensTotalMembers('1');?> - <? echo GensTotalMembers('2');?> <span style="color: #0351DB; font-weight: bold"></span></span> </div>
            </div>
            <div class="col-md-5">
              <div class="youplay-match-right">
                <div class="youplay-match">
                  <div class="angled-img">
                    <div class="img"> <img src="template/<?=$core['config']['template'];?>/images/tpl/VANERT.jpg" alt="VANERT"> </div>
                  </div>
                  <div class="youplay-match-data text-right">
                    <h3>VANERT</h3>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
<!--/BANNER GENS-->

<!--CAJA CONTENIDO-->
<div class="container youplay-news">

<!--LADO IZQUIERDO-->
<div class="col-md-9">
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
					<div  class="side-block"><h4 class="block-title" style="font-size:25px;">'.text_announcement.'</h4></div>
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
					<div class="side-block"><h4 class="block-title" style="font-size:25px;"> 
					'.htmlspecialchars(str_replace($modules_text_tile,$modules_text_translate,$give_me_out[3])).'
					</h4>
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
<!--/LADO IZQUIERDO-->
<!--LADO DERECHO-->
<div class="col-md-3">	
<div class="side-block">	
	<h4 class="block-title">Panel de Usuario</h4>

		  <?
		  if($user_login == '1'){
		  	echo '<div class="block-content">
		  	<span class="label label-warning" style="font-size: 15px;">¡Bienvenido/a '.$user_auth_id.'!</span>
		  	</div>';
		$m_uss_row_ = get_sort('engine/cms_data/mods_uss.cms',',');
 	 	$count_m_uss = 0;
		foreach ($m_uss_row_ as $tr){
			explode(",",$tr);
			$count_m_uss++;
			if($tr[6] == '1'){
				if($tr[3] != ACCOUNTSETTINGS_CMS_USER){
					echo '<div class="block-content">
					<span class="pull-right label label-success" style="font-size: 15px;">
						<i class="fa fa-arrow-right" aria-hidden="true"></i>
					</span>
						<a  href="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.USER_CMS_PAGE.'&'.USER_GET_PAGE.'='.$tr[3].'">
						'.str_replace($menu_links_title,$menu_links_translated,$tr[2]).'
						</a>
					</div>';
				}
				
			}
		}
		echo '<div class="block-content" style="height:25px;">
		<span class="pull-left label label-primary" style="font-size: 15px;">
			<a  href="'.$config_template->Donaciones.'">Donar</a>
		</span>
		<span class="pull-right label label-danger" style="font-size: 15px;">
			<a  href="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'=logout">'.link_log_out.'</a>
		</span>
		  </div>
		 
		 ';
		  }else{
		  	echo '<div class="block-content" style="height:20px;">
					<span class="pull-right label label-danger" style="font-size: 15px;">
						<i class="fa fa-hand-stop-o" aria-hidden="true"></i> Necesitas Iniciar Sesion
					</span>
				</div>';
		  }
		  ?>
</div> 

<div class="side-block">	
	<h4 class="block-title">Menu General</h4>

		  <?
					  $m_row_ = get_sort('engine/cms_data/pag_d.cms',',');
					#  echo $test[1][2][3];
					  foreach ($m_row_ as $li){
					 #  explode(",",$li);
					   switch ($li[7]){
					   	case '0':
					   		if($li[8] == '1'){
					   			if($li[6] != '0'){
					   				echo '<div class="block-content"><a  href="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.$li[3].'"> '.str_replace($menu_links_title,$menu_links_translated,$li[2]).'</a> <span class="pull-right label label-success" style="font-size: 15px;"><i class="fa fa-arrow-left" aria-hidden="true"></i></span></div>';
					   			}
					   	
					   		}
					   		break;
					   	case '1':
					   		switch ($li[11]){
					   			case '1': $target = "_blank"; break;
					   			case '0': $target = "_self"; break;
					   		}
					   		echo '<div class="block-content"><a  href="'.$li[10].'"  target="'.$target.'"> '.str_replace($menu_links_title,$menu_links_translated,$li[2]).'</a> <span class="pull-right label label-success" style="font-size: 15px;"><i class="fa fa-arrow-left" aria-hidden="true"></i></span></div>';
					   	
					   	break;
					   }			  	
					  }
					  
		  ?>

		  		  
		</div>



<div class="side-block">	
	<h4 class="block-title">Servidores</h4>
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

	
<div class="side-block">	
	<h4 class="block-title">Informacion</h4>
			<div class="block-content"> Version: 
			<span class="pull-right label label-default" style="font-size: 15px;"><?=$config_template->Version;?></span>
			</div>
            <div class="block-content"> Experiencia:
            <span class="pull-right label label-default" style="font-size: 15px;"><?=$config_template->Exp;?></span>
			</div>
            <div class="block-content"> Drop:
			<span class="pull-right label label-default" style="font-size: 15px;"><?=$config_template->Drop;?></span>
			</div>
			<div class="block-content"> Cuentas Totales:
			<span class="pull-right label label-default" style="font-size: 15px;"><?=$cues;?></span>
			</div>
			<div class="block-content"> Gremios Totales:
			<span class="pull-right label label-default" style="font-size: 15px;"><?=$guild;?></span>
			</div>
			<? $barra = $core_db->Execute("SELECT count(memb___id) FROM MEMB_STAT WHERE ConnectStat = '1'");	 
			$online= $barra->fields[0]; ?>
			<div class="block-content"> Usuarios Online:
			<span class="pull-right label label-default" style="font-size: 15px;"><?=$online;?></span>
			</div>
			<div class="block-content" style="height: 10px">
    		<a href="<?=$config_template->InfoServer;?>" style="width: 100%; margin: auto" class="btn btn-primary btn-xs">Ver Informacion Completa</a>
    		</div>
	  </div>
	  		  		 
<div class="side-block">	
	<h4 class="block-title">Redes Sociales</h4>

<div id="social_icons" align="center">
<a href="<?=$config_template->Facebook;?>" target="_blank"><img src="template/<?=$core['config']['template'];?>/images/facebook.png" width="30" height="30" border="0" /></a>
<a href="<?=$config_template->Twitter;?>" target="_blank"><img src="template/<?=$core['config']['template'];?>/images/twitter.png" width="30" height="30" border="0" /></a>
<a href="<?=$config_template->YouTube;?>" target="_blank"><img src="template/<?=$core['config']['template'];?>/images/youtube.png" width="30" height="30" border="0" /></a>
<a href="<?=$config_template->Instagram;?>" target="_blank"><img src="template/<?=$core['config']['template'];?>/images/instagram.png" width="30" height="30" border="0" /></a>
<a href="<?=$config_template->Google;?>" target="_blank"><img src="template/<?=$core['config']['template'];?>/images/google.png" width="30" height="30" border="0" /></a>
</div>
</div>		  	  
</div>
<!--/LADO DERECHO-->

</div>
<!--/CAJA CONTENIDO-->

<!-- Footer -->
<footer class="youplay-footer-parallax">
    <div class="wrapper" style="background-image: url('template/<?=$core['config']['template'];?>/images/fondos/third.jpg')">

        <!-- Social Buttons -->
        <div class="social">
          <div class="container">
            <h3>Siguenos en nuestras <em>REDES SOCIALES</em></h3>
            <div class="social-icons">
              <div class="social-icon"> <a href="<?=$config_template->Facebook;?>"> <i class="fa fa-facebook-square"></i> <span>Facebook</span></a></div>
              <div class="social-icon"> <a href="<?=$config_template->YouTube;?>"> <i class="fa fa-youtube-square"></i> <span>Youtube</span></a></div>
            </div>
          </div>
        </div>
        <!-- /Social Buttons -->

        <!-- Copyright -->
      <div class="copyright">
          <div class="container"> <small><a target="_blank" href="https://foro.mucorepremium.net/">Copyright <? echo $config_template->Nombre; ?> &copy; <? echo date("Y"); ?>. Todos los derechos reservados.</a></small></div>
      </div>
        <!-- /Copyright -->

    </div>
</footer>
<!-- /Footer -->


</td>
</tr>
</table>

</section>


<!--<script>
	$(window).load(function() {
    $('#preloader').fadeOut('slow');
    $('body').css({'overflow':'visible'});
})
</script>-->

<?=LoadCustom('bs_footer');?>

<!-- Jarallax -->
<script type="text/javascript" src="template/<?=$core['config']['template'];?>/js/jarallax.min.js"></script>

    <!-- Youplay -->
<script type="text/javascript" src="template/<?=$core['config']['template'];?>/js/youplay.min.js"></script>
<script>
    if(typeof youplay !== 'undefined') {
        youplay.init({
            parallax:         true,
            navbarSmall:      false,
            fadeBetweenPages: true,
        });
    }
</script>
<!--AUTOSCROLL-->
<? if ($_GET['page_id']=='') { ?>
<? }else{ ?>
<script>
	$('html, body').animate({
           scrollTop: '970px'
       },
       1200);
</script>
<? } ?>
<!--/AUTOSCROLL-->


</body>
</html>