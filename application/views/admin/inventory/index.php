<div class="container-fluid">
    <h5 class="h5 mb-0 text-gray-800">Data Inventory Komputer</h5><hr>

	<!-- Datatable -->
	<div class="card shadow mb-4">
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>No.</th>
                            <th>No Barang</th>
							<th>Jenis Infrastruktur</th>
							<th>Kondisi</th>
							<th>Sumber Dana</th>
							<th>Kelengkapan</th>
							<th>Nama PC</th>
							<th>Lantai</th>
							<th>Bidang Unit</th>
							<th>Pengguna</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1; foreach ($data_inventory as $row){?>
							<tr>
								<td><?php echo $no ?></td>
                                <td><?php echo $row->no_barang?></td>
								<td><?php echo $row->jenis?></td>
								<td><?php echo $row->kondisi?></td>
								<td><?php echo $row->sumber?></td>
								<td><?php echo $row->kelengkapan?></td>
								<td><?php echo $row->nama_pc?></td>
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