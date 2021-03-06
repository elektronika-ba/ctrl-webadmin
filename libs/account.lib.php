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
		// http://stackoverflow.com/questions/520237/how-do-i-expire-a-php-session-after-30-minutes
		// The best solution is to implement a session timeout of your own. Use a simple time stamp that denotes the time of the last activity (i.e. request) and update it with every request:
		if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > SESSION_EXPIRY_MS)) {
				// last request was more than 30 minutes ago
				session_unset(); // unset $_SESSION variable for the run-time 
				session_destroy(); // destroy session data in storage

				session_start(); // (re)start with new session... we can also do 'return false;' here but lets continue with code because next if(isset(... will return false since we just destroyed the session
		}
		$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp

  	if( isset($_SESSION['IDaccount']) ) {
  		if( $this->getUserAccount($_SESSION['IDaccount']) !== NULL ) {

				// http://stackoverflow.com/questions/520237/how-do-i-expire-a-php-session-after-30-minutes
				// You can also use an additional time stamp to regenerate the session ID periodically to avoid attacks on sessions like session fixation:
				if (!isset($_SESSION['CREATED'])) {
						$_SESSION['CREATED'] = time();
				}
				else if (time() - $_SESSION['CREATED'] > SESSION_EXPIRY_MS) {
						// session started more than 30 minutes ago
						session_regenerate_id(true);    // change session ID for the current session and invalidate old session ID
						$_SESSION['CREATED'] = time();  // update creation time
				}

  			return true;
  		}
  	}

  	return false;
  }

  function displayAccountSettings() {
  	$tpl = $this->tpl;

		// assign menu highlighter
    $tpl->assign('page_id', '');

    $tpl->assign('data', $this->getUserAccount($_SESSION['IDaccount']));

    // assign error message
    $tpl->assign('error', $this->error);

    // assign notifications
    $tpl->assign('notifs', $this->notifs);

    $tpl->display('account_settings.html');
  }

  function saveAccountSettings($formvars = array()) {
		$mdb = $this->mdb;

		// add all missing keys to array
		fixFormVars($formvars, array('password','new_password','new_password_again'));

		// user wants to change the password?
		if(strlen($formvars['password']) > 0) {
			// check current password first
			$hashedpassword = create_hash($formvars['password']);
			$account = $this->getUserAccount($_SESSION['IDaccount']);
			// if current password is wrong
			if( !validate_password($formvars['password'], $account['password']) ) {
				$this->error = 'wrong_password';
			}
			// current password OK, lets continue...
			else {
				// is there a valid new password? if not show error
				if(strlen($formvars['new_password']) < 6) {
					$this->error = 'new_password_missing';
				}
				// new pass is OK
				else {
					// new passwords missmatch?
					if($formvars['new_password'] != $formvars['new_password_again']) {
						$this->error = 'new_password_mismatch';
					}
					// nope, they are OK, lets finally change them
					else {
						$mdb->update('account', array(
							'password' => create_hash($formvars['new_password']),
							), "IDaccount = %i", $_SESSION['IDaccount']);

						$this->notifs['password_changed'] = true;
					}				
				}							
			}
		}
		
  }

  function displayLogin($formvars = array()) {
  	// add all missing keys to array
  	fixFormVars($formvars, array('email','password'));

  	$tpl = $this->tpl;

    // assign the form vars
    $tpl->assign('post', $formvars);

    // assign error message
    $tpl->assign('error', $this->error);

    $tpl->display('login.html');
  }

  function doLogin($formvars = array()) {
  	// add all missing keys to array
  	fixFormVars($formvars, array('email','password'));

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
    
    // recaptcha is replaced with recaptcha2
    //$tpl->assign('recaptcha', recaptcha_get_html(reCAPTCHA_PUBLIC_KEY));

    $tpl->display('register.html');
  }

  function doRegister($formvars = array()) {
  	$tpl = $this->tpl;
  
  	// add all missing keys to array
  	fixFormVars($formvars, array('email','password','password_again','terms'));

		$mdb = $this->mdb;

		$emailDomain = substr(strrchr($formvars['email'], "@"), 1);
		global $BAD_EMAIL_DOMAINS;

		if (!filter_var($formvars['email'], FILTER_VALIDATE_EMAIL)) {
			$this->error = 'email_missing';
			return false;
		}
		elseif(in_array(strtoupper($emailDomain), $BAD_EMAIL_DOMAINS))
		{
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

		// reCAPTCHA validation enabled?
		if(reCAPTCHA_PRIVATE_KEY != '') {
			// recaptcha is replaced with recaptcha2
			/*
			$reCAPTCHA_RESPONSE = recaptcha_check_answer (reCAPTCHA_PRIVATE_KEY, $_SERVER["REMOTE_ADDR"], $_POST["recaptcha_challenge_field"], $_POST["recaptcha_response_field"]);
			if (!$reCAPTCHA_RESPONSE->is_valid) {
				$this->error = 'recaptcha';
				return;
			}
			*/

			if( !isset($formvars['g-recaptcha-response']) || !recaptcha2_verify(reCAPTCHA_PRIVATE_KEY, $formvars['g-recaptcha-response'], $_SERVER["REMOTE_ADDR"]) ) {
				$this->error = 'recaptcha';
				return;
			}
	  }

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
		$message->assign('newpass', $newpass);
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

		// don't show hackers which e-mails are actually registered here
		/*
		if($mdb->affectedRows() <= 0) {
			return false;
		}*/

		$account = $mdb->queryFirstRow("SELECT email, password FROM account WHERE active = 1 AND email = %s AND recovery_started IS NOT NULL LIMIT 1", $formvars['email']);
		/*if($account === NULL) {
			return false;
		}*/

		// send recovery e-mail
		$message = new Ctrl_Smarty;
		$message->assign('email', $formvars['email']);
		$message->assign('recovery_hash', md5($account['password']));
		$message->assign('ip_address', $_SERVER['REMOTE_ADDR']);
		$message->assign('timestamp', date('y-m-d H:i:s', time()));

		// send email only if this is a registered account
		$account = $mdb->queryFirstRow("SELECT email, password FROM account WHERE active = 1 AND email = %s AND recovery_started IS NOT NULL LIMIT 1", $formvars['email']);
		if($account !== NULL) {
			sendMail($account['email'], 'Recover your CTRL account', $message->fetch('recovery_email_body.txt'));
		}
		else
		{
			// ideally we should delay the same amount of time as with sendMail() above
		}

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
