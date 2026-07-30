<?php
require_once "koneksi.php";
include "header.php";

$id = isset($_GET['id_barang']) ? $_GET['id_barang'] : 0;

$query = mysqli_query($koneksi, "SELECT * FROM tmbbrg WHERE id_barang = '$id'");
$row = mysqli_fetch_assoc($query);

if (!$row) {
    echo "<script>alert('Barang tidak ditemukan!'); window.location='index.php';</script>";
    exit;
}

$jumlah = isset($_GET['jumlah']) ? $_GET['jumlah'] : 1;
$harga = $row['harga'];
$total = $harga * $jumlah;
$kode = rand(100000, 999999);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Form Pembelian - REDMAGIC</title>
    <style>
        .container-form {
            max-width: 900px;
            margin: 0 auto;
            background: #111;
            padding: 30px;
            border-radius: 15px;
            border: 1px solid #333;
        }
        
        .container-form h2 {
            color: gold;
            text-align: center;
            margin-bottom: 10px;
            font-size: 28px;
        }
        
        .form-row {
            display: flex;
            gap: 30px;
            flex-wrap: wrap;
        }
        
        .form-left, .form-right {
            flex: 1;
            min-width: 280px;
        }
        
        .form-group {
            margin-bottom: 15px;
        }
        
        .form-group label {
            display: block;
            color: #ccc;
            margin-bottom: 5px;
            font-weight: bold;
        }
        
        .form-group input, 
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 10px 12px;
            border-radius: 8px;
            border: 1px solid #444;
            background: #1a1a1a;
            color: white;
            font-size: 14px;
        }
        
        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: gold;
            box-shadow: 0 0 10px rgba(255, 215, 0, 0.2);
        }
        
        .form-group input[readonly] {
            color: gold;
            font-weight: bold;
        }
        
        .form-group .total-input {
            color: gold;
            font-weight: bold;
            font-size: 20px;
            text-align: center;
        }
        
        .form-group textarea {
            height: 80px;
            resize: vertical;
        }
        
        .product-preview {
            background: #1a1a1a;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            margin-bottom: 25px;
            border: 1px solid #222;
        }
        
        .product-preview img {
            width: 150px;
            height: 150px;
            object-fit: contain;
            border-radius: 10px;
        }
        
        .product-preview h3 {
            color: gold;
            margin: 10px 0 5px;
            font-size: 20px;
        }
        
        .section-title {
            color: gold;
            font-size: 16px;
            margin-bottom: 15px;
            padding-bottom: 5px;
            border-bottom: 1px solid #333;
        }
        
        .jumlah-control {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .jumlah-control button {
            padding: 8px 18px;
            background: #333;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 20px;
        }
        
        .jumlah-control button:hover {
            background: gold;
            color: black;
        }
        
        .jumlah-control input {
            width: 80px;
            text-align: center;
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #444;
            background: #1a1a1a;
            color: white;
            font-size: 16px;
        }
        
        .payment-methods {
            margin: 15px 0;
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }
        
        .payment-methods label {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 10px 20px;
            background: #1a1a1a;
            border-radius: 8px;
            cursor: pointer;
            border: 2px solid #333;
            transition: 0.3s;
            flex: 1;
            min-width: 120px;
            justify-content: center;
        }
        
        .payment-methods label:hover {
            border-color: gold;
        }
        
        .payment-methods input[type="radio"] {
            width: auto;
            margin: 0;
            accent-color: gold;
        }
        
        .payment-box {
            display: none;
            background: #1a1a1a;
            padding: 20px;
            border-radius: 10px;
            margin: 10px 0;
        }
        
        .payment-box.active {
            display: block;
        }
        
        .qris-box {
            display: none;
            text-align: center;
            padding: 20px;
            background: #1a1a1a;
            border-radius: 10px;
            margin: 15px 0;
            border: 1px solid #333;
        }
        
        .qris-box.active {
            display: block;
        }
        
        .qris-box img {
            width: 180px;
            height: auto;
            border-radius: 10px;
        }
        
        .qris-box .total-qris {
            color: gold;
            font-size: 24px;
            font-weight: bold;
            margin: 10px 0;
        }
        
        .qris-box .kode-verifikasi {
            color: lightgreen;
            font-size: 28px;
            font-weight: bold;
            letter-spacing: 5px;
        }
        
        .verifikasi-box {
            display: none;
            margin: 15px 0;
        }
        
        .verifikasi-box.active {
            display: block;
        }
        
        .verifikasi-box input {
            width: 100%;
            padding: 12px;
            border-radius: 8px;
            border: 1px solid #444;
            background: #1a1a1a;
            color: white;
            font-size: 18px;
            text-align: center;
            letter-spacing: 5px;
        }
        
        .status-bayar {
            margin-top: 10px;
            font-weight: bold;
            font-size: 16px;
        }
        
        .status-bayar.success {
            color: lightgreen;
        }
        
        .status-bayar.error {
            color: red;
        }
        
        .btn-submit {
            width: 100%;
            padding: 15px;
            background: linear-gradient(45deg, gold, orange);
            color: black;
            font-weight: bold;
            font-size: 18px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s;
            margin-top: 10px;
        }
        
        .btn-submit:hover:not(:disabled) {
            transform: scale(1.02);
            box-shadow: 0 0 25px rgba(255, 215, 0, 0.3);
        }
        
        .btn-submit:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }
        
        .btn-back {
            display: inline-block;
            padding: 10px 25px;
            background: #333;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            transition: 0.3s;
            margin-bottom: 20px;
        }
        
        .btn-back:hover {
            background: gold;
            color: black;
        }
        
        @media (max-width: 768px) {
            .form-row {
                flex-direction: column;
            }
            .payment-methods label {
                min-width: 100px;
                padding: 8px 15px;
                font-size: 13px;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <a href="javascript:history.back()" class="btn-back">← Kembali</a>
    
    <div class="container-form">
        <h2>🛒 Form Pembelian</h2>
        
        <div class="product-preview">
            <img src="uploads/<?php echo $row['foto']; ?>" alt="<?php echo $row['nama_barang']; ?>">
            <h3><?php echo $row['nama_barang']; ?></h3>
            <div style="color:#666; font-size:13px;">🔖 Seri: <?php echo $row['seri']; ?></div>
            <div style="color:#fff; font-size:15px; margin-top:5px;">💰 Harga: Rp <?php echo number_format($harga, 0, ',', '.'); ?></div>
        </div>
        
        <form action="prosesbeli.php" method="POST">
            
            <input type="hidden" name="id_barang" value="<?php echo $row['id_barang']; ?>">
            <input type="hidden" name="harga" value="<?php echo $harga; ?>">
            <input type="hidden" name="kode_verifikasi" value="<?php echo $kode; ?>">
            
            <div class="form-row">
                <div class="form-left">
                    <div class="section-title">🚗 Identitas Kendaraan</div>
                    
                    <div class="form-group">
                        <label>Nama Barang</label>
                        <input type="text" value="<?php echo $row['nama_barang']; ?>" readonly>
                    </div>
                    
                    <div class="form-group">
                        <label>Jenis</label>
                        <input type="text" value="<?php echo $row['jenis']; ?>" readonly>
                    </div>
                    
                    <div class="form-group">
                        <label>Harga Satuan</label>
                        <input type="text" value="Rp <?php echo number_format($harga, 0, ',', '.'); ?>" readonly>
                    </div>
                    
                    <div class="form-group">
                        <label>Jumlah Beli</label>
                        <div class="jumlah-control">
                            <button type="button" onclick="kurang()">−</button>
                            <input type="number" id="jumlah" name="jumlah" value="<?php echo $jumlah; ?>" min="1" onchange="hitungTotal()">
                            <button type="button" onclick="tambah()">+</button>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label>Total Harga</label>
                        <input type="text" id="total_display" value="Rp <?php echo number_format($total, 0, ',', '.'); ?>" readonly class="total-input">
                        <input type="hidden" id="total_hidden" name="total" value="<?php echo $total; ?>">
                    </div>
                </div>
                
                <div class="form-right">
                    <div class="section-title">👤 Data Pembeli</div>
                    
                    <div class="form-group">
                        <label>No Faktur</label>
                        <input type="text" name="no_faktur" value="INV-<?php echo date('YmdHis'); ?>" readonly>
                    </div>
                    
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date" name="tanggal" value="<?php echo date('Y-m-d'); ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Nama Pembeli</label>
                        <input type="text" name="nama_pembeli" placeholder="Masukkan nama lengkap" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="alamat" placeholder="Masukkan alamat lengkap" required></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label>No KTP</label>
                        <input type="text" name="ktp" placeholder="Masukkan nomor KTP" required>
                    </div>
                </div>
            </div>
            
            <!-- METODE PEMBAYARAN -->
            <div style="margin-top:25px; border-top:1px solid #333; padding-top:20px;">
                <div class="section-title">💳 Metode Pembayaran</div>
                
                <div class="payment-methods">
                    <label onclick="pilihMetode('transfer')">
                        <input type="radio" name="metode" value="transfer" onchange="showPayment()"> Transfer Bank
                    </label>
                    <label onclick="pilihMetode('wallet')">
                        <input type="radio" name="metode" value="wallet" onchange="showPayment()"> E-Wallet
                    </label>
                    <label onclick="pilihMetode('cod')">
                        <input type="radio" name="metode" value="cod" onchange="showPayment()"> COD
                    </label>
                </div>
                
                <div id="transferBox" class="payment-box">
                    <label>Pilih Bank:</label>
                    <select name="bank">
                        <option value="BCA">BCA</option>
                        <option value="BRI">BRI</option>
                        <option value="BNI">BNI</option>
                        <option value="Mandiri">Mandiri</option>
                    </select>
                </div>
                
                <div id="ewalletBox" class="payment-box">
                    <label>Pilih E-Wallet:</label>
                    <select name="ewallet">
                        <option value="DANA">DANA</option>
                        <option value="OVO">OVO</option>
                        <option value="GoPay">GoPay</option>
                        <option value="ShopeePay">ShopeePay</option>
                    </select>
                </div>
                
                <div id="qrisBox" class="qris-box">
                    <h4 style="color:gold; margin-bottom:10px;">📱 Scan QRIS</h4>
                    <img src="uploads/qris.png" alt="QRIS" onerror="this.src='https://via.placeholder.com/180x180?text=QRIS'">
                    <div class="total-qris">Rp <?php echo number_format($total, 0, ',', '.'); ?></div>
                    <p style="color:#666; font-size:13px;">Kode Verifikasi:</p>
                    <div class="kode-verifikasi"><?php echo $kode; ?></div>
                </div>
                
                <div id="verifikasiBox" class="verifikasi-box">
                    <label style="color:#ccc; font-weight:bold;">Masukkan Kode Verifikasi:</label>
                    <input type="text" id="inputKode" placeholder="Masukkan 6 digit kode" maxlength="6" onkeyup="cekKode()">
                    <div id="statusBayar" class="status-bayar"></div>
                </div>
                
                <button type="submit" id="btnSubmit" class="btn-submit" disabled>
                    💳 Proses Pembelian
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function tambah() {
    let input = document.getElementById('jumlah');
    let val = parseInt(input.value) + 1;
    input.value = val;
    hitungTotal();
}

function kurang() {
    let input = document.getElementById('jumlah');
    if (input.value > 1) {
        let val = parseInt(input.value) - 1;
        input.value = val;
        hitungTotal();
    }
}

function hitungTotal() {
    let jumlah = document.getElementById('jumlah').value;
    let harga = <?php echo $harga; ?>;
    let total = jumlah * harga;
    
    document.getElementById('total_display').value = 'Rp ' + total.toLocaleString('id-ID');
    document.getElementById('total_hidden').value = total;
    
    let totalQris = document.querySelector('.total-qris');
    if (totalQris) {
        totalQris.textContent = 'Rp ' + total.toLocaleString('id-ID');
    }
}

function pilihMetode(metode) {
    document.querySelectorAll('.payment-methods label').forEach(el => {
        el.classList.remove('selected');
    });
    let labels = document.querySelectorAll('.payment-methods label');
    let radios = document.querySelectorAll('input[name="metode"]');
    for (let i = 0; i < radios.length; i++) {
        if (radios[i].value === metode) {
            radios[i].checked = true;
            labels[i].classList.add('selected');
        }
    }
    showPayment();
}

function showPayment() {
    let metode = document.querySelector('input[name="metode"]:checked');
    
    document.getElementById('transferBox').classList.remove('active');
    document.getElementById('ewalletBox').classList.remove('active');
    document.getElementById('qrisBox').classList.remove('active');
    document.getElementById('verifikasiBox').classList.remove('active');
    document.getElementById('btnSubmit').disabled = true;
    document.getElementById('statusBayar').innerHTML = '';
    document.getElementById('statusBayar').className = 'status-bayar';
    
    if (metode) {
        if (metode.value === 'transfer') {
            document.getElementById('transferBox').classList.add('active');
            document.getElementById('qrisBox').classList.add('active');
            document.getElementById('verifikasiBox').classList.add('active');
        } else if (metode.value === 'wallet') {
            document.getElementById('ewalletBox').classList.add('active');
            document.getElementById('qrisBox').classList.add('active');
            document.getElementById('verifikasiBox').classList.add('active');
        } else if (metode.value === 'cod') {
            document.getElementById('btnSubmit').disabled = false;
        }
    }
}

function cekKode() {
    let input = document.getElementById('inputKode').value;
    let kodeAsli = '<?php echo $kode; ?>';
    let status = document.getElementById('statusBayar');
    let btn = document.getElementById('btnSubmit');
    
    if (input === kodeAsli) {
        status.innerHTML = '✅ Pembayaran Berhasil!';
        status.className = 'status-bayar success';
        btn.disabled = false;
    } else if (input.length > 0) {
        status.innerHTML = '❌ Kode Salah!';
        status.className = 'status-bayar error';
        btn.disabled = true;
    } else {
        status.innerHTML = '';
        status.className = 'status-bayar';
        btn.disabled = true;
    }
}
</script>

</body>
</html>