<?php
    if ($_POST) {
        $id_produk = $_POST["id_produk"];
        $nama_produk = $_POST["nama_produk"];
        $deskripsi = $_POST ["deskripsi"];
        $kategori = $_POST ["kategori"];
        $gender = $_POST ["gender"];
        $merek = $_POST ["merek"];
        $harga = $_POST ["harga"];
            $file_tmp = $_FILES['foto_produk']['tmp_name'];
            $file_name = rand(0, 9999) . $_FILES['foto_produk']['name'];
            $file_size = $_FILES['foto_produk']['size'];
            $file_type = $_FILES['foto_produk']['type'];
            $folder = "foto/";

            include "koneksi.php";
            global $koneksi;
            $sql = mysqli_query($koneksi, "select * from produk where id_produk='$id_produk'");
            $produk = mysqli_fetch_array($sql);
            $path = $folder . $produk["foto_produk"];
            if (file_exists($path)) {
                unlink($path);
            }
            if ($file_size < 2048000 and ($file_type == "image/jpeg" or $file_type == "image/png")) {
                move_uploaded_file($file_tmp, $folder . $file_name);
                if (empty($_FILES['foto_produk']['tmp_name'])) {
                    $update = mysqli_query($koneksi, "update produk set nama_produk='" . $nama_produk . "', deskripsi='" . $deskripsi . "', kategori='" . $kategori . "', gender='" . $gender . "', merek='" . $merek . "', harga='" . $harga . "' where id_produk='" . $id_produk . "' ") or die (mysqli_error($koneksi));
                    if ($update) {
                        echo "<script> alert ('Sukses update produk'); location.href='tampil_produk.php' ; </script>";
                    } else {
                        echo "<script> alert ('Gagal update produk'); location.href='tampil_produk.php' ; </script>";
                    }
                } else {
                    $update = mysqli_query($koneksi, "update produk set nama_produk='" . $nama_produk . "', deskripsi='" . $deskripsi . "', kategori='" . $kategori . "', gender='" . $gender . "', merek='" . $merek . "', harga='" . $harga . "', foto_produk='" . $file_name . "' where id_produk='" . $id_produk . "' ") or die (mysqli_error($koneksi));
                    if ($update) {
                        echo "<script> alert ('Sukses update produk'); location.href='tampil_produk.php' ; </script>";
                    } else {
                        echo "<script> alert ('Gagal update produk'); location.href='tampil_produk.php' ; </script>";
                    }
                }

            } else {
                echo "<script>alert('file tidak sesuai');location.href='tampil_produk.php';</script>";
            }
        }
?>