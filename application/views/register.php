<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Pelanggan</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        .container {
            text-align: center;
            margin-top: 50px;
        }

        h5 {
            font-size: 28px;
            font-weight: bold;
            color: #2e7d32;
            margin-bottom: 30px;
            position: relative;
        }

        h5::after {
            content: '';
            position: absolute;
            background-color: #F9DA73;
            top: 50%;
            left: 53%;
            transform: translateX(-50%);
            width: 80px;
            height: 23px;
            border-radius: 2px;
            z-index: -1;
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

        label {
            font-size: 14px;
            font-weight: bold;
            color: #0e6635;
            margin-bottom: 5px;
            display: block;
        }

        .form-control {
            border-radius: 5px;
            border: 1px solid #F9DA73;
            padding: 10px;
            font-size: 14px;
            width: 100%;
        }

        .row {
            display: flex;
            gap: 20px;
            margin-bottom: 15px;
        }

        .col-half {
            flex: 1;
        }

        textarea.form-control {
            resize: none;
            height: 100px;
        }

        button.btn {
            background-color: #f9da73;
            border: none;
            color: #2e7d32;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            border-radius: 10px;
            cursor: pointer;
            width: 50%;
            margin-top: 10px;
			margin-left: auto;   /* Menambahkan margin kiri otomatis */
			margin-right: auto;  /* Menambahkan margin kanan otomatis */
			display: block;      /* Agar margin otomatis bekerja dengan benar */
        }

        button.btn:hover {
            background-color: #ffd54f;
            color: #2e7d32;
        }

        .text-muted {
            font-size: 12px;
            color: #6c757d;
        }

        /* Menambahkan bayangan pada placeholder */
        ::placeholder {
            color: #888;
            font-size: 14px;
            font-weight: normal;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
        }

        .product-section {
			position: absolute; /* Gambar tetap di pojok kanan */
			top: 40%;
			right: 70px; /* Geser gambar sedikit ke kiri dari tepi kanan */
			transform: translateY(-50%); /* Agar gambar vertikal sejajar dengan form */
			padding: 20px;
			text-align: center;	
		}


        .product-section img {
            width: 300px;
            height: auto;
        }

		.product-section::after {
			content: '';
			position: absolute;
			background-color: #F9DA73;
			top: 50%;
			left: 50%;
			transform: translate(-5%, -10%); /* Agar persegi panjang di tengah gambar */
			width: 250px; /* Lebar persegi panjang (sesuaikan dengan lebar gambar) */
			height: 450px; /* Tinggi persegi panjang */
			z-index: -1; /* Agar berada di belakang gambar */

		}

    </style>
</head>
<body>
    <div class="container">
        <h5>Daftar</h5>
        <form method="post" action="">
            <!-- Username dan Nama Lengkap -->
            <div class="row">
                <div class="col-half">
                    <label for="username_pelanggan">Username/Email</label>
                    <input type="text" id="username_pelanggan" name="username_pelanggan" class="form-control" placeholder="Masukkan Email" value="<?php echo set_value('username_pelanggan'); ?>">
                    <span class="text-muted"><?php echo form_error('username_pelanggan'); ?></span>
                </div>
                <div class="col-half">
                    <label for="nama_pelanggan">Nama Lengkap</label>
                    <input type="text" id="nama_pelanggan" name="nama_pelanggan" class="form-control" placeholder="Masukkan Nama Lengkap" value="<?php echo set_value('nama_pelanggan'); ?>">
                    <span class="text-muted"><?php echo form_error('nama_pelanggan'); ?></span>
                </div>
            </div>
            <!-- Password dan No HP -->
            <div class="row">
                <div class="col-half">
                    <label for="password_pelanggan">Password</label>
                    <input type="password" id="password_pelanggan" name="password_pelanggan" class="form-control" placeholder="Masukkan Password" value="<?php echo set_value('password_pelanggan'); ?>">
                    <span class="text-muted"><?php echo form_error('password_pelanggan'); ?></span>
                </div>
                <div class="col-half">
                    <label for="wa_pelanggan">No HP</label>
                    <input type="text" id="wa_pelanggan" name="wa_pelanggan" class="form-control" placeholder="Masukkan No HP" value="<?php echo set_value('wa_pelanggan'); ?>">
                    <span class="text-muted"><?php echo form_error('wa_pelanggan'); ?></span>
                </div>
            </div>
            <!-- Alamat -->
            <div class="mb-3">
                <label for="alamat">Alamat Lengkap</label>
                <textarea id="alamat" name="alamat" class="form-control" placeholder="Masukkan Alamat Lengkap"><?php echo set_value('alamat'); ?></textarea>
                <span class="text-muted"><?php echo form_error('alamat'); ?></span>
            </div>
            <!-- Tombol Daftar -->
            <button type="submit" class="btn btn-primary">Daftar</button>
        </form>
    </div>

    <!-- Bagian Produk Air Galon Amanah dengan gambar di pojok kanan -->
    <div class="product-section">
        <img alt="Refill Galon 19L" src="assets/produk/galon.png" />
    </div>

</body>
</html>
