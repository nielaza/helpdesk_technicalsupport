  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center header-transparent" style="background: #1e4356;">
    <div class="container d-flex justify-content-between align-items-center">

      <div class="logo">
        <a href="<?php echo base_url() ?>" style="max-height:30px"><img src="<?php echo base_url(); ?>assets/img/logo-baru-2.png" alt=""></a>
        <!-- <h1 class="text-light"><a href="index.html"><span>Moderna</span></a></h1> -->
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="active" href="<?php echo base_url() ?>" style="text-decoration: none">HOME</a></li>
          <li><a href="<?php echo base_url('modul/tentang_kami') ?>" style="text-decoration: none">TENTANG KAMI</a></li>
          <li><a href="<?php echo base_url('tiket/daftar_tiket') ?>" style="text-decoration: none">DAFTAR TIKET</a></li>
          <!-- <li><a href="<?php //echo base_url('modul/team_sistem_informasi') ?>">TEAM SISTEM INFORMASI</a></li> -->
          <li class="get-started-btn"><a href="<?php echo base_url('tiket/buat_tiket') ?>" style="padding:10px 10px 10px 10px !important;text-decoration: none">BUAT TIKET</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header>
  <!-- End Header -->
