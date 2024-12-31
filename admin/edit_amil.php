<?php

require 'functions.php';

$id=$_GET['id_amil'];

$data = query("SELECT * FROM amilzakat WHERE id_amil = '$id'")[0];

if(isset($_POST['submit'])){
  if(editAmil($_POST) > 0){
    echo "<script>alert('Data Berhasil Disimpan');</script>";
    echo "<script>document.location.href = '?page=tampil_amil'</script>";
  }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/styleinput.css">
</head>
<body>
<h2 class="text-center">Form Edit Data Amil Zakat</h2><hr width="800">
<form id="form1" method="post" name="form1" action="" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $data['id_amil']; ?>">
 <!--Untuk Nama lengkap -->
 <div class="mb-3 row">
    <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="nama" name=nama required value="<?php echo $data['nama_amil']; ?>">
    </div>
  </div>

    <!--Untuk Nomor HP -->
    <div class="mb-3 row">
    <label for="nohp" class="col-sm-2 col-form-label">No. Handphone</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="nohp" name=nohp required value="<?= $data['no_hp'];?>">
    </div>
  </div>

    <!-- alamat -->
    <div class="mb-3 row">
    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="alamat" name=alamat required value="<?php echo $data['alamat']; ?>">
    </div>
  </div>


  <div class="mb-3 row">
    <label for="button" class="col-sm-2 col-form-label"></label>
    <div class="col-sm-4">
        
       <button type="submit" name="submit" class="btn btn-primary" onclick="return confirm('Yakin untuk mengubah data tersebut?');">Edit!</button> 
        
     <a href="?page=tampil_amil"><button type="button" class="btn btn-warning" href=>Back</button></a>
    </div>
  </div>
</form>
</body>
</html>