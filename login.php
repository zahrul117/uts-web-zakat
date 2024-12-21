<?php
// cek tombol submit
if(isset($_POST["submit"])){
    // cek username $ password
    if ($_POST["username"] == "zahrul" && $_POST["password"] == "123"){

    // true/benar
    header("Location: admin/dashboard.php");
    exit;
} else{
    // salah/false
    $error = true;
}

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/stylelogin.css">
</head>
<body>
    <div class="container">
        <div class="login">
            <form action="" method="post">
                <h1>Login</h1>
                <hr>
                <p>Baznas Kab. Muaro Jambi</p>
                <label for="username">Username : </label>
                <input type="text" placeholder="masukkan username" name="username">
                <label for="password">Password : </label>
                <input type="password" name="password" id="password" placeholder="password">
                <button type="submit" name="submit">Login</button>
                <a href="registrasi.php" style="text-decoration: none;"><p>Daftar Amil Zakat</p></a>
            </form>
        </div>
        <div class="kanan">
            <img src="imglogin.jpeg" alt="">
        </div>
    </div>
    <?php if(isset($error)): ?>
        <script>alert("Username / password salah!")</script>
    <?php endif; ?>
</body>
</html>