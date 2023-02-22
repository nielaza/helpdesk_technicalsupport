<!-- Begin Page Content -->
<div class="container-fluid">
    <h5 class="h5 mb-0 text-gray-800">Input Inventory</h5><hr>
</div>
<!-- /.container-fluid -->

<div class="container-fluid">
	<div class="card">
		<div class="card-body">
			<form method="POST" action="<?php echo base_url(); ?>admin/inventory/inventory-save">
            <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>" />
                <div class="row clearfix">    
                    <div class="col-sm-6 form-group">
                        <label><strong>Barcode</strong></label>
                        <input type="text" name="barcode" class="form-control" required>
                    </div>

                    <div class="col-sm-6 form-group">
                        <label><strong>Pengguna</strong></label>
                        <input type="text" name="pengguna" class="form-control" required>
                    </div>

                    <div class="col-sm-6 form-group">
                        <label><strong>Bidang / Unit</strong></label>
                        <select class="form-control" name="bidang_unit" id="bidang_unit" required>
                            <option value="-">--Pilih Bidang / Unit--</option>
                            <?php foreach($lokasi as $bidang_unit) :?>
                            <option value="<?php echo $bidang_unit->id ?>"><?php echo $bidang_unit->lokasi ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="col-sm-6 form-group">
                        <label><strong>Seksi</strong></label>
                        <select class="form-control" name="seksi" id="seksi" required>
                            <option value="-">--Pilih Seksi--</option>
                            <?php foreach($seksi as $seksi_unit) :?>
                            <option value="<?php echo $seksi_unit->id ?>"><?php echo $seksi_unit->seksi ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="col-sm-6 form-group">
                        <label><strong>Jenis Infrastruktur</strong></label>
                        <select class="form-control" name="jenis_infrastruktur" required>
                            <option value="-">--Pilih Jenis Hardware--</option>
                            <?php foreach($jenis as $hardware) :?>
                            <option value="<?php echo $hardware->id ?>"><?php echo $hardware->jenis ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="col-sm-6 form-group">
                        <label><strong>Kelengkapan</strong></label>
                        <select class="form-control" name="kelengkapan" required>
                            <option value="-">--Pilih Kelengkapan--</option>
                            <?php foreach($kelengkapan as $lengkap) :?>
                            <option value="<?php echo $lengkap->id ?>"><?php echo $lengkap->kelengkapan ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="col-sm-6 form-group">
                        <label><strong>Serial Number</strong></label>
                        <input type="text" name="serial_number" class="form-control">
                    </div>

                    <div class="col-sm-6 form-group">
                        <label><strong>Nama PC</strong></label>
                        <input type="text" name="nama_pc" class="form-control">
                    </div>

                    <div class="col-sm-3 form-group">
                        <label><strong>Kondisi</strong></label>
                        <select class="form-control" name="kondisi" required>
                            <option value="-">--Pilih Kondisi--</option>
                            <?php foreach($kondisi as $knds) :?>
                            <option value="<?php echo $knds->id ?>"><?php echo $knds->kondisi ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="col-sm-3 form-group">
                        <label><strong>Tahun Pengadaan</strong></label>
                        <input type="number" name="tahun_pengadaan" class="form-control">
                    </div>

                    <div class="col-sm-3 form-group">
                        <label><strong>Lantai</strong></label>
                        <input type="number" name="lantai" class="form-control" required>
                    </div>

                    <div class="col-sm-3 form-group">
                        <label><strong>Sumber Dana</strong></label>
                        <select class="form-control" name="sumber_dana">
                            <option value="-">--Pilih Sumber Dana--</option>
                            <?php foreach($sumber_dana as $sumber) :?>
                            <option value="<?php echo $sumber->id ?>"><?php echo $sumber->sumber ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="col-sm-4 form-group">
                        <label><strong>PC Printer</strong></label>
                        <input type="text" name="pc_printer" class="form-control">
                    </div>

                    <div class="col-sm-4 form-group">
                        <label><strong>Processor</strong></label>
                        <input type="text" name="processor" class="form-control">
                    </div>

                    <div class="col-sm-4 form-group">
                        <label><strong>Sistem Operasi</strong></label>
                        <input type="text" name="sistem_operasi" class="form-control">
                    </div>

                    <div class="col-sm-3 form-group">
                        <label><strong>RAM (DDR)</strong></label>
                        <input type="number" name="ram_ddr" class="form-control">
                    </div>

                    <div class="col-sm-3 form-group">
                        <label><strong>RAM (GB)</strong></label>
                        <input type="number" name="ram_gb" class="form-control">
                    </div>

                    <div class="col-sm-3 form-group">
                        <label><strong>Hardisk (SSD)</strong></label>
                        <input type="number" name="hd_ssd" class="form-control">
                    </div>

                    <div class="col-sm-3 form-group">
                        <label><strong>Hardisk (HDD)</strong></label>
                        <input type="number" name="hd_hdd" class="form-control">
                    </div>

                    <div class="col-sm-4 form-group">
                        <label><strong>Grafik Card</strong></label>
                        <input type="text" name="grafik_card" class="form-control">
                    </div>

                    <div class="col-sm-4 form-group">
                        <label><strong>IP Address</strong></label>
                        <input type="text" name="ip_address" class="form-control">
                    </div>

                    <div class="col-sm-4 form-group">
                        <label><strong>MAC Address</strong></label>
                        <input type="text" name="mac_address" class="form-control">
                    </div>
                </div>

				<button type="submit" class="btn btn-success" >Add Inventory</button>
			</form>
		</div>
	</div>
</div>

<script>
    $("#bidang_unit").change(function(){
    $("img#load1").show();
    var bidang_unit = $(this).val(); 
		$.ajax({
			type: "POST",
			dataType: "html",
			url: "<?= base_url('admin/inventory/data_seksi'); ?>",
			data: "bidang_unit="+bidang_unit,
			async: false,
			success: function(msg){
				$("select#seksi").html(msg);                                                       
				$("img#load1").hide();                                                       
			}
		});
    });
  </script>