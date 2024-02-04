
<?php
session_start();
require 'function.php';
if(isset($_POST["submit"])){
    if(ganti($_POST)> 0){
        echo "<script>alert('data berhasil di tambahkan');
        document.location.href = 'index.php'</script>";
        }else {
        echo "<script>alert('data tidak berhasil di ubah');
        document.location.href = 'lupa.php'</script>";
        }
    }



















?>


















<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            max-width: 400px;
            width: 100%;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .form-container input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        .form-container button {
            background-color: #4caf50;
            color: #ffffff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .form-container button:hover {
            background-color: #45a049;
        }
    </style>
<body>
<div class="form-container">
        <form action="" method="post" enctype="multipart/form-data">
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="password" required>

            <button type="submit" name="submit">Konfirmasi</button>
        </form>
    </div>
</body>
</html>