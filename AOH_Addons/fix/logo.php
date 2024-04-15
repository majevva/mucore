<?
require_once("logoGuild.class.php");
$logo = new guildLogo();
$logo->Load($_GET["decode"]);

if (empty($_GET["decode"]))
{
	echo("No se puede generar el logo :v");
}
?>