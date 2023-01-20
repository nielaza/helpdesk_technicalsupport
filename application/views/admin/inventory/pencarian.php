<!-- Begin Page Content -->
<div class="container-fluid">
    <h5 class="h5 mb-0 text-gray-800">Pencarian Inventory</h5><hr>
</div>
<!-- /.container-fluid -->

<div class="container-fluid">
	<div class="card">
		<div class="card-body">
			<form method="GET" action="<?php echo base_url('admin/inventory/cari-inventory')?>">
                <div class="row clearfix">
                    <div class="col-sm-12 form-group">
                        <label><strong>Jenis Infrastuktur</strong></label>
                        <select name="jenis" class="form-control">
                            <option value="">--Pilih Jenis Infrastruktur--</option>
                            <?php foreach($jenis_hardware as $jenis) :?>
                            <option value="<?php echo $jenis->id ?>"><?php echo $jenis->jenis ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="col-sm-12 form-group">
                        <label><strong>Kondisi</strong></label>
                        <select name="kondisi" class="form-control">
                            <option value="">--Pilih Kondisi--</option>
                            <?php foreach($kondisi as $knds) :?>
                            <option value="<?php echo $knds->id ?>"><?php echo $knds->kondisi ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="col-sm-12 form-group">
                        <label><strong>Sumber Dana</strong></label>
                        <select name="sumber_dana" class="form-control">
                            <option value="">--Pilih Sumber Dana--</option>
                            <?php foreach($sumber_dana as $sumber) :?>
                            <option value="<?php echo $sumber->id ?>"><?php echo $sumber->sumber ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="col-sm-12 form-group">
                        <label><strong>Tahun Pengadaan</strong></label>
                        <select name="tahun_pengadaan" class="form-control" style="width: 100%">
                            <option value="">-- Pilih Tahun Pengadaan --</option>
                            <option value="KIB">KIB</option>
                            <option value="2014">2014</option>
                            <option value="2015">2015</option>
                            <option value="2017">2017</option>
                            <option value="2019">2019</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                        </select>
                    </div>

                    <div class="col-sm-12 form-group">
                        <label><strong>Kelengkapan</strong></label>
                        <select name="kelengkapan" class="form-control">
                            <option value="">--Pilih Kelengkapan--</option>
                            <?php foreach($kelengkapan as $lengkap) :?>
                            <option value="<?php echo $lengkap->id ?>"><?php echo $lengkap->kelengkapan ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="col-sm-12 form-group">
                        <label><strong>Lantai</strong></label>
                        <input type="number" name="lantai" class="form-control" placeholder="Lantai . .">
                    </div>

                    <div class="col-sm-12 form-group">
                        <label><strong>Bidang Unit</strong></label>
                        <select name="bidang_unit" class="form-control">
                            <option value="">--Pilih Bidang / Unit--</option>
                            <?php foreach($lokasi as $lks) :?>
                            <option value="<?php echo $lks->id ?>"><?php echo $lks->lokasi ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="col-sm-12 form-group">
                        <label><strong>Pengguna</strong></label>
                        <input type="text" name="pengguna" class="form-control" placeholder="Pengguna . .">
                    </div>
                </div>

				<button type="submit" class="btn btn-success" >Cari</button>
			</form>
		</div>
	</div>
</div>