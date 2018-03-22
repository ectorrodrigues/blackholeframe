	<?php $page = $_GET['page']; if(!empty($_GET['id'])){ $id = $_GET['id']; } ?>
	<style>
	body{
		background-image: url('<?php echo '/ctesop/app/webroot/img/';?>bg_site.jpg') !important;
		background-size: cover !important;
		background-repeat: no-repeat !important;
	}
	</style>

	<div class="container" align="center">
	    <div class="col11 padding-top-bottom" align="center">

	    <get_content>
	    	<div class="get_table"><?= $page ?></div>
			<div class="get_where"></div>
			<div class="get_extras"></div> 
			<div class="get_order">id</div>
			<div class="get_ascdesc">ASC</div>
			<div class="get_limit"></div>
			
	    	<a href=".DS.ctesop.DS.cursos.DS.ver.DS.{id}.DS.{function->slug->titulo}">
	    	<div class="col4 item transition" style="background-image: url(<?php echo '/ctesop/app/webroot/img/cursos'; ?>.DS.{img})">
	    		<div class="item-titulo">
	    			{titulo}
	    		</div>
	    	</div>
	    	</a>
	    </get_content>

	    </div>
	</div>
	    