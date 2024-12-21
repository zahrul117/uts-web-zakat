<?php
require 'functions.php';

if(isset($_POST['submit'])){
  if(tambahMustahik($_POST) > 0 ){
    echo "<script>alert('Data Berhasil Disimpan');</script>";
    echo "<script>document.location.href = '?page=tampil_mustahik'</script>";
  }
}



?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link rel="stylesheet" href="css/styleinput.css">
</head>

<body>
  <h2 class="text-center">Form Tambah Penerima</h2><hr width="800">
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
    <label for="nohp" class="col-sm-2 col-form-label">No</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="nohp" name=nohp required>
    </div>
  </div>

   <!--Untuk Kategori -->
   <div class="mb-3 row">
         <label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
         <div class="col-sm-4">
         <select name="kategori" id="jk">
          <option value="fakir">Fakir</option>
          <option value="miskin">Miskin</option>
          <option value="amil">Amil</option>
          <option value="muallaf">Muallaf</option>
          <option value="gharim">Gharim</option>
         </select>
         </div>
        </div>


        <!-- Untuk button simpan dan back -->
        <div class="mb-3 row">
    <label for="button" class="col-sm-2 col-form-label"></label>
    <div class="col-sm-4">
        
       <button type="submit" name="submit" class="btn btn-primary">Simpan!</button> 
        
     <a href="?page=tampil_mustahik"><button type="button" class="btn btn-warning" href=>Back</button></a>
    </div>
  </div>
    </form>
</body>
</html>