<?php /* Smarty version Smarty-3.1.19, created on 2014-10-02 16:28:12
         compiled from ".\templates\register.html" */ ?>
<?php /*%%SmartyHeaderCode:21880542d701e6d6867-37974161%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0d9a2ec41a27719dad8c76787bb82aff576ed935' => 
    array (
      0 => '.\\templates\\register.html',
      1 => 1412267288,
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
  'nocache_hash' => '21880542d701e6d6867-37974161',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_542d701e920773_08419636',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_542d701e920773_08419636')) {function content_542d701e920773_08419636($_smarty_tpl) {?>

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
        <h1>Create your CTRL account.</h1>
        <h2>One account controls all your Bases. Still, you can create as many accounts as you want!</h2>
    </div>
</div>

<div class="row" id="login-panel">
    <div class="col-md-4 col-md-offset-4">

        <div id="login-panel-bg">
            <form role="form" action="index.php" method="post">
				<input type="hidden" name="w" value="register">
				<input type="hidden" name="s" value="1">

                <div class="form-group">
                    <input class="form-control" placeholder="E-mail" name="email" type="email" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['post']->value['email'], ENT_QUOTES, 'UTF-8', true);?>
" autofocus>
                </div>

                <div class="form-group">
                    <input class="form-control" placeholder="Choose Password" name="password" type="password">
                </div>

                <div class="form-group">
                    <input class="form-control" placeholder="Confirm your Password" name="password_again" type="password">
                </div>

                <div class="checkbox">
                    <label>
                        <input name="terms" type="checkbox" value="1" <?php if ($_smarty_tpl->tpl_vars['post']->value['terms']=="1") {?>checked<?php }?>>I have read <a href="?w=terms" target="_blank">Terms and Conditions</a>
                    </label>
                </div>

                <div class="form-group">
                    <?php echo $_smarty_tpl->tpl_vars['recaptcha']->value;?>

                </div>

                <button class="btn btn-lg btn-success btn-block">
                    <i class="fa fa-user"></i>&nbsp;Register
                </button>

				<?php if ($_smarty_tpl->tpl_vars['error']->value!='') {?>
					<p class="error-box">
						<?php if ($_smarty_tpl->tpl_vars['error']->value=="email_missing") {?>
							<strong>Please enter your valid e-mail!</strong>
						<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['error']->value=="email_used") {?>
							<strong>Please choose different e-mail!</strong><br />
							<a href="?w=login&email=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['post']->value['email'], ENT_QUOTES, 'UTF-8', true);?>
">Maybe you should trying to loging-in?</a>
						<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['error']->value=="password_missing") {?>
							<strong>Your passwords do not match!</strong>
						<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['error']->value=="password_mismatch") {?>
							<strong>Your passwords do not match!</strong>
						<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['error']->value=="recaptcha_error") {?>
							<strong>ReCAPTCHA Error. Please try again!</strong>
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
            Already have an account? <a href="?w=login">Sign in here.</a><br />
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
	        $(".popme").popover();
	        $(".popme").popover('show');
	    });
    </script>

</body>

</html>
<?php }} ?>
