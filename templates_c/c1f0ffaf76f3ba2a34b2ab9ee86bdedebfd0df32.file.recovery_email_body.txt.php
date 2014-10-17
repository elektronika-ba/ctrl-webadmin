<?php /* Smarty version Smarty-3.1.19, created on 2014-10-17 13:57:05
         compiled from ".\templates\recovery_email_body.txt" */ ?>
<?php /*%%SmartyHeaderCode:26298542ea67980dfa7-80971059%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c1f0ffaf76f3ba2a34b2ab9ee86bdedebfd0df32' => 
    array (
      0 => '.\\templates\\recovery_email_body.txt',
      1 => 1413553850,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '26298542ea67980dfa7-80971059',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_542ea679879817_62038692',
  'variables' => 
  array (
    'email' => 0,
    'recovery_hash' => 0,
    'ip_address' => 0,
    'timestamp' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_542ea679879817_62038692')) {function content_542ea679879817_62038692($_smarty_tpl) {?>

Password recovery of your CTRL account has been requested. If you didn't request this recovery, please ignore this e-mail.

To recover your CTRL account visit this address: http://my.ctrl.ba/?w=account&s=recover&email=<?php echo $_smarty_tpl->tpl_vars['email']->value;?>
&hash=<?php echo $_smarty_tpl->tpl_vars['recovery_hash']->value;?>
&x=1

Please not that after visiting this address your CTRL password will be changed and displayed on the page. Make sure you change it after signing in to something you will remember!


See you there!

--------------------
CTRL.BA IoT Platform
IP: <?php echo $_smarty_tpl->tpl_vars['ip_address']->value;?>

TIME: <?php echo $_smarty_tpl->tpl_vars['timestamp']->value;?>
<?php }} ?>
