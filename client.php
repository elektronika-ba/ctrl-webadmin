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
  // QR Code Image
  case 'qrcode':
    include('./phpqrcode/qrlib.php');
    $client = $ctrlClient->getClient($_GET['IDclient']); // this will not return other client's auth_token, don't worry
    if(count($client) == 1) {
      $authToken = $client[0]['auth_token'];    
      QRcode::png($authToken);
    }
    else
    {
      Header("Location: http://www.hotforsecurity.com/wp-content/uploads/2012/08/top-10-funniest-spam-images-3.jpg");
    }
    die();
    break;

	// Editing
	case 'edit':
		if(!$ctrlClient->editClient($_GET)) {
			Header("Location: index.php?w=client");
			die();
		}
		break;

	// Download log file
	case 'getlog':
		if(!$ctrlClient->downloadClientLog($_GET)) {
			echo "No log file available.";
		}
		break;

	// Flush pending messages
	case 'flush':
		$ctrlClient->flushClientQueue($_GET);
		if(!$ctrlClient->editClient($_GET)) {
			Header("Location: index.php?w=client");
			die();
		}
		break;

	// Re-generating Auth Token
	case 'regenauthtoken':
		$ctrlClient->regenAuthToken($_GET);
		if(!$ctrlClient->editClient($_GET)) {
			Header("Location: index.php?w=client");
			die();
		}
		break;

	// Saving/updating
	case 'save':
		$r = $ctrlClient->saveClient($_POST);

		if($r['return_to_edit'] != true) {
			$ctrlClient->displayClients();
		}
		else {
			if(!$ctrlClient->editClient(array('IDclient' => $r['IDclient']))) {
				Header("Location: index.php?w=client");
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