<link rel="stylesheet" type="text/css" href="<?=CSS_DIR?>carousel.css" />  
<style>

	.top{position: absolute; z-index: 2;}
	
	.w-100{
	    height:300px; 
	}
</style>


<div id="banners"> 
	<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner" role="listbox">	
			<div class="carousel-item active">
			<div style="z-index:2; position:absolute; text-align:center; width:100%; margin-top:150px; text-shadow: 0px 0px 30px #000;" align="center"><h1 style="color:#fff;">Biblioteca</h1></div>
					<div class="d-block img-fluid w-100" style="background-image:url(<?=IMG_DIR.$page.DS?>biblioteca.jpg);"></div>

			</div>
		</div>
	</div>
</div>	


	<div class="container" align="center">
	    <div class="col8 padding-top-bottom" align="center">


	     <?php

	     	echo '	<span class="inline description-title transition" onclick="ChangeContent(this.id)" 
	    			id="biblioteca_base_de_dados">BASE DE DADOS</span>';

	     	$content ='
	    		<div id="biblioteca_base_de_dados_content" style="display:none;">
	    			<div class="col12 border-top padding-top" align="center">

						<a href="{link}">
							<div class="col4 inline vertical-align inline" align="left">
								<img src="'.IMG_DIR.'biblioteca_base_de_dados.DS.{img}" class="col12"/>
							</div>
							
							<div class="col8 inline">
								{titulo}
							</div>
						</a>
						
					</div>
	    		</div>
		    	
		    	';

		    foreach_fetch(	
	    	/*table*/'biblioteca_base_de_dados',
			/*content*/$content, 
			/*where*/"",
			/*extras*/"", 
			/*order*/"", 
			/*asc_desc*/"",
			/*limit*/"");

		    echo '<span class="inline description-title transition"> :: </span>';


		    echo '	<span class="inline description-title transition" onclick="ChangeContent(this.id)" 
	    			id="biblioteca_base_de_dados">BASE DE DADOS</span>';

	     	$content ='
	    		<div id="biblioteca_base_de_dados_content" style="display:none;">
	    			<div class="col12 border-top padding-top" align="center">

						<a href="{link}">
							<div class="col4 inline vertical-align inline" align="left">
								<img src="'.IMG_DIR.'biblioteca_base_de_dados.DS.{img}" class="col12"/>
							</div>
							
							<div class="col8 inline">
								{titulo}
							</div>
						</a>
						
					</div>
	    		</div>
		    	
		    	';

		    foreach_fetch(	
	    	/*table*/'biblioteca_base_de_dados',
			/*content*/$content, 
			/*where*/"",
			/*extras*/"", 
			/*order*/"", 
			/*asc_desc*/"",
			/*limit*/"");

		    echo '<span class="inline description-title transition"> :: </span>';



	    	$content ='
	    		<div class="padding-top-bottom content-curso margin-top">
	    			{descricao}
	    		</div>
	    		<div>
	    		<a href="{link}">
					<div class="col5 bt-big transition" align="center">
						Biblioteca Online
					</div>
				</a>
	    		</div>
	    	';

	    	foreach_fetch(	
	    	/*table*/$page,
			/*content*/$content, 
			/*where*/"",
			/*extras*/"", 
			/*order*/"", 
			/*asc_desc*/"",
			/*limit*/"");
	    ?>

	    	

	    </div>
	</div>


<script>
function ChangeContent(str){

    if(str == "sobre"){
    	location.reload(true);
    }
    else {
	    var cont = $("#"+str+"_content").html();
	    $(".content-curso").html(cont);
	}

	$( "#"+str+"_content" ).children().last().css( "display", "block" );

}
</script>