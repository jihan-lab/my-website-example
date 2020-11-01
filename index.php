<?php 
require 'conf.php';
require 'backend.php'; 

?>

<?php 
    $q=mysqli_query($conn, "SELECT * FROM mahasiswa". $connect) 
    or die("Server Query ".mysqli_error($conn)); 
?>

<?php
//menambah data
if ( isset($_POST["submit"]) ){
	if( tambah($_POST) > 0){
		echo "<script> alert('Data berhasil ditambahkan'); </script>";
	}else{
		echo "<script> alert('Data gagal ditambahkan'); </script>";
	}
}
?>
<?php
	$delete=mysqli_real_escape_string($conn, $_GET["delete"]);

	if (!empty($delete)){
		mysqli_query($conn,"DELETE FROM mahasiswa WHERE id='$delete'", $connect)
		or die ("Server Query".mysqli_error($conn));
	}
		
?>
<?php
if (isset($_POST["cari"])){
	$q = cari($_POST["keyword"]);
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Post My Blog</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="images/jquery.fancybox.css">
	<script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
	<script type="text/javascript" src="js/jquery.fancybox.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
	
	
</head>

<body>
	
	<nav class="container clear">
		<ul class="menu">
			<li><a href="#">Beranda</a></li>
			<li><a href="#">Tentang Kami</a></li>
			<li><a href="#">Hubungi Kami</a></li>
		</ul>
		
		<ul class="social">
			<li><a href="#">RSS</a></li>
			<li><a href="#">Twitter</a></li>
			<li><a href="#">Facebook</a></li>
			<li><a href="#">Yahoo</a></li>
		</ul>
	</nav>
	
	<header class="header container clear">
		<div class="logo">
			<img src="images/logo.jpg" height="100px" width="200px" alt="logo" />
			<p>Just Another blog</p>
		</div>
			
		<div>
			<form class="search">
				<input type="text" name="search" placeholder="masukan kata kunci .." autofocus />
				<br>
				<button type="submit" name="cari">Cari</button>
			</form>
		</div>
	</header>
	
	<section class="main container clear">
	
	<div class="form-field clear">
		<br>
		<h1>Mahasiswa</h1>
		<form action="" method="post">
			<p>
				<label for="name">Nama Mahasiswa : </label>
				<input type="text" name="nama" id="nama" autocomplete="off" required>
			</p>
			<p>
				<label for="nrp">NRP : </label>
				<input type="text" name="nrp" id="nrp" autocomplete="off" required>
			</p>
			<p>
				<label for="email">Email</label>
				<input type="text" name="email" id="email" autocomplete="off" required>
			</p>
			<p>
				<label for="jurusan">Jurusan</label>
				<input type="text" name="jurusan" id=jurusan autocomplete="off" required>
			</p>
			<p>
				<label for="gambar">Gambar</label>
				<input type="text" name="gambar" id="gambar" autocomplete="off" required>
			</p>
			<br>
			<p>
				<button type="submit" name="submit">Simpan</button>
			</p>
			<p><img src="../images/ajax-loader.gif" id="loader-form" alt=""></p>
			<span id="result-form"></span>
		</form>
	</div>
	
	<div class="data-table clear">
		<h1>Daftar Mahasiswa</h1>
		<table>
			<tr>
				<th>No. </th>
				<th>ID</th>
				<th>Nama Mahasiswa</th>
				<th>NRP</th>
				<th>Email</th>
				<th>Jurusan</th>
				<th>Gambar</th>
				<th class="clean-border-right">Tanggal Simpan</th>
				<th class="clean-border-left">Aksi</th>
			</tr>
			<?php $i=1; ?>
			
			<?php 
				while ($r=mysqli_fetch_assoc($q)):{
				$id=$r["id"];
				$nama=$r["nama"];
				$nrp=$r["nrp"];
				$email=$r["email"];
				$jurusan=$r["jurusan"];
				$gambar=$r["gambar"];
				$tanggal=$r["tanggal"];
				}
			?>
			
			<tr>
				<td><?=$i?></td>
				<td><?=$id?></td>
				<td><?=$nama?></td>
				<td><?=$nrp?></td>
				<td><?=$email?></td>
				<td><?=$jurusan?></td>
				<td><?=$gambar?></td>
				<td><?=$tanggal?></td>
				<td>
					<a href="edit.php?pages=edit&edit=<?=$id?>">[Edit]</a>
					<a href="?pages=index&delete=<?=$id?>" onClick="return confirm('Apakah anda ingin menghapus data ini?');">[Delete]</a>
				</td>
			</tr>
			<?php $i++; ?>
			<?php endwhile; ?>
		</table>
	</div>
   
	</section>
	
	<footer>
		<p>Copy Right & copy ; Jihan Abdul Rohman, KotakKode.com All Right Reserved</p>
		<ul>
			<li><a href="#">Beranda</a></li>
			<li><a href="#">Tentang Kami</a></li>
			<li><a href="#">Hubungi Kami</a></li>
			<li><a href="#">RSS</a></li>
			<li><a href="#">Twitter</a></li>
			<li><a href="#">Facebook</a></li>
			<li><a href="#">Yahoo</a></li>
		</ul>
	</footer>
</body>
</html>