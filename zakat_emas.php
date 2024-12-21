<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Hitung Zakat Emas dan Perak</title>
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
            /* width: 100%; */
            box-sizing: border-box;
        }
    </style>
</head>
<body>
    <h2>Hitung Zakat Emas dan Perak</h2>
    <form method="POST">
        <div class="form-container">
            <label>Nama:</label><br>
            <input type="text" name="nama" required><br><br>

            <label>Jumlah Emas (gram):</label><br>
            <input type="number" step="0.01" name="jumlah_emas" required><br><br>

            <label>Harga Buy Back Emas Saat Ini (Rp/gram):</label><br>
            <input type="text" id="harga_emas" name="harga_emas" required><br><br>

            <button type="submit">Hitung Zakat</button>
        </div>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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

        // Tampilkan hasil perhitungan
        echo "<div class='result'>";
        echo "<strong>Hasil Perhitungan Zakat:</strong><br>";
        echo "Nama: $nama<br><br>";

        // Hasil Zakat Emas
        echo "<strong>Zakat Emas:</strong><br>";
        echo "Jumlah Emas: $jumlah_emas gram<br>";
        echo "Harga Buy Back Emas: Rp" . number_format($harga_emas, 0, ',', '.') . " / gram<br>";
        echo "Nisab Emas: 85 gram<br>";

        if ($wajib_zakat_emas) {
            echo "Status: <span style='color:green;'>Wajib Zakat</span><br>";
            echo "Jumlah Zakat Emas: Rp" . number_format($zakat_emas, 0, ',', '.') . "<br><br>";
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
