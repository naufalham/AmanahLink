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
			<p><?php echo date('d M Y H:i', strtotime($transaksi['tgl_transaksi'])) ?></p>
			<span class="badge bg-primary"><?php echo $transaksi['status_transaksi'] ?></span>
		</div>
		<div class="col-md-3">
			
		</div>
		<div class="col-md-3">
			<h5>Penerima</h5>
			<p><?php echo $transaksi['nama_pelanggan'] ?></p>
			<p><?php echo $transaksi['wa_pelanggan'] ?></p>
			<p><?php echo $transaksi['alamat'] ?></p>
		</div>
		<div class="col-md-3">
		</div>
	</div>

	<h5>Produk</h5>
	<table class="table">
		<thead>
			<tr>
				<th></th>
				<th>Produk</th>
				<th>Harga</th>
				<th>Jumlah</th>
				<th>Subtotal Harga</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($produk_beli as $key => $value): ?>
				
			
			<tr>
				<td><img src="<?php echo $this->config->item("url_produk").$value["foto_produk"] ?> " width="200"></td>
				<td><?php echo $value["nama_produk"]; ?></td>
				<td><?php echo number_format($value["harga_produk"]); ?></td>
				<td><?php echo $value["jumlah_produk"]; ?></td>
				<td><?php echo $value["subtotal_harga"]; ?></td>
			</tr>
			<?php endforeach ?>
			<tr>
				<td colspan="4">Total</td>
				<th><?php echo number_format($value["total_harga"]);?></th>
			</tr>
		</tbody>
	</table>
</div>