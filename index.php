<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baznas Zakat Mal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/ScrollTrigger.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg fixed-top" >
    <div class="container">
      <a class="navbar-brand me-auto" style="font-size: 20px;" href="#">Baznas Kab. Muaro Jambi</a>
      
      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header" >
          <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Baznas Kab. Muaro Jambi</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>  
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
            <li class="nav-item">
              <a class="nav-link mx-lg-2 active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mx-lg-2" href="#tentang-kami">Tentang Kami</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mx-lg-2" href="#kegiatan-berita">Kegiatan & Berita</a>
            </li>
            <li class="nav-item">
                <a class="nav-link mx-lg-2" href="#hubungi-kami">Kontak</a>
              </li>
              </ul>
           </div>
      </div>
          <a href="login.php" class="login-button">Login</a>
          <button class="navbar-toggler pe-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
    </div>
  </nav>
  <!-- end navbar -->
<!-- hero section -->
 <section class="hero-section" id="hero" style="background: url('gambar/bg.jpg') !important">
  <div class="container d-flex align-items-center justify-content-center fs-1 text-white flex-column">
    <h1 class="text-center" style="margin-top: 150px;" id="animated-text">Berzakat Maal, <br> Membangun Kebersamaan dan Keberkahan.</h1>
    <a href="tes.php"><button class="btn btn-info">Tunaikan Zakat Sekarang</button></a>
  </div>
 </section>
<!-- end hero section -->

<!-- Tentang Kami Section -->
<section id="tentang-kami" class="py-5 bg-light">
  <div class="container">
      <div class="row justify-content-center text-center">
          <div class="col-lg-8">
              <h2 class="fw-bold" style="margin-top: 80px;">Tentang Kami</h2>
              <p class="text-muted">
                  Baznas Kab. Muaro Jambi adalah lembaga resmi yang bertugas mengelola zakat maal masyarakat untuk 
                  meningkatkan kesejahteraan umat. Kami berkomitmen untuk menyalurkan zakat secara transparan, 
                  amanah, dan tepat sasaran, guna membantu masyarakat yang membutuhkan serta mendorong pembangunan 
                  daerah.
              </p>
          </div>
      </div>

      <div class="row mt-5 text-center">
          <!-- Visi -->
          <div class="col-md-4">
              <div class="card border-0 shadow-sm ">
                  <div class="card-body">
                      <h5 class="fw-bold">Visi</h5>
                      <p class="text-muted">
                          Mewujudkan masyarakat Kabupaten Muaro Jambi yang sejahtera dan mandiri melalui optimalisasi 
                          zakat maal.
                      </p>
                  </div>
              </div>
          </div>

          <!-- Misi -->
          <div class="col-md-4">
              <div class="card border-0 shadow-sm">
                  <div class="card-body">
                      <h5 class="fw-bold">Misi</h5>
                      <p class="text-muted">
                          - Memberikan pelayanan zakat yang mudah dan amanah.<br>
                          - Mengelola zakat secara profesional dan transparan.<br>
                          - Menyalurkan zakat kepada penerima yang tepat sesuai syariat Islam.
                      </p>
                  </div>
              </div>
          </div>

          <!-- Nilai Utama -->
          <div class="col-md-4">
              <div class="card border-0 shadow-sm">
                  <div class="card-body">
                      <h5 class="fw-bold">Nilai Utama</h5>
                      <p class="text-muted">
                          Amanah, Transparansi, Profesionalisme, Keberlanjutan, dan Berorientasi pada Kemakmuran Umat.
                      </p>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>
<!-- End Section Tentang Kami -->
 
<!-- Kegiatan dan Berita Section -->
<section id="kegiatan-berita" class="py-5">
    <div class="container">
      <div class="row text-center mb-5">
        <div class="col">
          <h2 class="fw-bold" style="margin-top: 80px;">Kegiatan dan Berita</h2>
          <p class="text-muted">Berita terkini dan kegiatan yang dilakukan oleh Baznas Kab. Muaro Jambi.</p>
        </div>
      </div>
  
      <div class="row">
        <!-- Card 1 -->
        <div class="col-md-4">
          <div class="card border-0 shadow-sm text-center">
            <img style="width: 250px; height: 250px;" src="gambar/kegiatan1.png" class="card-img-top rounded mx-auto d-block"" alt="Kegiatan 1">
            <div class="card-body">
              <h5 class="card-title">Distribusi Bantuan Zakat</h5>
              <p class="card-text text-muted">
                Baznas Kab. Muaro Jambi telah menyalurkan bantuan zakat kepada 100 keluarga kurang mampu di Desa X.
              </p>
              <a href="#" class="btn btn-primary btn-sm">Baca Selengkapnya</a>
            </div>
          </div>
        </div>
  
        <!-- Card 2 -->
        <div class="col-md-4">
          <div class="card border-0 shadow-sm text-center">
            <img src="gambar/kegiatan2.png" class="card-img-top rounded mx-auto d-block"" alt="Kegiatan 2" style="width: 250px; height: 250px;">
            <div class="card-body">
              <h5 class="card-title">Pembangunan Masjid</h5>
              <p class="card-text text-muted">
                Hasil zakat maal telah membantu pembangunan Masjid Al-Ikhlas di Kecamatan Y.
              </p>
              <a href="#" class="btn btn-primary btn-sm">Baca Selengkapnya</a>
            </div>
          </div>
        </div>
  
        <!-- Card 3 -->
        <div class="col-md-4">
          <div class="card border-0 shadow-sm text-center">
            <img src="gambar/kegiatan3.png" class="card-img-top rounded mx-auto d-block"" alt="Kegiatan 3" style="width: 250px; height: 250px;">
            <div class="card-body">
              <h5 class="card-title">Program Beasiswa</h5>
              <p class="card-text text-muted">
                Baznas Kab. Muaro Jambi memberikan beasiswa pendidikan kepada 50 siswa berprestasi dari keluarga kurang mampu.
              </p>
              <a href="#" class="btn btn-primary btn-sm">Baca Selengkapnya</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<!-- End kegiatan dan berita section -->
<!-- Hubungi Kami Section -->
<section id="hubungi-kami" class="py-5"">
    <div class="container">
        <div class="row text-center mb-5">
            <div class="col">
                <h2 class="fw-bold" style="margin-top: 80px;">Hubungi Kami</h2>
                <p class="text-muted">Jika Anda memiliki pertanyaan atau membutuhkan informasi lebih lanjut, jangan ragu untuk menghubungi kami.</p>
            </div>
        </div>

        <div class="row">
            <!-- Contact Form -->
            <div class="col-lg-6 mb-4">
                <form>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="name" placeholder="Masukkan nama Anda" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Masukkan email Anda" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Pesan</label>
                        <textarea class="form-control" id="message" rows="5" placeholder="Tuliskan pesan Anda" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Kirim Pesan</button>
                </form>
            </div>

            <!-- Contact Info -->
            <div class="col-lg-6">
                <div class="mb-4">
                    <h5 class="fw-bold">Alamat</h5>
                    <p class="text-muted">Jalan Candi, Muaro Jambi, Jambi, Indonesia</p>
                </div>
                <div class="mb-4">
                    <h5 class="fw-bold">Telepon</h5>
                    <p class="text-muted">
                        <a href="tel:+6281234567890" class="text-decoration-none">+62 812 3456 7890</a>
                    </p>
                </div>
                <div class="mb-4">
                    <h5 class="fw-bold">Email</h5>
                    <p class="text-muted">
                        <a href="#" class="text-decoration-none">infobaznaskabmuarojambi@gmail.com</a>
                    </p>
                </div>
                <div>
                    <h5 class="fw-bold">Media Sosial</h5>
                    <a href="#" class="me-3" style="font-size: 50px;"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="me-3" style="font-size: 50px;"><i class="bi bi-instagram"></i></a>
                    <a href="#" style="font-size: 50px;"><i class="bi bi-twitter"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- End Section Hubungi kami-->



<!-- Footer -->
<!-- Footer -->
<footer class="bg-dark text-white py-4">
  <div class="container">
      <div class="row">
          <!-- Tentang Baznas -->
          <div class="col-md-4 mb-3">
              <h5 class="fw-bold">Baznas Kab. Muaro Jambi</h5>
              <p class="text-muted">
                  Baznas Kab. Muaro Jambi adalah lembaga pengelola zakat resmi yang berkomitmen meningkatkan kesejahteraan umat melalui pengelolaan zakat yang amanah dan profesional.
              </p>
          </div>

          <!-- Link Cepat -->
          <div class="col-md-4 mb-3">
              <h5 class="fw-bold">Link Cepat</h5>
              <ul class="list-unstyled">
                  <li><a href="#hero" class="text-decoration-none text-white-50">Beranda</a></li>
                  <li><a href="#tentang-kami" class="text-decoration-none text-white-50">Tentang Kami</a></li>
                  <li><a href="#kegiatan-berita" class="text-decoration-none text-white-50">Kegiatan & Berita</a></li>
                  <li><a href="#hubungi-kami" class="text-decoration-none text-white-50">Hubungi Kami</a></li>
              </ul>
          </div>

          <!-- Hubungi Kami -->
          <div class="col-md-4 mb-3">
              <h5 class="fw-bold">Hubungi Kami</h5>
              <p class="text-muted mb-1">
                  <i class="bi bi-geo-alt-fill me-2"></i> Jalan Protokol No. 123, Muaro Jambi, Indonesia
              </p>
              <p class="text-muted mb-1">
                  <i class="bi bi-telephone-fill me-2"></i> <a href="tel:+6281234567890" class="text-decoration-none text-white-50">+62 812 3456 7890</a>
              </p>
              <p class="text-muted">
                  <i class="bi bi-envelope-fill me-2"></i> <a href="mailto:info@baznaskabmuarojambi.or.id" class="text-decoration-none text-white-50">info@baznaskabmuarojambi.or.id</a>
              </p>
          </div>
      </div>

      <!-- Footer Bottom -->
      <div class="row mt-3">
          <div class="col text-center">
              <p class="text-white-50 mb-0">&copy; 2024 Baznas Kab. Muaro Jambi. Semua Hak Dilindungi.</p>
          </div>
      </div>
  </div>
</footer>

<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">



<!-- End Section Footer -->
 <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
   <script src="js/script.js"></script>
</body>
</html>