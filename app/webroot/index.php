<?php

if($_GET['page'] == 'carrinho'){

	 if(!isset($_COOKIE['session'])){
		session_start();
			$_SESSION["session"] = uniqid();
			$session = $_SESSION["session"];
					setcookie('session', $session, time() + (21600 * 30), "/"); // 86400 = 1 day
				} else {
					$param1 = $_COOKIE['session'];
				}
}

require (ELEMENTS_DIR .'head.php');

?>

<body>

	<?php

		include (ELEMENTS_DIR.'top.php');

		$url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

		if(empty($page)){

			$page = 'home';
			$archive = 'index.php';
			construct_page($page, $archive);

		} else {

			$page 	= $_GET['page'];

			if(strpos($url, "/item/") == false){
				$archive = 'index.php';
				contruct_page($page, $archive);
			}else{
				$id 	= $_GET['id'];
				$archive = 'item.php';
				contruct_page($page, $archive);
			}
		}

		include (ELEMENTS_DIR .'footer.php');
	?>

</body>
