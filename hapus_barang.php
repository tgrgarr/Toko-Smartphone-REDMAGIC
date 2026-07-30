<?php
include "koneksi.php";

$id = isset($_GET['id']) ? $_GET['id'] : 0;

$query = mysqli_query($koneksi, "SELECT foto FROM tmbbrg WHERE id_barang = '$id'");
$row = mysqli_fetch_assoc($query);

if ($row) {
    $foto = $row['foto'];
    if (file_exists("uploads/$foto")) {
        unlink("uploads/$foto");
    }
    
    $delete = mysqli_query($koneksi, "DELETE FROM tmbbrg WHERE id_barang = '$id'");
    
    if ($delete) {
        echo "<script>
                alert('✅ Data barang berhasil dihapus!');
                window.location='stok_barang.php';
              </script>";
    } else {
        echo "<script>
                alert('❌ Gagal menghapus data!');
                window.location='stok_barang.php';
              </script>";
    }
} else {
    echo "<script>
            alert('❌ Data tidak ditemukan!');
            window.location='stok_barang.php';
          </script>";
}
?>