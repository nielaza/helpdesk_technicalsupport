<div class="container-fluid">
    <h5 class="h5 mb-0 text-gray-800">Data Inventory Komputer</h5>
    <br>
    <a href="<?php echo base_url().'admin/inventory/cetak-pencarian'; ?>" target="_blank" class="btn btn-sm btn-success">Cetak Excel Data Yang dicari</a><hr>

    <!-- Datatable -->
	<div class="card shadow mb-4">
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>No.</th>
							<th>Jenis Infrastruktur</th>
							<th>Kondisi</th>
							<th>Sumber Dana</th>
							<th>Tahun Pengadaan</th>
							<th>Kelengkapan</th>
							<th>Lantai</th>
							<th>Bidang Unit</th>
							<th>Pengguna</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1; foreach ($data_inventory as $row){?>
							<tr>
								<td><?php echo $no ?></td>
								<td><?php echo $row->jenis?></td>
								<td><?php echo $row->kondisi?></td>
								<td><?php echo $row->sumber?></td>
								<td><?php echo $row->tahun_pengadaan?></td>
								<td><?php echo $row->kelengkapan?></td>
								<td><?php echo $row->lantai?></td>
								<td><?php echo $row->lokasi?></td>
								<td><?php echo $row->pengguna?></td>
							</tr>
						<?php $no++;}?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
