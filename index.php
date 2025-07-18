<?
session_start();
ob_start();
if(function_exists('ini_set'))@ini_set('magic_quotes_runtime', 'Off');
require('config.php');
require('engine/core.php');
require('engine/global_config.php');
require('engine/filter_ip.php');
if($core['config']['filter_ip'] == '1'){
	if(in_array($_SERVER['REMOTE_ADDR'],$core['config']['filter_ip_list'])){
		include('error_templates/ban_ip.php');
		exit;
	}
}

//COMPROBAR SI LA CARPETA INSTALL ESTA PRESENTE
if (file_exists('install/')) {
	include('error_templates/install_present.php');
exit;
}
if($core['config']['on_off'] == '0' || $core['debug'] == '1'){
	if(!isset($_SESSION['admin_login_auth'])){
		include('error_templates/website_offline.php');
		exit;
	}
}

require('engine/custom_variables.php');
require('engine/global_cms.php');
require('engine/global_functions.php');
require('engine/licencia_functions.php');
require("engine/adodb/adodb.inc.php");

//COMPROBAR LICENCIA
if (!isset($CoD3e4rN0lCl_xF2S3A52CvZ) or $CoD3e4rN0lCl_xF2S3A52CvZ != 'x"CwFhks26N|*zgf93NS'){
	echo '
	<style>
	body {
		background: #000;
	}
	</style>
	<title>MuCore Pirateada - Corre peligro</title>
	';
	echo '<div style="margin-top: 100px;;width: 100%;"><div style="margin: auto;
    width: 524px;
    border: 2px solid #2196F3;
    padding: 10px;
    background: #fff;
    font-family: verdana;"><b>Peligro!!</b> <br> Esta Version de MuCore fue alterada y no funcionara. :P, paga tu licencia, misio.</div></div>';
exit;
}

if($core['debug'] == '1'){
	ini_set('display_errors','On');
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
}else{
	ini_set('display_errors','Off');
	error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_WARNING);
}
require('language_config.php');
if($core['language_switch'] == '1'){
	if(isset($_GET['change_language'])){
		$get_langauge = safe_input($_GET['change_language'],'\_');
		if(array_key_exists($get_langauge,$languages)){
			if(setcookie('mucore_language',$get_langauge,time()+604800)){
				if(isset($_SERVER['HTTP_REFERER'])){
					header('Location: '.$_SERVER['HTTP_REFERER'].'');
				}else {
					header('Location: '.ROOT_INDEX.'');
				}
			}
		}
	}
	if(!isset($_COOKIE['mucore_language'])){
		require('languages/'.$core['language_set'].'.php');
	}elseif (isset($_COOKIE['mucore_language'])){
		$core['language_set'] = safe_input($_COOKIE['mucore_language'],'\_');
		require('languages/'.$core['language_set'].'.php');
	}
}else{
	require('languages/'.$core['language_set'].'.php');
}




if(isset($_GET[LOAD_GET_PAGE])){
	$page_check_id = xss_clean(safe_input($_GET[LOAD_GET_PAGE],"_"));
}else{
	$page_check_id = HOME_CMS_PAGE;
}
$load_pages_check = file('engine/cms_data/pag_d.cms');
foreach ($load_pages_check as $page_check){
	$page_check = explode(",",$page_check);
	if($page_check[3] == $page_check_id){
		$found_page_mw = '1';
		$page_title = $page_check[2];
		$head_keywords = $page_check[13];
		$head_description = $page_check[14];
		if($page_check[8] == '0'){ header('Location: '.ROOT_INDEX.''); exit;}
		if ($page_check[9] == '1'){ $req_log = '1';}else{$req_log = '0';}
		if ($page_check[12] == '1'){ $req_sql = '1';}else{$req_sql = '0';}
		break;
	}
}
if($found_page_mw != '1'){
	header('Location: '.ROOT_INDEX.'');
	exit();
}
if($req_sql == '1'){
	include("engine/connect_core.php");
	include('engine/secure_login.php');
}
if($_SESSION['user_auth'] == '1'){
	$user_login = '1';
	$user_auth_id = safe_input($_SESSION['user_auth_id'],'\_');
}else{
	$user_login = '0';
	$user_auth_id = '';
}
if($req_log == '1'){
	if($user_login != '1'){
		$_SESSION['last_url'] = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		header('Location: '.ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.LOGIN_CMS_PAGE.'');
		exit();
	}
}
if(isset($_GET[USER_GET_PAGE])){
	$core_run_script =  ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.$page_check_id.'&'.USER_GET_PAGE.'='.xss_clean(safe_input($_GET[USER_GET_PAGE],'_'));
}else{
	$core_run_script = ROOT_INDEX.'?'.LOAD_GET_PAGE.'='.$page_check_id.'';
}
require('engine/style_cms.php'); $core['version'] = crypt_it($engine,'','1'); 
function build_header_seo(){
	require('engine/seo_config.php');
	global $core,$core_run_script,$head_keywords,$head_description,$page_title,$menu_links_title,$menu_links_translated;
	if(empty($head_keywords)){
		$meta_keywords = $core_seo['meta_keywords'];
	}else{
		$meta_keywords = $head_keywords.','.$core_seo['meta_keywords'];
	}
	if(empty($head_description)){
		$meta_description = $core_seo['meta_description'];
	}else{
		$meta_description = $head_description;
	}
	if(!isset($_GET[LOAD_GET_PAGE])){
echo "<!-- no cache headers -->\n<meta http-equiv=\"Pragma\" content=\"no-cache\" />\n<meta http-equiv=\"Expires\" content=\"-1\" />\n<meta http-equiv=\"Cache-Control\" content=\"no-cache\" />\n<!-- end no cache headers -->\n<link rel=\"canonical\" href=\"".$core['config']['website_url']."/\" />
";}else {
echo "<base href=\"".$core['config']['website_url']."/\" /><!--[if IE]></base><![endif]-->\n<link rel=\"canonical\" href=\"".$core['config']['website_url']."/".$core_run_script."\" />
";}
echo "<meta name=\"author\" content=\"MuCore Premium\" />\n<meta name=\"generator\" content=\"MUCore ".$core['version']."\" />\n<meta name=\"keywords\" content=\"".$meta_keywords."\" />\n<meta name=\"description\" content=\"".$meta_description."\" />\n";
// METAS PARA FACEBOOK
if(isset($page_title)){
		$fixer_ogtitle = ''.str_replace($menu_links_title,$menu_links_translated,$page_title).' - '.$core['config']['websitetitle'].'';
	}else{
		$fixer_ogtitle = ''.$core['config']['websitetitle'].'';
	}

$metaog_host= $_SERVER["HTTP_HOST"];
$metaog_url= $_SERVER["REQUEST_URI"];
echo "
<meta property=\"og:site_name\" content=\"".$core['config']['websitetitle']."\" />
<meta property=\"og:title\" content=\"".$fixer_ogtitle."\" />
<meta property=\"og:description\" content=\"".$meta_description."\" />
<meta property=\"og:type\" content=\"website\" />
<meta property=\"og:url\" content=\"http://". $metaog_host . $metaog_url."\" />
<meta property=\"og:image\" content=\"".$core_seo['meta_og_image']."\" />\n";

}
function build_header_title(){
	global $core,$page_title,$menu_links_title,$menu_links_translated;
	if(isset($page_title)){
		echo ''.str_replace($menu_links_title,$menu_links_translated,$page_title).' - '.$core['config']['websitetitle'].'';
	}else{
		echo ''.$core['config']['websitetitle'].'';
	}
}
function build_footer(){
global $core;
echo "<div align=\"center\" class=\"footer_font\">\n<!-- Do not remove MMORPG Core copyright notice -->\n<a href=\"http://mucorepremium.net\" target=\"_blank\">MuCore </a> ".$core['']."<br>\nCopyright ";if(date('Y') == '2009'){ echo '2009';}else{echo ''.date('Y').'';};echo ". All rights reserved.\n<!-- Do not remove MMORPG Core copyright notice -->";if(!empty($core['config']['copyright'])){echo "\n<br>".stripslashes($core['config']['copyright'])."";}echo "\n</div>\n";
}
if ($_GET['null'] == '1') {
include('template/'.$core['config']['template'].'/index-null.php');
}else{
include('template/'.$core['config']['template'].'/index.php');
}
ob_end_flush(); 

echo'
<script>
  console.log("%c(c) 2018 - MuCore Premium '.$core['version'].'", "color: red; font-size: 30px; font-weight:bolder;"); 
  console.log("%cLiberado 04/05/2018", "color: blue; font-size: 20px; font-weight:bolder;"); 
  console.log("%cRecoded by Arnold Garcia", "color: black; font-size: 15px; font-weight:bolder;"); 
  console.log("%cRIP ", "color: green; font-size: 14px; font-weight:bolder;"); 
</script>
';
echo'
<script>
  console.log("%cRespeta por lo menos los creditos", "color: red; font-size: 30px; font-weight:bolder;"); 
  console.log("%c https://aohostperu.com/ ", "color: green !important; font-size: 14px; font-weight:bolder;"); 
</script>
';

?>