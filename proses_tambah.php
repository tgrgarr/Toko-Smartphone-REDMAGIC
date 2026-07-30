<?php
include "koneksi.php";

$seri = $_POST['seri'];
$nama_barang = $_POST['nama_barang'];
$jenis = $_POST['jenis'];
$harga = $_POST['harga'];
$deskripsi = $_POST['deskripsi'];

$target_dir = "uploads/";
$foto = $_FILES['foto']['name'];
$target_file = $target_dir . basename($foto);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["foto"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "<script>alert('❌ File bukan gambar!'); window.location='tambah.php';</script>";
        $uploadOk = 0;
    }
}

if (file_exists($target_file)) {
    $foto = time() . '_' . $foto;
    $target_file = $target_dir . basename($foto);
}

if ($_FILES["foto"]["size"] > 2000000) {
    echo "<script>alert('❌ Maaf, ukuran file terlalu besar (maks 2MB)!'); window.location='tambah.php';</script>";
    $uploadOk = 0;
}

if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" 
    && $imageFileType != "gif" && $imageFileType != "webp") {
    echo "<script>alert('❌ Maaf, hanya JPG, JPEG, PNG, GIF, dan WEBP yang diizinkan!'); window.location='tambah.php';</script>";
    $uploadOk = 0;
}

if ($uploadOk == 1) {
    if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
        $query = "INSERT INTO tmbbrg (seri, nama_barang, jenis, harga, deskripsi, foto) 
                  VALUES ('$seri', '$nama_barang', '$jenis', '$harga', '$deskripsi', '$foto')";
        
        if (mysqli_query($koneksi, $query)) {
            echo "<script>
                    alert('✅ Data barang berhasil ditambahkan!');
                    window.location='stok_barang.php';
                  </script>";
        } else {
            echo "<script>
                    alert('❌ Gagal menambahkan data: " . mysqli_error($koneksi) . "');
                    window.location='tambah.php';
                  </script>";
        }
    } else {
        echo "<script>
                alert('❌ Gagal mengupload file!');
                window.location='tambah.php';
              </script>";
    }
}
?>