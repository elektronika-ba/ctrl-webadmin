<?php /* Smarty version Smarty-3.1.19, created on 2014-10-05 15:29:12
         compiled from ".\templates\bases_edit.html" */ ?>
<?php /*%%SmartyHeaderCode:28632542fa899de0909-08617457%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '752a14164a703f337358812946d947f0ec3fd82d' => 
    array (
      0 => '.\\templates\\bases_edit.html',
      1 => 1412520697,
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
  'nocache_hash' => '28632542fa899de0909-08617457',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_542fa89a184814_98208381',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_542fa89a184814_98208381')) {function content_542fa89a184814_98208381($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include './smarty/libs/plugins\\function.html_options.php';
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
    <h1 class="page-header frobo fw300">Base Editor</h1>
  </div>
  <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
  <div class="col-lg-12">
    <form class="form-horizontal" role="form" method="post" action="index.php">
    <input type="hidden" name="w" value="base">
    <input type="hidden" name="s" value="save">
    <input type="hidden" name="IDbase" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['IDbase'];?>
">

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
          <input type="text" class="form-control" id="baseid" name="baseid" placeholder="Base ID will be automatically generated after you Save" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['baseid'];?>
" readonly="readonly">
        </div>
      </div>
      <div class="form-group">
        <label for="crypt_key" class="col-sm-2 control-label">AES-128 Key:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="crypt_key" name="crypt_key" placeholder="Enter 32 hexadecimal characters, or leave blank to generate automatically" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['crypt_key'];?>
">
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
      <div class="form-group">
        <label for="" class="col-sm-2 control-label">Current Sequence No:</label>
        <div class="col-sm-10">
          <span class="form-control" style="box-shadow: none !important; border: none !important; padding-left: 0px !important">
          TXbase: <span class="badge <?php if ($_smarty_tpl->tpl_vars['data']->value['TXbase']>1000000) {?>alert-danger<?php } else { ?>alert-success<?php }?>"><?php echo $_smarty_tpl->tpl_vars['data']->value['TXbase'];?>
</span>
          </span>
        </div>
      </div>
      <div class="form-group">
        <label for="" class="col-sm-2 control-label">Pending Messages:</label>
        <div class="col-sm-10">
          <button type="button" class="btn btn-danger">Flush (<?php echo $_smarty_tpl->tpl_vars['data']->value['pending_messages'];?>
)</button>
        </div>
      </div>
      <div class="form-group">
        <label for="" class="col-sm-2 control-label">Server LOG:</label>
        <div class="col-sm-10">
          <button type="button" class="btn btn-default">Download</button>
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
