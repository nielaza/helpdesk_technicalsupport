<div class="container-fluid">
    <h5 class="h5 mb-0 text-gray-800">Data Inventory Komputer</h5><hr>

    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="<?php echo site_url('admin/inventory') ?>" style="text-decoration:none">
            <div class="card bg-info text-white shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Jumlah Inventory</div>
                            <div class="h5 mb-0 font-weight-bold"><?php echo $all ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-ticket-alt fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
            </a>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <a href="<?php echo site_url('admin/inventory/kondisi-baik') ?>" style="text-decoration:none">
            <div class="card bg-success text-white shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Kondisi Bagus</div>
                            <div class="h5 mb-0 font-weight-bold"><?php echo $baik ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-check-circle fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
            </a>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <a href="<?php echo site_url('admin/inventory/kondisi-bermasalah') ?>" style="text-decoration:none">
            <div class="card bg-warning text-white shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Kondisi Bermasalah</div>
                            <div class="h5 mb-0 font-weight-bold"><?php echo $bermasalah ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-circle-notch fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
            </a>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <a href="<?php echo site_url('admin/inventory/kondisi-rusak') ?>" style="text-decoration:none">
            <div class="card bg-danger text-white shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Kondisi Rusak</div>
                            <div class="h5 mb-0 font-weight-bold"><?php echo $rusak ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
            </a>
        </div>
    </div>

    <!-- Datatable -->
	<div class="card shadow mb-4">
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>No.</th>
                            <th>No Barang</th>
							<th>Jenis Infrastruktur</th>
							<th>Kondisi</th>
							<th>Sumber Dana</th>
							<th>Kelengkapan</th>
							<th>Nama PC</th>
							<th>Lantai</th>
							<th>Bidang Unit</th>
							<th>Pengguna</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1; foreach ($data_inventory as $row){?>
							<tr>
								<td><?php echo $no ?></td>
                                <td><?php echo $row->no_barang?></td>
								<td><?php echo $row->jenis?></td>
								<td><?php echo $row->kondisi?></td>
								<td><?php echo $row->sumber?></td>
								<td><?php echo $row->kelengkapan?></td>
								<td><?php echo $row->nama_pc?></td>
								<td><?php echo $row->lantai?></td>
								<td><?php echo $row->lokasi?></td>
								<td><?php echo $row->pengguna?></td>
							</tr>
						<?php $no++;}?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

    <div class="row">
		<div class="col-lg-6 mb-6">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-gray-800">Inventory by Jenis Hardware
						(<script type="text/javascript">var year = new Date();document.write(year.getFullYear());</script>)
					</h6>
				</div>
				<!-- Card Body -->
				<div class="card-body">
					<div class="chart-area">
						<canvas id="myPieChart"></canvas>
					</div>
				</div>
			</div>
		</div>

		<!-- <div class="col-lg-4 mb-4">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-gray-800">Inventory by Sumber Dana
						(<script type="text/javascript">var year = new Date();document.write(year.getFullYear());</script>)
					</h6>
				</div>
				<div class="card-body">
					<div class="chart-area">
						<canvas id="myPieChart2"></canvas>
					</div>
				</div>
			</div>
		</div> -->

		<div class="col-lg-6 mb-6">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-gray-800">Inventory by Kelengkapan
						(<script type="text/javascript">var year = new Date();document.write(year.getFullYear());</script>)
					</h6>
				</div>
				<!-- Card Body -->
				<div class="card-body">
					<div class="chart-area">
						<canvas id="myPieChart3"></canvas>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-6 mb-6">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-gray-800">Inventory by Tahun Pengadaan
						(<script type="text/javascript">var year = new Date();document.write(year.getFullYear());</script>)
					</h6>
				</div>
				<!-- Card Body -->
				<div class="card-body">
					<div class="chart-area">
						<canvas id="myBarChart"></canvas>
					</div>
				</div>
			</div>
		</div>

		<div class="col-lg-6 mb-6">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-gray-800">Inventory by Lokasi
						(<script type="text/javascript">var year = new Date();document.write(year.getFullYear());</script>)
					</h6>
				</div>
				<!-- Card Body -->
				<div class="card-body">
					<div class="chart-area">
						<canvas id="myBarChart2"></canvas>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
    //Inisialisasi nilai variabel awal
	$jenis 			= "";
    $jum_jenis		= null;
	
	$sumber 		= "";
    $jum_sumber 	= null;

	$kelengkapan	= "";
    $jum_lengkap    = null;

    $tahun 	    	= "";
    $jum_tahun    	= null;

    $lokasi 		= "";
    $jum_lokasi		= null;

	foreach ($label_jenishardware as $data)
    {
        $jns	    = $data->jenis;
        $jenis 	   .= "'$jns'". ", ";
        $jum1	    = $data->jumjenis;
        $jum_jenis .= "$jum1". ", ";
    }

	foreach ($label_sumberdana as $data)
    {
        $smbr	     = $data->sumber;
        $sumber 	.= "'$smbr'". ", ";
        $jum2	     = $data->jumsumber;
        $jum_sumber .= "$jum2". ", ";
    }

	foreach ($label_kelengkapan as $data)
    {
        $lengkap	  = $data->kelengkapan;
        $kelengkapan .= "'$lengkap'". ", ";
        $jum3	      = $data->jumlengkap;
        $jum_lengkap .= "$jum3". ", ";
    }

    foreach ($label_thnpengadaan as $data)
    {
        $thn	    = $data->tahun_pengadaan;
        $tahun 	   .= "'$thn'". ", ";
        $jum4	    = $data->jumtahun;
        $jum_tahun .= "$jum4". ", ";
    }

    foreach ($label_lokasi as $data)
    {
        $lok	      = $data->lokasi;
        $lokasi      .= "'$lok'". ", ";
        $jum5	      = $data->jumlokasi;
        $jum_lokasi  .= "$jum5". ", ";
    }
?>

<script type="text/javascript">
	window.onload = function() {
		var Bar = document.getElementById("myBarChart");
		var chart = new Chart(Bar, {
			// type: 'horizontalBar',
			type: 'bar',
			data: {
				labels: [<?php echo $tahun; ?>],
				datasets : [{
					label: 'Tahun Pengadaan',
					// backgroundColor: "#1ED760",
					backgroundColor: [
									'rgb(183, 0, 0)', 
									'rgb(57, 116, 0)',
									'rgb(154, 116, 0)',
									'rgb(23, 32, 40)',
									'rgb(43, 56, 0)',
									'rgb(11, 12, 0)', 
									'rgb(176, 56, 40)'
									],
					// hoverBackgroundColor: "#1ED760",
					borderColor: "#4e73df",
					data: [<?php echo $jum_tahun; ?>]
				}]
			},
			options: {
				maintainAspectRatio: false,
				tooltips: {
					displayColors : false
				},
				layout: {
					padding: {
						left: 10,
						right: 25,
						top: 25,
						bottom: 0
					}
				},
				scales: {
					xAxes: [{
						ticks: {
							beginAtZero:true,
						}
					}],
					yAxes: [{
						gridLines: {
							display: false,
							drawBorder: false
						},
						maxBarThickness: 25,
					}]
				},
				legend: {
					display: false
				}
			}
		});

        var Bar = document.getElementById("myBarChart2");
		var chart = new Chart(Bar, {
			type: 'bar',
			data: {
				labels: [<?php echo $lokasi; ?>],
				datasets : [{
					label: 'Lokasi Inventory',
					// backgroundColor: "#1F96D2",
					backgroundColor: [
									'rgb(183, 0, 0)', 
									'rgb(57, 116, 0)',
									'rgb(57, 30, 40)',
									'rgb(123, 0, 12)', 
									'rgb(154, 116, 0)',
									'rgb(23, 32, 40)',
									'rgb(56, 45, 135)', 
									'rgb(43, 56, 0)',
									'rgb(78, 78, 89)',
									'rgb(11, 12, 0)', 
									'rgb(123, 32, 0)',
									'rgb(176, 56, 40)'
									],
					// hoverBackgroundColor: "#1F96D2",
					borderColor: "#4e73df",
					data: [<?php echo $jum_lokasi; ?>]
				}]
			},
			options: {
				maintainAspectRatio: false,
				tooltips: {
					displayColors : false
				},
				layout: {
					padding: {
						left: 10,
						right: 25,
						top: 25,
						bottom: 0
					}
				},
				scales: {
					xAxes: [{
						ticks: {
							beginAtZero:true,
						}
					}],
					yAxes: [{
						gridLines: {
							display: false,
							drawBorder: false
						},
						maxBarThickness: 25,
					}]
				},
				legend: {
					display: false
				}
			}
		});

		var Pie = document.getElementById("myPieChart");
		var myPieChart = new Chart(Pie, {
			type :'pie',
			data: {
				labels: [<?php echo $jenis?>],
				datasets: [{
					data: [<?php echo $jum_jenis; ?>],
					backgroundColor: [
									'rgb(183, 0, 0)', 
									'rgb(154, 116, 0)',
									'rgb(23, 32, 40)',
									'rgb(43, 56, 0)',
									'rgb(176, 56, 40)'
									],
					// hoverBackgroundColor: [<?php //echo $BGstat; ?>],
					hoverBorderColor: "rgba(234, 236, 244, 1)",
				}],
			},
			options: {
				maintainAspectRatio: false,
				legend: {
					position: 'right'
				},
				tooltips: {
					borderWidth: 1,
					xPadding: 15,
					yPadding: 15,
					caretPadding: 10,
				},
			},
		});

		// var Pie = document.getElementById("myPieChart2");
		// var myPieChart = new Chart(Pie, {
		// 	type :'pie',
		// 	data: {
		// 		labels: [<?php //echo $sumber?>],
		// 		datasets: [{
		// 			data: [<?php //echo $jum_sumber; ?>],
		// 			backgroundColor: [
		// 							'rgb(183, 0, 0)', 
		// 							'rgb(57, 116, 0)',
		// 							'rgb(154, 116, 0)',
		// 							'rgb(23, 32, 40)',
		// 							'rgb(43, 56, 0)',
		// 							'rgb(11, 12, 0)', 
		// 							'rgb(176, 56, 40)'
		// 							],
		// 			// hoverBackgroundColor: [<?php //echo $BGstat; ?>],
		// 			hoverBorderColor: "rgba(234, 236, 244, 1)",
		// 		}],
		// 	},
		// 	options: {
		// 		maintainAspectRatio: false,
		// 		legend: {
		// 			position: 'right'
		// 		},
		// 		tooltips: {
		// 			borderWidth: 1,
		// 			xPadding: 15,
		// 			yPadding: 15,
		// 			caretPadding: 10,
		// 		},
		// 	},
		// });

		var Pie = document.getElementById("myPieChart3");
		var myPieChart = new Chart(Pie, {
			type :'doughnut',
			data: {
				labels: [<?php echo $kelengkapan?>],
				datasets: [{
					data: [<?php echo $jum_lengkap; ?>],
					backgroundColor: [
									'rgb(154, 116, 0)',
									'rgb(176, 56, 40)'
									],
					// hoverBackgroundColor: [<?php //echo $BGstat2; ?>],
					hoverBorderColor: "rgba(234, 236, 244, 1)",
				}],
			},
			options: {
				maintainAspectRatio: false,
				legend: {
					position: 'right'
				},
				tooltips: {
					borderWidth: 1,
					xPadding: 15,
					yPadding: 15,
					caretPadding: 10,
				},
			},
		});
	}
</script>
