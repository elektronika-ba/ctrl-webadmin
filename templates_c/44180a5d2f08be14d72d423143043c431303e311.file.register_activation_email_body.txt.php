<?php /* Smarty version Smarty-3.1.19, created on 2014-10-03 15:20:58
         compiled from ".\templates\register_activation_email_body.txt" */ ?>
<?php /*%%SmartyHeaderCode:24222542ebedad7bc54-04911797%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '44180a5d2f08be14d72d423143043c431303e311' => 
    array (
      0 => '.\\templates\\register_activation_email_body.txt',
      1 => 1412349558,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '24222542ebedad7bc54-04911797',
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
  'unifunc' => 'content_542ebedae3b306_79127910',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_542ebedae3b306_79127910')) {function content_542ebedae3b306_79127910($_smarty_tpl) {?>

Excellent!

Your CTRL account has been created. All you need to do now is activate it.

Go to this address to activate your account and start controlling stuff: http://my.ctrl.ba/?w=account&s=activate&hash=<?php echo $_smarty_tpl->tpl_vars['activation_hash']->value;?>



See you there!

--------------------
CTRL.BA IoT Platform
IP: <?php echo $_smarty_tpl->tpl_vars['ip_address']->value;?>

TIME: <?php echo $_smarty_tpl->tpl_vars['timestamp']->value;?>
<?php }} ?>
