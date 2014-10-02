<?php /* Smarty version Smarty-3.1.19, created on 2014-10-02 11:43:02
         compiled from ".\templates\register.html" */ ?>
<?php /*%%SmartyHeaderCode:12257542d3a46170dd6-30745081%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c4e39c65acdf8be70671b09cf58b97ada7e6ed26' => 
    array (
      0 => '.\\templates\\register.html',
      1 => 1412249773,
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
      1 => 1412249839,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12257542d3a46170dd6-30745081',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_542d3a462cc347_73890871',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_542d3a462cc347_73890871')) {function content_542d3a462cc347_73890871($_smarty_tpl) {?>

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
            <form role="form">

                <div class="form-group">
                    <input class="form-control" placeholder="E-mail" name="email" id="txtEmail" type="email" autofocus>
                </div>

                <div class="form-group">
                    <input class="form-control" placeholder="Password" name="password" id="txtPassword" type="password" value="">
                </div>

                <div class="checkbox">
                    <label>
                        <input name="terms" id="ckTerms" type="checkbox" value="1">I have read <a href="terms.html">Terms and Conditions</a>
                    </label>
                </div>

                <button class="btn btn-lg btn-success btn-block">
                    <i class="fa fa-user"></i>&nbsp;Register
                </button>

            </form>
        </div>

    </div>
</div>

<div class="row" id="login-panel-footer">
    <div class="col-md-4 col-md-offset-4">
        <p>
            Already have account? <a href="login.html">Sign in here.</a><br />
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
