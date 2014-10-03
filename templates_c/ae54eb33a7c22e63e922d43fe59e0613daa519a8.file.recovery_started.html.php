<?php /* Smarty version Smarty-3.1.19, created on 2014-10-03 13:43:35
         compiled from ".\templates\recovery_started.html" */ ?>
<?php /*%%SmartyHeaderCode:12801542ea763a860e7-90107784%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ae54eb33a7c22e63e922d43fe59e0613daa519a8' => 
    array (
      0 => '.\\templates\\recovery_started.html',
      1 => 1412343667,
      2 => 'file',
    ),
    'a0d3cafd25cf891f40948ae47d92c66d123cc422' => 
    array (
      0 => '.\\templates\\blank.html',
      1 => 1412250099,
      2 => 'file',
    ),
    '94942b38de2598eb5520d42b9aca2d4e4198ad42' => 
    array (
      0 => '.\\templates\\design.html',
      1 => 1412318618,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12801542ea763a860e7-90107784',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_542ea763c669f2_86790539',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_542ea763c669f2_86790539')) {function content_542ea763c669f2_86790539($_smarty_tpl) {?>
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
