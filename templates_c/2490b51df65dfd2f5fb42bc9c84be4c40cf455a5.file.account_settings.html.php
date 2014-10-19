<?php /* Smarty version Smarty-3.1.19, created on 2014-10-19 11:51:36
         compiled from ".\templates\account_settings.html" */ ?>
<?php /*%%SmartyHeaderCode:15843544398345bfe00-89633942%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2490b51df65dfd2f5fb42bc9c84be4c40cf455a5' => 
    array (
      0 => '.\\templates\\account_settings.html',
      1 => 1413719490,
      2 => 'file',
    ),
    '2a635fa6116a658e691859a59a54961509ad3229' => 
    array (
      0 => '.\\templates\\framework.html',
      1 => 1412522873,
      2 => 'file',
    ),
    '4d72c64a6d937f61dd493697d2ab1894beb263a3' => 
    array (
      0 => '.\\templates\\design.html',
      1 => 1412350409,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15843544398345bfe00-89633942',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_544398349157f4_74539838',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_544398349157f4_74539838')) {function content_544398349157f4_74539838($_smarty_tpl) {?>
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

    
<div id="wrapper">
  <!-- Navigation -->
  <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand frobo fw300" href="index.php">
      <img src="images/alien_24.png" border="0" style="opacity: 0.7; filter: alpha(opacity=70);">&nbsp;<span class="fw400">Ctrl.ba</span>&nbsp;-&nbsp;Admin Panel&nbsp;<i class="fa fa-cloud fa-fw"></i></a>
    </div>
    <!-- /.navbar-header -->
    <ul class="nav navbar-top-links navbar-right">
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
        <i class="fa fa-user fa-fw"></i><i class="fa fa-caret-down"></i>
        </a>
        <ul class="dropdown-menu dropdown-user">
          <li><a href="?w=account&s=settings"><i class="fa fa-gear fa-fw"></i>&nbsp;Settings</a>
          </li>
          <li class="divider"></li>
          <li><a href="?w=account&s=logout"><i class="fa fa-sign-out fa-fw"></i>&nbsp;Logout</a>
          </li>
        </ul>
        <!-- /.dropdown-user -->
      </li>
      <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->
    <div class="navbar-default sidebar" role="navigation">
      <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
          <li>
            <a <?php if ($_smarty_tpl->tpl_vars['page_id']->value=="dashboard") {?>class="active"<?php }?> href="index.php"><i class="fa fa-dashboard fa-fw"></i>&nbsp;Dashboard</a>
          </li>
          <li>
            <a <?php if ($_smarty_tpl->tpl_vars['page_id']->value=="base") {?>class="active"<?php }?> href="?w=base"><i class="fa fa-cubes fa-fw"></i>&nbsp;Bases<!--<span class="badge pull-right alert-success">1</span>--></a>
          </li>
          <li>
            <a <?php if ($_smarty_tpl->tpl_vars['page_id']->value=="client") {?>class="active"<?php }?> href="?w=client"><i class="fa fa-users fa-fw"></i>&nbsp;Clients<!--<span class="badge pull-right alert-danger">0</span>--></a>
          </li>
          <li>
            <a href="#"><i class="fa fa-flask fa-fw"></i>&nbsp;Apps<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
              <li>
                <a href="http://app.ctrl.ba/api" target="_blank">REST API Access</a>
              </li>
              <li>
                <a href="http://app.ctrl.ba/android" target="_blank">Android Client</a>
              </li>
            </ul>
            <!-- /.nav-second-level -->
          </li>
          <li>
            <a href="?w=help"><i class="fa fa-question fa-fw"></i>&nbsp;Help</a>
          </li>
          <li>
            <a href="http://forum.ctrl.ba"><i class="fa fa-support fa-fw"></i>&nbsp;Forum</a>
          </li>
        </ul>
      </div>
      <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
  </nav>

  <div id="page-wrapper">
    
<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header frobo fw300">Account Settings</h1>
  </div>
  <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<?php if (isset($_smarty_tpl->tpl_vars['notifs']->value['password_changed'])) {?>
<div class="row">
  <div class="col-lg-12">
    <div class="alert alert-info alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      Password changed!
    </div>
  </div>
</div>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['error']->value=="wrong_password") {?>
<div class="row">
  <div class="col-lg-12">
    <div class="alert alert-danger alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      Wrong current password!
    </div>
  </div>
</div>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['error']->value=="new_password_missing") {?>
<div class="row">
  <div class="col-lg-12">
    <div class="alert alert-danger alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      In order to change your current password you must supply new password that is minimum 6 characters long.
    </div>
  </div>
</div>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['error']->value=="new_password_mismatch") {?>
<div class="row">
  <div class="col-lg-12">
    <div class="alert alert-danger alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      Your new password and re-typed password do not match! Try again.
    </div>
  </div>
</div>
<?php }?>
<div class="row">
  <div class="col-lg-12">
    <form class="form-horizontal" role="form" method="post" action="index.php">
    <input type="hidden" name="w" value="account">
    <input type="hidden" name="s" value="settings">
    <input type="hidden" name="x" value="1">

      <div class="form-group">
        <label for="email" class="col-sm-2 control-label">E-mail:</label>
        <div class="col-sm-4">
          <input type="text" class="form-control" id="email" name="email" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['email'];?>
" readonly="readonly">
        </div>
      </div>

      <div class="form-group">
        <label for="password" class="col-sm-2 control-label">Current Password:</label>
        <div class="col-sm-4">
          <input type="password" class="form-control" id="password" name="password" placeholder="Type current password to change it">
        </div>
      </div>

      <div class="form-group">
        <label for="new_password" class="col-sm-2 control-label">New Password:</label>
        <div class="col-sm-4">
          <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Choose new password to change the current">
        </div>
      </div>

      <div class="form-group">
        <label for="new_password_again" class="col-sm-2 control-label">Re-type New Password:</label>
        <div class="col-sm-4">
          <input type="password" class="form-control" id="new_password_again" name="new_password_again" placeholder="Re-type new password to change the current">
        </div>
      </div>

      <div class="form-group">
        <div class="col-lg-12">
          <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-save"></span>&nbsp;Save Changes</button>
			  </div>
      </div>

    </form>
  </div>
</div>
<!-- /.row -->

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
