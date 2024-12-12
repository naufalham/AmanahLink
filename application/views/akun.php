<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Profil</title>
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
			left: 56%;
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

        .row {
            display: flex;
            gap: 20px;
            margin-bottom: 15px;
        }

        .col-half {
            flex: 1;
        }

        label {
            font-size: 14px;
            font-weight: bold;
            color: #0E6635;
            display: block;
            margin-bottom: 5px;
        }

        .form-control {
            background-color: #F9F9F9;
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

        button.btn {
            background-color: #F9DA73;
            border: none;
            color: #0E6635;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            border-radius: 10px;
            cursor: pointer;
            width: 100%;
            margin-top: 20px;
        }

		span.text-muted {
			color:rgb(155, 0, 0); 
			font-size: 12px; 
			margin-top: 5px;
		}

        .product-section {
            position: absolute;
            top: 40%;
            right: 70px;
            transform: translateY(-50%);
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
            transform: translate(-50%, -10%);
            width: 250px;
            height: 450px;
            z-index: -1;
            border-radius: 30px;
        }

        button.btn:hover {
            background-color: #0E6635;
            color: #F9DA73;
        }

        @media (max-width: 768px) {
            .row {
                flex-direction: column;
                gap: 10px;
            }

            button.btn {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h5>Data Profil</h5>
        <form method="post">
            <div class="row">
                <div class="col-half">
                    <label for="username_pelanggan">Username/Email</label>
                    <input type="text" id="username_pelanggan" name="username_pelanggan" class="form-control" value="<?php echo set_value('username_pelanggan', $this->session->userdata('username_pelanggan')); ?>">
                    <span class="text-muted"><?php echo form_error("username_pelanggan") ?></span>
                </div>
                <div class="col-half">
                    <label for="nama_pelanggan">Nama Lengkap</label>
                    <input type="text" id="nama_pelanggan" name="nama_pelanggan" class="form-control" value="<?php echo set_value('nama_pelanggan', $this->session->userdata('nama_pelanggan')); ?>">
                    <span class="text-muted"><?php echo form_error("nama_pelanggan") ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col-half">
                    <label for="password_pelanggan">Password</label>
                    <input type="password" id="password_pelanggan" name="password_pelanggan" class="form-control">
                    <span class="text-muted">Kosongkan jika password tidak diubah</span>
                </div>
                <div class="col-half">
                    <label for="wa_pelanggan">No HP</label>
                    <input type="text" id="wa_pelanggan" name="wa_pelanggan" class="form-control" value="<?php echo set_value('wa_pelanggan', $this->session->userdata('wa_pelanggan')); ?>">
                    <span class="text-muted"><?php echo form_error("wa_pelanggan") ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col-half" style="flex: 1 1 100%;">
                    <label for="alamat">Alamat Lengkap</label>
                    <input type="text" id="alamat" name="alamat" class="form-control" value="<?php echo set_value('alamat', $this->session->userdata('alamat')); ?>">
                    <span class="text-muted"><?php echo form_error("alamat") ?></span>
                </div>
            </div>
            <button type="submit" class="btn">Simpan</button>
            <button type="submit" class="btn"><a href="<?php echo base_url("logout") ?>" class="nav-link">Logout</a></button>
            
        </form>
        
    <div class="product-section">
        <!-- <img alt="Refill Galon 19L" src="assets/produk/galon.png" /> -->
    </div>
    </div>
</body>
</html>
