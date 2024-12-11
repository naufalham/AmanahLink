<div class="container">
    <h3>Keranjang Anda</h3>

        <table class="table table-sm table-bordered">
            <thead>
                <tr>
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
                        <td>
                            <img src="<?php echo $this->config->item("url_produk").$produk["foto_produk"] ?>" width="70">
                            <br><?php echo $produk['nama_produk']; ?>
                        </td>
                        <td><?php echo number_format($produk['harga_produk']); ?></td>
                        <td><?php echo $produk['jumlah']; ?></td>
                        <td><?php echo number_format($subtotal); ?></td>
                        <td>
                            <!-- Tombol hapus -->
                            <a href="<?php echo base_url('transaksi/keranjang/hapus/' . $produk['id_produk']); ?>" class="btn btn-danger btn-sm">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <h4>Total Keseluruhan: <?php echo number_format($total_keseluruhan); ?></h4>
        <!-- Tombol checkout -->
        <a href="<?php echo base_url('transaksi/checkout'); ?>" class="btn btn-success">Checkout Semua</a>

</div>
