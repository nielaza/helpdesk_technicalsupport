<div class="container-fluid">
	<h5 class="h5 mb-0 text-gray-800">Data Tiket</h5><hr>

	<?php if($this->session->flashdata('success') !='') : ?>
	<script>
	swal({
		type: "success",
		title: "Sukses!",
		text: "Anda Berhasil Buat Review Teknisi"
	});
	</script>
	<?php endif; ?>

	<div class="row">
		<div class="col-xl-2 col-md-6 mb-4">
			<a href="<?php echo site_url('tiket/tiket-all') ?>" style="text-decoration:none">
			<div class="card bg-info text-white shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-uppercase mb-1">Semua Tiket</div>
							<div class="h5 mb-0 font-weight-bold"><?php echo $semua_tiket ?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-ticket-alt fa-2x"></i>
						</div>
					</div>
				</div>
			</div>
			</a>
		</div>

		<div class="col-xl-2 col-md-6 mb-4">
			<a href="<?php echo site_url('tiket/tiket-baru') ?>" style="text-decoration:none">
			<div class="card bg-danger text-white shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-uppercase mb-1">Tiket Baru</div>
							<div class="h5 mb-0 font-weight-bold"><?php echo $tiket_baru ?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-clipboard-list fa-2x"></i>
						</div>
					</div>
				</div>
			</div>
			</a>
		</div>

		<div class="col-xl-2 col-md-6 mb-4">
			<a href="<?php echo site_url('tiket/tiket-proses') ?>" style="text-decoration:none">
			<div class="card bg-warning text-white shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-uppercase mb-1">Tiket Proses</div>
							<div class="h5 mb-0 font-weight-bold"><?php echo $tiket_proses ?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-circle-notch fa-2x"></i>
						</div>
					</div>
				</div>
			</div>
			</a>
		</div>
	<!-- </div>

	<div class="row"> -->
		<div class="col-xl-3 col-md-6 mb-4">
			<a href="<?php echo site_url('tiket/tiket-selesai') ?>" style="text-decoration:none">
			<div class="card bg-primary text-white shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-uppercase mb-1">Tiket Selesai</div>
							<div class="h5 mb-0 font-weight-bold"><?php echo $tiket_selesai ?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-check-circle fa-2x"></i>
						</div>
					</div>
				</div>
			</div>
			</a>
		</div>

		<div class="col-xl-3 col-md-6 mb-4">
			<a href="<?php echo site_url('tiket/tiket-approved') ?>" style="text-decoration:none">
			<div class="card bg-success text-white shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-uppercase mb-1">Tiket Approved by User</div>
							<div class="h5 mb-0 font-weight-bold"><?php echo $tiket_approved ?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-check-circle fa-2x"></i>
						</div>
					</div>
				</div>
			</div>
			</a>
		</div>
	</div>

	<!-- Datatable -->
	<div class="card shadow mb-4">
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>No.</th>
                            <th>User</th>
                            <th>Jenis</th>
							<th>Model</th>
                            <th>Lokasi</th>
							<th>Sub Lokasi</th>
							<th>Keterangan</th>
                            <th>Telp</th>
							<th>Status</th>
							<th>Approval</th>
                            <th>Teknisi</th>
							<th>Tgl. Tiket</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1; foreach ($data_tiket as $row){?>
							<tr>
								<td><?php echo $no ?>.</td>
                                <td><strong style="color: #2E6095;"><?php echo $row->user_pemohon?></strong></td>
                                <td><?php echo $row->jenis?></td>
                                <td><?php echo $row->model?></td>
								<td><strong style="color: #2E6095;"><?php echo $row->lokasi?></strong></td>
                                <td><strong style="color: #2E6095;"><?php echo $row->sub_lokasi?></strong></td>
                                <td><?php echo $row->keterangan?></td>
                                <td><?php echo $row->telp?></td>
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
								<?php if ($row->approval == 0) {?>
									<td>
										<button type="button" class="btn btn-danger" style="font-size:14px"><i class="fas fa-times-circle fa"></i><strong>  Belum Approval</strong></button>
									</td>
								<?php } else if ($row->approval == 1) { ?>
									<td>
										<button type="button" class="btn btn-success" style="font-size:14px"><i class="fas fa-check-circle fa"></i><strong>  Sudah Approval</strong></button>
									</td>
								<?php } ?>
								<?php if ($row->id_teknisi == 0) {?>
									<td>
										<strong style="color: #B14145;">Belum Ditangani</strong>
									</td>
								<?php } else { ?>
									<td><strong style="color: #FC8500;"><?php echo $row->nama_lengkap?></strong></td>
								<?php } ?>
								<td><?php echo date('d F Y', strtotime($row->created))?></td>
							</tr>
						<?php $no++;}?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

