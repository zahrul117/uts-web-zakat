<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <nav class="bg-dark text-white p-3 vh-100" style="width: 250px;">
            <h3 class="text-center mb-4">Admin Dashboard</h3>
            <ul class="nav flex-column">
                
                <li class="nav-item">
                    <a href="?page=home" class="nav-link text-white"><i class="bi bi-house-door me-2"></i> Dashboard</a>
                </li>
                <li class="nav-item">
                    <a href="?page=tampil_muzaki" class="nav-link text-white"><i class="bi bi-file-earmark-text me-2"></i> Data Zakat</a>
                </li>
                <li class="nav-item">
                    <a href="#kelola-user" class="nav-link text-white"><i class="bi bi-people me-2"></i> Kelola User</a>
                </li>
                <li class="nav-item">
                    <a href="#laporan" class="nav-link text-white"><i class="bi bi-bar-chart me-2"></i> Laporan</a>
                </li>
                <li class="nav-item">
                    <a href="#pengaturan" class="nav-link text-white"><i class="bi bi-gear me-2"></i> Pengaturan</a>
                </li>
                <li class="nav-item">
                    <a href="#logout" class="nav-link text-white"><i class="bi bi-box-arrow-right me-2"></i> Logout</a>
                </li>
            </ul>
        </nav>
        
        <!-- Main Content -->
        <div class="flex-grow-1">
            <!-- Header -->
            <header class="bg-primary text-white p-3">
                <h4 class="mb-0">Selamat Datang, Admin</h4>
            </header>
 
<!--            
            <div class="p-4">
                <h5>Statistik Pengelolaan Zakat</h5>
                <div class="row mt-3">
            
                    <div class="col-md-4">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h6 class="card-title">Total Penerimaan Zakat</h6>
                                <p class="card-text fs-4">Rp 150,000,000</p>
                            </div>
                        </div>
                    </div>

              
                    <div class="col-md-4">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h6 class="card-title">Jumlah Penerima Manfaat</h6>
                                <p class="card-text fs-4">120 Orang</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h6 class="card-title">Program Tersalurkan</h6>
                                <p class="card-text fs-4">5 Program</p>
                            </div>
                        </div>
                    </div>
                </div>

         
                <div class="mt-5">
                    <h5>Data Terbaru</h5>
                    <table class="table table-striped mt-3">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Donatur</th>
                                <th>Jenis Zakat</th>
                                <th>Jumlah</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Ahmad Fauzi</td>
                                <td>Zakat Maal</td>
                                <td>Rp 1,000,000</td>
                                <td>01 Desember 2024</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Siti Nurhaliza</td>
                                <td>Zakat Fitrah</td>
                                <td>Rp 500,000</td>
                                <td>30 November 2024</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> -->


    <?php include "isifile.php"; ?>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</body>
</html>
