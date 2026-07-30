<?php
if (!isset($koneksi)) {
    require_once "koneksi.php";
}
?>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    
    body {
        background: black;
        color: white;
        font-family: Arial, sans-serif;
    }
    
    .header-top {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 15px 30px;
        background: linear-gradient(90deg, #1a0000, #4a0000);
        border-bottom: 2px solid gold;
        flex-wrap: wrap;
        gap: 15px;
    }
    
    .header-top .brand {
        display: flex;
        align-items: center;
        gap: 15px;
    }
    
    .header-top .brand img {
        height: 60px;
        width: auto;
    }
    
    .header-top .brand h1 {
        color: gold;
        font-size: 28px;
        font-weight: bold;
    }
    
    .header-top .contact {
        color: #ccc;
        font-size: 14px;
        text-align: right;
    }
    
    .header-top .contact span {
        display: block;
        margin: 3px 0;
    }
    
    .menu-nav {
        display: flex;
        gap: 5px;
        background: #1a1a1a;
        padding: 12px 20px;
        border-bottom: 1px solid #333;
        flex-wrap: wrap;
        align-items: center;
    }
    
    .menu-nav a {
        color: white;
        text-decoration: none;
        padding: 10px 25px;
        border-radius: 5px;
        transition: 0.3s;
        font-weight: bold;
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .menu-nav a:hover {
        background: gold;
        color: black;
    }
    
    .menu-nav a.active {
        background: gold;
        color: black;
    }
    
    .search-box {
        margin-left: auto;
        display: flex;
        align-items: center;
        gap: 5px;
    }
    
    .search-box input[type="text"] {
        padding: 8px 15px;
        border-radius: 5px;
        border: 1px solid #444;
        background: #222;
        color: white;
        width: 200px;
    }
    
    .search-box input[type="submit"] {
        padding: 8px 20px;
        border-radius: 5px;
        border: 1px solid gold;
        background: none;
        color: gold;
        cursor: pointer;
        transition: 0.3s;
        font-weight: bold;
    }
    
    .search-box input[type="submit"]:hover {
        background: gold;
        color: black;
    }
    
    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }
    
    @media (max-width: 768px) {
        .header-top {
            flex-direction: column;
            text-align: center;
        }
        .header-top .contact {
            text-align: center;
            margin-top: 10px;
        }
        .menu-nav {
            justify-content: center;
        }
        .search-box {
            margin-left: 0;
            width: 100%;
            justify-content: center;
            margin-top: 10px;
        }
        .search-box input[type="text"] {
            width: 100%;
        }
    }
</style>

<div class="header-top">
    <div class="brand">
        <img src="uploads/REDMAGICLOGO.webp" alt="REDMAGIC Logo">
        <h1>REDMAGIC</h1>
    </div>
    <div class="contact">
        <span>📞 TLP +628675673653431</span>
        <span>✉️ MAil . REDMAGICGLOBAL@gamil.com</span>
    </div>
</div>

<div class="menu-nav">
    <?php 
    $current_page = basename($_SERVER['PHP_SELF']);
    ?>
    <a href="index.php" class="<?php echo $current_page == 'index.php' ? 'active' : ''; ?>">🏠 Home</a>
    <a href="stok_barang.php" class="<?php echo $current_page == 'stok_barang.php' ? 'active' : ''; ?>">📦 Stok Barang</a>
    <a href="tambah.php" class="<?php echo $current_page == 'tambah.php' ? 'active' : ''; ?>">➕ Tambah Penjualan</a>
    <a href="profil.php" class="<?php echo $current_page == 'profil.php' ? 'active' : ''; ?>">👤 Profil</a>
    <a href="kontak.php" class="<?php echo $current_page == 'kontak.php' ? 'active' : ''; ?>">📞 Kontak</a>
    
    <div class="search-box">
        <form action="cari.php" method="get">
            <input type="text" name="q" placeholder="Cari produk...">
            <input type="submit" value="Cari">
        </form>
    </div>
</div>