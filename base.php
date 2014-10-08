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

if(!$ctrl->getIsLoggedIn()) {
	Header("Location: index.php?w=account&s=login");
	die();
}

$_s = isset($_REQUEST['s']) ? $_REQUEST['s'] : '';
$_x = isset($_REQUEST['x']) ? $_REQUEST['x'] : '';

switch($_s) {
	// Editing
	case 'edit':
		if(!$ctrl->editBase($_GET)) {
			Header("Location: index.php?w=base");
			die();
		}
		break;

	// Download log file
	case 'getlog':
		if(!$ctrl->downloadBaseLog($_GET)) {
			echo "No log file available.";
		}
		break;

	// Flush pending messages
	case 'flush':
		$ctrl->flushBaseQueue($_GET);
		if(!$ctrl->editBase($_GET)) {
			Header("Location: index.php?w=base");
			die();
		}
		break;

	// Saving/updating
	case 'save':
		$r = $ctrl->saveBase($_POST);

		if($r['return_to_edit'] != true) {
			$ctrl->displayBases();
		}
		else {
			$ctrl->editBase(array('IDbase' => $r['IDbase']));
		}
		break;

	// Deleting
	case 'delete':
		$ctrl->deleteBase($_GET);
		$ctrl->displayBases();
		break;

	// List = default
	default:
		$ctrl->displayBases();
		break;
}

?>