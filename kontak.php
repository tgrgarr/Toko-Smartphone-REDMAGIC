<?php
require_once "koneksi.php";
include "header.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Kontak - REDMAGIC</title>
    <style>
        .contact-container {
            max-width: 800px;
            margin: 30px auto;
            background: #111;
            padding: 40px;
            border-radius: 15px;
            border: 1px solid #333;
        }
        
        .contact-container h2 {
            color: gold;
            text-align: center;
            font-size: 28px;
            margin-bottom: 10px;
        }
        
        .contact-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .contact-card {
            background: #1a1a1a;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            transition: 0.3s;
        }
        
        .contact-card:hover {
            transform: translateY(-5px);
            border: 1px solid gold;
        }
        
        .contact-card .icon {
            font-size: 40px;
            display: block;
            margin-bottom: 10px;
        }
        
        .contact-card .title {
            color: #888;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 2px;
        }
        
        .contact-card .value {
            color: white;
            font-weight: bold;
            font-size: 14px;
            margin-top: 5px;
        }
        
        .contact-form {
            margin-top: 30px;
            border-top: 1px solid #333;
            padding-top: 30px;
        }
        
        .contact-form h3 {
            color: gold;
            margin-bottom: 20px;
        }
        
        .contact-form .form-group {
            margin-bottom: 15px;
        }
        
        .contact-form .form-group label {
            display: block;
            color: #ccc;
            margin-bottom: 5px;
        }
        
        .contact-form .form-group input,
        .contact-form .form-group textarea {
            width: 100%;
            padding: 12px;
            border-radius: 8px;
            border: 1px solid #444;
            background: #1a1a1a;
            color: white;
            font-size: 14px;
        }
        
        .contact-form .form-group textarea {
            height: 120px;
            resize: vertical;
        }
        
        .contact-form .btn-send {
            padding: 12px 40px;
            background: linear-gradient(45deg, gold, orange);
            color: black;
            font-weight: bold;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s;
            font-size: 16px;
        }
        
        .contact-form .btn-send:hover {
            transform: scale(1.05);
            box-shadow: 0 0 20px rgba(255, 215, 0, 0.3);
        }
    </style>
</head>
<body>

<div class="container">
    <div class="contact-container">
        <h2>📞 Hubungi Kami</h2>
        <p style="text-align:center; color:#666; margin-bottom:30px;">Kami siap membantu Anda 24/7</p>
        
        <div class="contact-grid">
            <div class="contact-card">
                <span class="icon">📱</span>
                <div class="title">Telepon</div>
                <div class="value">+628675673653431</div>
            </div>
            <div class="contact-card">
                <span class="icon">✉️</span>
                <div class="title">Email</div>
                <div class="value">REDMAGICGLOBAL@gmail.com</div>
            </div>
            <div class="contact-card">
                <span class="icon">📍</span>
                <div class="title">Alamat</div>
                <div class="value">Jl. Teknologi No. 123, Jakarta</div>
            </div>
            <div class="contact-card">
                <span class="icon">🕐</span>
                <div class="title">Jam Operasional</div>
                <div class="value">08.00 - 22.00 WIB</div>
            </div>
        </div>
        
        <div class="contact-form">
            <h3>📩 Kirim Pesan</h3>
            <form action="#" method="POST">
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" placeholder="Masukkan nama Anda" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" placeholder="Masukkan email Anda" required>
                </div>
                <div class="form-group">
                    <label>Subjek</label>
                    <input type="text" placeholder="Masukkan subjek pesan">
                </div>
                <div class="form-group">
                    <label>Pesan</label>
                    <textarea placeholder="Tulis pesan Anda di sini..." required></textarea>
                </div>
                <button type="submit" class="btn-send">📤 Kirim Pesan</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>