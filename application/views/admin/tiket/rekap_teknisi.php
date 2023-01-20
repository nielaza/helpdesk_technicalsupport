<!-- Begin Page Content -->
<div class="container-fluid">
    <h5 class="h5 mb-0 text-gray-800">Rekap Technical Support</h5><hr>
</div>
<!-- /.container-fluid -->

<div class="container-fluid">
	<div class="card">
		<div class="card-body">
			<form method="GET" action="<?php echo base_url('tiket/cari-teknisi')?>">
                <div class="row clearfix">
                    <div class="col-sm-12 form-group">
                        <label><strong>Teknisi</strong></label>
                        <select name="teknisi" class="form-control">
                            <option value="">--Pilih Teknisi--</option>
                            <?php foreach($teknisi as $ts) :?>
                            <option value="<?php echo $ts->id ?>"><?php echo $ts->nama_lengkap ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group col-lg-12">
                    </div>

                    <div class="form-group col-lg-12">
                        <label><strong>Tgl. Pekerjaan</strong></label>
                    </div>
                    
                    <div class="form-group col-lg-6">
                        <label>Dari</label>
                        <input type="datetime-local" id="tgl1" name="tgl1" class="form-control" placeholder="Masukkan Tanggal Awal..">
                    </div>
                    
                    <div class="form-group col-lg-6">
                        <label>Sampai</label>
                        <input type="datetime-local" id="tgl2" name="tgl2" class="form-control" placeholder="Masukkan Tanggal Akhir..">
                    </div>		
                </div>

				<button type="submit" class="btn btn-success" >Cari</button>
			</form>
		</div>
	</div>
</div>