<?php
require 'functions.php';


$id = $_GET['id_mustahik'];

$data = query("SELECT * FROM mustahik where id_mustahik = '$id'")[0]; 

if(isset($_POST['submit'])){
  if(editMustahik($_POST) > 0 ){
    echo "<script>alert('Data Berhasil Diedit');</script>";
    echo "<script>document.location.href = '?page=tampil_mustahik'</script>";
  }else{
    echo "<script>alert('Data Gagal Diedit');</script>";
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
  <h2 class="text-center">Form Edit Penerima</h2><hr width="800">
    <form id="form1" method="post" name="form1" action="" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $data['id_mustahik'] ?>">
        <!--Untuk Nama lengkap -->
        <div class="mb-3 row">
    <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="nama" name=nama required value="<?php echo $data['nama_lengkap']; ?>">
    </div>
  </div>
        <!-- Untuk Jenis Kelamin -->
        <div class="mb-3 row">
         <label for="jk" class="col-sm-2 col-form-label">Jenis Kelamin</label>
         <div class="col-sm-4">
         <select name="jk" id="jk" value="<?= $data['jenis_kelamin'];?>">
          <option value="Laki-laki">Laki-Laki</option>
          <option value="Perempuan">Perempuan</option>
         </select>
         </div>
        </div>
    

    <!-- alamat -->
    <div class="mb-3 row">
    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="alamat" name=alamat required value="<?php echo $data['alamat']; ?>">
    </div>
  </div>

        <!--Untuk Nomor HP -->
        <div class="mb-3 row">
    <label for="nohp" class="col-sm-2 col-form-label">No</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="nohp" name=nohp required value="<?php echo $data['nomor'];?>">
    </div>
  </div>

   <!--Untuk Kategori -->
   <div class="mb-3 row">
         <label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
         <div class="col-sm-4">
         <select name="kategori" id="jk" value="<?= $data['kategori'];?>">
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
        
       <button type="submit" name="submit" class="btn btn-primary">Edit!</button> 
        
     <a href="?page=tampil_mustahik"><button type="button" class="btn btn-warning" href=>Back</button></a>
    </div>
  </div>
    </form>
</body>
</html>