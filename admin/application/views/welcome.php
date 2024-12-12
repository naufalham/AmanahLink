<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Air Amanah</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>

		.text-section h5 {
			font-size: 48px;
			color: #0E6635;
			margin: 20px 0;
			font-weight: bold;
		}
		.text-section {
			padding-left: 150px; /* Atur nilai padding sesuai kebutuhan */
			padding-top: 170px; /* Tambahkan nilai padding atas sesuai kebutuhan */
		}

        .text-section .btn {
			background-color: #f9da73;
			color: #0E6635;
			font-weight: bold;
			border: none;
			padding: 10px 30px;
			border-radius: 50px;
		}

		.text-section .btn:hover {
			background-color: #0E6635;
			color: #f9da73;
		}

		.product-section {
			position: absolute;
			top: 55%;
			transform: translateY(-50%);
			text-align: center;
		}

		.product-section img {
			width: 200px;
			height: auto;
		}

		.product-section::after {
			content: '';
			position: absolute;
			background-color: #F9DA73;
			top: 78%; /* Ubah nilai ini untuk menyesuaikan */
			left: 800px;
			transform: translate(-5%, -100%);
			width: 350px;
			height: 350px;
			z-index: -1;
			border-radius: 500px;
		}

	</style>

</head>
<body>
    <section class="hero-section">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-6 text-section">
                    <h5>SELAMAT DATANG DI DASHBOARD ADMIN</h5>
                    <a href="<?php echo base_url("login")?>" class="btn">Login</a>
                </div>
                <div class="product-section">
					<img src="<?php echo $this->config->item('url_produk') . 'image2.png'; ?>">
				</div>
            </div>
        </div>
    </section>
</body>
</html>
