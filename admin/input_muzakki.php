<?php
require 'functions.php';

if(isset($_POST['submit'])){
  if(tambahMuzakki($_POST) > 0 ){
    echo "<script>alert('Data Berhasil Disimpan');</script>";
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
  <h2 class="text-center">Form Tambah Pembayar</h2><hr width="800">
    <form id="form1" method="post" name="form1" action="" enctype="multipart/form-data">
        <!--Untuk Nama lengkap -->
        <div class="mb-3 row">
    <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="nama" name=nama required>
    </div>
  </div>
        <!-- Untuk Jenis Kelamin -->
        <div class="mb-3 row">
         <label for="jk" class="col-sm-2 col-form-label">Jenis Kelamin</label>
         <div class="col-sm-4">
         <select name="jk" id="jk">
          <option value="Laki-laki">Laki-Laki</option>
          <option value="Perempuan">Perempuan</option>
         </select>
         </div>
        </div>
    

    <!-- alamat -->
    <div class="mb-3 row">
    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="alamat" name=alamat required>
    </div>
  </div>

        <!--Untuk Nomor HP -->
        <div class="mb-3 row">
    <label for="nohp" class="col-sm-2 col-form-label">No. Handphone</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="nohp" name=nohp required>
    </div>
  </div>

   <!--Untuk Email -->
   <div class="mb-3 row">
    <label for="email" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-4">
      <input type="email" class="form-control" id="email" name=email required>
    </div>
  </div>

   <!-- Untuk Jenis Kelamin -->
        <div class="mb-3 row">
         <label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
         <div class="col-sm-4">
         <select name="kategori" id="kategori">
          <option value="Zakat Penghasilan">Zakat Penghasilan</option>
          <option value="Zakat Emas">Zakat Emas</option>
          <option value="Zakat Tabungan">Zakat Tabungan</option>
          <option value="Zakat Perdagangan">Zakat Perdagangan</option>
          <option value="Zakat Perusahaan">Zakat Perusahaan</option>
         </select>
         </div>
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