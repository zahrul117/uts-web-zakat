<?php
$nama = isset($_GET['nama']) ? htmlspecialchars($_GET['nama']) : '';
$kategori = isset($_GET['kategori']) ? htmlspecialchars($_GET['kategori']) : '';


$konek = mysqli_connect('localhost','root','','dbzakat_uts');

if(isset($_POST['submit'])){
    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $tgl_penyerahan = $_POST['tanggal_penyerahan'];
    $jumlah_bayar = $_POST['hasil_zakat'];

    $simpan = "INSERT INTO pembayaran
     (id_pembayaran,nama_pembayar,kategori_zakat,tanggal_penyerahan,total_pembayaran) VALUES
     ('','$nama','$kategori','$tgl_penyerahan','$jumlah_bayar')
     ";

    mysqli_query($konek,$simpan);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hitung Zakat Penghasilan</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="text-center mb-4">Hitung Zakat Penghasilan</h2>
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
                        <label for="penghasilan" class="form-label">Penghasilan Bulanan (Rp)</label>
                        <input type="text" id="penghasilan" name="penghasilan" value="<?php echo isset($_POST['penghasilan']) ? htmlspecialchars($_POST['penghasilan']) : ''; ?>" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="harga_emas" class="form-label">Harga Emas Saat Ini (per gram, Rp)</label>
                        <input type="text" id="harga_emas" name="harga_emas" value="<?php echo isset($_POST['harga_emas']) ? htmlspecialchars($_POST['harga_emas']) : ''; ?>" class="form-control" required>
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
                    <button type="submit" class="btn btn-primary w-100" name="submit">Kirim Data</button>
                </form>
            </div>
        </div>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nama = htmlspecialchars($_POST['nama']);
            $penghasilan = (float) str_replace('.', '', $_POST['penghasilan']);
            $harga_emas = (float) str_replace('.', '', $_POST['harga_emas']);
            $tanggal_penyerahan = htmlspecialchars($_POST['tanggal_penyerahan']);

            $nishab_bulanan = ($harga_emas * 85) / 12;
            $zakat = 0;
            $wajib_zakat = $penghasilan >= $nishab_bulanan;

            if ($wajib_zakat) {
                $zakat = $penghasilan * 0.025;
            }

            echo "<script>
                document.getElementById('hasil_zakat').value = '" . number_format($zakat, 0, ',', '.') . "';
            </script>";

            echo "<div class='alert mt-4 ";
            echo $wajib_zakat ? "alert-success" : "alert-danger";
            echo "' role='alert'>";
            echo "<strong>Hasil Perhitungan:</strong><br>";
            echo "Nama: $nama<br>";
            echo "Penghasilan Bulanan: Rp" . number_format($penghasilan, 0, ',', '.') . "<br>";
            echo "Harga Emas Saat Ini: Rp" . number_format($harga_emas, 0, ',', '.') . "/gram<br>";
            echo "Tanggal Penyerahan: $tanggal_penyerahan<br>";
            echo "Nishab Bulanan: Rp" . number_format($nishab_bulanan, 0, ',', '.') . "<br>";

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
            return value.replace(/\D/g, '') // Hapus semua karakter non-digit
                        .replace(/\B(?=(\d{3})+(?!\d))/g, '.'); // Tambahkan titik setiap 3 angka
        }

        const penghasilanInput = document.getElementById('penghasilan');
        const hargaEmasInput = document.getElementById('harga_emas');

        penghasilanInput.addEventListener('input', function () {
            this.value = formatRibuan(this.value);
        });

        hargaEmasInput.addEventListener('input', function () {
            this.value = formatRibuan(this.value);
        });
    </script>
</body>
</html>
