<?php

/*
* Project: CTRL-WebAdmin
* Author: Muris Pucic Trax <trax [AT] elektronika [DOT] ba>
* Version: 1.0
*/

class CtrlClient {

  // smarty template object
  var $tpl = null;

  // errors
  var $error = null;

  // MySQL class object
  var $mdb = null;

  // notifications
  var $notifs = array();

  /**
  * class constructor
  */
  function __construct() {
		// connect to MySQL
		$this->mdb = new MeekroDB(mysql_host, mysql_username, mysql_password, mysql_database);

    // instantiate the template object
    $this->tpl = new Ctrl_Smarty;
  }

  function displayClients($formvars = array()) {
  	$tpl = $this->tpl;

		// assign menu highlighter
    $tpl->assign('page_id', 'client');

    // assign notifications
    $tpl->assign('notifs', $this->notifs);

    $tpl->assign('data', $this->getClient());

    $tpl->display('clients.html');
  }

  function getClient($IDclient = -1) {
		$mdb = $this->mdb;

		$results = $mdb->query("SELECT c.IDclient, c.auth_token, c.TXclient, c.clientname, c.last_online, c.online, (SELECT COUNT(*) FROM base_client WHERE IDclient=c.IDclient) AS linked_bases, (SELECT COUNT(*) FROM txserver2client WHERE IDclient=c.IDclient AND sent=0) AS pending_messages FROM client c WHERE c.IDaccount = %i AND (%i = -1 OR %i = c.IDclient)", $_SESSION['IDaccount'], $IDclient, $IDclient);

		return $results;
  }

  function editClient($formvars = array()) {
  	$tpl = $this->tpl;

		// add all missing keys to array
		fixFormVars($formvars, array('IDclient'));

		// assign menu highlighter
    $tpl->assign('page_id', 'client');

    // assign notifications
    $tpl->assign('notifs', $this->notifs);

		$clients = array();
		if($formvars['IDclient'] <= 0)
		{
			$clients[] = array(
					'IDclient' => '-1',
					'clientname' => '',
					'auth_token' => '',
					'TXclient' => '0',
					'linked_bases' => '0',
					'pending_messages' => '0',
				);
		}
		else
		{
			// fetch data from db
			$clients = $this->getClient($formvars['IDclient']);
			if(count($clients)<=0) {
				return false;
			}
  	}

		$mdb = $this->mdb;

		// get linked clients for this IDclient
		$linked_bases = $mdb->query("SELECT b.IDbase, b.basename, IF(bc.IDbase IS NULL, -1, bc.IDbase) AS sel_IDbase FROM base b LEFT JOIN base_client bc ON (bc.IDbase=b.IDbase AND bc.IDclient = %i) WHERE b.IDaccount = %i ORDER BY basename", $formvars['IDclient'], $_SESSION['IDaccount']);

		$opt = array();
		$val = array();
		$selected = array();
		for($i=0; $i<count($linked_bases); $i++) {
			$r = $linked_bases[$i];
			$val[] = $r['IDbase'];
			$opt[] = $r['basename'];
			if($r['sel_IDbase'] != -1) {
				$selected[] = $r['IDbase'];
			}
		}

    $tpl->assign('IDbase_val', $val);
    $tpl->assign('IDbase_opt', $opt);
    $tpl->assign('IDbase_sel', $selected);

    $tpl->assign('data', $clients[0]);
    
		$path = server_clientsock_log_path;
		$file = $path . $formvars['IDclient'] . '.json';
    $tpl->assign('log_available', file_exists($file));

    $tpl->display('clients_edit.html');

    return true;
  }

  function saveClient($formvars = array()) {
		$mdb = $this->mdb;

		// add all missing keys to array
		fixFormVars($formvars, array('IDclient','clientname','IDbase'));

		$return_to_edit = false;

		// inserting new
		if($formvars['IDclient'] <= 0) {
			$auth_token = $this->generateReallyUniqueAuthToken(50);
			if($auth_token == '') {
				die('System error: Couldn\'t generate unique Auth Token!');
			}

			if(strlen($formvars['clientname'])<=0) {
				$formvars['clientname'] = 'Client ' . date('y-m-d H:i:s', time());
			}

			$mdb->insert('client', array(
				'IDaccount' => $_SESSION['IDaccount'],
				'auth_token' => $auth_token,
				'clientname' => $formvars['clientname'],
				)
			);

			$this->notifs['client_added'] = true;

			$formvars['IDclient'] = $mdb->insertId(); // continue as we were updating...

			$return_to_edit = true;
		}
		// updating current
		else {
			$mdb->update('client', array(
				'clientname' => $formvars['clientname'],
				), "IDclient = %i AND IDaccount = %i", $formvars['IDclient'], $_SESSION['IDaccount']);
				
				$this->notifs['client_updated'] = true;
		}

		// insert/update linked bases table
		// delete all and add new, that's easier than updating :)
		$mdb->delete('base_client', "IDclient = %i AND IDclient IN (SELECT IDclient FROM client WHERE IDaccount = %i)", $formvars['IDclient'], $_SESSION['IDaccount']);

		// add link, securelly
		settype($formvars['IDbase'],'array');
		$available_IDbases = $mdb->queryOneColumn("IDbase", "SELECT IDbase FROM base WHERE IDaccount = %i", $_SESSION['IDaccount']);
		foreach($available_IDbases as $IDbase) {
			if(in_array($IDbase, $formvars['IDbase'])) {
				$mdb->insert("base_client", array(
					'IDbase' => $IDbase,
					'IDclient' => $formvars['IDclient'],
				));
			}
		}

  	return array(
  		'return_to_edit' => $return_to_edit,
  		'IDclient' => $formvars['IDclient']
  	);
  }
  
  function regenAuthToken($formvars = array()) {
		$mdb = $this->mdb;
	
		// add all missing keys to array
		fixFormVars($formvars, array('IDclient'));

		$this->notifs['regen_done'] = true;

		$auth_token = $this->generateReallyUniqueAuthToken(50);
		if($auth_token == '') {
			die('System error: Couldn\'t generate unique Auth Token!');
		}

		$mdb->update('client', array(
			'auth_token' => $auth_token,
			), "IDclient = %i AND IDaccount = %i", $formvars['IDclient'], $_SESSION['IDaccount']);
  }

  function generateReallyUniqueAuthToken($tries) {
  	$mdb = $this->mdb;

		$i = 0;
		$auth_token = '';
		while($i < $tries) {
			$auth_token = randomPassword(50);
			$check = $mdb->queryFirstRow("SELECT auth_token FROM client WHERE auth_token = %s", $auth_token);
			if($check === NULL) {
				break;
			}
			$i++;
			$auth_token = '';
		}

		return $auth_token;
  }

  function flushClientQueue($formvars = array()) {
  	$mdb = $this->mdb;

		// add all missing keys to array
		fixFormVars($formvars, array('IDclient'));

		$this->notifs['queue_flushed'] = true;

		$mdb->delete('txserver2client', "IDclient = %i AND IDclient IN (SELECT IDclient FROM client WHERE IDaccount = %i)", $formvars['IDclient'], $_SESSION['IDaccount']);
  }

  function deleteClient($formvars = array()) {
		$mdb = $this->mdb;

		// add all missing keys to array
		fixFormVars($formvars, array('IDclient'));

		$this->notifs['client_deleted'] = true;

		$mdb->delete('base_client', "IDclient = %i AND IDclient IN (SELECT IDclient FROM client WHERE IDaccount = %i)", $formvars['IDclient'], $_SESSION['IDaccount']);  
		$mdb->delete('txserver2client', "IDclient = %i AND IDclient IN (SELECT IDclient FROM client WHERE IDaccount = %i)", $formvars['IDclient'], $_SESSION['IDaccount']);  

		// security check for log file deletion
  	$client = $mdb->queryFirstRow("SELECT IDclient FROM client WHERE IDclient = %i AND IDaccount = %i", $formvars['IDclient'], $_SESSION['IDaccount']);
  	if(count($client) !== NULL) {
  		$path = server_clientsock_log_path;
  		$file = $path . $client['IDclient'] . '.json';
  		if(file_exists($file)) {
				unlink($file);		
			}
  	}

		$mdb->delete('client', "IDclient = %i AND IDaccount = %i", $formvars['IDclient'], $_SESSION['IDaccount']);
  }

  function downloadClientLog($formvars = array()) {
  	$mdb = $this->mdb;

		// add all missing keys to array
		fixFormVars($formvars, array('IDclient'));

  	// security check
  	$client = $mdb->queryFirstRow("SELECT IDclient FROM client WHERE IDclient = %i AND IDaccount = %i", $formvars['IDclient'], $_SESSION['IDaccount']);
  	if(count($client) === NULL) {
  		return false;
  	}

  	$path = server_clientsock_log_path;
  	$file = $path . $client['IDclient'] . '.json';
		if(file_exists($file))
		{
				header('Content-Description: File Transfer');
				header('Content-Type: application/octet-stream');
				header('Content-Disposition: attachment; filename='.basename($file));
				header('Content-Transfer-Encoding: binary');
				header('Expires: 0');
				header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
				header('Pragma: public');
				header('Content-Length: ' . filesize($file));
				ob_clean();
				flush();
				readfile($file);
				die();
		}

		return false;
  }

}

?>
