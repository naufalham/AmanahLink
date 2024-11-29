<div class="container">
    <div class="row mb-5">
        <div class="col-md-3">
            <h5>Transaksi</h5>
            <p>ID: <?php echo $transaksi['id_transaksi'] ?></p>
            <p><?php echo date('d M Y H:i', strtotime($transaksi['tgl_transaksi'])) ?></p>

            <div>
                <select class="form-control form-select" name="status_transaksi" id="status_transaksi">
                <option value="">Pilih Status</option>
                    <?php foreach ($enum_status as $status): ?>
                        <option value="<?php echo $status; ?>" 
                                <?php echo ($transaksi['status_transaksi'] == $status) ? 'selected' : ''; ?>>
                            <?php echo ucfirst($status); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        </div>

        <!-- Javascript untuk menangani perubahan status -->
        <script>
            document.getElementById('status_transaksi').addEventListener('change', function() {
                var selectedStatus = this.value;
                var idTransaksi = <?php echo $transaksi['id_transaksi']; ?>;
                
                // Mengirim data status transaksi yang dipilih ke server menggunakan fetch API
                fetch('<?php echo site_url('transaksi/update_status'); ?>', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        id_transaksi: idTransaksi,
                        status_transaksi: selectedStatus
                    })
                })
                
            });
        </script>
       
        <div class="col-md-3">
            <h5>Penerima</h5>
            <p><?php echo $transaksi['nama_pelanggan'] ?></p>
            <p><?php echo $transaksi['wa_pelanggan'] ?></p>
            <p><?php echo $transaksi['alamat'] ?>
        </div>
      
    </div>

    
    <h5>Produk</h5>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th></th>
                <th>Produk</th>
                <th>Harga @</th>
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
            <tr>
                <td colspan="4">Total Harus Dibayar</td>
                <th><?php echo number_format($transaksi['total_transaksi']) ?></th>
            </tr>
        </tfoot>
    </table>
</div>