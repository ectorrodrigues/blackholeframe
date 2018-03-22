<style>
	body{
		background-image: url('<?=IMG_DIR?>bg_top2.png') !important;
		background-repeat:repeat-x !important;
		background-position: top;
	}

	.top{
		background-image: none !important;
	}
</style>

	<div class="container padding-bottom-30px" align="center">
        
		<?php
		
			$id		= $_GET['id'];
			$path	= IMG_DIR . 'noticias'. DS;
			
			$conn = db();	
			
			foreach($conn->query("SELECT * FROM noticias WHERE id ='".$id."'") as $row) {
				$titulo		= $row['titulo'];
				$img		= $row['img'];
				$descricao		= $row['descricao'];
				$data		= $row['data'];		
			}
			
		?>
        
        <div class="col8 padding-bottom-30px" align="center">
        
        	<?php include (PAGES_DIR.$page.DS.'galeria.php'); ?>
            
            <div id="noticias_info_titulo" align="center" style="padding: 30px 40px 0 40px;">
                <h2><?= $titulo ?></h2><br>
                <h3>Publicado dia <?= date("d/m/Y", strtotime($data)) ?></h3>
            </div>
        
            <div class="galeria_text padding font-16">
                <?php echo $descricao; ?>
            </div>
            
        </div>
       
</div>