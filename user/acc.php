<?php
if ($_GET['id_transaksi']) {
    include "koneksi.php";
    $id = $_GET['id_transaksi'];
    $cek = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE id_transaksi = '".$id."'");
    $data = mysqli_fetch_array($cek);
    if ($data['status'] == "Done") {
        $newstatus = 'Received';
    } 
    else {
        echo "<script>alert('Pesanan ini telah diterima untuk Anda');</script>";
    }

    $acc= mysqli_query ($koneksi, "UPDATE transaksi set status='".$newstatus."' where id_transaksi = '".$id."'") or die (mysqli_error($koneksi));

    if ($acc) {
        echo "<script>alert('Berhasil mengirim pesanan ini');location.href='pembelian.php';</script>";
    }
    else{
        echo "<script>alert('Gagal mengirim pesanan ini');location.href='pembelian.php';</script>";
    }
}
?>