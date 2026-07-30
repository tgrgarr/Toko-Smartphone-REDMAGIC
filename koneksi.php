<?php
// =============================================
// KONEKSI DATABASE
// =============================================

$host = "localhost";      // Server database (biasanya localhost)
$user = "root";           // Username database (default: root)
$pass = "";               // Password database (default: kosong)
$db = "ecommers10";       // Nama database

// Buat koneksi
$koneksi = mysqli_connect($host, $user, $pass, $db);

// Cek koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Set charset ke utf8mb4 untuk mendukung karakter khusus
mysqli_set_charset($koneksi, "utf8mb4");

// Mulai session
session_start();

// Optional: Untuk debugging (bisa dihapus)
// echo "Koneksi berhasil!";
?>