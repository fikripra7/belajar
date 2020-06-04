<h3>Form Edit Data</h3>
<hr>
<br>

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

<?php
include "../koneksi.php";

// tangkap URL dengan menggunakan $_GET
$ids = $_GET["edit_id"];

// tampilkan data yang akan diedit
$sql = "SELECT * FROM tbl_pendaftaran WHERE id_siswa=$ids";
$query = mysqli_query($konek, $sql) or die(mysqli_error($konek));

// tarik data dari database 
$data = mysqli_fetch_array($query);

$ft = $data["foto"];
$noimg = $data["foto"] == "" ? "../assets/no-image.png" : "../hasil-upload/$ft";
?>

<form action="update-data.php" method="post" enctype="multipart/form-data">
  <input type="hidden" name="idku" value="<?php echo $data['id_siswa']; ?>">

  <div class="form-group">
    <label>Nama Lengkap</label>
    <input type="text" name="namaku" class="form-control" placeholder="Masukkan Nama" value="<?php echo $data['nama_siswa']; ?>" autofocus required>
  </div>
  <div class="form-group">
    <label>Tanggal Lahir</label>
    <input type="date" class="form-control" name="tanggal" value="<?php echo $data['tgl_lahir']; ?>" required>
  </div>
  <div class="form-group">
    <label>Alamat</label>
    <textarea name="alamat" class="form-control" rows="3" placeholder="Alamat Lengkap" required><?php echo $data["alamat"]; ?></textarea>
  </div>
  <div class="form-group">
    <label>Jenis Kelamin</label>
    <br>
    <div class="custom-control custom-radio custom-control-inline">
      <input type="radio" id="customRadioInline1" value="L" name="jnskelamin" class="custom-control-input" <?php if ($data["jns_kelamin"] == "L") echo "checked"; ?>>
      <label class="custom-control-label" for="customRadioInline1">Laki-laki</label>
    </div>
    <div class="custom-control custom-radio custom-control-inline">
      <input type="radio" id="customRadioInline2" value="P" name="jnskelamin" class="custom-control-input" <?php if ($data["jns_kelamin"] == "P") echo "checked"; ?>>
      <label class="custom-control-label" for="customRadioInline2">Perempuan</label>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label>Agama</label>
      <select class="custom-select" name="agama" required>
        <option selected>Pilih..</option>
        <option value="1" <?php if ($data["agama"] == "1") echo "selected"; ?>>Islam</option>
        <option value="2" <?php if ($data["agama"] == "2") echo "selected"; ?>>Kristen</option>
        <option value="3" <?php if ($data["agama"] == "3") echo "selected"; ?>>Katolik</option>
        <option value="4" <?php if ($data["agama"] == "4") echo "selected"; ?>>Hindu</option>
        <option value="5" <?php if ($data["agama"] == "5") echo "selected"; ?>>Budha</option>
      </select>
    </div>
    <div class="form-group col-md-4">
      <label>Kewarganegaraan</label>
      <select class="custom-select" name="warga" required>
        <option selected>Pilih..</option>
        <option value="1" <?php if ($data["kewarganegaraan"] == "1") echo "selected"; ?>>WNA</option>
        <option value="2" <?php if ($data["kewarganegaraan"] == "2") echo "selected"; ?>>WNI</option>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label>Nama Orang Tua / Wali Muirid</label>
    <input type="text" class="form-control" name="ortu" placeholder="Masukkan Nama" value="<?php echo $data['nama_ortu']; ?>" required>
  </div>
  <div class="form-group">
    <label>Nomor Hp</label>
    <input type="text" class="form-control" name="mobile" placeholder="Masukkan Nomor" value="<?php echo $data['nmr_hp']; ?>" required>
  </div>
  <img src="<?php echo $noimg; ?>" height="50" width="50">
  <div class="form-group">
    <label>Unggah Foto</label>
    <input type="file" name="fileku" class="form-control-file">
  </div>
  <div class="form-group">
    <input class="btn btn-primary" type="submit" value="Simpan" name="save">
  </div>
</form>