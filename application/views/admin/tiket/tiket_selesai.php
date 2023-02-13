<div class="container-fluid">
	<h5 class="h5 mb-0 text-gray-800">Data Tiket</h5><hr>

	<?php if($this->session->flashdata('success') !='') : ?>
	<script>
	swal({
		type: "success",
		title: "Sukses!",
		text: "Anda Berhasil Input Pengerjaan"
	});
	</script>
	<?php endif; ?>

	<?php if($this->session->flashdata('success_approve') !='') : ?>
	<script>
	swal({
		type: "success",
		title: "Sukses!",
		text: "Tiket telah di Approve by User"
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
			<?php //if ($this->session->userdata('level') == "Unit") { ?>
			<!-- <form action="<?php //echo base_url(); ?>tiket/approve-tiket" method="post">
   			<button type="submit" name="submit" class="btn btn-primary">Add Selected</button><br><br> -->
			<?php //} ?>
				<table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<?php //if ($this->session->userdata('level') == "Unit") { ?>
							<!-- <th></th> -->
							<?php //} ?>
							<th>No.</th>
                            <th>User</th>
                            <!-- <th>Jenis</th>
							<th>Model</th>
                            <th>Lokasi</th> -->
							<th>Sub Lokasi</th>
							<th>Keterangan</th>
							<th>Jenis Pekerjaan</th>
                            <!-- <th>Telp</th> -->
							<th>Approval</th>
							<th>Status</th>
                            <th>Teknisi</th>
							<th>Tgl. Tiket</th>
							<?php if ($this->session->userdata('level') == "Unit") { ?>
                            <th>Rate Tiket</th>
							<?php } ?>
							<th>Detail Tiket</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1; foreach ($data_tiket as $row){?>
							<tr>
								<?php //if ($this->session->userdata('level') == "Unit") { ?>
								<!-- <td>
                  					<input type="checkbox" name="tiket_id[]" value="<?php //echo $row->id; ?>">
                				</td> -->
								<?php //} ?>
								<td><?php echo $no ?>.</td>
                                <td><strong style="color: #2E6095;"><?php echo $row->user_pemohon?></strong></td>
                                <!-- <td><?php //echo $row->jenis?></td>
                                <td><?php //echo $row->model?></td>
								<td><strong style="color: #2E6095;"><?php //echo $row->lokasi?></strong></td> -->
                                <td><strong style="color: #2E6095;"><?php echo $row->sub_lokasi?></strong></td>
                                <td><?php echo $row->keterangan?></td>
								<td><?php echo $row->jenis_pekerjaan?></td>
                                <!-- <td><?php //echo $row->telp?></td> 
								<?php //if ($row->approval == 0) {?>
									<td>
										<button type="button" class="btn btn-danger" style="font-size:14px"><i class="fas fa-times-circle fa"></i><strong>  Belum Approval</strong></button>
									</td>
								<?php //} else if ($row->approval == 1) { ?>
									<td>
										<button type="button" class="btn btn-success" style="font-size:14px"><i class="fas fa-check-circle fa"></i><strong>  Sudah Approval</strong></button>
									</td>
								<?php //} ?> -->
								<?php if ($row->status == 0) {?>
									<td>
										<button type="button" class="btn btn-danger" style="font-size:14px"><i class="fas fa-times-circle fa"></i><strong>  Tiket Ditolak</strong></button>
									</td>
								<?php } else if ($row->status == 1) {?>
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
										<button type="button" class="btn btn-success" style="font-size:14px"><i class="fas fa-check-circle fa"></i><strong>&nbsp;&nbsp;Tiket Done</strong></button>
									</td>
								<?php } ?>
								<?php if ($row->id_teknisi == 0) {?>
									<td>
										<strong style="color: #B14145;">Belum Ditangani</strong>
									</td>
								<?php } else { ?>
									<td><strong style="color: #FC8500;"><?php echo $row->nama_lengkap?></strong></td>
								<?php } ?>
								<td><?php echo tanggal_indonesia(date('Y-m-d', strtotime($row->created)))?></td>
								<?php if ($this->session->userdata('level') == "Unit") { ?>
                                <td class="text-center">
                                    <a href="<?php echo site_url('tiket/rate_tiket/'.$row->id)?>" class="btn btn-success btn-circle btn-sm" title="Rate Tiket">
                                        <i class="fas fa-check-circle"></i>
                                    </a>
                                </td>
								<?php } ?>		
								<td class="text-center" ><a class="btn btn-primary btn-sm" href="#" title="Detail Data Tiket" data-toggle="modal" data-target="#myModal<?php echo $row->kode_tiket ?>"><i class="fas fa-search"></i></a></td>						
							</tr>
						<?php $no++;}?>
					</tbody>
				</table>
			<!-- </form> -->
			</div>
		</div>

		<?php foreach($data_tiket as $row) { ?>
		<div id="myModal<?php echo $row->kode_tiket ?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h6 class="m-0 font-weight-bold text-gray-800">Detail Data Tiket</h6>
					</div>
					<div class="modal-body">
						<div class="row clearfix">
							<div class="form-group col-md-6">
								<label>Kode Tiket</label>
								<input type="text" class="form-control" value="<?php echo $row->kode_tiket?>" disabled>
							</div>
							<div class="form-group col-md-6">
								<label>User Pemohon</label>
								<input type="text" class="form-control" value="<?php echo $row->user_pemohon?>" disabled>
							</div>
							<div class="form-group col-md-6">
								<label>Lokasi</label>
								<textarea name="jenis_pekerjaan" class="form-control" rows="2" disabled><?php echo $row->lokasi?></textarea>
							</div>
							<div class="form-group col-md-6">
								<label>Sub Lokasi</label>
								<textarea name="jenis_pekerjaan" class="form-control" rows="2" disabled><?php echo $row->sub_lokasi?></textarea>
							</div>
						</div><hr>  
						<div class="row clearfix">
							<div class="form-group col-md-3">
								<label>Tgl. Tiket</label>
								<input type="text" class="form-control" value="<?php echo tanggal_indonesia(date('Y-m-d', strtotime($row->created)))?>" disabled>
							</div>
							<div class="form-group col-md-3">
								<label>Telp User</label>
								<input type="text" class="form-control" value="<?php echo $row->telp?>" disabled>
							</div>
							<!-- <div class="form-group col-md-3">
								<label>Approval</label>
								<input type="text" class="form-control" value="<?php 
																				//if($row->approval== 0){
																					//echo "Belum Approval";
																				//} else if($row->approval== 1){
																					//echo "Sudah Approval";
																				//} ?>" disabled>
							</div> -->
							<div class="form-group col-md-3">
								<label>Jenis</label>
								<input type="text" class="form-control" value="<?php echo $row->jenis?>" disabled>
							</div>
							<div class="form-group col-md-3">
								<label>Model</label>
								<input type="text" class="form-control" value="<?php echo $row->model?>" disabled>
							</div>
							<div class="form-group col-md-6">
								<label>Keterangan</label>
								<textarea name="jenis_pekerjaan" class="form-control" rows="2" disabled><?php echo $row->keterangan?></textarea>
							</div>
							<div class="form-group col-md-6">
								<label>Jenis Pekerjaan</label>
								<textarea name="jenis_pekerjaan" class="form-control" rows="2" disabled><?php echo $row->jenis_pekerjaan?></textarea>
							</div>
							<div class="form-group col-md-6">
								<label>Teknisi</label>
								<input type="text" class="form-control" value="<?php 
																				if($row->id_teknisi== 0){
																					echo "Belum Ditangani";
																				} else {
																					echo $row->nama_lengkap;
																				} ?>" disabled>
							</div>
							<div class="form-group col-md-6">
								<label>Status Tiket</label>
								<input type="text" class="form-control" value="<?php 
																				if($row->status== 0){
																					echo "Tiket Ditolak";
																				} else if($row->status== 1){
																					echo "Tiket Dibuat";
																				} else if($row->status== 2){
																					echo "Tiket Dalam Proses";
																				} else if($row->status== 3){
																					echo "Pengerjaan selesai by Technical Support";
																				} else if($row->status== 4){
																					echo "Tiket Done";
																				} ?>" disabled>
							</div>
							<div class="form-group col-md-12" align="center">
							<a data-fancybox="gallery"  href="<?php echo base_url('uploads/'.$row->lampiran) ?>" style="text-decoration:none">
								<img src="<?php echo base_url('uploads/'.$row->lampiran) ?>" style="width:100%;max-width:300px">
								<br>Klik Image Untuk Zoom<br>
							</a>
							</div>
						</div>  
						<hr>
					</div>
				</div>
			</div>
		</div>
		<?php } ?>
	</div>
</div>

