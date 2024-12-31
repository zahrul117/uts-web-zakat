<?php
require 'vendor/autoload.php'; // Pastikan autoload Composer dimuat
require 'functions.php'; // File koneksi dan fungsi

use Dompdf\Dompdf;

// Ambil data pembayaran
$ambil = query("SELECT * FROM pembayaran ORDER BY id_pembayaran DESC");

// Inisialisasi DOMPDF
$dompdf = new Dompdf();

// Konten HTML untuk PDF
$html = '
<h2 style="text-align: center;">Tabel Data Pembayaran Zakat</h2>
<table border="1" cellpadding="5" cellspacing="0" style="width: 100%; border-collapse: collapse;">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama Pembayar</th>
            <th>Kategori Zakat</th>
            <th>Tanggal Penyerahan</th>
            <th>Total Pembayaran</th>
        </tr>
    </thead>
    <tbody>';
$no = 1;
foreach ($ambil as $data) {
    $html .= '
        <tr>
            <td style="text-align: center;">' . $no++ . '</td>
            <td style="text-align: center;">' . $data['nama_pembayar'] . '</td>
            <td style="text-align: center;">' . $data['kategori_zakat'] . '</td>
            <td style="text-align: center;">' . $data['tanggal_penyerahan'] . '</td>
            <td style="text-align: center;">' . $data['total_pembayaran'] . '</td>
        </tr>';
}
$html .= '
    </tbody>
</table>';

// Muat HTML ke DOMPDF
$dompdf->loadHtml($html);

// Atur ukuran kertas dan orientasi
$dompdf->setPaper('A4', 'landscape');

// Render HTML menjadi PDF
$dompdf->render();

// Kirim file PDF ke browser
$dompdf->stream("data_pembayaran_zakat.pdf", ["Attachment" => true]);
?>
