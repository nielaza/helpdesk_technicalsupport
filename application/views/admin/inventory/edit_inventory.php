<!-- Begin Page Content -->
<div class="container-fluid">
    <h5 class="h5 mb-0 text-gray-800">Edit Inventory</h5><hr>
</div>
<!-- /.container-fluid -->

<div class="container-fluid">
	<div class="card">
		<div class="card-body">
        <?php foreach ($inventory as $row) { ?>
			<form method="POST" action="<?php echo base_url(); ?>admin/inventory/inventory-update">
            <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>" />
                <div class="row clearfix">    
                    <div class="col-sm-6 form-group">
                        <label><strong>Barcode</strong></label>
                        <input type="hidden" name="id" value="<?php echo $row->id; ?>">
                        <input type="text" name="barcode" class="form-control" value="<?php echo $row->barcode ?>" required>
                    </div>

                    <div class="col-sm-6 form-group">
                        <label><strong>Pengguna</strong></label>
                        <input type="text" name="pengguna" class="form-control" value="<?php echo $row->pengguna ?>" required>
                    </div>

                    <div class="col-sm-6 form-group">
                        <label><strong>Bidang / Unit</strong></label>
                        <select class="form-control" name="bidang_unit" id="bidang_unit" required>
                            <?php foreach($lokasi as $bidang_unit){ ?>
                                <option <?php if($bidang_unit->id == $row->bidang_unit){echo "selected='selected'";} ?> value="<?php echo $bidang_unit->id ?>"><?php echo $bidang_unit->lokasi; ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="col-sm-6 form-group">
                        <label><strong>Seksi</strong></label>
                        <select class="form-control" name="seksi" id="seksi" required>
                            <?php foreach($seksi as $sks){ ?>
                                <option <?php if($sks->id == $row->id_seksi){echo "selected='selected'";} ?> value="<?php echo $sks->id ?>"><?php echo $sks->seksi; ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="col-sm-6 form-group">
                        <label><strong>Jenis Infrastruktur</strong></label>
                        <select class="form-control" name="jenis_infrastruktur" required>
                            <?php foreach($jenis as $hardware){ ?>
                                <option <?php if($hardware->id == $row->jenis_infrastruktur){echo "selected='selected'";} ?> value="<?php echo $hardware->id ?>"><?php echo $hardware->jenis; ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="col-sm-6 form-group">
                        <label><strong>Kelengkapan</strong></label>
                        <select class="form-control" name="kelengkapan" required>
                            <?php foreach($kelengkapan as $lengkap){ ?>
                                <option <?php if($lengkap->id == $row->id_kelengkapan){echo "selected='selected'";} ?> value="<?php echo $lengkap->id ?>"><?php echo $lengkap->kelengkapan; ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="col-sm-6 form-group">
                        <label><strong>Serial Number</strong></label>
                        <input type="text" name="serial_number" class="form-control" value="<?php echo $row->serial_number ?>">
                    </div>

                    <div class="col-sm-6 form-group">
                        <label><strong>Nama PC</strong></label>
                        <input type="text" name="nama_pc" class="form-control" value="<?php echo $row->nama_pc ?>">
                    </div>

                    <div class="col-sm-3 form-group">
                        <label><strong>Kondisi</strong></label>
                        <select class="form-control" name="kondisi" required>
                            <?php foreach($kondisi as $knds){ ?>
                                <option <?php if($knds->id == $row->id_kondisi){echo "selected='selected'";} ?> value="<?php echo $knds->id ?>"><?php echo $knds->kondisi; ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="col-sm-3 form-group">
                        <label><strong>Tahun Pengadaan</strong></label>
                        <input type="number" name="tahun_pengadaan" class="form-control" value="<?php echo $row->tahun_pengadaan ?>">
                    </div>

                    <div class="col-sm-3 form-group">
                        <label><strong>Lantai</strong></label>
                        <input type="number" name="lantai" class="form-control" value="<?php echo $row->lantai ?>" required>
                    </div>

                    <div class="col-sm-3 form-group">
                        <label><strong>Sumber Dana</strong></label>
                        <select class="form-control" name="sumber_dana">
                            <?php foreach($sumber_dana as $sumber){ ?>
                                <option <?php if($sumber->id == $row->sumber_dana){echo "selected='selected'";} ?> value="<?php echo $sumber->id ?>"><?php echo $sumber->sumber; ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="col-sm-4 form-group">
                        <label><strong>PC Printer</strong></label>
                        <input type="text" name="pc_printer" class="form-control" value="<?php echo $row->pc_printer ?>">
                    </div>

                    <div class="col-sm-4 form-group">
                        <label><strong>Processor</strong></label>
                        <input type="text" name="processor" class="form-control" value="<?php echo $row->processor ?>">
                    </div>

                    <div class="col-sm-4 form-group">
                        <label><strong>Sistem Operasi</strong></label>
                        <input type="text" name="sistem_operasi" class="form-control" value="<?php echo $row->sistem_operasi ?>">
                    </div>

                    <div class="col-sm-3 form-group">
                        <label><strong>RAM (DDR)</strong></label>
                        <input type="number" name="ram_ddr" class="form-control" value="<?php echo $row->ram_ddr ?>">
                    </div>

                    <div class="col-sm-3 form-group">
                        <label><strong>RAM (GB)</strong></label>
                        <input type="number" name="ram_gb" class="form-control" value="<?php echo $row->ram_gb ?>">
                    </div>

                    <div class="col-sm-3 form-group">
                        <label><strong>Hardisk (SSD)</strong></label>
                        <input type="number" name="hd_ssd" class="form-control" value="<?php echo $row->hd_ssd ?>">
                    </div>

                    <div class="col-sm-3 form-group">
                        <label><strong>Hardisk (HDD)</strong></label>
                        <input type="number" name="hd_hdd" class="form-control" value="<?php echo $row->hd_hdd ?>">
                    </div>

                    <div class="col-sm-4 form-group">
                        <label><strong>Grafik Card</strong></label>
                        <input type="text" name="grafik_card" class="form-control" value="<?php echo $row->grafik_card ?>">
                    </div>

                    <div class="col-sm-4 form-group">
                        <label><strong>IP Address</strong></label>
                        <input type="text" name="ip_address" class="form-control" value="<?php echo $row->ip_address ?>">
                    </div>

                    <div class="col-sm-4 form-group">
                        <label><strong>MAC Address</strong></label>
                        <input type="text" name="mac_address" class="form-control" value="<?php echo $row->mac_address ?>">
                    </div>
                </div>

				<button type="submit" class="btn btn-success" >Update Inventory</button>
			</form>
        <?php } ?>
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