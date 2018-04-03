<?php require (ELEMENTS_DIR .'head.php'); ?>

<body>
<div class="container">

	<div class="logout">
		<a href="<?=ROOT.WEBROOT_DIR.'logout.php'?>">logout</a>
	</div>

	<div class="col2 inline menu-gallery">
				
		<loop>
		<loop_sql><?= 'table=cms;where= ;extras= ;orderby=id;order=ASC;limit= ;'; ?></loop_sql>
			<div class="menu-item">
				<a href="<?=ROOT.ADMIN?>{id}">
					{function->remove_underlines->title}
				</a>
			</div>
		</loop>
		
	</div>

	<div class="col8 inline content margin-left">
		<pre>
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
		</pre>
	</div>
    
</div>
</body>