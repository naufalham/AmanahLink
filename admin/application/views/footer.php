<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer Section</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        /* Reset body margin dan padding */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh; /* Memastikan tinggi halaman 100% */
            border-radius: 20px;
        }
        .content {
            flex-grow: 1; /* Membuat konten mengambil ruang sebanyak mungkin */
        }
        .footer {
            background: linear-gradient(#F9DA73 0, 1%, #0E6635 99%, #0E6635 200%);
            color: white;
            text-align: center;
            padding: 20px 0;
            position: relative;
            border-radius: 80px 80px 0 0;
        }
        .footer-content {
            display: flex;
            justify-content: space-around;
            align-items: center;
            flex-wrap: wrap;
        }
        .footer-content div {
            margin: 10px;
        }
        .footer-content h3 {
            margin-bottom: 10px;
            margin-top: 40px;
            font-family: 'Kantumruy', sans-serif;
            font-size: 14px;
            font-weight: bold;
            text-align: left;
        }
        .footer-content p, .footer-content a {
            margin: 5px 0;
            color: white;
            text-decoration: none;
            font-family: 'Kantumruy', sans-serif;
            font-size: 14px;
            text-align: left;
        }
        .footer-content a:hover {
            text-decoration: underline;
        }
        .footer-content i {
            margin-right: 5px;
        }
        .footer-bottom {
            margin-top: 20px;
            margin-bottom: 20px;
        }
        @media (max-width: 600px) {
            .footer-content {
                flex-direction: column;
                text-align: left;
            }
        }
    </style>
</head>
<body>
    <div class="content">
        <!-- Konten halaman lain (form, produk, dll.) -->
    </div>

    <div class="footer">
        <div class="footer-content">
            <div>
                <h3>Alamat Kami</h3>
                <p><img src="<?php echo $this->config->item('url_logo') . 'lokasi.png'; ?>" alt="Logo" width="20" height="20">
                Sedan, Sariharjo, Ngaglik, Sleman, DIY 55581</p>
            </div>
            <div>
                <h3>Kontak kami</h3>
                <p><img src="<?php echo $this->config->item('url_logo') . 'telepon.png'; ?>" alt="Logo" width="20" height="20"> +62 89668369180</p>
                <p><img src="<?php echo $this->config->item('url_logo') . 'email.png'; ?>" alt="Logo" width="20" height="20"> anasarifin30@students.amikom.ac.id</p>
            </div>
        </div>
        <div class="footer-bottom">copyright &copy; 2024. Amanah Link</div>
    </div>
</body>
</html>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<?php if ($this->session->flashdata('pesan_sukses')): ?>
	<script>swal("Sukses!", "<?php echo $this->session->flashdata('pesan_sukses') ?>", "success");</script>
	<?php endif ?>

	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<?php if ($this->session->flashdata('pesan_gagal')): ?>
	<script>swal("Gagal!", "<?php echo $this->session->flashdata('pesan_gagal') ?>", "error");</script>
	<?php endif ?>

    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.bootstrap5.js"></script>
    <script>new DataTable("#tabelku")</script>