<?php

	//ABSOLUTES
	$url = "http://$_SERVER[HTTP_HOST]";

	// DIRECTORY_SEPARATOR
	if(!defined('DS')){ define('DS', DIRECTORY_SEPARATOR);}

	$sitename = explode('/', $_SERVER['PHP_SELF']);
	if(!defined('SITE_NAME')){
		define('SITE_NAME', $sitename[1]);
	}

	$localhost_check = $_SERVER['HTTP_HOST'];
	if (strpos($localhost_check, 'localhost') !== false) {
    $site_host = $_SERVER['DOCUMENT_ROOT'] . DS . SITE_NAME . DS;
	} else {
		$site_host = $_SERVER['DOCUMENT_ROOT'];
	}

	if(strpos($url, "admin") == true){
		define('SERVER_DIR', $site_host);
	}
	else{
		if(!defined('SERVER_DIR')){ define('SERVER_DIR', $site_host); }
	}

	define('ABSOLUTE_PATH', $site_host);
	define('ROOT', SERVER_DIR);
	define('WWW', SITE_NAME.DS);
	define('APP_DIR', 'app');
	define('WEBROOT_DIR', APP_DIR . DS . 'webroot' . DS);
	define('VIEW_DIR', APP_DIR . DS . 'view' . DS);
	define('PAGES_DIR', VIEW_DIR . 'pages' . DS);
	define('HELPER_DIR', VIEW_DIR . 'helper' . DS);
	define('ELEMENTS_DIR', VIEW_DIR . 'elements' . DS . 'site' . DS);
	define('CSS_DIR', SERVER_DIR . WEBROOT_DIR . 'css' . DS);
	define('IMG_DIR', SERVER_DIR . WEBROOT_DIR . 'img' . DS);
	define('JS_DIR', SERVER_DIR . WEBROOT_DIR . 'js' . DS);
	define('FILES_DIR', SERVER_DIR . WEBROOT_DIR . 'files' . DS);
	define('CONFIG_DIR', APP_DIR . DS . 'config' . DS);
	define('VENDORS_DIR', APP_DIR . DS . 'vendors' . DS);
	define('CONTROLLER_DIR', APP_DIR . DS . 'controller' . DS);
	define('MODEL_DIR', SERVER_DIR . APP_DIR . DS . 'model' . DS);
	define('ADMIN', 'admin'.DS);

	//RELATIVES
	define('CONFIG_REL_DIR', '..' . DS . 'config' . DS);
	define('IMG_REL_DIR', '..' . DS . '..' . DS . '..' . DS . 'webroot' . DS . 'img' . DS);

?>
