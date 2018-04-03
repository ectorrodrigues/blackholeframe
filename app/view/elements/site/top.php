
	<div class="container padding-top-bottom-30px top" align="center">

		<div class="col8 vertical-align" align="center">

			<div class="logo col2 vertical-align" align="left">
				<a href="<?=SERVER_DIR?>">
					<?php
					$content = '<img src="'.FILES_DIR.'{content}" />';
					loop(
					/*table*/"config",
					/*content*/$content, 
					/*where*/" title = 'Logo' ",
					/*extras*/"", 
					/*order*/"", 
					/*asc_desc*/"",
					/*limit*/"");
					?>
				</a>
			</div>
			
			<div class="menu col10 vertical-align" align="right">
			<?php include (ELEMENTS_DIR.'menu.php'); ?>
			</div>

		</div>

	</div>
