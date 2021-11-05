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
		font-size: 13px;
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
		color: #50FFFC;
		text-decoration: none;
	}
	a:hover{
	  	color: #ddFFFF;
	}

	.start{
		cursor: pointer;
	}

	input{
    width: 100%;
		border-radius: 8px;
		padding: 10px 7px;
		border:none;
    margin-top:5px;
	}

	.pointer{
		cursor: pointer;
	}

	.pointer:hover{
		color: #50FFFC;
	}

  label{
    font-size: 1.2em;
    font-weight: 600;
    color:#50FFFC;
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
    var dbuser = $(".dbuser").val();
    var dbpass = $(".dbpass").val();
    var port = $(".port").val();

    if(port == ''){
      var port = '';
    } else {
      var port = ':'+port;
    }
    alert("http://localhost"+port+"/"+sitename+"/bigbang.php?databasename="+sitename+"&dbuser="+dbuser+"&dbpass="+dbpass+"&port="+port);
		//window.location.replace("http://localhost"+port+"/"+sitename+"/bigbang.php?databasename="+sitename+"&dbuser="+dbuser+"&dbpass="+dbpass);
	}
</script>

	<div class="container-fluid">
    <div class="row justify-content-center mt-4">
      <div class="col-8">

        <div class="row text-center">
    			<div class="col-12">
    				At beggining there was the void.<br>
    				<strong>Start the Big Bang.</strong><br><br>
    			</div>
    		</div>

    		<div class="row vertical-align mt-4">
    			<div class="col-3 text-right">
    				<h2>1.</h2>
    			</div>
    			<div class="col-9 text-left">
            <label>First of all, make sure you had created a local directory for your project,on your local server.<br>
            And make sure the local server is runing.</label>
    			</div>
    		</div>

    		<div class="row vertical-align mt-4">
    			<div class="col-3 text-right">
    				<h2>2.</h2>
    			</div>
    			<div class="col-9 text-left">
            <label>What's your website's name?</label><br>
    				<input type="text" class="sitename" value="" /><br>
    				<small>
    					*Type the same as your wamp project<br>
    					e.g. <strong>localhost/mysite</strong> > <strong>"mysite"</strong> is your website's name.
    					(no special chars allowed)
    				</small>
    			</div>
    		</div>

        <div class="row vertical-align mt-4">
    			<div class="col-lg-3 text-right">
    				<h2>3.</h2>
    			</div>
    			<div class="col-lg-9 text-left">
            <label>What's the Server Port you use?</label><br>
    				<input type="text" class="port" value="" placeholder="(80, 8000, 8888, etc)" /><br>
    				<small>
    					The port you use to run your local server. If none, leave it blank.<br>
    				</small>
    			</div>
    		</div>

        <div class="row vertical-align mt-4">
    			<div class="col-lg-3 text-right">
    				<h2>4.</h2>
    			</div>
    			<div class="col-lg-9 text-left">
            <label>What's you Local Database Username?</label><br>
    				<input type="text" class="dbuser" value="" placeholder="(Mainly 'root')" /><br>
    			</div>
    		</div>

        <div class="row vertical-align mt-4">
    			<div class="col-lg-3 text-right">
    				<h2>5.</h2>
    			</div>
    			<div class="col-lg-9 text-left">
            <label>What's you Local Database Password?</label><br>
    				<input type="text" class="dbpass" value="" placeholder="(Mainly 'root' or Nothing)" /><br>
    			</div>
    		</div>

        <div class="row vertical-align mt-4" >
    			<div class="col-lg-3 text-right">
    				<h2>6.</h2>
    			</div>
    			<div class="col-lg-9 text-left">
            <label>
              <a href="http://mova.ppg.br/resources/blackholeframe/singularity.php">
                Right Click Here and Save As
              </a>
            </label><br/>

    				<small>*"Save As" to your local website's root</small>
    			</div>
    		</div>

    		<div class="row vertical-align mt-4">
    			<div class="col-lg-3 text-right pointer" onclick="gotoroot()">
    				<h2>7.</h2>
    			</div>
    			<div class="col-lg-9 text-left">
            <label>
              After download the file, <strong onclick="gotoroot()" style="cursor:pointer; color:#ff66ff;"> click here to begin.</strong>
            </label>

    			</div>

    		</div>

      </div>
    </div>

  </body>
  </html>
