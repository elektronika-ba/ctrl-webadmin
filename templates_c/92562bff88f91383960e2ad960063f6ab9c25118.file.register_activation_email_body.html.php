<?php /* Smarty version Smarty-3.1.19, created on 2014-10-03 09:25:13
         compiled from ".\templates\register_activation_email_body.html" */ ?>
<?php /*%%SmartyHeaderCode:29392542e6b797f35d3-62217873%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '92562bff88f91383960e2ad960063f6ab9c25118' => 
    array (
      0 => '.\\templates\\register_activation_email_body.html',
      1 => 1412325292,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '29392542e6b797f35d3-62217873',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_542e6b79840b66_36508467',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_542e6b79840b66_36508467')) {function content_542e6b79840b66_36508467($_smarty_tpl) {?>

Excellent!

Your CTRL account has been created. All you need to do now is activate it.

Go to this address to activate your account and start controlling stuff: http://my.ctrl.ba/?w=account&s=activate&hash=$activation_hash


See you there!

--------------------
CTRL.BA IoT Platform
IP: $ip_address
TIME: $timestamp<?php }} ?>
