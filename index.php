<?php

/** ______________________________________________________________________________________________________________
*
* Config File Include
*/
include ('app'.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'config.php');



/** ______________________________________________________________________________________________________________
*
* Model Customization and Usage Verification
*/


if(file_exists(MODEL_DIR.'AppModel.php')){
	$appmodel_local = file_get_contents(MODEL_DIR.'AppModel.php');
	if(empty($appmodel_local)){
		$appmodel = file_get_contents('https://blackholeframe.000webhostapp.com/app/model/AppModel.php');
		$appmodel = str_replace(array("<pre>", "</pre>"), array("<?php", "?>" ), $appmodel);
		file_put_contents(MODEL_DIR.'AppModel.php', $appmodel);
	}
}



/** ______________________________________________________________________________________________________________
*
* Database and Model includes
*/
include('app/config/database.php');
include('app/model/AppModel.php');



/** ______________________________________________________________________________________________________________
*
* Initializing website
*/
	if(isset($_GET['page'])){
		
		$page = $_GET['page'];

		if($page == 'admin' || $page == 'login'){

			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				
				if(!empty($_POST['user']) && !empty($_POST['password'])){

					$user	= $_POST['user']; 
					$pass	= $_POST['password'];

					$conn = db();
					$query 	= $conn->prepare("SELECT keypass FROM usuarios WHERE email= :user AND password= :pass"); 
					$query->bindParam(':user', $user);
					$query->bindParam(':pass', $pass);
					$query->execute();

					if ($query->rowCount() > 0){
						$keypass = $query->fetchColumn();
						setcookie('login', $keypass, time() + (14400 * 30), "/");
						include (WEBROOT_DIR . 'admin.php');
					} else {
						header('Location:'.ROOT);
					}

				} else {
					header('Location:'.ROOT);
				}
				

			} else {

				if(isset($_COOKIE['login'])){

					$conn = db();
					$query 	= $conn->prepare("SELECT email FROM usuarios WHERE keypass= :keypass"); 
					$query->bindParam(':keypass', $_COOKIE['login']);
					$query->execute();

					if ($query->rowCount() > 0){
						include (WEBROOT_DIR . 'admin.php');
					} else {
						header('Location:'.ROOT);
					}

				} else {
					include (WEBROOT_DIR.DS.'login.php');
				}
			}
		} else {
			include (WEBROOT_DIR . 'index.php');
		}

	} else {
		include (WEBROOT_DIR . 'index.php');
	}

?>