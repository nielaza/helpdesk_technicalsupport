  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex justify-cntent-center align-items-center">
    <div id="heroCarousel" class="container carousel carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

      <!-- Slide 1 -->
      <div class="carousel-item active">
        <div class="carousel-container">
          <h2 class="animate__animated animate__fadeInDown">APLIKASI<span> E-TICKETING</span></h2>
          <h3 class="animate__animated animate__fadeInDown">(PIKET<span> REPARASI)</span></h3>
          <p class="animate__animated animate__fadeInUp">"APLIKASI E-TICKETING PERENCANAAN PEMELIHARAAN DAN PERAWATAN PRASARANA DAN SARANA SISTEM INFORMASI BINA MARGA"</p>
        </div>
      </div>
    </div>
  </section>
  <!-- End Hero -->

  <main id="main">
    <!-- ======= Services Section ======= -->
    <!-- <section class="services">
      <div class="container">
        <div class="row">
          <div class="col-sm-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up">
            <div class="icon-box icon-box-pink">
              <div class="icon"><i class="bx bxl-dribbble"></i></div>
              <h4 class="title"><a href="">Lorem Ipsum</a></h4>
              <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
            </div>
          </div>

          <div class="col-sm-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="icon-box icon-box-cyan">
              <div class="icon"><i class="bx bx-file"></i></div>
              <h4 class="title"><a href="">Lorem Ipsum</a></h4>
              <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
            </div>
          </div>

          <div class="col-sm-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
            <div class="icon-box icon-box-green">
              <div class="icon"><i class="bx bx-tachometer"></i></div>
              <h4 class="title"><a href="">Lorem Ipsum</a></h4>
              <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
            </div>
          </div>

          <div class="col-sm-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
            <div class="icon-box icon-box-blue">
              <div class="icon"><i class="bx bx-world"></i></div>
              <h4 class="title"><a href="">Lorem Ipsum</a></h4>
              <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque</p>
            </div>
          </div>
        </div>
      </div>
    </section> -->
    <!-- End Services Section -->

    <?php echo $this->session->flashdata('message');?>

    <!-- ======= Why Us Section ======= -->
    <section class="why-us" data-aos="fade-up" date-aos-delay="200">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 video-box">
            <img src="<?php echo base_url(); ?>assets/img/alur_tiketing.jpg" class="img-fluid" alt="">
            <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="venobox mb-4" data-vbtype="video" data-autoplay="true"></a>
          </div>
          <div class="col-lg-6 d-flex flex-column justify-content-center p-5">
            <h4 class="title">Alur Penggunaan Aplikasi Piket Reparasi</h4>
            <p>
                Aplikasi Piket Reparasi digunakan untuk membantu Menampung, dan Mengelola Permintaan Bidang / Unit Dinas Bina Marga terkait Prasarana Dan Sarana Sistem Informasi Bina Marga yang Bermasalah / Rusak. Berikut merupakan alur penggunaan Aplikasi Piket Reparasi : 
            </p>
            <ol>
                <li>Unit / Bidang melaporkan kerusakan / permasalahan</li>
                <li>Akses melalui Link / Barcode Aplikasi Piket Reparasi</li>
                <li>Pemohon mengisi data isian pada data Aplikasi</li>
                <li>Pusdatin Sistem Informasi Memonitor & Mengolah data pemohon</li>
                <li>Tenaga Ahli melakukan tindak lanjut</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <!-- End Why Us Section -->

     <!-- ======= Map Section ======= -->
     <section class="map mt-2">
      <div class="container-fluid p-0">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15866.49798697764!2d106.8109955!3d-6.1809874!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xf8d014f055793e93!2sDinas%20Teknis%20Jatibaru!5e0!3m2!1sen!2sid!4v1672804286237!5m2!1sen!2sid" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
      </div>
    </section>
    <!-- End Map Section -->

    <!-- ======= Features Section ======= -->
    <!-- <section class="features">
      <div class="container">
        <div class="section-title">
          <h2>Features</h2>
        </div>
        <div class="row" data-aos="fade-up">
          <div class="col-md-5 order-1 order-md-2">
            <img src="assets/img/features-4.svg" class="img-fluid" alt="">
          </div>
          <div class="col-md-7 pt-5 order-2 order-md-1">
            <h3>Quas et necessitatibus eaque impedit ipsum animi consequatur incidunt in</h3>
            <p class="fst-italic">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
              magna aliqua.
            </p>
            <p>
              Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
              velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
              culpa qui officia deserunt mollit anim id est laborum
            </p>
          </div>
        </div>
      </div>
    </section> -->
    <!-- End Features Section -->
  </main>
  <!-- End #main -->
