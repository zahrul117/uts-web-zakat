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
}






?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hitung Zakat Perusahaan</title>
    <!-- Link ke Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        .form-container {
            margin-bottom: 20px;
        }
        .result {
            margin-top: 20px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center mb-4">Hitung Zakat Perusahaan</h2>

        <form method="POST">
            <div class="form-container">
            <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" id="nama" name="nama" value="<?php echo $nama; ?>" class="form-control" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="kategori" class="form-label">Kategori Zakat</label>
                        <input type="text" id="kategori" name="kategori" value="<?php echo $kategori; ?>" class="form-control" readonly>
                    </div>

                <div class="mb-3">
                    <label for="aset_usaha" class="form-label">Aset Usaha (Rp)</label>
                    <input type="text" id="aset_usaha" name="aset_usaha" class="form-control" >
                </div>

                <div class="mb-3">
                    <label for="hutang" class="form-label">Hutang Jangka Pendek (Rp)</label>
                    <input type="text" id="hutang" name="hutang" class="form-control" >
                </div>

                <div class="mb-3">
                    <label for="harga_emas" class="form-label">Harga Emas Saat Ini (Rp/gram)</label>
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
            </div>
        </form>

        <?php
        if (isset($_POST['hitung_zakat'])) {
            // Ambil data dari form
            $nama = htmlspecialchars($_POST['nama']);
            $aset_usaha = (float) str_replace('.', '', $_POST['aset_usaha']);
            $hutang = (float) str_replace('.', '', $_POST['hutang']);
            $harga_emas = (float) str_replace('.', '', $_POST['harga_emas']);
            $tanggal_penyerahan = htmlspecialchars($_POST['tanggal_penyerahan']);

            // Nisab berdasarkan harga emas
            $nisab = 85 * $harga_emas; // Nisab dalam satuan mata uang
            $kadar_zakat = 0.025; // 2,5% kadar zakat
            $aset_bersih = $aset_usaha - $hutang;

            // Perhitungan zakat perusahaan
            $zakat_perusahaan = 0;
            $wajib_zakat = $aset_bersih >= $nisab;

            if ($wajib_zakat) {
                $zakat_perusahaan = $aset_bersih * $kadar_zakat;
            }

            echo "<script>
                document.getElementById('hasil_zakat').value = '" . number_format($zakat_perusahaan, 0, ',', '.') . "';
            </script>";

            // Tampilkan hasil perhitungan
            echo "<div class='result'>";
            echo "<strong>Hasil Perhitungan Zakat Perusahaan:</strong><br>";
            echo "Nama Perusahaan: $nama<br>";
            echo "Aset Usaha: Rp" . number_format($aset_usaha, 0, ',', '.') . "<br>";
            echo "Hutang Jangka Pendek: Rp" . number_format($hutang, 0, ',', '.') . "<br>";
            echo "Harga Emas: Rp" . number_format($harga_emas, 0, ',', '.') . " / gram<br>";
            echo "Nisab (85 gram emas): Rp" . number_format($nisab, 0, ',', '.') . "<br>";
            echo "Aset Bersih: Rp" . number_format($aset_bersih, 0, ',', '.') . "<br>";

            if ($wajib_zakat) {
                echo "Status: <span class='text-success'>Wajib Zakat</span><br>";
                echo "Jumlah Zakat yang Harus Dibayar: Rp" . number_format($zakat_perusahaan, 0, ',', '.') . "<br>";
            } else {
                echo "Status: <span class='text-danger'>Tidak Wajib Zakat</span><br>";
            }
            echo "</div>";
        }
        ?>

    </div>

    <!-- Link ke Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Fungsi untuk memformat angka dengan titik setiap 3 digit
        function formatRupiah(angka) {
            return angka.replace(/\D/g, '')
                        .replace(/\B(?=(\d{3})+(?!\d))/g, '.');
        }

        // Tambahkan event listener untuk format otomatis
        document.querySelectorAll('#aset_usaha, #hutang, #harga_emas').forEach(function(input) {
            input.addEventListener('input', function () {
                this.value = formatRupiah(this.value);
            });
        });
    </script>
</body>
</html>
