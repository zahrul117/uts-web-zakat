<?php 
include 'functions.php';

$ambil = query("SELECT * FROM muzakki");

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
<h2 class="ms-5">Tabel Data Pembayar</h2>
    <hr align="left" width="400">
    <a class="btn btn-primary mb-3" style="margin-left: 45px;" href="?page=input_muzakki" role="button">Tambah Data Pembayar</a>
    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-striped">
      <tbody>
        <tr>
         <th>No.</th>
          <th class="text-center">Nama Pembayar</th>
          <th class="text-center">Jenis Kelamin</th>
          <th class="text-center">Alamat Pembayar</th>
          <th class="text-center">No. Handphone</th>
          <th class="text-center">Email</th>
          <th class="text-center">Kategori</th>
          <th class="text-center">Aksi</th>
        </tr>
        <?php $no = 1;?>
        <?php
        // ambil data (fetch) muzakki dari tabel muzakki
        foreach ($ambil as $data):
        ?>
        <tr>
          <td class="text-center"><?= $no; ?></td>
          <td class="text-center"><?php echo $data['nama_lengkap']; ?></td>
          <td class="text-center"><?php echo $data['jenis_kelamin']; ?></td>
          <td class="text-center"><?= $data['alamat']; ?></td>
          <td class="text-center"><?= $data['nomor']; ?></td>
          <td class="text-center"><?= $data['email']; ?></td>
          <td class="text-center"><?= $data['kategori']; ?></td>
          <td class="text-center"><a class="btn btn-danger btn-small" href="?page=hapus_muzakki&id_muzakki=<?php echo $data['id_muzakki']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
          <a class="btn btn-primary btn-small">Edit</a>
        </td>
        </tr>
        <?php $no++; ?>
        <?php endforeach; ?>
      </tbody>
    </table>
    <p>&nbsp;</p>

</body>
</html>