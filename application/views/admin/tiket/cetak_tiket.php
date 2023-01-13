<?php
$this->load->database();
date_default_timezone_set('Asia/Jakarta');
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Surat Perintah Perbaikan"." - ".$tiket[0]->user_pemohon." "."(".date('d F Y', strtotime($tiket[0]->created)).")".".xls");
$sekarang = date('d-M-Y');
?>

<h3>SURAT PERINTAH PERBAIKAN</h3>
		
<table border="1" cellpadding="5">
	<tr>
		<th>No.</th>
        <th>User</th>
        <th>Jenis</th>
        <th>Model</th>
        <th>Foto</th>
        <th>Lokasi / Bagian</th>
        <th>Keterangan</th>
        <th>Telp</th>
        <th>Tgl. Tiket</th>
	</tr>
    
    <tr>
        <td><?php echo $no = 1; ?></td>
        <td><strong style="color: #2E6095;"><?php echo $tiket[0]->user_pemohon?></strong></td>
        <td><?php echo $tiket[0]->jenis?></td>
        <td><?php echo $tiket[0]->model?></td>
        <td><img width="30%" class="img-responsive" src="<?php echo base_url(); ?>uploads/<?php echo $tiket[0]->lampiran; ?>"></td>
        <td><strong style="color: #2E6095;"><?php echo $tiket[0]->lokasi?></strong></td>
        <td><?php echo $tiket[0]->keterangan?></td>
        <td><?php echo $tiket[0]->telp?></td>
        <td><?php echo date('d F Y', strtotime($tiket[0]->created))?></td>
    </tr>
</table>