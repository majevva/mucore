<?php
$Page_Request = strtolower(basename($_SERVER['REQUEST_URI']));
$Page_File = strtolower(basename(__FILE__));
if ($Page_Request == $Page_File)
{
	exit("<span style=\"border:1px dashed #c00; color:#c00; padding:6px; margin:6px;background-color:#ffebe8;\"><strong>CTM-Error: No est&aacute; permitido acceder a este archivo directamente.</strong></span>");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Error de licencia - MuCore <? echo crypt_it($engine,'','1'); ?> </title>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=ISO-8859-1">
<META HTTP-EQUIV="EXPIRES" CONTENT="0">
<META NAME="RESOURCE-TYPE" CONTENT="DOCUMENT">
<META NAME="DISTRIBUTION" CONTENT="GLOBAL">
<META NAME="AUTHOR" CONTENT="Cracked by Arnold">
<META NAME="COPYRIGHT" CONTENT="Copyright (c) 2016 Arnold">
<META NAME="KEYWORDS" CONTENT="mu online season 6, mu online season 6, HACKER MUONLINE, HACKER MUONLINE, HACKER , HACKER , SERVERMU, SERVERMU, MU HACKMASTERSERVERMU, phpSERVERMU, MU HACKMASTERSERVERMU, Geek, geek, POWER XATS, POWER XATS, Hacker, hacker, Hackers, hackers, Linux, linux, Windows, windows, Software, software, Download, download, Downloads, downloads, Free, FREE, free, Community, community, MP3, mp3, Forum, forum, Forums, forums, Bulletin, bulletin, Board, board, Boards, boards, PHP, php, Survey, survey, Kernel, kernel, Comment, comment, Comments, comments, Portal, portal, ODP, odp, Open, open, Open Source, OpenSource, Opensource, opensource, open source, Free Software, FreeSoftware, Freesoftware, free software, GNU, gnu, GPL, gpl, License, license, Unix, UNIX, *nix, unix, MySQL, mysql, SQL, sql, Database, DataBase, Blogs, blogs, Blog, blog, database, Mandrake, mandrake, Red Hat, RedHat, red hat, Slackware, slackware, SUSE, SuSE, suse, Debian, debian, Gnome, GNOME, gnome, Kde, KDE, kde, HACK DE POWER, HACK DE POWER, HACK DE XATS, HACK DE XATS, PROGRAMAS HACKER, PROGRAMAS HACKER, Extreme, extreme, Game, game, Games, games, Web Site, web site, Weblog, WebLog, weblog, Guru, GURU, guru, Oracle, oracle, db2, DB2, odbc, ODBC, plugin, plugins, Plugin, Plugins">
<META NAME="DESCRIPTION" CONTENT="">
<META NAME="ROBOTS" CONTENT="INDEX, FOLLOW">
<META NAME="REVISIT-AFTER" CONTENT="1 DAYS">
<META NAME="RATING" CONTENT="GENERAL">
<META NAME="GENERATOR" CONTENT="Software Liberado"><script language="javascript" type="text/javascript">
        function count()
        {
            if(document.getElementById("time").innerHTML != 0)
	        {
                document.getElementById("time").innerHTML = document.getElementById("time").innerHTML - 1;
                setTimeout("count()", 1000);
            }
            else
            {
                window.open('?','_self');
            }
        }
        function clickIE()
        {
            if (document.all)
            {
                return false;
            }
        }
        function clickNS(e)
        {
            if (document.layers || document.getElementById && !document.all)
            {
                if (e.which == 2 || e.which == 3)
                {
                    return false
                }
            }
        }
        if (document.layers) 
        {
            document.captureEvents(Event.MOUSEDOWN);
            document.onmousedown = clickNS;
        }
        else
        {
            document.onmouseup = clickNS;
            document.oncontextmenu = clickIE;
        }
        document.oncontextmenu = new Function("return false");
    </script>
<style type="text/css">
<!--
body,td,th {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 14px;
	color: #000000;
}
body {
	background-color: rgb(51, 102, 153);
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
blockquote.success {
            border: 1px dashed #009900;
			font-size:11px;
            padding-left: 46px;
            color: #009900;
            background-color: #DDFFDD;
            background: #DDFFDD url(images/success.gif) no-repeat left center;
        }
.btnbtn{
    background: #fe8900;
    color: #fff;
    border: none;
    border-radius: 2px;
    padding: 10px;
}
.btnbtn:hover{
    background: #e4800a;
    color: #fff;
    border: none;
    border-radius: 2px;
    padding: 10px;
}
.cajaserial {
    border-radius: 2px;
    height: 20px;
    width: 80%;
    border: solid 1px #000;
}
-->
</style>
</head>

<body>
<table width="800" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-top:100px;">
  <tr>
    <td align="center" valign="middle">
    <table width="750" height="400" border="0" cellspacing="0" cellpadding="0" style="border:solid 4px #000000;background-color:#E8E8E8;">
      <tr>
        <td width="148" height="30" align="center" valign="middle" style="border-bottom:solid 2px #000000;background-color: #171717;color: #fff;font-size:20px;"><b style="font-weight: 700;">MU</b> Core</td>
        <td colspan="2" align="center" valign="middle" style="border-bottom:solid 2px #000000;background-color: #171717;color:#fff;">
        Activacion de licencia

        </tr>
      <tr>
        <td height="20%" colspan="3" valign="top" style="padding:10px; font-size:11px"><span><b>Errores Detectados:</b><br  /><br  />
        <?php
		if(file_exists(WebSiteInfo(7)))
			{
				 if(WebSiteInfo(6) != WebSiteInfo(2)) { echo "- El Serial Licenciado no corresponde a este Dominio [<b>".$_SERVER["SERVER_NAME"]."</b>]<br /> "; }
				 if(time() > WebSiteInfo(5)) { echo "- Esta Licencia esta expirada desde el d&iacute;a ".WebSiteInfo(8)."<br />"; }
				 if(WebSiteInfo(3) != "LIGHT" && WebSiteInfo(3) != "SOFT" && WebSiteInfo(3) != "PREMIUM") { echo "- Esta Licencia ha sido alterada<br />"; }
            }
			else
			{
				echo "- No existe o no tiene el nombre Correcto el Archivo de Licencia";
			}
        ?>
        </span>
        </td>
        </tr>
      <tr>
        <td height="20%" colspan="3" valign="bottom" style="padding-left:12px; padding-bottom:5px; font-size:12px"><b>Si dispone de un serial licenciado, por favor ingreselo en la casilla.</b><br><br></td>
        </tr>
      <tr>
        <td height="20%" colspan="3" align="center" valign="top">
        <form id="Apply_Serial" name="Apply_Serial" method="post">
          <input name="serial" type="text" id="serial" size="100" class="cajaserial" placeholder="&nbsp;Ingresa tu Serial en esta Casilla..." value="" onFocus="this.value='';this.type='password'"/><br /><br />
          <input type="button" class="btnbtn" value="Aplicar Serial de Licencia" onclick="document.Apply_Serial.submit();" />
        </form></td>
        </tr>
      <tr>
        <td height="20%" colspan="3" valign="bottom">
        <?php
if(isset($_POST['serial']))
{
			$Serial = $_POST["serial"];
			$Server = str_replace(array("http://","www."), "", $_SERVER["SERVER_NAME"]);
			$File = @fopen("engine/licencia/[{$Server}].lic", "w");
			@fwrite($File, $Serial);
			@fclose($File);
?>
			<script language="javascript" type="text/javascript">
			setTimeout("count()", 5000);
            </script>
			<blockquote class="success">
            <br />
			Licencia Aplicada espera <span id="time">5</span> segundo(s).<br />
			Para ser Redireccionado a la P&aacute;gina Principal.
            <br /><br />
			</blockquote>
<?php } ?>
        <span style="padding:10px; font-size:11px; float:left">MuCore <? echo crypt_it($engine,'','1');?> </span><span style="padding:10px; font-size:11px; float:right"></span></td>
        </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
<?
?>