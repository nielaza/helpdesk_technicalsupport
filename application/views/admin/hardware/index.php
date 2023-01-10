<div class="container-fluid">
    <h5 class="h5 mb-0 text-gray-800">Data Jenis Hardware</h5><hr>

	<!-- Datatable -->
	<div class="card shadow mb-4">
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>No.</th>
                            <th>Jenis</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1; foreach ($data_hardware as $row){?>
							<tr>
								<td><?php echo $no ?></td>
                                <td><?php echo $row->jenis?></td>
							</tr>
						<?php $no++;}?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>