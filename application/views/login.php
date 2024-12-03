<br>
<div class="container">
	<div class="row">
		<div class="col-md-8 offset-md-2">
			<h5>Login Pelanggan</h5>
			<form method="post">
				<div class="mb-3">
					<label>Email</label>
					<input type="text" name="username_pelanggan" class="form-control" value="<?php echo set_value("username_pelanggan") ?>">
					<span class="text-muted"><?php echo form_error("username_pelanggan") ?></span>
				</div>
				<div class="mb-3">
					<label>Password</label>
					<input type="text" name="password_pelanggan" class="form-control" value="<?php echo set_value("password_pelanggan") ?>">
					<span class="text-muted"><?php echo form_error("password_pelanggan") ?></span>
				</div>
				<button class="btn btn-primary">Kirim</button>
			</form>
		</div>
	</div>
</div>
