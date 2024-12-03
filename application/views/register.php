<br>
<div class="container">
	<div class="row">
		<div class="col-md-8 offset-md-2">
			<h5>Registrasi Pelanggan</h5>
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
				<div class="mb-3">
					<label>Nama</label>
					<input type="text" name="nama_pelanggan" class="form-control" value="<?php echo set_value("nama_pelanggan") ?>">
					<span class="text-muted"><?php echo form_error("nama_pelanggan") ?></span>
				</div>
				<div class="mb-3">
					<label>Status Pelanggan</label>
					<input type="text" name="status_pelanggan" class="form-control" value="<?php echo set_value("status_pelanggan") ?>">
					<span class="text-muted"><?php echo form_error("status_pelanggan") ?></span>
				</div>
				<div class="mb-3">
					<label>Tanggal Daftar</label>
					<input type="date" name="tgl_daftar" class="form-control" value="<?php echo set_value("tgl_daftar") ?>">
					<span class="text-muted"><?php echo form_error("tgl_daftar") ?></span>
				</div>
				<div class="mb-3">
					<label>Alamat</label>
					<textarea class="form-control" name="alamat"><?php echo set_value("alamat") ?></textarea>
					<span class="text-muted"><?php echo form_error("alamat") ?></span>
				</div>
				<div class="mb-3">
					<label>Nomor Wa</label>
					<input type="text" name="wa_pelanggan" class="form-control" value="<?php echo set_value("wa_pelanggan") ?>">
					<span class="text-muted"><?php echo form_error("wa_pelanggan") ?></span>
				</div>
				<button class="btn btn-primary">Kirim</button>
			</form>
		</div>
	</div>
</div>
