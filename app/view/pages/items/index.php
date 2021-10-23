<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-lg-8 col-10 py-5">

			<loop>
				<div class="row justify-content-center my-5 pb-lg-0 pb-5">
					<div class="col-lg-3 col-12 mb-lg-0 mb-5">
						<img src="IMG_DIRitems/{img}" alt="{title}" class="col-12">
					</div>
					<div class="col-lg-9 col-12 px-5 my-auto">
						<a href="<?=$_GET['page']?>/item/{id}/{function->slug->title}"><h2>{title}</h2></a>
						{function->limit_chars_200->description}<br><br>
						<a href="<?=$_GET['page']?>/item/{id}/{function->slug->title}" class="pt-5">+see more</a>
					</div>
				</div>
			</loop>

		</div>
	</div>
</div>
