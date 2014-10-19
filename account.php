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
$ctrlAccount = new CtrlAccount;

$_s = isset($_REQUEST['s']) ? $_REQUEST['s'] : '';
$_x = isset($_REQUEST['x']) ? $_REQUEST['x'] : '';

switch($_s) {
	// Re-send activation email
	case 'resend':
		if($ctrlAccount->getIsLoggedIn()) {
			Header("Location: index.php");
			die();
		}

		if(array_key_exists('email', $_GET) && filter_var($_GET['email'], FILTER_VALIDATE_EMAIL) && $ctrlAccount->resendActivationEmail($_GET['email'])) {
			$ctrlAccount->displayRegisterDone( array('email' => $_GET['email']) );
		}
		else {
			Header("Location: index.php?w=account&s=login"); // someone is playing...
			die();
		}
		break;

	// Account activation
	case 'activate':
		if($ctrlAccount->getIsLoggedIn()) {
			Header("Location: index.php");
			die();
		}

		$email = $ctrlAccount->doActivateAccount($_GET);
		if($email !== false) {
			Header("Location: index.php?w=account&s=login&email=".$email);
			die();
		}
		else {
			Header("Location: index.php?w=account&s=login"); // someone is playing...
			die();
		}
		break;

	// Password recovery
	case 'recover':
		if($ctrlAccount->getIsLoggedIn()) {
			Header("Location: index.php");
			die();
		}

		if($_x == '1') {
			$newpass = $ctrlAccount->completeRecovery($_GET);
			if($newpass !== false) {
				$ctrlAccount->displayRecoveryDone($newpass, $_GET['email']);
			}
			else {
				Header("Location: index.php?w=account&s=login"); // someone is playing...
				die();
			}
		}
		else {
			if($ctrlAccount->startRecovery($_GET)) {
				$ctrlAccount->displayRecoveryStarted($_GET);
			}
			else {
				Header("Location: index.php?w=account&s=login"); // someone is playing...
				die();
			}
		}
		break;

	// Login
	case 'login':
		if($ctrlAccount->getIsLoggedIn()) {
			Header("Location: index.php");
			die();
		}

		if($_x == '1' && $ctrlAccount->doLogin($_POST)) {
			Header("Location: index.php");
			die();
		}
		else {
			// copy email from $_GET to $_POST array
			if(array_key_exists('email', $_GET) && !array_key_exists('email', $_POST)) {
				$_POST['email'] = $_GET['email'];
			}

			$ctrlAccount->displayLogin($_POST);
		}
		break;

	// Registration procedure
	case 'register':
		if($ctrlAccount->getIsLoggedIn()) {
			Header("Location: index.php");
			die();
		}

		if($_x == '1' && $ctrlAccount->doRegister($_POST)) {
			$ctrlAccount->displayRegisterDone($_POST);
		}
		else {
			$ctrlAccount->displayRegister($_POST);
		}
		break;

	// Logout
	case 'logout':
		session_destroy();
		Header("Location: index.php");
		die();	
		break;

	// Settings/default
	case 'settings':
	default:
		if(!$ctrlAccount->getIsLoggedIn()) {
			Header("Location: index.php?w=account&s=login");
			die();
		}

		if($_x == '1') {
			$ctrlAccount->saveAccountSettings($_POST);
		}

		$ctrlAccount->displayAccountSettings();
		break;
}

?>