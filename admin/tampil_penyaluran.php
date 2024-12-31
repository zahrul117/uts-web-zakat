<?php
require 'functions.php';

$ambil = query("SELECT * FROM penyaluran ORDER BY id_penerimaan DESC");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styletampil.css">
</head>
<body>
<h2 class="ms-5">Tabel Data Penyaluran Zakat</h2>
    <hr align="left" width="400">
    <a class="btn btn-primary mb-3" style="margin-left: 45px;" href="?page=input_penyaluran" role="button">Tambah Data Penyaluran Zakat</a>
    <a class="btn btn-success mb-3" style="margin-left: 45px;" href="pdf_penyaluran.php" role="button">Unduh PDF</a>
    <div class="container">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-striped">
    <tr>
          <th width="3" class="text-center">No.</th>
          <th class="text-center">Tanggal Penerimaan</th>
          <th class="text-center">Nama Penerima</th>
          <th class="text-center">Jumlah Penerimaan Uang(RP)</th>
          <th class="text-center">Nama Amil</th>
          <th class="text-center">Aksi</th>
    </tr>
    <?php $no = 1 ?>
    <?php foreach($ambil as $data):?>
        <tr>
            <td class="text-center"><?= $no ?></td>
            <td class="text-center"><?php echo $data['tgl_penerimaan'];?></td>
            <td class="text-center"><?= $data['nama_penerima'];?></td>
            <td class="text-center"><?= $data['jumlah_penerimaan'];?></td>
            <td class="text-center"><?= $data['amil'];?></td>
            <td class="text-center" width="25%">
            <a class="btn btn-danger" href="?page=hapus_penyaluran&id_penerimaan=<?php echo $data['id_penerimaan']; ?>" onclick="return confirm ('Yakin ingin menghapus data?')">Hapus</a>
            <a class="btn btn-primary" href="?page=edit_penyaluran&id_penerimaan=<?= $data['id_penerimaan']?>`">Edit</a></td>
            

        </tr>
        <?php $no++ ?>
    <?php endforeach;?>
    </table>
    </div>
</body>
</html>