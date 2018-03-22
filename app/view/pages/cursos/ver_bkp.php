<link rel="stylesheet" type="text/css" href="<?=CSS_DIR?>'carousel.css" />  
<style>

	.top{position: absolute; z-index: 2;}
	
	.w-100{
	    height:300px; 
	}
</style>

<?php
$content ='
<div id="banners"> 
	<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner" role="listbox">	
			<div class="carousel-item active">
			<div style="z-index:2; position:absolute; text-align:center; width:100%; margin-top:150px; text-shadow: 0px 0px 30px #fff;" align="center"><h1>{titulo}</h1></div>
					<div class="d-block img-fluid w-100" style="background-image:url('.IMG_DIR.'cursos.DS.{img});"></div>

			</div>
		</div>
	</div>
</div>	
';

foreach_fetch(	
	    	/*table*/$page,
			/*content*/$content, 
			/*where*/"id = '".$id."'",
			/*extras*/"", 
			/*order*/"", 
			/*asc_desc*/"",
			/*limit*/"");

?>


	<div class="container" align="center">
	    <div class="col8 padding-top-bottom" align="center">

	    	

	    <?php

	    	$content ='
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
	    	';

	    	foreach_fetch(	
	    	/*table*/$page,
			/*content*/$content, 
			/*where*/"id = '".$id."'",
			/*extras*/"", 
			/*order*/"", 
			/*asc_desc*/"",
			/*limit*/"");
	    ?>


		<?php

			$content = '
			<div class="padding-top-bottom content-curso margin-top">
	    		{descricao}
	    	</div>
			';

			foreach_fetch(	
	    	/*table*/$page,
			/*content*/$content, 
			/*where*/"id = '".$id."'",
			/*extras*/"", 
			/*order*/"", 
			/*asc_desc*/"",
			/*limit*/"");

			$content = '
			<input type="hidden" value="{id}" />
			';

			$content_nest = '
			<div class="content-curso">
	    		<strong>Coordenador:</strong> Prof. {titulacao} {titulo} 
	    	</div>
	    	<div class="content-curso">
	    		<strong>Email:</strong> {email}
	    	</div>
	    	<div class="content-curso">
	    		<strong>Telefone:</strong> {telefone}
	    	</div>
			';

			foreach_fetch_nested(	
			/*table*/"coordenadores",
			/*content*/$content, 
			/*where*/"curso = '".$id."'",
			/*extras*/"", 
			/*order*/"id", 
			/*asc_desc*/"DESC",
			/*limit*/"1",
			/*table_nest*/"professores",
			/*content_nest*/$content_nest, 
			/*where_nest*/"id = {id}",
			/*extras_nest*/"", 
			/*order_nest*/"", 
			/*asc_desc_nest*/"",
			/*limit_nest*/"");

		?>

	    </div>
	</div>

<script>
function ChangeContent(str){
    //alert(anos_ativos);

    if(str == "sobre"){
    	location.reload(true);
    }

    var cont = $("#"+str+"_content").val();
    $(".content-curso").html(cont);

}
</script>

<script type="text/javascript">
	function teste(){
		$("#testando").load("http://localhost/ctesop/app/view/pages/cursos/load.php");
	}
</script>