<?php
require_once "koneksi.php";
include "header.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Barang - REDMAGIC</title>
    <style>
        .form-container {
            max-width: 800px;
            margin: 0 auto;
            background: #111;
            padding: 40px;
            border-radius: 15px;
            border: 1px solid #333;
        }
        
        .form-container h2 {
            color: gold;
            text-align: center;
            margin-bottom: 30px;
            font-size: 28px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            display: block;
            color: #ccc;
            margin-bottom: 8px;
            font-weight: bold;
        }
        
        .form-group label .required {
            color: red;
            margin-left: 5px;
        }
        
        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 12px;
            border-radius: 8px;
            border: 1px solid #444;
            background: #1a1a1a;
            color: white;
            font-size: 14px;
            transition: 0.3s;
        }
        
        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            outline: none;
            border-color: gold;
            box-shadow: 0 0 10px rgba(255, 215, 0, 0.2);
        }
        
        .form-group textarea {
            height: 120px;
            resize: vertical;
        }
        
        .form-group input[type="file"] {
            padding: 10px;
            background: #1a1a1a;
            cursor: pointer;
        }
        
        .preview-image {
            margin-top: 10px;
            text-align: center;
        }
        
        .preview-image img {
            max-width: 200px;
            max-height: 200px;
            border-radius: 10px;
            border: 2px solid #333;
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
        }
        
        .btn-submit:hover {
            transform: scale(1.02);
            box-shadow: 0 0 20px rgba(255, 215, 0, 0.3);
        }
        
        .btn-reset {
            width: 100%;
            padding: 12px;
            background: #333;
            color: white;
            font-weight: bold;
            font-size: 16px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s;
            margin-top: 10px;
        }
        
        .btn-reset:hover {
            background: #555;
        }
        
        .form-row {
            display: flex;
            gap: 20px;
        }
        
        .form-row .form-group {
            flex: 1;
        }
        
        @media (max-width: 768px) {
            .form-row {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <div class="form-container">
        <h2>➕ Form Tambah Data Barang</h2>
        
        <form action="proses_tambah.php" method="POST" enctype="multipart/form-data">
            
            <div class="form-row">
                <div class="form-group">
                    <label for="seri">🔖 Seri / Kode Barang <span class="required">*</span></label>
                    <input type="text" id="seri" name="seri" placeholder="Contoh: RM004" required>
                </div>
                
                <div class="form-group">
                    <label for="jenis">📂 Jenis Barang <span class="required">*</span></label>
                    <select id="jenis" name="jenis" required>
                        <option value="">Pilih Jenis</option>
                        <option value="Handphone">Handphone</option>
                        <option value="Laptop">Laptop</option>
                        <option value="Tablet">Tablet</option>
                        <option value="Aksesoris">Aksesoris</option>
                        <option value="Smartwatch">Smartwatch</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                </div>
            </div>
            
            <div class="form-group">
                <label for="nama_barang">📱 Nama Barang <span class="required">*</span></label>
                <input type="text" id="nama_barang" name="nama_barang" placeholder="Contoh: REDMAGIC 11" required>
            </div>
            
            <div class="form-group">
                <label for="harga">💰 Harga (Rp) <span class="required">*</span></label>
                <input type="number" id="harga" name="harga" placeholder="Contoh: 15000000" required>
            </div>
            
            <div class="form-group">
                <label for="deskripsi">📝 Deskripsi Barang <span class="required">*</span></label>
                <textarea id="deskripsi" name="deskripsi" placeholder="Masukkan deskripsi lengkap barang..." required></textarea>
            </div>
            
            <div class="form-group">
                <label for="foto">🖼️ Foto Barang <span class="required">*</span></label>
                <input type="file" id="foto" name="foto" accept="image/*" required onchange="previewImage(event)">
                <div class="preview-image" id="previewContainer">
                    <p style="color: #666; font-size: 13px;">Belum ada gambar dipilih</p>
                </div>
            </div>
            
            <button type="submit" class="btn-submit">💾 Simpan Data Barang</button>
            <button type="reset" class="btn-reset">↺ Reset Form</button>
            
        </form>
    </div>
</div>

<script>
function previewImage(event) {
    const container = document.getElementById('previewContainer');
    const file = event.target.files[0];
    
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            container.innerHTML = `<img src="${e.target.result}" alt="Preview">`;
        }
        reader.readAsDataURL(file);
    } else {
        container.innerHTML = '<p style="color: #666; font-size: 13px;">Belum ada gambar dipilih</p>';
    }
}
</script>

</body>
</html>