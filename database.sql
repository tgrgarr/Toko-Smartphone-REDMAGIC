-- =============================================
-- DATABASE REDMAGIC STORE
-- =============================================
-- Nama Database: ecommers10
-- 
-- Struktur:
-- 1. Tabel tmbbrg (Tambah Barang)
-- 2. Tabel transaksi (Transaksi Pembelian)
-- =============================================

-- =============================================
-- 1. BUAT DATABASE
-- =============================================
CREATE DATABASE IF NOT EXISTS ecommers10;
USE ecommers10;

-- =============================================
-- 2. BUAT TABEL tmbbrg (Tambah Barang)
-- =============================================
DROP TABLE IF EXISTS tmbbrg;

CREATE TABLE tmbbrg (
    id_barang INT(11) NOT NULL AUTO_INCREMENT,
    seri VARCHAR(50) NOT NULL,
    nama_barang VARCHAR(100) NOT NULL,
    jenis VARCHAR(50) NOT NULL,
    harga BIGINT(20) NOT NULL,
    deskripsi TEXT NOT NULL,
    foto VARCHAR(225) NOT NULL,
    PRIMARY KEY (id_barang)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- =============================================
-- 3. BUAT TABEL transaksi (Transaksi Pembelian)
-- =============================================
DROP TABLE IF EXISTS transaksi;

CREATE TABLE transaksi (
    id INT(11) NOT NULL AUTO_INCREMENT,
    no_faktur VARCHAR(50) NOT NULL,
    tanggal DATE NOT NULL,
    nama_pembeli VARCHAR(100) NOT NULL,
    alamat TEXT NOT NULL,
    ktp VARCHAR(50) NOT NULL,
    id_barang INT(11) NOT NULL,
    nama_barang VARCHAR(100) NOT NULL,
    jumlah INT(11) NOT NULL,
    total BIGINT(20) NOT NULL,
    metode_pembayaran VARCHAR(50) DEFAULT NULL,
    status VARCHAR(20) DEFAULT 'pending',
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- =============================================
-- 4. TAMBAHKAN DATA CONTOH (Produk REDMAGIC)
-- =============================================
INSERT INTO tmbbrg (seri, nama_barang, jenis, harga, deskripsi, foto) VALUES
(
    'RM001', 
    'REDMAGIC 10 AIR', 
    'Handphone', 
    10761405, 
    'Snapdragon 8 Gen 3, enhanced by RedCore R3 and Energy Cube Technology
6.8-inch screen display with a 120Hz refresh rate and a 93.7% screen-to-body ratio.
6,000 mAh battery and 80W fast charging endurance.
50MP + 50MP rear camera and 16MP AI-enabled front camera.
DTS-X certified speakers with Qualcomm Snapdragon Sound tuning and 0815 super linear motor vibration
520Hz shoulder triggers with RGB lights', 
    'REDMAGIC10AIR.webp'
),
(
    'RM002', 
    'REDMAGIC 10S PRO', 
    'Handphone', 
    10761847, 
    'Qualcomm Snapdragon 8 Elite Leading Version chipset, supported by RedCore R3 Pro, LPDDR5T RAM, and UFS 4.1 Pro
Durable 7,050 mAh battery capacity and 80W fast charging.
6.85 full screen 144Hz refresh rate 1.5K resolution stunning visuals
520Hz shoulder triggers, X-Gravity, and RGB lighting.', 
    'REDMAGIC10SPRO.PNG'
),
(
    'RM003', 
    'REDMAGIC 10 PRO', 
    'Handphone', 
    9931300, 
    'Powered by Snapdragon 8 Elite Chipset.
7050mAh Dual Battery, 80W GaN Charger, Up To 100W Fast Charging
The First 1.5K Full-Screen Display.
Advanced Liquid Metal Cooling System.', 
    'REDMAGIC10PRO.webp'
);

-- =============================================
-- 5. TAMBAHKAN DATA TRANSAKSI CONTOH (Opsional)
-- =============================================
INSERT INTO transaksi (no_faktur, tanggal, nama_pembeli, alamat, ktp, id_barang, nama_barang, jumlah, total, metode_pembayaran, status) VALUES
('INV-20260127001', '2026-01-27', 'Andi Pratama', 'Jl. Merdeka No. 45, Jakarta', '1234567890123456', 1, 'REDMAGIC 10 AIR', 1, 10761405, 'transfer', 'selesai'),
('INV-20260127002', '2026-01-27', 'Budi Santoso', 'Jl. Sudirman No. 78, Bandung', '9876543210987654', 2, 'REDMAGIC 10S PRO', 2, 21523694, 'cod', 'selesai');

-- =============================================
-- 6. CEK DATA
-- =============================================
SELECT * FROM tmbbrg;
SELECT * FROM transaksi;

-- =============================================
-- 7. CEK STRUKTUR TABEL
-- =============================================
DESCRIBE tmbbrg;
DESCRIBE transaksi;

-- =============================================
-- 8. CEK JUMLAH DATA
-- =============================================
SELECT COUNT(*) AS total_barang FROM tmbbrg;
SELECT COUNT(*) AS total_transaksi FROM transaksi;