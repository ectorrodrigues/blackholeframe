<?php
	setcookie("status", "", time() - 3600);
	unset($_COOKIE['status']);
	setcookie('status', null, -1, '/');

	require (ELEMENTS_DIR .'head.php');
?>


<body id="admin">

<script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>

<div class="container-fluid">

	<div class="row justify-content-between">

		<aside class="col-3 bg-dark py-5 px-4">
			<?php
				foreach($conn->query("SELECT * FROM cms") as $row) {
					$id		= $row["id"];
					$title	= $row["title"];

					echo '<div class="menu-item my-3">
						<a href="'.ROOT.ADMIN.$id.'">
							'.$title.'
						</a>
					</div>';
				}
			?>
		</aside>

		<div class="col-9">

			<div class="row text-end">
				<a href="<?=ROOT.WEBROOT_DIR.'logout.php'?>" class="logout"><i class="fas fa-power-off"></i> logout</a>
			</div>

			<div class="row justify-content-center px-5">
				<div class="col-12">
					<?php
					$url = $_SERVER['REQUEST_URI'];

						if (preg_match('#[0-9]#',$url)){

							$id_item = $_GET['id'];

							echo '
							<a href="'.ROOT.ADMIN.'add'.DS.$id_item.'">
								<div class="bt_add btn">+ Adicionar Item</div>
							</a>';

							if(strpos($url,"add") == true || strpos($url,"edit") == true || strpos($url,"delete") == true){
								include (HELPER_DIR.'form.php');
							} else {
								include (HELPER_DIR.'list.php');
							}

						} else {

							echo '<h1 class="p-5 my-5 text-center">Bem-Vindo =)</h1>';

						}

						$conn = null;
					?>
				</div>
			</div>
		</div>

	</div>

</div>

<script>
	ClassicEditor
		.create( document.querySelector( '#editor' ) )
			.then( editor => {
				console.log( editor );
			} )
		.catch( error => {
			console.error( error );
	} );
</script>

</body>
