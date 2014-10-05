<?php

/*
* Project: CTRL-WebAdmin
* Author: Muris Pucic Trax <trax [AT] elektronika [DOT] ba>
* Version: 1.0
*/

class Ctrl {

  // smarty template object
  var $tpl = null;

  // errors
  var $error = null;

  // MySQL class object
  var $mdb = null;

  /**
  * class constructor
  */
  function __construct() {
		// connect to MySQL
		$this->mdb = new MeekroDB(mysql_host, mysql_username, mysql_password, mysql_database);

    // instantiate the template object
    $this->tpl = new Ctrl_Smarty;
  }

	function getUserAccount($IDaccount) {
		$mdb = $this->mdb;

		$account = $mdb->queryFirstRow("SELECT * FROM account WHERE active = 1 AND IDaccount = %i LIMIT 1", $IDaccount);
		return $account;
	}

  function getIsLoggedIn() {
  	if( isset($_SESSION['IDaccount']) ) {
  		if( $this->getUserAccount($_SESSION['IDaccount']) !== NULL ) {
  			return true;
  		}
  	}

  	return false;
  }

  // add missing requiredvars into formvars
 	function fixFormVars(&$formvars, $requiredvars) {
  	if(count($requiredvars)<=0) return;
  
		for($i=0; $i<count($requiredvars); $i++) {
 			if(!array_key_exists($requiredvars[$i], $formvars)) {
 				$formvars[$requiredvars[$i]] = '';
 			}
 		}
  }

	///////////////////////////////
	// Bases management
	///////////////////////////////
  function displayBases($formvars = array()) {
  	$tpl = $this->tpl;

		// assign menu highlighter
    $tpl->assign('page_id', 'base');

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
		$this->fixFormVars($formvars, array('IDbase'));

		// assign menu highlighter
    $tpl->assign('page_id', 'base');

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

    $tpl->display('bases_edit.html');

    return true;
  }

  function saveBase($formvars = array()) {
		$mdb = $this->mdb;

		// add all missing keys to array
		$this->fixFormVars($formvars, array('IDbase','basename','crypt_key','IDclient'));

		// set crypt key if it is not valid
		if(strlen($formvars['crypt_key']) != 32 || !ctype_xdigit($formvars['crypt_key'])) {
			$formvars['crypt_key'] = randomHex(32);
		}

		// inserting new
		if($formvars['IDbase'] <= 0) {
			$baseid = randomHex(32);

			$mdb->insert('base', array(
				'IDaccount' => $_SESSION['IDaccount'],
				'baseid' => $baseid,
				'basename' => $formvars['basename'],
				'crypt_key' => $formvars['crypt_key'],
				)
			);
			
			$IDbase = $mdb->insertId(); // continue as we were updating...
		}
		// updating current
		else {
			$mdb->debugMode();
		
			$mdb->update('base', array(
				'IDbase' => $formvars['IDbase'],
				'basename' => $formvars['basename'],
				'crypt_key' => $formvars['crypt_key'],
				), "IDbase = %i AND IDaccount = %i", $formvars['IDbase'], $_SESSION['IDaccount']);
		}

		// insert/update linked clients table
		// delete all and add new, that's easier than updating :)
		$mdb->delete('base_client', "IDbase = %i AND IDbase IN (SELECT IDbase FROM base WHERE IDaccount = %i)", $formvars['IDbase'], $_SESSION['IDaccount']);

		// add link, securelly
		$available_IDclients = $mdb->queryOneColumn("IDclient", "SELECT IDclient FROM client WHERE IDaccount = %i", $_SESSION['IDaccount']);
		foreach($available_IDclients as $IDclient) {
			if(in_array($IDclient, $formvars['IDclient'])) {
				$mdb->insert("base_client", array(
					'IDbase' => $formvars['IDbase'],
					'IDclient' => $IDclient,
				));
			}
		}
		
  	return true;
  }
  
  function deleteBase($formvars = array()) {
		$mdb = $this->mdb;

		// add all missing keys to array
		$this->fixFormVars($formvars, array('IDbase'));

		$mdb->delete('base_client', "IDbase = %i AND IDbase IN (SELECT IDbase FROM base WHERE IDaccount = %i)", $formvars['IDbase'], $_SESSION['IDaccount']);  
		$mdb->delete('txserver2base', "IDbase = %i AND IDbase IN (SELECT IDbase FROM base WHERE IDaccount = %i)", $formvars['IDbase'], $_SESSION['IDaccount']);  
		$mdb->delete('base', "IDbase = %i AND IDaccount = %i", $formvars['IDbase'], $_SESSION['IDaccount']);  

		return true;
  }

	///////////////////////////////
	// Account management
	///////////////////////////////
  function displayLogin($formvars = array()) {
  	// add all missing keys to array
  	$this->fixFormVars($formvars, array('email','password','remember'));

  	$tpl = $this->tpl;

    // assign the form vars
    $tpl->assign('post', $formvars);

    // assign error message
    $tpl->assign('error', $this->error);

    $tpl->display('login.html');
  }

  function doLogin($formvars = array()) {
  	// add all missing keys to array
  	$this->fixFormVars($formvars, array('email','password','remember'));

		if(!filter_var($formvars['email'], FILTER_VALIDATE_EMAIL)) {
			$this->error = 'email_error';
			return false;
		}

		$mdb = $this->mdb;

		$hashedpassword = create_hash($formvars['password']);

		$account = $mdb->queryFirstRow("SELECT * FROM account WHERE email = %s LIMIT 1", $formvars['email']);
		if($account === NULL) {
			$this->error = 'wrong_password'; // this is actually: wrong_email but we don't tell users that!
			return false;
		}
		elseif($account['active'] == 0) {
			$this->error = 'inactive';
			return false;
		}
		else {
			// validate hashed password
			if( validate_password($formvars['password'], $account['password']) ) {
				$this->error = null;

				// REMEMBER ME: http://stackoverflow.com/questions/12091951/php-sessions-login-with-remember-me

				$_SESSION['IDaccount'] = $account['IDaccount'];
				return true;
			}
			else {
				$this->error = 'wrong_password';
				return false;
			}
		}
  }

  function displayRegister($formvars = array()) {
  	// add all missing keys to array
  	$this->fixFormVars($formvars, array('email','password','password_again','terms'));

  	$tpl = $this->tpl;

    // assign the form vars
    $tpl->assign('post', $formvars);

    // assign error message
    $tpl->assign('error', $this->error);
    
    // recaptcha
    $tpl->assign('recaptcha', recaptcha_get_html(reCAPTCHA_PUBLIC_KEY));

    $tpl->display('register.html');
  }

  function doRegister($formvars = array()) {
  	$tpl = $this->tpl;
  
  	// add all missing keys to array
  	$this->fixFormVars($formvars, array('email','password','password_again','terms'));

		$mdb = $this->mdb;

		if (!filter_var($formvars['email'], FILTER_VALIDATE_EMAIL)) {
			$this->error = 'email_missing';
			return false;
		}
		elseif(strlen($formvars['password'])<6) {
			$this->error = 'password_missing';
			return false;
		}
		elseif($formvars['password'] != $formvars['password_again']) {
			$this->error = 'password_mismatch';
			return false;
		}
		elseif($formvars['terms'] != '1') {
			$this->error = 'terms';
			return false;
		}

		/*
		// reCAPTCHA validation - enable when published to web server
	  $reCAPTCHA_RESPONSE = recaptcha_check_answer (reCAPTCHA_PRIVATE_KEY, $_SERVER["REMOTE_ADDR"], $_POST["recaptcha_challenge_field"], $_POST["recaptcha_response_field"]);
	  if (!$reCAPTCHA_RESPONSE->is_valid) {
	  	$this->error = 'recaptcha';
	  	return;
	  }
	  */

	  // validate e-mail now
		$account = $mdb->queryFirstRow("SELECT * FROM account WHERE email = %s LIMIT 1", $formvars['email']);
		if($account !== NULL) {
			$this->error = 'email_used';
			return false;
		}

		// we validated everything but e-mail so far
		$hashedpassword = create_hash($formvars['password']);

		// insert into database
		$mdb->insert('account', array(
			'email' => $formvars['email'],
			'password' => $hashedpassword,
			'active' => 0,
		));

		// send activation e-mail
		$this->resendActivationEmail($formvars['email']);

		return true;
  }

	function doActivateAccount($formvars = array()) {
		if(!array_key_exists('hash', $formvars)) {
			return false;
		}

		$mdb = $this->mdb;

		$mdb->update("account", array('active' => 1), "active = 0 AND md5(password) = %s", $formvars['hash']);
		if($mdb->affectedRows() <= 0) {
			return false;
		}

		$account = $mdb->queryFirstRow("SELECT email FROM account WHERE active = 1 AND md5(password) = %s LIMIT 1", $formvars['hash']);

		return $account['email'];
	}

  function resendActivationEmail($email) {
  	$mdb = $this->mdb;
  
		$account = $mdb->queryFirstRow("SELECT * FROM account WHERE active = 0 AND email = %s LIMIT 1", $email);
		if($account === NULL) {
			return false;
		}

		// send activation e-mail
		$message = new Ctrl_Smarty;
		$message->assign('activation_hash', md5($account['password']));
		$message->assign('ip_address', $_SERVER['REMOTE_ADDR']);
		$message->assign('timestamp', $account['stamp_system']);
		sendMail($email, 'Activate your CTRL account', $message->fetch('register_activation_email_body.txt'));

		return true;
  }

  function completeRecovery($formvars = array()) {
  	if( !array_key_exists('email', $formvars) || !filter_var($formvars['email'], FILTER_VALIDATE_EMAIL) || !array_key_exists('hash', $formvars) || strlen($formvars['hash']) != 32 ) {
  		return false;
  	}
  
  	$mdb = $this->mdb;
  
  	$newpass = randomPassword(8);
  	$hashedpassword = create_hash($newpass);
  
		$mdb->update("account", array('recovery_started' => $mdb->sqleval('NULL'), 'password' => $hashedpassword), "active = 1 AND (recovery_started IS NOT NULL AND recovery_started >= DATE_SUB(NOW(), INTERVAL 10 MINUTE)) AND md5(password) = %s AND email = %s", $formvars['hash'], $formvars['email']);
		if($mdb->affectedRows() <= 0) {
			return false;
		}
		// send recovery done notification e-mail
		$message = new Ctrl_Smarty;
		$message->assign('ip_address', $_SERVER['REMOTE_ADDR']);
		$message->assign('timestamp', date('y-m-d H:i:s', time()));
		sendMail($formvars['email'], 'Your new CTRL account password', $message->fetch('recovery_done_email_body.txt'));

		return $newpass;
  }

  function displayRecoveryDone($newpass, $email) {
  	$tpl = $this->tpl;

    $tpl->assign('newpass', $newpass);
    $tpl->assign('email', $email);

    $tpl->display('recovery_done.html');
  }

  function startRecovery($formvars = array()) {
  	if( !array_key_exists('email', $formvars) || !filter_var($formvars['email'], FILTER_VALIDATE_EMAIL) ) {
  		return false;
  	}

  	$mdb = $this->mdb;

		// only one password recovery process can be started each 10 minutes for one particular user
		$mdb->update("account", array('recovery_started' => $mdb->sqleval('NOW()')), "active = 1 AND (recovery_started IS NULL OR recovery_started <= DATE_SUB(NOW(), INTERVAL 10 MINUTE)) AND email = %s", $formvars['email']);
		if($mdb->affectedRows() <= 0) {
			return false;
		}

		$account = $mdb->queryFirstRow("SELECT email, password FROM account WHERE active = 1 AND email = %s AND recovery_started IS NOT NULL LIMIT 1", $formvars['email']);
		if($account === NULL) {
			return false;
		}

		// send recovery e-mail
		$message = new Ctrl_Smarty;
		$message->assign('email', $formvars['email']);
		$message->assign('recovery_hash', md5($account['password']));
		$message->assign('ip_address', $_SERVER['REMOTE_ADDR']);
		$message->assign('timestamp', date('y-m-d H:i:s', time()));
		sendMail($account['email'], 'Recover your CTRL account', $message->fetch('recovery_email_body.txt'));

		return true;
  }

  function displayRecoveryStarted($formvars = array()) {
  	$tpl = $this->tpl;

    $tpl->assign('email', $formvars['email']);

    $tpl->display('recovery_started.html');
  }

  function displayRegisterDone($formvars = array()) {
  	$tpl = $this->tpl;

    $tpl->assign('email', $formvars['email']);

    $tpl->display('register_done.html');
  }


	function displayDashboard() {
  	$tpl = $this->tpl;

		// assign menu highlighter
    $tpl->assign('page_id', 'dashboard');

    $tpl->display('dashboard.html');
	}















  /**
  * get the guestbook entries
  */
  function getEntries() {
    try {
      foreach($this->pdo->query(
        "select * from GUESTBOOK order by EntryDate DESC") as $row)
      $rows[] = $row;
    } catch (PDOException $e) {
      print "Error!: " . $e->getMessage();
      return false;
    } 	
    return $rows;   
  }

  /**
  * display the guestbook
  *
  * @param array $data the guestbook data
  */
  function displayBook($data = array()) {

    $this->tpl->assign('data', $data);
    $this->tpl->display('guestbook.tpl');        

  }
  
  
  
}

?>
