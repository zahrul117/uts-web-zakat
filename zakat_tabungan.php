<?php
$nama = isset($_GET['nama']) ? htmlspecialchars($_GET['nama']) : '';
$kategori = isset($_GET['kategori']) ? htmlspecialchars($_GET['kategori']) : '';




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hitung Zakat Tabungan</title>
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
        <h2 class="text-center mb-4">Hitung Zakat Tabungan</h2>

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
                    <label for="saldo_awal" class="form-label">Tabungan Per Bulan (Rp)</label>
                    <input type="text" id="saldo_awal" name="saldo_awal" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="harga_emas" class="form-label">Harga Emas Saat Ini (Rp/gram)</label>
                    <input type="text" id="harga_emas" name="harga_emas" class="form-control" required>
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
            $tabunganperbulan = (float) str_replace('.', '', $_POST['saldo_awal']);
            $harga_emas = (float) str_replace('.', '', $_POST['harga_emas']);

            // Nisab berdasarkan harga emas
            $nisab = 85 * $harga_emas; // Nisab dalam satuan mata uang
            $kadar_zakat = 0.025; // 2,5% kadar zakat
            $saldo_akhir = $tabunganperbulan * 12;

            // Perhitungan zakat tabungan
            $zakat_tabungan = 0;
            $wajib_zakat = $saldo_akhir >= $nisab;

            if ($wajib_zakat) {
                $zakat_tabungan = $saldo_akhir * $kadar_zakat;
            }


            echo "<script>
            document.getElementById('hasil_zakat').value = '" . number_format($zakat_tabungan, 0, ',', '.') . "';
         </script>";
            // Tampilkan hasil perhitungan
            echo "<div class='result'>";
            echo "<strong>Hasil Perhitungan Zakat Tabungan:</strong><br>";
            echo "Nama: $nama<br><br>";

            echo "<strong>Detail Zakat Tabungan:</strong><br>";
            echo "Tabungan Perbulan: Rp" . number_format($tabunganperbulan, 0, ',', '.') . "<br>";
            echo "Saldo Akhir: Rp" . number_format($saldo_akhir, 0, ',', '.') . "<br>";
            echo "Harga Emas: Rp" . number_format($harga_emas, 0, ',', '.') . " / gram<br>";
            echo "Nisab (85 gram emas): Rp" . number_format($nisab, 0, ',', '.') . "<br>";

            if ($wajib_zakat) {
                echo "Status: <span class='text-success'>Wajib Zakat</span><br>";
                echo "Jumlah Zakat yang Harus Dibayar: Rp" . number_format($zakat_tabungan, 0, ',', '.') . "<br><br>";
            } else {
                echo "Status: <span class='text-danger'>Tidak Wajib Zakat</span><br><br>";
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
        document.querySelectorAll('#saldo_awal, #saldo_akhir, #harga_emas').forEach(function(input) {
            input.addEventListener('input', function () {
                this.value = formatRupiah(this.value);
            });
        });
    </script>
</body>
</html>
