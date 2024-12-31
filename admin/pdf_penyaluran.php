<?php
require 'vendor/autoload.php'; // Pastikan path sesuai dengan lokasi Composer/autoload.php
use Dompdf\Dompdf;

require 'functions.php';

// Ambil data dari database
$ambil = query("SELECT * FROM penyaluran ORDER BY id_penerimaan DESC");

// Konten HTML untuk PDF
$html = '
<h2 style="text-align: center;">Tabel Data Penyaluran Zakat</h2>
<table border="1" cellpadding="5" cellspacing="0" style="width: 100%; border-collapse: collapse;">
    <thead>
        <tr>
            <th>No.</th>
            <th>Tanggal Penerimaan</th>
            <th>Nama Penerima</th>
            <th>Jumlah Penerimaan Uang (RP)</th>
            <th>Nama Amil</th>
        </tr>
    </thead>
    <tbody>';
$no = 1;
foreach ($ambil as $data) {
    $html .= '
        <tr>
            <td style="text-align: center;">' . $no++ . '</td>
            <td style="text-align: center;">' . htmlspecialchars($data['tgl_penerimaan']) . '</td>
            <td style="text-align: center;">' . htmlspecialchars($data['nama_penerima']) . '</td>
            <td style="text-align: center;">' . htmlspecialchars($data['jumlah_penerimaan']) . '</td>
            <td style="text-align: center;">' . htmlspecialchars($data['amil']) . '</td>
        </tr>';
}
$html .= '
    </tbody>
</table>';

// Inisialisasi DOMPDF
$dompdf = new Dompdf();
$dompdf->loadHtml($html);

// Atur ukuran kertas dan orientasi
$dompdf->setPaper('A4', 'landscape');

// Render HTML menjadi PDF
$dompdf->render();

// Kirim file PDF ke browser
$dompdf->stream("data_penyaluran_zakat.pdf", ["Attachment" => true]);
?>
