<?php
	setcookie("status", "", time() - 3600);
	unset($_COOKIE['status']);
	setcookie('status', null, -1, '/');

	require (ELEMENTS_DIR .'head.php'); 
?>

<body>
<div class="container">

	<div class="logout">
		<a href="<?=ROOT.WEBROOT_DIR.'logout.php'?>">logout</a>
	</div>

	<div class="col2 inline menu-gallery">
				
		<?php
			foreach($conn->query("SELECT * FROM cms") as $row) {
				$id		= $row["id"];						
				$title	= $row["title"];

				echo '<div class="menu-item">
					<a href="'.ROOT.ADMIN.$id.'">
						'.$title.'
					</a>
				</div>';
			}
		?>
		
	</div>

	<div class="col8 inline content margin-left">
		<?php
			$url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

			if (preg_match('#[0-9]#',$url)){ 
					
				$id_item = $_GET['id'];

				echo '
				<a href="'.ROOT.ADMIN.'add'.DS.$id_item.'">
					<div class="bt_add">+ Adicionar Item</div>
				</a>';

				if(strpos($url,"add") == true || strpos($url,"edit") == true || strpos($url,"delete") == true){
					include (HELPER_DIR.'form.php');
				} else {
					include (HELPER_DIR.'list.php');
				}

			} else {

				echo '<div id="welcome">Bem-Vindo =)</div>';

			}
				
			$conn = null;
		?>
	</div>
    
</div>
</body>