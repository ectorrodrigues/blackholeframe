<div class="footer container-fluid py-5 mt-5" align="center" style="background-color:#ddd;">

	<div class="row align-items-start col-10" align="center">

		<div class="col-9 text-left">
			<?php include (ELEMENTS_DIR.'menu.php'); ?>
		</div>

		<div class="col-3 text-left">

			<?php

				$content = '<strong>{content}</strong><br/>';
				loop(	/*table*/"config",
						/*content*/$content,
						/*where*/" title = 'Phone'",
						/*extras*/"",
						/*order*/"",
						/*asc_desc*/"",
						/*limit*/"");

				$content = '{content}<br/>';
				loop(	/*table*/"config",
						/*content*/$content,
						/*where*/" title = 'Email'",
						/*extras*/"",
						/*order*/"",
						/*asc_desc*/"",
						/*limit*/"");

				$content = '{content}<br/>';
				loop(	/*table*/"config",
						/*content*/$content,
						/*where*/" title = 'Address'",
						/*extras*/"",
						/*order*/"",
						/*asc_desc*/"",
						/*limit*/"");


			?>

		</div>

	</div>

</div>
