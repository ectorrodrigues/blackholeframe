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
$query = $conn->prepare("SELECT content FROM input_types WHERE title = 'array_fields_hidden'");
$query->execute();
$result_fields_hidden = $query->fetchColumn();

$array_fields_hidden	= array($result_fields_hidden);
$array_fields_text		= array('titulo', 'preco');
$array_fields_number	= array('sku', 'preco');
$array_fields_select	= array('status', 'id_categorias', 'id_noticias', 'area', 'professor', 'coordenador', 'curso', 'cursos', 'status');
$array_fields_img		= array('img', 'foto', 'icone');
$array_fields_textarea	= array('descricao', 'texto', 'endereco', 'matriz_curricular', 'ementas', 'regulamento');
$array_fields_date		= array('data');
$array_fields_time		= array('horario');
$array_galeries 		= array('produtos', 'noticias');

//GALLERY
$array_galeries = array('produtos', 'noticias', 'idades', 'intercambios'); //Pages that have gallery

?>