<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk Pelanggan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
	<style>
		body, html {
			margin: 0;
			padding: 0;
			font-family: Arial, sans-serif;
		}

		body {
			font-family: 'Kantumruy Pro', sans-serif;
            background-color: #f5f5f5;
		}

		.container {
			text-align: center;
		}

		h5 {
			font-size: 35px;
            margin-top: 45px;
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
			left: 55%;
			transform: translateX(-50%);
			width: 80px;
			height: 23px;
			border-radius: 2px;
			z-index: -1;
		}

		form {
			background-color: #F9F9F9;
			padding: 20px 40px;
			border-radius: 10px;
			text-align: left;
			max-width: 550px;
			margin: 0 auto;
			box-sizing: border-box;
		}

		form .mb-3 {
			margin-bottom: 20px;
			text-align: left;
		}

		form label {
			font-size: 14px;
			font-weight: bold;
			color: #0e6635;
			margin-bottom: 5px;
			display: block;
		}

		form input[type="text"],
		form input[type="password"] {
			width: 100%;
			padding: 10px;
			margin-top: 5px;
			border: 1px solid #F9DA73;
			border-radius: 5px;
		}

		form input::placeholder {
			color: #888;
			font-size: 14px;
			font-weight: normal;
		}

		.btn {
			background-color: #f9da73;
			border: none;
			color: #2e7d32;
			padding: 10px 20px;
			font-size: 16px;
			font-weight: bold;
			border-radius: 10px;
			cursor: pointer;
			width: 65%;
			margin-top: 20px;
			margin-left: auto;
			margin-right: auto;
        	display: block;
		}

		.btn:hover {
			background-color: #0E6635;
     		color: #f9da73;
		}

		span.text-muted {
			color: #0E6635; 
			font-size: 12px; 
			margin-top: 5px;
		}

		.product-section {
			position: absolute;
			top: 40%;
			left: 70px; /* Ubah dari right ke left */
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
			left: -57px;
			transform: translate(-5%, -10%);
			width: 250px;
			height: 450px;
			z-index: -1;
		}

	</style>
</head>

<body class="bg-light">
<div class="container">
	<div class="row">
		<div class="col-md-8 offset-md-2">
			<h5>Masuk</h5>
			<form method="post" action="">
				<div class="mb-3">
					<label>Username/Email</label>
					<input type="text" name="username_pelanggan" class="form-control" placeholder="Masukkan email" value="<?php echo set_value('username_pelanggan') ?>">
					<span class="text-muted"><?php echo form_error("username_pelanggan") ?></span>
				</div>
				<div class="mb-3">
					<label>Password</label>
					<input type="password" name="password_pelanggan" class="form-control" placeholder="Masukkan password" value="<?php echo set_value("password_pelanggan") ?>">
					<span class="text-muted"><?php echo form_error("password_pelanggan") ?></span>
				</div>
				<button class="btn">Kirim</button>
			</form>
		</div>
	</div>
</div>

<!-- Bagian Produk Air Galon Amanah dengan gambar di pojok kanan -->
    <div class="product-section">
        <img alt="Refill Galon 19L" src="assets/produk/galon.png" />
    </div>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<?php if ($this->session->flashdata('pesan_sukses')): ?>
	<script>swal("Sukses!", "<?php echo $this->session->flashdata('pesan_sukses') ?>", "success");</script>
	<?php endif ?>

	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<?php if ($this->session->flashdata('pesan_gagal')): ?>
	<script>swal("Gagal!", "<?php echo $this->session->flashdata('pesan_gagal') ?>", "error");</script>
	<?php endif ?>
    
</body>
</html>
