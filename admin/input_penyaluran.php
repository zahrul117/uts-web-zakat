<?php
require 'functions.php';

if(isset($_POST['submit'])){
  if(tambahPenyaluran($_POST) > 0 ){
    echo "<script>alert('Data Berhasil Disimpan');</script>";
    echo "<script>document.location.href = '?page=tampil_penyaluran'</script>";
  } else{
    echo "<script>alert('Data Gagal Disimpan');</script>";
    echo "<script>document.location.href = '?page=tampil_penyaluran'</script>";
  }
}


?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="css/styleinput.css">
</head>

<body>
  <h2 class="text-center">Form Tambah Penyaluran</h2><hr width="800">
    <form id="form1" method="post" name="form1" action="" enctype="multipart/form-data">
        <!--Untuk Nama lengkap -->
        <div class="mb-3 row">
    <label for="tgl_penerimaan" class="col-sm-2 col-form-label">Tanggal Penerimaan</label>
    <div class="col-sm-4">
      <input type="date" class="form-control" id="tgl_penerimaan" name=tgl_penerimaan required>
    </div>
  </div>
  <div class="mb-3">
    <label for="id_mustahik" class="form-label">Nama Penerima (Mustahik)</label>
    <select class="form-select" id="id_mustahik" name="nama_lengkap" required>
        <option value="" disabled selected>Pilih Mustahik</option>
        <!-- Opsi mustahik akan diambil dari database -->
        <?php
        $mustahik = mysqli_query($konek, "SELECT id_mustahik, nama_lengkap FROM mustahik");
        while ($row = mysqli_fetch_assoc($mustahik)) {
            echo "<option value='{$row['nama_lengkap']}'>{$row['nama_lengkap']}</option>";
        }
        ?>
    </select>
</div>

    

    <!-- alamat -->
    <div class="mb-3 row">
    <label for="uang" class="col-sm-2 col-form-label">Jumlah Penerimaan Uang(RP)</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="uang" name=uang required>
    </div>
  </div>

  <div class="mb-3">
    <label for="id_amil" class="col-sm-2 col-form-label">Nama Amil</label>
    <select class="form-select" id="id_amil" name="nama_amil" required>
        <option value="" disabled selected>Pilih Amil Zakat</option>
        <!-- Opsi amil akan diambil dari database -->
        <?php
        $amil = mysqli_query($konek, "SELECT id_amil, nama_amil FROM amilzakat");
        while ($row = mysqli_fetch_assoc($amil)) {
            echo "<option value='{$row['nama_amil']}'>{$row['nama_amil']}</option>";
        }
        ?>
    </select>
</div>


        <!-- Untuk button simpan dan back -->
        <div class="mb-3 row">
    <label for="button" class="col-sm-2 col-form-label"></label>
    <div class="col-sm-4">
        
       <button type="submit" name="submit" class="btn btn-primary">Simpan!</button> 
        
     <a href="?page=tampil_muzaki"><button type="button" class="btn btn-warning" href=>Back</button></a>
    </div>
  </div>
    </form>
</body>
</html>