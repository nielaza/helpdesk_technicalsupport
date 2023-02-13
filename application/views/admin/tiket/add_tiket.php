<!-- Begin Page Content -->
<div class="container-fluid">
    <h5 class="h5 mb-0 text-gray-800">Input Tiket</h5><hr>
</div>
<!-- /.container-fluid -->

<div class="container-fluid">
	<div class="card">
		<div class="card-body">
			<form method="POST" action="<?php echo base_url('tiket/tiket-save')?>" enctype="multipart/form-data">
            <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>" />
                <div class="row clearfix">                   
                    <div class="col-sm-6 form-group">
                        <label><strong>User Pemohon</strong></label>
                        <input type="text" name="user_pemohon" class="form-control" required>
                    </div>

                    <div class="col-sm-6 form-group">
                        <label><strong>Nomor Telepon</strong></label>
                        <input type="number" name="telp" class="form-control" >
                    </div>

                    <div class="col-sm-6 form-group">
                        <label><strong>Jenis Infrastruktur</strong></label>
                        <select class="form-control" name="jenis" required>
                            <option value="-">--Pilih Jenis Infrastruktur--</option>
                            <?php foreach($jenis as $infrastruktur) :?>
                            <option value="<?php echo $infrastruktur->id ?>"><?php echo $infrastruktur->jenis ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="col-sm-6 form-group">
                        <label><strong>Model Perangkat</strong></label>
                        <input type="text" name="model" class="form-control" required>
                    </div>

                    <div class="col-sm-6 form-group">
                        <label><strong>Attachment</strong></label>
                        <input type="file" name="lampiran" class="form-control" accept=".jpg,.jpeg,.png,.pdf" required>
                    </div>
                </div>

                <div class="row clearfix">
                    <div class="col-sm-12 form-group">
                        <label><strong>Narasi Penjelasan Permasalahan</strong></label>
                        <textarea name="keterangan" class="form-control" cols="45" rows="5" required></textarea>
                    </div>
                </div>

				<button type="submit" class="btn btn-success" >Buat Tiket</button>
			</form>
		</div>
	</div>
</div>