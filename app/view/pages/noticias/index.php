<div class="container" align="center">

		<?php

				$content = '
				<div class="col8 border-top padding-top-bottom" align="center">

					<a href="'.$page.'.DS.ver.DS.{id}.DS.{function->slug->titulo}" class="text-marsala">
						<div class="col4 inline vertical-align-top" align="left">
							<div class="box-img-bg" style="background-image:url('.IMG_DIR.$page.'.DS.{img})">
							</div>
						</div>

						<div class="col1 inline" align="left">
						</div>
						
						<div class="col7 inline" align="left">
							<h2 class="margin-0">{titulo}</h2>
							<h3 class="margin-0">{function->date_formating->data}</h3>
							<br>
							{function->limit_chars->descricao}
							<div class="ver-mais">
								+ ver mais
							</div>
						</div>
					</a>
					
				</div>
				';

				foreach_fetch(	
							/*table*/$page,
							/*content*/$content, 
							/*where*/"",
							/*extras*/"", 
							/*order*/"id", 
							/*asc_desc*/"DESC",
							/*limit*/"" );
			
			
		?>

	</div>

</div>
</script>