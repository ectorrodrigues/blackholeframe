<?php

/** ______________________________________________________________________________________________________________
*
* MAIN 
* Here comes the MAIN configuration stuff
*/
if(!defined('DS')){ define('DS', '/');}

//SITE NAME
$sitename = explode(DS, $_SERVER['PHP_SELF']);
if(!defined('SITE_NAME')){ 
	define('SITE_NAME', $sitename[1]);
}

if(!isset($_COOKIE['site'])){
	setcookie('site', SITE_NAME, time() + (14400 * 30), "/");
} else {
	$site = $_COOKIE['site'];
}

define('SITE_TITLE', 'BlackHole');

//DIRECTORIES
$directories = 'app/config/directories.php';

if(file_exists($directories)){ 
	include ($directories); 
} 
else { 
	include ('../../..'. DS . 'config' . DS . 'directories.php'); 
}

//Automatic Update files to the newest version from CDN
$conn = db();
$query = $conn->prepare("SELECT content FROM config WHERE title = 'Auto_Update_AppModel'");
$query->execute();
$result_update_appmodel = $query->fetchColumn();

$query = $conn->prepare("SELECT content FROM config WHERE title = 'Auto_Update_AdminModel'");
$query->execute();
$result_update_adminmodel = $query->fetchColumn();

$query = $conn->prepare("SELECT content FROM config WHERE title = 'Auto_Update_Helper_List'");
$query->execute();
$result_update_list = $query->fetchColumn();

$query = $conn->prepare("SELECT content FROM config WHERE title = 'Auto_Update_Helper_Form'");
$query->execute();
$result_update_form = $query->fetchColumn();


$auto_update_appmodel 		= $result_update_appmodel; // yes or no *yes is default
$auto_update_adminmodel		= $result_update_adminmodel; // yes or no *yes is default
$auto_update_form_helper	= $result_update_form; // yes or no *yes is default
$auto_update_list_helper	= $result_update_list; // yes or no *yes is default

//CMS
$cms	= 'cms'; //Table name where are stored the names of the Pages with CMS


/** ______________________________________________________________________________________________________________
*
* ADMIN 
* Here comes the ADMIN configuration stuff
*/

//FORM
# Form input types assumed by the form inputs (*If not defined below, the input will assume Text Type)


$input_arrays = array('array_fields_hidden', 'array_fields_text', 'array_fields_number', 'array_fields_select', 'array_fields_img', 'array_fields_textarea', 'array_fields_date', 'array_fields_time', 'array_galeries');

foreach ($input_arrays as $input_arrays_value) {
	$query = $conn->prepare("SELECT content FROM input_types WHERE title = '".$input_arrays_value."'");
	$query->execute();
	$$input_arrays_value = "'".implode("', '", explode(",", $query->fetchColumn()))."'";
}

?>