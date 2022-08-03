<?php
$host ='localhost';
$user ='root';
$pass ='';
$db ='systemrecord';
$koneksi = mysqli_connect($host, $user, $pass);
if(!$koneksi){
    die("cannot connect to database.");
}
mysqli_select_db($koneksi, $db);
?>
