<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampil Pembelian</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/stylesheet_tampil.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>
<body>
<?php
include "navbar.php";
?>
<br></br>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="mt-2 mb-3 text-center">Data Pembelian<h3>
                    <form action="tampil_pembelian.php" method="post">
                        <input type="text" name="cari" class="form-control mb-3" placeholder="Masukkan keyword pencarian">
                    </form>
        </div>
        <div class='card-body'>
            <table class="table table-bordered fs-5 fw-light text-center">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nama Pelanggan</th>
                    <th scope="col">Detail Produk</th>
                    <th scope="col">Tanggal Beli</th>
                    <th scope="col">Tanggal Datang</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Total Bayar</th>
                    <th scope="col" width="100px">Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php
                include "koneksi.php";
                global $koneksi;
                if (isset($_POST["cari"])) {
                    // jika ada keyword pencarian
                    $cari=$_POST['cari'];
                    $query_transaksi= mysqli_query($koneksi,"SELECT * from transaksi where id_transaksi like '%$cari%' or id_pelanggan like '%$cari%' or tanggal_transaksi like '%$cari%'");
                }else{
                    //jika tidak ada keyword pencarian
                    $query_transaksi= mysqli_query($koneksi,"SELECT * from transaksi join pelanggan on pelanggan.id_pelanggan= transaksi. id_pelanggan join detail_transaksi on detail_transaksi. id_transaksi=transaksi.id_transaksi join produk on produk. id_produk= detail_transaksi.id_produk  group by nama ORDER BY id_detail_transaksi DESC ") or die (mysqli_error($koneksi));
                }
                    $no=0;
                    while($data_transaksi=mysqli_fetch_array($query_transaksi)){
                        $no++;
                        $query_detail = mysqli_query($koneksi, "SELECT * FROM detail_transaksi d JOIN produk p ON p.id_produk = d.id_produk WHERE id_transaksi = '".$data_transaksi['id_transaksi']."' group by nama_produk");
                    ?>
                    <tr>
                        <td><?=$no?></td>
                        <td><?php echo $data_transaksi['nama']; ?></td>
                        <td>
                            <?php
                            while($data_detail = mysqli_fetch_array($query_detail)){
                            ?>
                                <img src="../admin/foto/<?=$data_detail['foto_produk']?>" class="img-fluid rounded-start" width="150px" height="150px" alt="..." >
                                <p><?=$data_detail['nama_produk']?></p>
                            <?php
                            }
                            ?>
                            </td>
                        <td><?php echo $data_transaksi["tgl_transaksi"]; ?></td>
                        <td><?php echo $data_transaksi["tgl_datang"]; ?></td>
                        <td><?= $data_transaksi["alamat"]; ?></td>
                        <td>
                        <?php
                            include "koneksi.php";
                            $query_bayar = mysqli_query($koneksi, "SELECT SUM(subtotal) AS total FROM detail_transaksi
                            WHERE id_transaksi = '" . $data_transaksi['id_transaksi'] . "'");
                            $data_bayar = mysqli_fetch_array($query_bayar);
                            echo "<label class='alert alert-secondary'> ".$data_bayar['total'].".00</label>";
                            ?>
                        </td>
                        <td><a href="hapus_penjualan.php?id_transaksi=<?=$data_transaksi ['id_transaksi']?>" onclick="return confirm('Are you sure want to delete this order?')"><i class="fa-solid fa-trash text-red"></i></a> </td>      
                        <?php
                          if ($data_transaksi['status'] == "New"):
                              ?>
                                <td><a href="acc.php?id_transaksi=<?=$data_transaksi ['id_transaksi']?>" class="btn btn-outline-danger">
                                    <?= $data_transaksi['status'] ?></a>
                                </td><?php
                          elseif ($data_transaksi['status'] == "Confirm"):
                              ?>
                                <td><a href="acc.php?id_transaksi=<?=$data_transaksi ['id_transaksi']?>" class="btn btn-outline-danger">
                                    <?= $data_transaksi['status'] ?></a>
                                </td>
                                <?php
                          elseif ($data_transaksi['status'] == "Process"):
                              ?>
                                <td><a href="acc.php?id_transaksi=<?=$data_transaksi ['id_transaksi']?>" class="btn btn-outline-danger">
                                    <?= $data_transaksi['status'] ?></a>
                                </td><?php
                          elseif ($data_transaksi['status'] == "Done"):
                              ?>
                                <td><a href="acc.php?id_transaksi=<?=$data_transaksi ['id_transaksi']?>" class="btn btn-outline-danger">
                                    <?= $data_transaksi['status'] ?></a>
                                </td><?php
                          elseif ($data_transaksi['status'] == "Received"):
                              ?>
                              <td><div class="alert alert-success" role="alert"><?= $data_transaksi['status'] ?></div>
                          <?php endif; ?>
                              <?php
                              include "koneksi.php";
                              ?>
                        
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            </div>
        </div>
    </div>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>