<?php

	//This file gets the creator system, to start everything

	$results_echo = '';

	function create_files($dir, $filename){

		global $results_echo;

		$appmodel = file_get_contents('https://raw.githubusercontent.com/ectorrodrigues/blackholeframe/master/'.$dir.'/'.$filename);

		if(strpos($appmodel, '<pre>') == true){
			$appmodel = str_replace(array("<pre>", "</pre>"), array("<?php", "?>" ), $appmodel);
		}

		file_put_contents('creator/app/'.$dir.'/'.$filename, $appmodel);

		$results_echo .= '<strong>'.$filename.'</strong> sucessfuly created. <br>';
	}

	if (!file_exists('creator')) { mkdir('creator', 0777, true); }
	if (!file_exists('creator/app')) { mkdir('creator/app', 0777, true); }
	
	if (!file_exists('creator/app/config')) { mkdir('creator/app/config', 0777, true); }
		create_files('creator/app/config', 'database.php');

	if (!file_exists('creator/app/model')) { mkdir('creator/app/model', 0777, true); }
		create_files('creator/app/model', 'AppModel.php');

	if (!file_exists('creator/app/view')) { mkdir('creator/app/view', 0777, true); }
		if (!file_exists('creator/app/view/elements')) { mkdir('creator/app/view/elements', 0777, true); }
			if (!file_exists('creator/app/view/elements/site')) { mkdir('creator/app/view/elements/site', 0777, true); }
				create_files('creator/app/view/elements/site', 'head.php');
				create_files('creator/app/view/elements/site', 'footer.php');
				create_files('creator/app/view/elements/site', 'top.php');

		if (!file_exists('creator/app/view/pages')) { mkdir('creator/app/view/pages', 0777, true); }
			if (!file_exists('creator/app/view/pages/configurations')) { mkdir('creator/app/view/pages/configurations', 0777, true); }
				create_files('creator/app/view/pages/configurations', 'index.php');

			if (!file_exists('creator/app/view/pages/home')) { mkdir('creator/app/view/pages/home', 0777, true); }
				create_files('creator/app/view/pages/home', 'index.php');

			if (!file_exists('creator/app/view/pages/new')) { mkdir('creator/app/view/pages/new', 0777, true); }
				create_files('creator/app/view/pages/new', 'index.php');

			if (!file_exists('creator/app/view/pages/pages')) { mkdir('creator/app/view/pages/pages', 0777, true); }
				create_files('creator/app/view/pages/pages', 'index.php');

	if (!file_exists('creator/app/webroot')) { mkdir('creator/app/webroot', 0777, true); }
		create_files('creator/app/webroot', 'index.php');

		if (!file_exists('creator/app/webroot/css')) { mkdir('creator/app/webroot/css', 0777, true); }
			create_files('creator/app/webroot/css', 'main.css');

		if (!file_exists('creator/app/webroot/files')) { mkdir('creator/app/webroot/files', 0777, true); }



echo '
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,400i,500,600,700,700i,900" rel="stylesheet">

	<style>
	body{
		background-color: #000;
		color: #fff;
		text-align: left;
		font-size: 12px;
		line-height: 17px;
		font-family: "Montserrat", sans-serif;
		font-weight: 300;
	}

	.row{
		width:100%;
		padding:40px 0 5px 0;
	}

	.col{
		width:300px;
		text-align: left;
	}

	.btn{
		background-color: #000 !important;
	  	color: #50FFFC;
	  	border:solid;
	  	border-color: #50FFFC;
	  	border-width:1px;
	  	padding:10px;
	  	border-radius:5px;
	  	text-decoration:none;
	}
	.btn:hover{
	  	background-color: #50FFFC !important;
	  	color: #000;
	  	border:none;
	}
	</style>

	<div class="container-fluid" align="center">
		<div class="row" align="center">
			<div class="col">
				'.$results_echo.'
			</div>
		</div>
		<div class="row" align="center">
			<div class="col">
				The Big Bang happened..<br>
				Creator system is now ready.<br>
				Wait a little bit to start...
			</div>
		</div>
	</div>';

	sleep(5);

	header('Location:creator/index.php');	

?>