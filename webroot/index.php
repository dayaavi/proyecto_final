<?php

define('BASEPATH', true);
define('DS', DIRECTORY_SEPARATOR); 
define('ROOT', dirname(__FILE__, 2)); 

require_once(ROOT . DS . 'config' . DS . 'config.php'); 
require_once(ROOT . DS . 'core' . DS . 'autoload.php');
require_once(ROOT . DS . 'core' . DS . 'userFunctions.php');

session_start();

$dispatch = new Dispatcher();
$dispatch->dispatch();

