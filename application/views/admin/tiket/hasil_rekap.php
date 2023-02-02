<div class="container-fluid">
	<h5 class="h5 mb-0 text-gray-800">Hasil Rekap Teknisi</h5>
    <br>
    <a href="<?php echo base_url().'tiket/cetak-pencarian'; ?>" target="_blank" class="btn btn-sm btn-success">Cetak Excel Data Yang dicari</a><hr>

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
                                <td><strong style="color: #2E6095;"><?php echo $row->user_pemohon?></strong></td>
                                <td><?php echo $row->jenis?></td>
                                <td><?php echo $row->model?></td>
                                <td><strong style="color: #2E6095;"><?php echo $row->sub_lokasi?></strong></td>
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
										<button type="button" class="btn btn-success" style="font-size:14px"><i class="fas fa-check-circle fa"></i><strong>&nbsp;&nbsp;Tiket Done</strong></button>
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

