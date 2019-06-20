<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="cache-control" content="no-store, no-cache, must-revalidate, Post-Check=0, Pre-Check=0">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="-1">

    <!-- Jquery and Ajax Libraries -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!-- Personal Styling -->
    <link rel="stylesheet" href="<?=CSS_DIR?>style.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,400i,500,600,700,700i,900" rel="stylesheet">

    <!-- Fontawesome -->
    <script src="https://use.fontawesome.com/a0bf7d3b26.js"></script>

    <!-- Icons -->
    <link rel="shortcut icon" href="<?=FILES_DIR ?>favicon.ico" type="image/x-icon">
    <link rel="icon"  href="<?=FILES_DIR ?>favicon.ico" type="image/x-icon">

    <!-- Admin related stuff. Include CSS, CKeditor, Maskmoney -->
     <?php
        if(strpos($_SERVER['REQUEST_URI'], "/admin")){
            echo '<link rel="stylesheet" type="text/css" href="'.SERVER_DIR.'app/webroot/css/admin.css" />';
            echo '<script src="https://cdn.ckeditor.com/4.9.1/standard/ckeditor.js"></script>';
            echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>';
        }
    ?>

    <title><?=SITE_TITLE?></title>
</head>
