<?php

    $key_sk = random_bytes(32);
    $key_siv = random_bytes(32);
    $key_sk = base64_encode($key_sk);
    $key_siv = base64_encode($key_siv);

    function encrypting($action, $string, $key_sk, $key_siv){
      $cypher_method = "AES-256-CBC";
      $output = false;

      if ($action == "encrypt"){
        $key    = hash("sha256", $key_sk);
        $iv     = substr(hash("sha256", $key_siv), 0, 16);
        //echo 'key: '.$key.'<br>';
        //echo 'iv: '.$iv.'<br>';

        $output = openssl_encrypt($string, $cypher_method, $key, 0, $iv);
        $output = base64_encode($output);
      } else if($action == "decrypt"){
        $key    = $key_sk;
        $iv     = $key_siv;
        $output = base64_decode($string);
        $output = openssl_decrypt($output, $cypher_method, $key, 0, $iv);
      }
      return $output;
    } //endfunction

    //


    $password = 'Um9IME4xVlN5QnY4bWFYRVIyWXZkQT09';
    $tag = 'fee46aae1c3a61ecbe7c3f60cffa0b96ad8ba2079e05d67e9336652a14d12c6b';
    $iv = 'e354cad20f49b6a7';

    //$crypted_password = encrypting("encrypt", $password, $key_sk, $key_siv);
    $decrypted_password = encrypting("decrypt", $password, $tag, $iv);

    //echo $crypted_password;
    echo $decrypted_password;


?>
