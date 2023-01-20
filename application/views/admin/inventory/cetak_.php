<?php
$this->load->database();
date_default_timezone_set('Asia/Jakarta');
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Inventory Komputer.xls");
?>

<h3>INVENTORY KOMPUTER</h3>
		
<table border="1" cellpadding="5">
	<tr>
        <th>No.</th>
        <th>Barcode</th>
        <th>Jenis Infrastruktur</th>
        <th>PC / Printer</th>
        <th>Processor</th>
        <th>RAM DDR</th>
        <th>RAM (GB)</th>
        <th>HD (SDD)</th>
        <th>HD (HDD)</th>
        <th>Grafik Card</th>
        <th>Sistem Operasi</th>
        <th>Kondisi</th>
        <th>Sumber Dana</th>
        <th>Tahun Pengadaan</th>
        <th>Kelengkapan</th>
        <th>Nama PC</th>
        <th>MAC Address</th>
        <th>Lantai</th>
        <th>Bidang Unit</th>
        <th>Seksi</th>
        <th>Pengguna</th>
	</tr>
    
<?php $no = 1; foreach ($data_inventory as $row){?>
    <tr>
        <td><?php echo $no ?></td>
        <td><?php echo $row->barcode?></td>
        <td><?php echo $row->jenis?></td>
        <td><?php echo $row->pc_printer?></td>
        <td><?php echo $row->processor?></td>
        <td><?php echo $row->ram_ddr?></td>
        <td><?php echo $row->ram_gb?></td>
        <td><?php echo $row->hd_ssd?></td>
        <td><?php echo $row->hd_hdd?></td>
        <td><?php echo $row->grafik_card?></td>
        <td><?php echo $row->sistem_operasi?></td>
        <td><?php echo $row->kondisi?></td>
        <td><?php echo $row->sumber?></td>
        <td><?php echo $row->tahun_pengadaan?></td>
        <td><?php echo $row->kelengkapan?></td>
        <td><?php echo $row->nama_pc?></td>
        <td><?php echo $row->mac_address?></td>
        <td><?php echo $row->lantai?></td>
        <td><?php echo $row->lokasi?></td>
        <td><?php echo $row->jenis?></td>
        <td><?php echo $row->pengguna?></td>
    </tr>
<?php $no++;}?>
</table>