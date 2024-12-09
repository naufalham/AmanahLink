<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pelanggan Air Amanah Anwani</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Kantumruy+Pro:wght@400;500;700&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Kantumruy Pro', sans-serif;
        }

        .navbar {
            font-family: 'Kantumruy Pro', sans-serif;
            background-color: #ffffff;
            border-bottom: 2px solid #DDDDDD;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2); /* Tambahkan bayangan */
        }
            
        .navbar-brand img {
            width: 150px; /* Sesuaikan ukuran logo */
            height: auto;
        }

        /* Add box shadow to navbar */
        .navbar {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Horizontal offset, vertical offset, blur radius, color */
        }
        .navbar-nav {
            flex-grow: 1;
            justify-content: center;
        }

        .navbar-nav .nav-link {
            font-family: 'Kantumruy Pro', sans-serif;
            font-weight: 500; /* Membuat teks bold */
            color: #0E6635;
            font-size: 20px;
            margin: 0 20px; /* Spasi antar menu */
        }

        .nav-link.link-success {
            color: #0E6635; /* Ubah warna jika diperlukan */
        }

        .navbar-nav .nav-link:hover {
            color: #004d00;
        }

        .navbar-nav.ms-auto .nav-link {
            margin: 0 10px;
        }

        .navbar-toggler {
            border: none;
        }

        .navbar-toggler-icon {
            background-color: #0E6635;
        }

        .nav-item span {
            border-left: 2px solid #F9C710;
            height: 20px;
            margin: 0 10px;
            display: inline-block;
        }     

    </style>
  </head>
  <body>
    <!-- Membuat Navbar -->
    <nav class="navbar navbar-expand-lg">
      <div class="container">
        <a class="navbar-brand" href="#">
          <img src="assets/logo/logo_nav.png" alt="Logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav me-auto">
            <li class="nav-item">
              <a href="<?php echo base_url('') ?>" class="nav-link">Beranda</a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('produk') ?>" class="nav-link">Produk</a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('transaksi') ?>" class="nav-link">Transaksi</a>
            </li>
          </ul>

          <?php if ($this->session->userdata("id_pelanggan")): ?> 
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link" href="#">
                <img src="assets/logo/keranjang.png" alt="Keranjang" width="25">
              </a>
            </li>
            <li class="nav-item" style="display: flex; align-items: center;">
                    <span style="border-left: 3px solid #F9C710; height: 20px;"></span>
            </li>
            <li class="nav-item">
                <a href="<?php echo base_url("akun") ?>" class="nav-link link-success">
                    <img src="assets/logo/profile.png" width="22">
                    <?php echo $this->session->userdata('nama_pelanggan') ?>
                </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url("logout") ?>" class="nav-link">Logout</a>
            </li>
        </ul>
        <?php endif ?>

          <?php if (!$this->session->userdata("id_pelanggan")): ?>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a href="<?php echo base_url('login') ?>" class="nav-link">Masuk</a>
                </li>
                <li class="nav-item" style="display: flex; align-items: center;">
                    <span style="border-left: 3px solid #F9C710; height: 20px;"></span>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url('register') ?>" class="nav-link">Daftar</a>
                </li>
            </ul>
        <?php endif; ?>
        </div>
      </div>
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
