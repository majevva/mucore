<?
//require("engine/securelogin.class.php");
$user_auth = new securelogin;
$user_auth->clearlogin();
unset($_SESSION['user_auth']);
unset($_SESSION['user_auth_id']);
header('Location: '.ROOT_INDEX.'');
exit;
?>