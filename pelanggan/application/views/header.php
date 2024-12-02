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

  </head>
  <body>
    <!-- Membuat Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
<<<<<<< HEAD
            <a href="" class="navbar-brand">Pelanggan</a>
            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#naff">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="naff">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a href="<?php echo base_url("")?>" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url("kategori")?>" class="nav-link">Kategori</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url("produk")?>" class="nav-link">Produk</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url("keranjang")?>" class="nav-link">Keranjang</a>
                    </li>
                    
                    
                </ul>

                <?php if ($this->session->userdata("id_pelanggan")): ?>
                    
                <ul class="navbar-nav ms-auto">
                     <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Seller
                          </a>
                          <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="<?php echo base_url("seller/produk") ?>">Produk Saya</a>
=======
            <a href="<?php echo base_url("home") ?>" class="navbar-brand">Admin</a>
                <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#naff">
                    <span class="navbar-toggler-icon"></span>
                </button>
                    <div class="collapse navbar-collapse" id="naff">
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item">
                                <a href="<?php echo base_url("pelanggan") ?>" class="nav-link">Pelanggan</a>
>>>>>>> 47ae692e09bffe81c3e9b00f6d6fcfbf8404545a
                            </li>
                            <li>
                                <a class="dropdown-item" href="<?php echo base_url("seller/transaksi") ?>">Penjualan Saya</a>
                            </li>
                            <li>
                                <a  class="dropdown-item" href="<?php echo base_url("transaksi")?>" >Pembelian Saya</a>
                            </li>
<<<<<<< HEAD
                          </ul>
                        </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url("akun") ?>" class="nav-link">
                            <?php  echo $this->session->userdata("nama_pelanggan") ?>
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
                            <a href="#" data-bs-toggle="modal" data-bs-t arget="#login" class="nav-link">Login</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url("register") ?>" class="nav-link">Register</a>
                        </li>
                    </ul>
                <?php endif ?>
            </div>
=======
                            <li class="nav-item">
                                <a href="<?php echo base_url("pelaporan") ?>" class="nav-link">Pelaporan</a>
                            </li>
                        </ul>
                        
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a href="<?php echo base_url("akun") ?>" class="nav-link">
                                    <?php echo $this->session->userdata("nama"); ?>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url("logout") ?>" class="nav-link">Logout</a>
                            </li>
                        </ul>
                    </div>
>>>>>>> 47ae692e09bffe81c3e9b00f6d6fcfbf8404545a
        </div>
    </nav>
