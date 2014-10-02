<?php

/*
* Project: CTRL-WebAdmin
* Author: Muris Pucic Trax <trax [AT] elektronika [DOT] ba>
* Version: 1.0
*/

// define smarty lib directory
define('SMARTY_DIR', './smarty/libs/');

require_once('./recaptcha/recaptchalib.php');
require('./libs/PasswordHash.php');
require('./libs/meekrodb.2.3.class.php');
require('./libs/ctrl.lib.php');
require(SMARTY_DIR . 'Smarty.class.php');

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