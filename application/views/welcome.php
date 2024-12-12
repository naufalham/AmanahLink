<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Air Amanah</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>

		.judul_produk{
			font-size: 35px;
			margin-top: 45px;
			font-weight: bold;
			color: #0E6635;
			margin-bottom: 30px;
			position: relative;
			text-align: center;
		}

		.judul_produk::after{
			content: '';
			position: absolute;
			background-color: #F9DA73;
			top: 50%;
			left: 61%;
			transform: translateX(-50%);
			width: 80px;
			height: 23px;
			border-radius: 2px;
			z-index: -1;
		}
		.hero-section {
			position: relative;
			overflow: visible; /* Pastikan elemen di dalam tidak melampaui container */
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
			padding-left: 150px; /* Atur nilai padding sesuai kebutuhan */
			padding-top: 100px; /* Tambahkan nilai padding atas sesuai kebutuhan */
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

		.product-grid {
            display: grid; /* Gunakan grid layout */
            grid-template-columns: repeat(3, 1fr); /* Tampilkan 3 kolom */
            gap: 150px; /* Jarak antar produk */
            justify-items: center; /* Produk berada di tengah */
            justify-content: center; /* Pusatkan grid */
            padding: 80px;
        }
        .product-item {
            background-color: #F9DA73;
            border-radius: 20px; /* Membuat sudut membulat */
            padding: 20px 10px 10px; /* Memberikan ruang untuk teks */
            text-align: center;
            box-sizing: border-box; /* Memastikan padding tidak memengaruhi ukuran elemen */
            position: relative; /* Supaya teks dan gambar bisa diatur posisinya relatif terhadap container */
            
        }

        .product-item img {
            position: relative;
            top: -50%; /* Membuat gambar naik ke atas */
            z-index: 1; /* Agar gambar berada di atas elemen lain */
            width: 250px; /* Atur ukuran lebar gambar */
            height: auto; /* Agar proporsi gambar tetap terjaga */
        }


        .product-title {
            color: #0E6635; /* Warna hijau gelap */
            font-weight: bold; /* Teks tebal */
            font-size: 16px; /* Ukuran font disesuaikan */
            margin-top: -30%; /* Geser teks ke atas untuk proporsi */
            text-align: center; /* Rata tengah teks */
        }

        a {
            text-decoration: none; /* Menghilangkan garis bawah pada link */
        }
		
	</style>

</head>
<body>
    <section class="hero-section">
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
    </section>

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
			<h5 class="judul_produk">Produk Terfavorit</h5>
				<div class="product-grid">
					<?php foreach ($produk_terfavorit as $key => $value): ?>
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
