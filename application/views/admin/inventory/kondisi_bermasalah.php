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
							<th>Jenis Infrastruktur</th>
							<th>Kondisi</th>
							<!-- <th>Sumber Dana</th> 
							<th>Kelengkapan</th>
							<th>Nama PC</th> -->
							<th>Lantai</th>
							<th>Bidang Unit</th>
							<!-- <th>Seksi</th> -->
							<th>Pengguna</th>
							<th>AKSI</th>
							<th>Pemeliharaan</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1; foreach ($data_inventory as $row){?>
							<tr>
								<td><?php echo $no ?></td>
								<td><?php echo $row->jenis?></td>
								<td><?php echo $row->kondisi?></td>
								<!-- <td><?php //echo $row->sumber?></td> 
								<td><?php //echo $row->kelengkapan?></td>
								<td><?php //echo $row->nama_pc?></td> -->
								<td><?php echo $row->lantai?></td>
								<td><?php echo $row->lokasi?></td>
								<!-- <td><?php //echo $row->seksi?></td> -->
								<td><?php echo $row->pengguna?></td>
								<td class="text-center" >
									<a class="btn btn-primary btn-sm" href="#" title="Detail Inventory" data-toggle="modal" data-target="#myModal<?php echo $row->id ?>"><i class="fas fa-search"></i></a>
									<a href="<?php echo site_url('admin/inventory/edit-inventory/'.$row->id) ?>" title="Edit Inventory" data-toggle="tooltip" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
								</td>
								<td class="text-center" ><a href="<?php echo site_url('admin/inventory/inv-pemeliharaan/'.$row->barcode) ?>" title="Data Pemeliharaan" data-toggle="tooltip" class="btn btn-info btn-sm"><i class="fas fa-list-alt"></i></a></td>
							</tr>
						<?php $no++;}?>
					</tbody>
				</table>
			</div>

			<?php foreach($data_inventory as $row) { ?>
			<div id="myModal<?php echo $row->id ?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h6 class="m-0 font-weight-bold text-gray-800">Detail Data Inventory</h6>
						</div>
						<div class="modal-body">
							<div class="row clearfix">
								<div class="form-group col-md-6">
									<label>Barcode Inventory</label>
									<input type="text" class="form-control" value="<?php echo $row->barcode?>" disabled>
								</div>
								<div class="form-group col-md-6">
									<label>Pengguna</label>
									<input type="text" class="form-control" value="<?php echo $row->pengguna?>" disabled>
								</div>
							</div>
							<div class="row clearfix">
								<div class="form-group col-md-6">
									<label>Bidang Unit</label>
									<textarea name="jenis_pekerjaan" class="form-control" rows="2" disabled><?php echo $row->lokasi?></textarea>
								</div>
								<div class="form-group col-md-6">
									<label>Seksi</label>
									<textarea name="jenis_pekerjaan" class="form-control" rows="2" disabled><?php echo $row->seksi?></textarea>
								</div>
							</div><hr>  
							<div class="row clearfix">
								<div class="form-group col-md-6">
									<label>Jenis Infrastruktur</label>
									<textarea name="jenis_pekerjaan" class="form-control" rows="2" disabled><?php echo $row->jenis?></textarea>
								</div>
								<div class="form-group col-md-6">
									<label>Kelengkapan</label>
									<textarea name="jenis_pekerjaan" class="form-control" rows="2" disabled><?php echo $row->kelengkapan?></textarea>
								</div>
								<div class="form-group col-md-4">
									<label>Serial Number</label>
									<input type="text" class="form-control" value="<?php echo $row->serial_number?>" disabled>
								</div>
								<div class="form-group col-md-4">
									<label>Nama PC</label>
									<input type="text" class="form-control" value="<?php echo $row->nama_pc?>" disabled>
								</div>
								<div class="form-group col-md-4">
									<label>Kondisi</label>
									<input type="text" class="form-control" value="<?php echo $row->kondisi?>" disabled>
								</div>
								<div class="form-group col-md-4">
									<label>Tahun Pengadaan</label>
									<input type="text" class="form-control" value="<?php echo $row->tahun_pengadaan?>" disabled>
								</div>
								<div class="form-group col-md-4">
									<label>Lantai</label>
									<input type="text" class="form-control" value="<?php echo $row->lantai?>" disabled>
								</div>
								<div class="form-group col-md-4">
									<label>Sumber Dana</label>
									<input type="text" class="form-control" value="<?php echo $row->sumber?>" disabled>
								</div>
								<div class="form-group col-md-4">
									<label>PC Printer</label>
									<input type="text" class="form-control" value="<?php echo $row->pc_printer?>" disabled>
								</div>
								<div class="form-group col-md-4">
									<label>Processor</label>
									<input type="text" class="form-control" value="<?php echo $row->processor?>" disabled>
								</div>
								<div class="form-group col-md-4">
									<label>Sistem Operasi</label>
									<input type="text" class="form-control" value="<?php echo $row->sistem_operasi?>" disabled>
								</div>
								<div class="form-group col-md-3">
									<label>Ram DDR</label>
									<input type="text" class="form-control" value="<?php echo $row->ram_ddr?>" disabled>
								</div>
								<div class="form-group col-md-3">
									<label>Ram GB</label>
									<input type="text" class="form-control" value="<?php echo $row->ram_gb?>" disabled>
								</div>
								<div class="form-group col-md-3">
									<label>Hardisk (SSD)</label>
									<input type="text" class="form-control" value="<?php echo $row->hd_ssd?>" disabled>
								</div>
								<div class="form-group col-md-3">
									<label>Hardisk (HDD)</label>
									<input type="text" class="form-control" value="<?php echo $row->hd_hdd?>" disabled>
								</div>
								<div class="form-group col-md-4">
									<label>Grafik Card</label>
									<input type="text" class="form-control" value="<?php echo $row->grafik_card?>" disabled>
								</div>
								<div class="form-group col-md-4">
									<label>IP Address</label>
									<input type="text" class="form-control" value="<?php echo $row->ip_address?>" disabled>
								</div>
								<div class="form-group col-md-4">
									<label>MAC Address</label>
									<input type="text" class="form-control" value="<?php echo $row->mac_address?>" disabled>
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
</div>
