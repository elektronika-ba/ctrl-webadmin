<?php

/*
* Project: CTRL-WebAdmin
* Author: Muris Pucic Trax <trax [AT] elektronika [DOT] ba>
* Version: 1.0
*/

// define smarty lib directory
define('SMARTY_DIR', './smarty/libs/');

require_once('./recaptcha/recaptchalib.php');
require('./libs/misc.php');
require('./libs/PasswordHash.php');
require('./libs/meekrodb.2.3.class.php');
require('./libs/ctrl.lib.php');
require(SMARTY_DIR . 'Smarty.class.php');

// MySQL connection parameters
define('mysql_host','localhost');
define('mysql_username','root');
define('mysql_password','');
define('mysql_database','ctrl_0v4');

// ReCAPTCHA keys
define('reCAPTCHA_PUBLIC_KEY','6Lc9XPsSAAAAAJy7E3LhA68SjqX5mi-XN0-PAVHF');
define('reCAPTCHA_PRIVATE_KEY','this is top secret my friend');

// smarty configuration
class Ctrl_Smarty extends Smarty {
    function __construct() {
      parent::__construct();
      $this->setTemplateDir('./templates');
      $this->setCompileDir('./templates_c');
      $this->setConfigDir('./configs');
      $this->setCacheDir('./cache');
    }
}

?>