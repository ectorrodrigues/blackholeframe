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
			<div style="z-index:2; position:absolute; text-align:center; width:100%; margin-top:150px; text-shadow: 0px 0px 30px #000;" align="center"><h1 style="color:#fff;">Pós Graduação</h1></div>
					<div class="d-block img-fluid w-100" style="background-image:url(<?=IMG_DIR.$page.DS?>posgraduacao.jpg);"></div>

			</div>
		</div>
	</div>
</div>	


	<div class="container" align="center">
	    <div class="col6 padding-top-bottom" align="left">

	    	

	    <?php

	    	$content ='
	    		<input type="hidden" value="{id}" />
	    		<h2 class="pos-title">{titulo}</h2>
	    	';

	    	$content_nest ='
	    		<span class="text-left content-cursos font-16">{titulo}</span><br/>
	    	';


			foreach_fetch_nested(	
			/*table*/'areas',
			/*content*/$content, 
			/*where*/"",
			/*extras*/"", 
			/*order*/"", 
			/*asc_desc*/"",
			/*limit*/"",
			/*table_nest*/$page,
			/*content_nest*/$content_nest, 
			/*where_nest*/"area = {id}",
			/*extras_nest*/"", 
			/*order_nest*/"", 
			/*asc_desc_nest*/"",
			/*limit_nest*/"");

	    ?>

	    </div>
	</div>