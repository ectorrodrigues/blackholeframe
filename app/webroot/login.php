<?php
    require (ELEMENTS_DIR .'head.php');
?>


<body style="background-color: #eee !important;">

	<div class="container-fluid" align="center">

    <div class="row mt-5" align="center">
      <div class="col">
        <a href="<?= ROOT ?>" class="pt-4">
	        <img src="<?= ROOT ?>app/webroot/files/logo.svg" width="80" height="auto" />
	    	</a>
      </div>
    </div>


    <div class="row p-5 my-2" align="center">
      <div class="col-4 offset-4 bg-white p-5 rounded shadow-sm" align="center">

	      <?php
	        if($_SERVER['REQUEST_METHOD'] == 'POST'){
	        	echo '<p class="text-danger">
            <span class="font-weight-bold">Access Denied.</span><br />
            <small>Wrong user and/or password. Try Again.</small></p>';
	        }
	      ?>

        <p>Log In</p>

			  <form action="<?= ROOT.'admin'.DS?>" method="post" enctype="multipart/form-data">
		    	<input type="text" name="user" placeholder="usuario" class="form-control" />
		      <input type="password" name="password" placeholder="senha" class="form-control mt-2" />
		    	<button type="submit" class="btn btn-primary mb-2 mt-2 bg-dark border-0">Log In</button>
		    </form>
		</div>
	</div>

  </div>

</body>
</html>
