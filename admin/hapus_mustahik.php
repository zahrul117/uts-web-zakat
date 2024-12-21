<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Hapus Produk</title>
</head>

<body>
    <?php
    require 'functions.php';
    $id = $_GET['id_mustahik'];

    if(hapusMustahik($id) > 0 ){
        echo "<script>alert('Data Berhasil Dihapus');</script>";
        echo "<script>document.location.href = '?page=tampil_mustahik'</script>";
    } else{
        echo "<script>alert('Data Gagal Dihapus');</script>";
        echo "<script>document.location.href = '?page=tampil_muzaki'</script>";
    }
    ?>
</body>
</html>