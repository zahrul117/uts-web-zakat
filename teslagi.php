<?php
// Ambil data dari URL
$nama = isset($_GET['nama']) ? htmlspecialchars($_GET['nama']) : '';
$kategori = isset($_GET['kategori']) ? htmlspecialchars($_GET['kategori']) : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Zakat Penghasilan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
    </style>
</head>
<body>
    <h3>Form Zakat Penghasilan</h3>
    <form method="post">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" value="<?php echo $nama; ?>" readonly>

        <label for="kategori">Kategori Zakat:</label>
        <input type="text" id="kategori" name="kategori" value="<?php echo $kategori; ?>" readonly>

        <label>Penghasilan Bulanan (Rp):</label><br>
        <input type="text" id="penghasilan" name="penghasilan" required><br><br>

        <label>Harga Emas Saat Ini (per gram, Rp):</label><br>
         <input type="text" id="harga_emas" name="harga_emas" required><br><br>

         <label>Tanggal Penyerahan:</label><br>
         <input type="date" name="tanggal_penyerahan" required><br><br>


        <button type="submit" name="submit">Submit</button>
    </form>
</body>
</html>
