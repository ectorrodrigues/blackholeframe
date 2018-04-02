<!DOCTYPE html>
<html>
<head>
<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,400i,500,600,700,700i,900" rel="stylesheet">
<script
  src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
  integrity="sha256-3edrmyuQ0w65f8gfBsqowzjJe2iM6n0nKciPUp8y+7E="
  crossorigin="anonymous"></script>

<title>Black Hole Framework</title>

<style>
	body{
		background-color: #000;
		color: #fff;
		text-align: left;
		font-size: 12px;
		line-height: 17px;
		font-family: "Montserrat", sans-serif;
		font-weight: 300;
	}

	.row{
		width:100%;
		padding:140px 0 5px 0;
	}

	.col{
		width:300px;
		text-align: left;
		margin: 25px 0;
	}

	a{
		color: #fff;
		text-decoration: none;
	}
	a:hover{
	  	color: #50FFFC;
	}

	.start{
		cursor: pointer;
	}

	input{
		border-radius: 8px;
		padding: 10px 7px;
		border:none;
	}

	.pointer{
		cursor: pointer;
	}

	.pointer:hover{
		color: #50FFFC;
	}

	h2{
		color: #fff;
	}
</style>

</head>
<body>

<script type="text/javascript">
	function gotoroot(){
		var sitename = $(".sitename").val();
		window.location.replace("http://localhost/"+sitename+"/bigbang.php")
	}
</script>

	<div class="container-fluid" align="center">

		<div class="row" align="center">
			<div class="col">
				<h2>1.</h2>
				At beggining there was the void.<br>
				<strong>Start the Big Bang.</strong><br>
				<a href="https://blackholeframe.000webhostapp.com/bigbang.php">Right Click and Save As</a><br/>
				<small>*"Save As" to your localhost site's root</small>
			</div>
		

			<div class="col">
				<h2>2.</h2>
				<input type="text" class="sitename" value="" placeholder="What's Your website's name" /><br>
				<small>
					*Type the same as your wamp project<br>
					e.g. <strong>localhost/mysite</strong> > <strong>"mysite"</strong> is your website's name.<br>
					(no special chars allowed)
				</small>
			</div>
		

			<div class="col pointer" onclick="gotoroot()">
				<h2>3.</h2>
				After download the file, <strong> click here to begin.</strong>
			</div>

		</div>

	</div>