<div class="footer container padding-top" align="center">

	<div class="col8" align="center">

		<div class="col8 inline text-left">
			<?php include (ELEMENTS_DIR.'menu.php'); ?>
		</div>

		<div class="col3 inline text-left">

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

