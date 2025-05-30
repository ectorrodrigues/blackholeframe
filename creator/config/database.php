<?php
try {

	$servername	= 'localhost';
	$dbname		= 'databasename';
	$username	= 'dbuser';
	$password	= 'dbpass';

	$conn = new PDO("mysql:host=".$servername.";dbname=".$dbname, $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	return $conn;
}
catch (PDOException $e) {
}
?>
