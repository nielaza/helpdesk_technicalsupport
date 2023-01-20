<!-- Begin Page Content -->
<div class="container-fluid">
    <h5 class="h5 mb-0 text-gray-800">Cetak Tiket Technical Support</h5><hr>
</div>
<!-- /.container-fluid -->

<div class="container-fluid">
	<div class="card">
		<div class="card-body">
			<form method="POST" action="<?php echo base_url('tiket/cetaktiket-teknisi')?>">
                <div class="row clearfix">
                    <div class="col-sm-12 form-group">
                        <label><strong>Teknisi</strong></label>
                        <input type="hidden" name="id_tiket" value="<?php echo $tiket[0]->id; ?>">
                        <select name="teknisi" class="form-control">
                            <option value="">--Pilih Teknisi--</option>
                            <?php foreach($list_teknisi as $ts) :?>
                            <option value="<?php echo $ts->nama_lengkap ?>"><?php echo $ts->nama_lengkap ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

				<button type="submit" class="btn btn-success" >CETAK</button>
			</form>
		</div>
	</div>
</div>