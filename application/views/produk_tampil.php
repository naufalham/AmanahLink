<html>
 <head>
  <title>
   Katalog Produk
  </title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
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
            left: 59%;
            transform: translateX(-50%);
            width: 80px;
            height: 23px;
            border-radius: 2px;
            z-index: -1;
        }
        .highlight {
            position: relative;
            color: #0E6635;
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

        .div{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%)
        }

        .product-grid {
            /* display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            margin: 20px;
            padding-top:80px; */
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

        @media (max-width: 600px) {
            .product-item {
                width: 100%;
                margin: 10px 0;
            }
        }
  </style>
 </head>
 <body>
    <div class="container">
    <h5>Katalog produk</h5>
    <div class="product-grid">
        <?php foreach ($produk as $key => $value): ?>
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
    </div>
 </body>
</html>

