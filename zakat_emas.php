<?php
session_start();

$nama = isset($_GET['nama']) ? htmlspecialchars($_GET['nama']) : '';
$kategori = isset($_GET['kategori']) ? htmlspecialchars($_GET['kategori']) : '';
$tanggal_penyerahan = isset($_GET['tanggal_penyerahan']) ? htmlspecialchars($_GET['tanggal_penyerahan']) : '';
$jumlah_bayar = isset($_GET['jumlah_bayar']) ? htmlspecialchars($_GET['jumlah_bayar']) : '';

$konek = mysqli_connect('localhost','root','','dbzakat_uts');

if(isset($_POST['submit'])){
    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $tgl_penyerahan = $_POST['tanggal_penyerahan'];
    $jumlah_bayar = $_POST['hasil_zakat'];

    // simpan data ke session
    $_SESSION['nama'] = $nama;
    $_SESSION['kategori'] = $kategori;
    $_SESSION['tanggal_penyerahan'] = $tanggal_penyerahan;
    $_SESSION['jumlah_bayar'] = $jumlah_bayar;


    echo "<script>location.href='teslagi.php?nama=" . urlencode($nama) . "&kategori=" . urlencode($kategori) . "&tanggal_penyerahan=" . urlencode($tgl_penyerahan) . "&jumlah_bayar=" . urlencode($jumlah_bayar) . "'</script>";

    // $simpan = "INSERT INTO pembayaran
    //  (id_pembayaran,nama_pembayar,kategori_zakat,tanggal_penyerahan,total_pembayaran) VALUES
    //  ('','$nama','$kategori','$tgl_penyerahan','$jumlah_bayar')
    //  ";

    // mysqli_query($konek,$simpan);
    // if (mysqli_affected_rows($konek) > 0) {
    //     echo "<script>alert('Pembayaran Berhasil')</script>";
    //     // Kirim data melalui URL ke halaman profil
    //     echo "<script>location.href='teslagi.php?nama=" . urlencode($nama) . "&kategori=" . urlencode($kategori) . "&tanggal_penyerahan=" . urlencode($tgl_penyerahan) . "&jumlah_bayar=" . urlencode($jumlah_bayar) . "'</script>";
    // }

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hitung Zakat Emas dan Perak</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="text-center mb-4">Hitung Zakat Emas</h2>
        <div class="card shadow">
            <div class="card-body">
                <form method="POST">
                <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" id="nama" name="nama" value="<?php echo $nama; ?>" class="form-control" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="kategori" class="form-label">Kategori Zakat</label>
                        <input type="text" id="kategori" name="kategori" value="<?php echo $kategori; ?>" class="form-control" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="jumlah_emas" class="form-label">Jumlah Emas (gram)</label>
                        <input type="number" step="0.01" id="jumlah_emas" name="jumlah_emas" class="form-control" >
                    </div>
                    <div class="mb-3">
                        <label for="harga_emas" class="form-label">Harga Buy Back Emas Saat Ini (Rp/gram)</label>
                        <input type="text" id="harga_emas" name="harga_emas" class="form-control" >
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_penyerahan" class="form-label">Tanggal Penyerahan</label>
                        <input type="date" id="tanggal_penyerahan" name="tanggal_penyerahan" value="<?php echo isset($_POST['tanggal_penyerahan']) ? htmlspecialchars($_POST['tanggal_penyerahan']) : ''; ?>" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="hasil_zakat" class="form-label">Jumlah Zakat yang Harus Dibayarkan (Rp)</label>
                        <input type="text" id="hasil_zakat" name="hasil_zakat" class="form-control" readonly>
                    </div>
                    <button type="submit" class="btn btn-primary w-100" name="hitung_zakat">Hitung Zakat</button>
                    <button type="submit" class="btn btn-primary w-100 mt-5" name="submit">Kirim Data</button>
                </form>
            </div>
        </div>

        <?php
        if (isset($_POST['hitung_zakat'])) {
            // Ambil data dari form
            $nama = htmlspecialchars($_POST['nama']);
            $jumlah_emas = (float) str_replace('.', '', $_POST['jumlah_emas']);
            $harga_emas = (float) str_replace('.', '', $_POST['harga_emas']);

            // Nisab untuk emas dan perak
            $nisab_emas = 85;  // Nisab emas dalam gram
            $kadar_zakat = 0.025; // 2,5% kadar zakat

            // Perhitungan zakat emas
            $zakat_emas = 0;
            $wajib_zakat_emas = $jumlah_emas >= $nisab_emas;

            if ($wajib_zakat_emas) {
                $zakat_emas = $jumlah_emas * $harga_emas * $kadar_zakat;
            }

            echo "<script>
                document.getElementById('hasil_zakat').value = '" . number_format($zakat_emas, 0, ',', '.') . "';
            </script>";

            // Tampilkan hasil perhitungan
            echo "<div class='alert mt-4 ";
            echo $wajib_zakat_emas ? "alert-success" : "alert-danger";
            echo "' role='alert'>";
            echo "<strong>Hasil Perhitungan Zakat:</strong><br>";
            echo "Nama: $nama<br><br>";

            
            // Hasil Zakat Emas
            echo "<strong>Zakat Emas:</strong><br>";
            echo "Jumlah Emas: $jumlah_emas gram<br>";
            echo "Harga Buy Back Emas: Rp" . number_format($harga_emas, 0, ',', '.') . " / gram<br>";
            echo "Nisab Emas: 85 gram<br>";

            if ($wajib_zakat_emas) {
                echo "Status: <strong>Wajib Zakat</strong><br>";
                echo "Jumlah Zakat Emas: Rp" . number_format($zakat_emas, 0, ',', '.') . "<br><br>";
            } else {
                echo "Status: <strong>Tidak Wajib Zakat</strong><br><br>";
            }
            echo "</div>";
        }
        ?>

    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Fungsi untuk memformat angka dengan titik setiap 3 digit
        function formatRupiah(angka) {
            return angka.replace(/\D/g, '') // Hapus semua karakter non-digit
                        .replace(/\B(?=(\d{3})+(?!\d))/g, '.'); // Tambahkan titik setiap 3 angka
        }

        // Ambil elemen input harga emas
        const hargaEmasInput = document.getElementById('harga_emas');

        // Tambahkan event listener untuk format otomatis
        hargaEmasInput.addEventListener('input', function (e) {
            const formattedValue = formatRupiah(this.value);
            this.value = formattedValue;
        });
    </script>
</body>
</html>
