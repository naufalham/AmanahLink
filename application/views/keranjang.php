<div class="container">
    <?php 
    $total_keseluruhan = 0; // Inisialisasi total keseluruhan
    foreach ($keranjang as $k => $per_produk): 
        $total_per_penjual = 0; // Inisialisasi total per produk
    ?>
    
    <div class="mb-5">
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
            // Menampilkan setiap produk dalam keranjang
            foreach ($per_produk['produk'] as $k => $produk): 
                $subtotal_produk = $produk['harga_produk'] * $produk['jumlah']; 
                $total_per_penjual += $subtotal_produk; // Menambahkan subtotal per produk ke total per penjual
            ?>
                <tr>
                    <td>
                        <img src="<?php echo $this->config->item("url_produk").$produk["foto_produk"] ?>" width="70"> <br>
                        <?php echo $produk['nama_produk'] ?>
                    </td>
                    <td><?php echo number_format($produk['harga_produk']) ?></td>
                    <td><?php echo $produk['jumlah'] ?></td>
                    <td><?php echo number_format($subtotal_produk) ?></td>
                    <td>
                        <a href="<?php echo base_url("keranjang/hapus/".$produk["id_keranjang"]) ?>" class="btn btn-danger btn-sm">Hapus</a>
                    </td>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>
        <h5>Total: <?php echo number_format($total_per_penjual) ?></h5>
        <a href="<?php echo base_url("keranjang/checkout") ?>" class="btn btn-primary">Checkout</a>
    </div>

    <?php 
    $total_keseluruhan += $total_per_penjual; // Menambahkan total per penjual ke total keseluruhan
    endforeach 
    ?>

    <div class="mt-4">
        <h3>Total Keseluruhan: <?php echo number_format($total_keseluruhan) ?></h3>
        <a href="<?php echo base_url("keranjang/checkout_all") ?>" class="btn btn-success">Checkout Semua</a>
    </div>
</div>
