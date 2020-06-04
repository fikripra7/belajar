<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- 1, Meta Tag Responsive -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- 2. Bootstrap CSS -->
	<link rel="stylesheet" type="text/css" href="bootstrap-4/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<link rel="stylesheet" type="text/css" href="assets/fontawesome/css/all.css">

	<title>TK Al-Bina | Pendaftaran</title>
	<link rel="shortcut icon" href="assets/pic3.jpg">
</head>

<body id="my-top" style="background-color: #f8f9fa;">

	<div id="wrapper">
		<div id="header">
			<div class="row">
				<div class="col-md-12">
					<div class="container">
						<nav class="navbar navbar-expand-sm navbar-light bg-light fixed-top" id="nav-shrink">
							<div class="container">
								<a class="navbar-brand" href="index.html"><img src="assets/logo.png"></a>
								<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
									<span class="navbar-toggler-icon"></span>
								</button>
								<div class="collapse navbar-collapse" id="navbarNav">
									<ul class="navbar-nav mr-auto">
										<li class="nav-item">
											<a class="nav-link classku" href="index.php">Beranda</a>
										</li>
										<li class="nav-item">
											<a class="nav-link  activeku" href="pendaftaran.php">Pendaftaran</a>
										</li>
										<li class="nav-item">
											<a class="nav-link classku" href="profil.php" tabindex="-1" aria-disabled="true">Profil</a>
										</li>
										<li class="nav-item">
											<a class="nav-link classku" href="berita.php" tabindex="-1" aria-disabled="true">Berita</a>
										</li>
										<li class="nav-item">
											<a class="nav-link classku" href="pengumuman.php" tabindex="-1" aria-disabled="true">Pengumuman</a>
										</li>
									</ul>
								</div>
							</div>
						</nav>
					</div>
				</div>
			</div>
		</div><!-- end of header -->
		<div class="form-regist">
			<div class="container">
				<form id="w-form" action="insert-siswa.php" method="post" enctype="multipart/form-data">
					<h1>Form Pendaftaran</h1>

					<!-- Notifikasi Gagal Upload -->
					<?php
					if (isset($_GET["status"])) {

						$st = $_GET["status"];

						switch ($st) {
							case 1:
								echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
										<strong>Gagal Upload!</strong> Silahkan pilih file terlebih dahulu.
										<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
										<span aria-hidden='true'>&times;</span>
										</button>
									</div>";
								break;
							case 2:
								echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
										<strong>Gagal Upload!</strong> File yang diperbolehkan hanya berekstensi .jpg .png .gif.
										<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
										<span aria-hidden='true'>&times;</span>
										</button>
									</div>";
								break;
							case 3:
								echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
										<strong>Gagal Upload!</strong> File melebihi batas maksimal.
										<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
										<span aria-hidden='true'>&times;</span>
										</button>
									</div>";
								break;
							default:
								echo "status tidak ada";
								break;
						}
					}
					?>

					<hr style="border: 3px solid rgb(0, 0, 0, 0.4);">
					<div class="form-group">
						<label>Nama Lengkap</label>
						<input type="text" name="namaku" class="form-control" placeholder="Masukkan Nama" autofocus required>
					</div>
					<div class="form-group">
						<label>Tanggal Lahir</label>
						<input type="date" class="form-control" name="tanggal" required>
					</div>
					<div class="form-group">
						<label>Alamat</label>
						<textarea name="alamat" class="form-control" rows="3" placeholder="Alamat Lengkap" required></textarea>
					</div>
					<div class="form-group">
						<label>Jenis Kelamin</label>
						<br>
						<div class="custom-control custom-radio custom-control-inline">
							<input type="radio" id="customRadioInline1" value="L" name="jnskelamin" class="custom-control-input">
							<label class="custom-control-label" for="customRadioInline1">Laki-laki</label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
							<input type="radio" id="customRadioInline2" value="P" name="jnskelamin" class="custom-control-input">
							<label class="custom-control-label" for="customRadioInline2">Perempuan</label>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-4">
							<label>Agama</label>
							<select class="custom-select" name="agama" required>
								<option selected>Pilih..</option>
								<option value="1">Islam</option>
								<option value="2">Kristen</option>
								<option value="3">Katolik</option>
								<option value="4">Hindu</option>
								<option value="5">Budha</option>
							</select>
						</div>
						<div class="form-group col-md-4">
							<label>Kewarganegaraan</label>
							<select class="custom-select" name="warga" required>
								<option selected>Pilih..</option>
								<option value="1">WNA</option>
								<option value="2">WNI</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label>Nama Orang Tua / Wali Muirid</label>
						<input type="text" class="form-control" name="ortu" placeholder="Masukkan Nama" required>
					</div>
					<div class="form-group">
						<label>Nomor Hp</label>
						<input type="text" class="form-control" name="mobile" placeholder="Masukkan Nomor" required>
					</div>
					<div class="form-group">
						<label>Unggah Foto</label>
						<input type="file" name="fileku" class="form-control-file" required>
					</div>
					<button type="submit" value="Save" name="simpan" class="btn btn-primary">Submit</button>
					<button type="reset" value="Clear" name="reset" class="btn btn-danger">Reset</button>
				</form>
			</div>
		</div>
		<section id="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="fot-map">
							<h3 data-20p-center="opacity:1;left:0;" data-20p-bottom="opacity:0;left:-200px;">Our Address</h3>
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.554905196887!2d107.01441451415458!3d-6.190262295518581!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6989678920806d%3A0xd592d9bd1fd67d77!2sTK.%20Albina!5e0!3m2!1sid!2sid!4v1588288499726!5m2!1sid!2sid" width="100%" height="350px" frameborder="0" style="border:0; margin-bottom:50px;" allowfullscreen="" tabindex="0" data-20p-center="opacity:1;top:0;" data-20p-bottom="opacity:0;top:-200px;"></iframe>
						</div>
					</div>
					<div class="col-md-4">
						<div class="fc-left" data-20p-center="opacity:1;left:0;" data-20p-bottom="opacity:0;left:-200px;">
							<h5>Our Contacts</h5>
							<p class="map">Alamat : Jl. Ujung harapan Assalam No.1
								<br>
								Kel. Bahagia, Kec. Babelan. Kab. Bekasi</p>
							<p class="map">
								Telepon :
								<i class="fas fa-phone" style="font-size: 16px;
								color: #ffd541;"></i>
								<a class="hp" href="tel:#">+62 821-2464-7861</a>
								<br>
								WhatsApp :
								<i class="fas fa-phone" style="font-size: 16px;
								color: #ffd541;"></i>
								<a class="hp" href="tel:#">+62 821-2464-7861</a>
								<br>
								<br>
								Jam Operasional :
								<br>
								Hari Senin s.d. Jum'at
								<br>
								Pukul 08.00 WIB - 02.00 WIB
							</p>
						</div>
					</div>
					<div class="col-md-2">
						<div class="fc-right" data-20p-center="opacity:1;right:0;" data-20p-bottom="opacity:0;right:-200px;">
							<h5>Follow Us</h5>
							<div class="sosmed">
								<ul>
									<li>
										<a href="#">
											<i class="fab fa-facebook"></i>
										</a>
									</li>
									<li>
										<a href="#">
											<i class="fab fa-twitter"></i>
										</a>
									</li>
									<li>
										<a href="#">
											<i class="fab fa-instagram"></i>
										</a>
									</li>
									<li>
										<a href="#">
											<i class="fab fa-linkedin"></i>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section><!-- end of footer-widget -->
		<footer id="footer-end">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<p class="text-center">Hak Cipta &copy; 2020 | Oleh : TK Al-Bina Bekasi</p>
					</div>
				</div>
			</div>
		</footer>
	</div>

	<!-- 3. jQuery Library -->
	<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
	<!-- 4, popper.js -->
	<script type="text/javascript" src="js/poper.min.js"></script>
	<!-- 5. Bootstrap JS -->
	<script type="text/javascript" src="bootstrap-4/js/bootstrap.js"></script>
	<!-- skrollr js -->
	<script src="js/skrollr .js"></script>
	<script type="text/javascript">
		var s = skrollr.init();
	</script>
	<script>
		window.onscroll = function() {
			scrollFunction()
		};

		function scrollFunction() {
			if (document.body.scrollTop > 15 || document.documentElement.scrollTop > 15) {
				document.getElementById("nav-shrink").style.padding = "5px 0px";
			} else {
				document.getElementById("nav-shrink").style.padding = "15px 0px";
			}
		}
	</script>
</body>

</html>