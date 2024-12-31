<?php
require 'admin/functions.php';

if(isset($_POST['submit'])){

    if(registrasi($_POST)>0){
        echo "<script>alert('Admin Baru Berhasil Ditambahkan')</script>";
        echo "<script>location.href='login.php'</script>";
    } else{
        echo mysqli_error($konek);
    }


}





?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/registrasi.css">
</head>
<body>
    <div class="container">
        <div class="login">
            <form action="" method="post">
                <h1>registrasi Data Admin Zakat</h1>
                <hr>
                <p>Baznas Kab. Muaro Jambi</p>
                <label for="username">Username : </label>
                <input type="text" placeholder="masukkan username" name="username" required autocomplete="off" autofocus>
                <label for="password">Password : </label>
                <input type="password" name="password" id="password" placeholder="password">
                <label for="password2">Konfirmasi Password : </label>
                <input type="password" name="password2" id="password2" placeholder="konfirmasi password">
                <button type="submit" name="submit">Daftar</button>
            </form>
        </div>
</body>
</html>