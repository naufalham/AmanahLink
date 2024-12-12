<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Air Amanah</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>

		.hero-section {
			background-color: #ffffff;
			padding: 50px;
			position: relative;
		}

		.text-section h1 {
			font-size: 50px;
			font-weight: bold;
			color: #0E6635;
		}

		.text-section h5 {
			font-size: 25px;
			color: #0E6635;
			margin: 20px 0;
			font-weight: bold;
		}
		.text-section {
			padding-left: 120px; /* Atur nilai padding sesuai kebutuhan */
			padding-top: 70px; /* Tambahkan nilai padding atas sesuai kebutuhan */
		}

		.text-info {
			padding-left: 120px; /* Atur nilai padding sesuai kebutuhan */
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
			left: 420px; /* Ubah dari right ke left */
			transform: translateY(-50%);
			padding: 20px;
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
			transform: translate(-5%, -70%);
			width: 350px;
			height: 350px;
			z-index: -1;
			border-radius: 500px;
		}

		.product-info {
			background-color: #0E6635;
			padding: 50px 20px;
			color: white;
			margin-top: 80px; /* Tambahkan jarak ke atas */
			border-radius: 60px;
		}

		.row.align-items-center {
			display: flex;
			justify-content: flex-start;
		}
		.text-info {
			flex: 1;
			padding-left: 5px; /* Sesuaikan jika perlu */
			font-size: 18px;
			font-weight: bold;
		}

		.info-image {
			max-width: 100%;
			height: auto;
			border-radius: 15px;
		}

		@media (max-width: 768px) {
			.text-section, .image-section {
				text-align: center;
			}

			.text-section h1, .text-section h2 {
				font-size: 1.8rem;
			}

			.product-info {
				border-radius: 0;
			}
		}

	</style>

</head>
<body>
    <header class="hero-section">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-6 text-section">
                    <h5>Air Amanah terjaga Kualitasnya!</h5>
                    <h1>PESAN SEKARANG SEBELUM KEHABISAN!!</h1>

						<a href="<?php echo base_url("produk")?>" class="btn">Pesan Disini</a>

                </div>
                <div class="product-section">
					<img alt="Refill Galon 19L" src="assets/produk/image2.png" />
				</div>
            </div>
        </div>
    </header>

    <section class="product-info">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
				<img alt="Refill Galon 19L" src="assets/produk/image2.png" />
                </div>
                <div class="col-md-6 text-info">
                    <p style="color: white">
                        Air Amanah terjaga kualitas dan kesegarannya sebagai air minum dalam kemasan pertama di Indonesia 
                        yang memiliki kandungan pH air bersifat basa dengan kadar pH 8+ dan Total Dissolved Solids (TDS) < 10 ppm. 
                        Air Amanah diproses melalui proses integrasi tiga teknologi terkini: Ultrafiltration Technology, 
                        Non-mineral Technology dan Alkaline Water Technology, sehingga memiliki kualitas air minum terbaik untuk 
                        membantu hidrasi dan metabolisme tubuh kita.
                    </p>
                </div>
            </div>
        </div>
    </section>
	<section>
		<div class="container">
			<h5>Produk Terfavorit</h5>
				<div class="product-grid">
					<?php foreach ($pfavorit as $key => $value): ?>
					<div class="product-item">
						<img src="<?php echo $this->config->item("url_produk").$value["foto_produk"] ?>">            
						<div class="product-title">
							<a href="<?php echo base_url("produk/detail/".$value["id_produk"]) ?>">
								<div class="product-title"><?php echo $value['nama_produk'] ?></div>
							</a>
						</div>
					</div>
					<?php endforeach ?>
		</div>
	</section>
</body>
</html>
