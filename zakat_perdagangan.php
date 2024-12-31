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
    <title>Hitung Zakat Perdagangan</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="text-center mb-4">Hitung Zakat Perdagangan</h2>
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
                        <label for="aset_usaha" class="form-label">Aset Usaha (Rp)</label>
                        <input type="text" id="aset_usaha" name="aset_usaha" class="form-control" placeholder="Masukkan Aset Usaha" >
                    </div>
                    <div class="mb-3">
                        <label for="hutang" class="form-label">Hutang Jangka Pendek (Rp)</label>
                        <input type="text" id="hutang" name="hutang" class="form-control" placeholder="Masukkan Hutang Jangka Pendek" >
                    </div>
                    <div class="mb-3">
                        <label for="harga_emas" class="form-label">Harga Emas Saat Ini (Rp/gram)</label>
                        <input type="text" id="harga_emas" name="harga_emas" class="form-control" placeholder="Masukkan Harga Emas" >
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_penyerahan" class="form-label">Tanggal Penyerahan</label>
                        <input type="date" id="tanggal_penyerahan" name="tanggal_penyerahan" value="<?php echo isset($_POST['tanggal_penyerahan']) ? htmlspecialchars($_POST['tanggal_penyerahan']) : ''; ?>" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="hasil_zakat" class="form-label">Jumlah Zakat yang Harus Dibayarkan (Rp)</label>
                        <input type="text" id="hasil_zakat" name="hasil_zakat" class="form-control" readonly>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Hitung Zakat</button>
                    <button type="submit" class="btn btn-primary w-100 mt-5" name="submit">Kirim Data</button>
                </form>
            </div>
        </div>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Ambil data dari form
            $nama = htmlspecialchars($_POST['nama']);
            $aset_usaha = (float) str_replace('.', '', $_POST['aset_usaha']);
            $hutang = (float) str_replace('.', '', $_POST['hutang']);
            $harga_emas = (float) str_replace('.', '', $_POST['harga_emas']);
            $tanggal_penyerahan = htmlspecialchars($_POST['tanggal_penyerahan']);

            // Nisab zakat perdagangan
            $nisab = $harga_emas * 85; // Nisab dalam Rupiah
            $kadar_zakat = 0.025; // 2,5% kadar zakat

            // Hitung zakat
            $selisih_aset = $aset_usaha - $hutang;
            $zakat = 0;
            $wajib_zakat = $selisih_aset >= $nisab;

            if ($wajib_zakat) {
                $zakat = $selisih_aset * $kadar_zakat;
            }

            echo "<script>
                document.getElementById('hasil_zakat').value = '" . number_format($zakat, 0, ',', '.') . "';
            </script>";

            // Tampilkan hasil
            echo "<div class='alert mt-4 ";
            echo $wajib_zakat ? "alert-success" : "alert-danger";
            echo "' role='alert'>";
            echo "<strong>Hasil Perhitungan:</strong><br>";
            echo "Nama: $nama<br>";
            echo "Aset Usaha: Rp" . number_format($aset_usaha, 0, ',', '.') . "<br>";
            echo "Hutang Jangka Pendek: Rp" . number_format($hutang, 0, ',', '.') . "<br>";
            echo "Harga Emas Saat Ini: Rp" . number_format($harga_emas, 0, ',', '.') . " / gram<br>";
            echo "Tanggal Penyerahan: $tanggal_penyerahan<br>";
            echo "Nisab Zakat: Rp" . number_format($nisab, 0, ',', '.') . "<br>";

            if ($wajib_zakat) {
                echo "Status: <strong>Wajib Zakat</strong><br>";
                echo "Jumlah Zakat yang Harus Dibayarkan: Rp" . number_format($zakat, 0, ',', '.') . "<br>";
            } else {
                echo "Status: <strong>Tidak Wajib Zakat</strong><br>";
            }
            echo "</div>";
        }
        ?>

    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function formatRibuan(value) {
            return value.replace(/\D/g, '')
                        .replace(/\B(?=(\d{3})+(?!\d))/g, '.');
        }

        const asetUsahaInput = document.getElementById('aset_usaha');
        const hutangInput = document.getElementById('hutang');
        const hargaEmasInput = document.getElementById('harga_emas');

        asetUsahaInput.addEventListener('input', function () {
            this.value = formatRibuan(this.value);
        });

        hutangInput.addEventListener('input', function () {
            this.value = formatRibuan(this.value);
        });

        hargaEmasInput.addEventListener('input', function () {
            this.value = formatRibuan(this.value);
        });
    </script>
</body>
</html>
