<!-- Begin Page Content -->
<div class="container-fluid">
    <h5 class="h5 mb-0 text-gray-800">Rate Tiket</h5><hr>
</div>
<!-- /.container-fluid -->

<div class="container-fluid">
	<div class="card">
		<div class="card-body">
			<form method="POST" action="<?php echo base_url('tiket/add_review')?>">
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

                    <div class="col-sm-3 form-group">
                        <div class="form-check" style="padding-left: 0px">
                            <input type="radio" name="emot" value="Sangat Puas">
                            <label for="emot4">
                            <img src='<?= base_url('assets/emoticon/Sangat Puas.png') ?>' width="75%" height="50%"/>
                            <p align="center" style="text-align:center;">
                            <p align="center" style="text-align:center;line-height:5px;font-size: 14px"><strong>Sangat Puas</strong></p>
                            <p align="center" style="text-align:center;line-height:5px">
                            <span data-emot="4" data-type="thirdparty" style="background-color:grey"></span></p>
                            </label>
                        </div>
                    </div>

                    <div class="col-sm-3 form-group">
                        <div class="form-check" style="padding-left: 0px">
                            <input type="radio" name="emot" value="Puas">
                            <label for="emot3">
                            <img src='<?= base_url('assets/emoticon/Puas.png') ?>' width="75%" height="50%"/>
                            <p align="center" style="text-align:center;">
                            <p align="center" style="text-align:center;line-height:15px;font-size: 14px"><strong>Puas</strong></p>
                            <p align="center" style="text-align:center;line-height:5px">
                            <span data-emot="3" data-type="thirdparty" style="background-color:grey"></span></p>   
                            </label>
                        </div>
                    </div>

                    <div class="col-sm-3 form-group">
                        <div class="form-check" style="padding-left: 0px">
                            <input type="radio" name="emot" value="Tidak Puas">
                            <label for="emot2">
                            <img src='<?= base_url('assets/emoticon/Tidak Puas.png') ?>' width="75%" height="50%"/>
                            <p align="center" style="text-align:center;">
                            <p align="center" style="text-align:center;line-height:15px;font-size: 14px"><strong>Tidak Puas</strong></p>
                            <p align="center" style="text-align:center;line-height:5px">
                            <span data-emot="2" data-type="thirdparty" style="background-color:grey"></span></p>
                            </label>
                        </div>
                    </div>

                    <div class="col-sm-3 form-group">
                        <div class="form-check" style="padding-left: 0px">
                            <input type="radio" name="emot" value="Kecewa">
                            <label for="emot1">
                            <img src='<?= base_url('assets/emoticon/Kecewa.png') ?>' width="75%" height="50%"/>
                            <p align="center" style="text-align:center;">
                            <p align="center" style="text-align:center;line-height:15px;font-size: 14px"><strong>Kecewa</strong></p>
                            <p align="center" style="text-align:center;line-height:5px">
                            <span data-emot="1" data-type="thirdparty" style="background-color:grey"></span></p>
                            </label>
                        </div>
                    </div>

                    <div class="col-sm-12 form-group">
                        <label><strong>Komentar</strong></label>
                        <textarea name="komentar" class="form-control" placeholder="Masukkan komentar .." cols="45" rows="5" required></textarea>
                    </div>
                </div>

				<button type="submit" class="btn btn-success" >Simpan</button>
			</form>
		</div>
	</div>
</div>