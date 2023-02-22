<div class="container-fluid">
    <h5 class="h5 mb-0 text-gray-800">Data Pemeliharaan Komputer</h5><hr>

    <!-- Datatable -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<a href="<?php echo base_url().'admin/inventory/add-pemeliharaan/'.$barcode; ?>" title="Add Pemeliharaan" class="btn btn-primary">
				<i class="fa fa-plus"></i> Tambah Pemeliharaan
			</a>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>No.</th>
							<th>Barcode</th>
							<th>Pengguna</th>
							<th>Bidang Unit</th>
							<th>Seksi</th>
							<th>Keterangan</th>
							<th>AKSI</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1; foreach ($data_pemeliharaan as $row){?>
							<tr>
								<td><?php echo $no ?></td>
								<td><?php echo $row->barcode?></td>
								<td><?php echo $row->pengguna?></td>
								<td><?php echo $row->lokasi?></td>
								<td><?php echo $row->seksi?></td>
								<td><?php echo $row->keterangan?></td>
								<td class="text-center" >
									<a href="<?php echo site_url('admin/inventory/edit-pemeliharaan/'.$row->id) ?>" title="Edit Inventory" data-toggle="tooltip" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
								</td>
							</tr>
						<?php $no++;}?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
