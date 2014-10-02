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
    case 'add':
        // adding a guestbook entry
        $guestbook->displayForm();
        break;
    case 'submit':
        // submitting a guestbook entry
        $guestbook->mungeFormData($_POST);
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
			$ctrl->displayLogin($_POST);
		}
		break;

	case 'logout':
		session_destroy();
		Header("Location: index.php");
		die();	
		break;

	default:
		/*
		if(!$ctrl->getIsLoggedIn()) {
			Header("Location: index.php?w=login");
			die();
		}

		// logged in, give him the dashboard
		$ctrl->displayDashboard();
		*/
print_r($ctrl->getUserAccount($_SESSION['IDaccount']));
if($ctrl->getIsLoggedIn()) echo "da"; else echo "ne";
		break;
}

?>