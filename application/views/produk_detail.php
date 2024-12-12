<html>

  <style>
    body {
        text-align: center;
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
    }
    .product-grid {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 50px;
        margin: 50px;
        padding-top: 20px;
        max-width: 600px;
    }
    .product-item {
        background-color: #F9DA73;
        border-radius: 20px;
        padding: 20px 10px 10px;
        text-align: center;
        box-sizing: border-box;
        position: relative;
        z-index: 0;
        top: 110px;
    }
    .product-item img {
        position: relative;
        top: -50%;
        z-index: 1;
        width: 250px;
        height: auto;
    }
    .content {
        flex-grow: 1;
        margin-left: 100px;
        margin-top: 50px; 
    }
    .content h1 {
        color: #0E6635;
        font-size: 35px;
        font-weight: bold;
        margin-bottom: 10px;
        text-align: left;
    }
    .content p {
        color: #0E6635;
        font-size: 14px;
        margin-bottom: 20px;
        text-align: left;
        padding-right: 20px;
        max-width: 500px;
        margin-left: 0;
        margin-right: auto;
    }
    .content .price {
        color: #ECC400;
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 20px;
        text-align: left;
    }
    .currency {
        color: #0E6635;
        font-weight: bold;
        display: inline-block;
        text-align: left;
    }
    .content .buy-section {
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .buy-section {
        display: flex;
        align-items: center; /* Menyelaraskan elemen secara vertikal */
        border: 2px solid #ECC400; /* Warna kuning */
        border-radius: 5px; /* Membuat sudut membulat */
        padding: 5px; /* Ruang di dalam container */
        height: 50px; /* Menentukan tinggi yang seragam */
        max-width: 250px; /* Atur lebar maksimal */
    }
    .buy-section label {
        font-size: 16px;
        font-weight: bold;
        color: #0E6635;
    }
    .buy-section input {
        width: 40px;
        text-align: center;
        border: none;
        font-size: 16px;
        color: #0E6635;
    }
    .buy-section button {
        background-color: #ECC400;
        border: none;
        padding: 5px 10px; /* Tambahkan padding untuk tombol */
        border-radius: 5px;
        color: #0E6635;
        font-weight: bold;
        font-size: 16px;
        cursor: pointer;
        height: 139%; /* Pastikan tombol memiliki tinggi yang sama dengan buy-section */
    }
    .buy-section button[type="button"] {
        background-color: transparent;
        border: none;
        font-size: 20px;
        color: #0E6635;
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

<body>
    <div class="container">
        <div class="product-grid">
            <div class="product-item">
                <img src="<?php echo $this->config->item('url_produk').$produk['foto_produk']; ?>" />
            </div>
        </div>

        <div class="content">
            <h1>
                <?php echo $produk['nama_produk']; ?>
            </h1>
            <p>
                <?php echo $produk['deskripsi_produk']; ?>
            </p>

            <div class="price">
                <span class="currency">Rp.</span> <?php echo number_format($produk['harga_produk']); ?>
            </div>

            <?php if ($this->session->userdata('id_pelanggan')): ?>
                <form class="buy-section" method="post">
                    <input type="hidden" name="id_produk" value="<?php echo $produk['id_produk']; ?>" />
                    <label for="quantity">Kuantitas</label>
                    <button type="button" onclick="decreaseQuantity()">-</button>
                    <input id="quantity" min="1" type="number" name="jumlah" value="1" />
                    <button type="button" onclick="increaseQuantity()">+</button>
                    <button class="beli">Beli</button>
                </form>
            <?php endif; ?>
        </div>
    </div>

    <script>
        function increaseQuantity() {
            const quantityInput = document.getElementById('quantity');
            let currentValue = parseInt(quantityInput.value) || 1;
            quantityInput.value = currentValue + 1;
        }

        function decreaseQuantity() {
            const quantityInput = document.getElementById('quantity');
            let currentValue = parseInt(quantityInput.value) || 1;
            if (currentValue > 1) {
                quantityInput.value = currentValue - 1;
            }
        }
    </script>
</body>
</html>
