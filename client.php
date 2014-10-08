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
$ctrlClient = new CtrlClient;
$ctrlAccount = new CtrlAccount;

if(!$ctrlAccount->getIsLoggedIn()) {
	Header("Location: index.php?w=account&s=login");
	die();
}

$_s = isset($_REQUEST['s']) ? $_REQUEST['s'] : '';
$_x = isset($_REQUEST['x']) ? $_REQUEST['x'] : '';

switch($_s) {
	// Editing
	case 'edit':
		if(!$ctrlClient->editClient($_GET)) {
			Header("Location: index.php?w=client");
			die();
		}
		break;

	// Download log file
	case 'getlog':
		if(!$ctrlClient->downloadBaseLog($_GET)) {
			echo "No log file available.";
		}
		break;

	// Flush pending messages
	case 'flush':
		$ctrlClient->flushBaseQueue($_GET);
		if(!$ctrlClient->editBase($_GET)) {
			Header("Location: index.php?w=base");
			die();
		}
		break;

	// Saving/updating
	case 'save':
		$r = $ctrlClient->saveBase($_POST);

		if($r['return_to_edit'] != true) {
			$ctrlClient->displayBases();
		}
		else {
			if(!$ctrlClient->editBase(array('IDbase' => $r['IDbase']))) {
				Header("Location: index.php?w=base");
				die();
			}
		}
		break;

	// Deleting
	case 'delete':
		$ctrlClient->deleteClient($_GET);
		$ctrlClient->displayClients();
		break;

	// List = default
	default:
		$ctrlClient->displayClients();
		break;
}

?>