<!DOCTYPE html>
<html>
<head>
	<title>Sistem Informasi Pusdatin - Aplikasi E-Ticketing</title>

	<!-- Custom fonts for this template-->
	<link href="<?php echo base_url() ?>assets/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="<?php echo base_url() ?>assets/admin/css/sb-admin-2.css" rel="stylesheet">

	<link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/img/icon/favicon-32x32.png">

	<!-- Related styles of various icon packs and plugins -->
	<!-- <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/plugins.css"> -->

	<!-- Modernizr (browser feature detection library) -->
	<!-- <script src="<?php //echo base_url() ?>assets/js/vendor/modernizr-3.3.1.min.js"></script> -->

	<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-5">
				<div class="card o-hidden border-0 shadow-lg" style="margin: auto; margin-top: 15%">
					<div class="card-body p-0">
						<div class="row">
							<div class="col-lg">
								<div class="p-5">
									<div class="text-center">
										<img src="<?php echo base_url() ?>assets/img/logo_dbm.png" style="width: 120px; height: 120px"><br><br>
										<h1 class="h2 text-center push-top-bottom animation-slideDown" style="color: black;margin-bottom:0px !important"><b>E-TIKETING</b></h1><br>
										<p style="font-size:20px;font-color:black"><strong>PUSDATIN DINAS BINA MARGA</string></p><br>
										
										<?php if($this->session->flashdata('status')) : ?>
											<div class="alert alert-danger alert-dismissable">
												<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
												<strong>Failed!</strong> Username or Password are <?php echo $this->session->flashdata('status');?>
											</div>
										<?php endif;?>

										<?php if($this->session->flashdata('status1')) : ?>
											<div class="alert alert-info alert-dismissable">
												<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
												Your session are <strong><?php echo $this->session->flashdata('status1');?></strong>! Please login first! 
											</div>
										<?php endif;?>

										<form action="<?php echo base_url('admin/auth/proses_login') ?>" method="POST">
											<div class="form-group">
												<div style="text-align: left !important;">
												<label>Username : </label>
												</div>
												<input type="text" name="username" class="form-control" placeholder="Enter your ID number" maxlength="15" autofocus>
												<?php echo form_error('username'); ?>
											</div>

											<div class="form-group">
												<div style="text-align: left !important;">
												<label>Password : </label>
												</div>
												<input type="password" name="password" class="form-control" placeholder="Enter your password">
												<?php echo form_error('password'); ?>
											</div>

											<button type="submit" class="btn btn-primary btn-user btn-block">LOGIN</button>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>