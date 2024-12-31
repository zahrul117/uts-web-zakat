<?php
session_start();

$konek = mysqli_connect('localhost','root','','dbzakat_uts');

$nama = isset($_GET['nama']) ? htmlspecialchars($_GET['nama']) : '';
$kategori = isset($_GET['kategori']) ? htmlspecialchars($_GET['kategori']) : '';
$tanggal_penyerahan = isset($_GET['tanggal_penyerahan']) ? htmlspecialchars($_GET['tanggal_penyerahan']) : '';
$jumlah_bayar = isset($_GET['jumlah_bayar']) ? htmlspecialchars($_GET['jumlah_bayar']) : '';
$jk = isset($_SESSION['jk']) ? $_SESSION['jk'] : '';
$alamat = isset($_SESSION['alamat']) ? $_SESSION['alamat'] : '';
$nomor = isset($_SESSION['nomor']) ? $_SESSION['nomor'] : '';
$email = isset($_SESSION['email']) ? $_SESSION['email'] : '';

if (isset($_POST['submit'])) {
    // Ambil data dari form
    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $tanggal_penyerahan = $_POST['tanggal_penyerahan'];
    $jumlah_bayar = $_POST['jumlah_bayar'];
    $jk = $_POST['jk'];
    $alamat = $_POST['alamat'];
    $nomor = $_POST['nomor'];
    $email = $_POST['email'];
// buat 2 query
$queryMuzakki = "INSERT INTO muzakki (id_muzakki,nama_lengkap, jenis_kelamin, alamat, nomor, email,kategori)  VALUES ('','$nama', '$jk', '$alamat', '$nomor', '$email','$kategori')";

$queryPembayaran = "INSERT INTO pembayaran
     (id_pembayaran,nama_pembayar,kategori_zakat,tanggal_penyerahan,total_pembayaran) VALUES
     ('','$nama','$kategori','$tanggal_penyerahan','$jumlah_bayar')
     ";
$query = $queryMuzakki . ";" . $queryPembayaran;

// eksekusi query
mysqli_multi_query($konek,$query);

    if(mysqli_affected_rows($konek) > 0 ){
        echo "<script>alert('Pembayaran berhasil ditambahkan')</script>";
        echo "<script>document.location.href = 'index.php'</script>";
        
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profil Muzakki</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container py-5">
    <!-- Header -->
    <div class="text-center mb-4">
      <h1 class="fw-bold">Profil Muzakki</h1>
      <p class="text-muted">Informasi lengkap tentang profil Anda</p>
    </div>

    <!-- Informasi Profil -->
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card shadow">
          <div class="card-body text-center">
            <!-- Avatar -->
            <img src="https://png.pngtree.com/png-clipart/20220909/original/pngtree-man-avatar-with-circle-frame-vector-ilustration-png-image_8515464.png" alt="User Avatar" class="rounded-circle mb-3" style="width: 150px; height: 150px;">
            
            <!-- Informasi Personal -->
            <h4 class="card-title fw-bold"><?= $nama; ?></h4>
            <p class="text-muted"><?= $email?></p>
            <span class="badge bg-success mb-3">Muzakki</span>

            <!-- Detail Profil -->
            <ul class="list-group list-group-flush text-start">
              <li class="list-group-item">
                <strong>Alamat:</strong> <?= $alamat ?>
              </li>
              <li class="list-group-item">
                <strong>Jenis Kelamin :</strong> <?= $jk ?>
              </li>
              <li class="list-group-item">
                <strong>No. Telepon:</strong> <?= $nomor ?>
              </li>
              <li class="list-group-item">
                <strong>Kategori Zakat :</strong> <?= $kategori?>
              </li>
              <li class="list-group-item">
                <strong>Tanggal Penyaluran :</strong><?= $tanggal_penyerahan ?>
              </li>
              <li class="list-group-item">
                <strong>Total Zakat Disalurkan:</strong> <?= $jumlah_bayar ?>
              </li>
              <li>
              <div class="alert alert-info">
                <p>
                Please make a payment of Rp<?php echo $jumlah_bayar;
                ?> to <br>
                <strong>BANK BCA 123-45678 in the name of Zahrul.</strong><br>
                Please send the proof of payment via WhatsApp on 08210002210.
                </p>
            </div>
              </li>
            </ul>
            <form action="" method="POST">
              <input type="hidden" name="nama" value="<?= $nama ?>">
              <input type="hidden" name="kategori" value="<?= $kategori ?>">
              <input type="hidden" name="tanggal_penyerahan" value="<?= $tanggal_penyerahan ?>">
              <input type="hidden" name="jumlah_bayar" value="<?= $jumlah_bayar ?>">
              <input type="hidden" name="jk" value="<?= $jk ?>">
              <input type="hidden" name="alamat" value="<?= $alamat ?>">
              <input type="hidden" name="nomor" value="<?= $nomor ?>">
              <input type="hidden" name="email" value="<?= $email ?>">
              <a href="index.php" class="btn btn-primary">Back</a>
              <button type="submit" name="submit" class="btn btn-primary">Kirim</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
