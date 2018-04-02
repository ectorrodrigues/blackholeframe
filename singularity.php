<?php
	$file_url = 'https://raw.githubusercontent.com/ectorrodrigues/blackholeframe/master/bigbang.php';
	header('Content-Type: application/octet-stream');
	header("Content-Transfer-Encoding: Binary"); 
	header("Content-disposition: attachment; filename=\"" . basename($file_url) . "\""); 
	readfile($file_url);
?>