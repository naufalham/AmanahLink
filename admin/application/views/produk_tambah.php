<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>
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
            left: 57%;
            transform: translateX(-50%);
            width: 80px;
            height: 23px;
            border-radius: 2px;
            z-index: -1;
        }

        label {
            font-size: 14px;
            font-weight: bold;
            color: #0E6635;
            display: block;
            margin-bottom: 5px;
            text-align: left;
        }

        form {
            background-color: #ffffff;
            padding: 20px 40px;
            border-radius: 10px;
            text-align: left;
            max-width: 750px;
            margin: 0 auto;
            box-sizing: border-box;
        }

        .form-control {
            background-color: #ffffff;
            border-radius: 5px;
            border: 1px solid #F9DA73;
            padding: 10px;
            font-size: 14px;
            width: 100%;
        }

        textarea.form-control {
            resize: none;
            height: 100px;
        }

        .row {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
        }

        .col-half {
            flex: 1;
        }

        /* Flexbox untuk Nama Produk dan Harga Produk */
        .input-group {
            display: flex;
            gap: 20px; /* Menambahkan jarak antar elemen */
            margin-bottom: 20px;
        }

        .input-group .form-control {
            width: 100%; /* Membuat masing-masing input setengah lebar */
        }

        .btn-group {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
        }

        button.btn-simpan {
            background-color: #F9DA73;
            border: none;
            color: #0E6635;
            padding: 13px 20px;
            font-size: 16px;
            font-weight: bold;
            border-radius: 10px; /* Border-radius penuh */
            cursor: pointer;
            width: 330px;
        }

        button.btn-simpan:hover {
            background-color: #0E6635;
            color: #F9DA73;
        }


        /* Upload File Style */
        .upload-container {
            position: relative;
            display: flex;
            align-items: center;
            width: 100%;
        }

        .upload-container input[type="file"] {
            display: none; /* Sembunyikan input file asli */
        }

        .file-info {
            background-color: #ffffff;
            border-radius: 5px;
            border: 1px solid #F9DA73;
            padding: 10px;
            font-size: 14px;
            width: 45%; /* Lebar 80% agar pas dengan tombol */
            text-align: center;
            color: #000000;
            margin-right: -2px; /* Jarak sedikit dari tombol */
        }

        .upload-btn {
            background-color: #F9DA73;
            color: #0E6635;
            font-weight: bold;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
        }

        .upload-btn:hover {
            background-color: #0E6635;
            color: #F9DA73;
        }

        span.text-muted {
			color: #0E6635; 
			font-size: 12px; 
			margin-top: 5px;
		}
    </style>
</head>
<body>
<div class="container">
    <h5>Tambah Produk</h5>
    
    <form method="post" enctype="multipart/form-data">
        <!-- Nama dan Harga Produk dalam satu baris -->
        <div class="input-group">
            <div class="col-half">
                <label>Nama Produk</label>
                <input type="text" name="nama_produk" class="form-control" placeholder="Masukkan nama produk">
                <span class="text-muted"><?php echo form_error("nama_produk") ?></span>
            </div>

            <div class="col-half">
                <label>Harga</label>
                <input type="number" name="harga_produk" class="form-control" placeholder="Masukkan harga produk">
                <span class="text-muted"><?php echo form_error("harga_produk") ?></span>
            </div>
        </div>

        <!-- Foto Produk -->
        <div class="mb-3">
            <label>Foto Produk</label>
            <div class="upload-container">
                <input type="text" class="form-control file-info" value="format jpg/png" disabled>
                <label for="foto_produk" class="upload-btn">Upload Foto</label>
                <input type="file" name="foto_produk" id="foto_produk" class="file-input" onchange="updateFileName()">
            </div>
            <span class="text-muted"><?php echo form_error("foto_produk") ?></span>
        </div>

        <!-- Deskripsi Produk -->
        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi_produk" class="form-control" placeholder="Masukkan deskripsi produk"></textarea>
            <span class="text-muted"><?php echo form_error("deskripsi_produk") ?></span>
        </div>

        <!-- Tombol Simpan -->
        <div class="btn-group">
            <button type="submit" class="btn-simpan">Simpan</button>
        </div>
    </form>
</div>
</body>
</html>
