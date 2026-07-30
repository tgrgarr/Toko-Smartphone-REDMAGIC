<?php
require_once "koneksi.php";
include "header.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Profil - REDMAGIC</title>
    <style>
        .profile-container {
            max-width: 600px;
            margin: 30px auto;
            background: #111;
            padding: 40px;
            border-radius: 15px;
            text-align: center;
            border: 1px solid #333;
        }
        
        .profile-container .avatar {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: contain;
            background: #1a1a1a;
            border: 3px solid gold;
            padding: 10px;
        }
        
        .profile-container h2 {
            color: gold;
            margin: 20px 0 10px;
        }
        
        .profile-container .info {
            text-align: left;
            margin: 20px 0;
        }
        
        .profile-container .info .item {
            display: flex;
            padding: 12px 15px;
            background: #1a1a1a;
            border-radius: 8px;
            margin-bottom: 10px;
            border-left: 3px solid gold;
        }
        
        .profile-container .info .item .label {
            color: #888;
            width: 120px;
            flex-shrink: 0;
        }
        
        .profile-container .info .item .value {
            color: white;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="profile-container">
        <img class="avatar" src="uploads/REDMAGICLOGO.webp" alt="Logo REDMAGIC">
        <h2>🔴 REDMAGIC Official Store</h2>
        <p style="color:#888; font-size:14px;">Gaming Store Terpercaya di Indonesia</p>
        
        <div class="info">
            <div class="item">
                <span class="label">🏢 Nama Toko</span>
                <span class="value">REDMAGIC Official Store</span>
            </div>
            <div class="item">
                <span class="label">📍 Alamat</span>
                <span class="value">Jl. Teknologi No. 123, Jakarta</span>
            </div>
            <div class="item">
                <span class="label">📞 Telepon</span>
                <span class="value">+628675673653431</span>
            </div>
            <div class="item">
                <span class="label">✉️ Email</span>
                <span class="value">REDMAGICGLOBAL@gmail.com</span>
            </div>
            <div class="item">
                <span class="label">🕐 Jam Operasional</span>
                <span class="value">08.00 - 22.00 WIB</span>
            </div>
        </div>
    </div>
</div>

</body>
</html>