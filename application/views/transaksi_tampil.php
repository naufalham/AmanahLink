<div class="container">
        <h5>Daftar Transaksi</h5>
        <table class="table table-bordered" id="tabelku">
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

                <?php foreach ($transaksi as $k => $v): ?>

                <tr>
                    <td><?php echo $k+1; ?></td>
                    <td><?php echo $v['tgl_transaksi']; ?></td>
                    <td><?php echo $v['total_transaksi']; ?></td>
                    <td><?php echo $v['status_transaksi']; ?></td>
                    <td>
                        <a href="<?php echo base_url("transaksi/detail/" .$v["id_transaksi"]) ?>" class="btn btn-info">Detail</a>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>