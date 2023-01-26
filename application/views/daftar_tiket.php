<main id="main">

	<!-- ======= About Us Section ======= -->
	<section class="breadcrumbs">
		<div class="container">
			<div class="d-flex justify-content-between align-items-center">
			<h2>Tiket</h2>
			<ol>
				<li><a href="#">Tiket</a></li>
				<li>Daftar Tiket</li>
			</ol>
			</div>
		</div>
	</section>
	<!-- End About Us Section -->

    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-lg-12 entries">
            <div class="table-responsive">
                <table id="example" class="table table-striped" style="width:100%">
					<thead>
						<tr>
							<th>No.</th>
                            <th>Tgl. Tiket</th>
                            <th>User</th>
                            <th>Lokasi / Bagian</th>
                            <th>Jenis</th>
							<th>Model</th>
							<th>Keterangan</th>
                            <th>Teknisi</th>
                            <th>Status</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1; foreach ($data_tiket as $row){?>
							<tr>
								<td><?php echo $no ?>.</td>
                                <td><?php echo tanggal_indonesia(date('Y-m-d', strtotime($row->created)))?></td>
                                <td><strong style="color: #2E6095;"><?php echo $row->user_pemohon?></strong></td>
                                <td><strong style="color: #2E6095;"><?php echo $row->lokasi?></strong></td>
                                <td><?php echo $row->jenis?></td>
                                <td><?php echo $row->model?></td>
                                <td><?php echo $row->keterangan?></td>
								<?php if ($row->id_teknisi == 0) {?>
									<td>
										<strong style="color: #B14145;">Belum Ditangani</strong>
									</td>
								<?php } else { ?>
									<td><strong style="color: #FC8500;"><?php echo $row->nama_lengkap?></strong></td>
								<?php } ?>
								<?php if ($row->status == 1) {?>
									<td>
										<strong style="color: #B14145;">Tiket Dibuat</strong>
									</td>
								<?php } else if ($row->status == 2) {?>
									<td>
										<strong style="color: #FC8500;">Tiket Dalam Proses</strong>
									</td>
								<?php } else if ($row->status == 3) {?>
									<td>
										<strong style="color: #2E6095;">Pengerjaan selesai by Technical Support</strong>
									</td>
								<?php } else if ($row->status == 4) {?>
									<td>
										<button type="button" class="btn btn-success" style="font-size:14px"><i class="fas fa-check-circle fa"></i><strong>  Tiket Done</strong></button>
									</td>
								<?php } ?>
							</tr>
						<?php $no++;}?>
					</tbody>
				</table>
			</div>
          </div>
        </div>
      </div>
    </section>

</main>
<!-- End #main -->
