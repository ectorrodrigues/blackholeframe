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


    $password = 'dWtZL0VtdDk5SXVIMXEyTW1zdEdxZz09';
    $tag = '3d28292eea8519c1b88dfb355a3110a59a18ade8c6c599c26615c01e8c655d28';
    $iv = '3cafbc30cf28e00c';

    //$crypted_password = encrypting("encrypt", $password, $key_sk, $key_siv);
    $decrypted_password = encrypting("decrypt", $password, $tag, $iv);

    //echo $crypted_password;
    echo $decrypted_password;


?>
