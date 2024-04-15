<?
include('config.SQL.php');

######################################################################

/*-------------------------------------------------*\
| MUCore Admin Control Panel:                       |
|                                                   |
|  $core['admin_username'] : Administrator user     |
|  $core['admin_password'] : Administrator password |
\*-------------------------------------------------*/

include('config.AdmCP.php');

#####################################################


/*-----------------------------------------------------*\
| MUCore's MUCoins SQL Table Settings:                  |
|                                                       |
|  MU_COINS_TABLE : MUCoins table name                  |
|  MU_COINS_COLUMN : MUCoins (Credits) column name      |
|  MU_COINS_USERID_COLUMN : MUCoins User ID column name |
\*-----------------------------------------------------*/

define('MU_COINS_TABLE','memb_info');

define('MU_COINS_COLUMN','Credits');

define('MU_COINS_USERID_COLUMN','memb___id');

#########################################################




/*--------------------------------------*\
| MUCore Debug Settings:                 |
|                                        |
|  1 : Debug enabled                     |
|  0 : Debug disabled                    |
|                                        |
| Note: Enable debug only if necessary.  |
\*--------------------------------------*/

$core['debug'] = 0;

##########################################
?>