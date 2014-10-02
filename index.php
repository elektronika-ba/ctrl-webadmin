<?php

/*
* Project: CTRL-WebAdmin
* Author: Muris Pucic Trax <trax [AT] elektronika [DOT] ba>
* Version: 1.0
*/

session_start();

// include the setup script
include('./libs/ctrl_setup.php');

// create guestbook object
$ctrl = new Ctrl;

$_w = isset($_REQUEST['w']) ? $_REQUEST['w'] : '';
$_s = isset($_REQUEST['s']) ? $_REQUEST['s'] : '';

switch($_w) {
/*
    case 'submit':
        // submitting a guestbook entry
        if($guestbook->isValidForm($_POST)) {
            $guestbook->addEntry($_POST);
            $guestbook->displayBook($guestbook->getEntries());
        } else {
            $guestbook->displayForm($_POST);
        }
        break;
*/

	case 'login':
		if($ctrl->getIsLoggedIn()) {
			Header("Location: index.php?w=logout");
			die();
		}

		if($_s == '1' && $ctrl->doLogin($_POST)) {
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

	case 'register':
		if($ctrl->getIsLoggedIn()) {
			Header("Location: index.php?w=logout");
			die();
		}

		if($_s == '1' && $ctrl->doRegister($_POST)) {
			Header("Location: index.php");
			die();
		}
		else {
			$ctrl->displayRegister($_POST);
		}
		break;

	case 'logout':
		session_destroy();
		Header("Location: index.php");
		die();	
		break;

	default:
		if(!$ctrl->getIsLoggedIn()) {
			Header("Location: index.php?w=login");
			die();
		}

		// logged in, give him the dashboard
		$ctrl->displayDashboard();
		break;
}

?>