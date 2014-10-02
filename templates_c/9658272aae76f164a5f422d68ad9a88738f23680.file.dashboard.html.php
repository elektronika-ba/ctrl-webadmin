<?php /* Smarty version Smarty-3.1.19, created on 2014-10-02 15:20:30
         compiled from ".\templates\dashboard.html" */ ?>
<?php /*%%SmartyHeaderCode:17500542d6d0c19ea03-10995378%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9658272aae76f164a5f422d68ad9a88738f23680' => 
    array (
      0 => '.\\templates\\dashboard.html',
      1 => 1412263140,
      2 => 'file',
    ),
    '2a635fa6116a658e691859a59a54961509ad3229' => 
    array (
      0 => '.\\templates\\framework.html',
      1 => 1412263219,
      2 => 'file',
    ),
    '4d72c64a6d937f61dd493697d2ab1894beb263a3' => 
    array (
      0 => '.\\templates\\design.html',
      1 => 1412261859,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17500542d6d0c19ea03-10995378',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_542d6d0c3c3108_62378319',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_542d6d0c3c3108_62378319')) {function content_542d6d0c3c3108_62378319($_smarty_tpl) {?>

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
								<a class="navbar-brand frobo fw300" href="index.html">
										<img src="images/alien_24.png" border="0" style="opacity: 0.7; filter: alpha(opacity=70);">&nbsp;<span class="fw400">Ctrl.ba</span>&nbsp;-&nbsp;Admin Panel&nbsp;<i class="fa fa-cloud fa-fw"></i></a>
						</div>
						<!-- /.navbar-header -->

						<ul class="nav navbar-top-links navbar-right">
								<li class="dropdown">
										<a class="dropdown-toggle" data-toggle="dropdown" href="#">
												<i class="fa fa-user fa-fw"></i><i class="fa fa-caret-down"></i>
										</a>
										<ul class="dropdown-menu dropdown-user">
												<li><a href="?w=settings"><i class="fa fa-gear fa-fw"></i>&nbsp;Settings</a>
												</li>
												<li class="divider"></li>
												<li><a href="?w=logout"><i class="fa fa-sign-out fa-fw"></i>&nbsp;Logout</a>
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
														<a class="active" href="index.html"><i class="fa fa-dashboard fa-fw"></i>&nbsp;Dashboard</a>
												</li>

												<li>
														<a href="bases.html"><i class="fa fa-cubes fa-fw"></i>&nbsp;Bases<span class="badge pull-right alert-success">1</span></a>
												</li>

												<li>
														<a href="clients.html"><i class="fa fa-users fa-fw"></i>&nbsp;Clients<span class="badge pull-right alert-danger">0</span></a>
												</li>

												<li>
														<a href="#"><i class="fa fa-flask fa-fw"></i>&nbsp;Apps<span class="fa arrow"></span></a>
														<ul class="nav nav-second-level">
																<li>
																		<a href="http://app.ctrl.ba/api">API Access</a>
																</li>
																<li>
																		<a href="http://app.ctrl.ba/email">Event Notificator</a>
																</li>
														</ul>
														<!-- /.nav-second-level -->
												</li>

												<li>
														<a href="help.html"><i class="fa fa-question fa-fw"></i>&nbsp;Help</a>
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
		<h1 class="page-header frobo fw300">Dashboard</h1>
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->

<div class="row">
	<div class="col-lg-3 col-md-6">
		<div class="panel panel-yellow">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-cube fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge">10234</div>
						<div>Pending items in queue!</div>
					</div>
				</div>
			</div>
			<a href="bases.html">
				<div class="panel-footer">
					<span class="pull-left">View Bases</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>

	<div class="col-lg-3 col-md-6">
		<div class="panel panel-yellow">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-user fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge">5134</div>
						<div>Pending items in queue!</div>
					</div>
				</div>
			</div>
			<a href="clients.html">
				<div class="panel-footer">
					<span class="pull-left">View Clients</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>

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
