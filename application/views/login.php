<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Marketplace</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
<div class="container">
	<div class="row">
		<div class="col-md-8 offset-md-2">
			<h5>Login Pelanggan</h5>
			<form method="post" action="">
				<div class="mb-3">
					<label>Email</label>
					<input type="text" name="username_pelanggan" class="form-control" value="<?php echo set_value("username_pelanggan") ?>">
					<span class="text-muted"><?php echo form_error("username_pelanggan") ?></span>
				</div>
				<div class="mb-3">
					<label>Password</label>
					<input type="password" name="password_pelanggan" class="form-control" value="<?php echo set_value("password_pelanggan") ?>">
					<span class="text-muted"><?php echo form_error("password_pelanggan") ?></span>
				</div>
				<button class="btn btn-primary">Kirim</button>
			</form>
		</div>
	</div>
</div>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<?php if ($this->session->flashdata('pesan_sukses')): ?>
	<script>swal("Sukses!", "<?php echo $this->session->flashdata('pesan_sukses') ?>", "success");</script>
	<?php endif ?>

	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<?php if ($this->session->flashdata('pesan_gagal')): ?>
	<script>swal("Gagal!", "<?php echo $this->session->flashdata('pesan_gagal') ?>", "error");</script>
	<?php endif ?>
    
</body>
</html>
