<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Hapus Produk</title>
</head>

<body>
    <?php
    require 'functions.php';
    $id = $_GET['id_penerimaan'];
    
    if(hapusPenyaluran($id) > 0 ){
        echo "<script>alert('Data Berhasil Dihapus');</script>";
        echo "<script>document.location.href = '?page=tampil_penyaluran'</script>";
    } else{
        echo "<script>alert('Data Gagal Dihapus');</script>";
        echo "<script>document.location.href = '?page=tampil_penyaluran'</script>";
    }

    ?>
</body>
</html>