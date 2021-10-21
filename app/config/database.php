<?php
	function db () {
		static $conn;


		$localhost_check = $_SERVER['HTTP_HOST'];
		if (strpos($localhost_check, 'localhost') !== false) {
			$servername	= 'localhost';
			$dbname		= 'blackholeframe';
			$username	= 'root';
			$password	= 'root';
			$port = 3306;
		} else {
			$servername	= 'localhost';
			$dbname		= 'blackholeframe';
			$username	= 'root';
			$password	= '';
			$port = 3306;
		}

		try{
			$conn = new PDO("mysql:host=$servername; dbname=$dbname; port=$port", $username, $password);
			// set the PDO error mode to exception
		  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		  $conn->exec("SET NAMES 'utf8'");

		}catch(Exception $e){
		  echo "Error: " . $e->getMessage();
		  exit;
		}

		return $conn;

	}
?>
