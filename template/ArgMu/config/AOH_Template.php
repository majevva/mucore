<?
$config_template = simplexml_load_file('template/'.$core['config']['template'].'/config/Config_Template.xml');


$Sdaaq1 = $core_db->Execute("SELECT count(*) FROM Guild");	 
$guild= $Sdaaq1->fields[0];
//
$Sdaaq2 = $core_db->Execute("SELECT count(*) FROM Character");	 
$charac = $Sdaaq2->fields[0];
//
$Sdaaq3 = $core_db2->Execute("SELECT count(*) FROM MEMB_INFO");	 
$cues= $Sdaaq3->fields[0];
//
$bannedchar = $core_db->Execute("SELECT count(*) FROM Character WHERE CtlCode='1'");
$bannchar = $bannedchar->fields[0];

define ( 'foro' , $config_template->Foro ); //URL DEL FORO
define ( 'register' , $config_template->Registro );  //URL DE REGISTER EN EL FORO
define ( 'cliente' , $config_template->Descargas );  //URL DE CLIENTE
define ( 'parche' , $config_template->Descargas );  //URL DE PARCHE
define ( 'utilidades' , $config_template->Descargas ); //URL DE UTILIDADES

define("Show_Slider", $config_template->Show_Slider); // (False / TRUE) -- Slider Show
define("Show_FB", $config_template->Show_FB); // (False / TRUE) -- FB Show
define("Show_CS", $config_template->Show_CS); // (False / TRUE) -- Ganador de CastleSiege

////////////////////////////////////////////////////////////////////////////////
//////////////////////////////REDES SOCIALES////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
define ( 'YT' , $config_template->YouTube ); //URL EN YOUTUBE
define ( 'FB' , $config_template->Facebook ); //URL DE FACEBOOK
define ( 'TW' , $config_template->Twitter ); //URL DE TWITTER
?>	