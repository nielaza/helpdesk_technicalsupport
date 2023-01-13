<div class="container-fluid">
    <h5 class="h5 mb-0 text-gray-800">Data Inventory Komputer</h5><hr>

    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="<?php echo site_url('admin/inventory') ?>" style="text-decoration:none">
            <div class="card bg-info text-white shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Jumlah Inventory</div>
                            <div class="h5 mb-0 font-weight-bold"><?php echo $all ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-ticket-alt fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
            </a>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <a href="<?php echo site_url('admin/inventory/kondisi-baik') ?>" style="text-decoration:none">
            <div class="card bg-success text-white shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Kondisi Bagus</div>
                            <div class="h5 mb-0 font-weight-bold"><?php echo $baik ?></div>
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
            <a href="<?php echo site_url('admin/inventory/kondisi-bermasalah') ?>" style="text-decoration:none">
            <div class="card bg-warning text-white shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Kondisi Bermasalah</div>
                            <div class="h5 mb-0 font-weight-bold"><?php echo $bermasalah ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-circle-notch fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
            </a>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <a href="<?php echo site_url('admin/inventory/kondisi-rusak') ?>" style="text-decoration:none">
            <div class="card bg-danger text-white shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Kondisi Rusak</div>
                            <div class="h5 mb-0 font-weight-bold"><?php echo $rusak ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x"></i>
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
