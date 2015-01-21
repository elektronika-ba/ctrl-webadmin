<?php /* Smarty version Smarty-3.1.19, created on 2015-01-21 08:06:07
         compiled from ".\templates\clients_edit.html" */ ?>
<?php /*%%SmartyHeaderCode:30870543541b1c49a51-89051258%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f92117aeb5d09de9bf3385d55996819ede82e965' => 
    array (
      0 => '.\\templates\\clients_edit.html',
      1 => 1421827384,
      2 => 'file',
    ),
    '5a76211f71eb9fd8857118b3e421e87c0a7424e3' => 
    array (
      0 => '.\\templates\\framework.html',
      1 => 1418116569,
      2 => 'file',
    ),
    '94942b38de2598eb5520d42b9aca2d4e4198ad42' => 
    array (
      0 => '.\\templates\\design.html',
      1 => 1421409998,
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
    <h1 class="page-header frobo fw300"><i class="fa fa-users"></i>&nbsp;Client Editor</h1>
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

<form class="form-horizontal" role="form" method="post" action="index.php">
<input type="hidden" name="w" value="client">
<input type="hidden" name="s" value="save">
<input type="hidden" name="IDclient" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['IDclient'];?>
">

<div class="row">
  <div class="col-lg-12">

      <!-- Nav tabs -->
      <ul class="nav nav-tabs ctrl-navbar-bottom-space" role="tablist">
        <li role="presentation" class="active"><a href="#main" aria-controls="main" role="tab" data-toggle="tab">Main</a></li>
        <li role="presentation"><a href="#server-extensions" aria-controls="server-extensions" role="tab" data-toggle="tab">Server Extensions</a></li>
      </ul>

      <!-- Tab panes -->
      <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="main">

          <div class="form-horizontal" role="form">

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

<?php if ($_smarty_tpl->tpl_vars['data']->value['IDclient']>0) {?>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <img src="index.php?w=client&s=qrcode&IDclient=<?php echo $_smarty_tpl->tpl_vars['data']->value['IDclient'];?>
" border="0">
        </div>
      </div>
<?php }?>

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
          <?php if ($_smarty_tpl->tpl_vars['data']->value['online']==1) {?>
            <em>Client is currently online, so this value is the one we had on Clients last disconnect.</em>
          <?php }?>
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
            When the Client connects for the first time the log file will be created. Now it is just empty.
            </span>
          </span>
          <?php }?>
        </div>
      </div>

<?php }?>

          </div>

        </div>

        <div role="tabpanel" class="tab-pane" id="server-extensions">

<?php if ($_smarty_tpl->tpl_vars['server_extensions_count']->value<=0) {?>
          <div role="alert" class="alert alert-info">No Server Extensions installed.</div>
<?php } else { ?>
          <!-- list of installed/available Server Extensions -->
          <ul class="nav nav-pills nav-stacked col-sm-2" id="nav2">
              <?php if (isset($_smarty_tpl->tpl_vars['se_android_gcm']->value)) {?>
              <li class="active"><a href="#tabSE_AndroidGCM" data-toggle="pill">Android GCM</a></li>
              <?php }?>
          </ul>

          <!-- tabs of Server Extensions -->
          <div class="tab-content col-sm-10 ctrl-tab-content-pills-nopadd">

              <!-- tab for Android GCM Server Extensions -->
              <?php if (isset($_smarty_tpl->tpl_vars['se_android_gcm']->value)) {?>
              <div class="tab-pane active" id="tabSE_AndroidGCM">
                <div class="form-horizontal" role="form">

                  <div class="form-group ctrl-nobottmargin">
                    <div class="col-lg-12">
                      <div role="alert" class="alert alert-info">In this section you can configure on which Base events will CTRL-Server send Android Push Notifications to this Android Client who is currently offline.</div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-12">
                      <label for="se_android_gcm_disable_status_change_event" class="control-label"><input id="se_android_gcm_disable_status_change_event" name="se_android_gcm_disable_status_change_event" value="1" type="checkbox" <?php if ($_smarty_tpl->tpl_vars['data']->value['se_android_gcm_disable_status_change_event']=='1') {?>checked<?php }?>> Disable Status Change Event</label> - If not checked, CTRL-Server will send Notification to Android app using this Client each time any associated Base gets connected or disconnected from the CTRL-Server.
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-12">
                      <label for="se_android_gcm_disable_new_data_event" class="control-label"><input id="se_android_gcm_disable_new_data_event" name="se_android_gcm_disable_new_data_event" value="1" type="checkbox" <?php if ($_smarty_tpl->tpl_vars['data']->value['se_android_gcm_disable_new_data_event']=='1') {?>checked<?php }?>> Disable New Data Event</label> - If not checked, CTRL-Server will send Notification to Android app using this Client each time any associated Base sends New Data to this Clients.
                    </div>
                  </div>

                  <div class="bs-callout bs-callout-warning">
                    <h4>Base override</h4>
                    Keep in mind that each Base can be independently configured not to send these notifications! To configure each Base visit the Bases section.
                  </div>

                </div>
              </div>
              <?php }?>

          </div>
<?php }?>

        </div>

      </div>

  </div>
</div>

<div class="row">
  <div class="col-lg-12">
    <hr class="fol-slim-hr">
  </div>
</div>

<div class="row">
  <div class="col-lg-12">
    <div class="form-group">
      <div class="col-lg-12">
        <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-save"></span>&nbsp;<?php if ($_smarty_tpl->tpl_vars['data']->value['IDclient']>0) {?>Save Changes<?php } else { ?>Add Client<?php }?></button>
      </div>
    </div>
  </div>
</div>

</form>

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
