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
$ctrlBase = new CtrlBase;
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
		if(!$ctrlBase->editBase($_GET)) {
			Header("Location: index.php?w=base");
			die();
		}
		break;

	// Download log file
	case 'getlog':
		if(!$ctrlBase->downloadBaseLog($_GET)) {
			echo "No log file available.";
		}
		break;

	// Flush pending messages
	case 'flush':
		$ctrlBase->flushBaseQueue($_GET);
		if(!$ctrlBase->editBase($_GET)) {
			Header("Location: index.php?w=base");
			die();
		}
		break;

	// Re-generating Base ID key
	case 'regenbaseid':
		$ctrlBase->regenBaseId($_GET);
		if(!$ctrlBase->editBase($_GET)) {
			Header("Location: index.php?w=base");
			die();
		}
		break;

	// Saving/updating
	case 'save':
		$r = $ctrlBase->saveBase($_POST);

		if($r['return_to_edit'] != true) {
			$ctrlBase->displayBases();
		}
		else {
			if(!$ctrlBase->editBase(array('IDbase' => $r['IDbase']))) {
				Header("Location: index.php?w=base");
				die();
			}
		}
		break;

	// Deleting
	case 'delete':
		$ctrlBase->deleteBase($_GET);
		$ctrlBase->displayBases();
		break;

	// List = default
	default:
		$ctrlBase->displayBases();
		break;
}

?>