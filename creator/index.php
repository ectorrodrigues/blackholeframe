
<?php 

	if (file_exists('../bigbang.php')) { 
		unlink('../bigbang.php');
	}

	include ('view/elements/site/top.php'); 
	
	if(empty($_GET['page'])){
		include('view/pages/home/index.php'); 
	}
	else {
		include('view/pages/'.$_GET['page'].'/index.php');
	}
?>
	
</body>

</html>