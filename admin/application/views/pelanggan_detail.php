<div class="container">
	<div class="row mb-5">
		<div class="col-md-3">
			<h5>Detail Pelanggan</h5>
			<table class="table table-bordered">
				<tr>
					<td>Username</td>
					<td><?php echo $pelanggan['username_pelanggan'] ?></td>
				</tr>
				<tr>
					<td>Nama</td>
					<td><?php echo $pelanggan['nama_pelanggan'] ?></td>
				</tr>
				<tr>
					<td>Status Pelanggan</td>
					<td>
						<select class="form-control form-select" name="status_pelanggan" id="status_pelanggan">
							<option value="">Pilih Status</option>
							<?php foreach ($enum_status as $status): ?>
								<option value="<?php echo $status; ?>" 
										<?php echo ($pelanggan['status_pelanggan'] == $status) ? 'selected' : ''; ?>>
									<?php echo ucfirst($status); ?>
								</option>
							<?php endforeach; ?>
						</select>
					</td>
				</tr>
				
				<tr>
					<td>Tanggal Daftar</td>
					<td><?php echo $pelanggan['tgl_daftar'] ?></td>
				</tr>
				<tr>
					<td>Alamat</td>
					<td><?php echo $pelanggan['alamat'] ?></td>
				</tr>
				<tr>
					<td>Wa Pelanggan</td>
					<td><?php echo $pelanggan['wa_pelanggan'] ?></td>
				</tr>
			</table>
		</div>

		<!-- Javascript untuk menangani perubahan status -->
        <script>
            document.getElementById('status_pelanggan').addEventListener('change', function() {
                var selectedStatus = this.value;
                var idPelanggan = <?php echo $pelanggan['id_pelanggan']; ?>;
                
                // Mengirim data status transaksi yang dipilih ke server menggunakan fetch API
                fetch('<?php echo site_url('pelanggan/update_member'); ?>', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        id_pelanggan: idPelanggan,
                        status_pelanggan: selectedStatus
                    })
                })
                
            });
        </script>

	<div class="container">
			<h5>Transaksi Beli</h5>
			<table class="table table-bordered" id="tabelku">
	            <thead>
	                <tr>
	                    <th>No</th>
	                    <th>Tanggal</th>
	                    <th>Total</th>
	                    <th>Status</th>
	                    <th>Opsi</th>
	                </tr>
	            </thead>
	            <tbody>

	                <?php foreach ($beli as $key => $value): ?>

	                <tr>
	                    <td><?php echo $key+1; ?></td>
	                    <td><?php echo $value['tgl_transaksi']; ?></td>
	                    <td><?php echo $value['total_transaksi']; ?></td>
	                    <td><?php echo $value['status_transaksi']; ?></td>
	                    <td>
	                        <a href="<?php echo base_url("transaksi/detail/".$value["id_transaksi"]) ?>" class="btn btn-info">Detail</a>
	                    </td>
	                </tr>
	                <?php endforeach ?>
	            </tbody>
        </table>

		</div>
	</div>
</div>