<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Hitung Zakat Penghasilan</title>
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
    </style>
</head>
<body>
    <h2>Hitung Zakat Penghasilan</h2>
    <form method="POST">
        <div class="form-container">
            <label>Nama:</label><br>
            <input type="text" name="nama" required><br><br>

            <label>Penghasilan Bulanan (Rp):</label><br>
            <input type="text" id="penghasilan" name="penghasilan" required><br><br>

            <label>Harga Emas Saat Ini (per gram, Rp):</label><br>
            <input type="text" id="harga_emas" name="harga_emas" required><br><br>

            <button type="submit">Hitung Zakat</button>
        </div>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Ambil data dari form dan hilangkan titik (format angka dengan ribuan)
        $nama = htmlspecialchars($_POST['nama']);
        $penghasilan = (float) str_replace('.', '', $_POST['penghasilan']);
        $harga_emas = (float) str_replace('.', '', $_POST['harga_emas']);

        // Hitung Nishab Bulanan (85 gram emas per tahun, dibagi 12 bulan)
        $nishab_bulanan = ($harga_emas * 85) / 12;

        // Hitung Zakat (2.5% dari penghasilan)
        $zakat = 0;
        $wajib_zakat = $penghasilan >= $nishab_bulanan;

        if ($wajib_zakat) {
            $zakat = $penghasilan * 0.025;
        }

        // Tampilkan hasil
        echo "<div class='result'>";
        echo "<strong>Hasil Perhitungan:</strong><br>";
        echo "Nama: $nama<br>";
        echo "Penghasilan Bulanan: Rp" . number_format($penghasilan, 0, ',', '.') . "<br>";
        echo "Harga Emas Saat Ini: Rp" . number_format($harga_emas, 0, ',', '.') . "/gram<br>";
        echo "Nishab Bulanan: Rp" . number_format($nishab_bulanan, 0, ',', '.') . "<br>";

        if ($wajib_zakat) {
            echo "Status: <span style='color:green;'>Wajib Zakat</span><br>";
            echo "Jumlah Zakat yang Harus Dibayarkan: Rp" . number_format($zakat, 0, ',', '.') . "<br>";
        } else {
            echo "Status: <span style='color:red;'>Tidak Wajib Zakat</span><br>";
        }

        echo "</div>";
    }
    ?>

    <script>
        // Fungsi untuk menambahkan titik setiap 3 angka
        function formatRibuan(value) {
            return value.replace(/\D/g, '') // Hapus semua karakter non-digit
                        .replace(/\B(?=(\d{3})+(?!\d))/g, '.'); // Tambahkan titik setiap 3 angka
        }

        // Ambil elemen input
        const penghasilanInput = document.getElementById('penghasilan');
        const hargaEmasInput = document.getElementById('harga_emas');

        // Tambahkan event listener untuk memformat input saat user mengetik
        penghasilanInput.addEventListener('input', function () {
            this.value = formatRibuan(this.value);
        });

        hargaEmasInput.addEventListener('input', function () {
            this.value = formatRibuan(this.value);
        });
    </script>
</body>
</html>
