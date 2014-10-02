<?php /* Smarty version Smarty-3.1.19, created on 2014-10-02 16:35:12
         compiled from ".\templates\login.html" */ ?>
<?php /*%%SmartyHeaderCode:8918542d6b3fb52c79-26208017%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '901b2fddb9b0dcf12569bdc91c7b4e6ab062cb75' => 
    array (
      0 => '.\\templates\\login.html',
      1 => 1412267655,
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
      1 => 1412261859,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8918542d6b3fb52c79-26208017',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_542d6b4001c770_63324397',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_542d6b4001c770_63324397')) {function content_542d6b4001c770_63324397($_smarty_tpl) {?>

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
        <h1>Sign in to your CTRL account.</h1>
        <h2><em>All your Base are belong to <strong>you</strong>.</em></h2>
    </div>
</div>

<div class="row" id="login-panel">
    <div class="col-md-4 col-md-offset-4">

        <div id="login-panel-bg">
            <form role="form" action="index.php" method="post">
				<input type="hidden" name="w" value="login">
				<input type="hidden" name="s" value="1">

                <div class="form-group">
                    <input class="form-control" placeholder="E-mail" name="email" type="email" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['post']->value['email'], ENT_QUOTES, 'UTF-8', true);?>
" autofocus>
                </div>

                <div class="form-group">
                    <input class="form-control" placeholder="Password" name="password" type="password">
                </div>

				<div class="form-group">
					<div class="checkbox">
						<label>
							<input name="remember" type="checkbox" value="1" <?php if ($_smarty_tpl->tpl_vars['post']->value['remember']=="1") {?>checked<?php }?>>Remember Me
						</label>
					</div>
				</div>

                <button class="btn btn-lg btn-success btn-block">
                    <i class="fa fa-sign-in"></i>&nbsp;Sign In
                </button>

				<?php if ($_smarty_tpl->tpl_vars['error']->value=="wrong_password") {?>
					<p class="error-box">
						<strong>Wrong email or password!</strong><br />
						Have you <a href="?w=forgot">forgotten your password?</a>
					</p>
				<?php }?>
			</form>
        </div>

    </div>
</div>

<div class="row" id="login-panel-footer">
    <div class="col-md-4 col-md-offset-4">
        <p>
            Don't have an account yet? <a href="?w=register" class="popme" data-toggle="popover" data-placement="bottom" data-content="It's free :-)" data-trigger="manual">Register here.</a>
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
