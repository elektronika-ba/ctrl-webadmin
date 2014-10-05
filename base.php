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

	// Saving/updating
	case 'save':
		if($ctrl->saveBase($_POST)) {
			Header("Location: index.php?w=base");
			die();
		}

		if(!$ctrl->editBase($_POST)) {
			Header("Location: index.php?w=base");
			die();
		}
		break;

	// Deleting
	case 'delete':
		$ctrl->deleteBase($_GET);

		Header("Location: index.php?w=base");
		die();
		break;

	// List = default
	default:
		$ctrl->displayBases();
		break;
}

?>