<?php

function db() {
  static $conn;


  $localhost_check = $_SERVER['HTTP_HOST'];
  if (strpos($localhost_check, 'localhost') !== false) {
    $servername	= 'localhost';
    $dbname		= 'blackholeframe';
    $username	= 'root';
    $password	= 'root';
    $port = 3306;
  } else {
    $servername	= 'localhost';
    $dbname		= 'blackholeframe';
    $username	= 'root';
    $password	= 'root';
    $port = 3306;
  }

  try{
    $conn = new PDO("mysql:host=$servername; dbname=$dbname; port=$port", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec("SET NAMES 'utf8'");

  }catch(Exception $e){
    echo "Error: " . $e->getMessage();
    exit;
  }

  return $conn;

}


$conn = db();



function encrypting($action, $string, $key_sk, $key_siv){
  $cypher_method = "AES-256-CBC";
  $output = false;
  $key    = $key_sk;
  $iv     = $key_siv;
  if ($action == "encrypt"){
    $output = openssl_encrypt($string, $cypher_method, $key, 0, $iv);
    $output = base64_encode($output);
  } else if($action == "decrypt"){
    $output = base64_decode($string);
    $output = openssl_decrypt($output, $cypher_method, $key, 0, $iv);
  }
  return $output;
} //endfunction

$title = 'user';
$username = 'user';
$email = 'user@email.com';
$phone = '999999999';
$password = 'password';
$keypass =  'password';
$key_iv = 'password';
$key_tag = 'password';
$created = date("Y-m-d");
$updated = date("Y-m-d");
$active = '1';
$reference = date("Ymdhs").uniqid();

$key = hash("sha256", SECRET_KEY);
$iv = substr(hash("sha256", SECRET_IV), 0, 16);
$crypted_password = encrypting("encrypt", $password, $key, $iv);

$sql = "INSERT INTO users (title, username, email, phone, password, keypass, key_iv, key_tag, created, updated, active, reference) VALUES (:title, :username, :email, :phone, :crypted_password, :crypted_keypass, :key_siv, :key_sk, :created, :updated, :active, :reference)" ;
$query = $conn->prepare($sql);
$query->bindParam(':title', $title);
$query->bindParam(':username', $title);
$query->bindParam(':email', $email);
$query->bindParam(':phone', $phone);
$query->bindParam(':crypted_password', $crypted_password);
$query->bindParam(':crypted_keypass', $crypted_password);
$query->bindParam(':key_siv', $key);
$query->bindParam(':key_sk', $iv);
$query->bindParam(':created', $created);
$query->bindParam(':updated', $created);
$query->bindParam(':active', $active);
$query->bindParam(':reference', $reference);
$query->execute();

echo 'done';

 ?>
