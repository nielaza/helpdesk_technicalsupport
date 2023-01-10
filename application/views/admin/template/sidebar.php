<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-darktheme sidebar sidebar-dark accordion" id="accordionSidebar">

	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo site_url('admin/dashboard') ?>">
		<div class="sidebar-brand-icon" style="margin-top:10px">
			<img width="50px" height="50px" src="<?php echo base_url(); ?>assets/img/logo_dbm.png">
		</div>
		<div class="sidebar-brand-text mx-3 text-white-800">E-TIKETING</div>
	</a><br>

	<!--Menu Untuk Admin-->
	<!-- Divider -->
	<hr class="sidebar-divider my-0">
		<!-- Nav Item - Dashboard -->
		<li class="nav-item active">
			<a class="nav-link" href="<?php echo site_url('admin/dashboard') ?>">
				<i class="fas fa-fw fa-tachometer-alt"></i>
				<span>Dashboard</span></a>
		</li>

		<hr class="sidebar-divider">
		<li class="nav-item">
			<a class="nav-link" href="<?php echo site_url('tiket/list_tiket') ?>">
				<i class="fas fa-fw fa-ticket-alt"></i>
				<span>Data Tiket</span>
			</a>
		</li>

		<!-- Divider -->
		<hr class="sidebar-divider">
		<!-- Nav Item - Pages Collapse Menu -->
		<li class="nav-item">
			<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseData" aria-expanded="true" aria-controls="collapseData">
				<i class="fas fa-fw fa-cog"></i>
				<span>Data Inventory</span>
			</a>
			<div id="collapseData" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
				<div class="bg-dark py-2 collapse-inner rounded">
					<a class="collapse-item" href="<?php echo site_url('admin/inventory') ?>">Inventory Komputer</a>
					<a class="collapse-item" href="<?php echo site_url('admin/hardware') ?>">Jenis Hardware</a>
					<a class="collapse-item" href="<?php echo site_url('admin/kondisi') ?>">Kondisi</a>
					<a class="collapse-item" href="<?php echo site_url('admin/sumber_dana') ?>">Sumber Dana</a>
					<a class="collapse-item" href="<?php echo site_url('admin/kelengkapan') ?>">Kelengkapan</a>
				</div>
			</div>
		</li>

		<!-- Divider -->
		<hr class="sidebar-divider">
		<!-- Nav Item - Pages Collapse Menu -->
		<li class="nav-item">
			<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSetting" aria-expanded="true" aria-controls="collapseSetting">
				<i class="fas fa-fw fa-cog"></i>
				<span>Master Data</span>
			</a>
			<div id="collapseSetting" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
				<div class="bg-dark py-2 collapse-inner rounded">
					<a class="collapse-item" href="<?php echo site_url('admin/user') ?>">Data User</a>
					<a class="collapse-item" href="<?php echo site_url('admin/teknisi') ?>">Teknisi</a>
					<a class="collapse-item" href="<?php echo site_url('admin/jenis') ?>">Jenis Infrastuktur</a>
					<a class="collapse-item" href="<?php echo site_url('admin/lokasi') ?>">Lokasi Infrastruktur</a>
				</div>
			</div>
		</li>

	<!-- Divider -->
	<hr class="sidebar-divider d-none d-md-block">

	<!-- Sidebar Toggler (Sidebar) -->
	<div class="text-center d-none d-md-inline">
		<button class="rounded-circle border-0" id="sidebarToggle"></button>
	</div>
</ul>