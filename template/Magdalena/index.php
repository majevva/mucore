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
<link rel="SHORTCUT ICON" href="template/<?=$core['config']['template'] ?>/images/webicon.ico"/>
  <!-- Modificaciones Custom -->
<link rel="stylesheet" href="template/<?=$core['config']['template'] ?>/css/custom.css" type="text/css" media="all" /> 
	<!-- Skitter Styles -->
<link href="template/<?=$core['config']['template'] ?>/css/skitter.styles.css" type="text/css" media="all" rel="stylesheet" />

<script type="text/javascript" language="javascript" src="template/<?=$core['config']['template'] ?>/js/jquery.animate-colors-min.js"></script>
<script type="text/javascript" language="javascript" src="template/<?=$core['config']['template'] ?>/js/reloj.js"></script>

	
</head>
<body>

<!--HEAD-->
<table width="955" border="0" cellspacing="0" cellpadding="0" align="center">
  <tbody><tr>
    <td>
	
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tbody><tr>
        <td width="196" valign="bottom"><a href="index.php" target="_parent"><img src="template/<?=$core['config']['template'];?>/images/tpl/logoprincipal.jpg" alt="Mu Magdalena Server" width="196" height="153" border="0"></a></td>
        <td width="523" valign="bottom" style="background:url(template/<?=$core['config']['template'];?>/images/tpl/img_mu_header_web_bg.jpg) no-repeat top left;">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
		  <tbody><tr>
			<td align="right" class="verdana_smalltxt_white">&nbsp;</td>
		  </tr>
		  <tr>
			<td height="10"></td>
		  </tr>
		</tbody></table>
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
		  <tbody><tr>
			<td colspan="4"><img src="template/<?=$core['config']['template'];?>/images/tpl/banner.jpg" alt="logoup" width="523" height="113"></td>
			</tr>
		</tbody></table>
		</td>
        <td width="236" valign="bottom">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tbody><tr>
            <td align="right">&nbsp;</td>
          </tr>
          <tr>
            <td align="right"><a href="<?=$config_template->Foro;?>" target="_blank"><img src="template/<?=$core['config']['template'];?>/images/tpl/img_new_to_mu.jpg" width="236" height="111" border="0"></a></td>
          </tr>
        </tbody></table>
		</td>
      </tr>
    </tbody></table>
	
	</td>
  </tr>
  <tr>
    <td colspan="4"><img src="template/<?=$core['config']['template'];?>/images/tpl/img_welcome_to_muph.jpg" alt="logoup" width="955" height="32"></td>
  </tr>
</tbody>
</table>
<!--/HEAD-->



<!--CONTENIDO-->
<table width="955" border="0" cellspacing="0" cellpadding="0" align="center">
  <tbody><tr align="left" valign="top">
    <td width="196" style="background-image:url(template/<?=$core['config']['template'];?>/images/tpl/bg_cpanel_border.jpg); background-repeat:repeat-y;">


<table cellpadding="0" cellspacing="0" width="100%">
  <!-- MSTableType="layout" -->
  <tbody><tr>
    <td height="19" background="template/<?=$core['config']['template'];?>/images/tpl/splice_left.jpg" style="width:18px"></td>
    <td height="26" valign="top">
    
    <table cellpadding="0" cellspacing="0" width="100%" height="100%">
      <!-- MSTableType="layout" -->
      <tbody><tr>
        <td height="20" valign="middle" style="width:165px">
        <table style="width:165px">
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
					   				echo '<tr align="left" valign="top">
        							<td height="35" valign="middle" background="template/'.$core['config']['template'].'/images/tpl/menu_home.jpg">
        							<div align="center">
        							<span class="Estilo2">
					   				<a  href="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.$li[3].'"> '.str_replace($menu_links_title,$menu_links_translated,$li[2]).'</a>
					   				</span></div></td></tr>';
					   			}
					   	
					   		}
					   		break;
					   	case '1':
					   		switch ($li[11]){
					   			case '1': $target = "_blank"; break;
					   			case '0': $target = "_self"; break;
					   		}
					   		echo '<tr align="left" valign="top">
        							<td height="35" valign="middle" background="template/'.$core['config']['template'].'/images/tpl/menu_home.jpg">
        							<div align="center">
        							<span class="Estilo2">
					   		<a  href="'.$li[10].'"  target="'.$target.'"> '.str_replace($menu_links_title,$menu_links_translated,$li[2]).'</a>
					   		</span></div></td></tr>';
					   	
					   	break;
					   }			  	
					  }
					  
		  ?>
        </tbody></table>
        
        </td>
      </tr>
    </tbody>
    </table>

    </td>
    <td height="15" background="template/<?=$core['config']['template'];?>/images/tpl/splice_right.jpg" style="width:19px"></td>
  </tr>
</tbody></table>

<!--BOX LOGIN-->
<?
		  if($user_login == '1'){
		  	echo '<img src="template/'.$core['config']['template'].'/images/tpl/splice_scroll_top.jpg" width="196" height="13" alt="">
		  	<b style="color: #e45600;">Bienvenido/a '.$user_auth_id.'</b>
		  	<table cellpadding="0" cellspacing="0" width="100%">
  <!-- MSTableType="layout" -->
  <tbody><tr>
    <td height="19" background="template/'.$core['config']['template'].'/images/tpl/splice_left.jpg" style="width:18px"></td>
    <td height="26" valign="top">
    
    <table cellpadding="0" cellspacing="0" width="100%" height="100%">
      <!-- MSTableType="layout" -->
      <tbody><tr>
        <td height="20" valign="middle" style="width:165px">
        <table style="width:165px">
        <tbody>';
		$m_uss_row_ = get_sort('engine/cms_data/mods_uss.cms',',');
 	 	$count_m_uss = 0;
		foreach ($m_uss_row_ as $tr){
			explode(",",$tr);
			$count_m_uss++;
			if($tr[6] == '1'){
				if($tr[3] != ACCOUNTSETTINGS_CMS_USER){
					echo '<tr align="left" valign="top">
        							<td height="35" valign="middle" background="template/'.$core['config']['template'].'/images/tpl/menu_home.jpg">
        							<div align="center">
        							<span class="Estilo2">
					   				<a  href="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.USER_CMS_PAGE.'&'.USER_GET_PAGE.'='.$tr[3].'"> '.str_replace($menu_links_title,$menu_links_translated,$tr[2]).'</a>
					   				</span></div></td></tr>';
				}
				
			}
		}
		echo '</tbody></table>
        
        </td>
      </tr>
    </tbody>
    </table>

    </td>
    <td height="15" background="template/'.$core['config']['template'].'/images/tpl/splice_right.jpg" style="width:19px"></td>
  </tr>
</tbody></table>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="4" style="background: #313839;">
		 <tr>
		  <td align="left" class="yellow"><a  href="index.php?page_id=donar">Donar</a></td>
		  <td align="right" class="yellow"><a  href="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'=logout">'.link_log_out.'</a></td>
		 </tr>
		 </table>
		 ';
		  }else{
		  	echo '<table>
    	<tr>
  <td><img src="template/'.$core['config']['template'].'/images/tpl/splice_scroll_top.jpg" width="196" height="13" alt="">
    <table width="195" border="0" bordercolor="#293842" bgcolor="#293842">
        <tbody><tr>
          <td colspan="3" bgcolor="#313839"><div align="center" class="style1"><span class="times_bigtxt_brown Estilo60"><span class="Estilo63">Menu Usuario </span></span></div></td>
          </tr>
        <tr>
          <td width="59" bgcolor="#313839">
            <div align="center">
<form method="post" action="'.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.LOGIN_CMS_PAGE.'" name="uss_login_form">
<table cellpadding="0" cellspacing="0" width="177">
    <!-- MSTableType="nolayout" -->
    <tbody><tr>
        <td height="17" width="125">Login</td>
        <td height="17" width="52"></td>
    </tr>
    <tr>
        <td height="28" valign="top" width="125">
          <input class="form-login" type="text" name="uss_id" maxlength="10" value="Account ID" onfocus="if (this.value==\'Account ID\') this.value=\'\';" onblur="if (this.value==\'\') this.value=\'Account ID\';" size="16">
           <input class="form-login" type="password" name="uss_password" value="password" maxlength="12" onfocus="if (this.value==\'password\') this.value=\'\';" onblur="if (this.value==\'\') this.value=\'password\';" size="16"><input type="hidden" name="process_login"></td>
        <td height="28" valign="center" align="center" width="52">
            <input class="btn-login" name="proseso_login" value="Login" id="ahrre" type="button" onclick="uss_login_form.submit();"></td>
    </tr>
    <tr>
        <td colspan="2">
        <div id="AOHLogin"></div>
        </td>
    </tr>
    <tr>
        <td height="13" width="177" colspan="2"><a style="color: #ab7323;" href="index.php?page_id=register">Registrate</a> | <a href="index.php?page_id=lost_password">Recuperar Clave</a></td>
    </tr>
</tbody></table>
</form>
                    </div></td>

        </tr>

      </tbody></table>
    <img src="template/'.$core['config']['template'].'/images/tpl/splice_scroll_bottom.jpg" width="196" height="31" alt=""></td>
  </tr>
    </table>';
		  }
		  ?>
<!--/BOX LOGIN-->

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody><tr>
	<td><img src="template/<?=$core['config']['template'];?>/images/tpl/splice_bottom.jpg" width="196" height="17" alt=""></td>
  </tr>
</tbody></table>	<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody><tr>
	<td><img src="template/<?=$core['config']['template'];?>/images/tpl/splice_scroll_top.jpg" width="196" height="13" alt="">
	  <table width="195" border="0" bordercolor="#293842" bgcolor="#293842">
        <tbody><tr>
          <td colspan="3" bgcolor="#313839"><div align="center" class="style1"><span class="times_bigtxt_brown Estilo60"><span class="Estilo63">Unete a nuestra comunidad </span></span></div></td>
          </tr>
        <tr>
          <td width="59" bgcolor="#313839"><div align="center"><a href="<?=$config_template->Facebook;?>" target="_blank"><img src="template/<?=$core['config']['template'];?>/images/tpl/facebook.png" width="58" height="55" border="0"></a></div></td>
          <td width="60" bgcolor="#293839"><div align="center"><a href="<?=$config_template->Twitter;?>" target="_blank"><img src="template/<?=$core['config']['template'];?>/images/tpl/twitter.png" width="58" height="55" border="0"></a></div></td>
          <td width="59" bgcolor="#293839"><div align="center"><a href="<?=$config_template->YouTube;?>" target="_blank"><img src="template/<?=$core['config']['template'];?>/images/tpl/youtube.png" width="58" height="55" border="0"></a></div></td>
        </tr>
        
      </tbody></table>
	  <img src="template/<?=$core['config']['template'];?>/images/tpl/splice_scroll_bottom.jpg" width="196" height="31" alt=""></td>
  </tr>
  <tr>
	<td><img src="template/<?=$core['config']['template'];?>/images/tpl/splice_scroll_top.jpg" alt="" width="196" height="13">
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tbody><tr>
		<td width="10" style="background:url(template/<?=$core['config']['template'];?>/images/tpl/splice_server_stat_left.jpg)"><span style="background-image:url(template/<?=$core['config']['template'];?>/images/tpl/genscroll_left.jpg);"><img src="template/<?=$core['config']['template'];?>/images/tpl/genscroll_left.jpg" width="17" height="169" alt=""></span></td>
		<td width="175" align="left" valign="top" style="background-color:#2E3A40;"><table width="100%" height="133" border="0" cellpadding="0" cellspacing="0">
          <tbody><tr>
            <td height="25"><div align="center" class="times_bigtxt_brown">Estado del Server </div></td>
          </tr>
          <tr>
            <td height="91"><table width="90%" border="0" cellspacing="0" cellpadding="0" class="times_normaltxt_gray" align="center">
                <tbody><tr>
                  <td colspan="3" height="5"></td>
                </tr>
                <!--<tr>
                  <td width="21"><img src="template/<?=$core['config']['template'];?>/images/tpl/bullet_server_up.gif" width="15" height="15" alt=""></td>
                  <td width="71"><span class="times_mediumtxt_yellow"><strong>Server 1 </strong></span></td>
                  <td width="54"><span class="times_mediumtxt_yellow"><strong><span style="color:#00FF00;">Online</span></strong></span></td>
                </tr>
                <tr>
                  <td colspan="3" height="3"></td>
                </tr>-->
            <tr>
                  <td colspan="3">
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
    </td>
                </tr>            
                            
            </tbody></table></td>
          </tr>
        </tbody></table></td>
		<td width="15" style="background:url(template/<?=$core['config']['template'];?>/images/tpl/splice_server_stat_right.jpg)"><span style="background-image:url(template/<?=$core['config']['template'];?>/images/tpl/genscroll_right.jpg) "><img src="template/<?=$core['config']['template'];?>/images/tpl/genscroll_right.jpg" width="12" height="169" alt=""></span></td>
	  </tr>
	</tbody></table>	</td>
  </tr>
  <tr>
	<td><img src="template/<?=$core['config']['template'];?>/images/tpl/splice_scroll_bottom.jpg" width="196" height="31" alt=""></td>
  </tr>
</tbody></table>

<table width="196" border="0" cellspacing="0" cellpadding="0">
  <tbody><tr>
	<td><img src="template/<?=$core['config']['template'];?>/images/tpl/splice_scroll_top.jpg" alt="" width="196" height="13"></td>
  </tr>
  <tr>
	<td>
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tbody><tr>
		<td width="10" style="background-image:url(template/<?=$core['config']['template'];?>/images/tpl/img_support_01.jpg)">&nbsp;</td>
		<td width="174" style="background-color:#2E3A40;" valign="top">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
		  <tbody><tr>
			<td><div align="center" class="times_bigtxt_brown">Info Server </div></td>
		  </tr>
		</tbody></table>
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
		  <tbody><tr>
			<td>&nbsp;</td>
			<td width="177"><div align="center"></div></td>
		  </tr>
		  <tr>
		    <td>&nbsp;</td>
		    <td class="times_normaltxt_yellow">
		    <p>Version: <?=$config_template->Version;?></p>
		    <p>Exp: <?=$config_template->Exp;?></p>
		    <p>Drop: <?=$config_template->Drop;?></p>
		    <p>Cuentas: <?=$cues;?></p>
		    <p>Clanes: <?=$guild;?></p>
		    <? $barra = $core_db->Execute("SELECT count(memb___id) FROM MEMB_STAT WHERE ConnectStat = '1'");	 
			$online= $barra->fields[0]; ?>
		    <p>Online: <?=$online;?></p>
		    </td>
		    </tr>
		  <tr>
		    <td colspan="2" height="4"></td>
	      </tr>
		</tbody></table>

		</td>
		<td width="13" style="background-image:url(template/<?=$core['config']['template'];?>/images/tpl/img_support_03.jpg)">&nbsp;</td>
	  </tr>
	</tbody></table>
	</td>
  </tr>
  <tr>
	<td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tbody><tr>
        <td><img src="template/<?=$core['config']['template'];?>/images/tpl/livechat_top.jpg" width="196" height="31" alt="Live Chat"></td>
      </tr>
      <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tbody><tr>
            <td width="20"><img src="template/<?=$core['config']['template'];?>/images/tpl/livechat_cl.jpg" width="20" height="37" alt=""></td>
            <td width="101" valign="top" class="times_smalltxt_white" style="background-color:#90989A; padding-left:5px; padding-top:3px; font-family:Georgia, 'Times New Roman', Times, serif; color:#FFDF94; font-size:10px;">AOHOST </td>
            <td width="77"><img src="template/<?=$core['config']['template'];?>/images/tpl/livechat_cr.jpg" width="73" height="37" alt=""></td>
          </tr>
        </tbody></table></td>
      </tr>
      <tr>
        <td><img src="template/<?=$core['config']['template'];?>/images/tpl/livechat_bottom.jpg" width="196" height="25" alt=""></td>
      </tr>
    </tbody></table></td>
  </tr>
</tbody></table>



	</td>
    <td width="11" style="background-image:url(template/<?=$core['config']['template'];?>/images/tpl/bg_paper_left.jpg); background-repeat:repeat-y; background-color:#282924;"><img src="template/<?=$core['config']['template'];?>/images/tpl/bg_paper_ulc.jpg" width="11" height="25" alt=""></td>
    <td width="494" style="background-color:#F9F8F5;">
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tbody><tr>
        <td><img src="template/<?=$core['config']['template'];?>/images/tpl/bg_paper_top.jpg" width="495" height="25" alt=""></td>
      </tr>
    </tbody></table>
	
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tbody><tr>
		<td width="9" valign="top">&nbsp;</td>
		<td>
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
		  
		  <tbody><tr><td height="2"></td></tr>
		</tbody></table>

		<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tbody><tr>
		    <td width="483" height="11"><table width="100%" border="0" cellspacing="0" cellpadding="0">

              <tbody><tr>
                <td width="5"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tbody>
                  <tr>
                    <td width="5">&nbsp;</td>
                    <td>
                    	
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

                    </td>
                    <td width="10">&nbsp;</td>
                  </tr>
                  
                  
                </tbody></table></td>
              </tr>
            </tbody></table></td>
		    </tr>
		</tbody></table>
		
		</td>
		<td width="5" valign="top">&nbsp;</td>
	  </tr>
	  
	  
	  <tr>
	    <td>&nbsp;</td>
	    <td align="center" class="verdana_smalltxt_black style1">&nbsp;</td>
	    <td>&nbsp;</td>
	    </tr>
	</tbody></table>

	
	</td>
    <td width="17" style="background-image:url(template/<?=$core['config']['template'];?>/images/tpl/bg_paper_right.jpg); background-repeat:repeat-y;"><span class="times_normaltxt_gray"><img src="template/<?=$core['config']['template'];?>/images/tpl/bg_paper_urc.jpg" width="17" height="122" alt=""></span></td>
    <td width="236" style="background-image:url(template/<?=$core['config']['template'];?>/images/tpl/bg_side_paper_rnl.jpg); background-repeat:repeat-y;">
	
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tbody><tr>
        <td><img src="template/<?=$core['config']['template'];?>/images/tpl/bg_side_paper_top.jpg" width="236" height="28" alt=""></td>
      </tr>
    </tbody></table>
	
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tbody>
	  <tr>
	    <td colspan="3" height="5"></td>
	    </tr>
	  <tr>
	    <td height="11"></td>
	    <td height="11" style="background-image:url(template/<?=$core['config']['template'];?>/images/tpl/bg_gradient_small.jpg); background-repeat:repeat-x;"></td>
	    <td height="11"></td>
	    </tr>
	  <tr>
	    <td>&nbsp;</td>
	    <td align="center" style="background-color:#F8F7F5;"><strong><a href="http://mu.magdalenaperu.com/reg.asp?action=reg" target="_parent"><img height="14" alt="noti" src="template/<?=$core['config']['template'];?>/images/tpl/bullet_circle.gif" width="14" border="0"> <span class="times_mediumtxt_brown">Registrate Ahora </span></a><img height="14" alt="noti" src="template/<?=$core['config']['template'];?>/images/tpl/bullet_circle.gif" width="14" border="0"><a href="http://www.magdalenaperu.com/forums/viewtopic.php?t=27957" target="_blank" class="times_mediumtxt_brown"></a></strong></td>
	    <td>&nbsp;</td>
	    </tr>
	  <tr>
	    <td colspan="3" height="2"></td>
	    </tr>

	  <tr>
	    <td width="18">&nbsp;</td>
	    <td style="background-color:#F8F7F5;"><div align="center"><a href="<?=$config_template->WebShop;?>"><img src="template/<?=$core['config']['template'];?>/images/tpl/ads_register.jpg" width="185" height="99" border="0" alt="Venta de Items"></a>
	
		

</div></td>
	    <td width="35">&nbsp;</td>
	    </tr>
	  <tr>
	    <td colspan="3" height="2"></td>
	    </tr>
	  <tr>
      <td height="11"></td>
	    <td height="11" style="background-image:url(template/<?=$core['config']['template'];?>/images/tpl/bg_gradient_small.jpg); background-repeat:repeat-x;"></td>
	    <td height="11"></td>
	    </tr>
	  <tr>
      <td colspan="3" height="2"></td>
	    </tr>
	  <tr>
      <td>&nbsp;</td>
	    <td align="center" style="background-color:#F8F7F5;"><a href="<?=$config_template->Registro;?>"><img src="template/<?=$core['config']['template'];?>/images/tpl/ads_loadup.jpg" alt="Registrate" width="185" height="99" border="0"></a></td>
	    <td>&nbsp;</td>
	    </tr>
	  <tr>
	    <td height="11"></td>
	    <td height="11" style="background-image:url(template/<?=$core['config']['template'];?>/images/tpl/bg_gradient_small.jpg); background-repeat:repeat-x;"></td>
	    <td height="11"></td>
	    </tr>
	  <tr>
	    <td colspan="3" height="2"></td>
	    </tr>
	  <tr>
	    <td>&nbsp;</td>
	    <td align="center" style="background-color:#F8F7F5;"><a href="<?=$config_template->Descargas;?>"><img src="template/<?=$core['config']['template'];?>/images/tpl/ads_installers.jpg" alt="Instaladores y Parches" width="188" height="99" border="0"></a></td>
	    <td>&nbsp;</td>
	    </tr>
	  <tr>
	    <td colspan="3" height="2"></td>
	    </tr>
	  <tr>
	    <td height="11"></td>
	    <td height="11" style="background-image:url(template/<?=$core['config']['template'];?>/images/tpl/bg_gradient_small.jpg); background-repeat:repeat-x;"></td>
	    <td height="11"></td>
	    </tr>
	  <tr>
	    <td colspan="3" height="2"></td>
	    </tr>
	  <tr>
	    <td>&nbsp;</td>
	    <td align="center" style="background-color:#F8F7F5;"><a href="<?=$config_template->Foro;?>" target="_blank"><img src="template/<?=$core['config']['template'];?>/images/tpl/img_mu_forums.jpg" alt="Forums" width="188" height="99" border="0"></a></td>
	    <td>&nbsp;</td>
	    </tr>
	  <tr>
	    <td colspan="3" height="2"></td>
	    </tr>

	  <tr>
	    <td height="11"></td>
	    <td height="11" style="background-image:url(template/<?=$core['config']['template'];?>/images/tpl/bg_gradient_small.jpg); background-repeat:repeat-x;"></td>
	    <td height="11"></td>
	    </tr>
	  <tr>
	    <td>&nbsp;</td>
	    <td align="center" style="background-color:#F8F7F5;"><span class="times_mediumtxt_brown style1 style1"><strong><img height="14" alt="noti" src="template/<?=$core['config']['template'];?>/images/tpl/bullet_circle.gif" width="14" border="0"> <span class="times_mediumtxt_brown">Galeria </span><img height="14" alt="noti" src="template/<?=$core['config']['template'];?>/images/tpl/bullet_circle.gif" width="14" border="0"></strong></span></td>
	    <td>&nbsp;</td>
	    </tr>
	  <tr>
	    <td colspan="3" height="2"></td>
	    </tr>
	  <tr>
	    <td>&nbsp;</td>
	    <td style="background-color:#F8F7F5;"><img src="template/<?=$core['config']['template'];?>/images/tpl/galeria.jpg" alt="galeria" width="185" height="150"></td>
	    <td>&nbsp;</td>
	    </tr>
	  <tr>
	    <td colspan="3" height="2"></td>
	    </tr>
	  <tr>
	    <td>&nbsp;</td>
	    <td align="center" style="background-color:#F8F7F5;"><a href="gameguide/gameevents.php"><span class="times_mediumtxt_brown"><strong>Eventos</strong></span></a></td>
	    <td>&nbsp;</td>
	    </tr>
	  <tr>
	    <td colspan="3" height="2"></td>
	    </tr>
	  
	  <tr>
      <td>&nbsp;</td>
	    <td style="background-color:#F8F7F5;"><img src="template/<?=$core['config']['template'];?>/images/tpl/bnr_mu_events_crywolf.jpg" width="185" height="99" border="0" alt="Crywolf"></td>
	    <td>&nbsp;</td>
	    </tr>
	  <tr>
	    <td>&nbsp;</td>
	    <td style="background-color:#F8F7F5;"><img src="template/<?=$core['config']['template'];?>/images/tpl/evt_cs.jpg" width="185" height="99" border="0" alt="Castle Siege"></td>
	    <td>&nbsp;</td>
	    </tr>
	  <tr>
	    <td colspan="3" height="2"></td>
	    </tr>
	  <tr>
	    <td>&nbsp;</td>
	    <td style="background-color:#F8F7F5;"><img src="template/<?=$core['config']['template'];?>/images/tpl/evt_cc.jpg" width="185" height="99" border="0" alt="Chaos Castle"></td>
	    <td>&nbsp;</td>
	    </tr>
	  <tr>
	    <td colspan="3" height="2"></td>
	    </tr>
	  
	  <tr>
	    <td colspan="3" height="2"></td>
	    </tr>
	  <tr>
          <td>&nbsp;</td>
	      <td style="background-color:#F8F7F5;"><img src="template/<?=$core['config']['template'];?>/images/tpl/evt_bc.jpg" width="185" height="99" border="0" alt="Blood Castle"></td>
	      <td>&nbsp;</td>
        </tr>
	  <tr>
      <td>&nbsp;</td>
	    <td style="background-color:#F8F7F5;"><img src="template/<?=$core['config']['template'];?>/images/tpl/evt_ds.jpg" width="185" height="99" border="0" alt="Devil Square"></td>
	    <td>&nbsp;</td>
	    </tr>
	</tbody></table>

	</td>
  </tr>
</tbody></table>
<!--/CONTENIDO-->




<!--FOOTER-->
<table width="958" border="0" cellspacing="0" cellpadding="0" align="center">
  <tbody><tr align="left" valign="top">
    <td width="220" align="right" style="background-image:url(template/<?=$core['config']['template'];?>/images/tpl/bg_cpanel_border.jpg); background-repeat:repeat-y;"><img alt="" width="175" height="1"><img alt="" src="template/<?=$core['config']['template'];?>/images/tpl/bg_side_paper_bl.jpg" width="11" height="96"></td>
    <td width="489" valign="bottom" style="background-color:#F9F8F5;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tbody><tr>
        <td align="left" valign="bottom"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tbody><tr>
            <td><table width="109%" border="0" cellspacing="0" cellpadding="0" class="verdana_smalltxt_black">
              <tbody><tr>
                <td width="466" height="36"><div style="line-height:12px;">
                  <div align="center" class="style1"><span class="Estilo65">Copyright <? echo Date('Y');?> - <? echo $config_template->Nombre; ?> </span><br>
                  </div>
                </div></td>
              </tr>
            </tbody></table></td>
          </tr>
          <tr>
            <td height="3"></td>
          </tr>
          <tr>
            <td height="25"><img alt="" src="template/<?=$core['config']['template'];?>/images/tpl/bg_paper_pie.jpg" width="494" height="33"></td>
          </tr>
        </tbody></table></td>
      </tr>
    </tbody></table></td>
    <td width="17"><img alt="" src="template/<?=$core['config']['template'];?>/images/tpl/bg_paper_bottom.jpg" width="17" height="96"></td>
    <td width="230"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tbody><tr>
        <td width="18"><img alt="" src="template/<?=$core['config']['template'];?>/images/tpl/bg_side_paper_bl.jpg" width="18" height="96"></td>
        <td valign="bottom" style="background-color:#F9F7F5; "><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tbody><tr>
            <td align="center"><a href="validator.w3_CBAC20D2" target="_blank"></a></td>
          </tr>
          <tr>
            <td align="center">&nbsp;</td>
          </tr>
          <tr>
            <td><img alt="" src="template/<?=$core['config']['template'];?>/images/tpl/bg_side_paper_bottom.jpg" width="184" height="33"></td>
          </tr>
        </tbody></table></td>
        <td width="35"><img alt="" src="template/<?=$core['config']['template'];?>/images/tpl/bg_side_paper_br.jpg" width="35" height="96"></td>
      </tr>
    </tbody></table></td>
  </tr>
  <tr align="left" valign="top">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</tbody></table>
<!--/FOOTER-->

<?=LoadCustom('bs_footer');?>
</body>
</html>