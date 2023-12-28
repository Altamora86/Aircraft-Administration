<?php
session_start();

$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'pesawat';

//mengecek koneksi database
$connect = new mysqli($db_host, $db_user, $db_pass, $db_name);
if($connect->errno) {
  echo $connect->error;
  exit;
}
?>