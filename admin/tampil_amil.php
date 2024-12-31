<?php
require 'functions.php';

$ambil = query("SELECT * FROM amilzakat");



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styletampil.css">
</head>
<body>
    <h2 class="ms-5">Tabel Data Amil Zakat</h2>
    <hr align="left" width="400">
    <a class="btn btn-primary mb-3" style="margin-left: 45px;" href="?page=input_amil" role="button">Tambah Data Amil</a>

    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-striped">
        <tr>
            <th class="text-center">Nomor</th>
            <th class="text-center">Nama Amil</th>
            <th class="text-center">Nomor Telepon</th>
            <th class="text-center">Alamat</th>
            <th class="text-center">aksi</th>
        </tr>
        <?php $no=1 ?>
        <?php foreach($ambil as $data):?>
            <tr>
                <td class="text-center"><?= $no ?></td>
                <td class="text-center"><?= $data['nama_amil'];?></td>
                <td class="text-center"><?= $data['no_hp'];?></td>
                <td class="text-center"><?= $data['alamat'];?></td>
                <td class="text-center"><a class="btn btn-danger" href="?page=hapus_amil&id_amil=<?php echo $data['id_amil']; ?>" onclick="return confirm('Yakin Menghapus Data ini?')">Hapus</a> | 
            <a class="btn btn-primary" href="?page=edit_amil&id_amil=<?= $data['id_amil'];?>">Edit</a>
        </td>
            </tr>

    <?php $no++ ?>
    <?php endforeach;?>        
    </table>
</body>
</html>