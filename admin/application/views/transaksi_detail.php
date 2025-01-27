<style>
    .container {
            text-align: center;
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

    h1 {
        font-size: 22px;
        margin-top: 30px;
        font-weight: bold;
        color: #0E6635;
        margin-bottom: 20px;
        position: relative;
    }

    h4 {
        font-size: 25px;
        margin-top: 30px;
        font-weight: bold;
        color: #0E6635;
        margin-bottom: 20px;
        position: relative;
    }

    .row{
        width: 100%;
        max-width: 1200px;
        margin: 0 auto;
        border-collapse: collapse;
        text-align: left;

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

        .status.dikirim {
            background-color:rgb(241, 137, 0);
        }

        .status.selesai {
            background-color: #0056b3;
        }

        .status.dibatalkan {
            background-color: #B30000;
        }
        
        .status.dibayar {
            background-color:rgb(74, 0, 104);
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
    <h5 class="judul_detail">Detail Transaksi</h5>

    <div class="row mb-5">
        <div class="col-md-3">
            <h4>Transaksi</h4>
            <p>ID: <?php echo $transaksi['id_transaksi'] ?></p>
            <p><?php echo date('d M Y H:i', strtotime($transaksi['tgl_transaksi'])) ?></p>

            <!-- Form untuk mengubah status transaksi -->
            <form method="POST" action="<?php echo base_url('transaksi/update_status'); ?>">
                <input type="hidden" name="id_transaksi" value="<?php echo $transaksi['id_transaksi']; ?>">
                <div>
                    <select class="form-control form-select" name="status_transaksi">
                        <option value="">Pilih Status</option>
                        <?php foreach ($enum_status as $status): ?>
                            <option value="<?php echo $status; ?>" 
                                    <?php echo ($transaksi['status_transaksi'] == $status) ? 'selected' : ''; ?>>
                                <?php echo ucfirst($status); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="btn mt-3">Simpan</button>
            </form>
        </div>
        <div class="col-md-3"></div>
        <div class="col-md-3">
            <h4>Penerima</h4>
            <p><?php echo $transaksi['nama_pelanggan'] ?></p>
            <p><?php echo $transaksi['wa_pelanggan'] ?></p>
            <p><?php echo $transaksi['alamat'] ?></p>
        </div>
        <div class="col-md-3"></div>
    </div>

    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th></th>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($transaksi_detail as $k => $v): ?>
                    <tr>
                        <td>
                            <img src="<?php echo $this->config->item("url_produk").$v['foto_produk'] ?>" width="200">
                        </td>
                        <td><?php echo $v['nama_produk']; ?></td>
                        <td><?php echo number_format($v['harga_produk']); ?></td>
                        <td><?php echo number_format($v['jumlah']); ?></td>
                        <td><?php echo number_format($v['harga_produk'] * $v['jumlah']); ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
            <tfoot>
                <tr style="background-color: #f0f0f0;">
                    <td colspan="4"><b>Total Harus Dibayar</b></td>
                    <th><?php echo number_format($transaksi['total_transaksi']) ?></th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>