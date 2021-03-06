<?php /* Smarty version Smarty-3.1.19, created on 2015-03-29 15:43:03
         compiled from ".\templates\bases_edit.html" */ ?>
<?php /*%%SmartyHeaderCode:2153054b94624794496-52696471%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7edc518cf6941e483d2af54c8349e78b474ebc6a' => 
    array (
      0 => '.\\templates\\bases_edit.html',
      1 => 1427643780,
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
      1 => 1427624436,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2153054b94624794496-52696471',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_54b94624e33b23_41312192',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54b94624e33b23_41312192')) {function content_54b94624e33b23_41312192($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include './smarty/libs/plugins\\function.html_options.php';
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
    <h1 class="page-header frobo fw300"><i class="fa fa-cubes"></i>&nbsp;Base Editor</h1>
  </div>
  <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<?php if (isset($_smarty_tpl->tpl_vars['notifs']->value['base_added'])) {?>
<div class="row">
  <div class="col-lg-12">
    <div class="alert alert-info" role="alert">You Base is now added to Server. Please use the generated Base ID and AES-Key and program your Base hardware with it.<br />Make sure you link at least one Client or you will not be able to access it.</div>
  </div>
</div>
<?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['notifs']->value['key_generated'])) {?>
<div class="row">
  <div class="col-lg-12">
    <div class="alert alert-warning" role="alert">New AES-128 Key has been generated! Please update your hardware to use this new encryption key!<br />
    AES-128 Key: <strong><?php echo $_smarty_tpl->tpl_vars['data']->value['crypt_key'];?>
</strong>
    </div>
  </div>
</div>
<?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['notifs']->value['queue_flushed'])) {?>
<div class="row">
  <div class="col-lg-12">
    <div class="alert alert-warning" role="alert">All pending messages to this Base were flushed.</div>
  </div>
</div>
<?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['notifs']->value['no_logfile'])) {?>
<div class="row">
  <div class="col-lg-12">
    <div class="alert alert-danger" role="alert">No log file is available for this Base just yet.</div>
  </div>
</div>
<?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['notifs']->value['regen_done'])) {?>
<div class="row">
  <div class="col-lg-12">
    <div class="alert alert-warning" role="alert">New Base ID has been generated! You should change it in your hardware now and force it to re-connect!<br />
    Base ID: <strong><?php echo $_smarty_tpl->tpl_vars['data']->value['baseid'];?>
</strong>
    </div>
  </div>
</div>
<?php }?>

<form class="form-horizontal" role="form" method="post" action="index.php">
<input type="hidden" name="w" value="base">
<input type="hidden" name="s" value="save">
<input type="hidden" name="IDbase" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['IDbase'];?>
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
              <label for="basename" class="col-sm-2 control-label">Name:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="basename" name="basename" placeholder="Name your Base" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['basename'];?>
">
              </div>
            </div>
            <div class="form-group">
              <label for="baseid" class="col-sm-2 control-label">Base ID:</label>
              <div class="col-sm-10">

  <?php if ($_smarty_tpl->tpl_vars['data']->value['IDbase']>0) {?>
                <div class="input-group">
                  <input type="text" class="form-control" id="baseid" name="baseid" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['baseid'];?>
" readonly="readonly">
                  <span class="input-group-btn">
                    <a class="btn btn-danger" href="?w=base&s=regenbaseid&IDbase=<?php echo $_smarty_tpl->tpl_vars['data']->value['IDbase'];?>
" onclick="javascript:if(!confirm('Are you sure you want to change Base ID ?')) { return false; }"><i class="glyphicon glyphicon-random"></i>&nbsp;Re-generate</a>
                  </span>
                </div>
  <?php } else { ?>
                <span class="form-control" style="box-shadow: none !important; border: none !important; padding-left: 0px !important">
                  <span class="text-muted">
                  Base ID will be automatically generated after you finish adding this new Base!
                  </span>
                </span>
  <?php }?>

              </div>
            </div>
            <div class="form-group">
              <label for="crypt_key" class="col-sm-2 control-label">AES-128 Key:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="crypt_key" name="crypt_key" placeholder="Enter 32 hexadecimal characters, or leave blank to generate the key randomly" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['crypt_key'];?>
">
              </div>
            </div>
            <div class="form-group">
              <label for="timezone" class="col-sm-2 control-label">Daylight Savings Option:</label>
              <div class="col-sm-10">
				<select name="dst" id="dst" class="form-control">
					<option value="0" <?php if ($_smarty_tpl->tpl_vars['data']->value['dst']=='0') {?>selected<?php }?>>No DST option</option>
					<option value="1" <?php if ($_smarty_tpl->tpl_vars['data']->value['dst']=='1') {?>selected<?php }?>>Yes, this Base is in Europe</option>
					<option value="2" <?php if ($_smarty_tpl->tpl_vars['data']->value['dst']=='2') {?>selected<?php }?>>Yes, this Base is in USA</option>
				</select>
              </div>
            </div>
            <div class="form-group">
              <label for="timezone" class="col-sm-2 control-label">Timezone offset:</label>
              <div class="col-sm-10">

                <div class="input-group">
                  <input type="text" class="form-control" id="timezone" name="timezone" placeholder="Timezone offset" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['timezone'];?>
">
                  <span class="input-group-addon">minutes</span>
                </div>

                <span class="text-muted">Current time on Server is: <span id="spanCurrentTime" style="font-weight: bold"><?php echo $_smarty_tpl->tpl_vars['current_time']->value;?>
</span> (<abbr title="Coordinated Universal Time">UTC</abbr>) and with offset of <span id="spanTimezone" style="font-weight: bold">...</span> minutes and current <abbr title="Daylight Savings Time">DST</abbr> option, time on your Base will be: <span id="spanResultingTime" style="font-weight: bold">...</span></span>

              </div>
            </div>
            <div class="form-group">
              <label for="IDclient" class="col-sm-2 control-label">Linked Clients:</label>
              <div class="col-sm-10">
                <select name="IDclient[]" id="IDclient" size="4" multiple class="form-control">
                  <?php echo smarty_function_html_options(array('values'=>$_smarty_tpl->tpl_vars['IDclient_val']->value,'output'=>$_smarty_tpl->tpl_vars['IDclient_opt']->value,'selected'=>$_smarty_tpl->tpl_vars['IDclient_sel']->value),$_smarty_tpl);?>

                </select>
                <span class="text-muted"><em>Use CTRL key to select multiple Clients</em></span>
              </div>
            </div>

  <?php if ($_smarty_tpl->tpl_vars['data']->value['IDbase']>0) {?>
            <div class="form-group">
              <label for="" class="col-sm-2 control-label">Sequence No:</label>
              <div class="col-sm-10">
                <span class="form-control" style="box-shadow: none !important; border: none !important; padding-left: 0px !important">
                TXbase: <span class="badge <?php if ($_smarty_tpl->tpl_vars['data']->value['TXbase']>1000000) {?>alert-danger<?php } else { ?>alert-success<?php }?>"><?php echo $_smarty_tpl->tpl_vars['data']->value['TXbase'];?>
</span>
                <?php if ($_smarty_tpl->tpl_vars['data']->value['online']==1) {?>
                  <em>Base is currently online, so this value is the one we had on Bases last disconnect.</em>
                <?php }?>
                </span>
              </div>
            </div>

            <div class="form-group">
              <label for="" class="col-sm-2 control-label">Pending Messages:</label>
              <div class="col-sm-10">
                <?php if ($_smarty_tpl->tpl_vars['data']->value['pending_messages']>0) {?>
                <a class="btn btn-danger" href="?w=base&s=flush&IDbase=<?php echo $_smarty_tpl->tpl_vars['data']->value['IDbase'];?>
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
                <a class="btn btn-info" href="?w=base&s=getlog&IDbase=<?php echo $_smarty_tpl->tpl_vars['data']->value['IDbase'];?>
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
                      <div role="alert" class="alert alert-info">In this section you can configure on which Base events will CTRL-Server send Android Push Notifications to each Android Client who is currently offline.</div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-12">
                      <label for="se_android_gcm_disable_status_change_event" class="control-label"><input id="se_android_gcm_disable_status_change_event" name="se_android_gcm_disable_status_change_event" value="1" type="checkbox" <?php if ($_smarty_tpl->tpl_vars['data']->value['se_android_gcm_disable_status_change_event']=='1') {?>checked<?php }?>> Disable Status Change Event</label> - If not checked, CTRL-Server will send Notification to Android app each time this Base gets connected or disconnected from the CTRL-Server.
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-12">
                      <label for="se_android_gcm_disable_new_data_event" class="control-label"><input id="se_android_gcm_disable_new_data_event" name="se_android_gcm_disable_new_data_event" value="1" type="checkbox" <?php if ($_smarty_tpl->tpl_vars['data']->value['se_android_gcm_disable_new_data_event']=='1') {?>checked<?php }?>> Disable New Data Event</label> - If not checked, CTRL-Server will send Notification to Android app each time this Base sends New Data to its associated Clients.
                    </div>
                  </div>

                  <div class="bs-callout bs-callout-warning">
                    <h4>Client override</h4>
                    Keep in mind that each Client can be independently configured not to receive these notifications! To configure each Client visit the Clients section.
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
        <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-save"></span>&nbsp;<?php if ($_smarty_tpl->tpl_vars['data']->value['IDbase']>0) {?>Save Changes<?php } else { ?>Add Base<?php }?></button>
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
    <!-- Moment.js -->
    <script src="js/plugins/momentjs/moment.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.js"></script>

    <!-- Subpage Javascripts -->
    

<script language="JavaScript">

$(document).ready(function(){
	$('#dst').on('change', function(e) {
		calcAndUpdateResultingTime();
	});

	$('#timezone').on('keyup', function(e) {
		calcAndUpdateResultingTime();
	});

	function calcAndUpdateResultingTime() {
		var $timezone = $('#timezone');
		var $dst = $('#dst');

		var timezone = parseInt(0 + $timezone.val());
		if(timezone > -16 && timezone < 16) {
			timezone = 0;
		}

		var $spanCurrentTime = $('#spanCurrentTime');
		var $spanTimezone = $('#spanTimezone');
		var $spanResultingTime = $('#spanResultingTime');

		var ct = moment($spanCurrentTime.html(), 'YYYY-MM-DD HH:mm:ss');
		ct = ct.add(timezone, 'minutes');

		if(isTimeInDST(ct, $dst.val()) && $dst.val()>0) {
			ct = ct.add(1, 'hours');
		}

		$spanTimezone.html(timezone);
		$spanResultingTime.html(ct.format('YYYY-MM-DD HH:mm:ss'));
	}

	function isTimeInDST(ct, dst) {
		// formulas taken from http://www.webexhibits.org/daylightsaving/b.html

		switch(parseInt(0 + dst)) {
			// EU
			case 1:
				{
					var marchDay =  (31-( Math.floor (ct.get('year') * 5 / 4) + 4) % 7);
					var octoberDay =  (31-( Math.floor (ct.get('year') * 5 / 4) + 1) % 7);

					var marchDate = moment(ct.get('year') + '-03-' + marchDay + ' 01:00:00', 'YYYY-MM-DD HH:mm:ss');
					var octoberDate = moment(ct.get('year') + '-10-' + octoberDay + ' 01:00:00', 'YYYY-MM-DD HH:mm:ss');

					if(ct.isBetween(marchDate, octoberDate)) return true;
				}
				break;

			// USA
			case 2:
				{
					var marchDay = 14 - (Math.floor (1 + ct.get('year') * 5 / 4) % 7);
					var novemberDay = 7 - (Math.floor (1 + ct.get('year') * 5 / 4) % 7);

					var marchDate = moment(ct.get('year') + '-03-' + marchDay + ' 02:00:00', 'YYYY-MM-DD HH:mm:ss');
					var novemberDate = moment(ct.get('year') + '-11-' + novemberDay + ' 02:00:00', 'YYYY-MM-DD HH:mm:ss');

					if(ct.isBetween(marchDate, novemberDate)) return true;
				}
				break;
		}

		return false;
	}

	// update current time on server
	setInterval(function() {
		var $spanCurrentTime = $('#spanCurrentTime');
		$spanCurrentTime.html(moment().utc().format('YYYY-MM-DD HH:mm:ss'));

		calcAndUpdateResultingTime();
	}, 1000);
});

</script>



  </body>
</html>
<?php }} ?>
