<?php
require 'conf.php';



function tambah($data){
	global $conn;
	$nama =htmlspecialchars($data["nama"]);
	$nrp = htmlspecialchars($data["nrp"]);
	$email = htmlspecialchars($data["email"]);
	$jurusan = htmlspecialchars($data["jurusan"]);
	$gambar = htmlspecialchars($data["gambar"]);
	
	$query = "INSERT INTO mahasiswa VALUES ('', '$nama', '$nrp', '$email', '$jurusan', '$gambar' , NOW())";
	mysqli_query($conn, $query);
	
	return mysqli_affected_rows($conn);
}

function edit($data){
	global $conn;
	$id = $data["id"];
	$nama =htmlspecialchars($data["nama"]);
	$nrp = htmlspecialchars($data["nrp"]);
	$email = htmlspecialchars($data["email"]);
	$jurusan = htmlspecialchars($data["jurusan"]);
	$gambar = htmlspecialchars($data["gambar"]);
	
	$query = "UPDATE mahasiswa SET nama='$nama', nrp='$nrp', email='$email', jurusan='$jurusan', gambar='$gambar' WHERE id='$id'";
	mysqli_query($conn, $query);
	
	return mysqli_affected_rows($conn);
}

function cari($keyword){
	$query = "SELECT * FROM mahasiswa WHERE nama = '$keyword'";
	
}


?>