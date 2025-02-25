<?php
defined('APPLICATION_ENV')
	|| define('APPLICATION_ENV',
			  (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV')
										 : 'production'));



define('ROOT_PATH', realpath('..'));
define('APPLICATION_PATH', ROOT_PATH . '/app');

set_include_path(
	APPLICATION_PATH .
	PATH_SEPARATOR . ROOT_PATH . '/lib' .
	PATH_SEPARATOR . PATH_SEPARATOR . realpath('../../../../../libs') .
    PATH_SEPARATOR . get_include_path()
);

require_once 'Loader/Autoloader.php';

spl_autoload_register(array(new Loader_Autoloader(), 'autoload'));

setlocale(LC_ALL, "en_US.UTF-8");

$bootstrap = new Bootstrap(new Zend_Config_Ini(
    APPLICATION_PATH . '/config/app.ini',
    APPLICATION_ENV
));

Zend_Registry::set('bootstrap', $bootstrap);
$bootstrap->run();