<?php

session_start();
//kalau session login belum ada
// if(!isset($_SESSION['login'])){
//   header("Location: login.php");
// }

include "pages/header/config.php";
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Voting</title>


  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets_siswa/img/favicon.png" rel="icon">
  <link href="assets_siswa/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets_siswa/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets_siswa/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets_siswa/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets_siswa/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets_siswa/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets_siswa/css/main.css" rel="stylesheet">

  <!-- Custom CSS untuk smooth border -->
<style>
  .card {
    transition: all 0.3s ease;
    cursor: pointer;
  }
  
  .card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
  }
  
</style>

  <!-- =======================================================
  * Template Name: QuickStart
  * Template URL: https://bootstrapmade.com/quickstart-bootstrap-startup-website-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="index.html" class="logo d-flex align-items-center me-auto">
        <img src="assets/img/logo smk.png" alt="xpro">
        <h3 class="titleNavbar">Voting</h3>
      </a>

      <nav id="navmenu" class="navmenu">




        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="btn btn-getstarted" href="index.html#about"><?= $_SESSION['nama'];  ?></a>
      <a class="btn btn-getstarted bg-danger" href="logout.php">Logout</a>

    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->

    <section id="hero" class="hero section">
      <div class="hero-bg">
        <img src="assets_siswa/img/hero-bg-light.webp" alt="">
      </div>
      <div class="container text-center">
        <div class="d-flex flex-column justify-content-center align-items-center">
          <h1 data-aos="fade-up">Voting calon <span>Ketua Osis</span></h1>
          <p data-aos="fade-up" data-aos-delay="100">Pilih sekarang!<br></p>


          <form action="voting.php" method="POST" id="formvote">

            <input type="hidden" name="id_calon" id="id_calon">

            <div class="container py-4">
              <div class="row justify-content-center g-4">

                <?php
                $no = 1;
                $query = mysqli_query($koneksi, "SELECT * FROM tbl_calon");
                foreach ($query as $key) :
                ?>


                  <div class="col-md-4">
  <div class="card-calon card-shadow">
    <div class="card" onclick="pilihcalon(<?= $key['id_calon'] ?>, this)">
      <span class="badge text-bg-primary position-absolute top-0 start-0 m-2 fs-3 px-3 py-2">
        <?= sprintf('%02d', $no++) ?>
      </span>
      <img src="assets/img/<?php echo $key['foto']; ?>" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title"><?php echo $key['nama_calon']; ?></h5>
        <p class="card-text"><?php echo $key['visi']; ?></p>
      </div>
    </div>
  </div>
</div>

                <?php endforeach ?>
              </div>
              <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary px-5" id="btnPilih" disabled>
                  PILIH
                </button>
              </div>
            </div>
        </div>
      </div>
      </form>


      </div>
      </div>

    </section><!-- /Hero Section -->





    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="assets_siswa/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets_siswa/vendor/php-email-form/validate.js"></script>
    <script src="assets_siswa/vendor/aos/aos.js"></script>
    <script src="assets_siswa/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets_siswa/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Main JS File -->
    <script src="assets_siswa/js/main.js"></script>

    <script>
      function pilihcalon(id, card) {

        document.getElementById("id_calon").value = id;


        document.getElementById("btnPilih").disabled = false;


        let semua_card = document.querySelectorAll(".card-calon .card");

        card.classList.add("border", "border-info", "border-4"); 

        semua_card.forEach(kartu_satuan => {
          if (kartu_satuan !== card) {
            kartu_satuan.classList.remove("border", "border-info", "border-4");

          }
        })
        
      }
    </script>

</body>

</html>