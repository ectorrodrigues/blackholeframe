<?php

	if(!defined('DS')){ define('DS', '/');}

	include ('http://'.$_SERVER['HTTP_HOST'].'/ctesop/app/config/'.'directories.php');
	include ('http://'.$_SERVER['HTTP_HOST'].'/ctesop/app/config/'.'database.php');
	include ('http://'.$_SERVER['HTTP_HOST'].'/ctesop/app/controller/'.'AppController.php');

	$content = $_GET['content'];
	$curso = $_GET['curso'];

	
	$content_loop = $content;

	foreach_fetch();

			foreach_fetch(	
	    	/*table*/'cursos',
			/*content*/$content, 
			/*where*/"id = '".$curso."'",
			/*extras*/"", 
			/*order*/"", 
			/*asc_desc*/"",
			/*limit*/"");
?>