<?
#Versiones del servidor
$Versiones_Servidores = array(
	0 => array('Titans Tech','TT'),
	1 => array('MUEMU S4 - S6 - S8','MUEMU'),
	2 => array('IGCN - MUEMU S9','IGCN'),
	3 => array('IGCN - MUEMU S12','IGCN12'),
);
#Player Kill Status variables
$pk_status_variables = array(
	1 => 'Hero Level 2', 
	2 => 'Hero Level 1', 
	3 => 'Normal',
	4 => 'PK Level 1',
	5 => 'PK Level 2',
	6 => 'Murder Level'
	
);


#Downloads Categories variables
$downloads_cat = array(
    1 => 'Descargas de Clientes',
    2 => 'Descargas adicionales (opcionales)',
    3 => 'Paquetes redistributables y librerias'
    
);
    
    
#Character Mode Variables
$characters_ctlcode = array(
    0 => 'Normal',
    1 => 'Bloqueado',
    16 => 'Game Master',
    32 => 'Game Master ADM',
    8 => 'Game Master Invisibile'
    
);

#Account Mode Variables
$account_mode = array(
    0 => 'Normal',
    1 => 'Bloqueado',
    
);

#Maps codes variables
$maps_codes = array(
	0 => 'Lorencia',
	1 => 'Dungeon',
	2 => 'Devias',
	3 => 'Noria',
	4 => 'Losttower',
	5 => 'Exile',
	6 => 'Stadium/Arena',
	7 => 'Atlans',
	8 => 'Tarkan',
	10 => 'Icarus',
	11 => 'Blood Castle 1',
	12 => 'Blood Castle 2',
	13 => 'Blood Castle 3',
	14 => 'Blood Castle 4',
	15 => 'Blood Castle 5',
	16 => 'Blood Castle 6',
	17 => 'Blood Castle 7',
	18 => 'Chaos Castle',
	19 => 'Chaos Castle',
	20 => 'Chaos Castle',
	21 => 'Chaos Castle',
	22 => 'Chaos Castle',
	23 => 'Chaos Castle',
	24 => 'Kalima 1',
	25 => 'Kalima 2',
	26 => 'Kalima 3',
	27 => 'Kalima 4',
	28 => 'Kalima 5',
	29 => 'Kalima 6',
	36 => 'Lost Kalima',
	31 => 'Lands Of Trials',
	33 => 'Aida',
	34 => 'Crywolf',
	37 => 'Kantru',
	45 => 'Illusion Temple 1',
	46 => 'Illusion Temple 2',
	47 => 'Illusion Temple 3',
	48 => 'Illusion Temple 4',
	49 => 'Illusion Temple 5',
	50 => 'Illusion Temple 6',
	41 => 'Barracks Of Balgass',
	42 => 'Refuge Balgass',
	40 => 'Silent Map',
	51 => 'Elbeland',

);



#Secret Questions
$secret_questions = array(
   1 => 'What is your mother\'s maiden name?',
   2 => 'What was the name of your first school?',
   3 => 'Who is your favorite super hero?',
   4 => 'What is the name of your first pet?',
   5 => 'What was your favorite place to visit as a child?',
   6 => 'Who is your favorite cartoon character?',
   7 => 'What was the first video game you played?',
   8 => 'What was the name of your first teacher?',
   9 => 'What was your favorite TV show as a child?',
   10 => 'What city was your mother born in?',

);



#Contact Us Subjects
$contact_subjects = array(
   1 => 'Fallas De Juego',
   2 => 'Fallas Web',
   3 => 'Problema Con La Web',
   4 => 'Problema Al Registrarse',
   
);

###########################################################################################
################# VARIABLES SEGUN LA VERSION DE SERVERFILES ###############################
###########################################################################################

if (@$core['config']['versionserver']=='MUEMU') {
#Class Characters y nombre de imagen
$characters_class = array (
0=> array('Dark Wizard','wiz.gif'),
1=> array('Soul Master','wiz.gif'),
2=> array('Gran Master','gm.gif'),
16=> array('Dark Knight','dk.gif'),
17=> array('Blade Knight','dk.gif'),
18=> array('Blade Master','bm.gif'),
32=> array('Elf','elf.gif'),
33=> array('Muse Elf','elf.gif'),
34=> array('Hight Elfa','hi.gif'),
48=> array('Magic Gladiator','mg.gif'),
50=> array('Duel Master','dm.gif'),
64=> array('Dark Lord','dl.gif'),
66=> array('Lord Emperador','le.gif'),
80=> array('Summoner','sm.gif'),
81=> array('Bloddy Summoner','sm.gif'),
82=> array('Dimension Master','su.gif'),
96=> array('Rage Fighter','rf.gif'),
98=> array('Fist Master','fm.gif'),
);

//Variables Master
define('AOH_Master_Table','MasterSkillTree');
define('AOH_Master_Name_Column','Name');
define('AOH_Master_Level_Column','MasterLevel');
define('AOH_Master_Points_Column','MasterPoint');
define('AOH_Master_Skill_Column','MasterSkill');

//Variables Duelos
define('AOH_Duelo_Table','RankingDuel');
define('AOH_Duelo_Name_Column','Name');
define('AOH_Duelo_Win_Column','WinScore');
define('AOH_Duelo_Lose_Column','LoseScore');

//Variables Gens Rank
define('AOH_Gens_Table','Gens_Rank');
define('AOH_Gens_Name_Column','Name');
define('AOH_Gens_Family_Column','Family');
define('AOH_Gens_Contribution_Column','Contribution');

//Variables Reset
define('AOH_Resets_column','ResetCount');

//Variables CashShop
define('AOH_CashShop_Table','CashShopData');
define('AOH_CashShop_Account_column','AccountID');
define('AOH_CashShop_WCoinC_column','WCoinC');
define('AOH_CashShop_WCoinP_column','WCoinP');
define('AOH_CashShop_GoblinPoint_column','GoblinPoint');

//Variables VIP
define('AOH_VIP_Table','MEMB_INFO');
define('AOH_VIP_column','AccountLevel');
define('AOH_VIP_user','memb___id');
define('AOH_VIP_inicio','InicioVIP');
define('AOH_VIP_fin','FinVIP');
define('AOH_VIP_Date','VipDate');
define('AOH_VIP_Infinito','VipINF');

}elseif (@$core['config']['versionserver']=='TT') {
#Class Characters y nombre de imagen
$characters_class = array (
0=> array('Dark Wizard','wiz.gif'),
1=> array('Soul Master','wiz.gif'),
2=> array('Gran Master','gm.gif'),
16=> array('Dark Knight','dk.gif'),
17=> array('Blade Knight','dk.gif'),
18=> array('Blade Master','bm.gif'),
32=> array('Elf','elf.gif'),
33=> array('Muse Elf','elf.gif'),
34=> array('Hight Elfa','hi.gif'),
48=> array('Magic Gladiator','mg.gif'),
49=> array('Duel Master','dm.gif'),
64=> array('Dark Lord','dl.gif'),
65=> array('Lord Emperador','le.gif'),
80=> array('Summoner','sm.gif'),
81=> array('Bloddy Summoner','sm.gif'),
82=> array('Dimension Master','su.gif'),
96=> array('Rage Fighter','rf.gif'),
97=> array('First Master','fm.gif'),
);
//Variables Master
define('AOH_Master_Table','Character');
define('AOH_Master_Name_Column','Name');
define('AOH_Master_Level_Column','SCFMasterLevel');
define('AOH_Master_Points_Column','SCFMasterPoints');
define('AOH_Master_Skill_Column','SCFMasterSkills');

//Variables Duelos
define('AOH_Duelo_Table','DUEL_INFO');
define('AOH_Duelo_Name_Column','Name');
define('AOH_Duelo_Win_Column','Win');
define('AOH_Duelo_Lose_Column','Lost');

//Variables Gens Rank
define('AOH_Gens_Table','Character');
define('AOH_Gens_Name_Column','Name');
define('AOH_Gens_Family_Column','SCFGensFamily');
define('AOH_Gens_Contribution_Column','SCFGensContribution');

//Variables Reset
define('AOH_Resets_column','Resets');

//Variables CashShop
define('AOH_CashShop_Table','MEMB_INFO');
define('AOH_CashShop_Account_column','memb___id');
define('AOH_CashShop_WCoinC_column','WCoin');
define('AOH_CashShop_WCoinP_column','WCoinP');
define('AOH_CashShop_GoblinPoint_column','GoblinCoin');

//Variables VIP
define('AOH_VIP_Table','MEMB_INFO');
define('AOH_VIP_column','Vip');
define('AOH_VIP_user','memb___id');
define('AOH_VIP_inicio','InicioVIP');
define('AOH_VIP_fin','FinVIP');
define('AOH_VIP_Date','VipDate');
define('AOH_VIP_Infinito','VipINF');

}elseif (@$core['config']['versionserver']=='IGCN') {
#Class Characters y nombre de imagen
$characters_class = array (
0=> array('Dark Wizard','wiz.gif'),
1=> array('Soul Master','wiz.gif'),
2=> array('Gran Master','gm.gif'),
16=> array('Dark Knight','dk.gif'),
17=> array('Blade Knight','dk.gif'),
18=> array('Blade Master','bm.gif'),
32=> array('Elf','elf.gif'),
33=> array('Muse Elf','elf.gif'),
34=> array('Hight Elfa','hi.gif'),
48=> array('Magic Gladiator','mg.gif'),
50=> array('Duel Master','dm.gif'),
64=> array('Dark Lord','dl.gif'),
66=> array('Lord Emperador','le.gif'),
80=> array('Summoner','sm.gif'),
81=> array('Bloddy Summoner','sm.gif'),
82=> array('Dimension Master','su.gif'),
96=> array('Rage Fighter','rf.gif'),
98=> array('Fist Master','fm.gif'),
);
//Variables Master
define('AOH_Master_Table','Character');
define('AOH_Master_Name_Column','Name');
define('AOH_Master_Level_Column','mLevel');
define('AOH_Master_Points_Column','mlPoint');
define('AOH_Master_Skill_Column','mlExperience');

//Variables Duelos
define('AOH_Duelo_Table','Character');
define('AOH_Duelo_Name_Column','Name');
define('AOH_Duelo_Win_Column','WinDuels');
define('AOH_Duelo_Lose_Column','LoseDuels');

//Variables Gens Rank
define('AOH_Gens_Table','IGC_Gens');
define('AOH_Gens_Name_Column','Name');
define('AOH_Gens_Family_Column','Influence');
define('AOH_Gens_Contribution_Column','Points');

//Variables Reset
define('AOH_Resets_column','Resets');

//Variables CashShop
define('AOH_CashShop_Table','CashShopData');
define('AOH_CashShop_Account_column','AccountID');
define('AOH_CashShop_WCoinC_column','WCoinC');
define('AOH_CashShop_WCoinP_column','WCoinP');
define('AOH_CashShop_GoblinPoint_column','GoblinPoint');

//Variables VIP
define('AOH_VIP_Table','MEMB_INFO');
define('AOH_VIP_column','Vip');
define('AOH_VIP_user','memb___id');
define('AOH_VIP_inicio','InicioVIP');
define('AOH_VIP_fin','FinVIP');
define('AOH_VIP_Date','VipDate');
define('AOH_VIP_Infinito','VipINF');

}elseif (@$core['config']['versionserver']=='IGCN12') {
#Class Characters y nombre de imagen
$characters_class = array (
0=> array('Dark Wizard','wiz.gif'),
1=> array('Soul Master','wiz.gif'),
2=> array('Gran Master','gm.gif'),
16=> array('Dark Knight','dk.gif'),
17=> array('Blade Knight','dk.gif'),
18=> array('Blade Master','bm.gif'),
32=> array('Elf','elf.gif'),
33=> array('Muse Elf','elf.gif'),
34=> array('Hight Elfa','hi.gif'),
48=> array('Magic Gladiator','mg.gif'),
50=> array('Duel Master','dm.gif'),
64=> array('Dark Lord','dl.gif'),
66=> array('Lord Emperador','le.gif'),
80=> array('Summoner','sm.gif'),
81=> array('Bloddy Summoner','sm.gif'),
82=> array('Dimension Master','su.gif'),
96=> array('Rage Fighter','rf.gif'),
98=> array('Fist Master','fm.gif'),
112=> array('Grow Lancer','gl.gif'),
114=> array('Mirage Lancer','gl.gif'),
);
//Variables Master
define('AOH_Master_Table','Character');
define('AOH_Master_Name_Column','Name');
define('AOH_Master_Level_Column','mLevel');
define('AOH_Master_Points_Column','mlPoint');
define('AOH_Master_Skill_Column','mlExperience');

//Variables Duelos
define('AOH_Duelo_Table','Character');
define('AOH_Duelo_Name_Column','Name');
define('AOH_Duelo_Win_Column','WinDuels');
define('AOH_Duelo_Lose_Column','LoseDuels');

//Variables Gens Rank
define('AOH_Gens_Table','IGC_Gens');
define('AOH_Gens_Name_Column','Name');
define('AOH_Gens_Family_Column','Influence');
define('AOH_Gens_Contribution_Column','Points');

//Variables Reset
define('AOH_Resets_column','Resets');

//Variables CashShop
define('AOH_CashShop_Table','CashShopData');
define('AOH_CashShop_Account_column','AccountID');
define('AOH_CashShop_WCoinC_column','WCoinC');
define('AOH_CashShop_WCoinP_column','WCoinP');
define('AOH_CashShop_GoblinPoint_column','GoblinPoint');

//Variables VIP
define('AOH_VIP_Table','MEMB_INFO');
define('AOH_VIP_column','Vip');
define('AOH_VIP_user','memb___id');
define('AOH_VIP_inicio','InicioVIP');
define('AOH_VIP_fin','FinVIP');
define('AOH_VIP_Date','VipDate');
define('AOH_VIP_Infinito','VipINF');

}

?>