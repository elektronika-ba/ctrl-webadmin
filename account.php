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

$_s = isset($_REQUEST['s']) ? $_REQUEST['s'] : '';
$_x = isset($_REQUEST['x']) ? $_REQUEST['x'] : '';

switch($_s) {
	// Re-send activation email
	case 'resend':
		if($ctrl->getIsLoggedIn()) {
			Header("Location: index.php");
			die();
		}

		if(array_key_exists('email', $_GET) && filter_var($_GET['email'], FILTER_VALIDATE_EMAIL) && $ctrl->resendActivationEmail($_GET['email'])) {
			$ctrl->displayRegisterDone( array('email' => $_GET['email']) );
		}
		else {
			Header("Location: index.php?w=account&s=login"); // someone is playing...
			die();
		}
		break;

	// Account activation
	case 'activate':
		if($ctrl->getIsLoggedIn()) {
			Header("Location: index.php");
			die();
		}

		$email = $ctrl->doActivateAccount($_GET);
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
		if($ctrl->getIsLoggedIn()) {
			Header("Location: index.php");
			die();
		}

		if($_x == '1') {
			$newpass = $ctrl->completeRecovery($_GET);
			if($newpass !== false) {
				$ctrl->displayRecoveryDone($newpass, $_GET['email']);
			}
			else {
				Header("Location: index.php?w=account&s=login"); // someone is playing...
				die();
			}
		}
		else {
			if($ctrl->startRecovery($_GET)) {
				$ctrl->displayRecoveryStarted($_GET);
			}
			else {
				Header("Location: index.php?w=account&s=login"); // someone is playing...
				die();
			}
		}
		break;

	// Login
	case 'login':
		if($ctrl->getIsLoggedIn()) {
			Header("Location: index.php");
			die();
		}

		if($_x == '1' && $ctrl->doLogin($_POST)) {
			Header("Location: index.php");
			die();
		}
		else {
			// copy email from $_GET to $_POST array
			if(array_key_exists('email', $_GET) && !array_key_exists('email', $_POST)) {
				$_POST['email'] = $_GET['email'];
			}

			$ctrl->displayLogin($_POST);
		}
		break;

	// Registration procedure
	case 'register':
		if($ctrl->getIsLoggedIn()) {
			Header("Location: index.php");
			die();
		}

		if($_x == '1' && $ctrl->doRegister($_POST)) {
			$ctrl->displayRegisterDone($_POST);
		}
		else {
			$ctrl->displayRegister($_POST);
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
		if(!$ctrl->getIsLoggedIn()) {
			Header("Location: index.php?w=account&s=login");
			die();
		}

		$ctrl->displayAccountSettings();
		break;
}

?>