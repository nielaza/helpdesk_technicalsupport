<!-- Begin Page Content -->
<div class="container-fluid">
    <h5 class="h5 mb-0 text-gray-800">Add Pemeliharaan Inventory</h5><hr>
</div>
<!-- /.container-fluid -->

<div class="container-fluid">
	<div class="card">
		<div class="card-body">
			<form method="POST" action="<?php echo base_url('admin/inventory/pemeliharaan-save')?>">
                <div class="row clearfix">
                    <div class="col-sm-6 form-group">
                        <label><strong>Barcode</strong></label>
                        <input type="text" class="form-control" name="barcode" value="<?php echo $data_pemeliharaan[0]->barcode ?>" readonly>
                    </div>

                    <div class="col-sm-6 form-group">
                        <label><strong>Pengguna</strong></label>
                        <input type="text" class="form-control" value="<?php echo $data_pemeliharaan[0]->pengguna ?>" disabled>
                    </div>

                    <div class="col-sm-6 form-group">
                        <label><strong>Bidang Unit</strong></label>
                        <textarea name="keterangan" class="form-control" placeholder="Masukkan Keterangan .." cols="45" rows="2" disabled><?php echo $data_pemeliharaan[0]->lokasi ?></textarea>
                    </div>

                    <div class="col-sm-6 form-group">
                        <label><strong>Seksi</strong></label>
                        <textarea name="keterangan" class="form-control" placeholder="Masukkan Keterangan .." cols="45" rows="2" disabled><?php echo $data_pemeliharaan[0]->seksi ?></textarea>
                    </div>
                </div><hr>

                <div class="row clearfix">
                    <div class="col-sm-12 form-group">
                        <label><strong>Keterangan</strong></label>
                        <textarea name="keterangan" class="form-control" placeholder="Masukkan Keterangan .." cols="45" rows="5" required></textarea>
                    </div>
                </div>

				<button type="submit" class="btn btn-success" >Simpan</button>
			</form>
		</div>
	</div>
</div>