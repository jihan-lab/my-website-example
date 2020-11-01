<?php 
require 'conf.php';
require 'backend.php'; 


?>
<?php
	$edit=mysqli_real_escape_string($conn, $_GET["edit"]);

	if (!empty($edit)){
		$q=mysqli_query($conn, "SELECT * FROM mahasiswa WHERE id='$edit'", $connect)
		or die ("Server Query ".mysqli_error($conn));
		$r=mysqli_fetch_array($q);
		$id=$r["id"];
        $nama=$r["nama"];
        $nrp=$r["nrp"];
        $email=$r["email"];
        $jurusan=$r["jurusan"];
        $gambar=$r["gambar"];
        $tanggal=$r["tanggal"];
		
		if ( isset($_POST["submit"]) ){
			if( edit($_POST) > 0){
				echo "<script type='text/javascript'>
					alert('Data berhasil diubah');
					top.location.href='index.php';
					</script>";
			}else{
				echo "<script type='text/javascript'>
					alert('Data gagal diubah');
					top.location.href='index.php';
					</script>";
			}
		}
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
			
		</div>
	</header>
	
	<section class="main container clear">
	
	<div class="form-field clear">
		<br>
		<h1>Update Data Mahasiswa</h1>
		<form action="" method="post">
			<input type="hidden" name="id" value="<?=$id?>">
			<p>
				<label for="name">Nama Mahasiswa : </label>
				<input type="text" name="nama" id="nama"  value="<?=$nama?>" autocomplete="off" required>
			</p>
			<p>
				<label for="nrp">NRP : </label>
				<input type="text" name="nrp" id="nrp" value="<?=$nrp?>" autocomplete="off" required>
			</p>
			<p>
				<label for="email">Email</label>
				<input type="text" name="email" id="email" value="<?=$email?>" autocomplete="off" required>
			</p>
			<p>
				<label for="jurusan">Jurusan</label>
				<input type="text" name="jurusan" id=jurusan value="<?=$jurusan?>" autocomplete="off" required>
			</p>
			<p>
				<label for="gambar">Gambar</label>
				<input type="text" name="gambar" id="gambar" value="<?=$gambar?>" autocomplete="off" required>
			</p>
			<br>
			<p>
				<button type="submit" name="submit">Ubah Data</button>
			</p>
			<p><img src="../images/ajax-loader.gif" id="loader-form" alt=""></p>
			<span id="result-form"></span>
		</form>
	</div>
	
	<div class="data-table clear">
		
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