
<?php 
	$port = $_GET['port'];
	include ('view/elements/site/top.php'); 
	
	if(empty($_GET['page'])){
		include('view/pages/home/index.php?port='.$port); 
	}
	else {
		include('view/pages/'.$_GET['page'].'/index.php?port='.$port);
	}
?>
	
</body>

</html>