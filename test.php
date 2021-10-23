<?php

  $font = file_get_contents("http://mova.ppg.br/resources/blackholeframe/app/webroot/fonts/Arial.ttf");
  file_put_contents("arial.ttf", $font);

  //BANNER 01
  $x = '1366';
	$y = '400';
  $im = imagecreatetruecolor($x, $y);
  $gray = imagecolorallocate($im, 180, 180, 180);
  $white = imagecolorallocate($im, 255, 255, 255);
  imagefill($im, 0, 0, $gray);
  $text = 'Slide 01';
  imagettftext($im, 36, 0, 600, 220, $white, 'arial.ttf', $text);
  imagejpeg($im, 'banner-01.jpg');

  //BANNER 02
  $x = '1366';
	$y = '400';
  $im = imagecreatetruecolor($x, $y);
  $gray = imagecolorallocate($im, 180, 180, 180);
  $white = imagecolorallocate($im, 255, 255, 255);
  imagefill($im, 0, 0, $gray);
  $text = 'Slide 02';
  imagettftext($im, 36, 0, 600, 220, $white, 'arial.ttf', $text);
  imagejpeg($im, 'banner-02.jpg');

  //ITEM 01
  $x = '400';
	$y = '400';
  $im = imagecreatetruecolor($x, $y);
  $gray = imagecolorallocate($im, 80, 80, 80);
  $white = imagecolorallocate($im, 180, 180, 180);
  imagefill($im, 0, 0, $gray);
  $text = 'Item 01';
  imagettftext($im, 36, 0, 130, 210, $white, 'arial.ttf', $text);
  imagejpeg($im, 'item-01.jpg');

  //ITEM 01
  $x = '400';
	$y = '400';
  $im = imagecreatetruecolor($x, $y);
  $gray = imagecolorallocate($im, 80, 80, 80);
  $white = imagecolorallocate($im, 180, 180, 180);
  imagefill($im, 0, 0, $gray);
  $text = 'Item 02';
  imagettftext($im, 36, 0, 130, 210, $white, 'arial.ttf', $text);
  imagejpeg($im, 'item-02.jpg');

  //LOGO
  $x = '180';
	$y = '50';
  $im = imagecreatetruecolor($x, $y);
  $gray = imagecolorallocate($im, 255, 255, 255);
  $white = imagecolorallocate($im, 0, 0, 0);
  imagefill($im, 0, 0, $gray);
  $text = 'LOGO';
  imagettftext($im, 46, 0, 2, 47, $white, 'arial.ttf', $text);
  imagejpeg($im, 'logo.jpg');



 ?>
