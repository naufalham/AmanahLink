<div class="container mt-5">
	<h5>Ubah Akun Pelanggan</h5>
		<div class="row">
			<div class="col-md-8 offset-md-2">
				<form method="post">
					<div class="mb-3">
						<label>Username Anda</label>
						<input type="text" name="username_pelanggan" class="form-control" value="<?php echo set_value("username_pelanggan",$this->session->userdata("username_pelanggan")) ?>">
						<span class="small text-danger">
							<?php echo form_error("username_pelanggan") ?>
            			</span>
					</div>
					<div class="mb-3">
						<label>Password</label>
						<input type="text" name="password_pelanggan" class="form-control">
						<p class="test-muted">Kosongkan jika password tidak diubah</p>						
					</div>	
					<div class="mb-3">
						<label>Nama Lengkap</label>
						<input type="text" name="nama_pelanggan" class="form-control" value="<?php echo set_value("nama_pelanggan",$this->session->userdata("nama_pelanggan")) ?>">	
						<span class="small text-danger">
							<?php echo form_error("nama_pelanggan") ?>
            			</span>			
					</div>	
                    <div class="mb-3">
						<label>Status Pelanggan</label>
						<p><?php echo set_value("status_pelanggan",$this->session->userdata("status_pelanggan")) ?></p>						<span class="small text-danger">
							<?php echo form_error("status_pelanggan") ?>
            			</span>			
					</div>	
					<div class="mb-3">
						<label>Alamat Lengkap</label>
						<input type="text" name="alamat" class="form-control" value="<?php echo set_value("alamat",$this->session->userdata("alamat")) ?>">	
						<span class="small text-danger">
							<?php echo form_error("alamat") ?>
            			</span>			
					</div>
					<div class="mb-3">
						<label>Nomor WA</label>
						<input type="text" name="wa_pelanggan" class="form-control" value="<?php echo set_value("wa_pelanggan",$this->session->userdata("wa_pelanggan")) ?>">	
						<span class="small text-danger">
							<?php echo form_error("wa_pelanggan") ?>
            			</span>			
					</div>
					<button class="btn btn-primary">Ubah Akun</button>				
				</form>
			</div>
		</div>
	</div>