<div class="container">
        <h5>Data Pelanggan</h5>
        <table class="table table-bordered" id="tabelku">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal Daftar</th>
                    <th>Username</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Wa Pelanggan</th>
                    <th>Status Pelanggan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($pelanggan as $key => $value): ?>

                <tr>
                    <td><?php echo $key+1; ?></td>
                    <td><?php echo $value['tgl_daftar']; ?></td>
                    <td><?php echo $value['username_pelanggan']; ?></td>
                    <td><?php echo $value['nama_pelanggan']; ?></td>
                    <td><?php echo $value['alamat']; ?></td>
                    <td><?php echo $value['wa_pelanggan']; ?></td>
                    <td><?php echo $value['status_pelanggan']; ?></td>
                    <td>
                        <a href="<?php echo base_url("pelanggan/detail/".$value['id_pelanggan']) ?>" class="btn btn-info">Detail</a> | 
                        <a href="<?php echo base_url("pelanggan/hapus/".$value['id_pelanggan']) ?>" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
