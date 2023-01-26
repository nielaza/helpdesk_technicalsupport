<!-- Begin Page Content -->
<div class="container-fluid">
    <h5 class="h5 mb-0 text-gray-800">Input Tiket</h5><hr>
</div>
<!-- /.container-fluid -->

<div class="container-fluid">
	<div class="card">
		<div class="card-body">
			<form method="POST" action="<?php echo base_url('tiket/save-grouptiket')?>">
                <div class="row clearfix">

                    <div class="col-sm-6 form-group">
                        <label><strong>Kode Tiket</strong></label>
                        <input type="text" class="form-control" value="<?php echo $tiket[0]->kode_tiket ?>" disabled>
                    </div>

                    <div class="col-sm-6 form-group">
                        <label><strong>Tgl. Tiket</strong></label>
                        <input type="text" class="form-control" value="<?php echo tanggal_indonesia(date('Y-m-d', strtotime($tiket[0]->created))) ?>" disabled>
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
                    <input type="hidden" name="group_tiket" class="form-control" value="<?php echo $tiket[0]->kode_tiket ?>">
                    
                    <div class="col-sm-6 form-group">
                        <label><strong>User Pemohon</strong></label>
                        <input type="text" name="user_pemohon" class="form-control" required>
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
                        <label><strong>Model</strong></label>
                        <input type="text" name="model" class="form-control" required>
                    </div>

                    <input type="hidden" name="lokasi" class="form-control" value="<?php echo $tiket[0]->id_lokasi ?>">
                </div>

                <div class="row clearfix">
                    <div class="col-sm-12 form-group">
                        <label><strong>Keterangan</strong></label>
                        <textarea name="keterangan" class="form-control" placeholder="Masukkan Keterangan .." cols="45" rows="5" required></textarea>
                    </div>
                </div>

                <div class="row clearfix">
                    <div class="col-sm-12 form-group">
                        <label><strong>Jenis Pengerjaan</strong></label>
                        <textarea name="jenis_pekerjaan" class="form-control" placeholder="Masukkan Jenis Pekerjaan .." cols="45" rows="5"></textarea>
                    </div>
                </div>

                <input type="hidden" name="teknisi" class="form-control" value="<?php echo $tiket[0]->id_teknisi ?>">

                <div class="row clearfix">
                    <div class="col-sm-6 form-group">
                        <label><strong>Status Pengerjaan</strong></label>
                        <select class="form-control" name="status" required>
                            <option value="-">--Pilih Status Pengerjaan--</option>
                            <option value="2">Dalam Proses Pengerjaan</option>
                            <option value="3">Pengerjaan Selesai</option>
                        </select>
                    </div>

                    <div class="col-sm-6 form-group">
                        <label><strong>Tanggal Pengerjaan</strong></label>
                        <input type="datetime-local" name="tanggal" class="form-control" required>
                    </div>
                </div>

				<button type="submit" class="btn btn-success" >Simpan</button>
			</form>
		</div>
	</div>
</div>