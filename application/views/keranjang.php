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
                            <img src="<?php echo base_url('uploads/' . $produk['foto_produk']); ?>" width="70">
                            <br><?php echo $produk['nama_produk']; ?>
                        </td>
                        <td><?php echo number_format($produk['harga_produk']); ?></td>
                        <td>
                            <!-- Input untuk mengubah jumlah -->
                            <form method="post" action="<?php echo base_url('keranjang/update/' . $produk['id_produk']); ?>" class="d-inline">
                                <input type="number" name="jumlah" value="<?php echo $produk['jumlah']; ?>" class="form-control form-control-sm" style="width: 60px; display: inline;">
                                <button type="submit" class="btn btn-primary btn-sm">Ubah</button>
                            </form>
                        </td>
                        <td><?php echo number_format($subtotal); ?></td>
                        <td>
                            <!-- Tombol hapus -->
                            <a href="<?php echo base_url('keranjang/hapus/' . $produk['id_produk']); ?>" class="btn btn-danger btn-sm">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <h4>Total Keseluruhan: <?php echo number_format($total_keseluruhan); ?></h4>
        <!-- Tombol checkout -->
        <a href="<?php echo base_url('transaksi/checkout'); ?>" class="btn btn-success">Checkout Semua</a>

</div>
