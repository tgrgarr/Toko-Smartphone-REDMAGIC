<?php
require_once "koneksi.php";
include "header.php";

$result = mysqli_query($koneksi, "SELECT * FROM tmbbrg ORDER BY id_barang DESC");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Stok Barang - REDMAGIC</title>
    <style>
        .header-stok {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            flex-wrap: wrap;
            gap: 10px;
        }
        
        .header-stok h2 {
            color: gold;
            font-size: 28px;
        }
        
        .header-stok .total-barang {
            color: #aaa;
            font-size: 14px;
        }
        
        .btn-tambah {
            padding: 12px 25px;
            background: linear-gradient(45deg, gold, orange);
            color: black;
            font-weight: bold;
            border: none;
            border-radius: 8px;
            text-decoration: none;
            transition: 0.3s;
            display: inline-block;
        }
        
        .btn-tambah:hover {
            transform: scale(1.05);
            box-shadow: 0 0 20px rgba(255, 215, 0, 0.3);
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
            width: 300px;
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
            height: 200px;
            object-fit: contain;
            border-radius: 10px;
            background: #1a1a1a;
        }
        
        .card .harga {
            color: gold;
            font-size: 22px;
            margin: 10px 0;
        }
        
        .card .nama {
            font-size: 18px;
            font-weight: bold;
            margin: 5px 0;
        }
        
        .card .seri {
            color: #aaa;
            font-size: 14px;
        }
        
        .card .jenis {
            display: inline-block;
            padding: 3px 12px;
            background: #1a1a1a;
            border-radius: 20px;
            font-size: 12px;
            color: gold;
            margin: 5px 0;
        }
        
        .card .deskripsi {
            font-size: 13px;
            color: #ccc;
            margin: 10px 0;
            line-height: 1.5;
            max-height: 80px;
            overflow: hidden;
        }
        
        .card .stok-info {
            background: #1a3a1a;
            padding: 5px 10px;
            border-radius: 5px;
            margin: 5px 0;
            color: #0f0;
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
            font-weight: bold;
        }
        
        .card .btn-hapus {
            margin-top: 5px;
            padding: 8px 15px;
            border: 1px solid red;
            background: none;
            color: red;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s;
            width: 100%;
        }
        
        .card .btn-hapus:hover {
            background: red;
            color: white;
        }
        
        .no-data {
            text-align: center;
            padding: 50px;
            color: #666;
            width: 100%;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header-stok">
        <div>
            <h2>📦 Stok Barang</h2>
            <span class="total-barang">Total: <?php echo mysqli_num_rows($result); ?> barang</span>
        </div>
        <a href="tambah.php" class="btn-tambah">➕ Tambah Barang</a>
    </div>
    
    <div class="row-cards">
        <?php if (mysqli_num_rows($result) > 0) { ?>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <div class="card">
                <img src="uploads/<?php echo $row['foto']; ?>" alt="<?php echo $row['nama_barang']; ?>">
                <div class="harga">Rp <?php echo number_format($row['harga'], 0, ',', '.'); ?></div>
                <div class="nama"><?php echo $row['nama_barang']; ?></div>
                <div class="seri">🔖 Seri: <?php echo $row['seri']; ?></div>
                <div class="jenis"><?php echo $row['jenis']; ?></div>
                <div class="stok-info">✅ Stok Tersedia</div>
                <div class="deskripsi"><?php echo substr($row['deskripsi'], 0, 100); ?>...</div>
                <a href="beli.php?id_barang=<?php echo $row['id_barang']; ?>">
                    <button class="btn-beli">🛒 BELI SEKARANG</button>
                </a>
                <button class="btn-hapus" onclick="hapusBarang(<?php echo $row['id_barang']; ?>)">🗑️ Hapus</button>
            </div>
            <?php } ?>
        <?php } else { ?>
            <div class="no-data">
                <h3>⚠️ Belum ada data barang</h3>
                <p>Silakan tambahkan barang terlebih dahulu</p>
                <a href="tambah.php" style="display:inline-block; margin-top:20px; padding:12px 30px; background:gold; color:black; text-decoration:none; border-radius:8px; font-weight:bold;">Tambah Barang</a>
            </div>
        <?php } ?>
    </div>
</div>

<script>
function hapusBarang(id) {
    if (confirm('Apakah Anda yakin ingin menghapus barang ini?')) {
        window.location.href = 'hapus_barang.php?id=' + id;
    }
}
</script>

</body>
</html>