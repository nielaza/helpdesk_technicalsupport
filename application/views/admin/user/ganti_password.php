<div class="container-fluid">
	<h1 class="h3 mb-0 text-gray-800">Ganti Password</h1><hr>

	<?php if($this->session->flashdata('gagal') !='') : ?>
		<script>
		swal({
			type: "error",
			title: "Gagal!",
			text: "gagal Ganti Password"
		});
		</script>
	<?php endif; ?>

	<div class="card-body">
		<form action="<?php echo site_url('admin/user/change-password') ?>" method="POST">
			<div class="form-group">
				<label>Input Password Baru</label>
				<input type="password" name="password" class="form-control" required>
			</div>

			<div class="form-group">
				<label>Konfirm Password</label>
				<input type="password" name="password2" class="form-control" required>
			</div>

			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
</div>