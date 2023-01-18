<?php if ($this->session->userdata('level') == "Admin") { ?>
	<div class="container-fluid">
		<div class="d-sm-flex align-items-center justify-content-between mb-4">
			<h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
		</div>

		<div class="row">
			<div class="col-xl-2 col-md-6 mb-4">
				<a href="<?php echo site_url('tiket/tiket-all') ?>" style="text-decoration:none">
				<div class="card bg-info text-white shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-uppercase mb-1">Semua Tiket</div>
								<div class="h5 mb-0 font-weight-bold"><?php echo $all_tiket ?></div>
							</div>
							<div class="col-auto">
								<i class="fas fa-ticket-alt fa-2x"></i>
							</div>
						</div>
					</div>
				</div>
				</a>
			</div>

			<div class="col-xl-2 col-md-6 mb-4">
				<a href="<?php echo site_url('tiket/tiket-baru') ?>" style="text-decoration:none">
				<div class="card bg-danger text-white shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-uppercase mb-1">Tiket Baru</div>
								<div class="h5 mb-0 font-weight-bold"><?php echo $tiket_baru ?></div>
							</div>
							<div class="col-auto">
								<i class="fas fa-clipboard-list fa-2x"></i>
							</div>
						</div>
					</div>
				</div>
				</a>
			</div>

			<div class="col-xl-2 col-md-6 mb-4">
				<a href="<?php echo site_url('tiket/tiket-proses') ?>" style="text-decoration:none">
				<div class="card bg-warning text-white shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-uppercase mb-1">Tiket Proses</div>
								<div class="h5 mb-0 font-weight-bold"><?php echo $tiket_proses ?></div>
							</div>
							<div class="col-auto">
								<i class="fas fa-circle-notch fa-2x"></i>
							</div>
						</div>
					</div>
				</div>
				</a>
			</div>
		<!-- </div>

		<div class="row"> -->
			<div class="col-xl-3 col-md-6 mb-4">
				<a href="<?php echo site_url('tiket/tiket-selesai') ?>" style="text-decoration:none">
				<div class="card bg-primary text-white shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-uppercase mb-1">Tiket Selesai</div>
								<div class="h5 mb-0 font-weight-bold"><?php echo $tiket_selesai ?></div>
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
				<a href="<?php echo site_url('tiket/tiket-approved') ?>" style="text-decoration:none">
				<div class="card bg-success text-white shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-uppercase mb-1">Tiket Approved by User</div>
								<div class="h5 mb-0 font-weight-bold"><?php echo $tiket_approved ?></div>
							</div>
							<div class="col-auto">
								<i class="fas fa-check-circle fa-2x"></i>
							</div>
						</div>
					</div>
				</div>
				</a>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-12 mb-12">
				<div class="card shadow mb-4">
					<div class="card-header py-3">
						<h6 class="m-0 font-weight-bold text-gray-800">Tiket 
							(<script type="text/javascript">var year = new Date();document.write(year.getFullYear());</script>)
						</h6>
					</div>
					<!-- Card Body -->
					<div class="card-body">
						<div class="chart-area">
							<canvas id="myAreaChart"></canvas>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
            <div class="col-lg-6 mb-6">
				<div class="card shadow mb-4">
					<div class="card-header py-3">
						<h6 class="m-0 font-weight-bold text-gray-800">Tiket by Status
							(<script type="text/javascript">var year = new Date();document.write(year.getFullYear());</script>)
						</h6>
					</div>
					<!-- Card Body -->
					<div class="card-body">
						<div class="chart-area">
							<canvas id="myPieChart2"></canvas>
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-6 mb-6">
				<div class="card shadow mb-4">
					<div class="card-header py-3">
						<h6 class="m-0 font-weight-bold text-gray-800">Tiket by Teknisi
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
						<h6 class="m-0 font-weight-bold text-gray-800">Tiket by Jenis
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

			<div class="col-lg-6 mb-6">
				<div class="card shadow mb-4">
					<div class="card-header py-3">
						<h6 class="m-0 font-weight-bold text-gray-800">Tiket by Lokasi
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
		</div>
	</div>
<?php } else if ($this->session->userdata('level') == "Teknisi") { ?>
	<div class="container-fluid">
		<div class="d-sm-flex align-items-center justify-content-between mb-4">
			<h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
		</div>

		<div class="row">
			<div class="col-xl-2 col-md-6 mb-4">
				<a href="<?php echo site_url('tiket/tiket-all') ?>" style="text-decoration:none">
				<div class="card bg-info text-white shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-uppercase mb-1">Semua Tiket</div>
								<div class="h5 mb-0 font-weight-bold"><?php echo $semua_tiket ?></div>
							</div>
							<div class="col-auto">
								<i class="fas fa-ticket-alt fa-2x"></i>
							</div>
						</div>
					</div>
				</div>
				</a>
			</div>

			<div class="col-xl-2 col-md-6 mb-4">
				<a href="<?php echo site_url('tiket/tiket-baru') ?>" style="text-decoration:none">
				<div class="card bg-danger text-white shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-uppercase mb-1">Tiket Baru</div>
								<div class="h5 mb-0 font-weight-bold"><?php echo $teknisi_baru ?></div>
							</div>
							<div class="col-auto">
								<i class="fas fa-clipboard-list fa-2x"></i>
							</div>
						</div>
					</div>
				</div>
				</a>
			</div>

			<div class="col-xl-2 col-md-6 mb-4">
				<a href="<?php echo site_url('tiket/tiket-proses') ?>" style="text-decoration:none">
				<div class="card bg-warning text-white shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-uppercase mb-1">Tiket Proses</div>
								<div class="h5 mb-0 font-weight-bold"><?php echo $teknisi_proses ?></div>
							</div>
							<div class="col-auto">
								<i class="fas fa-circle-notch fa-2x"></i>
							</div>
						</div>
					</div>
				</div>
				</a>
			</div>
		<!-- </div>

		<div class="row"> -->
			<div class="col-xl-3 col-md-6 mb-4">
				<a href="<?php echo site_url('tiket/tiket-selesai') ?>" style="text-decoration:none">
				<div class="card bg-primary text-white shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-uppercase mb-1">Tiket Selesai</div>
								<div class="h5 mb-0 font-weight-bold"><?php echo $teknisi_selesai ?></div>
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
				<a href="<?php echo site_url('tiket/tiket-approved') ?>" style="text-decoration:none">
				<div class="card bg-success text-white shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-uppercase mb-1">Tiket Approved by User</div>
								<div class="h5 mb-0 font-weight-bold"><?php echo $teknisi_beres ?></div>
							</div>
							<div class="col-auto">
								<i class="fas fa-check-circle fa-2x"></i>
							</div>
						</div>
					</div>
				</div>
				</a>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-12 mb-12">
				<div class="card shadow mb-4">
					<div class="card-header py-3">
						<h6 class="m-0 font-weight-bold text-gray-800">Tiket 
							(<script type="text/javascript">var year = new Date();document.write(year.getFullYear());</script>)
						</h6>
					</div>
					<!-- Card Body -->
					<div class="card-body">
						<div class="chart-area">
							<canvas id="myAreaChart"></canvas>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
            <div class="col-lg-6 mb-6">
				<div class="card shadow mb-4">
					<div class="card-header py-3">
						<h6 class="m-0 font-weight-bold text-gray-800">Tiket by Status
							(<script type="text/javascript">var year = new Date();document.write(year.getFullYear());</script>)
						</h6>
					</div>
					<!-- Card Body -->
					<div class="card-body">
						<div class="chart-area">
							<canvas id="myPieChart2"></canvas>
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-6 mb-6">
				<div class="card shadow mb-4">
					<div class="card-header py-3">
						<h6 class="m-0 font-weight-bold text-gray-800">Tiket by Teknisi
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
						<h6 class="m-0 font-weight-bold text-gray-800">Tiket by Jenis
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

			<div class="col-lg-6 mb-6">
				<div class="card shadow mb-4">
					<div class="card-header py-3">
						<h6 class="m-0 font-weight-bold text-gray-800">Tiket by Lokasi
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
		</div>
	</div>
<?php } ?>

<?php
    //Inisialisasi nilai variabel awal
	$bulan 		= "";
    $Jbulan		=null;
	
	$Tstat      = "";
    $BGstat     = "";
    $Jstat      = null;

	$Tstat2      = "";
    $BGstat2     = "";
    $Jstat2	     = null;

    $kat 	    = "";
    $jml_kat    =null;

    $subkat 	= "";
    $jumlah		=null;

	foreach ($label_perbulan as $data)
    {
        $bul=$data->bulan;
        $bulan .= "'$bul'". ", ";
        $Jumb=$data->jumbulan;
        $Jbulan .= "$Jumb". ", ";
    }

	foreach ($label_status as $data)
    {
        if ($data->status == 1) {
            $stat = "Tiket Dibuat";
            $bg = "#B14145";
		} else if ($data->status == 2) {
            $stat = "Tiket dalam Proses";
            $bg = "#FC8500";
        } else if ($data->status == 3) {
            $stat = "Tiket Selesai";
            $bg = "#2E6095";
        } else if ($data->status == 4) {
            $stat = "Tiket Approved by User";
            $bg = "#1CC88A";
        }
        $Tstat  .= "'$stat'". ", ";
        $BGstat .= "'$bg'". ", ";
        $jstat   =$data->jumstat;
        $Jstat  .= "$jstat". ", ";
    }

	foreach ($label_teknisi as $data)
    {
        if ($data->id_teknisi == 0) {
            $stat2 = "Belum Ditangani";
            $bg2 = "#B14145";
		} else if ($data->id_teknisi == 2) {
            $stat2 = "Wahid Ikhsan";
            $bg2 = "#2E6095";
		} else if ($data->id_teknisi == 3) {
            $stat2 = "Ade Rulliana";
            $bg2 = "#1CC88A";
        }
        $Tstat2  .= "'$stat2'". ", ";
        $BGstat2 .= "'$bg2'". ", ";
        $jstat2   =$data->total;
        $Jstat2  .= "$jstat2". ", ";
    }

    foreach ($label_jenis as $data)
    {
        $sub=$data->jenis;
        $kat .= "'$sub'". ", ";
        $jum=$data->total;
        $jml_kat .= "$jum". ", ";
    }

    foreach ($label_lokasi as $data)
    {
        $sub=$data->lokasi;
        $subkat .= "'$sub'". ", ";
        $jum=$data->total;
        $jumlah .= "$jum". ", ";
    }
?>

<script type="text/javascript">
	window.onload = function() {
		var Bar = document.getElementById("myBarChart");
		var chart = new Chart(Bar, {
			// type: 'horizontalBar',
			type: 'bar',
			data: {
				labels: [<?php echo $subkat; ?>],
				datasets : [{
					label: 'Total Tiket',
					// backgroundColor: "#1ED760",
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
					// hoverBackgroundColor: "#1ED760",
					borderColor: "#4e73df",
					data: [<?php echo $jumlah; ?>]
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
			type: 'horizontalBar',
			data: {
				labels: [<?php echo $kat; ?>],
				datasets : [{
					label: 'Total Tiket',
					// backgroundColor: "#1F96D2",
					backgroundColor: [
									'rgb(183, 0, 0)', 
									'rgb(78, 78, 89)',
									'rgb(11, 12, 0)', 
									'rgb(123, 32, 0)',
									'rgb(176, 56, 40)'
									],
					// hoverBackgroundColor: "#1F96D2",
					borderColor: "#4e73df",
					data: [<?php echo $jml_kat; ?>]
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

		var Line = document.getElementById("myAreaChart");
		var myLineChart = new Chart(Line, {
			type: 'line',
			data: {
				labels: [<?php echo $bulan; ?>],
				datasets: [{
					label: 'Total Ticket',
					lineTension: 0.3,
					backgroundColor: "transparent",
					borderColor: "#209EEB",
					pointRadius: 3,
					pointBackgroundColor: "#209EEB",
					pointBorderColor: "#209EEB",
					pointHoverRadius: 3,
					pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
					pointHoverBorderColor: "rgba(78, 115, 223, 1)",
					pointHitRadius: 10,
					pointBorderWidth: 2,
					data: [<?php echo $Jbulan; ?>]
				}],
			},
			options:{
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
						gridLines: {
							display: false,
							drawBorder: false,
						},
						maxBarThickness: 25,
					}],
					yAxes: [{
						ticks: {
							beginAtZero:true,
						}
					}]
				},
				legend: {
					display: false
				}
			}
		});

		var Pie = document.getElementById("myPieChart2");
		var myPieChart = new Chart(Pie, {
			type :'pie',
			data: {
				labels: [<?php echo $Tstat?>],
				datasets: [{
					data: [<?php echo $Jstat; ?>],
					backgroundColor: [<?php echo $BGstat; ?>],
					hoverBackgroundColor: [<?php echo $BGstat; ?>],
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

		var Pie = document.getElementById("myPieChart3");
		var myPieChart = new Chart(Pie, {
			type :'doughnut',
			data: {
				labels: [<?php echo $Tstat2?>],
				datasets: [{
					data: [<?php echo $Jstat2; ?>],
					backgroundColor: [<?php echo $BGstat2; ?>],
					hoverBackgroundColor: [<?php echo $BGstat2; ?>],
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
