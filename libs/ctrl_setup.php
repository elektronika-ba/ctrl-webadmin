<?php

/*
* Project: CTRL-WebAdmin
* Author: Muris Pucic Trax <trax [AT] elektronika [DOT] ba>
* Version: 1.0
*/

// define smarty lib directory
define('SMARTY_DIR', './smarty/libs/');

require_once('./recaptcha2/recaptcha2lib.php');
require('./libs/misc.php');

require('./libs/PasswordHash.php');

require('./libs/meekrodb.2.3.class.php');
require(SMARTY_DIR . 'Smarty.class.php');

// require all modules
require('./libs/dashboard.lib.php');
require('./libs/account.lib.php');
require('./libs/client.lib.php');
require('./libs/base.lib.php');

// MySQL connection parameters
define('mysql_host','localhost');
define('mysql_username','root');
define('mysql_password','');
define('mysql_database','ctrl_1v0');

// ctrl-server log files path
define('server_basesock_log_path','D:/ctrl-server/js/log/basesock/');
define('server_clientsock_log_path','D:/ctrl-server/js/log/clientsock/');

// Server Extensions management enable/disable and config
$SERVER_EXTENSIONS = array(
	'se_android_gcm' => array('enabled' => 1, 'mysql_database' => 'ctrl_1v0_ext_android_gcm'),
);

// ReCAPTCHA keys
define('reCAPTCHA_PUBLIC_KEY','6Lc9XPsSAAAAAJy7E3LhA68SjqX5mi-XN0-PAVHF');
define('reCAPTCHA_PRIVATE_KEY','this is top secret my friend');

// after how many seconds should session be destroyed or re-generated for security purposes
define('SESSION_EXPIRY_MS', 1800);

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