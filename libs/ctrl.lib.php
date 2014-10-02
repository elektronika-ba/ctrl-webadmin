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
  
  // MySQL connection parameters
  var $mysql_host = 'localhost';
  var $mysql_username = 'root';
  var $mysql_password = '';
  var $mysql_database = 'ctrl_0v4';

  /**
  * class constructor
  */
  function __construct() {

		// connect to MySQL
		$this->mdb = new MeekroDB($this->mysql_host, $this->mysql_username, $this->mysql_password, $this->mysql_database);

    // instantiate the template object
    $this->tpl = new Ctrl_Smarty;

  }

	function getUserAccount($IDaccount) {
		$mdb = $this->mdb;

		$account = $mdb->queryFirstRow("SELECT * FROM account WHERE IDaccount = %i LIMIT 1", $IDaccount);
		return $account;
	}

  function getIsLoggedIn() {
  	if( isset($_SESSION['IDaccount']) ) {
  		if( count($this->getUserAccount($_SESSION['IDaccount'])) == 1 ) {
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

  function doLogin($formvars) {
  	// add all missing keys to array
  	$this->fixFormVars($formvars, array('email','password','remember'));

		$mdb = $this->mdb;

		$hashedpassword = create_hash($formvars['password']);

		$account = $mdb->queryFirstRow("SELECT * FROM account WHERE email = %s LIMIT 1", $formvars['email'], $hashedpassword);
		if(count($account)<=0) {
			$this->error = 'wrong_password'; // this is actually: wrong_email but we don't tell users that!
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














  /**
  * fix up form data if necessary
  *
  * @param array $formvars the form variables
  */
  function mungeFormData(&$formvars) {

    // trim off excess whitespace
    $formvars['Name'] = trim($formvars['Name']);
    $formvars['Comment'] = trim($formvars['Comment']);

  }

  /**
  * test if form information is valid
  *
  * @param array $formvars the form variables
  */
  function isValidForm($formvars) {

    // reset error message
    $this->error = null;

    // test if "Name" is empty
    if(strlen($formvars['Name']) == 0) {
      $this->error = 'name_empty';
      return false; 
    }

    // test if "Comment" is empty
    if(strlen($formvars['Comment']) == 0) {
      $this->error = 'comment_empty';
      return false; 
    }

    // form passed validation
    return true;
  }

  /**
  * add a new guestbook entry
  *
  * @param array $formvars the form variables
  */
   function addEntry($formvars) {        
    try {
      $rh = $this->pdo->prepare("insert into GUESTBOOK values(0,?,NOW(),?)");
      $rh->execute(array($formvars['Name'],$formvars['Comment']));
    } catch (PDOException $e) {
      print "Error!: " . $e->getMessage();
      return false;
    }	
    return true;
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
