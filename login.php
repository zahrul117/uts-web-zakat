
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
            <form action="" method="POST">
                <h1>Login</h1>
                <hr>
                <p>Baznas Kab. Muaro Jambi</p>
                <label>Username : </label>
                <input type="text" placeholder="masukkan username" name="username">
                <label>Password : </label>
                <input type="password" name="password"  placeholder="password">
                <button type="submit" name="submit">Login</button>
                <a href="registrasi.php" style="text-decoration: none;"><p>Daftar Amil Zakat</p></a>
            </form>

            <?php 

session_start(); 

if(isset($_SESSION["login"])){
    header("Location: admin/dashboard.php");
    exit;
}


$conn = mysqli_connect('localhost','root','','dbzakat_uts'); 

if(isset($_POST['submit'])){
$username= $_POST ['username'];
$password= $_POST ['password'];

$sql = "SELECT * FROM admin WHERE username='$username'"; 

$result = $conn->query($sql); 
if ($result->num_rows > 0) { 
    
    $row = mysqli_fetch_assoc($result);
    password_verify($password, $row["password"]);

    $_SESSION["login"] = true;
    $_SESSION['username'] = $username; 

 header("Location: admin/dashboard.php"); 

} else { 

 echo "Login gagal. <a href='login.php'>Coba lagi</a>"; 

} 

$conn->close(); 
}
?>

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