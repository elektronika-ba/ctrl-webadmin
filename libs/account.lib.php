<?php

/*
* Project: CTRL-WebAdmin
* Author: Muris Pucic Trax <trax [AT] elektronika [DOT] ba>
* Version: 1.0
*/

class CtrlAccount {

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

  function displayLogin($formvars = array()) {
  	// add all missing keys to array
  	fixFormVars($formvars, array('email','password','remember'));

  	$tpl = $this->tpl;

    // assign the form vars
    $tpl->assign('post', $formvars);

    // assign error message
    $tpl->assign('error', $this->error);

    $tpl->display('login.html');
  }

  function doLogin($formvars = array()) {
  	// add all missing keys to array
  	fixFormVars($formvars, array('email','password','remember'));

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
  	fixFormVars($formvars, array('email','password','password_again','terms'));

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
  	fixFormVars($formvars, array('email','password','password_again','terms'));

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

}

?>
