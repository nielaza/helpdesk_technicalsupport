<div class="container-fluid">
	<h5 class="h5 mb-0 text-gray-800">Review User</h5><hr>

	<!-- Datatable -->
	<div class="card shadow mb-4">
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>No.</th>
                            <th>Kode Tiket</th>
                            <th>User Pemohon</th>
							<th>Tgl. Tiket</th>
                            <th>Teknisi</th>
                            <th>Emoji</th>
							<th>Komentar</th>
                            <th>Tgl. Review User</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1; foreach ($review as $row){?>
							<tr>
								<td><?php echo $no ?></td>
                                <td><strong><?php echo $row->kode_tiket?></strong></td>
                                <td><?php echo $row->user_pemohon?></td>
                                <td><?php echo tanggal_indonesia(date('Y-m-d', strtotime($row->tgl_tiket)))?></td>
                                <td><strong><?php echo $row->nama_lengkap?></strong></td>
                                <td><?php echo $row->emot?></td>
                                <td><?php echo $row->komentar?></td>
								<td><?php echo tanggal_indonesia(date('Y-m-d', strtotime($row->created)))?></td>
							</tr>
						<?php $no++;}?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

