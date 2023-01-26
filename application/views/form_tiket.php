<main id="main">

    <!-- ======= Contact Section ======= -->
    <section class="breadcrumbs">
      <div class="container">
        <div class="d-flex justify-content-between align-items-center">
          <h2>Buat Tiket</h2>
          <ol>
            <li><a href="#">Tiket</a></li>
            <li>Buat Tiket</li>
          </ol>
        </div>
      </div>
    </section><!-- End Contact Section -->

    <!-- ======= Contact Section ======= -->
    <section class="contact" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
      <div class="container">

        <?php if($this->session->flashdata('error') !='') : ?>
            <script>
            swal({
              type: "error",
              title: "Gagal!",
              text: "Tiket gagal dibuat"
            });
            </script>
        <?php endif; ?>

        <div class="row">
          <div class="col-lg-12">
            <form method="POST" action="<?php echo base_url('add-tiket') ?>" enctype="multipart/form-data">
            <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>" />
              <div class="form-group mt-3">
                <input type="text" name="user_pemohon" class="form-control" placeholder="Nama Pemohon" required>
              </div>
              <div class="form-group mt-3">
                <select class="form-control" name="jenis" required>
                    <option value="-">--Pilih Jenis Infrastruktur--</option>
                    <?php foreach($jenis_infrastruktur as $jenis) :?>
                    <option value="<?php echo $jenis->id ?>"><?php echo $jenis->jenis ?></option>
                    <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group mt-3">
                <input type="text" name="model" class="form-control" placeholder="Model Perangkat" required>
              </div>
              <div class="form-group mt-3">
                <select class="form-control" name="lokasi" required>
                    <option value="-">--Pilih Lokasi Infrastruktur--</option>
                    <?php foreach($lokasi_infrastruktur as $lokasi) :?>
                    <option value="<?php echo $lokasi->id ?>"><?php echo $lokasi->lokasi ?></option>
                    <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group mt-3">
                <input type="file" name="lampiran" class="form-control" placeholder="Attachment" accept=".jpg,.jpeg,.png,.pdf" required>
              </div>
              <div class="form-group mt-3">
                <textarea name="keterangan" class="form-control" rows="5" placeholder="Narasi Penjelasan Permasalahan" required></textarea>
              </div>
              <div class="form-group mt-3">
                <input type="number" name="telp" class="form-control" placeholder="Nomor Telepon" required>
              </div><br>
              <div class="text-center"><button type="submit" class="btn btn-primary">Kirim Tiket</button></div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <!-- End Contact Section -->

  </main>
  <!-- End #main -->

  <script>
  window.setTimeout(function() {
      $(".alert").fadeTo(500, 0).slideUp(500, function(){
      $(this).remove(); 
      });
  }, 5000);
  </script>