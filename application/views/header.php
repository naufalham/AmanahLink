<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Marketplace</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.bootstrap5.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-3">
        <div class="container">
            <a href="<?php echo base_url("home") ?>" class="navbar-brand">Admin</a>
                <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#naff">
                    <span class="navbar-toggler-icon"></span>
                </button>
                    <div class="collapse navbar-collapse" id="naff">
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item">
                                <a href="<?php echo base_url("pelanggan") ?>" class="nav-link">Pelanggan</a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url("produk") ?>" class="nav-link">Produk</a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url("transaksi") ?>" class="nav-link">Transaksi</a>
                            </li>
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
        </div>
    </nav>
