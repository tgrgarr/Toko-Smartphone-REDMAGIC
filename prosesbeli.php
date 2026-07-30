<?php
include "koneksi.php";

$no_faktur = $_POST['no_faktur'];
$tanggal = $_POST['tanggal'];
$nama_pembeli = $_POST['nama_pembeli'];
$alamat = $_POST['alamat'];
$ktp = $_POST['ktp'];
$id_barang = $_POST['id_barang'];
$jumlah = $_POST['jumlah'];
$total = $_POST['total'];
$metode = isset($_POST['metode']) ? $_POST['metode'] : '';

$data = mysqli_query($koneksi, "SELECT * FROM tmbbrg WHERE id_barang='$id_barang'");
$row = mysqli_fetch_assoc($data);
$nama_barang = $row['nama_barang'];
$harga = $row['harga'];

$query = "INSERT INTO transaksi (
    no_faktur, tanggal, nama_pembeli, alamat, ktp, id_barang, nama_barang, jumlah, total, metode_pembayaran, status
) VALUES (
    '$no_faktur', '$tanggal', '$nama_pembeli', '$alamat', '$ktp', '$id_barang', '$nama_barang', '$jumlah', '$total', '$metode', 'selesai'
)";

$simpan = mysqli_query($koneksi, $query);

if (!$simpan) {
    echo "<script>
            alert('❌ Gagal menyimpan transaksi: " . mysqli_error($koneksi) . "');
            window.location='beli.php?id_barang=$id_barang';
          </script>";
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Struk Pembelian - REDMAGIC</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Courier New', monospace; background: #f5f5f5; display: flex; justify-content: center; align-items: center; min-height: 100vh; padding: 20px; }
        .struk-wrapper { background: white; padding: 25px; border-radius: 12px; box-shadow: 0 5px 30px rgba(0,0,0,0.2); }
        .struk { width: 340px; background: white; padding: 15px 20px; margin: 0 auto; }
        
        .struk .logo { text-align: center; margin-bottom: 5px; }
        .struk .logo .logo-text { font-size: 22px; letter-spacing: 3px; color: #c4302b; font-weight: bold; }
        .struk .logo .logo-sub { font-size: 10px; color: #888; letter-spacing: 4px; }
        
        .struk .header { text-align: center; border-bottom: 2px dashed #000; padding-bottom: 10px; margin-bottom: 10px; }
        .struk .header h3 { font-size: 18px; letter-spacing: 2px; color: #c4302b; }
        .struk .header p { font-size: 11px; color: #555; margin: 2px 0; }
        .struk .header .thankyou { font-size: 13px; font-weight: bold; color: #c4302b; margin-top: 5px; }
        
        .struk .separator { border: none; border-top: 1px dashed #000; margin: 8px 0; }
        .struk .separator-double { border: none; border-top: 2px dashed #000; margin: 8px 0; }
        
        .struk .row { display: flex; justify-content: space-between; padding: 2px 0; font-size: 13px; }
        .struk .row .label { color: #555; }
        .struk .row .value { font-weight: bold; }
        
        .struk .total-section { text-align: center; padding: 10px 0; }
        .struk .total-section h3 { font-size: 24px; color: #c4302b; }
        
        .struk .footer { text-align: center; border-top: 2px dashed #000; padding-top: 10px; margin-top: 10px; }
        .struk .footer p { font-size: 11px; color: #777; margin: 2px 0; }
        .struk .footer .status { color: green; font-weight: bold; font-size: 14px; }
        
        .btn-group { text-align: center; margin-top: 15px; padding-top: 15px; border-top: 1px solid #ddd; }
        .btn-group button { padding: 10px 25px; margin: 0 5px; border: none; border-radius: 6px; cursor: pointer; font-weight: bold; font-family: Arial, sans-serif; transition: 0.3s; font-size: 14px; }
        .btn-print { background: #333; color: white; }
        .btn-print:hover { background: #555; }
        .btn-home { background: gold; color: black; }
        .btn-home:hover { background: #e6b800; }
        
        @media print {
            body { background: white; padding: 0; margin: 0; }
            .struk-wrapper { box-shadow: none; border-radius: 0; padding: 10px; }
            .btn-group { display: none; }
            .struk { width: 100%; padding: 10px; }
        }
    </style>
</head>
<body>

<div class="struk-wrapper">
    <div class="struk">
        
        <div class="logo">
            <div class="logo-text">✦ REDMAGIC ✦</div>
            <div class="logo-sub">◆ GAMING STORE ◆</div>
        </div>
        
        <div class="header">
            <h3>🔴 REDMAGIC</h3>
            <p>Official Store</p>
            <p>Jl. Teknologi No. 123, Jakarta</p>
            <p>Telp: +628675673653431</p>
            <p class="thankyou">★ Terima Kasih ★</p>
        </div>
        
        <hr class="separator">
        
        <div class="row">
            <span class="label">No Faktur</span>
            <span class="value"><?php echo $no_faktur; ?></span>
        </div>
        <div class="row">
            <span class="label">Tanggal</span>
            <span class="value"><?php echo date('d-m-Y', strtotime($tanggal)); ?></span>
        </div>
        
        <hr class="separator">
        
        <div class="row">
            <span class="label">Nama</span>
            <span class="value"><?php echo $nama_pembeli; ?></span>
        </div>
        <div class="row">
            <span class="label">KTP</span>
            <span class="value"><?php echo $ktp; ?></span>
        </div>
        
        <hr class="separator">
        
        <div class="row">
            <span class="label">Barang</span>
            <span class="value"><?php echo $nama_barang; ?></span>
        </div>
        <div class="row">
            <span class="label">Harga</span>
            <span class="value">Rp <?php echo number_format($harga, 0, ',', '.'); ?></span>
        </div>
        <div class="row">
            <span class="label">Jumlah</span>
            <span class="value"><?php echo $jumlah; ?></span>
        </div>
        
        <hr class="separator">
        
        <div class="total-section">
            <h3>Rp <?php echo number_format($total, 0, ',', '.'); ?></h3>
        </div>
        
        <hr class="separator">
        
        <div class="row">
            <span class="label">Metode</span>
            <span class="value"><?php echo strtoupper($metode); ?></span>
        </div>
        
        <hr class="separator-double">
        
        <div class="footer">
            <p class="status">✅ Barang sudah dibayar</p>
            <p>Terima Kasih telah berbelanja di REDMAGIC!</p>
            <p style="font-size:10px; color:#999;">Barang yang sudah dibeli tidak dapat dikembalikan</p>
        </div>
        
    </div>
    
    <div class="btn-group no-print">
        <button class="btn-print" onclick="window.print()">🖨️ Cetak Struk</button>
        <button class="btn-home" onclick="window.location='index.php'">🏠 Kembali ke Home</button>
    </div>
</div>

<script>
    setTimeout(function() {
        window.print();
    }, 1000);
</script>

</body>
</html>