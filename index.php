<?php

/*
* Project: CTRL-WebAdmin
* Author: Muris Pucic Trax <trax [AT] elektronika [DOT] ba>
* Version: 1.0
*/

date_default_timezone_set("UTC");

define('_INDEX_','1');

session_start();

// include the setup script
include('./libs/ctrl_setup.php');

$_w = isset($_REQUEST['w']) ? $_REQUEST['w'] : '';

switch($_w) {
	// Account management
	case 'account':
		include('./account.php');
		break;

	// Bases management
	case 'base':
		include('./base.php');
		break;

	// Clients management
	case 'client':
		include('./client.php');
		break;

	// Dashboard/default
	default:
		include('./dashboard.php');
		break;
}

?>