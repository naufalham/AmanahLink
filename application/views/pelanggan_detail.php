<div class="container">
	<div class="row">
		<div class="col-md-4">
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
					<td><?php echo $pelanggan['status_pelanggan'] ?></td>
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
 		<div class="col col-md-8">
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