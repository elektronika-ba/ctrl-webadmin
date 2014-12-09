<?php /* Smarty version Smarty-3.1.19, created on 2014-12-09 09:09:13
         compiled from ".\templates\register_activation_email_body.txt" */ ?>
<?php /*%%SmartyHeaderCode:157475486bc393e7869-59891351%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '745d4dacb9751a8f1c20e4abf559a455eb820e96' => 
    array (
      0 => '.\\templates\\register_activation_email_body.txt',
      1 => 1413553851,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '157475486bc393e7869-59891351',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'activation_hash' => 0,
    'ip_address' => 0,
    'timestamp' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5486bc39456334_79784745',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5486bc39456334_79784745')) {function content_5486bc39456334_79784745($_smarty_tpl) {?>

Excellent!

Your CTRL account has been created. All you need to do now is activate it.

Go to this address to activate your account and start controlling stuff: http://my.ctrl.ba/?w=account&s=activate&hash=<?php echo $_smarty_tpl->tpl_vars['activation_hash']->value;?>



See you there!

--------------------
CTRL.BA IoT Platform
IP: <?php echo $_smarty_tpl->tpl_vars['ip_address']->value;?>

TIME: <?php echo $_smarty_tpl->tpl_vars['timestamp']->value;?>
<?php }} ?>
