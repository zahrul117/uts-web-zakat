<?php
$konek = mysqli_connect('localhost','root','','dbzakat_uts');

if (isset($_POST["submit"])) {
    // Ambil data dari form
        $nama = $_POST['nama'];
        $jk = $_POST['jk'];
        $alamat = $_POST['alamat'];
        $nomor = $_POST['nohp'];
        $email=$_POST['email'];
        $kategori = $_POST['kategori'];

        // Query simpan data ke database
        $simpan = "INSERT INTO muzakki (id_muzakki,nama_lengkap, jenis_kelamin, alamat, nomor, email,kategori) 
                   VALUES ('','$nama', '$jk', '$alamat', '$nomor', '$email','$kategori')";

        (mysqli_query($konek, $simpan)); 
    
        // Redirect berdasarkan kategori
        if ($_POST["kategori"] == "Zakat Penghasilan") {
            header("Location: zakat_penghasilan.php?nama=" . urlencode($nama) . "&kategori=" . urlencode($kategori));
            exit;
        } elseif ($_POST["kategori"] == "Zakat Emas") {
            header("Location: zakat_emas.php?nama=" . urlencode($nama) . "&kategori=" . urlencode($kategori));
            exit;
        } elseif ($_POST["kategori"] == "Zakat Tabungan") {
            header("Location: zakat_tabungan.php?nama=" . urlencode($nama) . "&kategori=" . urlencode($kategori));
            exit;
        } elseif ($_POST["kategori"] == "Zakat Perdagangan") {
            header("Location: zakat_perdagangan.php?nama=" . urlencode($nama) . "&kategori=" . urlencode($kategori));
            exit;
        } elseif ($_POST["kategori"] == "Zakat Perusahaan") {
            header("Location: zakat_perusahaan.php");
            exit;
        }
    } else {
        echo "<script>alert('Harap lengkapi semua data!');</script>";
    }

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Zakat</title>
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

        h3 {
            margin-bottom: 10px;
            color: #333;
        }

        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }

        input, select, textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button {
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <form action="" method="post">
        <!-- Section 1: Input Data Pribadi -->
        <h3>Data Pribadi</h3>

        <label for="namaLengkap">Nama Lengkap:</label>
        <input type="text" id="namaLengkap" name="nama" placeholder="Masukkan nama lengkap" required>

        <label for="jenisKelamin">Jenis Kelamin:</label>
        <select id="jenisKelamin" name="jk" required>
            <option value="">-- Pilih Jenis Kelamin --</option>
            <option value="Laki-Laki">Laki-Laki</option>
            <option value="Perempuan">Perempuan</option>
        </select>

        <label for="alamat">Alamat:</label>
        <textarea id="alamat" name="alamat" rows="3" placeholder="Masukkan alamat lengkap" required></textarea>

        <label for="nomor">Nomor Telepon:</label>
        <input type="number" id="nomor" name="nohp" placeholder="Masukkan nomor telepon" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Masukkan alamat email" required>

        <!-- Section 2: Pilihan Jenis Zakat -->
        <h3>Pilih Jenis Zakat</h3>

        <label for="jenisZakat">Jenis Zakat:</label>
        <select id="jenisZakat" name="kategori" required>
            <option value="">-- Pilih Jenis Zakat --</option>
            <option value="Zakat Penghasilan" >Zakat Penghasilan</option>
            <option value="Zakat Emas">Zakat Emas</option>
            <option value="Zakat Tabungan">Zakat Tabungan</option>
            <option value="Zakat Perdagangan">Zakat Perdagangan</option>
            <option value="Zakat Perusahaan">Zakat Perusahaan</option>
        </select>

        <button type="submit" name="submit">Submit</button>
    </form>
</body>
</html>
