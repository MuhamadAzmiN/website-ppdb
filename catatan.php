<?php
session_start();
require 'function.php';
if(isset($_POST["submit"])){
    if(catatan($_POST)>0){
        echo "<script>alert('data berhasil di tambahkan');
        document.location.href = 'tables.php'</script>";
        }else {
        echo "<script>alert('data gagal di tambahkan');
        document.location.href = 'index.php'</script>";
        }
    }
    date_default_timezone_set('Asia/Jakarta');
    $waktu = new DateTime();

$jam = $waktu->format('H'); // Mengambil jam dari objek DateTime dan mengonversinya ke integer
if ($jam < 10) {
    $hasil = "Selamat pagi";
} elseif ($jam < 15) {
    $hasil = "Selamat siang";
} elseif ($jam < 18) {
    $hasil = "Selamat sore";
} else {
    $hasil = "Selamat malam";
}






    echo "Halo, " .$_SESSION['login_user']; // Gantilah dengan cara menampilkan informasi pengguna yang sesuai






?>










<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    <style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f5f5f5;
    margin: 0;
    padding: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
}

form {
    max-width: 400px;
    width: 100%;
    padding: 20px;
    background-color: #ffffff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

label {
    display: block;
    margin-bottom: 8px;
}

input[type="text"],
input[type="file"],
input[type="submit"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 16px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type="submit"] {
    background-color: #007bff;
    color: #fff;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #0056b3;
}
</style>
<body>

    <h1><?= $hasil;?>
        Halo 
        <?=$_SESSION['login_user'];?>
    

    </h1>
    
    <form action="" method="post" enctype="multipart/form-data" class="max-w-md mx-auto my-8 p-8 bg-white rounded-md shadow-md">
    <input type="text" name="catatan" id="inputData" name="inputData" required>
    <input type="hidden" name="nama" value="<?= $_SESSION["login_user"];?>">
    <input type="hidden" name="gambar" value="<?= $_SESSION["gambar"];?>">



    <div class="mb-6">
        <input type="submit" value="Upload" name="submit" class="bg-blue-500 text-white p-2 rounded-md cursor-pointer">
    </div>
</form>

</body>
</html>