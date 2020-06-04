<?php
include "administrator/koneksi.php";

$nma = ($_POST["namaku"]);
$tg = ($_POST["tanggal"]);
$almt = ($_POST["alamat"]);
$jk = ($_POST["jnskelamin"]);
$ag = ($_POST["agama"]);
$wg = ($_POST["warga"]);
$ot = ($_POST["ortu"]);
$mb = ($_POST["mobile"]);


// PROSES UPLOAD FILE
$nm_file = $_FILES["fileku"]["name"]; // nama file yang diupload
$temp_file = $_FILES["fileku"]["tmp_name"]; // nama file sementara
$uk_file = $_FILES["fileku"]["size"]; //ukuran file
$jn_file = $_FILES["fileku"]["type"]; // tipe file yang akan diupload

// tentukan lokasi tempat menyimpan file hasil upload
$dir = "administrator/hasil-upload/$nm_file";

// Parameter Upload
// status 1
if (strlen($nm_file) < 1) {
	header("location: pendaftaran.php?status=1");
	exit();
}

// status 2
$kumpulan_file = array("image/png", "image/gif", "image/jpg", "image/jpeg");
if (!in_array($jn_file, $kumpulan_file)) {
	header("location: pendaftaran.php?status=2");
	exit();
}

// status 3
$ukuran_maks = 100000; // 100kb
if ($uk_file > $ukuran_maks) {
	header("location: pendaftaran.php?status=3");
	exit();
}

// pindahkan file dari folder sementara (xampp/tmp) ke lokasi tujuan
move_uploaded_file($temp_file, $dir);

// query sql untuk insert data ke database
$sql = "INSERT INTO tbl_pendaftaran(nama_siswa, tgl_lahir, alamat, jns_kelamin, agama, kewarganegaraan, nama_ortu, nmr_hp, foto) VALUES('$nma','$tg','$almt','$jk','$ag','$wg','$ot','$mb','$nm_file')";

// jalankan perintah query diatas dengan mysqli_query
$query = mysqli_query($konek, $sql) or die(mysqli_error($konek));

// redirect page versi HTML
if ($query) {
	echo "<script type='text/javascript'>alert('Pendaftaran berhasil!')</script><meta http-equiv='refresh' content='1; url=pendaftaran.php'>";
}
