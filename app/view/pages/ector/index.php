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
					<div class="d-block img-fluid w-100" style="background-image:url('.IMG_DIR.$page.'.DS.{img});"></div>

			</div>
		</div>
	</div>
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


	<div class="container" align="center">
	    <div class="col8 padding-top-bottom" align="center">

	    <?php

	    $content ='
	    <div class="col12" align="center">{titulo}</div>
	     <div class="col12" align="center">{descricao}</div>
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
	</div>