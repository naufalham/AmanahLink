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

    .btn-danger {
        background-color: #B30000;
        color: #ffffff;
    }

    .btn-danger:hover {
        background-color: #ffffff;
        color: #B30000;
    }

    .btn-success {
        background-color:
    }

    tfoot tr td:last-child {
    display: flex;
    justify-content: space-between;
    align-items: center;
    }

    tfoot tr td:last-child .btn {
        margin-left: 10px;
    }
</style>


<div class="container">
    <h5>Keranjang Anda</h5>

    <?php if (empty($keranjang)): ?>
        <div class="alert alert-warning" role="alert">
            Keranjang Anda kosong. Silakan tambahkan produk ke keranjang!
        </div>
    <?php else: ?>
        <table class="table">
            <thead>
                <tr>
                    <th></th>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Total Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $total_keseluruhan = 0;
                foreach ($keranjang as $index => $produk): 
                    $subtotal = $produk['harga_produk'] * $produk['jumlah'];
                    $total_keseluruhan += $subtotal;
                ?>
                    <tr>
                        <td><img src="<?php echo $this->config->item("url_produk").$produk["foto_produk"] ?>" width="70"></td>
                        <td><?php echo $produk['nama_produk']; ?></td>
                        <td><?php echo number_format($produk['harga_produk']); ?></td>
                        <td><?php echo $produk['jumlah']; ?></td>
                        <td><?php echo number_format($subtotal); ?></td>
                        <td>
                            <!-- Tombol hapus -->
                            <a href="<?php echo base_url('transaksi/hapus/' . $produk['id_produk']); ?>" class="btn btn-danger btn-sm">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr style="background-color: #f0f0f0;">
                    <td colspan="4"><b>Total</b> </td>
                    <td><b><?php echo number_format($total_keseluruhan);?></b></td>
                    <td>
                        <!-- Tombol checkout -->
                        <a href="<?php echo base_url('transaksi/checkout'); ?>" class="btn">Checkout</a>
                    </td>
                </tr>
            </tfoot>
        </table>
    <?php endif; ?>
</div>