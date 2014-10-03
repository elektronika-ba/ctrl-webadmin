<?php /* Smarty version Smarty-3.1.19, created on 2014-10-03 13:44:43
         compiled from ".\templates\recovery_done_email_body.txt" */ ?>
<?php /*%%SmartyHeaderCode:6507542ea84bb31022-63392199%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fb8013f38016c351a537711a1fa54f68380eca99' => 
    array (
      0 => '.\\templates\\recovery_done_email_body.txt',
      1 => 1412343216,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6507542ea84bb31022-63392199',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'newpass' => 0,
    'ip_address' => 0,
    'timestamp' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_542ea84bbc2190_45023192',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_542ea84bbc2190_45023192')) {function content_542ea84bbc2190_45023192($_smarty_tpl) {?>

Password recovery of your CTRL account is completed. If you didn't request this recovery, then you have a problem because someone else now has your password.

Your new password is: <?php echo $_smarty_tpl->tpl_vars['newpass']->value;?>


Make sure you change it after signing in to something you will remember!


See you there!

--------------------
CTRL.BA IoT Platform
IP: <?php echo $_smarty_tpl->tpl_vars['ip_address']->value;?>

TIME: <?php echo $_smarty_tpl->tpl_vars['timestamp']->value;?>
<?php }} ?>
