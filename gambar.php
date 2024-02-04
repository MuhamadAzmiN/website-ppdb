<?php
session_start();
require 'function.php';

// $_SESSION["ekstensiGambarValid"] = $ekstensiGambarValid;
// $_SESSION["ekstensiGambar"] = $ekstensiGambar;

// if(!in_array($_SESSION["ekstensiGambarValid"],$_SESSION["ekstensiGambar"])){
//     echo "<script>alert('yang anda upload bukan gambar')
//     document.location.href = 'gambar.php';</script>";
    
    
// }
if(isset($_POST["submit"])){
    if(ubah($_POST)>0){
        echo "<script>alert('data berhasil di tambahkan');
        document.location.href = 'index.php'</script>";
        }else {
        echo "<script>alert('data tidak berhasil di ubah');
        document.location.href = 'gambar.php'</script>";
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
<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Upload File</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-...." crossorigin="anonymous" />
    
</head>
<style>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
        }

        input[type="checkbox"] {
            display: none;
        }

        label.checkbox-btn {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 30px;
            background-color: #3498db;
            border-radius: 15px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        label.checkbox-btn::before {
            content: "";
            position: absolute;
            top: 3px;
            left: 3px;
            width: 24px;
            height: 24px;
            background-color: #fff;
            border-radius: 12px;
            transition: transform 0.3s;
        }

        input:checked + label.checkbox-btn {
            background-color: #2c3e50;
        }

        input:checked + label.checkbox-btn::before {
            transform: translateX(30px);
        }
        .darkmode {
            background-color:#2ecc71;
            transition:.3s ease
        }
    </style>
        
    </style>

<body>
<a href="index.php" onclick="history.go(-1); return false;">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>
 <!-- Checkbox -->
 <!-- Elemen yang akan dipindahkan -->
 <input type="checkbox" id="coolCheckbox"> <!-- Checkbox tersembunyi -->

<label for="coolCheckbox" class="checkbox-btn"></label>
    <h2>Form Upload File</h2>
    <form action="" method="post" enctype="multipart/form-data" class="max-w-md mx-auto my-8 p-8 bg-white rounded-md shadow-md">
    <input type="hidden" name="gambarLama" value="<?= $_SESSION["gambar"]; ?>">

    <div class="mb-4">
    <div id="preview-container">
  
    <div class="flex justify-center items-center">
    <img id="preview-image" src="img2/<?= $_SESSION["gambar"];?>" alt="<?php
    
    
    
    
    
    ;?>" style="display: block; width:200px;border-radius: 100%; height:200px; border:2px solid black;">
</div>
<input type="file" id="gambar" name="gambar" class="form-control" onchange="previewImage()">



    <div class="mb-4">
        <label for="nama" class="block text-sm font-medium text-gray-600">Nama:</label>
        <input type="text" name="nama" value="<?= $_SESSION["login_user"]; ?>" class="mt-1 p-2 border rounded-md w-full">
    </div>

    <div class="mb-6">
        <input type="submit" value="Upload" name="submit" class="bg-blue-500 text-white p-2 rounded-md cursor-pointer">
    </div>
</form>
<script>


function previewImage() {
            var input = document.getElementById('gambar');
            var previewContainer = document.getElementById('preview-container');
            var previewImage = document.getElementById('preview-image');

            // Pastikan ada file yang dipilih
            if (input.files && input.files[0]) {
                // Membaca file yang dipilih menggunakan objek FileReader
                var reader = new FileReader();
                

                reader.onload = function (e) {
                    // Menetapkan sumber gambar pada elemen img
                    previewImage.src = e.target.result;
                    previewImage.style.borderRadius = '100%';
                    previewImage.style.width = '200px';
                    previewImage.style.height = '200px';
                    previewImage.style.border = '2px solid black';
                    // Menampilkan elemen img dan menghilangkan display:none
                    previewImage.style.display = 'block';
                };

                // Membaca isi file sebagai URL data
                reader.readAsDataURL(input.files[0]);
            } else {
                // Reset pratinjau jika tidak ada file yang dipilih
                previewImage.src = '';
                previewImage.style.display = 'none';
            }
        }
</script>
<script src="gambar.js"></script>

</body>
</html>

</body>
</html>