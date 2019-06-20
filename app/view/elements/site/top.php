
	<div class="container-fluid py-5" align="center">

		<div class="row col-10" align="center">

			<div class="logo col-2" align="left">
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

			<div class="menu col-10" align="right">
			<?php include (ELEMENTS_DIR.'menu.php'); ?>
			</div>

		</div>

	</div>
