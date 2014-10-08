<?php

/*
* Project: CTRL-WebAdmin
* Author: Muris Pucic Trax <trax [AT] elektronika [DOT] ba>
* Version: 1.0
*/

class CtrlBase {

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

  function displayBases($formvars = array()) {
  	$tpl = $this->tpl;

		// assign menu highlighter
    $tpl->assign('page_id', 'base');

    // assign notifications
    $tpl->assign('notifs', $this->notifs);

    $tpl->assign('data', $this->getBase());

    $tpl->display('bases.html');
  }

  function getBase($IDbase = -1) {
		$mdb = $this->mdb;
		
		$results = $mdb->query("SELECT b.IDbase, b.basename, b.baseid, b.timezone, b.TXbase, b.crypt_key, (SELECT COUNT(*) FROM base_client WHERE IDbase=b.IDbase) AS linked_clients, (SELECT COUNT(*) FROM txserver2base WHERE IDbase=b.IDbase AND sent=0) AS pending_messages FROM base b WHERE b.IDaccount = %i AND (%i = -1 OR %i = b.IDbase)", $_SESSION['IDaccount'], $IDbase, $IDbase);
		
		return $results;
  }

  function editBase($formvars = array()) {
  	$tpl = $this->tpl;

		// add all missing keys to array
		fixFormVars($formvars, array('IDbase'));

		// assign menu highlighter
    $tpl->assign('page_id', 'base');
    
    // assign notifications
    $tpl->assign('notifs', $this->notifs);

		$bases = array();
		if($formvars['IDbase'] <= 0)
		{
			$bases[] = array(
					'IDbase' => '-1',
					'basename' => '',
					'baseid' => '',
					'timezone' => '0',
					'TXbase' => '0',
					'crypt_key' => '',
					'linked_clients' => '0',
					'pending_messages' => '0',
				);
		}
		else
		{
			// fetch data from db
			$bases = $this->getBase($formvars['IDbase']);
			if(count($bases)<=0) {
				return false;
			}
  	}

		$mdb = $this->mdb;

		// current timestamp
    $tpl->assign('current_time', date('Y-m-d H:i:s',time()));
    $tpl->assign('offset_time', date('Y-m-d H:i:s',time()+($bases[0]['timezone'] * 60)));

		// get linked clients for this IDbase
		$linked_clients = $mdb->query("SELECT c.IDclient, c.clientname, IF(bc.IDclient IS NULL, -1, bc.IDclient) AS sel_IDclient FROM client c LEFT JOIN base_client bc ON (bc.IDclient=c.IDclient AND bc.IDbase = %i) WHERE c.IDaccount = %i ORDER BY clientname", $formvars['IDbase'], $_SESSION['IDaccount']);

		$opt = array();
		$val = array();
		$selected = array();
		for($i=0; $i<count($linked_clients); $i++) {
			$r = $linked_clients[$i];
			$val[] = $r['IDclient'];
			$opt[] = $r['clientname'];
			if($r['sel_IDclient'] != -1) {
				$selected[] = $r['IDclient'];
			}
		}

    $tpl->assign('IDclient_val', $val);
    $tpl->assign('IDclient_opt', $opt);
    $tpl->assign('IDclient_sel', $selected);

    $tpl->assign('data', $bases[0]);
    
		$path = server_basesock_log_path;
		$file = $path . $formvars['IDbase'] . '.json';
    $tpl->assign('log_available', file_exists($file));

    $tpl->display('bases_edit.html');

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

  function regenBaseId($formvars = array()) {
  	$mdb = $this->mdb;

		// add all missing keys to array
		fixFormVars($formvars, array('IDbase'));

		$this->notifs['regen_done'] = true;
		
		// TODO: NAPRAVI ME
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
  		$path = server_basesock_log_path;
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

  	$path = server_basesock_log_path;
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
