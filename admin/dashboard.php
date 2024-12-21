<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styledashboard.css">
    <style>
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh; 
            overflow-y: auto; 
        }
    </style>
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <nav class="bg-dark text-white p-3 sidebar" style="width: 250px;">
            <h3 class="text-center mb-4">Admin Dashboard</h3>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a href="?page=home" class="nav-link text-white"><i class="bi bi-house-door me-2"></i> Dashboard</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="dataDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-file-earmark-text me-2"></i> Data
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dataDropdown">
                        <li><a class="dropdown-item" href="?page=tampil_muzaki">Data Muzakki</a></li>
                        <li><a class="dropdown-item" href="?page=tampil_mustahik">Data Mustahik</a></li>
                        <li><a class="dropdown-item" href="?page=tampil_amil">Data Amil</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#kelola-user" class="nav-link text-white"><i class="bi bi-people me-2"></i> Kelola Admin</a>
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
        <div class="flex-grow-1" style="margin-left: 250px;"> <!-- Tambahkan margin untuk menghindari konten tertutup sidebar -->
            <!-- Header -->
            <header class="bg-primary text-white p-3">
                <h4 class="mb-0">Selamat Datang, Admin!</h4>
            </header>
            <?php echo "Muaro Jambi"." ". date('d-M-Y');?>

            <?php include "isifile.php"; ?>
            <!-- Bootstrap JS -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
            <!-- Bootstrap Icons -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
        </div>
    </div>
</body>
</html>