<html>
 <head>
  <title>
   Katalog Produk
  </title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <style>


        .container {
            text-align: center;
            max-width: 64%;
        }
    
        h5 {
            font-size: 35px;
            margin-top: 45px;
            font-weight: bold;
            color: #0E6635;
            margin-bottom: 30px;
            position: relative;
			text-align: center; /* Tetap rata tengah untuk judul */
        }
        h5::after {
            content: '';
            position: absolute;
            background-color: #F9DA73;
            top: 50%;
            left: 60%;
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
            text-align: left;
            color: #0E6635;
            font-size: 16px;
            background-color: transparent; /* Tidak ada warna background */
            border-bottom: 1px solid #ddd; /* Garis bawah antar baris */
        }
        #tabelku td {
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

        select {
            text-align: left;
            max-width: 20%;
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

        .status.nonmember {
            background-color: #0E6635;
        }

        .status.member {
            background-color:#0e2a66;
        }

        .status.diproses {
            background-color: #0E6635;
        }

        .status.dikirim {
            background-color:rgb(241, 137, 0);
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
 </head>
 <body>

 <div class="container">
    <h5>Detail Pelanggan</h5>
    <table class="table">
        <tr>
            <td><strong>Username</strong></td>
            <td><?php echo $pelanggan['username_pelanggan'] ?></td>
        </tr>
        <tr>
            <td><strong>Nama</strong></td>
            <td><?php echo $pelanggan['nama_pelanggan'] ?></td>
        </tr>
        <tr>
            <td><strong>Status Pelanggan</strong></td>
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
            <td><strong>Tanggal Daftar</strong></td>
            <td><?php echo $pelanggan['tgl_daftar'] ?></td>
        </tr>
        <tr>
            <td><strong>Alamat</strong></td>
            <td><?php echo $pelanggan['alamat'] ?></td>
        </tr>
        <tr>
            <td><strong>WA Pelanggan</strong></td>
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
			<h5>Riwayat Transaksi</h5>
			<table class="table" id="tabelku">
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
	                    <td>
                            <span class="status <?php echo $value['status_transaksi']; ?>">
                                <?php echo $value['status_transaksi']; ?>
                            </span>
                        </td>
	                    <td>
	                        <a href="<?php echo base_url("transaksi/detail/".$value["id_transaksi"]) ?>" class="btn">Detail</a>
	                    </td>
	                </tr>
	                <?php endforeach ?>
	            </tbody>
        </table>

		</div>
	</div>
</div>
</body>
</html>