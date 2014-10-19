<?php /* Smarty version Smarty-3.1.19, created on 2014-10-19 10:44:30
         compiled from ".\templates\recovery_done_email_body.txt" */ ?>
<?php /*%%SmartyHeaderCode:57125443960e96a1d9-88009155%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b0699a1341027b5eda4897b5712f80b9032215de' => 
    array (
      0 => '.\\templates\\recovery_done_email_body.txt',
      1 => 1412349558,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '57125443960e96a1d9-88009155',
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
  'unifunc' => 'content_5443960ea23af6_81574099',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5443960ea23af6_81574099')) {function content_5443960ea23af6_81574099($_smarty_tpl) {?>

Password recovery of your CTRL account is completed. If you didn't request this recovery, then you have a problem because someone else now has your password.

Your new password is: <?php echo $_smarty_tpl->tpl_vars['newpass']->value;?>


Make sure you change it after signing in to something you will remember!


See you there!

--------------------
CTRL.BA IoT Platform
IP: <?php echo $_smarty_tpl->tpl_vars['ip_address']->value;?>

TIME: <?php echo $_smarty_tpl->tpl_vars['timestamp']->value;?>
<?php }} ?>
