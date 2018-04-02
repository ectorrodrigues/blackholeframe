
<pre> include ('view/elements/site/top.php'); </pre>


<pre> 
	
	if(empty($_GET['page'])){
		include('view/pages/home/index.php'); 
	}
	else {
		include('view/pages/'.$_GET['page'].'/index.php');
	}
</pre>
	
</body>

</html>