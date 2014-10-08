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
		
		$results = $mdb->query("SELECT c.IDclient, c.auth_token, c.TXclient, c.clientname, (SELECT COUNT(*) FROM base_client WHERE IDclient=c.IDclient) AS linked_bases, (SELECT COUNT(*) FROM txserver2client WHERE IDclient=c.IDclient AND sent=0) AS pending_messages FROM client c WHERE c.IDaccount = %i AND (%i = -1 OR %i = c.IDclient)", $_SESSION['IDaccount'], $IDclient, $IDclient);
		
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

  function saveBase($formvars = array()) {
		$mdb = $this->mdb;

		// add all missing keys to array
		fixFormVars($formvars, array('IDbase','basename','crypt_key','IDclient','timezone'));

		$return_to_edit = false;

		// adjust crypt key if it is not valid
		if(strlen($formvars['crypt_key']) != 32 || !ctype_xdigit($formvars['crypt_key'])) {
			$formvars['crypt_key'] = randomHex(32);
			$return_to_edit = true;
			$this->notifs['key_generated'] = true;
		}

		// inserting new
		if($formvars['IDbase'] <= 0) {
			// don't duplicate baseid!
			$i = 0;
			while($i < 50) {
				$baseid = randomHex(32);
				$check = $mdb->queryFirstRow("SELECT baseid FROM base WHERE baseid = %s", $baseid);
				if($check === NULL) {
					break;
				}
				$i++;
				$baseid = '';
			}

			if($baseid == '') {
				die('System error: Couldn\'t generate unique BaseID!');
			}
			
			if(strlen($formvars['basename'])<=0) {
				$formvars['basename'] = 'Base ' . date('y-m-d H:i:s', time());
			}

			$mdb->insert('base', array(
				'IDaccount' => $_SESSION['IDaccount'],
				'baseid' => $baseid,
				'basename' => $formvars['basename'],
				'timezone' => $formvars['timezone'],
				'crypt_key' => $formvars['crypt_key'],
				)
			);

			$this->notifs['base_added'] = true;

			$formvars['IDbase'] = $mdb->insertId(); // continue as we were updating...

			$return_to_edit = true;
		}
		// updating current
		else {
			$mdb->update('base', array(
				'basename' => $formvars['basename'],
				'crypt_key' => $formvars['crypt_key'],
				'timezone' => $formvars['timezone'],
				), "IDbase = %i AND IDaccount = %i", $formvars['IDbase'], $_SESSION['IDaccount']);
				
				$this->notifs['base_updated'] = true;
		}

		// insert/update linked clients table
		// delete all and add new, that's easier than updating :)
		$mdb->delete('base_client', "IDbase = %i AND IDbase IN (SELECT IDbase FROM base WHERE IDaccount = %i)", $formvars['IDbase'], $_SESSION['IDaccount']);

		// add link, securelly
		settype($formvars['IDclient'],'array');
		$available_IDclients = $mdb->queryOneColumn("IDclient", "SELECT IDclient FROM client WHERE IDaccount = %i", $_SESSION['IDaccount']);
		foreach($available_IDclients as $IDclient) {
			if(in_array($IDclient, $formvars['IDclient'])) {
				$mdb->insert("base_client", array(
					'IDbase' => $formvars['IDbase'],
					'IDclient' => $IDclient,
				));
			}
		}

  	return array(
  		'return_to_edit' => $return_to_edit,
  		'IDbase' => $formvars['IDbase']
  	);
  }

  function flushBaseQueue($formvars = array()) {
  	$mdb = $this->mdb;

		// add all missing keys to array
		fixFormVars($formvars, array('IDbase'));

		$this->notifs['queue_flushed'] = true;

		$mdb->delete('txserver2base', "IDbase = %i AND IDbase IN (SELECT IDbase FROM base WHERE IDaccount = %i)", $formvars['IDbase'], $_SESSION['IDaccount']);
  }

  function deleteBase($formvars = array()) {
		$mdb = $this->mdb;

		// add all missing keys to array
		fixFormVars($formvars, array('IDbase'));

		$this->notifs['base_deleted'] = true;

		$mdb->delete('base_client', "IDbase = %i AND IDbase IN (SELECT IDbase FROM base WHERE IDaccount = %i)", $formvars['IDbase'], $_SESSION['IDaccount']);  
		$mdb->delete('txserver2base', "IDbase = %i AND IDbase IN (SELECT IDbase FROM base WHERE IDaccount = %i)", $formvars['IDbase'], $_SESSION['IDaccount']);  

		// security check for log file deletion
  	$base = $mdb->queryFirstRow("SELECT IDbase FROM base WHERE IDbase = %i AND IDaccount = %i", $formvars['IDbase'], $_SESSION['IDaccount']);
  	if(count($base) !== NULL) {
  		$path = server_clientsock_log_path;
  		$file = $path . $base['IDbase'] . '.json';
  		if(file_exists($file)) {
				unlink($file);		
			}
  	}

		$mdb->delete('base', "IDbase = %i AND IDaccount = %i", $formvars['IDbase'], $_SESSION['IDaccount']);
  }

  function downloadBaseLog($formvars = array()) {
  	$mdb = $this->mdb;

		// add all missing keys to array
		fixFormVars($formvars, array('IDbase'));

  	// security check
  	$base = $mdb->queryFirstRow("SELECT IDbase FROM base WHERE IDbase = %i AND IDaccount = %i", $formvars['IDbase'], $_SESSION['IDaccount']);
  	if(count($base) === NULL) {
  		return false;
  	}

  	$path = server_clientsock_log_path;
  	$file = $path . $base['IDbase'] . '.json';
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
