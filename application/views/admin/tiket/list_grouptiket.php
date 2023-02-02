<div class="container-fluid">
	<h5 class="h5 mb-0 text-gray-800">Data Group Tiket - <?php echo $kode_tiket ?></h5>
    <br>
    <a href="<?php echo base_url().'tiket/group-tiket/'.$kode_tiket; ?>" class="btn btn-sm btn-success">Tambah Tiket</a><hr>

	<!-- Datatable -->
	<div class="card shadow mb-4">
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th colspan="2">No.</th>
                            <th>User</th>
                            <th>Jenis</th>
							<th>Model</th>
                            <th>Lokasi</th>
							<th>Sub Lokasi</th>
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
								<td><div class="dropdown text-center">
									<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="text-decoration: none">
										<i class="fas fa-fw fa-list-ul"></i>
									</a>
									<ul class="dropdown-menu" style="padding:10px">
										<li class="disabled"><a style="cursor:default"><span class="h6">Kode Tiket : <br></span><span class="text-success" style="font-size:16px"><?php echo $row->kode_tiket?></span></a></li><hr style="border: 1px solid;">
										<li role="separator" class="divider"></li>
										<li><a href="<?php echo site_url('tiket/cetak_tiket/'.$row->id)?>" style="text-decoration: none"><strong>Cetak Tiket</strong></a></li>
										<li><a href="<?php echo site_url('tiket/cetak_grouptiket/'.$row->id)?>" style="text-decoration: none"><strong>Cetak Group Tiket</strong></a></li>
										<li><a href="#" style="text-decoration: none"><strong>Input Group Tiket</strong></a></li>
									</ul>
									</div>
								</td>
                                <td><strong style="color: #2E6095;"><?php echo $row->user_pemohon?></strong></td>
                                <td><?php echo $row->jenis?></td>
                                <td><?php echo $row->model?></td>
								<td><strong style="color: #2E6095;"><?php echo $row->lokasi?></strong></td>
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

