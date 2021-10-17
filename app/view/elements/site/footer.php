
<footer class="container-fluid">

  <div class="row justify-content-center px-5 py-5">
    <div class="col-lg-2 col-12 text-lg-start text-center py-lg-0 py-5">
      <a href="<?=SERVER_DIR?>">
        <img src="<?=FILES_DIR?>logo.svg" alt="logo" class="col-lg-5 col-5 logo">
      </a>
    </div>
    <nav class="col-lg-10 col-12 text-start my-lg-auto my-5">
        <?php include 'menu.php'; ?>
    </nav>
  </div>

  <div class="row pb-3 mt-5">
    <div class="col-12 text-center">
      <small>All rights reserved. Powered by <a href="https://github.com/ectorrodrigues/blackholeframe">blackholeframe</a>.</small>
    </div>
  </div>

  <loop><sql>table=config;where= title = 'empty';</sql>
    {content}
  </loop>

</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<?php include 'menu-mobile.php'; ?>
