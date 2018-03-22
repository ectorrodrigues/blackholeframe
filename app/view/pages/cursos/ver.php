<?php $page = $_GET['page']; if(!empty($_GET['id'])){ $id = $_GET['id']; } ?>


<link rel="stylesheet" type="text/css" href="carousel.css" />  
<style>
	.top{position: absolute; z-index: 2;}
	.w-100{ height:300px;  }
</style>

<get_content>
	<div class="get_table"><?= $page ?></div>
	<div class="get_where">id = '<?=$id?>'</div>
	<div class="get_extras"></div> 
	<div class="get_order">id</div>
	<div class="get_ascdesc">ASC</div>
	<div class="get_limit"></div>

	<div id="banners"> 
		<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner" role="listbox">	
				<div class="carousel-item active">
				<div style="z-index:2; position:absolute; text-align:center; width:100%; margin-top:150px; text-shadow: 0px 0px 30px #fff;" align="center"><h1>{titulo}</h1></div>
						<div class="d-block img-fluid w-100" style="background-image:url(cursos.DS.{img});"></div>

				</div>
			</div>
		</div>
	</div>	
</get_content>


<div class="container" align="center">
    <div class="col8 padding-top-bottom" align="center">

	<get_content>
		<div class="get_table"><?= $page ?></div>
		<div class="get_where">id = '<?=$id?>'</div>
		<div class="get_extras"></div> 
		<div class="get_order">id</div>
		<div class="get_ascdesc">ASC</div>
		<div class="get_limit"></div>

	    <span class="inline description-title transition" onclick="ChangeContent(this.id)" id="sobre">SOBRE</span>
	   	<input type="hidden" value="{descricao}" id="sobre_content"/>
		<span class="inline description-title transition" onclick="ChangeContent()"> :: </span>

		<span class="inline description-title transition" onclick="ChangeContent(this.id)" id="matriz_curricular">MATRIZ CURRICULAR</span>
		<input type="hidden" value="{matriz_curricular}" id="matriz_curricular_content"/>
		<span class="inline description-title transition" onclick="ChangeContent()"> :: </span>

		<span class="inline description-title transition" onclick="ChangeContent(this.id)" id="ementas">EMENTA</span>
		<input type="hidden" value="{ementas}" id="ementas_content"/>
		<span class="inline description-title transition" onclick="ChangeContent()"> :: </span>

		<span class="inline description-title transition" onclick="ChangeContent(this.id)" id="regulamento">REGULAMENTO</span>
		<input type="hidden" value="" id="regulamentos_content"/>

	    <div class="padding-top-bottom content-curso margin-top">
	    	{descricao}
	    </div>
	</get_content>

	

	<get_content>

	<?php

		function db () {
			static $conn;

			$servername	= 'localhost';
			$dbname		= 'ctesop';
			$username	= 'root';
			$password	= '';
				
			$conn = new PDO("mysql:host=".$servername.";dbname=".$dbname, $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"));
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			return $conn;
		}

		$conn = db();
		$result = $conn->query("SELECT id FROM coordenadores WHERE cursos = '".$id."' ORDER BY id DESC LIMIT 1");
		while ($obj = $result->fetch(PDO::FETCH_OBJ)) {
			$id_professor = $obj->id;
		}
	?>

		<div class="get_table">professores</div>
		<div class="get_where">id = <?=$id_professor?></div>
		<div class="get_extras"></div> 
		<div class="get_order"></div>
		<div class="get_ascdesc"></div>
		<div class="get_limit"></div>

	    <div class="content-curso">
	    	<strong>Coordenador:</strong> Prof. {titulacao} {titulo} 
	    </div>
	    <div class="content-curso">
	    	<strong>Email:</strong> {email}
	    </div>
	    <div class="content-curso">
	    	<strong>Telefone:</strong> {telefone}
	    </div>
	</get_content>

	</div>
</div>

<script>
function ChangeContent(str){
    if(str == "sobre"){
    	location.reload(true);
    }
    else {
	    var cont = $("#"+str+"_content").val();
	    $(".content-curso").html(cont);
	}
}
</script>