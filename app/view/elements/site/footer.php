<div class="footer container padding-top" align="center">

	<div class="col8" align="center">

		<div class="col8 inline text-left">
			<?php include (ELEMENTS_DIR.'menu.php'); ?>
		</div>

		<div class="col3 inline text-left">

			<?php

				$content = '
					<strong>{phone}</strong><br/>
					{email}<br/>
					{addres}<br/>
				';

				loop(	/*table*/"contact_infos",
						/*content*/$content, 
						/*where*/"",
						/*extras*/"", 
						/*order*/"id", 
						/*asc_desc*/"ASC",
						/*limit*/"");
			?>

		</div>

	</div>

</div>

