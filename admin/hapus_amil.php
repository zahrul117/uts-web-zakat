<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    require 'functions.php';

    $id = $_GET['id_amil'];
    if(hapusAmil($id) > 0 ){
        echo "<script>alert('Data Berhasil Dihapus');</script>";
        echo "<script>document.location.href = '?page=tampil_amil'</script>";
    } else{
        echo "<script>alert('Data Gagal Dihapus');</script>";
        echo "<script>document.location.href = '?page=tampil_amil'</script>";
    }


?>
</body>
</html>