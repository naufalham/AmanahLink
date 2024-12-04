<html>
 <head>
  <title>
   Katalog Produk
  </title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <style>
   body {
            font-family: 'Kantumruy pro', sans-serif;
            text-align: center;
            background-color: #ffffff;
            margin: 0;
            padding: 0;
        }
        h1 {
            color: #2e7d32;
            margin-top: 20px;
            font-size: 30px;
            font-weight: bold;
        }
        .highlight {
            position: relative;
            color: #2e7d32;
            font-weight: bold;
            display: inline-block;
        }

        .highlight::before {
            content: '';
            position: absolute;
            background-color: #F9DA73;
            top: 85%; /* Posisi di bawah teks */
            left: 50px; /* Mulai sedikit sebelum teks */
            width: 80%; /* Memanjang melewati teks */
            height: 70%; /* Tinggi persegi panjang mencakup sebagian teks */
            z-index: -1; /* Letakkan di belakang teks */
            transform: translateY(-50%);
        }

        .product-grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            margin: 20px;
            padding-top:80px;
        }
        .product-item {
            background-color: #F9DA73;
            border-radius: 20px; /* Membuat sudut membulat */
            padding: 20px 10px 10px; /* Memberikan ruang untuk teks */
            text-align: center;
            position: relative; /* Supaya teks dan gambar bisa diatur posisinya relatif terhadap container */
        }

        .product-item img {
            position: relative;
            top: -50%; /* Membuat gambar naik ke atas */
            z-index: 1; /* Agar gambar berada di atas elemen lain */
        }

        .product-title {
            color: #0E6635; /* Warna hijau gelap */
            font-weight: bold; /* Teks tebal */
            font-size: 16px; /* Ukuran font disesuaikan */
            margin-top: -30%; /* Geser teks ke atas untuk proporsi */
        }

        @media (max-width: 600px) {
            .product-item {
                width: 100%;
                margin: 10px 0;
            }
        }
  </style>
 </head>
 <body>
     <h1>
         Katalog
         <span class="highlight">
            Produk
        </span>
    </h1>
    <div class="product-grid">

        <?php foreach ($produk as $key => $value): ?>
        <div class="product-item">
            <img alt="Refill Galon 19L" height="200" src="<?php echo $this->config->item("url_produk").$value['foto_produk']?>" width="200"/>
            <div class="product-title">
                <a href="<?php echo base_url("produk/detail/".$value["id_produk"]) ?>">
                    <button class><?php echo $value['nama_produk'] ?></button>
                </a>
            </div>
        </div>
        <?php endforeach ?>

    </div>
 </body>
</html>
