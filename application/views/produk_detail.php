<html>
 <head>
  <title>
   Air Amanah Refill 19 Liter
  </title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <style>
   body {
            font-family: 'Kantumruy pro', sans-serif;
            text-align: center;
            background-color: #ffffff;
            margin-top: 0;
            padding: 0;
        }
        .container {
            display: flex;
            align-items: center;
            padding: 20px;
            background-color: #ffffff;
            margin: 50;
            padding: 0;
            margin-top: 20px;
            margin-bottom: 20px;
        }
        .product-grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            margin: 20px;
            padding-top: 20px;
            max-width: 600px; /* Membatasi lebar maksimum */
            margin-left: auto;  /* Menjaga agar grid berada di tengah */
            margin-right: auto; /* Menjaga agar grid berada di tengah */
        }
        .product-item {
            background-color: #F9DA73;
            border-radius: 20px; /* Membuat sudut membulat */
            padding: 10px 5px 5px; /* Mengurangi padding agar produk lebih kecil */
            text-align: center;
            position: relative;
            width: 250px; /* Menentukan lebar kotak produk */
        }

        .product-item img {
            position: relative;
            top: -30%; /* Menyesuaikan posisi gambar */
            z-index: 1;
            width: 180px; /* Mengurangi ukuran gambar */
            height: auto; /* Menjaga rasio gambar tetap proporsional */
        }
        .content {
            flex-grow: 1;
            margin-left: 100px; /* Memberikan margin kiri agar elemen bergeser ke kanan */
            margin-top: 50px; 
        }
        .content h1 {
            color: #2e7d32;
            font-size: 30px;
            font-weight: bold;
            margin-bottom: 10px;
            text-align: left;
        }
        .content p {
            color: #2d572c;
            font-size: 14px;
            margin-bottom: 20px;
            text-align: left;
            padding-right: 20px; /* Memberikan padding tambahan di sisi kanan */
            max-width: 500px; /* Menentukan lebar maksimum agar teks tidak meluas */
            margin-left: 0; /* Menjaga agar teks sejajar dengan kiri */
            margin-right: auto; /* Menjaga agar teks sejajar dengan kanan */
        }
        .content .price {
            color: #f5d76e;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: left;
        }
        .currency {
            color: #2e7d32; /* Hijau */
            font-weight: bold;
            display: inline-block;
            text-align: left;
        }
        .content .buy-section {
            display: flex;
            align-items: center;
            gap: 10px; /* Jarak antar elemen */
        }
        .buy-section label {
            font-size: 14px; /* Ukuran teks label */
            margin-right: 10px; /* Jarak antara label dan input */
            color: #2e7d32; /* Warna teks */
            font-weight: bold; /* Membuat teks tebal */
        }
        .content .buy-section input {
            width: 60px; /* Lebar input */
            text-align: center;
            margin-right: -10px; /* Jarak antara input dan tombol */
            /* border: 1px solid #ddd; */
            /* border-color: #f5d76e; */
            padding: 5px;
            color: #2e7d32; 
            border: 2px solid #f5d76e;
        }
        .content .buy-section input:focus {
            border: 2px solid #f5d76e; /* Warna border tetap kuning saat fokus */
            outline: none; /* Menghapus outline default browser */
            background-color: #fffde7; /* Opsional: Ubah warna latar saat fokus */
        }
        .content .buy-section button {
            background-color: #f5d76e;
            border: none;
            padding: 6px 20px;
            /* border-radius: 5px; */
            color: #2d572c;
            font-weight: bold;
            cursor: pointer;
        }
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
                align-items: flex-start;
            }
            .image-container {
                margin-right: 0;
                margin-bottom: 20px;
            }
        }
  </style>
 </head>
 <body>
    <div class="container">
        <div class="product-grid">

            <div class="product-item">
                <img alt="Three large water bottles with Amanah label" height="300" src="https://storage.googleapis.com/a1aa/image/ijZaQkS4Sa5FNddXwfgQZvWccbDOQGaPaTJegKeflma2ZMeeE.jpg" width="300"/>
            </div>

        </div>

        <div class="content">
            <h1>
                Air Amanah Refill 19 Liter
            </h1>
            <p>
                Air Amanah galon 19 Liter sangat cocok untuk membantu mencukupi kebutuhan air minum harian kita di rumah, di kantor atau tempat - tempat di dalam ruangan lainnya. Air Amanah galon 19 Liter dikemas menggunakan galon kualitas terbaik (Galon Grade A+). Dengan kualitas dan kesegarannya, air amanah yang terbaik untuk kita konsumsi setiap hari.
            </p>
            <div class="price">
                <span class="currency">Rp.</span> 20.000
            </div>
            <div class="buy-section">
                <label for="quantity">Kuantitas</label>
                <input min="1" type="number" value="1"/>
                <button>
                    Beli
                </button>
            </div>
        </div>
    </div>
 </body>
</html>
