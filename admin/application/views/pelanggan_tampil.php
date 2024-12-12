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
  </style>
 </head>
 <body>
<div class="container">
        <h5>Daftar Pelanggan</h5>
        <table class="table table-bordered" id="tabelku">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal Daftar</th>
                    <th>Username</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Wa Pelanggan</th>
                    <th>Status Pelanggan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($pelanggan as $key => $value): ?>

                <tr>
                    <td><?php echo $key+1; ?></td>
                    <td><?php echo $value['tgl_daftar']; ?></td>
                    <td><?php echo $value['username_pelanggan']; ?></td>
                    <td><?php echo $value['nama_pelanggan']; ?></td>
                    <td><?php echo $value['alamat']; ?></td>
                    <td><?php echo $value['wa_pelanggan']; ?></td>
                    <td><?php echo $value['status_pelanggan']; ?></td>
                    <td>
                        <a href="<?php echo base_url("pelanggan/detail/".$value['id_pelanggan']) ?>" class="btn btn-info">Detail</a> | 
                        <a href="<?php echo base_url("pelanggan/hapus/".$value['id_pelanggan']) ?>" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
    </body>
</html>
