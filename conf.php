<?php
// ini adalah pembuatan variabel agar parameter di script utama lebih singkat
$server = "localhost";
$user = "root";
$password = "";
$nama_database ="phpdasar";

//yang penting adalah script ini, untuk masuk db
$db = mysqli_connect($server, $user, $password, $nama_database); 

if( !$db){
	die("Gagal terhubung dengan database : " . mysqli_connect_error());
}

$conn=mysqli_connect('localhost', 'root', '', 'phpdasar');

?>