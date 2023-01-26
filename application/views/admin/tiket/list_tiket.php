<div class="container-fluid">
	<h5 class="h5 mb-0 text-gray-800">Data Tiket</h5><hr>

	<?php if($this->session->flashdata('success_login') !='') : ?>
		<script>
		swal({
			type: "success",
			title: "Sukses!",
			text: "Anda Berhasil Login"
		});
		</script>
	<?php endif; ?>

	<?php if($this->session->flashdata('success') !='') : ?>
		<script>
		swal({
			type: "success",
			title: "Sukses!",
			text: "Anda Berhasil Buat Group Tiket"
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
							<?php if ($this->session->userdata('level') == "Unit") { ?>
							<th>No.</th>
							<?php } else { ?>
							<th colspan="2">No.</th>
							<?php } ?>
                            <th>User</th>
                            <th>Jenis</th>
							<th>Model</th>
                            <th>Lokasi / Bagian</th>
							<th>Keterangan</th>
                            <th>Telp</th>
                            <th>Teknisi</th>
                            <th>Status</th>
							<th>Tgl. Tiket</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1; foreach ($data_tiket as $row){?>
							<tr>
								<td><?php echo $no ?>.</td>
								<?php if ($this->session->userdata('level') != "Unit") { ?>
								<td><div class="dropdown text-center">
									<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="text-decoration: none">
										<i class="fas fa-fw fa-list-ul"></i>
									</a>
									<ul class="dropdown-menu" style="padding:10px">
										<li class="disabled"><a style="cursor:default"><span class="h6">Kode Tiket : <br></span><span class="text-success" style="font-size:16px"><?php echo $row->kode_tiket?></span></a></li><hr style="border: 1px solid;">
										<li role="separator" class="divider"></li>
										<?php if ($this->session->userdata('level') == "Teknisi") { ?>
											<li><a href="<?php echo site_url('tiket/cetak-tiket/'.$row->id)?>" style="text-decoration: none"><strong>Cetak Tiket</strong></a></li>
										<?php } ?>
										<?php if ($this->session->userdata('level') == "Admin") { ?>
											<li><a href="<?php echo site_url('tiket/tiket-teknisi/'.$row->id)?>" style="text-decoration: none"><strong>Cetak Tiket Teknisi</strong></a></li>
										<?php } ?>
										<?php if ($this->session->userdata('level') == "Teknisi") { ?>
											<li><a href="<?php echo site_url('tiket/cetak-grouptiket/'.$row->id)?>" style="text-decoration: none"><strong>Cetak Group Tiket</strong></a></li>
											<li><a href="<?php echo site_url('tiket/tiket-group/'.$row->kode_tiket)?>" style="text-decoration: none"><strong>Input Group Tiket</strong></a></li>
										<?php } ?>
									</ul>
									</div>
								</td>
								<?php } ?>
                                <td><strong style="color: #2E6095;"><?php echo $row->user_pemohon?></strong></td>
                                <td><?php echo $row->jenis?></td>
                                <td><?php echo $row->model?></td>
                                <td><strong style="color: #2E6095;"><?php echo $row->lokasi?></strong></td>
                                <td><?php echo $row->keterangan?></td>
                                <td><?php echo $row->telp?></td>
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
								<td><?php echo tanggal_indonesia(date('Y-m-d', strtotime($row->created)))?></td>
							</tr>
						<?php $no++;}?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

