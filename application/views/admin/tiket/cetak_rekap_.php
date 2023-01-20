<?php
$this->load->database();
date_default_timezone_set('Asia/Jakarta');
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Report Pekerjaan Technical Support.xls");
?>

<h3>REPORT PEKERJAAN TECHNICAL SUPPORT</h3>
		
<table border="1" cellpadding="5">
	<tr>
        <th>No.</th>
        <th>User</th>
        <th>Jenis</th>
        <th>Model</th>
        <th>Lokasi / Bagian</th>
        <th>Keterangan</th>
        <th>Telp</th>
        <th>Teknisi</th>
        <th>Status</th>
        <th>Tgl. Tiket</th>
	</tr>
    
<?php $no = 1; foreach ($data_tiket as $row){?>
    <tr>
        <td><?php echo $no ?>.</td>
        <td><strong style="color: #2E6095;"><?php echo $row->user_pemohon?></strong></td>
        <td><?php echo $row->jenis?></td>
        <td><?php echo $row->model?></td>
        <td><strong style="color: #2E6095;"><?php echo $row->lokasi?></strong></td>
        <td><?php echo $row->keterangan?></td>
        <td><?php echo $row->telp?></td>
        <?php if ($row->id_teknisi == 0) {?>
            <td>
                <strong style="color: #B14145;">Belum Ditangani</strong>
            </td>
        <?php } else { ?>
            <td><strong style="color: #FC8500;"><?php echo $row->nama_lengkap?></strong></td>
        <?php } ?>
        <?php if ($row->status == 1) {?>
            <td>
                <strong style="color: #B14145;">Tiket Dibuat</strong>
            </td>
        <?php } else if ($row->status == 2) {?>
            <td>
                <strong style="color: #FC8500;">Tiket Dalam Proses</strong>
            </td>
        <?php } else if ($row->status == 3) {?>
            <td>
                <strong style="color: #2E6095;">Pengerjaan selesai by Technical Support</strong>
            </td>
        <?php } else if ($row->status == 4) {?>
            <td>
                <button type="button" class="btn btn-success" style="font-size:14px"><i class="fas fa-check-circle fa"></i><strong>  Tiket Done</strong></button>
            </td>
        <?php } ?>
        <td><?php echo tanggal_indonesia(date('Y-m-d', strtotime($row->created)))?></td>
    </tr>
<?php $no++;}?>
</table>