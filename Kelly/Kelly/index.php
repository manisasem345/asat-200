<?php
include 'konekdb.php';


$sql = "SELECT * FROM biodata ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);


$nama_lengkap = "Kelly Adams";
$profesi = "Professional Illustrator";
$deskripsi_profesi = "I'm a professional illustrator from San Francisco";
$url_hero = "assets/img/hero-bg.jpg";
$url_foto = "assets/img/profile-img.jpg";
$website = "#";
$keterangan_about = "Welcome to my portfolio website";


if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $nama_lengkap = $row['nama_depan'] . ' ' . $row['nama_belakang'];
    $profesi = $row['profesi'];
    $deskripsi_profesi = $row['deskripsi_profesi'];
    $website = $row['website'] ? $row['website'] : "#";
    $keterangan_about = $row['keterangan_about'];
    $tantang = $row['tantang'];
    $gelar = $row['gelar'];
    $keterangan_skill = $row['keterangan_skill'];
    $skill = $row['skill'];
    $tgl_lahir = $row['tgl_lahir'] ? date('d M Y', strtotime($row['tgl_lahir'])) : '';  
    $hp = $row['hp'];
    $email = $row['email'];
    $kota = $row['kota'];
    $freelance = $row['freelance'] ? 'Yes' : 'No';


    if (!empty($row['url_hero'])) {
        $url_hero = $row['url_hero'];
    }
    if (!empty($row['url_foto'])) {
        $url_foto = $row['url_foto'];
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title><?php echo $nama_lengkap; ?> - Portfolio</title>
  <meta name="description" content="<?php echo $deskripsi_profesi; ?>">
  <meta name="keywords" content="<?php echo $profesi; ?>, portfolio, creative">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  
</head>

<body class="index-page">

  <!-- Admin Access Link -->
  <a href="forms/" class="admin-link">
    <i class="bi bi-gear"></i> Admin Panel
  </a>

  <header id="header" class="header d-flex align-items-center light-background sticky-top">
    <div class="container-fluid position-relative d-flex align-items-center justify-content-between">

      <a href="index.php" class="logo d-flex align-items-center me-auto me-xl-0">
        <h1 class="sitename"><?php echo explode(' ', $nama_lengkap)[0]; ?></h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="index.php" class="active">Home</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="contact.php">Contact</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <div class="header-social-links">
        <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
      </div>

    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section">

      <img src="<?php echo $url_hero; ?>" alt="Hero Background" data-aos="fade-in">

      <div class="container text-center" data-aos="zoom-out" data-aos-delay="100">
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <h2><?php echo $nama_lengkap; ?></h2>
            <p><?php echo $deskripsi_profesi; ?></p>
            <a href="#about" class="btn-get-started">About Me</a>
          </div>
        </div>
      </div>

    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">
      <div class="container section-title" data-aos="fade-up">
        <h2>About</h2>
        <p><?php echo $keterangan_about; ?></p>
      </div>

      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4 justify-content-center">
          <div class="col-lg-8">
            <div class="content">
              <h2><?php echo $profesi; ?></h2>
              <p class="fst-italic py-3">
                <?php echo $deskripsi_profesi; ?>
              </p>
              <div class="row">
                <div class="col-lg-6">
                  <ul>
                    <li><i class="bi bi-chevron-right"></i> <strong>Website:</strong> <span><a href="<?php echo $website; ?>" target="_blank"><?php echo $website; ?></a></span></li>
                    <li><i class="bi bi-chevron-right"></i> <strong>Profession:</strong> <span><?php echo $profesi; ?></span></li>
                  </ul>
                </div>
              </div>
              <p>
               <?php echo $tantang; ?>              
            </p>
            </div>
          </div>
        </div>
      </div>
    </section><!-- /About Section -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">
      <div class="container section-title" data-aos="fade-up">
        <h2>Contact</h2>
        <p>Get in touch with me for collaborations and inquiries</p>
      </div>

      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4">
          <div class="col-lg-12">
            <div class="info-wrap">
              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                <i class="bi bi-geo-alt flex-shrink-0"></i>
                <div>
                  <h3>Address</h3>
                  <p>Visit admin panel to update contact information</p>
                </div>
              </div>

              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                <i class="bi bi-telephone flex-shrink-0"></i>
                <div>
                  <h3>Call</h3>
                  <p>Contact information available in admin panel</p>
                </div>
              </div>

              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                <i class="bi bi-envelope flex-shrink-0"></i>
                <div>
                  <h3>Email</h3>
                  <p>Contact information available in admin panel</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- /Contact Section -->

  </main>

  <footer id="footer" class="footer light-background">
    <div class="container">
      <div class="copyright text-center ">
        <p>© <span>Copyright</span> <strong class="px-1 sitename"><?php echo explode(' ', $nama_lengkap)[0]; ?></strong> <span>All Rights Reserved<br></span></p>
      </div>
      <div class="social-links d-flex justify-content-center">
        <a href=""><i class="bi bi-twitter-x"></i></a>
        <a href=""><i class="bi bi-facebook"></i></a>
        <a href=""><i class="bi bi-instagram"></i></a>
        <a href=""><i class="bi bi-linkedin"></i></a>
      </div>
      <div class="credits">
        Powered by <a href="#">Dynamic Portfolio System</a>
      </div>
    </div>
  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>