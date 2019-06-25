<?php
	header( 'Cache-Control: no-cache' );
	header( 'Content-type: application/xml; charset="utf-8"', true );

		function db () {
			static $conn;

			$servername	= 'mysql_db.mysql.dbaas.com.br';
			$dbname		= 'mysql_db';
			$username	= 'mysql_db';
			$password	= 'Avantemova2016';

			$conn = new PDO("mysql:host=".$servername.";dbname=".$dbname, $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"));
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			return $conn;
		}

	$conn = db();

	$cod_estados = $_REQUEST['cod_estados'];

	$cidades = array();

	$stmt = $conn->prepare("SELECT cod_cidades, nome FROM cidades WHERE estados_cod_estados = '".$cod_estados."' ORDER BY nome");
	$stmt->setFetchMode(PDO::FETCH_ASSOC);
	$stmt->execute();
	while($record = $stmt->fetch()) {
		$cidades[] = array(
			'cod_cidades'	=> $record['cod_cidades'],
			'nome'			=> $record['nome'],
	);

}

	echo( json_encode( $cidades ) );

	?>
