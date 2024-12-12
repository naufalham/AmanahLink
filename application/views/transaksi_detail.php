<style>


    .container {
    }

    h5 {
        font-size: 35px;
        margin-top: 45px;
        font-weight: bold;
        color: #0E6635;
        margin-bottom: 30px;
        position: relative;
    }

    h5::after {
        content: '';
        position: absolute;
        background-color: #F9DA73;
        top: 50%;
        left: 59%;
        transform: translateX(-50%);
        width: 80px;
        height: 23px;
        border-radius: 2px;
        z-index: -1;
    }

    .table {
        width: 100%;
        max-width: 1200px;
        margin: 0 auto;
        border-collapse: collapse;
        text-align: left;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
		margin-bottom: 50px;
    }

    /* Header Tabel */
    .table thead tr {
        border-bottom: 3px solid #0E6635; /* Garis hijau di bawah header */
    }

    .table th {
        padding: 15px;
        font-size: 18px;
        color: #0E6635;
        text-align: center;
        font-weight: bold;
        background-color: transparent; /* Tidak ada warna background */
    }

    /* Isi Tabel */
    .table td {
        padding: 15px;
        text-align: center;
        color: #0E6635;
        font-size: 16px;
        background-color: transparent; /* Tidak ada warna background */
        border-bottom: 1px solid #ddd; /* Garis bawah antar baris */
    }

    .table tr:last-child td {
        border-bottom: none; /* Menghapus garis bawah di baris terakhir */
    }

    .btn {
        text-decoration: none;
        background-color: #F9DA73;
        color: #0E6635;
        padding: 7px 13px;
        font-size: 14px;
        font-weight: bold;
    }

    .btn:hover {
        background-color: #0E6635;
        color: #F9DA73;
    }

    .status {
        display: inline-block;
        padding: 7px 13px;
        border-radius: 5px;
        color: white;
        font-size: 14px;
        font-weight: bold;
        text-align: center;
    }

    .status.diproses {
        background-color: #0E6635;
    }

    .status.selesai {
        background-color: #0056b3;
    }

    .status.dibatalkan {
        background-color: #B30000;
    }

    @media (max-width: 768px) {
        .table th,
        .table td {
            font-size: 12px;
            padding: 10px;
        }

        .btn {
            font-size: 14px;
            padding: 7px 13px;
        }
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