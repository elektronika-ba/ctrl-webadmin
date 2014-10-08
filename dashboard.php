<?php

/*
* Project: CTRL-WebAdmin
* Author: Muris Pucic Trax <trax [AT] elektronika [DOT] ba>
* Version: 1.0
*/

if(!defined('_INDEX_')) {
	Header("Location: index.php");
	die();
}

// create Ctrl object
$ctrlDashboard = new CtrlDashboard;
$ctrlAccount = new CtrlAccount;

if(!$ctrlAccount->getIsLoggedIn()) {
	Header("Location: index.php?w=account&s=login");
	die();
}

$_s = isset($_REQUEST['s']) ? $_REQUEST['s'] : '';
$_x = isset($_REQUEST['x']) ? $_REQUEST['x'] : '';

switch($_s) {
	// Dashboard page = default
	default:
		$ctrlDashboard->displayDashboard();
		break;
}

?>