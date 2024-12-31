<?php
require 'functions.php';

$id = $_GET['id_muzakki'];

$data = query("SELECT * FROM muzakki where id_muzakki = '$id'")[0];

if(isset($_POST['submit'])){
  if(editMuzakki($_POST) > 0 ){
    echo "<script>alert('Data Berhasil Diubah');</script>";
    echo "<script>document.location.href = '?page=tampil_muzaki'</script>";
  } else{
    echo "<script>alert('Data Gagal Diubah');</script>";
    echo "<script>document.location.href = '?page=tampil_muzaki'</script>";
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
  <h2 class="text-center">Form Edit Pembayar</h2><hr width="800">
    <form id="form1" method="post" name="form1" action="" enctype="multipart/form-data">
        <!--Untuk Nama lengkap -->
        <input type="hidden" name="id" value="<?= $data['id_muzakki'] ?>">
        <div class="mb-3 row">
    <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="nama" name=nama required value="<?= $data['nama_lengkap'] ?>">
    </div>
  </div>
        <!-- Untuk Jenis Kelamin -->
        <div class="mb-3 row">
         <label for="jk" class="col-sm-2 col-form-label">Jenis Kelamin</label>
         <div class="col-sm-4">
         <select name="jk" id="jk" value="<?= $data['jenis_kelamin'] ?>">
          <option>Laki-Laki</option>
          <option>Perempuan</option>
         </select>
         </div>
        </div>
    

    <!-- alamat -->
    <div class="mb-3 row">
    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="alamat" name=alamat required value="<?= $data['alamat'] ?>">
    </div>
  </div>

        <!--Untuk Nomor HP -->
        <div class="mb-3 row">
    <label for="nohp" class="col-sm-2 col-form-label">No. Handphone</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="nohp" name=nohp required value="<?= $data['nomor'] ?>">
    </div>
  </div>

   <!--Untuk Email -->
   <div class="mb-3 row">
    <label for="email" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-4">
      <input type="email" class="form-control" id="email" name=email required value="<?= $data['email'] ?>">
    </div>
  </div>

   <!-- Untuk Jenis Kelamin -->
        <div class="mb-3 row">
         <label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
         <div class="col-sm-4">
         <select name="kategori" id="kategori" value="<?= $data['kategori'] ?>">
          <optgroup label="Kategori Zakat">
          <option>Zakat Penghasilan</option>
          <option>Zakat Emas</option>
          <option>Zakat Tabungan</option>
          <option>Zakat Perdagangan</option>
          <option>Zakat Perusahaan</option>
          </optgroup>
         </select>
         </div>
        </div>

        <!-- Untuk button simpan dan back -->
        <div class="mb-3 row">
    <label for="button" class="col-sm-2 col-form-label"></label>
    <div class="col-sm-4">
        
       <button type="submit" name="submit" class="btn btn-primary" onclick="return confirm('Yaking untuk mengubah data tersebut?')">Edit!</button> 
        
     <a href="?page=tampil_muzaki"><button type="button" class="btn btn-warning" href=>Back</button></a>
    </div>
  </div>
    </form>
</body>
</html>