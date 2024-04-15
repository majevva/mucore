<?php
session_start();
ob_start();
require('../config.php');
require('../engine/custom_variables.php');
require('../engine/global_functions.php');
require('script/licencia_functions.php');
require('../engine/global_config.php');
require('../engine/global_cms.php');
require("../engine/adodb/adodb.inc.php");
if ($core['debug'] == '1') {
    ini_set('display_errors', 'On');
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
} else {
    ini_set('display_errors', 'Off');
    error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_WARNING);
}
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
if ($_GET['get'] == 'logout') {
    session_destroy();
    //header('Location: index.php');
    echo '<script type="text/javascript">
top.location.href = "index.php";
</script>';
    exit;
}
/** Almacenamos En Variables Los Datos Ingresados En El Formulario * */
if ($_POST['enviado'] == 1) {
    $_SESSION['admin_id'] = md5(safe_input($_POST['usuario'], ''));
    $_SESSION['admin_pw'] = md5(safe_input($_POST['clave'], ''));
}

$admin_username = $_SESSION['admin_id'];
$admin_passsword = $_SESSION['admin_pw'];

/* INCLUDE HEADER */
$AOHCP_Header="<!-- Tell the browser to be responsive to screen width -->
  <meta content=\"width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no\" name=\"viewport\">
  <link rel=\"stylesheet\" href=\"styles/aohost/bootstrap/css/bootstrap.css\">
  <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css\">
  <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css\">
  <link rel=\"stylesheet\" href=\"styles/aohost/dist/css/AdminLTE.css\">
  <link rel=\"stylesheet\" href=\"styles/aohost/dist/css/skins/_all-skins.min.css\">
  <link rel=\"stylesheet\" href=\"styles/aohost/plugins/iCheck/flat/blue.css\">
  <link rel=\"stylesheet\" href=\"styles/aohost/plugins/morris/morris.css\">
  <link rel=\"stylesheet\" href=\"styles/aohost/plugins/jvectormap/jquery-jvectormap-1.2.2.css\">
  <link rel=\"stylesheet\" href=\"styles/aohost/plugins/datepicker/datepicker3.css\">
  <link rel=\"stylesheet\" href=\"styles/aohost/plugins/daterangepicker/daterangepicker.css\">
  <link rel=\"stylesheet\" href=\"styles/aohost/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css\">
  <!--[if lt IE 9]>
  <script src=\"https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js\"></script>
  <script src=\"https://oss.maxcdn.com/respond/1.4.2/respond.min.js\"></script>
  <![endif]-->";

/* INCLUDE FOOTER */
$AOHCP_Footer="<script src=\"styles/aohost/plugins/jQuery/jquery-2.2.3.min.js\"></script>
<script src=\"https://code.jquery.com/ui/1.11.4/jquery-ui.min.js\"></script>
<script> $.widget.bridge('uibutton', $.ui.button); </script>
<script src=\"styles/aohost/bootstrap/js/bootstrap.min.js\"></script>
<script src=\"https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js\"></script>
<script src=\"styles/aohost/plugins/morris/morris.min.js\"></script>
<script src=\"styles/aohost/plugins/sparkline/jquery.sparkline.min.js\"></script>
<script src=\"styles/aohost/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js\"></script>
<script src=\"styles/aohost/plugins/jvectormap/jquery-jvectormap-world-mill-en.js\"></script>
<script src=\"styles/aohost/plugins/knob/jquery.knob.js\"></script>
<script src=\"https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js\"></script>
<script src=\"styles/aohost/plugins/daterangepicker/daterangepicker.js\"></script>
<script src=\"styles/aohost/plugins/datepicker/bootstrap-datepicker.js\"></script>
<script src=\"styles/aohost/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js\"></script>
<script src=\"styles/aohost/plugins/slimScroll/jquery.slimscroll.min.js\"></script>
<script src=\"styles/aohost/plugins/fastclick/fastclick.js\"></script>
<script src=\"styles/aohost/dist/js/app.min.js\"></script>
<script src=\"styles/aohost/dist/js/pages/dashboard.js\"></script>
<script src=\"styles/aohost/dist/js/demo.js\"></script>";

if ($admin_username == md5($core['admin_username']) && $admin_passsword == md5($core['admin_password'])) {
    $_SESSION['admin_login_auth'] = '1';
    require('script/global_functions.php');
    include("../engine/connect_core.php");
    require('../engine/core.php');
    /** Nuevo Modulo Para MySQL * */
    ##include("../engine/connect_dfgamez.php");
    $core['version'] = crypt_it($engine,'','1');
if ( $_GET["frame"] == "header" ) { 

echo "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\"
\"http://www.w3.org/TR/html4/loose.dtd\">
 <html>
<head>
<meta http-equiv=\"Content-Type\" content=\"text/html;
 charset=iso-8859-1\">
<link rel=\"stylesheet\" type=\"text/css\" href=\"styles/aohost/panel.css\" />

<title>".$core["config"]["websitetitle"]." - Panel de Control Administrativo</title>
".$AOHCP_Header."
</head>
<body class=\"hold-transition skin-blue sidebar-mini\">";
 include( "modules/header.php" );

 echo "".$AOHCP_Footer."</body></html>";
 } else if ( $_GET["frame"] == "navigation" ) { 

echo "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\"
\"http://www.w3.org/TR/html4/loose.dtd\">
 <html>
<head>
<meta http-equiv=\"Content-Type\" content=\"text/html;
 charset=iso-8859-1\">
<link rel=\"stylesheet\" type=\"text/css\" href=\"styles/aohost/panel.css\" />
<title>".$core["config"]["websitetitle"]." - Panel de Control Administrativo</title>
".$AOHCP_Header."
</head>
<body class=\"hold-transition skin-blue sidebar-mini\">";
 include( "modules/left_side.php" );
 echo "".$AOHCP_Footer."</body></html>";
 } 
 else if ( $_GET["frame"] == "body" || isset( $_GET["get"] ) ) { 

echo "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\"
\"http://www.w3.org/TR/html4/loose.dtd\">
<html>
<head>
<meta http-equiv=\"Content-Type\" content=\"text/html;
 charset=iso-8859-1\">
<link rel=\"stylesheet\" type=\"text/css\" href=\"styles/aohost/panel.css\" />
<script type=\"text/javascript\" src=\"script/global.js\"></script>
<script type=\"text/javascript\" src=\"script/helptip.js\"></script>
";

 echo "
<title>".$core["config"]["websitetitle"]." - Panel de Control Administrativo</title>
".$AOHCP_Header."
</head>

<body class=\"hold-transition skin-blue sidebar-mini\">
<div class=\"wrapper\">
<div class=\"content-wrapper\">
<section class=\"content\">
";
 if ( !isset( $_GET["get"] ) ) { $m_am = "home";
 } else { 
    $m_am = safe_input( $_GET["get"], "_" );
 } 

 if ( is_file( "modules/".$m_am.".php" ) ) { include( "modules/".$m_am.".php" );
 } else { 
    echo "Module ".$m_am.".php could not be found.";
 } 


 echo "
</section>
</div>
<div class=\"chart tab-pane active\" id=\"revenue-chart\" style=\"position: relative; height: 0px;\"></div>
<div class=\"chart tab-pane\" id=\"sales-chart\" style=\"position: relative; height: 0px;\"></div>
<div class=\"chart\" id=\"line-chart\" style=\"height: 0px;\"></div>
<footer class=\"main-footer\">
    <div class=\"pull-right hidden-xs\">
      <b>MuCore </b> ".$core['version']."
    </div>
    <strong>Copyright &copy; 2016-2018 <a target=\"_blank\" href=\"http://aohostperu.com\">AOHOST</a>.</strong> Todos los derechos reservados.
  </footer>
</div>

  ".$AOHCP_Footer."
 </body></html>";

 } else { 

    echo "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\"
\"http://www.w3.org/TR/html4/loose.dtd\">
<html>
<head>
<meta http-equiv=\"Content-Type\" content=\"text/html;
 charset=iso-8859-1\">
<title>".$core["config"]["websitetitle"]." - Panel de Control Administrativo</title></head>

 <frameset rows=\"50,*\"  framespacing=\"0\" border=\"0\" frameborder=\"0\" frameborder=\"no\" border=\"0\">
 <frame src=\"index.php?frame=header\" name=\"header\" scrolling=\"no\" noresize=\"noresize\" frameborder=\"0\" marginwidth=\"10\" marginheight=\"0\" border=\"no\" />
 
 <frameset cols=\"234,*\"  framespacing=\"0\" border=\"0\" frameborder=\"0\" frameborder=\"no\" border=\"0\">

  <frame src=\"index.php?frame=navigation\" name=\"navigation\" scrolling=\"yes\" frameborder=\"0\" marginwidth=\"0\" marginheight=\"0\" border=\"no\" />
  
  <frame src=\"index.php?frame=body\" name=\"body\" scrolling=\"yes\" frameborder=\"0\" marginwidth=\"5\" marginheight=\"5\" border=\"no\" />
  
 </frameset>
 </frameset>

 
 <noframes>
  <body>
   <p>Su navegador no soporta frames. Por favor consiga uno que lo haga! Ejemplo: Google Chrome</p>
  </body>
 </noframes>
 </html>
 ";
 } 
} else {
    ?>
    <!-- Ingres HTML para identificacion del area de administrador -->
    <!DOCTYPE HTML>
    <html>
        <head>
            <meta http-equiv="content-type" content="text/html; charset=utf-8" />
            <meta name="author" content="David" />
            <title><?php echo $core['config']['websitetitle']; ?></title>
            <link type="image-x/icon" href="favicon.ico" rel="shortcut icon" />
            <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="styles/aohost/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="styles/aohost/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="styles/aohost/plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

        </head>
        <body class="hold-transition login-page">
            <div class="login-box">
  <div class="login-logo">
    <a><b>MU</b>Core</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Iniciar Sesion</p>

    <form action="" method="post">
      <div class="form-group has-feedback">
        <input id="usuario" name="usuario" type="text" class="form-control" placeholder="Usuario">
        <span class="fa fa-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input id="clave" name="clave" type="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
        <input type="hidden" name="enviado" value="1" />
          <button type="submit" name="Submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

        <!-- jQuery 2.2.3 -->
<script src="styles/aohost/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="styles/aohost/bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="styles/aohost/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
        </body>
    </html>
    <?php
    exit;
}
ob_end_flush();
?>