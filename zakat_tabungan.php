<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Hitung Zakat Tabungan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .form-container {
            margin-bottom: 20px;
        }
        .result {
            margin-top: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        input[type="text"], input[type="number"] {
            padding: 5px;
            box-sizing: border-box;
        }
    </style>
</head>
<body>
    <h2>Hitung Zakat Tabungan</h2>
    <form method="POST">
        <div class="form-container">
            <label>Nama:</label><br>
            <input type="text" name="nama" required><br><br>

            <label>Saldo Awal Nisab (Rp):</label><br>
            <input type="text" id="saldo_awal" name="saldo_awal" required><br><br>

            <label>Saldo Akhir (Rp):</label><br>
            <input type="text" id="saldo_akhir" name="saldo_akhir" required><br><br>

            <label>Harga Emas Saat Ini (Rp/gram):</label><br>
            <input type="text" id="harga_emas" name="harga_emas" required><br><br>

            <button type="submit">Hitung Zakat</button>
        </div>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Ambil data dari form
        $nama = htmlspecialchars($_POST['nama']);
        $saldo_awal = (float) str_replace('.', '', $_POST['saldo_awal']);
        $saldo_akhir = (float) str_replace('.', '', $_POST['saldo_akhir']);
        $harga_emas = (float) str_replace('.', '', $_POST['harga_emas']);

        // Nisab berdasarkan harga emas
        $nisab = 85 * $harga_emas; // Nisab dalam satuan mata uang
        $kadar_zakat = 0.025; // 2,5% kadar zakat

        // Perhitungan zakat tabungan
        $zakat_tabungan = 0;
        $wajib_zakat = $saldo_awal >= $nisab;

        if ($wajib_zakat) {
            $zakat_tabungan = $saldo_akhir * $kadar_zakat;
        }

        // Tampilkan hasil perhitungan
        echo "<div class='result'>";
        echo "<strong>Hasil Perhitungan Zakat Tabungan:</strong><br>";
        echo "Nama: $nama<br><br>";

        echo "<strong>Detail Zakat Tabungan:</strong><br>";
        echo "Saldo Awal: Rp" . number_format($saldo_awal, 0, ',', '.') . "<br>";
        echo "Saldo Akhir: Rp" . number_format($saldo_akhir, 0, ',', '.') . "<br>";
        echo "Harga Emas: Rp" . number_format($harga_emas, 0, ',', '.') . " / gram<br>";
        echo "Nisab (85 gram emas): Rp" . number_format($nisab, 0, ',', '.') . "<br>";

        if ($wajib_zakat) {
            echo "Status: <span style='color:green;'>Wajib Zakat</span><br>";
            echo "Jumlah Zakat yang Harus Dibayar: Rp" . number_format($zakat_tabungan, 0, ',', '.') . "<br><br>";
        } else {
            echo "Status: <span style='color:red;'>Tidak Wajib Zakat</span><br><br>";
        }

        echo "</div>";
    }
    ?>

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
