<?php /* Smarty version Smarty-3.1.19, created on 2015-01-16 17:10:57
         compiled from ".\templates\bases.html" */ ?>
<?php /*%%SmartyHeaderCode:2996654b94621c33475-82138490%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3760c14c5ad7beda763b491047e5a60838433115' => 
    array (
      0 => '.\\templates\\bases.html',
      1 => 1418556588,
      2 => 'file',
    ),
    'd3b25cded062c346ff5b97e1b639c6ee1c03da36' => 
    array (
      0 => '.\\templates\\framework.html',
      1 => 1418145199,
      2 => 'file',
    ),
    'd158735f3f4c95f0ef94183f8f23d483d0b5505a' => 
    array (
      0 => '.\\templates\\design.html',
      1 => 1421428021,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2996654b94621c33475-82138490',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_54b946221bba98_15934178',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54b946221bba98_15934178')) {function content_54b946221bba98_15934178($_smarty_tpl) {?>
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
      <a class="navbar-brand frobo fw300" href="index.php"><span class="fw400">Ctrl.ba</span>&nbsp;-&nbsp;Admin Panel&nbsp;<i class="fa fa-cloud fa-fw"></i></a>
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
          <!--
          <li>
            <a href="#"><i class="fa fa-flask fa-fw"></i>&nbsp;Apps<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
              <li>
                <a href="https://app.ctrl.ba/api" target="_blank">REST API Access</a>
              </li>
              <li>
                <a href="https://app.ctrl.ba/android" target="_blank">Android Client</a>
              </li>
            </ul>
          </li>
          -->
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
    <h1 class="page-header frobo fw300"><i class="fa fa-cubes"></i>&nbsp;Bases</h1>
  </div>
  <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<?php if (isset($_smarty_tpl->tpl_vars['notifs']->value['base_deleted'])) {?>
<div class="row">
  <div class="col-lg-12">
    <div class="alert alert-info alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      Base deleted from Server!
    </div>
  </div>
</div>
<?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['notifs']->value['base_updated'])) {?>
<div class="row">
  <div class="col-lg-12">
    <div class="alert alert-info alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      Base information updated.
    </div>
  </div>
</div>
<?php }?>
<div class="row">
  <div class="col-lg-12">
    <div class="table-responsive">
      <table class="table table-striped table-hover table-condensed ctrl-table-colorhead ctrl-table-clickable">
        <thead>
          <tr>
            <th>Name</th>
            <th>Base ID</th>
            <th class="text-center">Online</th>
            <th>Last Connected On</th>
            <th class="text-center">Last Sequence No</th>
            <th class="text-center">Linked Clients</th>
            <th class="text-center">Pending Messages</th>
            <th class="text-center">Delete</th>
          </tr>
        </thead>
        <tbody>
					<?php  $_smarty_tpl->tpl_vars["entry"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["entry"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["entry"]->key => $_smarty_tpl->tpl_vars["entry"]->value) {
$_smarty_tpl->tpl_vars["entry"]->_loop = true;
?>
					<tr onclick="javascript:location.href='?w=base&s=edit&IDbase=<?php echo $_smarty_tpl->tpl_vars['entry']->value['IDbase'];?>
';">
						<td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['entry']->value['basename'], ENT_QUOTES, 'UTF-8', true);?>
</td>
						<td><code><?php echo $_smarty_tpl->tpl_vars['entry']->value['baseid'];?>
</code></td>

            <td class="text-center"><span class="badge <?php if ($_smarty_tpl->tpl_vars['entry']->value['online']==1) {?>alert-success<?php } else { ?>alert-warning<?php }?>"><i class="<?php if ($_smarty_tpl->tpl_vars['entry']->value['online']==1) {?>fa fa-bolt<?php } else { ?>fa fa-minus<?php }?>"></i></span></td>
            <td><?php if ($_smarty_tpl->tpl_vars['entry']->value['last_online']=='') {?><i class="fa fa-minus"></i><?php } else { ?><?php echo $_smarty_tpl->tpl_vars['entry']->value['last_online'];?>
<?php }?></td>

            <td class="text-center"><span class="badge <?php if ($_smarty_tpl->tpl_vars['entry']->value['TXbase']>1000000) {?>alert-danger<?php } else { ?>alert-success<?php }?>">
            <?php if ($_smarty_tpl->tpl_vars['entry']->value['online']==1) {?>
            	~
            <?php } else { ?>
            	<?php echo $_smarty_tpl->tpl_vars['entry']->value['TXbase'];?>

            <?php }?>
            </span></td>
            <td class="text-center"><span class="badge <?php if ($_smarty_tpl->tpl_vars['entry']->value['linked_clients']>0) {?>alert-success<?php } else { ?>alert-danger<?php }?>"><?php echo $_smarty_tpl->tpl_vars['entry']->value['linked_clients'];?>
</span></td>
            <td class="text-center"><span class="badge <?php if ($_smarty_tpl->tpl_vars['entry']->value['pending_messages']>0) {?>alert-danger<?php } else { ?>alert-success<?php }?>"><?php echo $_smarty_tpl->tpl_vars['entry']->value['pending_messages'];?>
</span></td>
						<td class="text-center">
              <a class="btn btn-danger btn-xs" href="?w=base&s=delete&IDbase=<?php echo $_smarty_tpl->tpl_vars['entry']->value['IDbase'];?>
" onclick="javascript:if(!confirm('Are you sure you want to delete this Base?')) { event.stopPropagation(); return false; } else { event.stopPropagation(); }">
								<span class="glyphicon glyphicon-remove"></span>
							</button>
						</td>
					</tr>
					<?php }
if (!$_smarty_tpl->tpl_vars["entry"]->_loop) {
?>
					<tr>
						<td colspan="6">No Bases, click <strong>Add New</strong> button.</td>
					</tr>
					<?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- /.row -->
<div class="row">
  <div class="col-lg-12">
    <button class="btn btn-primary" type="button" onclick="javascript:location.href='?w=base&s=edit&IDbase=-1';"><span class="glyphicon glyphicon-plus"></span>&nbsp;Add New</button>
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
