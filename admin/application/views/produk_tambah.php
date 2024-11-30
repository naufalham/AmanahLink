<div class="container">
    <h5>Tambah Produk</h5>

    <form method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label>Foto Produk</label>
            <input type="file" name="foto_produk" class="form-control">
        </div>
        <div class="mb-3">
            <label>Nama Produk</label>
            <input type="text" name="nama_produk" class="form-control">
        </div>
        <div class="mb-3">
            <label>Harga</label>
            <input type="number" name="harga_produk" class="form-control">
        </div>
        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi_produk" class="form-control"></textarea>
        </div>
        <button class="btn btn-primary">Simpan</button>
    </form>
</div>