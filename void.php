<!DOCTYPE html>
<html>
<head>
	<!-- Jquery and Ajax Libraries -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

    <!-- Bootstrap -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,400i,500,600,700,700i,900" rel="stylesheet">

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
		position: relative;
		width:100%;
	}

	.vertical-align{
  		display: flex;
    	align-items:center;
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
    var port = $(".port").val();

    if(port == ''){
      var port = '';
    } else {
      var port = ':'+port;
    }
		window.location.replace("http://localhost"+port+"/"+sitename+"/bigbang.php?databasename="+sitename)
	}
</script>

	<div class="container-fluid" align="center">

		<div class="row mt-4" align="center">
			<div class="col">
				At beggining there was the void.<br>
				<strong>Start the Big Bang.</strong><br><br>
			</div>
		</div>

		<div class="row vertical-align mt-4" align="center">
			<div class="col-lg-2 offset-lg-2 text-right">
				<h2>1.</h2>
			</div>
			<div class="col-lg-8 text-left">
				First of all, make sure you had created a local directory for your project, on your local server.
			</div>
		</div>

		<div class="row vertical-align mt-4" align="center">
			<div class="col-lg-2 offset-lg-2 text-right">
				<h2>2.</h2>
			</div>
			<div class="col-lg-8 text-left mt-4">
				<input type="text" class="sitename" value="" placeholder="what's your website's name" /><br>
				<small>
					*Type the same as your wamp project<br>
					e.g. <strong>localhost/mysite</strong> > <strong>"mysite"</strong> is your website's name.
					(no special chars allowed)
				</small>
			</div>
		</div>

		<div class="row vertical-align mt-4" align="center">
			<div class="col-lg-2 offset-lg-2 text-right">
				<h2>3.</h2>
			</div>
			<div class="col-lg-8 text-left">
				<a href="http://mova.ppg.br/resources/blackholeframe/singularity.php"><strong>Right Click Here and Save As</strong></a><br/>
				<small>*"Save As" to your localhost site's root</small>
			</div>
		</div>


    <div class="row vertical-align mt-4" align="center">
			<div class="col-lg-2 offset-lg-2 text-right">
				<h2>4.</h2>
			</div>
			<div class="col-lg-8 text-left">
				<input type="text" class="port" value="" placeholder="What's the Port you use. (80, 8000, 8888, etc)" /><br>
				<small>
					The port you use to run your local server. If none, leave it blank.<br>
				</small>
			</div>
		</div>


		<div class="row vertical-align mt-4" align="center">
			<div class="col-lg-2 offset-lg-2 text-right pointer" onclick="gotoroot()">
				<h2>5.</h2>
			</div>
			<div class="col-lg-8 text-left">
				After download the file, <strong onclick="gotoroot()"> click here to begin.</strong>
			</div>

		</div>

	</div>
