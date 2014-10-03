<?php

/*
* Project: CTRL-WebAdmin
* Author: Muris Pucic Trax <trax [AT] elektronika [DOT] ba>
* Version: 1.0
*/

define('_INDEX_','1');

session_start();

// include the setup script
include('./libs/ctrl_setup.php');

// create guestbook object
$ctrl = new Ctrl;

$_w = isset($_REQUEST['w']) ? $_REQUEST['w'] : '';

switch($_w) {
	// Account management
	case 'account':
		include('./account.php');
		break;

	// Dashboard/default
	default:
		include('./dashboard.php');
		break;
}

?>