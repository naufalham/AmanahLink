

<div class="container">
    <div class="row mb-5">
        <div class="col-md-3">
            <h5>Transaksi</h5>
            <p>ID: <?php echo $transaksi['id_transaksi'] ?></p>
            <p><?php echo date('d M Y H:i', strtotime($transaksi['tgl_transaksi'])) ?></p>
            <span class="badge bg-primary"><?php echo $transaksi['status_transaksi'] ?></span>
        </div>
       
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
                <th>Produk</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($transaksi_detail as $k => $v): ?>
            <tr>
                <td><?php echo $v['nama_beli']; ?></td>
                <td><?php echo number_format($v['harga_beli']); ?></td>
                <td><?php echo number_format($v['jumlah_beli']); ?></td>
                <td><?php echo number_format($v['harga_beli'] * $v['jumlah_beli']); ?></td>
            </tr>
            <?php endforeach ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3">Total Belanja</td>
                <th><?php echo number_format($transaksi['belanja_transaksi']) ?></th>
            </tr>
            <tr>
                <td colspan="3">Ongkos Kirim</td>
                <th><?php echo number_format($transaksi['ongkir_transaksi']) ?></th>
            </tr>
            <tr>
                <td colspan="3">Total Harus Dibayar</td>
                <th><?php echo number_format($transaksi['total_transaksi']) ?></th>
            </tr>
        </tfoot>
    </table>
</div>