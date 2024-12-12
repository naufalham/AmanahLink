<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk Tampil Pelanggan</title>
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
        
        .table {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            border-collapse: collapse;
            text-align: left;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        /* Header Tabel */
        .table thead tr {
            border-bottom: 3px solid #0E6635; /* Garis hijau di bawah header */
        }

        .table th {
            padding: 15px;
            font-size: 18px;
            color: #0E6635;
            text-align: center;
            font-weight: bold;
            background-color: transparent; /* Tidak ada warna background */
        }

        /* Isi Tabel */
        .table td {
            padding: 15px;
            text-align: center;
            color: #0E6635;
            font-size: 16px;
            background-color: transparent; /* Tidak ada warna background */
            border-bottom: 1px solid #ddd; /* Garis bawah antar baris */
        }

        .table tr:last-child td {
            border-bottom: none; /* Menghapus garis bawah di baris terakhir */
        }

        /* Kolom aksi */
        .table td:last-child {
            width: 150px; 
        }

        .table td .btn {
            margin-right: 5px;
        }

        .btn {
            text-decoration: none;
            color: #0E6635;
            padding: 7px 13px;
            font-size: 14px;
            font-weight: bold;
        }

        .btn:hover {
            color: #F9DA73;
        }
        .btn.tambah {
            display: inline-block;
            margin-top: 20px;
            width: 400px; /* Lebar tombol diperbesar */
            margin-bottom: 50px; /* Memberikan jarak dengan footer */
        }


        @media (max-width: 768px) {
            .table th,
            .table td {
                font-size: 12px;
                padding: 10px;
            }

            .btn {
                font-size: 14px;
                padding: 7px 13px;
            }
        }
</style>


</head>
<div class="container">
    <h5>Daftar Produk</h5>

    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Foto Produk</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Deskripsi</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($produk as $k => $v): ?>
            <tr>
                <td><?php echo $k+1 ?></td>
                <td>
                    <img src="<?php echo $this->config->item("url_produk").$v['foto_produk'] ?>" width="200">
                </td>
                <td><?php echo $v['nama_produk'] ?></td>
                <td><?php echo $v['harga_produk'] ?></td>
                <td><?php echo $v['deskripsi_produk'] ?></td>
                <td>
                <a href="<?php echo base_url("produk/edit/".$v['id_produk']) ?>" class="btn">
                    <i class="fas fa-edit"></i>
                </a> |
                <a href="<?php echo base_url("produk/hapus/".$v['id_produk']) ?>" class="btn">
                    <i class="fas fa-trash-alt"></i>
                </a>                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>

    <a href="<?php echo base_url("produk/tambah") ?>" class="btn tambah">Tambah</a>
</div>
</body>
</html>