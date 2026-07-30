<?php
require_once "koneksi.php";
include "header.php";

$result = mysqli_query($koneksi, "SELECT * FROM tmbbrg ORDER BY id_barang DESC");
?>
<!DOCTYPE html>
<html>
<head>
    <title>REDMAGIC - Official Store</title>
    <style>
        .welcome {
            text-align: center;
            padding: 40px 30px;
            background: linear-gradient(135deg, #1a0000, #2a0000, #1a0000);
            border-radius: 15px;
            margin-bottom: 30px;
            border: 1px solid #333;
        }
        
        .welcome h1 {
            color: gold;
            font-size: 42px;
            font-weight: bold;
            text-shadow: 0 0 30px rgba(255, 215, 0, 0.2);
        }
        
        .welcome h1 .highlight {
            color: #fff;
        }
        
        .welcome h2 {
            color: #aaa;
            font-weight: normal;
            margin-top: 10px;
            font-size: 20px;
        }
        
        .welcome .stats {
            display: flex;
            justify-content: center;
            gap: 50px;
            margin-top: 20px;
        }
        
        .welcome .stats .stat-item {
            text-align: center;
        }
        
        .welcome .stats .stat-item .number {
            color: gold;
            font-size: 28px;
            font-weight: bold;
        }
        
        .welcome .stats .stat-item .label {
            color: #666;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .section-title {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .section-title h2 {
            color: gold;
            font-size: 24px;
        }
        
        .section-title a {
            color: #666;
            text-decoration: none;
            font-size: 14px;
            transition: 0.3s;
        }
        
        .section-title a:hover {
            color: gold;
        }
        
        .row-cards {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 30px;
        }
        
        .card {
            background: #111;
            color: white;
            width: 30%;
            min-width: 280px;
            padding: 20px;
            border-radius: 15px;
            text-align: center;
            transition: 0.4s;
            border: 1px solid #222;
            flex: 1 1 280px;
            position: relative;
        }
        
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 0 40px rgba(255, 215, 0, 0.15);
            border-color: gold;
        }
        
        .card .badge {
            position: absolute;
            top: 10px;
            right: 10px;
            background: gold;
            color: black;
            padding: 3px 12px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: bold;
            text-transform: uppercase;
        }
        
        .card img {
            width: 100%;
            height: 220px;
            object-fit: contain;
            border-radius: 10px;
            background: #1a1a1a;
            transition: 0.3s;
        }
        
        .card:hover img {
            transform: scale(1.03);
        }
        
        .card h2 {
            color: gold;
            margin: 10px 0;
            font-size: 24px;
        }
        
        .card h3 {
            margin: 5px 0;
            font-size: 18px;
        }
        
        .card .rating {
            color: gold;
            font-size: 20px;
            margin: 5px 0;
            letter-spacing: 3px;
        }
        
        .card .deskripsi {
            font-size: 13px;
            color: #ccc;
            margin: 10px 0;
            line-height: 1.8;
            max-height: 80px;
            overflow: hidden;
        }
        
        .card .deskripsi p {
            margin: 3px 0;
        }
        
        .card .btn-beli {
            margin-top: 15px;
            padding: 12px 35px;
            border: 2px solid gold;
            background: transparent;
            color: white;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s;
            font-size: 16px;
            width: 100%;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .card .btn-beli:hover {
            background: gold;
            color: black;
            box-shadow: 0 0 20px rgba(255, 215, 0, 0.3);
        }
        
        .no-data {
            text-align: center;
            padding: 60px 20px;
            color: #666;
            width: 100%;
        }
        
        .no-data .icon {
            font-size: 60px;
            margin-bottom: 20px;
        }
        
        .no-data h3 {
            font-size: 24px;
            margin-bottom: 10px;
        }
        
        .no-data a {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 35px;
            background: linear-gradient(45deg, gold, orange);
            color: black;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            transition: 0.3s;
        }
        
        .no-data a:hover {
            transform: scale(1.05);
            box-shadow: 0 0 20px rgba(255, 215, 0, 0.3);
        }
        
        @media (max-width: 768px) {
            .welcome h1 {
                font-size: 28px;
            }
            .welcome h2 {
                font-size: 16px;
            }
            .welcome .stats {
                gap: 20px;
                flex-wrap: wrap;
            }
            .card {
                min-width: 250px;
            }
            .card img {
                height: 180px;
            }
        }
        
        @media (max-width: 480px) {
            .welcome {
                padding: 25px 15px;
            }
            .welcome h1 {
                font-size: 22px;
            }
            .card {
                min-width: 100%;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <div class="welcome">
        <h1>🔥 Selamat Datang di <span class="highlight">REDMAGIC</span></h1>
        <h2>Selamat Berbelanja di Toko Kami</h2>
        
        <div class="stats">
            <div class="stat-item">
                <div class="number"><?php echo mysqli_num_rows($result); ?></div>
                <div class="label">Total Produk</div>
            </div>
            <div class="stat-item">
                <div class="number">⭐ 4.9</div>
                <div class="label">Rating Toko</div>
            </div>
            <div class="stat-item">
                <div class="number">🏆 1000+</div>
                <div class="label">Pelanggan Puas</div>
            </div>
        </div>
    </div>
    
    <div class="section-title">
        <h2>🛒 Produk Unggulan</h2>
        <a href="stok_barang.php">Lihat Semua →</a>
    </div>
    
    <div class="row-cards">
        <?php if (mysqli_num_rows($result) > 0) { ?>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <div class="card">
                <span class="badge">Best Seller</span>
                <img src="uploads/<?php echo $row['foto']; ?>" alt="<?php echo $row['nama_barang']; ?>">
                <h2>Rp <?php echo number_format($row['harga'], 0, ',', '.'); ?></h2>
                <h3><?php echo $row['nama_barang']; ?></h3>
                <div class="rating">★★★★★</div>
                <div class="deskripsi">
                    <?php 
                    $deskripsi_array = explode("\n", $row['deskripsi']);
                    $count = 0;
                    foreach ($deskripsi_array as $line) {
                        if ($count < 3) {
                            echo "<p>" . trim($line) . "</p>";
                        }
                        $count++;
                    }
                    ?>
                </div>
                <a href="beli.php?id_barang=<?php echo $row['id_barang']; ?>">
                    <button class="btn-beli">🛒 BELI SEKARANG</button>
                </a>
            </div>
            <?php } ?>
        <?php } else { ?>
            <div class="no-data">
                <div class="icon">📦</div>
                <h3>⚠️ Belum ada data barang</h3>
                <p>Silakan tambahkan barang terlebih dahulu</p>
                <a href="tambah.php">➕ Tambah Barang</a>
            </div>
        <?php } ?>
    </div>
</div>

</body>
</html>