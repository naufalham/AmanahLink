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

    <style>
      /* Add box shadow to navbar */
      .navbar {
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Horizontal offset, vertical offset, blur radius, color */
      }
    </style>

  </head>
  <body>

<nav class="navbar bg-body-tertiary">
    <div class="container">
        <a class="navbar-brand" href="#">
        <img src="assets/logo/logo_nav.png" width="125" height="34">
        </a>


        <ul class="nav justify-content-center">
            <li class="nav-item">
                <a href="<?php echo base_url("beranda") ?>" class="nav-link link-success">Beranda</a>
            </li>
            <li class="nav-item">
                <a href="<?php echo base_url("produk") ?>" class="nav-link link-success">Produk</a>
            </li>
            <li class="nav-item">
                <a href="<?php echo base_url("transaksi") ?>" class="nav-link link-success">Transaksi</a>
            </li>
        </ul>



        <?php if ($this->session->userdata("id_pelanggan")): ?>
        <ul class="nav justify-content-end ">
            
            <li class="nav-item">
                <a class="navbar-brand" href="#">
                    <img src="assets/logo/keranjang.png" width="125" height="34">
                </a>
            </li>
            <li class="nav-item">
                <img src="assets/logo/_.png">
            </li>
            <li class="nav-item">
                <a href="<?php echo base_url("akun") ?>" class="nav-link link-success">
                    <?php  echo $this->session->userdata("nama_pelanggan") ?>
                </a>
            </li>
            <li class="nav-item">
                        <a href="<?php echo base_url("logout") ?>" class="nav-link">Logout</a>
            </li>
        </ul>
        <?php endif ?>

        <?php if (!$this->session->userdata("id_pelanggan")): ?>
            <ul class="nav justify-content-end align-items-center">
                
                    
                <div class="btn">
                    <a href="<?php echo base_url("login") ?>" class="btn btn-outline-success">Masuk</a>
                </div>
                <li class="nav-item">
                    <img src="assets/logo/_.png" width="3" height="25" top="34">
                </li>
                <div class="btn">
                    <a href="<?php echo base_url("register") ?>" class="btn btn-outline-success">Daftar</a>
                </div>
            </ul>
        <?php endif ?>


    </div>


</nav>
                        

                       
