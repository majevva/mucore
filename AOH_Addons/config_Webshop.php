<?
$load_webshop_config = simplexml_load_file('engine/config_mods/aoh_Webshop.xml');
$load_webshop_config2 = simplexml_load_file('engine/config_mods/mu_coins_settings.xml');
//CONFIGURACIONES WEBSHOP-WAREHOUSE-INVENTORY
$socket_SCFMT_enable = "1";

$mvcore['shop_new_date'] = "1436266374";
$mvcore['sockets_parts'] = $load_webshop_config->sockets_parts; // sockets armas y sets
$mvcore['socket_type'] = $load_webshop_config->socket_type; // scfmt - webzen
$mvcore['cost_cred_to_zen'] = "250";
$mvcore['gold_dif'] = "50";
$mvcore['eqe_sockets'] = $load_webshop_config->eqe_sockets; // permitir mismos sockets

$mvcore['cost_level'] = "25";
$mvcore['cost_opt'] = "48";
$mvcore['cost_luck'] = "500";
$mvcore['cost_skill'] = "240";
$mvcore['cost_ref'] = "300";
$mvcore['cost_exe'] = "100";
$mvcore['cost_anc1'] = "1000";
$mvcore['cost_anc2'] = "1200";
$mvcore['cost_fenblack'] = "1600";
$mvcore['cost_fenblue'] = "2000";
$mvcore['cost_fengold'] = "3000";

$mvcore['wshop_load'] = $load_webshop_config->active; // activar o desactivar webshop

$mvcore['credits_table'] = $load_webshop_config2->credits_table;
$mvcore['credits2_table'] = $load_webshop_config2->credits2_table;
$mvcore['credits_column'] = $load_webshop_config2->credits_column;
$mvcore['credits2_column'] = $load_webshop_config2->credits2_column;
$mvcore['user_column'] = $load_webshop_config2->user_column;
$mvcore['user2_column'] = $load_webshop_config2->user2_column;
$mvcore['money_name1'] = $load_webshop_config2->money_name1;
$mvcore['money_name2'] = $load_webshop_config2->money_name2;

$mvcore['shop_disc_start'] = "1";
$mvcore['shop_disc'] = $load_webshop_config->shop_disc; //activar descuento
$mvcore['shop_perc'] = $load_webshop_config->shop_perc; //porcentaje de descuento

$shop_page0 = "1";
$shop_page1 = "1";
$shop_page2 = "1";
$shop_page3 = "1";
$shop_page4 = "1";
$shop_page5 = "1";
$shop_page6 = "1";
$shop_page7 = "1";
$shop_page8 = "1";
$shop_page9 = "1";
$shop_page10 = "1";
$shop_page11 = "1";
$shop_page12 = "1";
$shop_page13 = "1";
$shop_page14 = "1";
$shop_page15 = "1";

$market_page0 = "1";
$market_page1 = "1";
$market_page2 = "1";
$market_page3 = "1";
$market_page4 = "1";
$market_page5 = "1";
$market_page6 = "1";
$market_page7 = "1";
$market_page8 = "1";
$market_page9 = "1";
$market_page10 = "1";
$market_page11 = "1";
$market_page12 = "1";
$market_page13 = "1";
$market_page14 = "1";
$market_page15 = "1";

?>