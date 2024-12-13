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
			font-weight: bold;
		}
		.text-section {
			padding-left: 150px; /* Atur nilai padding sesuai kebutuhan */
			padding-top: 100px; /* Tambahkan nilai padding atas sesuai kebutuhan */
			padding-bottom: 20px; /* Tambahkan padding bawah jika perlu */
		}

		.hero-section {
			position: relative;
			overflow: visible; /* Pastikan elemen di dalam tidak melampaui container */
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
			position: relative; /* Pastikan posisi relatif agar elemen ::after terhubung */
			width: 350px; /* Sesuaikan lebar section agar proporsional */
			height: 350px; /* Pastikan tingginya sama */
			margin: 0 auto; /* Pusatkan section */
			display: flex; /* Gunakan flexbox untuk memusatkan konten */
			justify-content: center;
			align-items: center;
			
		}

		.product-section::after {
			content: '';
			position: absolute;
			background-color: #F9DA73;
			top: 50%; /* Sesuaikan agar lebih proporsional */
			left: 50%;
			transform: translate(-50%, -50%);
			width: 300px; /* Sesuaikan ukuran */
			height: 300px;
			z-index: -1;
			border-radius: 50%;
		}

		.product-section img {
			width: 150px; /* Sesuaikan ukuran gambar */
			height: auto; /* Pertahankan proporsi gambar */
			position: relative; /* Pastikan gambar tetap dalam kontainer */
			z-index: 1; /* Letakkan gambar di atas lingkaran */
		}

		.product-section::after {
			content: '';
			position: absolute;
			background-color: #F9DA73; /* Warna lingkaran */
			top: 60%; /* Pusatkan secara vertikal */
			left: 50%; /* Pusatkan secara horizontal */
			transform: translate(-50%, -50%); /* Pusatkan sepenuhnya */
			width: 300px; /* Ukuran lingkaran */
			height: 300px; /* Ukuran lingkaran */
			border-radius: 50%; /* Buat lingkaran sempurna */
			z-index: 0; /* Letakkan di belakang gambar */
		}

	</style>

</head>
<body>
    <section class="hero-section">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-6 text-section">
                    <h5>SELAMAT DATANG DI DASHBOARD ADMIN</h5>
					<?php if (!$this->session->userdata("id_admin")): ?> 
                    <a href="<?php echo base_url("login")?>" class="btn">Login</a>
					<?php endif ?>
                </div>
                <div class="product-section">
					<img src="<?php echo $this->config->item('url_produk') . 'image2.png'; ?>">
				</div>
            </div>
        </div>
    </section>
</body>
</html>
