<style>
.stars a {
	display: inline-block;
	padding-right: 4px;
	text-decoration: none;
	margin: 0;
}
.stars a:after {
	position: relative;
	font-size: 18px;
	font-family: 'FontAwesome', serif;
	display: block;
	content: "\f005";
	color: #9e9e9e;
}
span {
	font-size: 0;
}
.stars a:hover~a:after {
	color: #9e9e9e !important;
}        
span.active a.active~a:after {
	color: #9e9e9e;
}
span:hover a:after {
	color: blue !important;
}
span.active a:after,
.stars a.active:after {
	color: blue;
}
</style>


<div class="container">
	<div class="row mb-5">
		<div class="col-md-3">
			<h5>Transaksi</h5>
			<p>ID: <?php echo $transaksi['id_transaksi'] ?></p>
			<p><?php echo date('d M Y H:i', strtotime($transaksi['tanggal_transaksi'])) ?></p>
			<span class="badge bg-primary"><?php echo $transaksi['status_transaksi'] ?></span>
		</div>
		<div class="col-md-3">
			
		</div>
		<div class="col-md-3">
			<h5>Penerima</h5>
			<p><?php echo $transaksi['nama_pelanggan'] ?>, <?php echo $transaksi['wa_pelanggan'] ?></p>
			<p><?php echo $transaksi['alamat_pelanggan'] ?></p>
		</div>
		<div class="col-md-3">
		</div>
	</div>

	<h5>Produk</h5>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Produk</th>
				<th>Harga</th>
				<th>Jumlah</th>
				<th>Total</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($transaksi_detail as $key => $value): ?>
				
			
			<tr>
				<td><?php echo $value["nama_beli"]; ?></td>
				<td><?php echo number_format($value["harga_beli"]); ?></td>
				<td><?php echo number_format($value["jumlah_beli"]); ?></td>
				<td><?php echo $value["harga_beli"] * $value["jumlah_beli"] ?></td>
			</tr>
			<?php endforeach ?>
		</tbody>
		<tfoot>
			<tr>
				<td colspan="3">Total Belanja</td>
				<th><?php echo number_format($transaksi["belanja_transaksi"]) ?></th>
			</tr>
			<tr>
				<td colspan="3">Ongkos Kirim</td>
				<th><?php echo number_format($transaksi["ongkir_transaksi"]) ?></th>
			</tr>
			<tr>
				<td colspan="3">Total Harus dibayar</td>
				<th><?php echo number_format($transaksi["total_transaksi"]) ?></th>
			</tr>
		</tfoot>
	</table>

	<?php if (!empty($cekmidtrans)): ?>
		<div class="row">
			<div class="col-md-4">
				<table  class="table table-sm">
					<tr>
						<td>Total Tagihan</td>
						<td><?php echo $cekmidtrans["gross_amount"] ?></td>
					</tr>
					<tr>
						<td>Tipe Pembayaran</td>
						<td><?php echo $cekmidtrans["payment_type"] ?></td>
					</tr>
					<tr>
						<td>Status Pembayaran</td>
						<td>
							<?php echo $cekmidtrans["transaction_status"] ?>
							<?php if ($cekmidtrans['transaction_status']=="pending"): ?>
								Segera Melakukan Pembayaran Sebelum Waktu Habis
							<?php endif ?>
						</td>
					</tr>
					<tr>
						<td>Nomor VA</td>
						<td><?php echo $cekmidtrans["bill_key"] ?></td>
					</tr>
					<tr>
						<td>Kode VA</td>
						<td><?php echo $cekmidtrans["biller_code"] ?></td>
					</tr>
					<tr>
						<td>Waktu Transaksi</td>
						<td><?php echo $cekmidtrans["transaction_time"] ?></td>
					</tr>
					<tr>
						<td>Batas Akhir Pembayaran</td>
						<td><?php echo $cekmidtrans["expiry_time"] ?></td>
					</tr>			  

				</table>
			</div>
		</div> 
<?php endif ?>


</div>