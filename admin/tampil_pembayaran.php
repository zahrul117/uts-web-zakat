<?php
require 'functions.php';

$ambil = query("SELECT * FROM pembayaran ORDER BY id_pembayaran DESC");

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
<h2 class="ms-5">Tabel Data Pembayaran Zakat</h2>
    <hr align="left" width="400">
    <div class="container">
    <a class="btn btn-success mb-3" style="margin-left: 45px;" href="pdf_pembayaran.php" role="button">Unduh PDF</a>
    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-striped">
    <tr>
          <th width="3" class="text-center">No.</th>
          <th class="text-center">Nama Pembayar</th>
          <th class="text-center">Kategori Zakat</th>
          <th class="text-center">Tanggal Penyerahan</th>
          <th class="text-center">Total Pembayaran</th>
          <th class="text-center">Aksi</th>
    </tr>
    <?php $no = 1 ?>
    <?php foreach($ambil as $data):?>
        <tr>
            <td class="text-center"><?= $no ?></td>
            <td class="text-center"><?php echo $data['nama_pembayar'];?></td>
            <td class="text-center"><?= $data['kategori_zakat'];?></td>
            <td class="text-center"><?= $data['tanggal_penyerahan'];?></td>
            <td class="text-center"><?= $data['total_pembayaran'];?></td>
            <td class="text-center">
            <a class="btn btn-danger" href="?page=hapus_pembayaran&id_pembayaran=<?php echo $data['id_pembayaran']; ?>" onclick="return confirm ('Yakin ingin menghapus data?')">Hapus</a>
            <a class="btn btn-primary" href="?page=edit_pembayaran&id_pembayaran=<?= $data['id_pembayaran']?>`">Edit</a></td>
            

        </tr>
        <?php $no++ ?>
    <?php endforeach;?>
    </table>
    </div>
</body>
</html>