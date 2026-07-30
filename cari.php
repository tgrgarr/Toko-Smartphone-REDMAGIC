<?php
require_once "koneksi.php";
include "header.php";

$keyword = isset($_GET['q']) ? $_GET['q'] : '';
$result = mysqli_query($koneksi, "SELECT * FROM tmbbrg WHERE nama_barang LIKE '%$keyword%' OR seri LIKE '%$keyword%' OR deskripsi LIKE '%$keyword%'");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Hasil Pencarian - REDMAGIC</title>
    <style>
        .search-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            flex-wrap: wrap;
            gap: 10px;
        }
        
        .search-header h2 {
            color: gold;
        }
        
        .search-header .keyword {
            color: gold;
            font-weight: bold;
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
            width: 280px;
            padding: 20px;
            border-radius: 15px;
            text-align: center;
            transition: 0.3s;
            border: 1px solid #222;
        }
        
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 0 30px rgba(255, 215, 0, 0.2);
            border-color: gold;
        }
        
        .card img {
            width: 100%;
            height: 180px;
            object-fit: contain;
            border-radius: 10px;
            background: #1a1a1a;
        }
        
        .card .harga {
            color: gold;
            font-size: 20px;
            margin: 10px 0;
        }
        
        .card .nama {
            font-size: 16px;
            font-weight: bold;
        }
        
        .card .btn-beli {
            margin-top: 10px;
            padding: 10px 30px;
            border: 1px solid gold;
            background: none;
            color: white;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s;
            width: 100%;
        }
        
        .card .btn-beli:hover {
            background: gold;
            color: black;
        }
        
        .no-result {
            text-align: center;
            padding: 50px;
            color: #666;
            width: 100%;
        }
        
        .no-result .icon {
            font-size: 60px;
            margin-bottom: 20px;
        }
        
        .btn-back {
            display: inline-block;
            padding: 10px 25px;
            background: #333;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            transition: 0.3s;
            margin-top: 20px;
        }
        
        .btn-back:hover {
            background: gold;
            color: black;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="search-header">
        <div>
            <h2>🔍 Hasil Pencarian</h2>
            <span style="color:#aaa;">Ditemukan: <span class="keyword"><?php echo mysqli_num_rows($result); ?></span> produk</span>
            <span style="color:#aaa;"> untuk keyword: <span class="keyword">"<?php echo htmlspecialchars($keyword); ?>"</span></span>
        </div>
        <a href="index.php" class="btn-back">← Kembali</a>
    </div>
    
    <div class="row-cards">
        <?php if (mysqli_num_rows($result) > 0) { ?>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <div class="card">
                <img src="uploads/<?php echo $row['foto']; ?>" alt="<?php echo $row['nama_barang']; ?>">
                <div class="harga">Rp <?php echo number_format($row['harga'], 0, ',', '.'); ?></div>
                <div class="nama"><?php echo $row['nama_barang']; ?></div>
                <a href="beli.php?id_barang=<?php echo $row['id_barang']; ?>">
                    <button class="btn-beli">🛒 BELI SEKARANG</button>
                </a>
            </div>
            <?php } ?>
        <?php } else { ?>
            <div class="no-result">
                <div class="icon">🔍</div>
                <h3>⚠️ Produk tidak ditemukan</h3>
                <p>Maaf, kami tidak menemukan produk dengan keyword "<?php echo htmlspecialchars($keyword); ?>"</p>
                <a href="index.php" class="btn-back">🏠 Kembali ke Home</a>
            </div>
        <?php } ?>
    </div>
</div>

</body>
</html>