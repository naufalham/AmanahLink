<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Pelanggan</title>
    <style>
        body {
            font-family: 'Kantumruy Pro', sans-serif;
            background-color: #f5f5f5;
        }

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
            border-bottom: 1px solid #ddd; /* Garis bawah antar baris */
        }

        .table tr:last-child td {
            border-bottom: none; /* Menghapus garis bawah di baris terakhir */
        }

        .btn {
            text-decoration: none;
            background-color: #F9DA73;
            color: #0E6635;
            padding: 7px 13px;
            font-size: 14px;
            font-weight: bold;
        }

        .btn:hover {
            background-color: #0E6635;
            color: #F9DA73;
        }

        .status {
            display: inline-block;
            padding: 7px 13px;
            border-radius: 5px;
            color: white;
            font-size: 14px;
            font-weight: bold;
            text-align: center;
        }

        .status.diproses {
            background-color: #0E6635;
        }

        .status.selesai {
            background-color: #0056b3;
        }

        .status.dibatalkan {
            background-color: #B30000;
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
        <h5>Daftar Transaksi</h5>
        <table class="table" id="tabelku">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($transaksi as $k => $v): ?>

                <tr>
                    <td><?php echo $k+1; ?></td>
                    <td><?php echo $v['tgl_transaksi']; ?></td>
                    <td><?php echo number_format($v['total_transaksi']) ?></td>
                    <td>
                        <span class="status <?php echo strtolower($v['status_transaksi']); ?>">
                            <?php echo $v['status_transaksi']; ?>
                        </span>
                    </td>
                    <td>
                        <a href="<?php echo base_url("transaksi/detail/" .$v["id_transaksi"]) ?>" class="btn">Detail</a>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
    </body>
</html>