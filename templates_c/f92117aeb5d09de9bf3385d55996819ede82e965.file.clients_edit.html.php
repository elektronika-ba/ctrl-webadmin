<?php /* Smarty version Smarty-3.1.19, created on 2014-10-09 07:08:35
         compiled from ".\templates\clients_edit.html" */ ?>
<?php /*%%SmartyHeaderCode:30870543541b1c49a51-89051258%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f92117aeb5d09de9bf3385d55996819ede82e965' => 
    array (
      0 => '.\\templates\\clients_edit.html',
      1 => 1412838508,
      2 => 'file',
    ),
    '5a76211f71eb9fd8857118b3e421e87c0a7424e3' => 
    array (
      0 => '.\\templates\\framework.html',
      1 => 1412663772,
      2 => 'file',
    ),
    '94942b38de2598eb5520d42b9aca2d4e4198ad42' => 
    array (
      0 => '.\\templates\\design.html',
      1 => 1412318618,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '30870543541b1c49a51-89051258',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_543541b1f311a5_14041635',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_543541b1f311a5_14041635')) {function content_543541b1f311a5_14041635($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include './smarty/libs/plugins\\function.html_options.php';
?>
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
    <h1 class="page-header frobo fw300">Client Editor</h1>
  </div>
  <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<?php if (isset($_smarty_tpl->tpl_vars['notifs']->value['client_added'])) {?>
<div class="row">
  <div class="col-lg-12">
    <div class="alert alert-info" role="alert">You Client is now added to Server. Please use the generated Auth Token to gain access to Client services.</div>
  </div>
</div>
<?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['notifs']->value['queue_flushed'])) {?>
<div class="row">
  <div class="col-lg-12">
    <div class="alert alert-warning" role="alert">All pending messages to this Client were flushed.</div>
  </div>
</div>
<?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['notifs']->value['no_logfile'])) {?>
<div class="row">
  <div class="col-lg-12">
    <div class="alert alert-danger" role="alert">No log file is available for this Client just yet.</div>
  </div>
</div>
<?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['notifs']->value['regen_done'])) {?>
<div class="row">
  <div class="col-lg-12">
    <div class="alert alert-warning" role="alert">New Auth Token has been generated! You should update every App that was using it to this new Auth Token!<br />
    Auth Token: <strong><?php echo $_smarty_tpl->tpl_vars['data']->value['auth_token'];?>
</strong>
    </div>
  </div>
</div>
<?php }?>
<div class="row">
  <div class="col-lg-12">
    <form class="form-horizontal" role="form" method="post" action="index.php">
    <input type="hidden" name="w" value="client">
    <input type="hidden" name="s" value="save">
    <input type="hidden" name="IDclient" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['IDclient'];?>
">

      <div class="form-group">
        <label for="clientname" class="col-sm-2 control-label">Name:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="clientname" name="clientname" placeholder="Name your Client" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['clientname'];?>
">
        </div>
      </div>
      <div class="form-group">
        <label for="auth_token" class="col-sm-2 control-label">Auth Token:</label>
        <div class="col-sm-10">

<?php if ($_smarty_tpl->tpl_vars['data']->value['IDclient']>0) {?>
          <div class="input-group">
            <input type="text" class="form-control" id="auth_token" name="auth_token" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['auth_token'];?>
" readonly="readonly">
            <span class="input-group-btn">
              <a class="btn btn-danger" href="?w=client&s=regenauthtoken&IDclient=<?php echo $_smarty_tpl->tpl_vars['data']->value['IDclient'];?>
" onclick="javascript:if(!confirm('Are you sure you want to change Auth Token ?')) { return false; }"><i class="glyphicon glyphicon-random"></i>&nbsp;Re-generate</a>
            </span>
          </div>
<?php } else { ?>
          <span class="form-control" style="box-shadow: none !important; border: none !important; padding-left: 0px !important">
            <span class="text-muted">
            Auth Token will be automatically generated after you finish adding this new Client!
            </span>
          </span>
<?php }?>

        </div>
      </div>
      <div class="form-group">
        <label for="IDbase" class="col-sm-2 control-label">Linked Bases:</label>
        <div class="col-sm-10">
          <select name="IDbase[]" id="IDbase" size="10" multiple class="form-control">
						<?php echo smarty_function_html_options(array('values'=>$_smarty_tpl->tpl_vars['IDbase_val']->value,'output'=>$_smarty_tpl->tpl_vars['IDbase_opt']->value,'selected'=>$_smarty_tpl->tpl_vars['IDbase_sel']->value),$_smarty_tpl);?>

          </select>
          <span class="text-muted"><em>Use CTRL key to select multiple Bases</em></span>
        </div>
      </div>

<?php if ($_smarty_tpl->tpl_vars['data']->value['IDclient']>0) {?>

      <div class="form-group">
        <label for="" class="col-sm-2 control-label">Current Sequence No:</label>
        <div class="col-sm-10">
          <span class="form-control" style="box-shadow: none !important; border: none !important; padding-left: 0px !important">
          TXclient: <span class="badge <?php if ($_smarty_tpl->tpl_vars['data']->value['TXclient']>1000000) {?>alert-danger<?php } else { ?>alert-success<?php }?>"><?php echo $_smarty_tpl->tpl_vars['data']->value['TXclient'];?>
</span>
          </span>
        </div>
      </div>

      <div class="form-group">
        <label for="" class="col-sm-2 control-label">Pending Messages:</label>
        <div class="col-sm-10">
          <?php if ($_smarty_tpl->tpl_vars['data']->value['pending_messages']>0) {?>
          <a class="btn btn-danger" href="?w=client&s=flush&IDclient=<?php echo $_smarty_tpl->tpl_vars['data']->value['IDclient'];?>
" onclick="javascript:if(!confirm('Are you sure you want to flush the TX Queue ?')) { return false; }">Flush (<?php echo $_smarty_tpl->tpl_vars['data']->value['pending_messages'];?>
)</a>
          <?php } else { ?>
          <span class="form-control" style="box-shadow: none !important; border: none !important; padding-left: 0px !important">
            <span class="text-muted">
            Great, no pending messages!
            </span>
          </span>
          <?php }?>
        </div>
      </div>

      <div class="form-group">
        <label for="" class="col-sm-2 control-label">Server LOG:</label>
        <div class="col-sm-10">
          <?php if ($_smarty_tpl->tpl_vars['log_available']->value) {?>
          <a class="btn btn-info" href="?w=client&s=getlog&IDclient=<?php echo $_smarty_tpl->tpl_vars['data']->value['IDclient'];?>
" target="_blank">Download</a>
          <?php } else { ?>
          <span class="form-control" style="box-shadow: none !important; border: none !important; padding-left: 0px !important">
            <span class="text-muted">
            When the Base connects for the first time the log file will be created. Now it is just empty.
            </span>
          </span>
          <?php }?>
        </div>
      </div>

<?php }?>

      <div class="form-group">
        <div class="col-lg-12">
          <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-save"></span>&nbsp;<?php if ($_smarty_tpl->tpl_vars['data']->value['IDclient']>0) {?>Save Changes<?php } else { ?>Add Client<?php }?></button>
			  </div>
      </div>

    </form>
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
