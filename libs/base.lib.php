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
		
		$results = $mdb->query("SELECT b.IDbase, b.basename, b.baseid, b.timezone, b.dst, b.TXbase, b.crypt_key, b.last_online, b.online, (SELECT COUNT(*) FROM base_client WHERE IDbase=b.IDbase) AS linked_clients, (SELECT COUNT(*) FROM txserver2base WHERE IDbase=b.IDbase AND sent=0) AS pending_messages FROM base b WHERE b.IDaccount = %i AND (%i = -1 OR %i = b.IDbase)", $_SESSION['IDaccount'], $IDbase, $IDbase);
		
		return $results;
  }

  function editBase($formvars = array()) {
  	global $SERVER_EXTENSIONS;
  	
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
          'dst' => '0',
					'TXbase' => '0',
					'crypt_key' => '',
					'linked_clients' => '0',
					'pending_messages' => '0',
          'online' => '0',
				);
				
				// add Server Extensions related parameters
				// Android GCM is here?
				if(isset($SERVER_EXTENSIONS['se_android_gcm']) && $SERVER_EXTENSIONS['se_android_gcm']['enabled'] == 1) {
					$bases[0]['se_android_gcm_disable_status_change_event'] = '0';
					$bases[0]['se_android_gcm_disable_new_data_event'] = '0';
				}
		}
		else
		{
			// fetch data from db
			$bases = $this->getBase($formvars['IDbase']);
			if(count($bases)<=0) {
				return false;
			}

			// Add Server Extensions related parameters
			// Note: We can safely do SELECT...WHERE IDbase=$formvars['IDbase'] because getBase()+if() from above would stop us if security check failed

			// Android GCM is here?
			if(isset($SERVER_EXTENSIONS['se_android_gcm']) && $SERVER_EXTENSIONS['se_android_gcm']['enabled'] == 1) {
        $se_mdb = new MeekroDB(mysql_host, mysql_username, mysql_password, $SERVER_EXTENSIONS['se_android_gcm']['mysql_database']);
        $base_config = $se_mdb->queryFirstRow("SELECT * FROM base_config WHERE IDbase = %i", $formvars['IDbase']);        
        if($base_config === NULL) {
          $base_config['disable_status_change_event'] = '0';
          $base_config['disable_new_data_event'] = '0';
        }
        $bases[0]['se_android_gcm_disable_status_change_event'] = $base_config['disable_status_change_event'];
        $bases[0]['se_android_gcm_disable_new_data_event'] = $base_config['disable_new_data_event'];
			}
  	}

		$mdb = $this->mdb;

		// current timestamp
    $tpl->assign('current_time', date('Y-m-d H:i:s',time()));

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
    
    // enable/disable Server Extensions management
    $se_ext_cnt = 0;
    foreach($SERVER_EXTENSIONS as $extension => $params) {
    	if($params['enabled']) { // lets not even assign it to $tpl if it is not enabled
    		$tpl->assign($extension, $params['enabled']);
    		$se_ext_cnt++;
    	}
    }
    $tpl->assign('server_extensions_count', $se_ext_cnt);

    $tpl->display('bases_edit.html');

    return true;
  }

  function saveBase($formvars = array()) {
    global $SERVER_EXTENSIONS;
    
		$mdb = $this->mdb;

		// add all missing keys to array
		fixFormVars($formvars, array('IDbase','basename','crypt_key','IDclient','timezone','dst'));

		$return_to_edit = false;

		// adjust crypt key if it is not valid
		if(strlen($formvars['crypt_key']) != 32 || !ctype_xdigit($formvars['crypt_key'])) {
			$formvars['crypt_key'] = randomHex(32);
			$return_to_edit = true;
			$this->notifs['key_generated'] = true;
		}
    
    // From MOMENT.JS (moment.fn.zone): If the input is less than 16 and greater than -16, it will interpret your input as hours instead.
    // Because of that, we don't let user enter offset in this range.
    if($formvars['timezone'] > -16 && $formvars['timezone'] < 16) {
      $formvars['timezone'] = 0;
    }

    if($formvars['dst'] > 2 || $formvars['dst'] < 0) {
      $formvars['dst'] = 0;
    }

		// inserting new
		if($formvars['IDbase'] <= 0) {
			$baseid = $this->generateReallyUniqueBaseId(50);
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
        'dst' => $formvars['dst'],
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
        'dst' => $formvars['dst'],
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
    
    // Handle Server Extensions management
    // first lets check if we own this IDbase... easiest way, not the smartest
    $is_my_base = $this->getBase($formvars['IDbase']);
    if(count($is_my_base)<=0) {
      return false;
    }

    // Android GCM is here?
    if(isset($SERVER_EXTENSIONS['se_android_gcm']) && $SERVER_EXTENSIONS['se_android_gcm']['enabled'] == 1) {
      $se_mdb = new MeekroDB(mysql_host, mysql_username, mysql_password, $SERVER_EXTENSIONS['se_android_gcm']['mysql_database']);
      // insert, on duplicate update
      $se_mdb->insertUpdate('base_config', array(
        'IDbase' => $formvars['IDbase'],
        'disable_status_change_event' => (isset($formvars['se_android_gcm_disable_status_change_event'])) ? '1' : '0',
        'disable_new_data_event' => (isset($formvars['se_android_gcm_disable_new_data_event'])) ? '1' : '0',
      ));
    }

  	return array(
  		'return_to_edit' => $return_to_edit,
  		'IDbase' => $formvars['IDbase']
  	);
  }

  function generateReallyUniqueBaseId($tries) {
  	$mdb = $this->mdb;

		$i = 0;
		$baseid = '';
		while($i < $tries) {
			$baseid = randomHex(32);
			$check = $mdb->queryFirstRow("SELECT baseid FROM base WHERE baseid = %s", $baseid);
			if($check === NULL) {
				break;
			}
			$i++;
			$baseid = '';
		}

		return $baseid;
  }

  function regenBaseId($formvars = array()) {
  	$mdb = $this->mdb;

		// add all missing keys to array
		fixFormVars($formvars, array('IDbase'));

		$this->notifs['regen_done'] = true;

		$baseid = $this->generateReallyUniqueBaseId(50);
		if($baseid == '') {
			die('System error: Couldn\'t generate unique BaseID!');
		}

		$mdb->update('base', array(
			'baseid' => $baseid,
			), "IDbase = %i AND IDaccount = %i", $formvars['IDbase'], $_SESSION['IDaccount']);
  }

  function flushBaseQueue($formvars = array()) {
  	$mdb = $this->mdb;

		// add all missing keys to array
		fixFormVars($formvars, array('IDbase'));

		$this->notifs['queue_flushed'] = true;

		$mdb->delete('txserver2base', "IDbase = %i AND IDbase IN (SELECT IDbase FROM base WHERE IDaccount = %i)", $formvars['IDbase'], $_SESSION['IDaccount']);
  }

  function deleteBase($formvars = array()) {
    global $SERVER_EXTENSIONS;

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

    // Handle Server Extensions deletion
    // first lets check if we own this IDbase... easiest way, not the smartest
    $is_my_base = $this->getBase($formvars['IDbase']);
    if(count($is_my_base) == 1) {
      // Android GCM is here?
      if(isset($SERVER_EXTENSIONS['se_android_gcm']) && $SERVER_EXTENSIONS['se_android_gcm']['enabled'] == 1) {
        $se_mdb = new MeekroDB(mysql_host, mysql_username, mysql_password, $SERVER_EXTENSIONS['se_android_gcm']['mysql_database']);
        $se_mdb->delete('base_config', "IDbase = %i", $formvars['IDbase']);
      }

    }

    // Lastly delete the Base record
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
