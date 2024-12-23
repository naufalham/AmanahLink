<html>
 <head>
  <title>
   Katalog Produk
  </title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <style>
.container {
    text-align: center;
    max-width: 60%; 
    padding: 0 20px;
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
    max-width: 100%;
    margin: 0 auto;
    border-collapse: collapse;
    text-align: left;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.table thead tr {
    border-bottom: 3px solid #0E6635;
}

.table th {
    padding: 15px;
    font-size: 18px;
    color: #0E6635;
    text-align: center;
    font-weight: bold;
    background-color: transparent;
}

.table td {
    padding: 15px;
    text-align: center;
    color: #0E6635;
    font-size: 16px;
    background-color: transparent;
    border-bottom: 1px solid #ddd;
}

.table tr:last-child td {
    border-bottom: none;
}

.table td .btn {
    text-decoration: none;
    color: #0E6635;
    padding: 7px 13px;
    font-size: 14px;
    font-weight: bold;
}

.table td .btn:hover {
    color: #F9DA73;
}

/* Kolom aksi */
.table td:last-child {
    width: 150px; 
}

.table td .btn {
    margin-right: 5px;
}

/* Status */
.status {
    display: inline-block;
    padding: 7px 13px;
    border-radius: 5px;
    color: white;
    font-size: 14px;
    font-weight: bold;
    text-align: center;
}

.status.nonmember {
    background-color: #0E6635;
}

.status.member {
    background-color:#0e2a66;
}

@media (max-width: 768px) {
    .table th, .table td {
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
 <body>
<div class="container">
        <h5>Daftar Pelanggan</h5>
        <?php if (empty($pelanggan)): ?>
        <div class="alert alert-warning" role="alert">
            Tidak Ada Daftar Pelanggan.
        </div>
        <?php else: ?>
        <table class="table" id="tabelku">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal Daftar</th>
                    <th>Username</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Wa Pelanggan</th>
                    <th>Status Pelanggan</th>
                    <th></th>
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
                    <td>
                        <span class="status <?php echo strtolower($value['status_pelanggan']); ?>">
                            <?php echo $value['status_pelanggan']; ?>
                        </span>
                    </td>
                    <td>
                    <a href="<?php echo base_url("pelanggan/detail/".$value['id_pelanggan']) ?>" class="btn">
                        <i class="fas fa-eye"></i>
                    </a> | 
                    <a href="<?php echo base_url("pelanggan/hapus/".$value['id_pelanggan']) ?>" class="btn">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        <?php endif; ?>
    </div>
    </body>
</html>
