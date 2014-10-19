<?php /* Smarty version Smarty-3.1.19, created on 2014-10-19 10:43:51
         compiled from ".\templates\recovery_started.html" */ ?>
<?php /*%%SmartyHeaderCode:29516544395e708e6f3-42263737%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0f1aec5a98bb2239e6f80ca6b3f6f9d71f8a1936' => 
    array (
      0 => '.\\templates\\recovery_started.html',
      1 => 1412349558,
      2 => 'file',
    ),
    '0632f914aebe3c9a8bb3e416a9ad1dec398d53ba' => 
    array (
      0 => '.\\templates\\blank.html',
      1 => 1412261859,
      2 => 'file',
    ),
    '4d72c64a6d937f61dd493697d2ab1894beb263a3' => 
    array (
      0 => '.\\templates\\design.html',
      1 => 1412350409,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '29516544395e708e6f3-42263737',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_544395e7349be1_03465506',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_544395e7349be1_03465506')) {function content_544395e7349be1_03465506($_smarty_tpl) {?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Muris Pucic Trax">
    <title>Ctrl.ba - Admin Panel</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/sb-admin-2.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Subpage CSSs -->
    

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    
<div class="container">
    
<div class="row" id="login-panel-header">
  <div class="col-md-12">
    <h1>Password recovery process has been initiated.</h1>
    <h2>Check your E-mail <strong><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['email']->value, ENT_QUOTES, 'UTF-8', true);?>
</strong> and follow instructions!</h2>
  </div>
</div>
<div class="row" id="login-panel-footer">
  <div class="col-md-4 col-md-offset-4">
    <p>
      Go to <a href="?w=account&s=login&email=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['email']->value, ENT_QUOTES, 'UTF-8', true);?>
">Sign In</a> page.
    </p>
  </div>
</div>

</div>


    <!-- jQuery Version 1.11.0 -->
    <script src="js/jquery-1.11.0.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="js/plugins/metisMenu/metisMenu.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.js"></script>

    <!-- Subpage Javascripts -->
    

  </body>
</html>
<?php }} ?>
