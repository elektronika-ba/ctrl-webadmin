<?php /* Smarty version Smarty-3.1.19, created on 2015-01-16 17:10:47
         compiled from ".\templates\login.html" */ ?>
<?php /*%%SmartyHeaderCode:2657954b94617134626-25360261%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b0475a0e16d2c435a2455e49d54a80cd4549bc7b' => 
    array (
      0 => '.\\templates\\login.html',
      1 => 1413573626,
      2 => 'file',
    ),
    'f7170b6fee07875a4ed5d0e48511d7ac470a2989' => 
    array (
      0 => '.\\templates\\blank.html',
      1 => 1412261859,
      2 => 'file',
    ),
    'd158735f3f4c95f0ef94183f8f23d483d0b5505a' => 
    array (
      0 => '.\\templates\\design.html',
      1 => 1421428021,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2657954b94617134626-25360261',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_54b9461758dba6_56496870',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54b9461758dba6_56496870')) {function content_54b9461758dba6_56496870($_smarty_tpl) {?>
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
    <link href="css/bs-callout.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Subpage CSSs -->
    

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="//oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="//oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    
<div class="container">
    
<div class="row" id="login-panel-header">
  <div class="col-md-12">
    <h1>Sign in to your CTRL account.</h1>
    <h2><em>All your Base are belong to <strong>you</strong>.</em></h2>
  </div>
</div>
<div class="row" id="login-panel">
  <div class="col-md-4 col-md-offset-4">
    <div id="login-panel-bg">
      <form role="form" action="index.php" method="post">
        <input type="hidden" name="w" value="account">
        <input type="hidden" name="s" value="login">
        <input type="hidden" name="x" value="1">
        <div class="form-group">
          <input class="form-control" placeholder="E-mail" name="email" type="email" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['post']->value['email'], ENT_QUOTES, 'UTF-8', true);?>
" autofocus>
        </div>
        <div class="form-group">
          <input class="form-control" placeholder="Password" name="password" type="password">
        </div>
        <!--
        <div class="form-group">
          <div class="checkbox">
            <label>
            <input name="remember" type="checkbox" value="1" <?php if ($_smarty_tpl->tpl_vars['post']->value['remember']=="1") {?>checked<?php }?>>Remember Me
            </label>
          </div>
        </div>
        -->
        <button class="btn btn-lg btn-success btn-block">
        <i class="fa fa-sign-in"></i>&nbsp;Sign In
        </button>

        <?php if ($_smarty_tpl->tpl_vars['error']->value!='') {?>
        <p class="error-box">
          <?php if ($_smarty_tpl->tpl_vars['error']->value=="email_error") {?>
          <strong>That's not a valid E-mail address!</strong><br />
          <?php }?>
          <?php if ($_smarty_tpl->tpl_vars['error']->value=="wrong_password") {?>
          <strong>Wrong email or password!</strong><br />
          Have you <a href="?w=account&s=recover&email=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['post']->value['email'], ENT_QUOTES, 'UTF-8', true);?>
">forgotten your password?</a>
          <?php }?>
          <?php if ($_smarty_tpl->tpl_vars['error']->value=="inactive") {?>
          <strong>Account is inactive!</strong><br />
          Click to re-send <a href="?w=account&s=resend&email=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['post']->value['email'], ENT_QUOTES, 'UTF-8', true);?>
">activation e-mail!</a>
          <?php }?>
        </p>
        <?php }?>

      </form>
    </div>
  </div>
</div>
<div class="row" id="login-panel-footer">
  <div class="col-md-4 col-md-offset-4">
    <p>
      Don't have an account yet? <a href="?w=account&s=register" class="popme" data-toggle="popover" data-placement="bottom" data-content="It's free :-)" data-trigger="manual">Register here.</a>
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
    
<script type="text/javascript">
  $(function () {
  	setTimeout(function() {
			$(".popme").popover();
			$(".popme").popover('show');
  	}, 850);
  });
</script>


  </body>
</html>
<?php }} ?>
