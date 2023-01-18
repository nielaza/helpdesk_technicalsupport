<!-- Begin Page Content -->
<div class="container-fluid">
    <h5 class="h5 mb-0 text-gray-800">Input Pengerjaan</h5><hr>
</div>
<!-- /.container-fluid -->

<div class="container-fluid">
	<div class="card">
		<div class="card-body">
			<form method="POST" action="<?php echo base_url('tiket/add-pengerjaan')?>">
                <div class="row clearfix">
                    <div class="col-sm-6 form-group">
                        <label><strong>Kode Tiket</strong></label>
                        <input type="hidden" name="id" value="<?php echo $tiket[0]->id; ?>">
                        <input type="text" class="form-control" value="<?php echo $tiket[0]->kode_tiket ?>" disabled>
                    </div>

                    <div class="col-sm-6 form-group">
                        <label><strong>Tgl. Tiket</strong></label>
                        <input type="text" class="form-control" value="<?php echo tanggal_indonesia(date('Y-m-d', strtotime($tiket[0]->created))) ?>" disabled>
                    </div>

                    <div class="col-sm-6 form-group">
                        <label><strong>Jenis Infrastruktur</strong></label>
                        <input type="text" class="form-control" value="<?php echo $tiket[0]->jenis ?>" disabled>
                    </div>

                    <div class="col-sm-6 form-group">
                        <label><strong>Model Perangkat</strong></label>
                        <input type="text" class="form-control" value="<?php echo $tiket[0]->model ?>" disabled>
                    </div>

                    <div class="col-sm-6 form-group">
                        <label><strong>User</strong></label>
                        <input type="text" class="form-control" value="<?php echo $tiket[0]->user_pemohon ?>" disabled>
                    </div>

                    <div class="col-sm-6 form-group">
                        <label><strong>Lokasi</strong></label>
                        <input type="text" class="form-control" value="<?php echo $tiket[0]->lokasi ?>" disabled>
                    </div>
                </div><hr>

                <div class="row clearfix">
                    <div class="col-sm-6 form-group">
                        <label><strong>Nama Teknisi</strong></label>
                        <input type="text" class="form-control" value="<?php echo $tiket[0]->nama_lengkap ?>" disabled>
                    </div>

                    <div class="col-sm-6 form-group">
                        <label><strong>Keterangan</strong></label>
                        <input type="text" class="form-control" value="<?php echo $tiket[0]->keterangan ?>" disabled>
                    </div>
                </div>

                <div class="row clearfix">
                    <div class="col-sm-12 form-group">
                        <label><strong>Jenis Pengerjaan</strong></label>
                        <textarea name="jenis_pekerjaan" class="form-control" placeholder="Masukkan Jenis Pekerjaan .." cols="45" rows="5" required></textarea>
                    </div>
                </div>

				<button type="submit" class="btn btn-success" >Simpan</button>
			</form>
		</div>
	</div>
</div>