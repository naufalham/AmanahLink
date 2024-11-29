<div class="container">
    <h5>Produk Jual</h5>

    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Foto Produk</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($produk as $k => $v): ?>
            <tr>
                <td><?php echo $k+1 ?></td>
                <td>
                    <img src="<?php echo $this->config->item("url_produk").$v['foto_produk'] ?>" width="200">
                </td>
                <td><?php echo $v['nama_produk'] ?></td>
                <td><?php echo $v['harga_produk'] ?></td>
                <td><?php echo $v['deskripsi_produk'] ?></td>
                <td>
                    <a href="<?php echo base_url("produk/edit/".$v['id_produk']) ?>" class="btn btn-warning">Edit</a>
                    <a href="<?php echo base_url("produk/hapus/".$v['id_produk']) ?>" class="btn btn-danger">Hapus</a>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>

    <a href="<?php echo base_url("produk/tambah") ?>" class="btn btn-primary">Tambah</a>
</div>