<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Form Input Pembayaran</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
  <h2 class="text-center">Form Input Pembayaran</h2>
  <form method="post" action="proses_pembayaran.php">
    <!-- Pilih Muzakki -->
    <div class="mb-3">
      <label for="id_muzakki" class="form-label">Nama Pembayar (Muzakki)</label>
      <select class="form-select" id="id_muzakki" name="id_muzakki" required>
        <option value="" disabled selected>Pilih Muzakki</option>
        <!-- Opsi muzakki akan diambil dari database -->
        <?php
        $konek = mysqli_connect('localhost','root','','dbzakat_uts');// Pastikan koneksi database sudah dibuat
        $muzakki = mysqli_query($konek, "SELECT id_muzakki, nama_lengkap FROM muzakki");
        while ($row = mysqli_fetch_assoc($muzakki)) {
          echo "<option value='{$row['id_muzakki']}'>{$row['nama_lengkap']}</option>";
        }
        ?>
      </select>
    </div>

    <!-- Pilih Mustahik -->
    <div class="mb-3">
      <label for="id_mustahik" class="form-label">Nama Penerima (Mustahik)</label>
      <select class="form-select" id="id_mustahik" name="id_mustahik" required>
        <option value="" disabled selected>Pilih Mustahik</option>
        <!-- Opsi mustahik akan diambil dari database -->
        <?php
        $mustahik = mysqli_query($konek, "SELECT id_mustahik, nama_lengkap FROM mustahik");
        while ($row = mysqli_fetch_assoc($mustahik)) {
          echo "<option value='{$row['id_mustahik']}'>{$row['nama_lengkap']}</option>";
        }
        ?>
      </select>
    </div>

    <!-- Tanggal Pembayaran -->
    <div class="mb-3">
      <label for="tanggal_pembayaran" class="form-label">Tanggal Pembayaran</label>
      <input type="date" class="form-control" id="tanggal_pembayaran" name="tanggal_pembayaran" required>
    </div>

    <!-- Total Pembayaran -->
    <div class="mb-3">
      <label for="total_pembayaran" class="form-label">Total Pembayaran</label>
      <input type="number" step="0.01" class="form-control" id="total_pembayaran" name="total_pembayaran" required>
    </div>

    <!-- Tombol Submit -->
    <div class="text-center">
      <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
  </form>
</div>
</body>
</html>
